<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jurusan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fak = Fakultas::all();
        return view('jurusan.add', compact('fak'));
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
            'nama' => 'required',
            'jenjang' => 'required',
            'fakultas_id' => 'required'
        ]);
        $input = $request->all();
        $data = Jurusan::create($input);
        if($data){
            Alert::success('Berhasil');
            return redirect()->route('jurusan.index');
        } else {
            Alert::error('Gagal');
            return redirect()->back();
        }
        // return redirect()->route('jurusan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jurusan::findOrFail($id);
        return view('jurusan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('data'));
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
            'nama' => 'required',
        ]);
        $input = $request->all();
        $data = Jurusan::findOrFail($id);
        $data->update($input);
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jurusan::findOrFail($id);
        $data->delete();
        return redirect()->route('jurusan.index');
    }

    public function datatable()
    {
        $data = Jurusan::all();

        return Datatables::of($data)
            ->addColumn('fakultas', function($data) {
                return $data->fakultas['nama'];
            })
            ->addColumn('action', function($data) {
                return view('datatable.action', [
                    'edit_url' => route('jurusan.edit', $data->id),
                    'del_url'  => route('jurusan.destroy', $data->id),
                ]);

            })
            ->addIndexColumn()->make(true);
    }
}
