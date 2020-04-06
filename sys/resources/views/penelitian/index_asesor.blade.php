@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Bidang Penelitian
        <small>Data Bidang Penelitian</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bidang Penelitian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Hover Data Table</h3> -->
              <a href="{{ route('penelitian.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Bidang Penelitian</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width: 25px">No</th>
                  <th>Jenis Kegiatan</th>
                  <th>SKS</th>
                  <th>Masa Penugasan</th>
                  <th>SKS</th>
                  <th>Rekomendasi</th>
                  <th>Status Asesor 1</th>
                  <th>Status Asesor 2</th>
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
          ajax: "{{ route('datatable.penelitian_asesor') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'jenis_kegiatan', name: 'jenis_kegiatan'},
              {data: 'sks_bebankerja', name: 'sks_bebankerja'},
              {data: 'masa_penugasan', name: 'masa_penugasan'},
              {data: 'sks_kinerja', name: 'sks_kinerja'},
              {data: 'rekomendasi', name: 'rekomendasi'},
              {data: 'statush1', name: 'statush1'},
              {data: 'statush2', name: 'statush2'},
              {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
      });
  });
</script>
@endsection 