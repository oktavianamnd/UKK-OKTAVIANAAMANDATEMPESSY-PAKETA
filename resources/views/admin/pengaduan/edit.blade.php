@extends('_adminlayout.app')
@section('title', 'Tanggapi Pengaduan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ date('d F Y', strtotime($data->tgl_pengaduan)) }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('img/pengaduan/' . $data->foto) }}" class="rounded" width="200px"
                                height="150px" alt="">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group d-flex flex-column">
                                <b>Nama Pengadu</b>
                                <small>{{ $data->masyarakat->nama }}</small>
                            </div>
                            <div class="form-group d-flex flex-column mb-3">
                                <b>Isi Pengaduan</b>
                                <small>{{ $data->isi_laporan }}</small>
                            </div>
                            <form action="{{ route('admin.pengaduan.tanggapan', $data->id_pengaduan) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group d-flex flex-column mb-2">
                                    <b for="">Status</b>
                                    <select name="status" class="form-select">
                                        <option value="" selected disabled>Pilih Status</option>
                                        <option value="proses" {{$data->status == 'proses' ? 'selected' : ''}}>Proses</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <b for="tanggapan">Tanggapan Anda</b>
                                    <textarea name="tanggapan" name="tanggapan" id="tanggapan" cols="30" rows="10" placeholder="tanggapan anda"></textarea>
                                </div>
                                <button class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
