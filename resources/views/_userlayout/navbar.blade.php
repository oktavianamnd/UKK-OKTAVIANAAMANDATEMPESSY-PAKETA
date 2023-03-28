<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PEKAT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{Route::is('dashboard') ? 'active' : ''}}" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Route::is('riwayat') ? 'active' : ''}}" aria-current="page" href="{{route('riwayat')}}">Semua Laporan</a>
        </li>
      </ul>
      <h4 class="me-3 mt-2">{{Auth::user()->nama}}</h4>
      <button class="btn btn-primary"><a href="{{route('logout')}}" style="color:black; text-decoration:none;">logout</a></button>
    </div>
  </div>
</nav>