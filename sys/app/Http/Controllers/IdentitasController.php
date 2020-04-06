<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Asesor;
use Auth;
use Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class IdentitasController extends Controller
{
    public function index()
    {
        $data = Dosen::findOrFail(Auth::guard('dosen')->user()->id);
        $asesor = Dosen::where('level', '1')->get();
        $asesors = Dosen::where('level', '1')->get();
        return view('identitas.index', compact('data', 'asesor', 'asesors'));
    }

    public function getnidn($id)
    {
        $data = Dosen::findOrFail($id);
        return $data['nidn'];
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nidn' => 'required',
        // ]);
        $message = array(
            'nidn.required' => 'NIDN Tidak Boleh Kosong',
            'no_sertifikat.required' => 'No.Sertifikat Tidak Boleh Kosong',
            'no_sertifikat_upload.required' => 'File Serdos Tidak Boleh Kosong',
            'nip.required' => 'NIP Tidak Boleh Kosong',
            'pt.required' => 'Perguruan Tinggi Tidak Boleh Kosong',
            'alamat_pt.required' => 'Alamat Perguruan Tinggi Tidak Boleh Kosong',
            'nama_rektor.required' => 'Nama Rektor Tidak Boleh Kosong',
            'nama_dekan.required' => 'Nama Dekan Tidak Boleh Kosong',
            'nama_kajur.required' => 'Nama Kajur/Kaprodi Tidak Boleh Kosong',
            'jab_fungsional.required' => 'Jabatan Fungsional Tidak Boleh Kosong',
            'golongan.required' => 'Golongan Tidak Boleh Kosong',
            'tgl_lhr.required' => 'Tanggal Lahir Tidak Boleh Kosong',
            'tmpt_lhr.required' => 'Tempat Lahir Tidak Boleh Kosong',
            'pend_s1.required' => 'Pendidikan S1 Tidak Boleh Kosong',
            'ijazah_s1.required' => 'File Ijazah S1 Tidak Boleh Kosong',
            'pend_s2.required' => 'Pendidikan S2 Tidak Boleh Kosong',
            'ijazah_s2.required' => 'File Ijazah S2 Tidak Boleh Kosong',
            'jenis_dosen.required' => 'Jenis Dosen Tidak Boleh Kosong',
            'bid_ilmu.required' => 'Bidang Ilmu Tidak Boleh Kosong',
            'thn_akademik.required' => 'Tahun Akademik Tidak Boleh Kosong',
            'semester.required' => 'Semester Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'ktp.required' => 'File KTP Tidak Boleh Kosong',
            'foto.required' => 'File Foto Tidak Boleh Kosong',
        );
        $rules = array(
            'nidn' => 'required',
            'no_sertifikat' => 'required',
            'no_sertifikat_upload' => 'required',
            'nip' => 'required',
            'pt' => 'required',
            'alamat_pt' => 'required',
            'nama_rektor' => 'required',
            'nama_dekan' => 'required',
            'nama_kajur' => 'required',
            'jab_fungsional' => 'required',
            'golongan' => 'required',
            'tgl_lhr' => 'required',
            'tmpt_lhr' => 'required',
            'pend_s1' => 'required',
            'ijazah_s1' => 'required',
            'pend_s2' => 'required',
            'ijazah_s2' => 'required',
            'jenis_dosen' => 'required',
            'bid_ilmu' => 'required',
            'thn_akademik' => 'required',
            'semester' => 'required',
            'email' => 'required',
            'ktp' => 'required',
            'foto' => 'required',
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
        $data = Dosen::findOrFail(Auth::guard('dosen')->user()->id);
        $input = $request->except('no_sertifikat_upload', 'ijazah_s1', 'ijazah_s2', 'ijazah_s3', 'ktp', 'foto', 'asesor1', 'asesor2');
        if($request->hasFile('no_sertifikat_upload')){
            if($data->no_sertifikat_upload != null)
            {
                Storage::delete($data->no_sertifikat_upload);
            }
            $no_sertifikat_upload = $request->file('no_sertifikat_upload');
            $input['no_sertifikat_upload'] = $no_sertifikat_upload->store('no_sertifikat_upload');
        }
        if($request->hasFile('ijazah_s1')){
            if($data->ijazah_s1 != null)
            {
                Storage::delete($data->ijazah_s1);
            }
            $ijazah_s1 = $request->file('ijazah_s1');
            $input['ijazah_s1'] = $ijazah_s1->store('ijazah_s1');
        }
        if($request->hasFile('ijazah_s2')){
            if($data->ijazah_s2 != null)
            {
                Storage::delete($data->ijazah_s1);
            }
            $ijazah_s2 = $request->file('ijazah_s2');
            $input['ijazah_s2'] = $ijazah_s2->store('ijazah_s2');
        }
        if($request->hasFile('ijazah_s3')){
            if($data->ijazah_s3 != null)
            {
                Storage::delete($data->ijazah_s3);
            }
            $ijazah_s3 = $request->file('ijazah_s3');
            $input['ijazah_s3'] = $ijazah_s3->store('ijazah_s3');
        }
        if($request->hasFile('ktp')){
            if($data->ktp != null)
            {
                Storage::delete($data->ktp);
            }
            $ktp = $request->file('ktp');
            $input['ktp'] = $ktp->store('ktp');
        }
        if($request->hasFile('foto')){
            if($data->foto != null)
            {
                Storage::delete($data->foto);
            }
            $foto = $request->file('foto');
            $input['foto'] = $foto->store('foto');
        }
        
        $asesor['asesor1_id'] = $request->asesor1;
        $asesor['asesor2_id'] = $request->asesor2;
        $asesor['dosen_id'] = $data->id;
        Asesor::create($asesor);
        $data->update($input);
        Alert::success('Berhasil');
        return redirect()->route('identitas.index');
    }
}
}