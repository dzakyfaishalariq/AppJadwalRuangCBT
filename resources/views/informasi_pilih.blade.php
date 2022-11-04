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
                                <th>Tanggal Pemakaian</th>
                                <th>Hari</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            {{-- Auth::user()->nama --}}
                            @foreach ($data_pilihan as $data)
                                <tr class="@if ($i % 2 != 0) table-primary @endif">
                                    <td><span class=" badge text-bg-success">{{ $i }}</span></td>
                                    <td>{{ Auth::user()->nama }}</td>
                                    <td>{{ Auth::user()->prodi }}</td>
                                    <td>Ke-{{ $data->sesi }}</td>
                                    <td>{{ $data->jam_awal }}-{{ $data->jam_akhir }}</td>
                                    <td>{!! $data->keterangan !!}</td>
                                    <td>{{ $data->tanggal_pemakaian }}</td>
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
                                            {{-- <input type="hidden" name="no" value="{{  }}"> --}}
                                            <input type="hidden" name="jatwalruangantersedia_id"
                                                value="{{ $data->jatwalruangantersedia_id }}">
                                            <button type="submit" class="btn btn-danger"
                                                @if ($data->acc == '1') disabled @endif>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $data->id }}"
                                                @if ($data->acc == '1') disabled @endif>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
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
                                                            {{-- <input type="hidden" name="no" --}}
                                                            <input class="form-control" type="date"
                                                                name="tanggal_pemakaian"
                                                                value="{{ $data->tanggal_pemakaian }}" required>
                                                            {{-- value="{{ $i }}"> --}}
                                                            <textarea name="keterangan" id="editor{{ $data->id }}" cols="30" rows="10">{!! $data->keterangan !!}</textarea>
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
                    {{ $data_pilihan->links() }}
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
                    class="btn btn-info me-md-2 @if ($kondisi) disabled @endif">Cetak</a>
                <a href="/dashbord" class="btn btn-secondary me-md-2">Kembali</a>
            </div>
        </div>
    </div>
    @if (session('pesan'))
        <script>
            Swal.fire({
                text: "{{ session('pesan') }}",
                icon: 'success',
            })
        </script>
    @endif
@endsection
