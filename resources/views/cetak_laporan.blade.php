<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        .judul {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }
    </style>
</head>

<body>
    <h1 class="judul">JADWAL RUANGAN UJIAN CBT</h1>
    <h1 class="judul">POLTEKES KEMENKES BENGKULU</h1>
    <hr>
    <table>
        <thead>
            <tr style="background-color: #5e5b5b; color: white">
                <th>No</th>
                <th>Hari</th>
                <th>Tanggal Pemesanan</th>
                <th>Jam</th>
                <th>Nama Pemilih</th>
                <th>Prodi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach (Auth::user()->ruanganpilihuser as $data)
                @php
                    $no++;
                @endphp
                @if ($no % 2 == 0)
                    <tr style="background-color: yellow;">
                        <td>{{ $no }}</td>
                        <td>{{ $data->hari }}</td>
                        <td>{{ $data->tanggal_pesan }}</td>
                        <td>{{ $data->jam_awal }}-{{ $data->jam_akhir }}</td>
                        <td>{{ Auth::user()->nama }}</td>
                        <td>{{ Auth::user()->prodi }}</td>
                        <td>{!! $data->keterangan !!}</td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $data->hari }}</td>
                        <td>{{ $data->tanggal_pesan }}</td>
                        <td>{{ $data->jam_awal }}-{{ $data->jam_akhir }}</td>
                        <td>{{ Auth::user()->nama }}</td>
                        <td>{{ Auth::user()->prodi }}</td>
                        <td>{!! $data->keterangan !!}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>
