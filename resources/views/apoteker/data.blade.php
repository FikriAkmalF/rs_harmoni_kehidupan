<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png"
    href="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2157447622/settings_images/f8dcb26-5efa-561-0e3e-ee4dc5e84f_medicine-2801025_1280.png">
    <link rel="stylesheet" href="/css/apoteker/data.css">
    <title>Obatin Aja</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body>
    @include('layout.sidebar_apoteker')

    <div class="d-flex flex-wrap">
        @foreach ($obat as $obat)
            <div class="card mt-4 mb-4 mx-2" style="width: 12rem;">
                <div class="card-body">
                    <span class="card-title"><b>{{ $obat['nama_obat'] }}</b></span>
                    <p class="card-text">Harga: Rp. {{ $obat['harga'] }} <br>Stok: {{ $obat['jumlah'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div id="app">
        <apotek></apotek>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>