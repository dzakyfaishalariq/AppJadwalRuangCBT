@extends('template_user.main')
@section('conten')
    <hr>
    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <div class="container">
        <div class="card">
            <div class="card-body scroll">
                <h3>Pesanan Anda</h3>
                <hr>
                @if (Auth::user()->ruanganpilihuser->count() > 0)
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
                                <th>Hari</th>
                                <th>Status</th>
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
                                    <td>{{ $data->hari }}</td>
                                    <td>
                                        @if ($data->acc == '1')
                                            <span class=" badge text-bg-success">Disetujui</span>
                                        @else
                                            <span class=" badge text-bg-danger">Belum Disetujui</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="/hapus_{{ $data->id }}" method="post">
                                            @csrf
                                            <input type="hidden" name="jatwalruangantersedia_id"
                                                value="{{ $data->jatwalruangantersedia_id }}">
                                            <button type="submit" class="btn btn-danger"
                                                @if ($data->acc == '1') disabled @endif>Batalkan
                                                Pemesanan</button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $data->id }}"
                                                @if ($data->acc == '1') disabled @endif>
                                                Edit Keterangan
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                                <!-- Modal -->
                                <form action="/update_keterangan_{{ $data->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Edit Keterangan Anda</h5>
                                                            <hr>
                                                            <textarea name="keterangan" id="editor{{ $data->id }}" cols="30" rows="10"></textarea>
                                                        </div>
                                                        <script>
                                                            CKEDITOR.replace('editor{{ $data->id }}')
                                                        </script>
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
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="text-center"><span class=" badge text-bg-danger">Anda Belum Memesan</span></h1>
                @endif
                <hr>
                @php
                    $jumlah_acc = 0;
                    foreach (Auth::user()->ruanganpilihuser as $data) {
                        $jumlah_acc += $data->acc;
                    }
                    $kondisi = $jumlah_acc != Auth::user()->ruanganpilihuser->count();
                @endphp
                <a href="/cetak_laporan" target="blank"
                    class="btn btn-info me-md-2 @if($kondisi) disabled @endif">Cetak</a>
                <a href="/dashbord" class="btn btn-secondary me-md-2">Kembali</a>
            </div>
        </div>
    </div>
@endsection
