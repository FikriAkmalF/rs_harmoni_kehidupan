<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png"
        href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.sidebar_dokter')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <p class="text-start">Jadwal Pemeriksaan,
                <br>Dokter: <b>{{ Auth::user()->name }}</b>
                <br>Spesialis: <b>{{ Auth::user()->spesialis }}</b>
            </p>

            {{-- <button type="button" class="btn btn-sm btn-danger">Request Obat</button> --}}
            
            <!-- Search Form -->
            {{-- <div class="search">
                <form action="" method="GET" role="search" class="d-flex">
                    <input class="form-control me-2" name="cari_pasien" type="text" placeholder="Search"
                        aria-label="Search" style="width: 150px;">
                    <button class="btn bg-success text-white" type="submit">Search</button>
                </form>
            </div> --}}
        </div>


        <div class="mb-1">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                    </div>
                    <div id="table-container" class="table-container mt-3">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr class="highlight">
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Antrian</th>
                                    <th scope="col">BPJS</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Tanggal Pemeriksaan</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Action</th>
                                    {{-- <th scope="col">Keterangan</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if ($jadwal_praktek->isEmpty())
                                    <tr>
                                        <td colspan="8">Tidak ada pasien untuk diperiksa</td>
                                    </tr>
                                @else
                                    @foreach ($jadwal_praktek as $jadwal)
                                        <tr>
                                            <td>{{ $jadwal->name }}</td>
                                            <td>{{ $jadwal->no_antrian }}</td>
                                            <td>{{ $jadwal->no_bpjs }}</td>
                                            <td>{{ $jadwal->no_hp }}</td>
                                            <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</td>
                                            <td>{{ $jadwal->dokter }}</td>
                                            <td>
                                                <a href="/dokter/{{ $jadwal->id }}/pemeriksaan">
                                                    <div class="action-button">
                                                        <button type="button"
                                                            class="btn btn-success btn-sm">Pemeriksaan</button>
                                                    </div>
                                                </a>
                                            </td>
                                            {{-- @foreach ($riwayat as $item)
                                            <td>{{ $item->keterangan }}</td>
                                            @endforeach --}}
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!-- Pagination Links -->
                        {{ $jadwal_praktek->links() }}
                    </div>
                </div>
            </div>
        </div>

        </main>

        <div id="app">
            <sidebar></sidebar>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('/js/app.js') }}"></script>

        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    title: "Berhasil!",
                    text: "Pasien telah diperiksa!",
                    icon: "success"
                });
            </script>
        @endif

        @if ($message = Session::get('error_obat'))
            <script>
                Swal.fire({
                    title: "Gagal!",
                    text: "Stok obat habis!",
                    icon: "error"
                });
            </script>
        @endif

</body>

</html>
