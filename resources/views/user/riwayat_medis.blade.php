<link rel="icon" type="image/png"
    href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
<link rel="stylesheet" href="/css/pasien/riwayat_medis.css">
@vite(['resources/js/app.js', 'resources/sass/app.scss'])

<body>
    @include('layout.sidebar')

    <h5 class="mt-4">Rekam Medis Pasien</h5>

    <div class="container">
        <div class="d-flex justify-content-start">
            <a href="/pdf/pdf" target="_blank" class="me-2">
                <button type="button" class="btn btn-danger">
                    <i class="bi bi-file-earmark-pdf"></i> PDF
                </button>
            </a>
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
        <div class="card mt-4">
            <div class="container">
                @if ($data_medis->isEmpty())
                    <p>Anda belum diperiksa</p>
                @else
                    @foreach ($data_medis as $riwayat)
                        <div class="left-column">
                            <span><b>Nama:</b> {{ $riwayat->name }}</span>
                            <span><b>Jenis Kelamin:</b> {{ $riwayat->gender }}</span>
                            <span><b>No HP:</b> {{ $riwayat->no_hp }}</span>
                            <span><b>Email:</b> {{ $riwayat->email }}</span>
                        </div>
                        <div class="right-column">
                            <span><b>BPJS:</b> {{ $riwayat->no_bpjs }}</span>
                            <span><b>Gol Darah:</b> {{ $riwayat->gol_darah }}</span>
                            <span><b>Tanggal Lahir:</b> {{ $riwayat->tanggal_lahir }}</span>
                            <span><b>Alamat:</b> {{ $riwayat->alamat }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
    <div id="obat" class="content-section">
        <div class="card-1 mt-4">
            <div class="container">
                @if ($data_medis->isEmpty())
                    <p>Anda belum diperiksa</p>
                @else
                    @foreach ($data_medis as $riwayat)
                        <div class="left-column">
                            <span><b>Nama Obat:</b> {{ $riwayat->nama_obat }}</span>
                            <span><b>Harga:</b> {{ $riwayat->harga }}</span>
                            <span><b>Jumlah:</b> {{ $riwayat->jumlah }}</span>
                            <span><b>Catatan:</b> {{ $riwayat->catatan_dokter }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div id="catatan_dokter" class="content-section">
        <div class="card-2 mt-4">
            <div class="container">
                @if ($data_medis->isEmpty())
                    <p>Anda belum diperiksa</p>
                @else
                    @foreach ($data_medis as $riwayat)
                        <div class="left-column">
                            <span><b>Dokter:</b> {{ $riwayat->dokter }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div id="app">
        <sidebar></sidebar>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- JavaScript untuk Section -->
    <script src="/js/section.js"></script>

</body>
