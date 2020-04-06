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
          <table id="table" class="table table-bordered table-hover" cellspacing="0">
            <thead>
              <tr>
                <th style="width: 25px" rowspan="2">No</th>
                <th rowspan="2">Nama Kegiatan</th>
                <th colspan="5">Penugasan</th>
                <th rowspan="2">SKS Beban Kerja</th>
                <th rowspan="2">Masa Penugasan</th>
                <th colspan="5">Dokumen</th>
                <th rowspan="2">SKS Kinerja</th>
                <th rowspan="2">Rekomendasi</th>
                <th style="width: 150px" rowspan="2">Aksi</th>
              </tr>
              <tr>
                <th>Bukti</th>
                <th>Asesor 1</th>
                <th>Komentar</th>
                <th>Asesor 2</th>
                <th>Komentar</th>
                <th>Bukti</th>
                <th>Asesor 1</th>
                <th>Komentar</th>
                <th>Asesor 2</th>
                <th>Komentar</th>
              </tr>
            </thead>
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
      scrollX: true,
      scrollCollapse: true,
      timeout: 500,
      ajax: "{{ route('datatable.pendidikan') }}",
      columnDefs: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          targets: 0,
        },
        {
          data: 'nama_kegiatan',
          name: 'nama_kegiatan',
          targets: 1
        },
        {
          data: 'bukti_bk',
          name: 'bukti_bk',
          orderable: false,
          searchable: false,
          targets: 2
        },
        {
          data: 'status1_bk',
          name: 'status1_bk',
          orderable: false,
          searchable: false,
          targets: 3
        },
        {
          data: 'komen1_bk',
          name: 'komen1_bk',
          orderable: false,
          searchable: false,
          targets: 4
        },
        {
          data: 'status2_bk',
          name: 'status2_bk',
          orderable: false,
          searchable: false,
          targets: 5
        },
        {
          data: 'komen2_bk',
          name: 'komen2_bk',
          orderable: false,
          searchable: false,
          targets: 6
        },
        {
          data: 'sks_bebankerja',
          name: 'sks_bebankerja',
          orderable: false,
          searchable: false,
          targets: 7
        },
        {
          data: 'masa_penugasan',
          name: 'masa_penugasan',
          orderable: false,
          searchable: false,
          targets: 8
        },
        {
          data: 'bukti_k',
          name: 'bukti_k',
          orderable: false,
          searchable: false,
          targets: 9
        },
        {
          data: 'status1_k',
          name: 'status1_k',
          orderable: false,
          searchable: false,
          targets: 10
        },
        {
          data: 'komen1_k',
          name: 'komen1_k',
          orderable: false,
          searchable: false,
          targets: 11
        },
        {
          data: 'status2_k',
          name: 'status2_k',
          orderable: false,
          searchable: false,
          targets: 12
        },
        {
          data: 'komen2_k',
          name: 'komen2_k',
          orderable: false,
          searchable: false,
          targets: 13
        },
        {
          data: 'sks_kinerja',
          name: 'sks_kinerja',
          orderable: false,
          searchable: false,
          targets: 14
        },
        {
          data: 'rekomendasi',
          name: 'rekomendasi',
          orderable: false,
          searchable: false,
          targets: 15
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false,
          targets: 16
        },
      ]
    });
  });
</script>
@endsection