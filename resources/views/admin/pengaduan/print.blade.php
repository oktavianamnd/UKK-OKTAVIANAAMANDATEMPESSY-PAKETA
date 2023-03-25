 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Pengaduan</title>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />
 </head>
 <body>
    <div class="fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Pengaduan Masyarakat di desa Cigombong</h5>
                        <h5>Total Pengaduan : {{$data->count()}}</h5>
                    </div>
                    <div class="card-body">
                        @if (isset($d1))
                            <h5>Pengaduan dari tanggal {{date('d F Y', strtotime($d1))}} - {{date('d F Y', strtotime($d2))}}</h5>
                        @else
                            <h5>Pengaduan Masyarakat</h5>
                        @endif
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pengadu</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Isi laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                            <tr>
                                <td>{{$item->masyarakat->nama}}</td>
                                <td>{{date('d F Y', strtotime($item->tgl_pengaduan))}}</td>
                                <td>{{$item->isi_laporan}}</td>
                                <td><img src="{{asset('img/pengaduan/'.$item->foto)}}" alt="" width="200px" height="150px"></td>
                                <td>{{$item->status}}</td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 </body>
 </html>