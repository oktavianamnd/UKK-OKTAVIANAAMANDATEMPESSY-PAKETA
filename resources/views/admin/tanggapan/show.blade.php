@extends('_adminlayout.app')
@section('title', 'Tanggapi Pengaduan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Tanggapan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('img/pengaduan/' . $data->pengaduan->foto) }}" class="rounded" width="200px"
                                height="150px" alt="">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group d-flex flex-column">
                                <b>Nama Pengadu</b>
                                <small>{{ $data->pengaduan->masyarakat->nama }}</small>
                            </div>
                            <div class="form-group d-flex flex-column"><br>
                                <b>Isi Pengaduan</b>
                                <small>{{ $data->pengaduan->isi_laporan }}</small>
                            </div>
                            <div class="form-group d-flex flex-column"><br>
                                <b>Tanggal Pengaduan</b>
                                <small>{{ date('d F Y', strtotime($data->pengaduan->tgl_pengaduan)) }}</small>
                            </div>
                            <div class="form-group d-flex flex-column"><br>
                                <b for="tanggapan">Tanggapan</b>
                                <span>{{$data->tanggapan}}</span>
                            </div>
                            <div class="form-group d-flex flex-column"><br>
                                <b for="tanggapan">Tanggal Ditanggapi</b>
                                <span>{{ date('d F Y', strtotime($data->tgl_tanggapan)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
