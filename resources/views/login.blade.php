<!DOCTYPE html>
<html lang="en" data-theme="night">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/Icon_plk.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>PLK|{{ $title }}</title>
    @vite([])
</head>

<body>
    <div class=" container-fluid">
        <div class="row">
            <div class=" col-md-4 offset-md-4">
                <div class="card m-5 shadow-lg bg-body animate__animated animate__bounceIn">
                    <div class=" card-header text-center bg-info">
                        <img src="img/Logo_Poltekes.jpg" class=" rounded-2" width="80px" alt="gambar Logo Poltekes">
                        <h4 class=" text-white">PLK</h4>
                    </div>
                    <div class="card-body">
                        @if (session('pesan'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('pesan') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" class="form-control text-center" placeholder="exampel@gmail.com"
                                    name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control text-center" placeholder="Password"
                                    name="password" required>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-success mb-3">Login</button>
                                <a href="/registrasi" class=" text-center">Register</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class=" text-center text-small">copyrigh@2022 by Poltekkes Bengkulu</p>
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
