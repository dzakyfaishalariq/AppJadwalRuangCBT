@extends('template_user.main')
@section('conten')
    <hr>
    <div class="container">
        <div class="card">
            <div class="card-body scroll">
                <h3>Pesanan Anda</h3>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead class=" text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama pemilih</th>
                            <th>Prodi</th>
                            <th>Sesi</th>
                            <th>jam</th>
                            <th>keterangan</th>
                            <th>Tanggal Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach (Auth::user()->ruanganpilihuser as $data)
                            <tr class="@if ($i % 2 != 0) table-primary @endif">
                                <td><span class=" badge text-bg-success">{{ $i }}</span></td>
                                <td>{{ Auth::user()->nama }}</td>
                                <td>{{ Auth::user()->prodi }}</td>
                                <td>Ke-{{ $data->sesi }}</td>
                                <td>{{ $data->jam_awal }}-{{ $data->jam_akhir }}</td>
                                <td>{!! $data->keterangan !!}</td>
                                <td>{{ $data->tanggal_pesan }}</td>
                                <td>
                                    <form action="/data_{{ $data->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Batalkan Pemesanan</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <a href="#" class="btn btn-info me-md-2">Cetak</a>
                <a href="/dashbord" class="btn btn-secondary me-md-2">Kembali</a>
            </div>
        </div>
    </div>
@endsection
