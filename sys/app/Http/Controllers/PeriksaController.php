<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesor;
use App\Pendidikan;
use App\Penelitian;
use App\Pengabdian;
use App\Penunjang;
use Auth;
use DataTables;
use UxWeb\SweetAlert\SweetAlert;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Data Yang Belum Diperiksa
    public function index()
    {
        return view('periksa.belum');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Data Yang Sudah Diperiksa
    public function create()
    {
        return view('periksa.sudah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('j', 'id');
        $cek = $request->j;
        $id = $request->id;
        if($cek == 'Pendidikan'){
            $data = Pendidikan::findOrFail($id);
        } elseif($cek == 'Penelitian'){
            $data = Penelitian::findOrFail($id);
        } elseif($cek == 'Penunjang'){
            $data = Penunjang::findOrFail($id);
        } elseif($cek == 'Pengabdian'){
            $data = Pengabdian::findOrFail($id);
        }
        $data->update($input);
        Alert::success('Berhasil');
        return redirect()->route('periksa.index');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Detail Pendidikan
    public function show($id)
    {
        $data = Pendidikan::findOrFail($id);
        if($data->asesor1_id == Auth::guard('dosen')->user()->id)
        {
            $status = 'asesor1';
        }
        if($data->asesor2_id == Auth::guard('dosen')->user()->id)
        {
            $status = 'asesor2';
        }
        $title = 'Pendidikan';
        return view('periksa.show_pendidikan', compact(['data', 'title', 'status']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Detail Penelitian
    public function edit($id)
    {
        $data = Penelitian::findOrFail($id);
        if($data->asesor1_id == Auth::guard('dosen')->user()->id)
        {
            $status = 'asesor1';
        }
        if($data->asesor2_id == Auth::guard('dosen')->user()->id)
        {
            $status = 'asesor2';
        }
        $title = 'Penelitian';
        return view('periksa.show_penelitian', compact(['data', 'title', 'status']));
    }

    // Detail Pengabdian
    public function pengabdian($id)
    {
        $data = Pengabdian::findOrFail($id);
        if($data->asesor1_id == Auth::guard('dosen')->user()->id)
        {
            $status = 'asesor1';
        }
        if($data->asesor2_id == Auth::guard('dosen')->user()->id)
        {
            $status = 'asesor2';
        }
        $title = 'Pengabdian';
        return view('periksa.show_pengabdian', compact(['data', 'title', 'status']));
    }

    // Detail Penunjang
    public function penunjang($id)
    {
        $data = Penunjang::findOrFail($id);
        if($data->asesor1_id == Auth::guard('dosen')->user()->id)
        {
            $status = 'asesor1';
        }
        if($data->asesor2_id == Auth::guard('dosen')->user()->id)
        {
            $status = 'asesor2';
        }
        $title = 'Penunjang';
        return view('periksa.show_penunjang', compact(['data', 'title', 'status']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // Datatable belum diperiksa
    public function datatable_belum_pendidikan()
    {
        $asesor = Auth::guard('dosen')->user()->id;
        $data = Pendidikan::where([['asesor1_id', $asesor], ['status1_bk', 'Belum diperiksa'], ['status1_k', 'Belum diperiksa']])->orWhere([['asesor2_id', $asesor], ['status2_bk', 'Belum diperiksa'], ['status2_k', 'Belum diperiksa']])->get();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => route('periksa.show', $data->id)
                ]);

            })
            ->addColumn('dosen', function($data) {
                return $data->dosen['nama'];

            })
            ->addIndexColumn()->make(true);
    }

    public function datatable_belum_penelitian()
    {
        $asesor = Auth::guard('dosen')->user()->id;
        $data = Penelitian::where([['asesor1_id', $asesor], ['status1_bk', 'Belum diperiksa'], ['status1_k', 'Belum diperiksa']])->orWhere([['asesor2_id', $asesor], ['status2_bk', 'Belum diperiksa'], ['status2_k', 'Belum diperiksa']])->get();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => route('periksa.edit', $data->id)
                ]);

            })
            ->addColumn('dosen', function($data) {
                return $data->dosen['nama'];

            })
            ->addIndexColumn()->make(true);
    }

    public function datatable_belum_pengabdian()
    {
        $asesor = Auth::guard('dosen')->user()->id;
        $data = Pengabdian::where([['asesor1_id', $asesor], ['status1_bk', 'Belum diperiksa'], ['status1_k', 'Belum diperiksa']])->orWhere([['asesor2_id', $asesor], ['status2_bk', 'Belum diperiksa'], ['status2_k', 'Belum diperiksa']])->get();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => route('periksa.pengabdian', $data->id)
                ]);

            })
            ->addColumn('dosen', function($data) {
                return $data->dosen['nama'];

            })
            ->addIndexColumn()->make(true);
    }

    public function datatable_belum_penunjang()
    {
        $asesor = Auth::guard('dosen')->user()->id;
        $data = Penunjang::where([['asesor1_id', $asesor], ['status1_bk', 'Belum diperiksa'], ['status1_k', 'Belum diperiksa']])->orWhere([['asesor2_id', $asesor], ['status2_bk', 'Belum diperiksa'], ['status2_k', 'Belum diperiksa']])->get();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => route('periksa.penunjang', $data->id)
                ]);

            })
            ->addColumn('dosen', function($data) {
                return $data->dosen['nama'];

            })
            ->addIndexColumn()->make(true);
    }

    // Datatable sudah diperiksa
    public function datatable_sudah_pendidikan()
    {
        $asesor = Auth::guard('dosen')->user()->id;
        $data = Pendidikan::where([['asesor1_id', $asesor], ['status1_bk', '!=', 'Belum diperiksa'], ['status1_k', '!=', 'Belum diperiksa']])->orWhere([['asesor2_id', $asesor], ['status2_bk', '!=', 'Belum diperiksa'], ['status2_k', '!=', 'Belum diperiksa']])->get();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => route('periksa.show', $data->id)
                ]);

            })
            ->addColumn('dosen', function($data) {
                return $data->dosen['nama'];

            })
            ->addIndexColumn()->make(true);
    }

    public function datatable_sudah_penelitian()
    {
        $asesor = Auth::guard('dosen')->user()->id;
        $data = Penelitian::where([['asesor1_id', $asesor], ['status1_bk', '!=', 'Belum diperiksa'], ['status1_k', '!=', 'Belum diperiksa']])->orWhere([['asesor2_id', $asesor], ['status2_bk', '!=', 'Belum diperiksa'], ['status2_k', '!=', 'Belum diperiksa']])->get();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => route('periksa.edit', $data->id)
                ]);

            })
            ->addColumn('dosen', function($data) {
                return $data->dosen['nama'];

            })
            ->addIndexColumn()->make(true);
    }

    public function datatable_sudah_pengabdian()
    {
        $asesor = Auth::guard('dosen')->user()->id;
        $data = Pengabdian::where([['asesor1_id', $asesor], ['status1_bk', '!=', 'Belum diperiksa'], ['status1_k', '!=', 'Belum diperiksa']])->orWhere([['asesor2_id', $asesor], ['status2_bk', '!=', 'Belum diperiksa'], ['status2_k', '!=', 'Belum diperiksa']])->get();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => route('periksa.pengabdian', $data->id)
                ]);

            })
            ->addColumn('dosen', function($data) {
                return $data->dosen['nama'];

            })
            ->addIndexColumn()->make(true);
    }

    public function datatable_sudah_penunjang()
    {
        $asesor = Auth::guard('dosen')->user()->id;
        $data = Penunjang::where([['asesor1_id', $asesor], ['status1_bk', '!=', 'Belum diperiksa'], ['status1_k', '!=', 'Belum diperiksa']])->orWhere([['asesor2_id', $asesor], ['status2_bk', '!=', 'Belum diperiksa'], ['status2_k', '!=', 'Belum diperiksa']])->get();
        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action_asesor', [
                    'terima' => route('periksa.penunjang', $data->id)
                ]);

            })
            ->addColumn('dosen', function($data) {
                return $data->dosen['nama'];

            })
            ->addIndexColumn()->make(true);
    }
}
