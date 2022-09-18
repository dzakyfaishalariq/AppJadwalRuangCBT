@extends('template_user.main')
@section('conten')
    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    @php
        date_default_timezone_set('Asia/Jakarta');
    @endphp
    <hr>
    @if (session('pesan'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br>
    <div class="card shadow-lg bg-body">
        <div class="card-header text-center bg-primary text-light">
            <h4>Pilih Jadwal Ruangan Anda</h4>
        </div>
        <div class="card-body scroll">
            <table class="table table-dark table-bordered table-striped">
                <tbody>
                    @php
                        $h = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                        $hari = [$data_senin, $data_selasa, $data_rabu, $data_kamis, $data_jumat, $data_sabtu, $data_minggu];
                    @endphp
                    @for ($i = 0; $i < 7; $i++)
                        <tr>
                            <td><span class=" badge text-bg-success">{{ $h[$i] }}</span></td>
                            @foreach ($hari[$i] as $data)
                                <td>
                                    <div class="card" style="width: 340px;">
                                        <div class="card-body">
                                            <table class=" table">
                                                <tr>
                                                    <td>Sesi</td>
                                                    <td>:</td>
                                                    <td>{{ $data->sesi }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jam</td>
                                                    <td>:</td>
                                                    <td>{{ $data->jam_awal }}-{{ $data->jam_akhir }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hari</td>
                                                    <td>:</td>
                                                    <td>{{ $data->hari }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    @if ($data->status == false)
                                                        <td><span class=" badge text-bg-danger">belum di pesan</span></td>
                                                    @else
                                                        <td><span class=" badge text-bg-success">Sudah di pesan</span></td>
                                                    @endif
                                                </tr>
                                            </table>
                                            <!-- Button trigger modal -->
                                            <div class=" d-grid gap-2 col-6 mx-auto">
                                                <button type="button"
                                                    class="btn btn-primary @if ($data->status == 1) disabled @endif"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $data->id }}">
                                                    Pesan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/pesan" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Alasan Memesan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="jatwalruangantersedia_id"
                                                        value="{{ $data->id }}">
                                                    <input type="hidden" name="sesi" value="{{ $data->sesi }}">
                                                    <input type="hidden" name="jam_awal" value="{{ $data->jam_awal }}">
                                                    <input type="hidden" name="jam_akhir" value="{{ $data->jam_akhir }}">
                                                    <input type="hidden" name="status" value="1">
                                                    <textarea name="keterangan" id="editor{{ $data->id }}" cols="30" rows="10"></textarea>
                                                    <input type="hidden" name="tanggal_pesan" value="{{ date('Y-m-d') }}">
                                                    <input type="hidden" name="hari" value="{{ $data->hari }}">
                                                    <script>
                                                        CKEDITOR.replace('editor{{ $data->id }}')
                                                    </script>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal Memesan</button>
                                                    <button type="submit"
                                                        class="btn btn-primary @if ($data->jam_awal <= date('H:i:s') && $data->jam_akhir >= date('H:i:s')) disabled @endif">Pesan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
