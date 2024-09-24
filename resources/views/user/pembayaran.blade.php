<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png"
        href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
    <link rel="stylesheet" href="/css/pasien/tagihan.css">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Tagihan
                    </div>
                    @foreach ($data_pembayaran as $riwayat)
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Rp. {{ $riwayat->harga }}</p>
                                <footer class="blockquote-footer">Harap bayar terlebih dahulu sebelum mengambil obat
                                </footer>
                            </blockquote>
                        </div>
                    @endforeach
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
                                            <th scope="col">No HP</th>
                                            <th scope="col">Obat</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Tagihan</th>
                                            <th scope="col">Action</th>
                                            {{-- <th scope="col">Status</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data_pembayaran->isEmpty())
                                            <tr>
                                                <td colspan="8">Tidak ada pembayaran</td>
                                            </tr>
                                        @else
                                            @foreach ($data_pembayaran as $riwayat)
                                                <tr>
                                                    <td>{{ $riwayat->name }}</td>
                                                    <td>{{ $riwayat->no_bpjs }}</td>
                                                    <td>{{ $riwayat->no_hp }}</td>
                                                    <td>{{ $riwayat->nama_obat }}</td>
                                                    <td>{{ $riwayat->jumlah }}</td>
                                                    <td>{{ $riwayat->harga }}</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Bayar
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="exampleModalLabel">Pembayaran</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: left;">
                                                                        <form action="{{ route('pembayaran.checkout') }}" method="POST">
                                                                            @csrf
                                                                            <div class="mb-3">
                                                                                <input type="text" class="form-control" id="user_id" name="user_id"
                                                                                placeholder="{{ $riwayat->user_id }}" value="{{ $riwayat->user_id }}" aria-describedby="emailHelp" hidden required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                                                <input type="text" class="form-control" id="name" name="name"
                                                                                placeholder="{{ $riwayat->name }}" value="{{ $riwayat->name }}" aria-describedby="emailHelp" readonly required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleInputEmail1" class="form-label">No HP</label>
                                                                                <input type="number" class="form-control" id="no_hp" name="no_hp"
                                                                                placeholder="{{ $riwayat->no_hp }}" value="{{ $riwayat->no_hp }}" aria-describedby="emailHelp" readonly required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleInputEmail1" class="form-label">Obat</label>
                                                                                <input type="text" class="form-control" id="nama_obat" name="nama_obat"
                                                                                placeholder="{{ $riwayat->nama_obat }}" value="{{ $riwayat->nama_obat }}" aria-describedby="emailHelp" readonly required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                                                                <input type="number" class="form-control" id="qty" name="qty"
                                                                                placeholder="{{ $riwayat->jumlah }}" value="{{ $riwayat->jumlah }}" aria-describedby="emailHelp" readonly required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleInputEmail1" class="form-label">Total Pembayaran</label>
                                                                                <input type="number" class="form-control" id="total_harga" name="total_harga"
                                                                                placeholder="{{ $riwayat->harga }}" value="{{ $riwayat->harga }}" aria-describedby="emailHelp" readonly required>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <input type="submit" name="submit" value="Bayar" class="btn btn-primary"></input>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                {{-- @foreach ($data_status as $item)
                                                <td>{{ $item->status }}</td>
                                                @endforeach --}}
                                        @endif
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

            <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>
