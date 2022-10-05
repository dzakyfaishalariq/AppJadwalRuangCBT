@extends('template_admin.main')
@section('content')
    <hr>
    <div class="mb-2 p-3 bg-info rounded-3 shadow-lg">
        <h3 class=" text-center">{{ $title }}</h3>
    </div>
    <br>
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-lg bg-body rounded-3">
                <table class=" table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sesi</th>
                            <th>Jam</th>
                            <th>Hari</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>Ke-{{ $d->sesi }}</td>
                                <td>{{ $d->jam_awal }}-{{ $d->jam_akhir }}</td>
                                <td>{{ $d->hari }}</td>
                                <td>
                                    @if ($d->status == 1)
                                        <span class=" badge text-bg-success">dipesan</span>
                                    @else
                                        <span class=" badge text-bg-danger">tidak dipesan</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $d->id }}">
                                        Edit Jam
                                    </button>
                                </td>

                            </tr>
                            <!-- Modal -->
                            <form action="/perbarui_jam_{{ $d->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Waktu hari
                                                    {{ $d->hari }} sesi ke-{{ $d->sesi }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label>Jam Awal</label>
                                                <input type="teks" class=" form-control" name="jam_awal"
                                                    value="{{ $d->jam_awal }}" placeholder="Jam Awal contoh = 12:30:00">
                                                <label>Jam Akhir</label>
                                                <input type="teks" class=" form-control" name="jam_akhir"
                                                    value="{{ $d->jam_akhir }}" placeholder="Jam Akhir contoh = 13:30:00">
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
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <hr>
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
