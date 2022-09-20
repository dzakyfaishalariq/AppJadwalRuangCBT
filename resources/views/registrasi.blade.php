<!DOCTYPE html>
<html lang="en" data-theme="night">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>PLK|{{ $title }}</title>
</head>

<body>
    <div class=" container-fluid">
        <div class="row">
            <div class=" col-md-4 offset-md-4">
                <div class="card m-5 shadow-lg bg-body animate__animated animate__bounceIn">
                    @if (session('pesan'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('pesan') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class=" card-header text-center bg-info">
                        <h3>Registrasi</h3>
                    </div>
                    <div class="card-body">
                        <form action="/registrasi_system" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control text-center" placeholder="Prodi"
                                    name="prodi" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control text-center" placeholder="Nama" name="nama"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <label for="">Tingkatan: </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <div class="btn-group" role="group"
                                                aria-label="Basic radio toggle button group">
                                                <input type="radio" name='tingkat' value='1' class="btn-check"
                                                    name="btnradio" id="btnradio1" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio1">1</label>

                                                <input type="radio" name='tingkat' value="2" class="btn-check"
                                                    name="btnradio" id="btnradio2" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio2">2</label>

                                                <input type="radio" name='tingkat' value="3" class="btn-check"
                                                    name="btnradio" id="btnradio3" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio3">3</label>

                                                <input type="radio" name='tingkat' value="4" class="btn-check"
                                                    name="btnradio" id="btnradio4" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio4">4</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control text-center" placeholder="exampel@gmail.com"
                                    name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control text-center" placeholder="Password"
                                    name="password" required>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <a href="/" class="btn btn-warning btn-lg">Kembali</a>
                                <button type="submit" class="btn btn-info btn-lg me-md-2">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
