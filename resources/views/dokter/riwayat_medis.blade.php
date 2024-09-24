<link rel="icon" type="image/png"
    href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
<link rel="stylesheet" href="/css/pasien/riwayat_medis.css">
@vite(['resources/js/app.js', 'resources/sass/app.scss'])

<body>
    @include('layout.sidebar_dokter')

    <h5 class="mt-4">Rekam Medis Pasien</h5>

    <div class="container">
        <div class="d-flex justify-content-start">
            <button type="button" class="btn btn-primary me-2" onclick="showSection('pasien')">
                <img src="https://cdn-icons-png.flaticon.com/256/2491/2491413.png" class="icon"> Pasien
            </button>
            <button type="button" class="btn btn-info me-2" onclick="showSection('obat')">
                <i class="bi bi-capsule"></i> Obat
            </button>
            <button type="button" class="btn btn-secondary" onclick="showSection('catatan_dokter')">
                <i class="bi bi-heart-pulse"></i> Dokter
            </button>
        </div>
    </div>



    <div id="pasien" class="content-section">
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-2">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr class="highlight">
                                        <th scope="col">Nama</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">No HP</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">BPJS</th>
                                        <th scope="col">Gol Darah</th>
                                        <th scope="col">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat_medis as $riwayat)
                                        <tr>
                                            <td>{{ $riwayat->name }}</td>
                                            <td>{{ $riwayat->gender }}</td>
                                            <td>{{ $riwayat->no_hp }}</td>
                                            <td>{{ $riwayat->email }}</td>
                                            <td>{{ $riwayat->no_bpjs }}</td>
                                            <td>{{ $riwayat->gol_darah }}</td>
                                            <td>{{ $riwayat->alamat }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

        <div id="obat" class="content-section" style="display: none;">
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nama Obat</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($riwayat_medis as $riwayat)
                                            <tr>
                                                <td>{{ $riwayat->name }}</td>
                                                <td>{{ $riwayat->nama_obat }}</td>
                                                <td>{{ $riwayat->harga }}</td>
                                                <td>{{ $riwayat->jumlah }}</td>
                                                <td>{{ $riwayat->catatan_dokter }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            {{-- <div class="card-1 mt-4">
                <div class="container">
                    @foreach ($riwayat_medis as $riwayat)
                        <div class="left-column">
                            <span><b>Nama Obat:</b> {{ $riwayat->nama_obat }}</span>
                            <span><b>Harga:</b> {{ $riwayat->harga }}</span>
                            <span><b>Jumlah:</b> {{ $riwayat->jumlah }}</span>
                            <span><b>Catatan:</b> {{ $riwayat->catatan_dokter }}</span>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>

        <div id="catatan_dokter" class="content-section">
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">Nama</th>
                                            <th scope="col">Dokter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($riwayat_medis as $riwayat)

                                            <tr>
                                                <td>{{ $riwayat->name }}</td>
                                                <td>{{ $riwayat->dokter }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            {{-- <div class="card-2 mt-4">
                <div class="container">
                    @foreach ($riwayat_medis as $riwayat)
                        <div class="left-column">
                            <span><b>Dokter:</b> {{ $riwayat->dokter }}</span>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>

        <div id="app">
            <sidebar></sidebar>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>

        <!-- JavaScript untuk Section -->
        <script src="/js/section.js"></script>

</body>
