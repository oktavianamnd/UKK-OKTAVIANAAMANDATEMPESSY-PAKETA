@extends('_userlayout.app')
@section('content')
@section('title', 'Dashboard Masyarakat')
    {{-- <center><h1>Hallo {{$me->nama}}</h1></center> --}}
    <div class="col-lg-12 card" style="padding: 30px;">
        <div class="card-header d-flex justify-content-between">
            <a class="btn btn-success" href="{{ route('masyarakat.create') }}">Buat Pengaduan</a>
            <h5>Anda telah membuat pengaduan sebanyak : {{ $total }}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Tanggal Pengaduan</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Ditanggapi Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengaduans as $pengaduan)
                            @php
                                $tanggapan = \App\Models\Tanggapan::with('petugas')
                                    ->where('id_pengaduan', $pengaduan->id_pengaduan)
                                    ->first();
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d F Y', strtotime($pengaduan->tgl_pengaduan)) }}</td>
                                <td>{{ $pengaduan->nik }}</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                                <td><img src="{{ asset('img/pengaduan/' . $pengaduan->foto) }}" width="150px"
                                        height="100px" alt=""></td>
                                <td>
                                    @if ($pengaduan->status == 'proses')
                                        <span class="badge bg-warning">{{ ucfirst($pengaduan->status) }}</span>
                                    @elseif ($pengaduan->status == 'selesai')
                                        <span class="badge bg-success">{{ ucfirst($pengaduan->status) }}</span>
                                    @elseif ($pengaduan->status == '0')
                                        <span class="badge bg-secondary">Belum Diproses</span>
                                    @else
                                        <span class="badge bg-dark">Ditolak</span>
                                    @endif
                                </td>
                                <td>{{ ucfirst($pengaduan->kategori) }}</td>
                                <td>
                                    @if ($tanggapan)
                                        {{ date('d F Y', strtotime($tanggapan->tgl_tanggapan)) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('pengaduan.update', ['id' => $pengaduan->id_pengaduan]) }}" method="post"
                                        onsubmit="return confirm('apakah anda yakin?')">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="kategori"
                                            value="{{ $pengaduan->kategori == 'publik' ? 'privasi' : 'publik' }}">
                                        <button
                                            class="btn btn-info">{{ $pengaduan->kategori == 'publik' ? 'Jadikan Privasi' : 'Jadikan Publik' }}</button>
                                    </form>
                                    @if ($pengaduan->status == '0')
                                        <form action="{{ route('pengaduan.destroy', $pengaduan->id_pengaduan) }}"
                                            method="post" onsubmit="return confirm('apakah anda yakin?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Hapus</button>
                                        </form>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="8">Anda belum membuat pengaduan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-between">
            <span>Menampilkan {{ $pengaduans->count() }} entri dari {{ $total }} entri</span>
            {{ $pengaduans->links() }}
        </div>
    </div>
@endsection
@section('js')
@endsection