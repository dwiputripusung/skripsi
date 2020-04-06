<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penunjang;
use App\Asesor;
use DataTables;
use Auth;
use Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class PenunjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penunjang.index');
    }

    public function index_asesor()
    {
        return view('penunjang.index_asesor');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penunjang.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_kegiatan' => 'required',
            'buktipenugasan_bebankerja' => 'required',
            'sks_bebankerja' => 'required',
            'masa_penugasan' => 'required',
            'buktidokumen_kinerja' => 'required',
            'sks_kinerja' => 'required',
            'rekomendasi' => 'required'
        ]);
        $input = $request->except('buktipenugasan_bebankerja', 'buktidokumen_kinerja');
        $input['dosen_id'] = Auth::guard('dosen')->user()->id;
        $doc = $request->file('buktidokumen_kinerja');
        $input['buktidokumen_kinerja'] = $doc->store('dokumen');
        $b = $request->file('buktipenugasan_bebankerja');
        $input['buktipenugasan_bebankerja'] = $b->store('penugasan');
        // Input Asesor
        $asesor = Asesor::where('dosen_id', Auth::guard('dosen')->user()->id)->first();
        $input['asesor1_id'] = $asesor['asesor1_id'];
        $input['asesor2_id'] = $asesor['asesor2_id'];
        //
        Penunjang::create($input);
        Alert::success('Berhasil');
        return redirect()->route('penunjang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penunjang::findOrFail($id);
        return view('penunjang.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penunjang::findOrFail($id);
        return view('penunjang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_kegiatan' => 'required',
            'buktipenugasan_bebankerja' => 'required',
            'sks_bebankerja' => 'required',
            'masa_penugasan' => 'required',
            'buktidokumen_kinerja' => 'required',
            'sks_kinerja' => 'required',
            'rekomendasi' => 'required'
        ]);
        $input = $request->all();
        $data = Penunjang::findOrFail($id);
        $data->update($input);
        Alert::success('Berhasil');
        return redirect()->route('penunjang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Penunjang::findOrFail($id);
        $data->delete();
        return redirect()->route('penunjang.index');
    }

    public function status($id, $status)
    {
        $data = Penunjang::findOrFail($id);
        $g = array();
        if($data->asesor1_id == Auth::guard('dosen')->user()->id){
            $g['statush1'] = $status;
        } else if($data->asesor2_id == Auth::guard('dosen')->user()->id){
            $g['statush2'] = $status;
        }
        $data->update($g);
        return back();
    }

    public function datatable()
    {
        $data = Penunjang::where('dosen_id', Auth::guard('dosen')->user()->id)->get();

        return Datatables::of($data)
            ->addColumn('statush1', function($data) {
                if($data->status1 == 'Belum diperiksa'){
                    return 'Belum Diterima';
                } else if($data->status1 == 'Terima'){
                    return 'Diterima';
                } else {
                    return 'Ditolak';
                }

            })
            ->addColumn('statush2', function($data) {
                if($data->status2 == 'Belum diperiksa'){
                    return 'Belum Diterima';
                } else if($data->status2 == 'Terima'){
                    return 'Diterima';
                } else {
                    return 'Ditolak';
                }

            })
            ->addColumn('action', function($data) {
                return view('datatable.action', [
                    'edit_url' => route('penunjang.edit', $data->id),
                    'del_url'  => route('penunjang.destroy', $data->id),
                ]);


            })
            ->addColumn('bukti_bk', function($data) {
                $url = asset('upload/' .$data->buktipenugasan_bebankerja);
                return '<a href="'.$url.'">'.$data->buktipenugasan_bebankerja_ket.'</a>';
                
            })

            ->addColumn('bukti_k', function($data) {
                $url = asset('upload/' .$data->buktidokumen_kinerja);
                return '<a href="'.$url.'">'.$data->buktidokumen_kinerja_ket.'</a>';
                
            
            })
            ->addIndexColumn()->rawColumns(['action', 'bukti_bk', 'bukti_k'])->make(true);
            
    
    }

    public function datatable_asesor()
    {
        $asesor = Asesor::where('asesor1_id', Auth::guard('dosen')->user()->id)->orWhere('asesor2_id', Auth::guard('dosen')->user()->id)->pluck('id');;
        $data = Penunjang::whereIn('asesor1_id', $asesor)->orWhereIn('asesor2_id', $asesor)->get();

        return Datatables::of($data)
            ->addColumn('statush1', function($data) {
                if($data->status1 == 'Belum diperiksa'){
                    return 'Belum Diterima';
                } else if($data->status1 == 'Terima'){
                    return 'Diterima';
                } else {
                    return 'Ditolak';
                }

            })
            ->addColumn('statush2', function($data) {
                if($data->status2 == 'Belum diperiksa'){
                    return 'Belum Diterima';
                } else if($data->status2 == 'Terima'){
                    return 'Diterima';
                } else {
                    return 'Ditolak';
                }

            })
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => url('/penunjang/status/'.$data->id.'/Terima'),
                    'tolak'  => url('/penunjang/status/'.$data->id.'/Tolak'),
                ]);

            })
            ->addIndexColumn()->make(true);
    }
}
