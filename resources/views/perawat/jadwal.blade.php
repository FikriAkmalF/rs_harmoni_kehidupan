    <link rel="icon" type="image/png"
        href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
    <link rel="stylesheet" href="/css/layout/jadwal.css">
    <link rel="stylesheet" href="/css/layout/pagination.css">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    <body>
        @include('layout.sidebar_perawat')
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-start">
                    <p><strong>Jadwal Pemeriksaan</strong></p>

                    <!-- Search Form for Date -->
                    <div class="search mt-2">
                        <form action="{{ route('cari_tanggal_jadwal') }}" method="GET" role="search" class="d-flex"
                            id="searchForm">
                            <input class="form-control me-2" name="cari_tanggal_jadwal" type="date"
                                placeholder="Search" aria-label="Search" style="width: 150px;"
                                onchange="document.getElementById('searchForm').submit();">
                        </form>
                    </div>
                </div>

                <!-- Search Form for Text -->
                <div class="search">
                    <form action="{{ route('cari_pasien') }}" method="GET" role="search" class="d-flex">
                        <input class="form-control me-2" name="cari_pasien" type="text" placeholder="Search"
                            aria-label="Search" style="width: 150px;">
                        <button class="btn bg-success text-white" type="submit">Search</button>
                    </form>
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
                                        <th scope="col">Dokter</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">No HP</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_jadwal as $jadwal)
                                        <tr>
                                            <td>{{ $jadwal->name }}</td>
                                            <td>{{ $jadwal->no_antrian }}</td>
                                            <td>{{ $jadwal->no_bpjs }}</td>
                                            <td>{{ $jadwal->dokter }}</td>
                                            <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</td>
                                            <td>{{ $jadwal->no_hp }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <form action="{{ route('jadwal.hapus', $jadwal->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete-button btn btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
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
                {{ $data_jadwal->links('pagination::bootstrap-4') }}
            </ul>
            <!-- Pagination Info -->
            <div class="pagination-info">
                Showing {{ $data_jadwal->firstItem() }} to {{ $data_jadwal->lastItem() }} of
                {{ $data_jadwal->total() }} results
            </div>
        </nav>

        <div id="app">
            <sidebar></sidebar>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('/js/app.js') }}"></script>

        @if ($message = Session::get('tanggal_error'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Aduh",
                    text: "Tidak ada tanggal pemeriksaan yang ditemukan!",
                });
            </script>
        @endif

        @if ($message = Session::get('error_nama'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Aduh",
                    text: "Tidak ada nama yang ditemukan!",
                });
            </script>
        @endif

        @if ($message = Session::get('success_hapus'))
            <script>
                Swal.fire({
                    title: "Berhasil!",
                    text: "Berhasil menghapus Jadwal!",
                    icon: "success"
                });
            </script>
        @endif

    </body>

    </html>
