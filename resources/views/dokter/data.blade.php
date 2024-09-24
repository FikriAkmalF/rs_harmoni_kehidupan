<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png"
        href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
    <link rel="stylesheet" href="/css/layout/data.css">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.sidebar_dokter')

    <div class="d-flex flex-wrap">
        @foreach ($obat as $obat)
            <div class="card mt-4 mb-4 mx-2" style="width: 13rem;">
                <div class="card-body">
                    <span class="card-title"><b>{{ $obat['nama_obat'] }}</b></span>
                    <p class="card-text">Harga: Rp. {{ $obat['harga'] }} <br>Stok: {{ $obat['jumlah'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex flex-wrap justify-content-between">
        <!-- Pasien -->
        <div class="card shadow-lg mt-4 mb-4" style="width: 24rem; margin-left: 50px;">
            <div class="card-body">
                <h5 class="card-title text-center"><b>Pasien</b></h5>
                <p class="text-center">Jumlah Pasien: {{ $jumlahPasien }}</p>
            </div>
            {{-- <div class="alert alert-info mt-4">
                <strong>Total Pasien: {{ $totalPasien }}</strong>
            </div> --}}
        </div>

        <!-- Jadwal -->
        <div class="card shadow-lg mt-4 mb-4" style="width: 24rem; margin-right: 50px;">
            <div class="card-body">
                <h5 class="card-title text-center"><b>Jadwal</b></h5>
                <p class="text-center">Jumlah Jadwal: {{ $jumlahJadwal }}</p>
            </div>
        </div>
    </div>


    <div id="app">
        <sidebar></sidebar>
    </div>




    <script src="{{ asset('/js/app.js') }}"></script>


</body>

</html>
