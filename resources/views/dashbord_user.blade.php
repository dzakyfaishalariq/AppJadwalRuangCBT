@extends('template_user.main')
@section('conten')
    <hr>
    <div class="card animate__animated animate__bounceIn shadow-lg bg-body">
        <div class="card-header text-center bg-primary text-light">
            <h4>Pilih Jadwal Ruangan Anda</h4>
        </div>
        <div class="card-body scroll">
            <table class="table table-bordered table-dark table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                        <th>Minggu</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($j = 0; $j < 4; $j++)
                        <tr>
                            @php
                                $k = $j + 1;
                                $hari = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                $waktu = ['08:00-09:30', '10:00-11:30', '13:00-14:30', '15:00-16:30'];
                            @endphp
                            @for ($i = 0; $i < 7; $i++)
                                <td>
                                    <div class="card" style="width: 15rem;">
                                        <div class="card-body">
                                            <table class=" table">
                                                <tr>
                                                    <td>Sesi</td>
                                                    <td>:</td>
                                                    <td>{{ $k }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jam</td>
                                                    <td>:</td>
                                                    <td>{{ $waktu[$j] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hari</td>
                                                    <td>:</td>
                                                    <td>{{ $hari[$i] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>status</td>
                                                    <td>:</td>
                                                    <td><span class="badge text-bg-danger">Belum di pesan</span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class=" card-footer">
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <form action="" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary"
                                                        style="width: 100px;">pesan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endfor
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
