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
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($data as $d)
                @php
                    $no++;
                @endphp
                @if ($no % 2 == 0)
                    <tr style="background-color: yellow;">
                        <td>{{ $no }}</td>
                        <td>{{ $d->hari }}</td>
                        <td>{{ $d->tanggal_pemesanan }}</td>
                        <td>{{ $d->jam_awal }}-{{ $d->jam_akhir }}</td>
                        <td>{{ $d->prodi }}</td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $d->hari }}</td>
                        <td>{{ $d->tanggal_pemesanan }}</td>
                        <td>{{ $d->jam_awal }}-{{ $d->jam_akhir }}</td>
                        <td>{{ $d->prodi }}</td>
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
