@php
date_default_timezone_set('Asia/Jakarta');
@endphp
@php
switch (date('l')) {
    case 'Monday':
        $hari_2 = 'Senin';
        break;
    case 'Tuesday':
        $hari_2 = 'Selasa';
        break;
    case 'Wednesday':
        $hari_2 = 'Rabu';
        break;
    case 'Thursday':
        $hari_2 = 'Kamis';
        break;
    case 'Friday':
        $hari_2 = 'Jumat';
        break;
    case 'Saturday':
        $hari_2 = 'Sabtu';
        break;
    case 'Sunday':
        $hari_2 = 'Minggu';
        break;
}
@endphp
<nav class="navbar navbar-expand-lg bg-saya">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/GambarLogo2.png" class=" rounded-5" width="80px" alt="gambar Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link me-md-2" aria-current="page" href="#">{{ Auth::user()->nama }}</a>
                </li>
                <li class="nav-item">
                    <div class="btn-group nav-link me-md-2" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-primary">
                            <div id="jam"></div>
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            <div id="menit"></div>
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            <div id="detik"></div>
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            {{ $hari_2 }}
                        </button>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-success mt-2 me-md-2" aria-current="page"
                        href="/informasi_pilihan">Informasi Pilihan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-success mt-2" aria-current="page" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
