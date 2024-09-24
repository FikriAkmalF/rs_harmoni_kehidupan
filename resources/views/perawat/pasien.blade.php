<link rel="icon" type="image/png"
    href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
<link rel="stylesheet" href="/css/perawat/pasien.css">
@vite(['resources/js/app.js', 'resources/sass/app.scss'])

<body>
    @include('layout.sidebar_perawat')

    <main class="content px-3 py-4">
    <!-- Flexbox Container for Alignment -->
    <div class="d-flex justify-content-between align-items-center mt-2">
        <!-- Search Form -->
        <form action="{{ route('cari_pasien_data') }}" method="GET" role="search" class="d-flex"
            style="padding-right: 20px;">
            <input class="form-control" name="cari_pasien_data" type="cari_pasien_data" placeholder="Search"
                aria-label="Search" style="width: 150px;">
            <button class="btn bg-success text-white" type="submit">Search</button>
        </form>
        
        <!-- Button to Filter by Status -->
        <form action="{{ route('cari_pasien_status') }}" method="GET" role="search" class="d-flex">
            <input type="hidden" name="cari_pasien_status" value="Dibatalkan">
            <button class="btn btn-danger" type="submit">Dibatalkan</button>
        </form>
    </div>
    


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
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    {{-- <th scope="col">Keterangan</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pasien as $pasien)
                                    <tr>
                                        <td>{{ $pasien->name }}</td>
                                        <td>{{ $pasien->no_bpjs }}</td>
                                        <td>{{ $pasien->keluhan }}</td>
                                        <td>{{ $pasien->gender }}</td>
                                        <td>{{ $pasien->no_hp }}</td>
                                        <td>{{ $pasien->alamat }}</td>
                                        <td>{{ $pasien->gol_darah }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $pasien->status }}
                                            <div class="action-buttons">
                                                <form action="{{ route('pasien.hapus', $pasien->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-button btn btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="/perawat/{{ $pasien->id }}/edit">
                                                <button type="button" class="btn btn-primary">Jadwal</button>
                                            </a>
                                        </td>
                                        {{-- @foreach ($data_jadwal as $item)    
                                        <td>
                                            @if ($loop->first)
                                            {{ $data_jadwal->first()->keterangan }}
                                        @endif
                                        </td>
                                        @endforeach --}}
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <div id="app">
        <sidebar></sidebar>
    </div>

    <!-- Pagination Links -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{ $data_pasien->links('pagination::bootstrap-4') }}
        </ul>
        <!-- Pagination Info -->
        <div class="pagination-info">
            Showing {{ $data_pasien->firstItem() }} to {{ $data_pasien->lastItem() }} of {{ $data_pasien->total() }}
            results
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/js/app.js') }}"></script>


    @if ($message = Session::get('error_batal'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Aduh",
                text: "Tidak ada yang membatalkan!",
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

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "Pasien sudah terjadwalkan!",
                icon: "success"
            });
        </script>
    @endif

    @if ($message = Session::get('success_hapus'))
        <script>
            Swal.fire("Berhasil menghapus data Pasien!");
        </script>
    @endif

</body>

</html>
