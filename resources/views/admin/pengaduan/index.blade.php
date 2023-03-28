@extends('_adminlayout.app')
@section('title', 'Data Pengaduan')
@section('content')
    <div class="col-lg-12 card grid-margin stretch-card" style="padding: 30px;">
        <div class="card-header d-flex justify-content-between">
            <h4>Data Pengaduan</h4>
            @if (Auth::guard('petugas')->user()->level == 'admin')
            <div class="d-flex" id="print-form">
                <div class="form-group me-2">
                    <label for="">Tanggal Mulai</label>
                    <input type="date" id="d1" name="d1" class="form-control">
                </div>
                <div class="form-group me-2">
                    <label for="">Tanggal Berakhir</label>
                    <input type="date" id="d2" name="d2" class="form-control">
                </div>
                <a href="{{ route('admin.pengaduan.print') }}" class="btn btn-primary" id="btn-prn"
                    style="height: 40px; margin: 20px 20p; margin: 20px -20px 0 10px;}">Cetak</a>
            </div>
            @endif
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Pengadu</th>
                    <th scope="col">Isi Laporan</th>
                    <th scope="col">Tanggal Pengaduan</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengaduans as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->masyarakat->nama }}</td>
                        <td>{{ $item->isi_laporan }}</td>
                        <td>{{ $item->tgl_pengaduan }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td><a class="btn btn-success"
                                href="{{ route('admin.pengaduan.edit', $item->id_pengaduan) }}">Tanggapi</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/printpage.js') }}"></script>
    <script>
        $('#d1').change(function() {
            var d2 = $('#d2').val();
            var url = '{{ route('admin.pengaduan.print') }}' + '?d1=' + $(this).val() + '&d2=' + d2;
            $('#btn-prn').attr('href', url);
            console.log(url)
        })
        $('#d2').change(function() {
            var d1 = $('#d1').val();
            var url = '{{ route('admin.pengaduan.print') }}' + '?d1=' + d1 + '&d2=' + $(this).val();
            $('#btn-prn').attr('href', url);
        })

        $('#btn-prn').printPage({
            message: 'Mohon Tunggu sebentar dokumen anda sedang dimuat'
        })
    </script>
@endsection
