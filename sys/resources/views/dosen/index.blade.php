@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Dosen
        <small>Data Dosen</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dosen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
      @endif
  
      @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
      @endif
  
      @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
      </div>
      @endif
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
              <a href="{{ route('dosen.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Dosen</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 25px">No</th>
                  <th>Nama</th>
                  <th>NIRA</th>
                  <th>NIDN</th>
                  <th>Fakultas</th>
                  <th>Jurusan/Program Studi</th>
                  <th style="width: 210px">Aksi</th>
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
                    ajax: "{{ route('datatable.dosen') }}",
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'nama', name: 'nama'},
                        {data: 'nira', name: 'nira'},
                        {data: 'nidn', name: 'nidn'},
                        {data: 'fakultas', name: 'fakultas'},
                        {data: 'jurusan', name: 'jurusan'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
    </script>
@endsection