<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Jurusan;
use App\Fakultas;
use App\Pendidikan;
use App\Penelitian;
use App\Pengabdian;
use App\Penunjang;
use App\Asesor;
use DataTables;
use Auth;
use PDF;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index');
    }

    public function cetak_laporan_rencana_beban_kerja_pdf()
    {
        $dosen = Dosen::findOrFail(Auth::guard('dosen')->user()->id);
        $pendidikan = Pendidikan::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $penelitian = Penelitian::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $pengabdian = Pengabdian::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $penunjang = Penunjang::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $pdf = PDF::loadview('dosen.laporan_rencana_beban_kerja',['dosen'=>$dosen, 'pendidikan'=>$pendidikan, 
        'penelitian'=>$penelitian, 'pengabdian'=>$pengabdian, 'penunjang'=>$penunjang]);
        return $pdf->stream('laporan-rencana-beban-kerja-pdf');
    }

    public function cetak_laporan_kinerja_pdf()
    {
        $dosen = Dosen::findOrFail(Auth::guard('dosen')->user()->id);
        $pendidikan = Pendidikan::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $penelitian = Penelitian::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $pengabdian = Pengabdian::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $penunjang = Penunjang::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $asesor = Asesor::where('dosen_id', Auth::guard('dosen')->user()->id)->first();
        $pdf = PDF::loadview('dosen.laporan_kinerja',['dosen'=>$dosen, 'pendidikan'=>$pendidikan, 
        'penelitian'=>$penelitian, 'pengabdian'=>$pengabdian, 'penunjang'=>$penunjang, 'asesor'=>$asesor]);
        return $pdf->stream('laporan-kinerja-dosen-pdf');
    }
    
    public function cetak_kesimpulan_kinerja_dosen_pdf()
    {
        $dosen = Dosen::findOrFail(Auth::guard('dosen')->user()->id);
        $pendidikan = Pendidikan::where([['dosen_id', Auth::guard('dosen')->user()->id],['rekomendasi', 'Selesai']])->sum('sks_kinerja');
        $penelitian = Penelitian::where([['dosen_id', Auth::guard('dosen')->user()->id],['rekomendasi', 'Selesai']])->sum('sks_kinerja');
        $pengabdian = Pengabdian::where([['dosen_id', Auth::guard('dosen')->user()->id],['rekomendasi', 'Selesai']])->sum('sks_kinerja');
        $penunjang = Penunjang::where([['dosen_id', Auth::guard('dosen')->user()->id],['rekomendasi', 'Selesai']])->sum('sks_kinerja');
        $a = $pendidikan + $penelitian; // Pendidikan + Penelitian
        $b = $pengabdian + $penunjang; // Pengabdian + Penunjang
        $total = $a + $b; //Total Kinerja
        $asesor = Asesor::where('dosen_id', Auth::guard('dosen')->user()->id)->first();
        $pdf = PDF::loadview('dosen.kesimpulan_kinerja_dosen',['dosen'=>$dosen, 'pendidikan'=>$pendidikan, 
        'penelitian'=>$penelitian, 'pengabdian'=>$pengabdian, 'penunjang'=>$penunjang, 'asesor'=>$asesor, 'a'=>$a, 'b'=>$b, 'total'=>$total]);
        return $pdf->stream('laporan-kesimpulan-kinerja-dosen-pdf');
    }
    public function cetak_kesimpulan_kewajiban_khusus_pdf()
    {
        $dosen = Dosen::findOrFail(Auth::guard('dosen')->user()->id);
        $pendidikan = Pendidikan::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $penelitian = Penelitian::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $pengabdian = Pengabdian::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $penunjang = Penunjang::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $asesor = Asesor::where('dosen_id', Auth::guard('dosen')->user()->id)->first();
        $pdf = PDF::loadview('dosen.kesimpulan_kewajiban_khusus',['dosen'=>$dosen, 'pendidikan'=>$pendidikan, 
        'penelitian'=>$penelitian, 'pengabdian'=>$pengabdian, 'penunjang'=>$penunjang, 'asesor'=>$asesor]);
        return $pdf->stream('laporan-kesimpulan-kewajiban-khusus-pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Fakultas::all();
        return view('dosen.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nidn' => 'required',
        //     'nama' => 'required',
        //     'jurusan_id' => 'required',
        //     'password' => 'required',
        // ]);
        $message = array(
            'nidn.required' => 'NIDN Tidak Boleh Kosong',
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'fakultas_id.required' => 'Fakultas Tidak Boleh Kosong',
            'jurusan_id.required' => 'Jurusan/Program Studi Tidak Boleh Kosong',
        );
        $rules = array(
            'nidn' => 'required',
            'nama' => 'required',
            'jurusan_id' => 'required',
            'fakultas_id' => 'required',
                    
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $input = $request->except('password');
            $input['password'] = bcrypt($request->password);
            $data = Dosen::create($input);
            if($data){
                Alert::success('Berhasil');
                return redirect()->route('dosen.index');
            } else {
                Alert::error('Gagal');
                return redirect()->back();
            }
        }
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password_lama' => 'required',
            'password_baru' => 'required|same:password_baru',
            'konfirmasi' => 'required|same:password_baru',
        ]);
        $input = $request->all();
        $pass = Auth::guard('dosen')->user()->password;
        if(Hash::check($input['password_lama'], $pass))
        {
            $data = Dosen::findOrFail(Auth::guard('dosen')->user()->id);
            $data->password = bcrypt($input['password_baru']);
            $data->save();
            return redirect()->back()->with(['success' => 'Berhasil Mengubah Password !']);
            // return 'OK';
        } else {
            return redirect()->back()->with(['error' => 'Gagal Megubah Password !']);
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
        return view('dosen.show', compact('data'));
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
        return view('dosen.edit', compact('data', 'fak'));
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
            'nidn' => 'required',
        ]);
        $input = $request->except('password');
        if($request->password != null)
        {
            $input['password'] = bcrypt($request->password);
        }
        $data = Dosen::findOrFail($id);
        $data->update($input);
        return redirect()->route('dosen.index');
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
        return redirect()->route('dosen.index');
    }

    public function datatable()
    {
        $data = Dosen::all();

        return Datatables::of($data)
            ->addColumn('jurusan', function($data) {
                return $data->jurusan['nama'];
            })
            ->addColumn('fakultas', function($data) {
                return $data->jurusan['fakultas']['nama'];
            })
            ->addColumn('action', function($data) {
                return view('datatable.action_show', [
                    'edit_url' => route('dosen.edit', $data->id),
                    'del_url'  => route('dosen.destroy', $data->id),
                    'show_url'  => route('dosen.show', $data->id),
                ]);

            })
            ->addIndexColumn()->make(true);
    }
}
