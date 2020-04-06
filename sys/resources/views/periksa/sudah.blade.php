@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Bidang Sudah Diperiksa
        <small>Data Bidang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bidang</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Bidang Pendidikan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table_pendidikan" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25px">No</th>
                                <th>Dosen</th>
                                <th>Nama Kegiatan</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Hover Data Table</h3> -->
                    <h3 class="box-title">Bidang Penelitian</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table_penelitian" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25px">No</th>
                                <th>Dosen</th>
                                <th>Nama Kegiatan</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Hover Data Table</h3> -->
                    <h3 class="box-title">Bidang Pengabdian Masyarakat</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table_pengabdian" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25px">No</th>
                                <th>Dosen</th>
                                <th>Nama Kegiatan</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">Hover Data Table</h3> -->
                    <h3 class="box-title">Bidang Penunjang Lainnya</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="table_penunjang" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25px">No</th>
                                <th>Dosen</th>
                                <th>Nama Kegiatan</th>
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
    $(document).ready(function () {
        $('#table_pendidikan').DataTable({
            processing: true,
            serverSide: true,
            timeout: 500,
            ajax: "{{ route('datatable.pendidikan_sudah') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'dosen',
                    name: 'dosen'
                },
                {
                    data: 'nama_kegiatan',
                    name: 'nama_kegiatan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('#table_penelitian').DataTable({
            processing: true,
            serverSide: true,
            timeout: 500,
            ajax: "{{ route('datatable.penelitian_sudah') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'dosen',
                    name: 'dosen'
                },
                {
                    data: 'nama_kegiatan',
                    name: 'nama_kegiatan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('#table_pengabdian').DataTable({
            processing: true,
            serverSide: true,
            timeout: 500,
            ajax: "{{ route('datatable.pengabdian_sudah') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'dosen',
                    name: 'dosen'
                },
                {
                    data: 'nama_kegiatan',
                    name: 'nama_kegiatan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('#table_penunjang').DataTable({
            processing: true,
            serverSide: true,
            timeout: 500,
            ajax: "{{ route('datatable.penunjang_sudah') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'dosen',
                    name: 'dosen'
                },
                {
                    data: 'nama_kegiatan',
                    name: 'nama_kegiatan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });

</script>
@endsection
