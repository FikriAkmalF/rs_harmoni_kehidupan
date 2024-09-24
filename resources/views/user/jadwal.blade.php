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
    @include('layout.sidebar')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <p class="text-start"><strong>Jadwal Pemeriksaan, {{ Auth::user()->name }}</strong></p>

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
                                    <th scope="col">Email</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->name }}</td>
                                    <td>{{ $jadwal->no_antrian }}</td>
                                    <td>{{ $jadwal->no_bpjs }}</td>
                                    <td>{{ $jadwal->no_hp }}</td>
                                    <td>{{ $jadwal->email }}</td>
                                    <td>{{ $jadwal->tanggal }}</td>
                                    <td>{{ $jadwal->dokter }}</td>
                                    <td>{{ $jadwal->catatan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <div id="app">
        <sidebar></sidebar>
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>
