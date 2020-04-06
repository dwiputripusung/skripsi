<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesor;
use App\Dosen;
use App\Jurusan;
use App\Fakultas;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asesor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Fakultas::all();
        return view('asesor.add', compact('data'));
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
            'nira' => 'required',
        ]);
        $data = Dosen::where('nira', $request->nira)->first();
        if(!$data){
            Alert::success('Berhasil');
            return redirect()->back();
        } else {
            $input['level'] = '1'; //Level Asesor
            $data->update($input);
            Alert::success('Berhasil');
            return redirect()->route('asesor.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dosen::findOrFail($id);
        return view('asesor.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fak = Fakultas::all();
        $data = Dosen::findOrFail($id);
        return view('asesor.edit', compact('data', 'fak'));
    }

    //Ambil Data Jurusan
    public function getJur($id)
    {
        $data = Jurusan::where('fakultas_id', $id)->get();
        $return = '<option> Pilih Jurusan </option>';
        foreach($data as $jur){
            $return .= "<option value='$jur->id'>$jur->nama</option>";
        }
        return $return;
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
            'nira' => 'required',
        ]);
        $input = $request->except('password');
        if($request->password != null)
        {
            $input['password'] = bcrypt($request->password);
        }
        $data = Dosen::findOrFail($id);
        $data->update($input);
        return redirect()->route('asesor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Dosen::findOrFail($id);
        $data->delete();
        return redirect()->route('asesor.index');
    }

    public function datatable()
    {
        $data = Dosen::where('level', '1')->get();

        return Datatables::of($data)
            ->addColumn('jurusan', function($data) {
                return $data->jurusan['nama'];
            })
            ->addColumn('fakultas', function($data) {
                return $data->jurusan['fakultas']['nama'];
            })
            ->addColumn('action', function($data) {
                return view('datatable.action_show', [
                    'edit_url' => route('asesor.edit', $data->id),
                    'del_url'  => route('asesor.destroy', $data->id),
                    'show_url'  => route('asesor.show', $data->id),
                ]);

            })
            ->addIndexColumn()->make(true);
    }
}
