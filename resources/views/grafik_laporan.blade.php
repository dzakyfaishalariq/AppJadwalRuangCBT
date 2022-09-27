@extends('template_admin.main')
@section('content')
    <br>
    <div class=" mb-2 p-2 bg-info rounded-3 shadow-lg">
        <h4 class=" text-center">{{ $title }}</h4>
    </div>
    <hr>
    <div class="mb-2 p-2 bg-light rounded-3 shadow-lg d-flex justify-content-center">
        <canvas id="myChart" style="width:100%;max-width:500px"></canvas>

        <script>
            var xValues = {!! json_encode($nama) !!};
            var yValues = {!! json_encode($jumlah_dipilih) !!};
            var barColors = ["red", "green", "blue", "orange", "brown"];

            new Chart("myChart", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Jumlah Pemesanan Tiap Prodi"
                    }
                }
            });
        </script>
    </div>
@endsection
