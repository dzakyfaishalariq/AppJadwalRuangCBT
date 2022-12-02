@extends('template_admin.main')
@section('content')
    <br>
    <div class="row">
        <div class="col-xl-12 rounded-3 mb-4 p-3 shadow-sm" style="background-color:rgb(203, 252, 157)">
            <h3>Manajemen User</h3>
            <div class="d-flex flex-row-reverse">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_tambah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    Tambah data User
                </button>

                <!-- Modal -->
                <form action="/tambah_data_user_admin" method="post">
                    @csrf
                    <div class="modal fade" id="exampleModal_tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah data User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control text-center" placeholder="Prodi"
                                            name="prodi" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control text-center" placeholder="Nama"
                                            name="nama" required>
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
                                                        <input type="radio" name='tingkat' value='1'
                                                            class="btn-check" name="btnradio" id="btnradio1"
                                                            autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="btnradio1">1</label>

                                                        <input type="radio" name='tingkat' value="2"
                                                            class="btn-check" name="btnradio" id="btnradio2"
                                                            autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="btnradio2">2</label>

                                                        <input type="radio" name='tingkat' value="3"
                                                            class="btn-check" name="btnradio" id="btnradio3"
                                                            autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="btnradio3">3</label>

                                                        <input type="radio" name='tingkat' value="4"
                                                            class="btn-check" name="btnradio" id="btnradio4"
                                                            autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="btnradio4">4</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control text-center" placeholder="username"
                                            name="username" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control text-center"
                                            placeholder="exampel@gmail.com" name="email" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" class="form-control text-center" placeholder="Password"
                                            name="password" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-12 rounded-3 mb-4 p-3 shadow-sm" style="background-color:rgb(170, 235, 231)">
            <hr>
            @foreach ($data as $d)
                <div class=" card rounded-5 shadow-lg">
                    <div class="card-body">
                        <div class="d-flex text-muted pt-3">
                            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#e83e8c" /><text x="50%"
                                    y="50%" fill="#e83e8c" dy=".3em">32x32</text>
                            </svg>

                            <p class="pb-3 mb-0 lh-sm border-bottom">
                                <strong class="d-block text-gray-dark">{{ $d->email }}</strong>
                                Prodi : {{ $d->prodi }}
                                <br>
                                Tingkat : {{ $d->tingkat }}
                            </p>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-warning me-md-2" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $d->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                </svg>
                                Edit
                            </button>

                            <!-- Modal -->
                            <form action="/update_data_user_admin_{{ $d->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit data User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control text-center"
                                                        placeholder="Prodi" name="prodi" value="{{ $d->prodi }}"
                                                        required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control text-center"
                                                        placeholder="Nama" name="nama"
                                                        value="{{ $d->nama }}"required>
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
                                                                    <input type="radio" name='tingkat' value='1'
                                                                        class="btn-check" name="btnradio"
                                                                        id="btnradio1_{{ $d->id }}"
                                                                        autocomplete="off"
                                                                        @if ($d->tingkat == 1) checked @endif>
                                                                    <label class="btn btn-outline-primary"
                                                                        for="btnradio1_{{ $d->id }}">1</label>

                                                                    <input type="radio" name='tingkat' value="2"
                                                                        class="btn-check" name="btnradio"
                                                                        id="btnradio2_{{ $d->id }}"
                                                                        autocomplete="off"
                                                                        @if ($d->tingkat == 2) checked @endif>
                                                                    <label class="btn btn-outline-primary"
                                                                        for="btnradio2_{{ $d->id }}">2</label>

                                                                    <input type="radio" name='tingkat' value="3"
                                                                        class="btn-check" name="btnradio"
                                                                        id="btnradio3_{{ $d->id }}"
                                                                        autocomplete="off"
                                                                        @if ($d->tingkat == 3) checked @endif>
                                                                    <label class="btn btn-outline-primary"
                                                                        for="btnradio3_{{ $d->id }}">3</label>

                                                                    <input type="radio" name='tingkat' value="4"
                                                                        class="btn-check" name="btnradio"
                                                                        id="btnradio4_{{ $d->id }}"
                                                                        autocomplete="off"
                                                                        @if ($d->tingkat == 4) checked @endif>
                                                                    <label class="btn btn-outline-primary"
                                                                        for="btnradio4_{{ $d->id }}">4</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="text" class="form-control text-center"
                                                        placeholder="Username" name="username"
                                                        value="{{ $d->username }}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <input type="email" class="form-control text-center"
                                                        placeholder="exampel@gmail.com" name="email"
                                                        value="{{ $d->email }}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Ganti Password : </label>
                                                    <input type="password" class="form-control text-center"
                                                        placeholder="Password" name="password" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <button class="btn btn-outline-danger me-md-2" type="button"
                                onclick="hapus('{{ $d->id }}','{{ $d->nama }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd"
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <script>
                    function hapus(id, nama) {
                        Swal.fire({
                            title: 'Apakah Kamu yakin?',
                            text: "Menghapus data User dengan nama " + nama + " ini !",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "/hapus_data_user_" + id;
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        });
                    }
                </script>
            @endforeach
            {{ $data->links() }}
        </div>
    </div>
    @if (session('pesan'))
        <script>
            Swal.fire({
                text: "{{ session('pesan') }}",
                icon: 'success',
            })
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                text: "{{ session('error') }}",
                icon: 'error',
            })
        </script>
    @endif
@endsection
