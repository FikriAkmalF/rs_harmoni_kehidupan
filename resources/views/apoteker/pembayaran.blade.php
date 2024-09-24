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
                                    <th scope="col">No HP</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Obat</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_riwayat as $riwayat)
                                    <tr>
                                        <td>{{ $riwayat->name }}</td>
                                        <td>{{ $riwayat->no_bpjs }}</td>
                                        <td>{{ $riwayat->no_hp }}</td>
                                        <td>{{ $riwayat->gender }}</td>
                                        <td>{{ $riwayat->email }}</td>
                                        <td>{{ $riwayat->nama_obat }}</td>
                                        <td>{{ $riwayat->harga }}</td>
                                        <td>{{ $riwayat->jumlah }}</td>
                                @endforeach
                                @foreach ($data_order as $item)
                                <td>{{ $item->keterangan }}</td>
                                @endforeach
                                </tr>
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
            {{ $data_riwayat->links('pagination::bootstrap-4') }}
        </ul>
        <!-- Pagination Info -->
        <div class="pagination-info">
            Showing {{ $data_riwayat->firstItem() }} to {{ $data_riwayat->lastItem() }} of
            {{ $data_riwayat->total() }}
            results
        </div>
    </nav>

    <div id="app">
        <apotek></apotek>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>

</body>

</html>
