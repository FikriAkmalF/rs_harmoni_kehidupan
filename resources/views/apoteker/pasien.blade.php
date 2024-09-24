<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png"
        href="https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/file-uploads/themes/2157447622/settings_images/f8dcb26-5efa-561-0e3e-ee4dc5e84f_medicine-2801025_1280.png">
    <link rel="stylesheet" href="/css/layout/pagination.css">
    <title>Obatin Aja</title>
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.sidebar_apoteker')
    
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <div class="mb-2">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr class="highlight">
                                    <th scope="col">Nama</th>
                                    <th scope="col">BPJS</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Gol Darah</th>
                                    <th scope="col">Tanggal lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien_data as $pasien)
                                    <tr>
                                        <td>{{ $pasien->name }}</td>
                                        <td>{{ $pasien->no_bpjs }}</td>
                                        <td>{{ $pasien->keluhan }}</td>
                                        <td>{{ $pasien->gender }}</td>
                                        <td>{{ $pasien->no_hp }}</td>
                                        <td>{{ $pasien->alamat }}</td>
                                        <td>{{ $pasien->gol_darah }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Pagination Links -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{ $pasien_data->links('pagination::bootstrap-4') }}
        </ul>
        <!-- Pagination Info -->
        <div class="pagination-info">
            Showing {{ $pasien_data->firstItem() }} to {{ $pasien_data->lastItem() }} of {{ $pasien_data->total() }}
            results
        </div>
    </nav>

    <div id="app">
        <apotek></apotek>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>