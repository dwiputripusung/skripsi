<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Asesor;
use App\kewajiban_khusus;
use Auth;
use Storage;
use DataTables;
use App\jurnal_internasional_bereputasi;
use App\jurnal_internasional;
use App\seminar_internasional_terindeks;
use App\jurnal_nasional_terakreditasi;
use App\jurnal_nasional;
use App\paten;
use App\karya_monumental;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class KewajibanKhususController extends Controller
{
    public function index()
    {
        $data = Dosen::findOrFail(Auth::guard('dosen')->user()->id);
        $asesor = Dosen::where('level', '1')->get();
        $asesors = Dosen::where('level', '1')->get();
        return view('kewajiban_khusus.index', compact('data', 'asesor', 'asesors'));
    }

    public function index_kewajiban_khusus()
    {
        return view('kewajiban_khusus.index_kewajibankhusus');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kewajiban_khusus.add');
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
            'periode' => 'required',
            'tahun' => 'required',
            'judul_karya' => 'required',
            'jenis_karya' => 'required'
        ]);
 
        
        $input = $request->only('periode', 'tahun', 'judul_karya', 'jenis_karya');
        $input['dosen_id'] = Auth::guard('dosen')->user()->id;
        $data = kewajiban_khusus::create($input); //Kase sesuai
        if($input['jenis_karya'] == 'Jurnal Internasional Bereputasi') {            
                    // File
                    if($request->hasFile('artikel_1'))
                    {
                        $artikel = $request->file('artikel_1');
                        $j['artikel'] = $artikel->store('jurnal_internasional_bereputasi');
                    } 
                    if($request->hasFile('cover_depan_1'))
                    {
                        $cover_depan = $request->file('cover_depan_1');
                        $j['cover_depan'] = $cover_depan->store('jurnal_internasional_bereputasi');
                    }
                    if($request->hasFile('daftar_isi_1'))
                    {
                        $daftar_isi = $request->file('daftar_isi_1');
                        $j['daftar_isi'] = $daftar_isi->store('jurnal_internasional_bereputasi');
                    }
                    if($request->hasFile('lain_lain_1'))
                    {
                        $lain_lain = $request->file('lain_lain_1');
                        $j['lain_lain'] = $lain_lain->store('jurnal_internasional_bereputasi');
                    }
                    $j['kewajiban_khususes_id'] = $data->id;
                    $j['nama_jurnal'] = $request->nama_jurnal_1;
                    $j['volume'] = $request->volume_1;
                    $j['nomor'] = $request->nomor_1;
                    $j['impact_factor'] = $request->impact_factor_1;
                    $j['almt_url'] = $request->almt_url_1;
        jurnal_internasional_bereputasi::create($j); 
                } else if ($input['jenis_karya'] == 'Jurnal Internasional') {
                    // File
                    if($request->hasFile('artikel_2'))
                    {
                        $artikel = $request->file('artikel_2');
                        $j['artikel'] = $artikel->store('jurnal_internasional');
                    } 
                    if($request->hasFile('cover_depan_2'))
                    {
                        $cover_depan = $request->file('cover_depan_2');
                        $j['cover_depan'] = $cover_depan->store('jurnal_internasional');
                    }
                    if($request->hasFile('daftar_isi_2'))
                    {
                        $daftar_isi = $request->file('daftar_isi_2');
                        $j['daftar_isi'] = $daftar_isi->store('jurnal_internasional');
                    }
                    if($request->hasFile('lain_lain_2'))
                    {
                        $lain_lain = $request->file('lain_lain_2');
                        $j['lain_lain'] = $lain_lain->store('jurnal_internasional');
                    }
                    $j['nama_jurnal'] = $request->nama_jurnal_2;
                    $j['volume'] = $request->volume_2;
                    $j['nomor'] = $request->nomor_2;
                    $j['impact_factor'] = $request->impact_factor_2;
                    $j['almt_url'] = $request->almt_url_2;
                    $j['kewajiban_khususes_id'] = $data->id;
        jurnal_internasional::create($j);                    
                } else if ($input['jenis_karya'] == 'Seminar Internasional Terindeks') {
                    // File
                    if($request->hasFile('artikel_3'))
                    {
                        $artikel = $request->file('artikel_3');
                        $j['artikel'] = $artikel->store('seminar_internasional_terindeks');
                    } 
                    if($request->hasFile('cover_depan_prosiding'))
                    {
                        $cover_depan_prosiding = $request->file('cover_depan_prosiding');
                        $j['cover_depan_prosiding'] = $cover_depan_prosiding->store('seminar_internasional_terindeks');
                    }
                    if($request->hasFile('daftar_isi_prosiding'))
                    {
                        $daftar_isi_prosiding = $request->file('daftar_isi_prosiding');
                        $j['daftar_isi_prosiding'] = $daftar_isi_prosiding->store('seminar_internasional_terindeks');
                    }
                    if($request->hasFile('lain_lain_3'))
                    {
                        $lain_lain = $request->file('lain_lain_3');
                        $j['lain_lain'] = $lain_lain->store('seminar_internasional_terindeks');
                    }
                    $j['nama_seminar'] = $request->nama_seminar;
                    $j['tmpt_seminar'] = $request->tmpt_seminar;
                    $j['penyelenggara'] = $request->penyelenggara;
                    $j['almt_url'] = $request->almt_url_3;
                    $j['kewajiban_khususes_id'] = $data->id;
        seminar_internasional_terindeks::create($j); 
                } else if ($input['jenis_karya'] == 'Jurnal Nasional Terakreditasi') {
                    // File
                    if($request->hasFile('artikel_4'))
                    {
                        $artikel = $request->file('artikel_4');
                        $j['artikel'] = $artikel->store('jurnal_nasional_terakreditasi');
                    } 
                    if($request->hasFile('cover_depan_3'))
                    {
                        $cover_depan = $request->file('cover_depan_3');
                        $j['cover_depan'] = $cover_depan->store('jurnal_nasional_terakreditasi');
                    }
                    if($request->hasFile('daftar_isi_3'))
                    {
                        $daftar_isi = $request->file('daftar_isi_3');
                        $j['daftar_isi'] = $daftar_isi->store('jurnal_nasional_terakreditasi');
                    }
                    if($request->hasFile('lain_lain_4'))
                    {
                        $lain_lain = $request->file('lain_lain_4');
                        $j['lain_lain'] = $lain_lain->store('jurnal_nasional_terakreditasi');
                    }
                    $j['nama_jurnal'] = $request->nama_jurnal_3;
                    $j['bahasa_jurnal'] = $request->bahasa_jurnal;
                    $j['akreditasi'] = $request->akreditasi;
                    $j['almt_url'] = $request->almt_url_4;
                    $j['status_doaj'] = $request->status_doaj;
                    $j['kewajiban_khususes_id'] = $data->id;
        jurnal_nasional_terakreditasi::create($j); 
                } else if ($input['jenis_karya'] == 'Jurnal Nasional') {
                    // File
                    if($request->hasFile('artikel_5'))
                    {
                        $artikel = $request->file('artikel_5');
                        $j['artikel'] = $artikel->store('jurnal_nasional');    
                    }
                    if($request->hasFile('cover_depan_4'))
                    {
                        $cover_depan = $request->file('cover_depan_4');
                        $j['cover_depan'] = $cover_depan->store('jurnal_nasional');    
                    }
                    if($request->hasFile('daftar_isi_4'))
                    {
                        $daftar_isi = $request->file('daftar_isi_4');
                        $j['daftar_isi'] = $daftar_isi->store('jurnal_nasional');  
                    }
                    if($request->hasFile('lain_lain_5'))
                    {
                        $lain_lain = $request->file('lain_lain_5');
                        $j['lain_lain'] = $lain_lain->store('jurnal_nasional');
                    }
                    $j['nama_jurnal'] = $request->nama_jurnal_4;
                    $j['terindeks'] = $request->terindeks;
                    $j['standart_tatakelola'] = $request->standart_tatakelola;
                    $j['almt_url'] = $request->almt_url_5;
                    $j['kewajiban_khususes_id'] = $data->id;
        jurnal_nasional::create($j); 
                } else if ($input['jenis_karya'] == 'Paten') {
                    // File
                    if($request->hasFile('sertifikat'))
                    {
                        $sertifikat = $request->file('sertifikat');
                        $j['sertifikat'] = $sertifikat->store('paten');
                    }
                    if($request->hasFile('deskripsi_paten'))
                    {
                        $deskripsi_paten = $request->file('deskripsi_paten');
                        $j['deskripsi_paten'] = $deskripsi_paten->store('paten'); 
                    }
                    if($request->hasFile('lain_lain_6'))
                    {
                        $lain_lain = $request->file('lain_lain_6');
                        $j['lain_lain'] = $lain_lain->store('paten');
                    }
                    $j['jenis_hki'] = $request->jenis_hki;
                    $j['no_sertifikat'] = $request->no_sertifikat;
                    $j['almt_url'] = $request->almt_url_6;
                    $j['kewajiban_khususes_id'] = $data->id;
        paten::create($j);          
                } else if ($input['jenis_karya'] == 'Karya Monumental') {
                    // File
                    if($request->hasFile('bukti_karya'))
                    {
                        $bukti_karya = $request->file('bukti_karya');
                        $j['bukti_karya'] = $bukti_karya->store('karya_monumental');
                    }
                    if($request->hasFile('peer_reviewer'))
                    {
                        $peer_reviewer = $request->file('peer_reviewer');
                        $j['peer_reviewer'] = $peer_reviewer->store('karya_monumental');
                    }
                    if($request->hasFile('lain_lain_7'))
                    {
                        $lain_lain = $request->file('lain_lain_7');
                        $j['lain_lain'] = $lain_lain->store('karya_monumental');
                    }
                    $j['lingkup_kegiatan'] = $request->lingkup_kegiatan;
                    $j['tempat_publikasi'] = $request->tempat_publikasi;
                    $j['kewajiban_khususes_id'] = $data->id;
        karya_monumental::create($j); 
                }
                Alert::success('Berhasil');
        return redirect()->route('kewajiban_khusus.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = kewajiban_khusus::findOrFail($id);
        return view('kewajiban_khusus.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = kewajiban_khusus::findOrFail($id);
        return view('kewajiban_khusus.edit', compact('data'));
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
        // periksa kewajiban
        if($request->tipe == 'periksa')
        {
            $this->validate($request, [
                'status' => 'required',
            ]);
            $input['komen'] = $request->komen;
            $input['status'] = $request->status;
            $data = kewajiban_khusus::findOrFail($id);
            $data->update($input);
            return redirect()->route('kewajibankhusus.index');
        } else {
            $this->validate($request, [
                'periode' => 'required',
                'tahun' => 'required',
                'judul_karya' => 'required',
                'jenis_karya' => 'required'
            ]);
            $input = $request->all();
            $data = kewajiban_khusus::findOrFail($id);
            $data->update($input);
            Alert::success('Berhasil');
            return redirect()->route('kewajiban_khusus.index');
        }
    }
 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kewajiban_khusus::findOrFail($id);
        $data->delete();
        return redirect()->route('kewajiban_khusus.index');
    }

    public function datatable()
    {
        
        $data = kewajiban_khusus::where('dosen_id', Auth::guard('dosen')->user()->id)->get();

        return Datatables::of($data)
        ->addColumn('action', function($data) {
            return view('datatable.action', [
                'edit_url' => route('kewajiban_khusus.edit', $data->id),
                'del_url'  => route('kewajiban_khusus.destroy', $data->id),
            ]);

        })
        ->addColumn('forum', function($data) {
         
        })  
        ->addColumn('status', function($data) {
                if($data->status == 'Belum diperiksa'){
                    return 'Belum Diperiksa';
                } else if($data->status == 'Terima'){
                    return 'Diterima';
                } else {
                    return 'Ditolak';
                }
        })
        ->addColumn('komen', function($data) {
            if($data->komen == null)
            {
                return '-';
            } else {
                return $data->komen;
            }
        })

        ->addIndexColumn()->make(true);
    }

    public function datatable_kewajiban_khusus_asesor()
    {
        $asesor = Asesor::select('dosen_id')->where('asesor1_id', Auth::guard('dosen')->user()->id)->get();
        $data = kewajiban_khusus::whereIn('dosen_id', $asesor)->get();

        return Datatables::of($data)
        ->addColumn('action', function($data) {
            return view('datatable.action_asesor', [
                'terima' => route('kewajiban_khusus.show', $data->id)
            ]);
        })
            ->addColumn('dosen', function($data) {
           return $data->dosen['nama'];
                
        })
        ->addColumn('status', function($data) {
            if($data->status == 'Belum diperiksa'){
                return 'Belum Diperiksa';
            } else if($data->status == 'Terima'){
                return 'Diterima';
            } else {
                return 'Ditolak';
            }
        })

        ->addColumn('komen', function($data) {
            if($data->komen == null)
            {
                return '-';
            } else {
                return $data->komen;
            }
        })

        ->addIndexColumn()->make(true);
    }

}
