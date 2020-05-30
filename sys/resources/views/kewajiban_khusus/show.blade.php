@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Penilaian Kewajiban Khusus
        <small>Kewajiban Khusus</small>
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
                    <h3 class="box-title">Penilaian Kewajiban Khusus</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('kewajiban_khusus.update', $data->id) }}">
                    @csrf
                    <input type="hidden" name="tipe" value="periksa">
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="periode">Periode</label>
                            <input type="text" class="form-control{{ $errors->has('periode') ? ' is-invalid' : '' }}"
                                id="periode" value="{{ $data->periode }}" readonly>
                            @if ($errors->has('periode'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('periode') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control{{ $errors->has('tahun') ? ' is-invalid' : '' }}"
                                id="tahun" value="{{ $data->tahun }}" readonly>
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
                                id="judul_karya" value="{{ $data->judul_karya }}" readonly>
                            @if ($errors->has('judul_karya'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('judul_karya') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            @if($data->jenis_karya == 'Jurnal Internasional Bereputasi')
                            @php
                            $j = App\jurnal_internasional_bereputasi::where('kewajiban_khususes_id',
                            $data->id)->first();
                            @endphp
                            <div>
                                <!-- Jurnal Internasional Bereputasi -->
                                <div class="box-header with-border">
                                    <h4 class="box-title">Forum Publikasi</h4>
                                </div>
                                <div class="form-group">
                                    <label for="nama_jurnal">Nama Jurnal</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nama_jurnal') ? ' is-invalid' : '' }}"
                                        id="nama_jurnal_1" name="nama_jurnal_1" value="{{ $j->nama_jurnal }}" readonly>
                                    @if ($errors->has('nama_jurnal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_jurnal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}"
                                        id="volume_1" name="volume_1" value="{{ $j->volume }}" readonly>
                                    @if ($errors->has('volume'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('volume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nomor">Nomor</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nomor') ? ' is-invalid' : '' }}"
                                        id="nomor_1" name="nomor_1" value="{{ $j->nomor }}" readonly>
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
                                        id="impact_factor_1" name="impact_factor_1" value="{{ $j->impact_factor }}"
                                        readonly>
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
                                        id="almt_url_1" name="almt_url_1" value="{{ $j->almt_url }}" readonly>
                                    @if ($errors->has('almt_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('almt_url') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="box-header with-border">
                                    <h4 class="box-title">Bukti Dokumen</h4>
                                </div>
                                <div class="row">
                                    @if($j->artikel != null)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="artikel">Artikel</label><br>
                                            <a href="{{ asset('upload/'.$j->artikel.'')}}" class="btn btn-success"
                                                target="_blank">Lihat</a>
                                        </div>
                                    </div>
                                    @endif
                                    @if($j->cover_depan != null)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="artikel">Cover Depan</label><br>
                                            <a href="{{ asset('upload/'.$j->cover_depan.'')}}" class="btn btn-success"
                                                target="_blank">Lihat</a>
                                        </div>
                                    </div>
                                    @endif
                                    @if($j->daftar_isi != null)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="artikel">Daftar Isi</label><br>
                                            <a href="{{ asset('upload/'.$j->daftar_isi.'')}}" class="btn btn-success"
                                                target="_blank">Lihat</a>
                                        </div>
                                    </div>
                                    @endif
                                    @if($j->lain_lain != null)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="artikel">Lain lain</label><br>
                                            <a href="{{ asset('upload/'.$j->lain_lain.'')}}" class="btn btn-success"
                                                target="_blank">Lihat</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @elseif($data->jenis_karya == 'Jurnal Internasional')
                        @php
                        $j = App\jurnal_internasional::where('kewajiban_khususes_id', $data->id)->first();
                        @endphp
                        <div>
                            <!-- Jurnal Internasional -->
                            <div class="box-header with-border">
                                <h4 class="box-title">Forum Publikasi</h4>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama_jurnal">Nama Jurnal</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nama_jurnal') ? ' is-invalid' : '' }}"
                                        id="nama_jurnal_2" name="nama_jurnal_2" value="{{ $j->nama_jurnal }}" readonly>
                                    @if ($errors->has('nama_jurnal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_jurnal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}"
                                        id="volume_3" name="volume_2" value="{{ $j->volume }}" readonly>
                                    @if ($errors->has('volume'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('volume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nomor">Nomor</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nomor') ? ' is-invalid' : '' }}"
                                        id="nomor_2" name="nomor_2" value="{{ $j->nomor }}" readonly>
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
                                        id="impact_factor_2" name="impact_factor_2" value="{{ $j->impact_factor }}"
                                        readonly>
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
                                        id="almt_url_2" name="almt_url_2" value="{{ $j->almt_url }}" readonly>
                                    @if ($errors->has('almt_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('almt_url') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="box-header with-border">
                                        <h4 class="box-title">Bukti Dokumen</h4>
                                    </div>
                                    <div class="row">
                                        @if($j->artikel != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="artikel">Artikel</label><br>
                                                <a href="{{ asset('upload/'.$j->artikel.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->cover_depan != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="cover_depan">Cover Depan</label><br>
                                                <a href="{{ asset('upload/'.$j->cover_depan.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->daftar_isi != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="daftar_isi">Daftar Isi</label><br>
                                                <a href="{{ asset('upload/'.$j->daftar_isi.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->lain_lain != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lain_lain">Lain-lain</label><br>
                                                <a href="{{ asset('upload/'.$j->lain_lain.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                            </div>
                        </div>
                        @elseif($data->jenis_karya == 'Seminar Internasional Terindeks')
                        @php
                        $j = App\seminar_internasional_terindeks::where('kewajiban_khususes_id', $data->id)->first();
                        @endphp
                        <div>
                            <!-- Seminar Internasional Terindeks -->
                            <div class="box-header with-border">
                                <h4 class="box-title">Forum Publikasi</h4>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama_seminar">Nama Seminar</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nama_seminar') ? ' is-invalid' : '' }}"
                                        id="nama_seminar" name="nama_seminar" value="{{ $j->nama_seminar }}" readonly>
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
                                        id="tmpt_seminar" name="tmpt_seminar" value="{{ $j->tmpt_seminar }}" readonly>
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
                                        id="penyelenggara" name="penyelenggara" value="{{ $j->penyelenggara }}"
                                        readonly>
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
                                        id="almt_url_3" name="almt_url_3" value="{{ $j->almt_url }}" readonly>
                                    @if ($errors->has('almt_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('almt_url') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="box-header with-border">
                                        <h4 class="box-title">Bukti Dokumen</h4>
                                    </div>
                                    <div class="row">
                                        @if($j->artikel != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="artikel">Artikel</label><br>
                                                <a href="{{ asset('upload/'.$j->artikel.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->cover_depan_prosiding != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="cover_depan">Cover Depan</label><br>
                                                <a href="{{ asset('upload/'.$j->cover_depan_prosiding.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->daftar_isi_prosiding != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="daftar_isi">Daftar Isi Prosiding</label><br>
                                                <a href="{{ asset('upload/'.$j->daftar_isi_prosiding.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->lain_lain != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lain_lain">Lain lain</label><br>
                                                <a href="{{ asset('upload/'.$j->lain_lain.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>

                        @elseif($data->jenis_karya == 'Jurnal Nasional Terakreditasi')
                        @php
                        $j = App\jurnal_nasional_terakreditasi::where('kewajiban_khususes_id', $data->id)->first();
                        @endphp
                        <div>
                            <!-- Jurnal Nasional Terakreditasi -->
                            <div class="box-header with-border">
                                <h4 class="box-title">Forum Publikasi</h4>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama_jurnal">Nama Jurnal</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nama_jurnal') ? ' is-invalid' : '' }}"
                                        id="nama_jurnal_3" name="nama_jurnal_3" value="{{ $j->nama_jurnal }}" readonly>
                                    @if ($errors->has('nama_jurnal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_jurnal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="bahasa_jurnal">Bahasa Jurnal</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('bahasa_jurnal') ? ' is-invalid' : '' }}"
                                        id="bahasa_jurnal" name="bahasa_jurnal" value="{{ $j->bahasa_jurnal }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="almt_url">Alamat URL</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('almt_url') ? ' is-invalid' : '' }}"
                                        id="almt_url_4" name="almt_url_4" value="{{ $j->almt_url }}" readonly>
                                    @if ($errors->has('almt_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('almt_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status_doaj">Status DOAJ</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('status_doaj') ? ' is-invalid' : '' }}"
                                        id="status_doaj" name="status_doaj" value="{{ $j->status_doaj }}" readonly>
                                </div>

                                <div class="box-header with-border">
                                        <h4 class="box-title">Bukti Dokumen</h4>
                                    </div>
                                    <div class="row">
                                        @if($j->artikel != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="artikel">Artikel</label><br>
                                                <a href="{{ asset('upload/'.$j->artikel.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->cover_depan != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="cover_depan">Cover Depan</label><br>
                                                <a href="{{ asset('upload/'.$j->cover_depan.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->daftar_isi != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="daftar_isi">Daftar Isi</label><br>
                                                <a href="{{ asset('upload/'.$j->daftar_isi.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->lain_lain != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lain_lain">Lain lain</label><br>
                                                <a href="{{ asset('upload/'.$j->lain_lain.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        @elseif($data->jenis_karya == 'Jurnal Nasional')
                        @php
                        $j = App\jurnal_nasional::where('kewajiban_khususes_id', $data->id)->first();
                        @endphp
                        <div>
                            <!-- Jurnal Nasional -->
                            <div class="box-header with-border">
                                <h4 class="box-title">Forum Publikasi</h4>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama_jurnal">Nama Jurnal</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nama_jurnal') ? ' is-invalid' : '' }}"
                                        id="nama_jurnal_4" name="nama_jurnal_4" value="{{ $j->nama_jurnal }}" readonly>
                                    @if ($errors->has('nama_jurnal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_jurnal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="terindeks">Terindeks</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('terindeks') ? ' is-invalid' : '' }}"
                                        id="terindeks" name="terindeks" value="{{ $j->terindeks }}" readonly>
                                    @if ($errors->has('terindeks'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terindeks') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="standart_tatakelola">Standart Tatakelola</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('standart_tatakelola') ? ' is-invalid' : '' }}"
                                        id="standart_tatakelola" name="standart_tatakelola"
                                        value="{{ $j->standart_tatakelola }}" readonly>
                                    @if ($errors->has('standart_tatakelola'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('standart_tatakelola') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="almt_url">Alamat URL</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('almt_url') ? ' is-invalid' : '' }}"
                                        id="almt_url_5" name="almt_url_5" value="{{ $j->almt_url }}" readonly>
                                    @if ($errors->has('almt_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('almt_url') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="box-header with-border">
                                        <h4 class="box-title">Bukti Dokumen</h4>
                                    </div>
                                    <div class="row">
                                        @if($j->artikel != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="artikel">Artikel</label><br>
                                                <a href="{{ asset('upload/'.$j->artikel.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->cover_depan != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="cover_depan">Cover Depan</label><br>
                                                <a href="{{ asset('upload/'.$j->cover_depan.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->daftar_isi != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="daftar_isi">Daftar Isi</label><br>
                                                <a href="{{ asset('upload/'.$j->daftar_isi.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->lain_lain != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lain_lain">Lain lain</label><br>
                                                <a href="{{ asset('upload/'.$j->lain_lain.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>

                        @elseif($data->jenis_karya == 'Paten')
                        @php
                        $j = App\paten::where('kewajiban_khususes_id', $data->id)->first();
                        @endphp
                        <div>
                            <!-- Paten -->
                            <div class="box-header with-border">
                                <h4 class="box-title">Forum Publikasi</h4>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="jenis_hki">Jenis HKI</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('jenis_hki') ? ' is-invalid' : '' }}"
                                        id="jenis_hki" name="jenis_hki" value="{{ $j->jenis_hki }}" readonly>
                                    @if ($errors->has('jenis_hki'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_hki') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="no_sertifikat">No. Sertifikat</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('no_sertifikat') ? ' is-invalid' : '' }}"
                                        id="no_sertifikat" name="nama_jurnal" value="{{ $j->no_sertifikat }}" readonly>
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
                                        id="almt_url_6" name="almt_url_6" value="{{ $j->almt_url }}" readonly>
                                    @if ($errors->has('almt_url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('almt_url') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="box-header with-border">
                                        <h4 class="box-title">Bukti Dokumen</h4>
                                    </div>
                                    <div class="row">
                                        @if($j->sertifikatl != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="sertifikat">Sertifikat</label><br>
                                                <a href="{{ asset('upload/'.$j->sertifikat.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->deskripsi_paten != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="deskripsi_paten">Cover Depan</label><br>
                                                <a href="{{ asset('upload/'.$j->deskripsi_paten.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->lain_lain != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lain_lain">Lain lain</label><br>
                                                <a href="{{ asset('upload/'.$j->lain_lain.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        @elseif($data->jenis_karya == 'Karya Monumental')
                        @php
                        $j = App\karya_monumental::where('kewajiban_khususes_id', $data->id)->first();
                        @endphp
                        <div>
                            <!-- Karya Monumental -->
                            <div class="box-header with-border">
                                <h4 class="box-title">Forum Publikasi</h4>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="lingkup_kegiatan">Lingkup Kegiatan</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('lingkup_kegiatan') ? ' is-invalid' : '' }}"
                                        id="lingkup_kegiatan" name="lingkup_kegiatan" value="{{ $j->lingkup_kegiatan }}"
                                        readonly>
                                    @if ($errors->has('lingkup_kegiatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lingkup_kegiatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="tempat_publikasi">Tempat Publikasi</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('tempat_publikasi') ? ' is-invalid' : '' }}"
                                        id="tempat_publikasi" name="tempat_publikasi" value="{{ $j->tempat_publikasi }}"
                                        readonly>
                                    @if ($errors->has('tempat_publikasi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tempat_publikasi') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="box-header with-border">
                                        <h4 class="box-title">Bukti Dokumen</h4>
                                    </div>
                                    <div class="row">
                                        @if($j->bukti_karya != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="bukti_karya">Bukti Karya</label><br>
                                                <a href="{{ asset('upload/'.$j->bukti_karya.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->peer_reviewer != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="peer_reviewer">Peer Reviewer</label><br>
                                                <a href="{{ asset('upload/'.$j->peer_reviewer.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($j->lain_lain != null)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lain_lain">Lain lain</label><br>
                                                <a href="{{ asset('upload/'.$j->lain_lain.'')}}" class="btn btn-success"
                                                    target="_blank">Lihat</a>
                                            </div>
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                                <label for="status">Ceklist Asesor</label>
                                <select
                                        class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}"
                                        id="status" name="status">
                                        <option>Pilih</option>
                                        <option value="Terima">Diterima</option>
                                        <option value="Tolak">Ditolak</option>
                                        @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </select>
                            </div>
                            <div style="display: none;" id="komentar">
                            <div class="form-group">
                                <label for="komen">Komen</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('komen') ? ' is-invalid' : '' }}"
                                    id="komen" name="komen" value="{{ $data->komen }}">
                                @if ($errors->has('komen'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('komen') }}</strong>
                                </span>
                                @endif
                            </div>
                            </div>
                    </div>
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
    $('#status').change(function () {
        var j = $(this).val();
        var a = document.getElementById("komentar");
        if (j == 'Tolak') {
            a.style.display = "block";
        } else {
            a.style.display = "none";
        }
    })

</script>
@endsection

