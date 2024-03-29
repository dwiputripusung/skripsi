@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Dashboard</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Selamat Datang di Sistem Informasi Beban Kerja dan Laporan Kinerja Dosen<br>
                    Universitas Negeri Manado</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
