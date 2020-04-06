@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Kewajiban Khusus
        <small>Data Kewajiban Khusus</small>
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
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
              {{-- <a href="{{ route('kewajiban_khusus.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Kewajiban Khusus</a> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 25px">No</th>
                  <th>Dosen</th>
                  <th>Tahun</th>
                  <th>Judul Karya</th>
                  <th>Jenis Karya</th>
                  <th>Checklist Asesor</th>
                  <th>Komen</th>
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
                  timeout: 500,
                  ajax: "{{ url('/datatable_kewajibankhusus_asesor') }}",
                  columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'dosen', name: 'dosen'},
                      {data: 'tahun', name: 'tahun'},
                      {data: 'judul_karya', name: 'judul_karya'},
                      {data: 'jenis_karya', name: 'jenis_karya'},
                      {data: 'status', name: 'status'},
                      {data: 'komen', name: 'komen'},
                      {data: 'action', name: 'action', orderable: false, searchable: false}
                  ]
              });
          });
  </script>
@endsection 