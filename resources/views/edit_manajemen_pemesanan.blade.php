@extends('template_admin.main')
@section('content')
    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class=" card-body">
            <form action="/update_manajemen_pemesanan" method="post">
                @csrf
                @method('PUT')
                <h5 class="card-title">Keterangan dan Tanggal Pemakaian </h5>
                <hr>
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="kode" value="{{ $data->kode }}">
                {{-- <input type="hidden" name="no" --}}
                {{-- label --}}
                <label>Tanggal pemakaian</label>
                <input class="form-control" type="date" name="tanggal_pemakaian" value="{{ $data->tanggal_pemakaian }}"
                    required>
                <br>
                {{-- value="{{ $i }}"> --}}
                <label>Keterangan</label>
                <textarea name="keterangan" id="editor{{ $data->id }}" cols="30" rows="10">{!! $data->keterangan !!}</textarea>
                <script>
                    CKEDITOR.replace('editor{{ $data->id }}')
                </script>
                <hr>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
