@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dosen
        <small>Identitas Dosen</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dosen</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Dosen</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('identitas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="no_sertifikat">No. Setifikat <i class="fa fa-asterisk" style="color:red"></i></label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('no_sertifikat') ? ' is-invalid' : '' }}"
                                        id="no_sertifikat" name="no_sertifikat" value="{{ $data->no_sertifikat }}" readonly>
                                    @if ($errors->has('no_sertifikat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_sertifikat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="no_sertifikat_upload">Upload File Serdos <i class="fa fa-asterisk" style="color:red"></i></label>
                                    <input type="file"
                                        class="form-control{{ $errors->has('no_sertifikat_upload') ? ' is-invalid' : '' }}"
                                        id="no_sertifikat_upload" name="no_sertifikat_upload" value="{{ $data->no_sertifikat_upload }}" readonly>
                                    @if ($errors->has('no_sertifikat_upload'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_sertifikat_upload') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nip">NIP/No. Kepeg <i class="fa fa-asterisk" style="color:red"></i></label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}" id="nip"
                                        name="nip" value="{{ $data->nip }}" readonly>
                                    @if ($errors->has('nip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nidn">NIDN <i class="fa fa-asterisk" style="color:red"></i></label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nidn') ? ' is-invalid' : '' }}" id="nidn"
                                        name="nidn" value="{{ $data->nidn }}" readonly>
                                    @if ($errors->has('nidn'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nidn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama <i class="fa fa-asterisk" style="color:red"></i></label>
                            <input type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                id="nama" name="nama" value="{{ $data->nama }}" readonly>
                            @if ($errors->has('nama'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gelar_depan">Gelar Depan</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('gelar_depan') ? ' is-invalid' : '' }}"
                                        id="gelar_depan" name="gelar_depan" value="{{ $data->gelar_depan }}" readonly>
                                    @if ($errors->has('gelar_depan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gelar_depan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gelar_belakang">Gelar Belakang</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('gelar_belakang') ? ' is-invalid' : '' }}"
                                        id="gelar_belakang" name="gelar_belakang" value="{{ $data->gelar_belakang }}" readonly>
                                    @if ($errors->has('gelar_belakang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gelar_belakang') }}</strong>
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pt">Perguruan Tinggi <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text" class="form-control{{ $errors->has('pt') ? ' is-invalid' : '' }}"
                                    id="pt" name="pt" value="{{ $data->pt }}" readonly>
                                @if ($errors->has('pt'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pt') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="alamat_pt">Alamat Perguruan Tinggi <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                    class="form-control{{ $errors->has('alamat_pt') ? ' is-invalid' : '' }}"
                                    id="alamat_pt" name="alamat_pt" value="{{ $data->alamat_pt }}" readonly>
                                @if ($errors->has('alamat_pt'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('alamat_pt') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nama_rektor">Nama Rektor <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                    class="form-control{{ $errors->has('nama_rektor') ? ' is-invalid' : '' }}"
                                    id="nama_rektor" name="nama_rektor" value="{{ $data->nama_rektor }}" readonly>
                                @if ($errors->has('nama_rektor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_rektor') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="fakultas">Fakultas </label>
                                <input type="text"
                                    class="form-control{{ $errors->has('fakultas') ? ' is-invalid' : '' }}"
                                    value="{{ $data->jurusan['fakultas']['nama'] }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_dekan">Nama Dekan <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                    class="form-control{{ $errors->has('nama_dekan') ? ' is-invalid' : '' }}"
                                    id="nama_dekan" name="nama_dekan" value="{{ $data->nama_dekan }}" readonly>
                                @if ($errors->has('nama_dekan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_dekan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="fakultas">Jurusan/Program Studi</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('fakultas') ? ' is-invalid' : '' }}"
                                    value="{{ $data->jurusan['nama'] }}" readonly>
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_kajur">Nama Ketua Jurusan/Program Studi <i class="fa fa-asterisk" style="color:red"></i></label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nama_kajur') ? ' is-invalid' : '' }}"
                                        id="nama_kajur" name="nama_kajur" value="{{ $data->nama_kajur }}" readonly>
                                    @if ($errors->has('nama_kajur'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_kajur') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jab_fungsional">Jabatan Fungsional <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                class="form-control{{ $errors->has('jab_fungsional') ? ' is-invalid' : '' }}"
                                value="{{ $data->jab_fungsional }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="golongan">Golongan <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                class="form-control{{ $errors->has('golongan') ? ' is-invalid' : '' }}"
                                value="{{ $data->golongan }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tgl_lhr">Tanggal Lahir <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="date"
                                    class="form-control{{ $errors->has('tgl_lhr') ? ' is-invalid' : '' }}" id="tgl_lhr"
                                    name="tgl_lhr" value="{{ $data->tgl_lhr }}" readonly>
                                @if ($errors->has('tgl_lhr'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tgl_lhr') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tmpt_lhr">Tempat Lahir <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                    class="form-control{{ $errors->has('tmpt_lhr') ? ' is-invalid' : '' }}"
                                    id="tmpt_lhr" name="tmpt_lhr" value="{{ $data->tmpt_lhr }}" readonly>
                                @if ($errors->has('tmpt_lhr'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tmpt_lhr') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pend_s1">Pendidikan S1 <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                    class="form-control{{ $errors->has('pend_s1') ? ' is-invalid' : '' }}" id="pend_s1"
                                    name="pend_s1" value="{{ $data->pend_s1 }}" readonly>
                                @if ($errors->has('pend_s1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pend_s1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ijazah_s1">Ijazah S1 <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="file"
                                    class="form-control{{ $errors->has('ijazah_s1') ? ' is-invalid' : '' }}" id="ijazah_s1"
                                    name="ijazah_s1" value="{{ $data->ijazah_s1 }}" readonly>
                                @if ($errors->has('ijazah_s1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ijazah_s1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pend_s2">Pendidikan S2 <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                    class="form-control{{ $errors->has('pend_s2') ? ' is-invalid' : '' }}" id="pend_s2"
                                    name="pend_s2" value="{{ $data->pend_s2 }}" readonly>
                                @if ($errors->has('pend_s2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pend_s2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ijazah_s2">Ijazah S2 <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="file"
                                    class="form-control{{ $errors->has('pend_s2') ? ' is-invalid' : '' }}" id="pend_s2"
                                    name="ijazah_s2" value="{{ $data->pend_s2 }}" readonly>
                                @if ($errors->has('ijazah_s2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ijazah_s2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pend_s3">Pendidikan S3</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('pend_s3') ? ' is-invalid' : '' }}" id="pend_s3"
                                    name="pend_s3" value="{{ $data->pend_s3 }}" readonly>
                                @if ($errors->has('pend_s3'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pend_s3') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ijazah_s3">Ijazah</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('ijazah_s3') ? ' is-invalid' : '' }}" id="ijazah_s3"
                                    name="ijazah_s3" value="{{ $data->ijazah_s3 }}" readonly>
                                @if ($errors->has('ijazah_s3'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ijazah_s3') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_dosen">Jenis Dosen <i class="fa fa-asterisk" style="color:red"></i></label>
                        <input type="text"
                        class="form-control{{ $errors->has('jenis_dosen') ? ' is-invalid' : '' }}"
                        value="{{ $data->jenis_dosen }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="bid_ilmu">Bidang Ilmu <i class="fa fa-asterisk" style="color:red"></i></label>
                        <input type="text" class="form-control{{ $errors->has('bid_ilmu') ? ' is-invalid' : '' }}"
                            id="bid_ilmu" name="bid_ilmu" value="{{ $data->bid_ilmu }}" readonly>
                        @if ($errors->has('bid_ilmu'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bid_ilmu') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="asesor1">Asesor 1 <i class="fa fa-asterisk" style="color:red"></i></label>
                                <select class="form-control{{ $errors->has('asesor1') ? ' is-invalid' : '' }}"
                                    id="asesor1" name="asesor1">
                                    @php
                                        $ase = App\Asesor::where('dosen_id', Auth::guard('dosen')->user()->id)->first(); 
                                        if($ase != null)
                                        {
                                            $nidn1 = App\Dosen::findOrFail($ase['asesor1_id']);
                                            $nidn2 = App\Dosen::findOrFail($ase['asesor2_id']);
                                        } else {
                                            $nidn1 = null;
                                            $nidn2 = null;
                                        }
                
                                    @endphp
                                    <option>Pilih</option>
                                    @foreach($asesor as $asesor)
                                    <option value="{{ $asesor->id }}" {{ $ase['asesor1_id'] == $asesor->id ? 'selected' : '' }}>{{ $asesor->nama }}</option>
                                    @endforeach
                                    @if ($errors->has('jenis_dosen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_dosen') }}</strong>
                                    </span>
                                    @endif
                                    {{ $data->semester == 'Ganjil' ? 'selected' : '' }}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nidn1">NIDN <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                    class="form-control{{ $errors->has('nidn1') ? ' is-invalid' : '' }}"
                                    id="nidn1" name="nidn1" value="{{ $nidn1 != null ? $nidn1['nidn'] : ''  }}">
                                @if ($errors->has('nidn1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nidn1') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="asesor2">Asesor 2 <i class="fa fa-asterisk" style="color:red"></i></label>
                                <select class="form-control{{ $errors->has('asesor2') ? ' is-invalid' : '' }}"
                                    id="asesor2" name="asesor2">
                                    
                                    <option>Pilih</option>
                                    @foreach($asesors as $asesors)
                                    <option value="{{ $asesors->id }}" {{ $ase['asesor2_id'] == $asesor->id ? 'selected' : '' }}>{{ $asesors->nama }}</option>
                                    @endforeach
                                    @if ($errors->has('jenis_dosen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_dosen') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nidn2">NIDN <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text" class="form-control{{ $errors->has('nidn2') ? ' is-invalid' : '' }}"
                                    id="nidn2" name="nidn2" value="{{ $nidn2 != null ? $nidn2['nidn'] : ''  }}">
                                @if ($errors->has('nidn2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nidn2') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}"
                            id="no_hp" name="no_hp" value="{{ $data->no_hp }}" readonly>
                        @if ($errors->has('no_hp'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="thn_akademik">Tahun Akademik <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="text"
                                    class="form-control{{ $errors->has('thn_akademik') ? ' is-invalid' : '' }}"
                                    id="thn_akademik" name="thn_akademik" value="{{ $data->thn_akademik }}" readonly>
                                @if ($errors->has('thn_akademik'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('thn_akademik') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="semester">Semester <i class="fa fa-asterisk" style="color:red"></i></label>
                                <input type="="text"
                                class="form-control{{ $errors->has('semester') ? ' is-invalid' : '' }}"
                                value="{{ $data->semester }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <i class="fa fa-asterisk" style="color:red"></i></label>
                        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="email" name="email" value="{{ $data->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            value="{{ $data->email }}" readonly>>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ktp">KTP <i class="fa fa-asterisk" style="color:red"></i></label>
                        <input type="file" class="form-control{{ $errors->has('ktp') ? ' is-invalid' : '' }}" id="ktp"
                            name="ktp" value="{{ $data->ktp }}" class="form-control{{ $errors->has('ktp') ? ' is-invalid' : '' }}"
                            value="{{ $data->ktp }}" readonly>>
                        @if ($errors->has('ktp'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ktp') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto <i class="fa fa-asterisk" style="color:red"></i></label>
                        <input type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" id="foto"
                            name="foto" value="{{ $data->foto }}" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}"
                            value="{{ $data->foto }}" readonly>>
                        @if ($errors->has('foto'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('foto') }}</strong>
                        </span>
                        @endif
                    </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
    </div>

</section>
<!-- /.content -->
@endsection

@section('js')
<script type="text/javascript">
    $('#asesor1').change(function () {
        var id =  $(this).val();
        var url = "{{ url('/getnidn') }}";
        $.ajax({
            type: 'get',
            url: url+'/'+id,
            success: function(data) {
                // console.log("price");
                console.log(data);
                // alert(data);
                $("#nidn1").val(data);
            },
            error:function(){

            }
        });
    });

    $('#asesor2').change(function () {
        var id =  $(this).val();
        var url = "{{ url('/getnidn') }}";
        $.ajax({
            type: 'get',
            url: url+'/'+id,
            success: function(data) {
                // console.log("price");
                console.log(data);
                // alert(data);
                $("#nidn2").val(data);
            },
            error:function(){

            }
        });
    });
</script>
@endsection
