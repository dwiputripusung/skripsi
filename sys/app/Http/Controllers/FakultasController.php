<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fakultas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.add');
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
            
        ]);
        $input = $request->all();
        $data = Fakultas::create($input);
        //Berhasil
        if($data){
            Alert::success('Berhasil');
            return redirect()->route('fakultas.index');
        } else {
            Alert::error('Gagal');
            return redirect()->back();
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
        $data = Fakultas::findOrFail($id);
        return view('fakultas.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fakultas::findOrFail($id);
        return view('fakultas.edit', compact('data'));
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
        $data = Fakultas::findOrFail($id);
        $data->update($input);
        return redirect()->route('fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Fakultas::findOrFail($id);
        $data->delete();
        return redirect()->route('fakultas.index');
    }

    public function datatable()
    {
        $data = Fakultas::all();

        return Datatables::of($data)
            ->addColumn('action', function($data) {
                return view('datatable.action', [
                    'edit_url' => route('fakultas.edit', $data->id),
                    'del_url'  => route('fakultas.destroy', $data->id),
                ]);

            })
            ->addIndexColumn()->make(true);
    }
}
