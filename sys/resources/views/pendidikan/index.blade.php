@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Bidang Pendidikan
        <small>Data Bidang Pendidikan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bidang Pendidikan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
              <a href="{{ route('pendidikan.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Bidang Pendidikan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 25px">No</th>
                  <th>Nama Kegiatan</th>
                  <th>Bukti Penugasan</th>
                  <th>Asesor 1</th>
                  <th>Komentar</th>
                  <th>Asesor 2</th>
                  <th>Komentar</th>
                  <th>SKS Beban Kerja</th>
                  <th>Masa Penugasan</th>
                  <th>Bukti Dokumen</th>
                  <th>Asesor 1</th>
                  <th>Komentar</th>
                  <th>Asesor 2</th>
                  <th>Komentar</th>
                  <th>SKS Kinerja</th>
                  <th>Rekomendasi</th>
                  <th style="width: 150px">Aksi</th>
                </tr>
                </thead>
                <tbody></tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

    </section>
    <!-- /.content -->
@endsection

@section('js')
<script>
          $(document).ready(function() {
              $('#table').DataTable({
                  processing: true,
                  serverSide: true,
                  scrollX:        true,
                  scrollCollapse: true,
                  timeout: 500,
                  ajax: "{{ route('datatable.pendidikan') }}",
                  columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'nama_kegiatan', name: 'nama_kegiatan'},
                      {data: 'bukti_bk', name: 'bukti_bk'},
                      {data: 'status1_bk', name: 'status1_bk'},
                      {data: 'komen1_bk', name: 'komen1_bk'},
                      {data: 'status2_bk', name: 'status2_bk'},
                      {data: 'komen2_bk', name: 'komen2_bk'},
                      {data: 'sks_bebankerja', name: 'sks_bebankerja'},
                      {data: 'masa_penugasan', name: 'masa_penugasan'},
                      {data: 'bukti_k', name: 'bukti_k'},
                      {data: 'status1_k', name: 'status1_k'},
                      {data: 'komen1_k', name: 'komen1_k'},
                      {data: 'status2_k', name: 'status2_k'},
                      {data: 'komen2_k', name: 'komen2_k'},
                      {data: 'sks_kinerja', name: 'sks_kinerja'},
                      {data: 'rekomendasi', name: 'rekomendasi'},
                      {data: 'action', name: 'action', orderable: false, searchable: false}
                  ]
              });
          });
  </script>
@endsection 