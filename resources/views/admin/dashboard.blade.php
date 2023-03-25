@extends('_adminlayout.app')
@section('title', 'Dashboard Admin')
@section('content')
    {{-- <<h1>hallo {{$me->nama_petugas}}</h1> --}}
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Total Masyarakat</h5>
                </div>
                <div class="card-body">
                    <h6>{{$masyarakat}}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Total Petugas</h5>
                </div>
                <div class="card-body">
                    <h6>{{$petugas}}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Total Pengaduan</h5>
                </div>
                <div class="card-body">
                    <h6>{{$pengaduan}}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Total yang belum ditanggapi</h5>
                </div>
                <div class="card-body">
                    <h6>{{$belumTanggap}}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Total yang proses ditanggapi</h5>
                </div>
                <div class="card-body">
                    <h6>{{$prosesTanggap}}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Total yang sudah ditanggapi</h5>
                </div>
                <div class="card-body">
                    <h6>{{$tanggap}}</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
