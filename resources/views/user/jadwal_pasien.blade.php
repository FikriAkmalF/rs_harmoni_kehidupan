<link rel="icon" type="image/png"
    href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
<link rel="stylesheet" href="/css/layout/pagination.css">
@vite(['resources/js/app.js', 'resources/sass/app.scss'])


<body>
    @include('layout.sidebar')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-start mt-4">
            <div class="text-start">
                <p><strong>Jadwal Pemeriksaan</strong></p>

                <!-- Dropdown Search with Auto-Submit -->
                <div class="form-group mt-3">
                    <form action="{{ route('cari_dokter') }}" method="GET" role="search"
                        class="d-flex align-items-center">
                        <select class="form-control me-3" name="cari_dokter"
                            style="width: 110px; padding: 10px; border-radius: 50px; font-size: 14px; border: 1px solid #000;"
                            onchange="this.form.submit()">
                            <option value="">Pilih Dokter</option>
                            <option value="Dr. Budi Santoso">Dr. Budi Santoso (Dokter Umum)</option>
                            <option value="Dr. Andi Wirawan">Dr. Andi Wirawan (Dokter Gigi)</option>
                            <option value="Dr. Dwi Haryanto">Dr. Dwi Haryanto (Dokter Anak)</option>
                            <option value="Dr. Irwan Raharja">Dr. Irwan Raharja (Dokter Jantung)</option>
                            <option value="Dr. Bambang Hermawan">Dr. Bambang Hermawan (Dokter Mata)</option>
                        </select>
                    </form>
                </div>
            </div>

            <!-- Search Form -->
            <div class="search d-flex flex-column">
                <form action="{{ route('cari_nama_pasien') }}" method="GET" role="search" class="d-flex mb-3">
                    <input class="form-control me-2" name="cari_nama_pasien" type="text" placeholder="Search"
                        aria-label="Search" style="width: 150px;">
                    <button class="btn bg-success text-white" type="submit">Search</button>
                </form>

                <!-- Button trigger modal (moved here) -->
                <button type="button" class="btn btn-primary btn-sm align-self-end" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Keterangan antrian
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dr. Budi Santoso (Dokter Umum), antrian '<strong>U</strong>'</li>
                            <li class="list-group-item">Dr. Andi Wirawan (Dokter Gigi), antrian '<strong>G</strong>'</li>
                            <li class="list-group-item">Dr. Dwi Haryanto (Dokter Anak), antrian '<strong>A</strong>'</li>
                            <li class="list-group-item">Dr. Irwan Raharja (Dokter Jantung), antrian '<strong>J</strong>'</li>
                            <li class="list-group-item">Dr. Bambang Hermawan (Dokter Mata), antrian '<strong>M</strong>'</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
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
                                @foreach ($jadwal_pasien as $jadwal)
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

    <!-- Pagination Links -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{ $jadwal_pasien->links('pagination::bootstrap-4') }}
        </ul>
        <!-- Pagination Info -->
        <div class="pagination-info">
            Showing {{ $jadwal_pasien->firstItem() }} to {{ $jadwal_pasien->lastItem() }} of
            {{ $jadwal_pasien->total() }} results
        </div>
    </nav>

    <div id="app">
        <sidebar></sidebar>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

    @if ($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Aduh",
                text: "Tidak ada nama yang ditemukan!",
            });
        </script>
    @endif

    @if ($message = Session::get('error_dokter'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Tidak Ada",
                text: "Tidak ada jadwal dokter yang ditemukan!",
            });
        </script>
    @endif
</body>

</html>
