@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dosen
        <small>Edit Dosen</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dosen</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Dosen</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('dosen.update', $data->id) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                id="nama" name="nama" value="{{ $data->nama }}">
                            @if ($errors->has('nama'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                                <label for="nira">NIRA</label>
                                <input type="text" class="form-control{{ $errors->has('nira') ? ' is-invalid' : '' }}"
                                    id="nira" name="nira" value="{{ $data->nira }}">
                                @if ($errors->has('nira'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nira') }}</strong>
                                </span>
                                @endif
                            </div>
                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" class="form-control{{ $errors->has('nidn') ? ' is-invalid' : '' }}"
                                id="nidn" name="nidn" value="{{ $data->nidn }}">
                            @if ($errors->has('nidn'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nidn') }}</strong>
                            </span>
                            @endif
                        </div>
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
                            <label for="jurusan_id">Jurusan</label>
                            <select class="form-control{{ $errors->has('jurusan_id') ? ' is-invalid' : '' }}"
                                id="jurusan_id" name="jurusan_id">
                                @if ($errors->has('jurusan_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('jurusan_id') }}</strong>
                                </span>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                                name="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
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

@section('js')
<script>
    $(document).ready(function () {
        $('#fakultas_id').on('change', function () {
            var id = $('#fakultas_id').val();
            $.ajax({
                type: "GET",
                url: "{{ url('pilih_jurusan') }}/" + id,
                success: function (res) {
                    $('#jurusan_id').html(res);
                }
            });
        });
    });

</script>
@endsection

