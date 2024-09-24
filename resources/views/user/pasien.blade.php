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
        <div class="d-flex justify-content-between mb-3">
            <!-- Button Konsultasi -->
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i>
                    Konsultasi
                </button>
                <div class="ms-3">
                    <strong>Data Anda</strong>
                </div>
            </div>


            <!-- Search Form -->
            <div class="search">
                <form action="{{ route('cari_pasien') }}" method="GET" role="search" class="d-flex">
                    <input class="form-control me-2" name="cari_pasien" type="cari_pasien" placeholder="Search"
                        aria-label="Search" style="width: 150px;">
                    <button class="btn bg-success text-white" type="submit">Search</button>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Konsultasi Anda</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pasien.tambah') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No HP</label>
                                <input type="number" class="form-control" id="no_hp" name="no_hp"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">BPJS</label>
                                <input type="number" class="form-control" id="no_bpjs" name="no_bpjs" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Keluhan</label>
                                <input type="text" class="form-control" id="keluhan" name="keluhan" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Gol Darah</label>
                                <input type="text" class="form-control" id="gol_darah" name="gol_darah" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                            <label for="exampleInputPassword1" class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" id="gender"
                                name="gender" required>
                                <option selected>Gender</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <div class="mt-4">
                                <label for="exampleInputPassword1" class="form-label">Tanggal lahir</label>
                                <input type="date" class="form-control" aria-label="Select a date"
                                    id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="submit" value="Save" class="btn btn-primary"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- <main class="content px-3 py-4"> --}}
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
                                        <th scope="col">Membatalkan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $pasien)
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
                                            <td>
                                                <div class="action-buttons">
                                                    @if (strtolower($pasien->status) == 'dibatalkan')
                                                        <!-- Tampilkan teks "Dibatalkan" jika status pasien sudah dibatalkan -->
                                                        <span class="text-muted">Dibatalkan</span>
                                                    @else
                                                        <!-- Tampilkan tombol "Batalkan" jika status pasien masih aktif -->
                                                        <form action="{{ route('pasien.batalkan', $pasien->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit"
                                                                class="delete-button btn btn-danger btn-sm">
                                                                Batalkan
                                                            </button>
                                                        </form>
                                                    @endif
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
        {{-- </main> --}}

        <!-- Pagination Links -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $data->links('pagination::bootstrap-4') }}
            </ul>
            <!-- Pagination Info -->
            <div class="pagination-info">
                Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} results
            </div>
        </nav>

        <div id="app">
            <sidebar></sidebar>
        </div>

        <!-- JavaScript untuk Unique BPJS -->
        <script src="/js/no_bpjs.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('/js/app.js') }}"></script>

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
                    text: "Silahkan cek jadwal!",
                    icon: "success"
                });
            </script>
        @endif

        @if ($message = Session::get('success_batalkan'))
            <script>
                Swal.fire("Tunggu beberapa saat Perawat akan menghapus data Anda!");
            </script>
        @endif


</body>

</html>
