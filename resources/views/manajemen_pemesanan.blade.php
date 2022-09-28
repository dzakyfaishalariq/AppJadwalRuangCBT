@extends('template_admin.main')
@section('content')
    <hr>
    <div class=" mb-1 p-2 bg-info rounded-3 shadow-lg">
        <h4 class=" text-center">{{ $title }}</h4>
    </div>
    <br>
    <div class="accordion accordion-flush shadow-lg" id="accordionFlushExample">
        @php
            $no_1 = 1;
        @endphp
        @foreach ($data as $d)
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading{{ $d->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapse{{ $d->id }}" aria-expanded="false"
                        aria-controls="flush-collapseOne">
                        <p>
                            <span class=" badge text-bg-primary ml-3">{{ $no_1 }}</span>
                            {{ $d->prodi }}
                        </p>
                    </button>
                    @php
                        $no_1++;
                    @endphp
                </h2>
                <div id="flush-collapse{{ $d->id }}" class="accordion-collapse collapse"
                    aria-labelledby="flush-heading{{ $d->id }}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        @if ($d->ruanganpilihuser->count() > 0)
                            <form action="/manajemen_pemesanan_acc" method="post">
                                @csrf
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Sesi</th>
                                            <th>Jam</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Hari</th>
                                            <th>Persetujuan</th>
                                            <th>Acc</th>
                                            <th>Batalkan Acc</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($d->ruanganpilihuser as $c)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>Ke-{{ $c->sesi }}</td>
                                                <td>{{ $c->jam_awal }} - {{ $c->jam_akhir }}</td>
                                                <td>{!! $c->keterangan !!}</td>
                                                <td>{{ $c->tanggal_pesan }}</td>
                                                <td>{{ $c->hari }}</td>
                                                <td>
                                                    @if ($c->acc == 1)
                                                        <span class="badge text-bg-success">Disetujui</span>
                                                    @else
                                                        <span class="badge text-bg-danger">Belum Disetujui</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" name="{{ $c->id }}"
                                                            value="1" style="height: 35px;width: 70px;" type="checkbox"
                                                            role="switch" id="flexSwitchCheckDefault"
                                                            @if ($c->acc == 1) checked disabled @endif>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" name="{{ $c->id }}"
                                                            value="0" style="height: 35px;width: 70px;" type="checkbox"
                                                            role="switch" id="flexSwitchCheckDefault"
                                                            @if ($c->acc == 0) checked disabled @endif>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="/hapus_manajemen_pemesanan_{{ $c->id }}"
                                                        class=" btn btn-danger @if ($c->acc == '1') disabled @endif">Hapus</a>
                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                @php
                                    $data_acc = 0;
                                    foreach ($d->ruanganpilihuser as $e) {
                                        $data_acc += $e->acc;
                                    }
                                    $kondisi = $data_acc != $d->ruanganpilihuser->count();
                                @endphp
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/cetak_manajemen_pemesanan_{{ $d->id }}" target="blank"
                                    class="btn btn-secondary @if ($kondisi) disabled @endif">Cetak</a>
                                <a href="/reset_pemesanan_{{ $d->id }}" class=" btn btn-danger">Hapus Semua</a>
                            </form>
                        @else
                            <h5><span class=" badge bg-danger">User Belum Ada Yang Memesan Ruangan</span></h5>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
