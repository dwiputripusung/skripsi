@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Jurusan
        <small>Tambah Jurusan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jurusan</li>
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Jurusan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('jurusan.store') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fakultas_id">Fakultas</label>
                            <select class="form-control{{ $errors->has('fakultas_id') ? ' is-invalid' : '' }}"
                                id="fakultas_id" name="fakultas_id">
                                <option>Pilih Fakultas</option>
                                @foreach($fak as $fak)
                                <option value="{{ $fak->id }}"> {{ $fak->nama }}</option>
                                @endforeach
                                @if ($errors->has('fakultas_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fakultas_id') }}</strong>
                                </span>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Jurusan/Program Studi</label>
                            <input type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                id="nama" name="nama" value="{{ old('nama') }}">
                            @if ($errors->has('nama'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="jenjang">Jenjang</label>
                            <input type="text" class="form-control{{ $errors->has('jenjang') ? ' is-invalid' : '' }}"
                                id="jenjang" name="jenjang" value="{{ old('jenjang') }}">
                            @if ($errors->has('jenjang'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jenjang') }}</strong>
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
