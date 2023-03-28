@extends('_userlayout.app')
@section('content')
@section('title', 'Data Riwayat Laporan')
    <div class="col-sm-12 mb-3">
        <div class="card">
            <div class="card-body">
                <h4>Semua Laporan</h4>
            </div>
        </div>
    </div>
    @foreach ($pengaduan as $item)
        @php
            $tanggapan = \App\Models\Tanggapan::with('petugas')->where('id_pengaduan', $item->id_pengaduan)->first();
        @endphp
        <div class="col-sm-3">
            <div class="card" data-bs-title="This top tooltip is themed via CSS variables.">
                <div class="card-header d-flex justify-content-between">
                    <span>{{ date('d F Y  H:i', strtotime($item->tgl_pengaduan)) }}</span>
                    @if ($item->status == 'proses')
                        <span class="badge bg-warning">{{ ucfirst($item->status) }}</span>
                    @elseif ($item->status == 'selesai')
                        <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                    @elseif ($item->status == '0')
                        <span class="badge bg-secondary">Belum Diproses</span>
                    @else
                        <span class="badge bg-dark">Ditolak</span>
                    @endif
                </div>
                <div class="card-body d-flex flex-column">
                    <img src="{{ asset('img/pengaduan/' . $item->foto) }}" width="100%" height="150px" alt="">
                    <span>Isi Laporan: </span>
                    <span>{{ $item->isi_laporan }}</span>
                </div>
                <div class="card-footer">
                    <span>Pelapor: {{ $item->masyarakat->nama }}</span>
                    @if ($tanggapan)
                        <div class="accordion mt-3" id="tanggapanParent{{ $item->id_pengaduan}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-info" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#tanggapanChild{{ $item->id_pengaduan }}"
                                        aria-expanded="false" aria-controls="tanggapanChild{{ $item->id_pengaduan }}">
                                        Lihat Tanggapan
                                    </button>
                                </h2>
                                <div id="tanggapanChild{{ $item->id_pengaduan }}" class="accordion-collapse collapse"
                                    data-bs-parent="#tanggapanParent{{ $item->id_pengaduan }}">
                                    <div class="accordion-body d-flex flex-column">
                                        <div class="mb-3 d-flex flex-column">
                                            <b>Tanggapan:</b>
                                            <span>{{ $tanggapan->tanggapan }}</span>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <b>Ditanggapi Pada:</b>
                                            <span>{{ date('d F Y H:i', strtotime($tanggapan->tgl_tanggapan)) }}</span>
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <b>Petugas:</b>
                                            <span>{{ $tanggapan->petugas->nama_petugas }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-sm-12">
        {{$pengaduan->links()}}
    </div>
@endsection
@section('js')
@endsection