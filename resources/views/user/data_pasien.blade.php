<link rel="icon" type="image/png"
    href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
<link rel="stylesheet" href="/css/pasien/pasien.css">
@vite(['resources/js/app.js', 'resources/sass/app.scss'])

<body>
    @include('layout.sidebar')

    <!-- Tampilkan pesan error jika no_bpjs sudah ada -->
    @if ($errors->has('no_bpjs'))
        <div id="notification" class="notification error">
            {{ $errors->first('no_bpjs') }}
        </div>
    @endif

    <main class="content px-3 py-4">
        <!-- Container for Button and Search Form -->
        <div class="d-flex justify-content-between">

            <!-- Search Form -->
            <div class="search">
                <form action="{{ route('cari_data_pasien') }}" method="GET" role="search" class="d-flex">
                    <input class="form-control me-2" name="cari_data_pasien" type="cari_data_pasien"
                        placeholder="Search" aria-label="Search" style="width: 150px;">
                    <button class="btn bg-success text-white" type="submit">Search</button>
                </form>
            </div>
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Keluhan</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">No HP</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Gol Darah</th>
                                        <th scope="col">Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pasien as $pasien)
                                        <tr>
                                            <td>{{ $pasien->name }}</td>
                                            <td>{{ $pasien->no_bpjs }}</td>
                                            <td>{{ $pasien->email }}</td>
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
                {{ $data_pasien->links('pagination::bootstrap-4') }}
            </ul>
            <!-- Pagination Info -->
            <div class="pagination-info">
                Showing {{ $data_pasien->firstItem() }} to {{ $data_pasien->lastItem() }} of
                {{ $data_pasien->total() }} results
            </div>
        </nav>

        <div id="app">
            <sidebar></sidebar>
        </div>

        <!-- JavaScript untuk Unique BPJS -->
        <script src="/js/no_bpjs.js"></script>


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

        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    title: "Berhasil!",
                    text: "Silahkan cek jadwal!",
                    icon: "success"
                });
            </script>
        @endif
</body>

</html>
