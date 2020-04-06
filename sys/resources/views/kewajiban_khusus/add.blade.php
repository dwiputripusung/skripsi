@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kewajiban Khusus
        <small>Tambah Kewajiban Khusus</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kewajiban Khusus</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kewajiban Khusus</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('kewajiban_khusus.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="periode">Periode</label>
                            <input type="text" class="form-control{{ $errors->has('periode') ? ' is-invalid' : '' }}"
                                id="periode" name="periode" value="{{ old('periode') }}">
                            @if ($errors->has('periode'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('periode') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control{{ $errors->has('tahun') ? ' is-invalid' : '' }}"
                                id="tahun" name="tahun" value="{{ old('tahun') }}">
                            @if ($errors->has('tahun'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tahun') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="judul_karya">Judul Karya</label>
                            <input type="text"
                                class="form-control{{ $errors->has('judul_karya') ? ' is-invalid' : '' }}"
                                id="judul_karya" name="judul_karya" value="{{ old('judul_karya') }}">
                            @if ($errors->has('judul_karya'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('judul_karya') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="jenis_karya">Jenis Karya</label>
                            <select class="form-control{{ $errors->has('jenis_karya') ? ' is-invalid' : '' }}"
                                id="jenis_karya" name="jenis_karya">
                                <option>Pilih</option>
                                <option value="Jurnal Internasional Bereputasi">Jurnal Internasional Bereputasi</option>
                                <option value="Jurnal Internasional">Jurnal Internasional</option>
                                <option value="Seminar Internasional Terindeks">Seminar Internasional Terindeks</option>
                                <option value="Jurnal Nasional Terakreditasi">Jurnal Nasional Terakreditasi</option>
                                <option value="Jurnal Nasional">Jurnal Nasional</option>
                                <option value="Paten">Paten</option>
                                <option value="Karya Monumental">Karya Monumental</option>
                                @if ($errors->has('jenis_karya'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jenis_karya') }}</strong>
                                </span>
                                @endif
                            </select>
                        </div>

                        <div style="display: none;" id="1">
                            <!-- Jurnal Internasional Bereputasi -->
                            <div class="box-header with-border">
                                <h4 class="box-title">Forum Publikasi</h4>
                            </div>
                            <div class="form-group">
                                <label for="nama_jurnal">Nama Jurnal</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('nama_jurnal') ? ' is-invalid' : '' }}"
                                    id="nama_jurnal_1" name="nama_jurnal_1" value="{{ old('nama_jurnal') }}">
                                @if ($errors->has('nama_jurnal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_jurnal') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="volume">Volume</label>
                                <input type="text" class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}"
                                    id="volume_1" name="volume_1" value="{{ old('volume') }}">
                                @if ($errors->has('volume'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('volume') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nomor">Nomor</label>
                                <input type="text" class="form-control{{ $errors->has('nomor') ? ' is-invalid' : '' }}"
                                    id="nomor_1" name="nomor_1" value="{{ old('nomor') }}">
                                @if ($errors->has('nomor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nomor') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="impact_factor">Impact Factor</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('impact_factor') ? ' is-invalid' : '' }}"
                                    id="impact_factor_1" name="impact_factor_1" value="{{ old('impact_factor') }}">
                                @if ($errors->has('impact_factor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('impact_factor') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="almt_url">Alamat URL</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('almt_url') ? ' is-invalid' : '' }}"
                                    id="almt_url_1" name="almt_url_1" value="{{ old('almt_url') }}">
                                @if ($errors->has('almt_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('almt_url') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="box-header with-border">
                                <h4 class="box-title">Bukti Dokumen</h4>
                            </div>
                            <div class="form-group">
                                <label for="artikel">Artikel</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('artikel') ? ' is-invalid' : '' }}"
                                    id="artikel_1" name="artikel_1" value="{{ old('artikel') }}">
                                @if ($errors->has('artikel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('artikel') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cover_depan">Cover Depan</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('cover_depan') ? ' is-invalid' : '' }}"
                                    id="cover_depan_1" name="cover_depan_1" value="{{ old('cover_depan') }}">
                                @if ($errors->has('cover_depan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cover_depan') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="daftar_isi">Daftar Isi</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('daftar_isi') ? ' is-invalid' : '' }}"
                                    id="daftar_isi_1" name="daftar_isi_1" value="{{ old('daftar_isi') }}">
                                @if ($errors->has('daftar_isi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('daftar_isi') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lain_lain">Lain-lain</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}"
                                    id="lain_lain_1" name="lain_lain_1" value="{{ old('lain_lain') }}">
                                @if ($errors->has('lain_lain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lain_lain') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div style="display: none;" id="2">
                        <!-- Jurnal Internasional -->
                        <div class="box-header with-border">
                            <h4 class="box-title">Forum Publikasi</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_jurnal">Nama Jurnal</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('nama_jurnal') ? ' is-invalid' : '' }}"
                                    id="nama_jurnal_2" name="nama_jurnal_2" value="{{ old('nama_jurnal') }}">
                                @if ($errors->has('nama_jurnal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_jurnal') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="volume">Volume</label>
                                <input type="text" class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}"
                                    id="volume_3" name="volume_2" value="{{ old('volume') }}">
                                @if ($errors->has('volume'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('volume') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nomor">Nomor</label>
                                <input type="text" class="form-control{{ $errors->has('nomor') ? ' is-invalid' : '' }}"
                                    id="nomor_2" name="nomor_2" value="{{ old('nomor') }}">
                                @if ($errors->has('nomor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nomor') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="impact_factor">Impact Factor</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('impact_factor') ? ' is-invalid' : '' }}"
                                    id="impact_factor_2" name="impact_factor_2" value="{{ old('impact_factor') }}">
                                @if ($errors->has('impact_factor'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('impact_factor') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="almt_url">Alamat URL</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('almt_url') ? ' is-invalid' : '' }}"
                                    id="almt_url_2" name="almt_url_2" value="{{ old('almt_url') }}">
                                @if ($errors->has('almt_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('almt_url') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="box-header with-border">
                                <h4 class="box-title">Bukti Dokumen</h4>
                            </div>
                            <div class="form-group">
                                <label for="artikel">Artikel</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('artikel') ? ' is-invalid' : '' }}"
                                    id="artikel_2" name="artikel_2" value="{{ old('artikel') }}">
                                @if ($errors->has('artikel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('artikel') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cover_depan">Cover Depan</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('cover_depan') ? ' is-invalid' : '' }}"
                                    id="cover_depan_2" name="cover_depan_2" value="{{ old('cover_depan') }}">
                                @if ($errors->has('cover_depan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cover_depan') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="daftar_isi">Daftar Isi</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('daftar_isi') ? ' is-invalid' : '' }}"
                                    id="daftar_isi_2" name="daftar_isi_2" value="{{ old('daftar_isi') }}">
                                @if ($errors->has('daftar_isi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('daftar_isi') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lain_lain">Lain-lain</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}"
                                    id="lain_lain_2" name="lain_lain_2" value="{{ old('lain_lain') }}">
                                @if ($errors->has('lain_lain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lain_lain') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div style="display: none;" id="3">
                        <!-- Seminar Internasional Terindek -->
                        <div class="box-header with-border">
                            <h4 class="box-title">Forum Publikasi</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_seminar">Nama Seminar</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('nama_seminar') ? ' is-invalid' : '' }}"
                                    id="nama_seminar" name="nama_seminar" value="{{ old('nama_seminar') }}">
                                @if ($errors->has('nama_seminar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_seminar') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tmpt_seminar">Tempat Seminar</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('tempat_seminar') ? ' is-invalid' : '' }}"
                                    id="tmpt_seminar" name="tmpt_seminar" value="{{ old('tmpt_seminar') }}">
                                @if ($errors->has('tmpt_seminar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tmpt_seminar') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('penyelenggara') ? ' is-invalid' : '' }}"
                                    id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara') }}">
                                @if ($errors->has('penyelenggara'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('penyelenggara') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="almt_url">Alamat URL</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('almt_url') ? ' is-invalid' : '' }}"
                                    id="almt_url_3" name="almt_url_3" value="{{ old('almt_url') }}">
                                @if ($errors->has('almt_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('almt_url') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="box-header with-border">
                                <h4 class="box-title">Bukti Dokumen</h4>
                            </div>
                            <div class="form-group">
                                <label for="artikel">Artikel</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('artikel') ? ' is-invalid' : '' }}"
                                    id="artikel_3" name="artikel_3" value="{{ old('artikel') }}">
                                @if ($errors->has('artikel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('artikel') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cover_depan">Cover Depan Prosiding</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('cover_depan') ? ' is-invalid' : '' }}"
                                    id="cover_depan_prosiding" name="cover_depan_prosiding"
                                    value="{{ old('cover_depan') }}">
                                @if ($errors->has('cover_depan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cover_depan') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="daftar_isi">Daftar Isi Prosiding</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('daftar_isi') ? ' is-invalid' : '' }}"
                                    id="daftar_isi_prosiding" name="daftar_isi_prosiding"
                                    value="{{ old('daftar_isi') }}">
                                @if ($errors->has('daftar_isi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('daftar_isi') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lain_lain">Lain-lain</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}"
                                    id="lain_lain_3" name="lain_lain_3" value="{{ old('lain_lain') }}">
                                @if ($errors->has('lain_lain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lain_lain') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div style="display: none;" id="4">
                        <!-- Jurnal Nasional Terakreditasi -->
                        <div class="box-header with-border">
                            <h4 class="box-title">Forum Publikasi</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_jurnal">Nama Jurnal</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('nama_jurnal') ? ' is-invalid' : '' }}"
                                    id="nama_jurnal_3" name="nama_jurnal_3" value="{{ old('nama_jurnal') }}">
                                @if ($errors->has('nama_jurnal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_jurnal') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="bahasa_jurnal">Bahasa Jurnal</label>
                                <select class="form-control{{ $errors->has('bahasa_jurnal') ? ' is-invalid' : '' }}"
                                    id="bahasa_jurnal" name="bahasa_jurnal">
                                    <option>Pilih</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Arab">Arab</option>
                                    <option value="Inggris">Inggris</option>
                                    <option value="Perancis">Perancis</option>
                                    <option value="Rusia">Rusia</option>
                                    <option value="Spanyol">Spanyol</option>
                                    <option value="Tiongkok">Tiongkok</option>
                                    </option>
                                    @if ($errors->has('bahasa_jurnal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bahasa_jurnal') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="akreditasi">Akreditasi</label>
                                <select class="form-control{{ $errors->has('akreditasi') ? ' is-invalid' : '' }}"
                                    id="akreditasi" name="akreditasi">
                                    <option>Pilih</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    </option>
                                    @if ($errors->has('akreditasi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('akreditasi') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="almt_url">Alamat URL</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('almt_url') ? ' is-invalid' : '' }}"
                                    id="almt_url_4" name="almt_url_4" value="{{ old('almt_url') }}">
                                @if ($errors->has('almt_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('almt_url') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status_doaj">Status DOAJ</label>
                                <select class="form-control{{ $errors->has('status_doaj') ? ' is-invalid' : '' }}"
                                    id="status_doaj" name="status_doaj">
                                    <option>Pilih</option>
                                    <option value="Tidak Terindeks">Tidak Terindeks</option>
                                    <option value="Green Thick">Green Thick</option>
                                    </option>
                                    @if ($errors->has('status_doaj'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status_doaj') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                            
                            <div class="box-header with-border">
                                <h4 class="box-title">Bukti Dokumen</h4>
                            </div>
                            <div class="form-group">
                                <label for="artikel">Artikel</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('artikel') ? ' is-invalid' : '' }}"
                                    id="artikel_4" name="artikel_4" value="{{ old('artikel') }}">
                                @if ($errors->has('artikel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('artikel') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cover_depan">Cover Depan</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('cover_depan') ? ' is-invalid' : '' }}"
                                    id="cover_depan_4" name="cover_depan_3" value="{{ old('cover_depan') }}">
                                @if ($errors->has('cover_depan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cover_depan') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="daftar_isi">Daftar Isi</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('daftar_isi') ? ' is-invalid' : '' }}"
                                    id="daftar_isi_4" name="daftar_isi_3" value="{{ old('daftar_isi') }}">
                                @if ($errors->has('daftar_isi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('daftar_isi') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lain_lain">Lain-lain</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}"
                                    id="lain_lain_4" name="lain_lain_4" value="{{ old('lain_lain') }}">
                                @if ($errors->has('lain_lain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lain_lain') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div style="display: none;" id="5">
                        <!-- Jurnal Nasional -->
                        <div class="box-header with-border">
                            <h4 class="box-title">Forum Publikasi</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_jurnal">Nama Jurnal</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('nama_jurnal') ? ' is-invalid' : '' }}"
                                    id="nama_jurnal_4" name="nama_jurnal_4" value="{{ old('nama_jurnal') }}">
                                @if ($errors->has('nama_jurnal'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_jurnal') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="terindeks">Terindeks</label>
                                <select class="form-control{{ $errors->has('terindeks') ? ' is-invalid' : '' }}"
                                    id="terindeks" name="terindeks">
                                    <option>Pilih</option>
                                    <option value="Sinta">Sinta</option>
                                    <option value="Arjuna">Arjuna</option>
                                    </option>
                                    @if ($errors->has('terindeks'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terindeks') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="standart_tatakelola">Standart Tatakelola</label>
                                <select
                                    class="form-control{{ $errors->has('standart_tatakelola') ? ' is-invalid' : '' }}"
                                    id="standart_tatakelola" name="standart_tatakelola">
                                    <option>Pilih</option>
                                    <option value="Q1">Q1</option>
                                    <option value="Q2">Q2</option>
                                    <option value="Q3">Q3</option>
                                    <option value="Q4">Q4</option>
                                    <option value="Q5">Q5</option>
                                    <option value="Q6">Q6</option>
                                    </option>
                                    @if ($errors->has('standart_tatakelola'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('standart_tatakelola') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="almt_url">Alamat URL</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('almt_url') ? ' is-invalid' : '' }}"
                                    id="almt_url_5" name="almt_url_5" value="{{ old('almt_url') }}">
                                @if ($errors->has('almt_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('almt_url') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="box-header with-border">
                                <h4 class="box-title">Bukti Dokumen</h4>
                            </div>
                            <div class="form-group">
                                <label for="artikel">Artikel</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('artikel') ? ' is-invalid' : '' }}"
                                    id="artikel_5" name="artikel_5" value="{{ old('artikel') }}">
                                @if ($errors->has('artikel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('artikel') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cover_depan">Cover Depan</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('cover_depan') ? ' is-invalid' : '' }}"
                                    id="cover_depan_5" name="cover_depan_4" value="{{ old('cover_depan') }}">
                                @if ($errors->has('cover_depan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cover_depan') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="daftar_isi">Daftar Isi</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('daftar_isi') ? ' is-invalid' : '' }}"
                                    id="daftar_isi_5" name="daftar_isi_4" value="{{ old('daftar_isi') }}">
                                @if ($errors->has('daftar_isi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('daftar_isi') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lain_lain">Lain-lain</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}"
                                    id="lain_lain_5" name="lain_lain_5" value="{{ old('lain_lain') }}">
                                @if ($errors->has('lain_lain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lain_lain') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div style="display: none;" id="6">
                        <!-- Paten -->
                        <div class="box-header with-border">
                            <h4 class="box-title">Forum Publikasi</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="jenis_hki">Jenis HKI</label>
                                <select class="form-control{{ $errors->has('jenis_hki') ? ' is-invalid' : '' }}"
                                    id="jenis_hki" name="jenis_hki">
                                    <option>Pilih</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Internasional">Internasional</option>
                                    </option>
                                    @if ($errors->has('jenis_hki'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_hki') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_sertifikat">No. Sertifikat</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('no_sertifikat') ? ' is-invalid' : '' }}"
                                    id="no_sertifikat" name="nama_jurnal" value="{{ old('no_sertifikat') }}">
                                @if ($errors->has('no_sertifikat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_sertifikat') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="almt_url">Alamat URL</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('almt_url') ? ' is-invalid' : '' }}"
                                    id="almt_url_6" name="almt_url_6" value="{{ old('almt_url') }}">
                                @if ($errors->has('almt_url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('almt_url') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="box-header with-border">
                                <h4 class="box-title">Bukti Dokumen</h4>
                            </div>
                            <div class="form-group">
                                <label for="sertifikat">Sertifikat</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('sertifikat') ? ' is-invalid' : '' }}"
                                    id="sertifikat" name="sertifikat" value="{{ old('sertifikat') }}">
                                @if ($errors->has('sertifikat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sertifikat') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_paten">Deskripsi Paten</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('deskripsi_paten') ? ' is-invalid' : '' }}"
                                    id="deskripsi paten" name="deskripsi_paten" value="{{ old('deskripsi_paten') }}">
                                @if ($errors->has('deskripsi_paten'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('deskripsi_paten') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lain_lain">Lain-lain</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}"
                                    id="lain_lain_6" name="lain_lain_6" value="{{ old('lain_lain') }}">
                                @if ($errors->has('lain_lain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lain_lain') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div style="display: none;" id="7">
                        <!-- Karya Monumental -->
                        <div class="box-header with-border">
                            <h4 class="box-title">Forum Publikasi</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="lingkup_kegiatan">Lingkup Kegiatan</label>
                                <select class="form-control{{ $errors->has('lingkup_kegiatan') ? ' is-invalid' : '' }}"
                                    id="lingkup_kegiatan" name="lingkup_kegiatan">
                                    <option>Pilih</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Internasional">Internasional</option>
                                    </option>
                                    @if ($errors->has('lingkup_kegiatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lingkup_kegiatan') }}</strong>
                                    </span>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempat_publikasi">Tempat Publikasi</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('tempat_publikasi') ? ' is-invalid' : '' }}"
                                    id="tempat_publikasi" name="tempat_publikasi" value="{{ old('tempat_publikasi') }}">
                                @if ($errors->has('tempat_publikasi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tempat_publikasi') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="box-header with-border">
                                <h4 class="box-title">Bukti Dokumen</h4>
                            </div>
                            <div class="form-group">
                                <label for="bukti_karya">Bukti Karya</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('bukti_karya') ? ' is-invalid' : '' }}"
                                    id="bukti_karya" name="bukti_karya" value="{{ old('bukti_karya') }}">
                                @if ($errors->has('bukti_karya'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('bukti_karya') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="peer_reviewer">Peer Reviewer</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('peer_reviewer') ? ' is-invalid' : '' }}"
                                    id="peer_reviewer" name="peer_reviewer" value="{{ old('peer_reviewer') }}">
                                @if ($errors->has('peer_reviewer'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('peer_reviewer') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lain_lain">Lain-lain</label>
                                <input type="file"
                                    class="form-control{{ $errors->has('lain_lain') ? ' is-invalid' : '' }}"
                                    id="lain_lain_7" name="lain_lain_7" value="{{ old('lain_lain') }}">
                                @if ($errors->has('lain_lain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lain_lain') }}</strong>
                                </span>
                                @endif
                            </div>
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
    // #Select_id == Id Select jenis karya
    $('#jenis_karya').change(function () {
        var j = $(this).val();
        var a = document.getElementById("1");
        var b = document.getElementById("2");
        var c = document.getElementById("3");
        var d = document.getElementById("4");
        var e = document.getElementById("5");
        var f = document.getElementById("6");
        var g = document.getElementById("7");
        //Bkeng sampe 7
        if (j == 'Jurnal Internasional Bereputasi') {
            a.style.display = "block";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
            e.style.display = "none";
            f.style.display = "none";
            g.style.display = "none";
            //Sampe 7
        } else if (j == 'Jurnal Internasional') {
            b.style.display = "block";
            a.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
            e.style.display = "none";
            f.style.display = "none";
            g.style.display = "none";
            //Sampe 7
        } else if (j == 'Seminar Internasional Terindeks') {
            c.style.display = "block";
            a.style.display = "none";
            b.style.display = "none";
            d.style.display = "none";
            e.style.display = "none";
            f.style.display = "none";
            g.style.display = "none";
            //Sampe 7
        } else if (j == 'Jurnal Nasional Terakreditasi') {
            d.style.display = "block";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            e.style.display = "none";
            f.style.display = "none";
            g.style.display = "none";
            //Sampe 7
        } else if (j == 'Jurnal Nasional') {
            e.style.display = "block";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
            f.style.display = "none";
            g.style.display = "none";
            //Sampe 7
        } else if (j == 'Paten') {
            f.style.display = "block";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
            e.style.display = "none";
            g.style.display = "none";
            //Sampe 7
        } else if (j == 'Karya Monumental') {
            g.style.display = "block";
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";
            e.style.display = "none";
            f.style.display = "none";
            //Sampe 7
        }
    })

</script>
@endsection
