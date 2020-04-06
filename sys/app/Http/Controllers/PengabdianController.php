<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengabdian;
use App\Asesor;
use DataTables;
use Auth;
use Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class PengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengabdian.index');
    }

    public function index_asesor()
    {
        return view('pengabdian.index_asesor');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengabdian.add');
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
        Pengabdian::create($input);
        Alert::success('Berhasil');
        return redirect()->route('pengabdian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pengabdian::findOrFail($id);
        return view('pengabdian.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengabdian::findOrFail($id);
        return view('pengabdian.edit', compact('data'));
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
        $data = Pengabdian::findOrFail($id);
        $data->update($input);
        return redirect()->route('pengabdian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengabdian::findOrFail($id);
        $data->delete();
        return redirect()->route('pengabdian.index');
    }

    public function status($id, $status)
    {
        $data = Pengabdian::findOrFail($id);
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
        $data = Pengabdian::where('dosen_id', Auth::guard('dosen')->user()->id)->get();

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
                    'edit_url' => route('pengabdian.edit', $data->id),
                    'del_url'  => route('pengabdian.destroy', $data->id),
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
        $data = Pengabdian::whereIn('asesor1_id', $asesor)->orWhereIn('asesor2_id', $asesor)->get();

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
                    'terima' => url('/pengabdian/status/'.$data->id.'/Terima'),
                    'tolak'  => url('/pengabdian/status/'.$data->id.'/Tolak'),
                ]);

            })
            ->addIndexColumn()->make(true);
    }
}
