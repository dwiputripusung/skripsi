@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $title }}
        <small>{{ $title }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ $title }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kinerja Bidang {{ $title }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('periksa.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="j" value="{{$title}}">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('nama_kegiatan') ? ' is-invalid' : '' }}"
                                        id="nama_kegiatan" value="{{ $data->nama_kegiatan }}"
                                        readonly>
                                    @if ($errors->has('nama_kegiatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_kegiatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-7">
                                @php
                                if($data->jenis_kegiatan == 'A')
                                {
                                $jenis = 'Menjadi Anggota dalam suatu Panitia/Badan pada Perguruan Tinggi';
                                } elseif($data->jenis_kegiatan == 'B')
                                {
                                $jenis = 'Menjadi Anggota Panitia/Badan pada Lembaga Pemerintah';
                                } elseif($data->jenis_kegiatan == 'C')
                                {
                                $jenis = 'Menjadi Anggota Organisasi Profesi';
                                } elseif($data->jenis_kegiatan == 'D')
                                {
                                $jenis = 'Mewakili Perguruan Tinggi/Lembaga Pemerintah';
                                } elseif($data->jenis_kegiatan == 'E')
                                {
                                $jenis = 'Menjadi Anggota Delegasi Nasional ke Pertemuan Internasional';
                                } elseif($data->jenis_kegiatan == 'F')
                                {
                                $jenis = 'Berperan Serta Aktif dalam Pertemuan Ilmiah';
                                } elseif($data->jenis_kegiatan == 'G')
                                {
                                $jenis = 'Mendapat Penghargaan/Tanda Jasa';
                                } elseif($data->jenis_kegiatan == 'H')
                                {
                                $jenis = 'Menulis Buku Pelajaran SMTA ke bawah yang diterbitkan dan diedarkan Secara Nasional';
                                } elseif($data->jenis_kegiatan == 'I')
                                {
                                $jenis = 'Mempunyai Prestasi di Bidang Olahraga/Humaniora';
                                } elseif($data->jenis_kegiatan == 'J')
                                {
                                $jenis = 'Keanggotaan dalam Organisasi Profesi Dosen';
                                } elseif($data->jenis_kegiatan == 'K')
                                {
                                $jenis = 'Keanggotaan dalam Tim Penilaian';
                                } 

                                if($status == 'asesor1')
                                {
                                    $a = 'status1_bk';
                                    $b = 'status1_k';
                                } else {
                                    $a = 'status2_bk';
                                    $b = 'status2_k';
                                }
                                @endphp
                                <div class="form-group">
                                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('jenis_kegiatan') ? ' is-invalid' : '' }}"
                                        id="jenis_kegiatan" value="{{ $jenis }}" readonly>
                                    @if ($errors->has('jenis_kegiatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_kegiatan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="buktipenugasan_bebankerja_ket">Bukti Penugasan</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('buktipenugasan_bebankerja_ket') ? ' is-invalid' : '' }}"
                                        id="buktipenugasan_bebankerja_ket" value="{{ $data->buktipenugasan_bebankerja_ket }}" readonly>
                                    @if ($errors->has('buktipenugasan_bebankerja_ket'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('buktipenugasan_bebankerja_ket') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="sks_bebankerja">SKS Beban Kerja</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('sks_bebankerja') ? ' is-invalid' : '' }}"
                                        id="sks_bebankerja" value="{{ $data->sks_bebankerja }}"
                                        readonly>
                                    @if ($errors->has('sks_bebankerja'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sks_bebankerja') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label for="buktipenugasan_bebankerja">Periksa</label> <br>
                                <a href="{{ asset('upload/'.$data->buktipenugasan_bebankerja.'')}}"
                                    class="btn btn-success" target="_blank">Lihat Dokumen</a>

                            </div>
                            <div class="col-sm-4">
                                <div class=" form-group">
                                    <label for="jenis_kegiatan">Status</label>
                                    <select
                                        class="form-control{{ $errors->has('jenis_kegiatan') ? ' is-invalid' : '' }}"
                                        id="jenis_kegiatan" name="{{ $a }}">
                                        <option>Pilih</option>
                                        <option value="Terima">Terima</option>
                                        <option value="Tolak">Tolak</option>
                                        @if ($errors->has('jenis_kegiatan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jenis_kegiatan') }}</strong>
                                        </span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="masa_penugasan">Masa Penugasan</label>
                            <input type="text"
                                class="form-control{{ $errors->has('masa_penugasan') ? ' is-invalid' : '' }}"
                                id="masa_penugasan" value="{{ $data->masa_penugasan }}" readonly>
                            @if ($errors->has('masa_penugasan'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('masa_penugasan') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="buktipenugasan_bebankerja_ket">Bukti Dokumen Kinerja</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('buktipenugasan_bebankerja_ket') ? ' is-invalid' : '' }}"
                                        id="buktipenugasan_bebankerja_ket" value="{{ $data->buktidokumen_kinerja_ket }}" readonly>
                                    @if ($errors->has('buktipenugasan_bebankerja_ket'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('buktipenugasan_bebankerja_ket') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="sks_bebankerja">SKS Beban Kerja</label>
                                    <input type="text"
                                        class="form-control{{ $errors->has('sks_bebankerja') ? ' is-invalid' : '' }}"
                                        id="sks_bebankerja" value="{{ $data->sks_kinerja }}"
                                        readonly>
                                    @if ($errors->has('sks_bebankerja'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sks_bebankerja') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label for="buktipenugasan_bebankerja">Periksa</label> <br>
                                <a href="{{ asset('upload/'.$data->buktidokumen_kinerja.'')}}"
                                    class="btn btn-success" target="_blank">Lihat Dokumen</a>

                            </div>
                            <div class="col-sm-4">
                                <div class=" form-group">
                                    <label for="jenis_kegiatan">Status</label>
                                    <select
                                        class="form-control{{ $errors->has('jenis_kegiatan') ? ' is-invalid' : '' }}"
                                        id="jenis_kegiatan" name="{{ $b }}">
                                        <option>Pilih</option>
                                        <option value="Terima">Terima</option>
                                        <option value="Tolak">Tolak</option>
                                        @if ($errors->has('jenis_kegiatan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jenis_kegiatan') }}</strong>
                                        </span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        @php
                        if($data->rekomendasi == 'Selesai')
                        {
                        $rekom = 'Selesai';
                        } elseif($data->rekomendasi == 'Lanjutkan')
                        {
                        $rekom = 'Lanjutkan';
                        } elseif($data->rekomendasi == 'Gagal')
                        {
                        $rekom = 'Lainnya';
                        } elseif($data->rekomendasi == 'Lainnya')
                        {
                        $rekom = 'Lainnya';
                        } elseif($data->rekomendasi == 'Beban Lebih')
                        {
                        $rekom = 'Beban Lebih';
                        }
                        @endphp
                        <div class="form-group">
                            <label for="rekomendasi">Rekomendasi</label>
                            <input type="text"
                                class="form-control{{ $errors->has('rekomendasi') ? ' is-invalid' : '' }}"
                                id="rekomendasi" value="{{ $rekom }}" readonly>
                            @if ($errors->has('rekomendasi'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('rekomendasi') }}</strong>
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
