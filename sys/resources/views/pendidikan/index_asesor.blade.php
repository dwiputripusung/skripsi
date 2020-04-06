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
                  <th>Asesor 2</th>
                  <th>SKS Beban Kerja</th>
                  <th>Masa Penugasan</th>
                  <th>Bukti Dokumen</th>
                  <th>Asesor 1</th>
                  <th>Asesor 2</th>
                  <th>SKS Kinerja</th>
                  <th>Rekomendasi</th>
                  <th>Penilaian Asesor 1</th>
                  <th>Penilaian Asesor 2</th>
                  <th style="width: 150px">#</th>
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
          timeout: 500,
          ajax: "{{ route('datatable.pendidikan_asesor') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_kegiatan', name: 'nama_kegiatan'},
                      {data: '#1', name: '#1'},
                      {data: 'bukti_bk', name: 'bukti_bk'},
                      {data: '#2', name: '#2'},
                      {data: 'sks_bebankerja', name: 'sks_bebankerja'},
                      {data: '#3', name: '#3'},
                      {data: 'masa_penugasan', name: 'masa_penugasan'},
                      {data: '#4', name: '#4'},
                      {data: 'bukti_k', name: 'bukti_k'},
                      {data: '#5', name: '#5'},
                      {data: 'sks_kinerja', name: 'sks_kinerja'},
                      {data: '#6', name: '#6'},
                      {data: 'rekomendasi', name: 'rekomendasi'},
                      {data: '#7', name: '#7'},
                      {data: 'statush1', name: 'statush2'},
                      {data: 'statush2', name: 'statush2'},
              {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
      });
  });
</script>
@endsection 