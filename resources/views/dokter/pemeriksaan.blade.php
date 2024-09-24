    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png"
            href="https://vignette.wikia.nocookie.net/logopedia/images/6/64/Rumah_Sakit_Jakarta_Medical_Center.png/revision/latest/scale-to-width-down/2000?cb=20191012152118">
        <link rel="stylesheet" href="/css/perawat/edit.css">
        @vite(['resources/js/app.js', 'resources/sass/app.scss'])
        <title>RS Harmoni Kehidupan</title>
    </head>

    <body>
        <div class="main">
            <div class="content">
                <div class="form-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Tambah Riwayat Medis</h4>
                        <div>
                            <a href="/dokter/jadwal">
                                <button type="button" class="btn btn-secondary">Back</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <form action="{{ route('pemeriksaan.tambah' ) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $jadwal->id }}">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" name="name" placeholder="Nama"
                                value="{{ $jadwal->name }}" readonly required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="user_id" name="user_id" placeholder="Nama"
                                value="{{ $jadwal->user_id }}" hidden required>
                        </div>
                        <div class="form-group">
                            <label for="no_bpjs" class="form-label">BPJS</label>
                            <input type="text" id="no_bpjs" name="no_bpjs" placeholder="Nama"
                                value="{{ $jadwal->no_bpjs }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" id="no_hp" name="no_hp" placeholder="Nama"
                                value="{{ $jadwal->no_hp }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Gender</label>
                            <select id="gender" name="gender" required>
                                <option value="">Gender</option>
                                <option value="L" {{ $jadwal->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ $jadwal->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $jadwal->email }}" hidden required>
                        </div>
                        <div class="form-group">
                            <label for="nama_obat" class="form-label">Obat</label>
                            <select id="nama_obat" name="nama_obat" required>
                                <option value="">Pilih Obat</option>
                                @foreach ($obat as $item)
                                    <option value="{{ $item->nama_obat }}" data-harga="{{ $item->harga }}">
                                        {{ $item->nama_obat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" id="harga" name="harga" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <select class="form-select" aria-label="Default select example" id="jumlah"
                                name="jumlah" required>
                                <option selected>Jumlah Obat</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ $jadwal->tanggal_lahir }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="gol_darah" class="form-label">Gol Darah</label>
                            <input type="text" class="form-control" id="gol_darah" name="gol_darah"
                                value="{{ $jadwal->gol_darah }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="keluhan" class="form-label">Keluhan</label>
                            <input type="text" class="form-control" id="keluhan" name="keluhan"
                                value="{{ $jadwal->keluhan }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $jadwal->alamat }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control" id="tanggal_pemeriksaan"
                                name="tanggal_pemeriksaan" required>
                        </div>
                        <div class="form-group">
                            <label for="dokter" class="form-label">Dokter</label>
                            <input type="text" class="form-control" id="dokter" name="dokter"
                                value="{{ $jadwal->dokter }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="catatan_dokter" class="form-label">Catatan</label>
                            <input type="text" id="catatan_dokter" name="catatan_dokter" placeholder="Catatan"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="keterangan" name="keterangan" value="Selesai" placeholder="Keterangan"
                                hidden required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="app">
            <sidebar></sidebar>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <!-- Include jQuery -->
        <script>
            $(document).ready(function() {
                // Function to update the price based on selected amount
                function updateHarga() {
                    var harga = $('#nama_obat').find(':selected').data('harga'); // Get the price of the selected medicine
                    var jumlah = $('#jumlah').val(); // Get the selected quantity
                    var totalHarga = harga * jumlah; // Calculate the total price
                    $('#harga').val(totalHarga); // Update the price field
                }
        
                // Trigger when medicine is selected
                $('#nama_obat').change(function() {
                    updateHarga();
                });
        
                // Trigger when quantity is changed
                $('#jumlah').change(function() {
                    updateHarga();
                });
            });
        </script>
        

        @if ($message = Session::get('error'))
            <script>
                Swal.fire({
                    title: "Gagal!",
                    icon: "error"
                });
            </script>
        @endif

        @if ($errors->has('no_bpjs'))
            <script>
                Swal.fire({
                    title: "BPJS sudah ada!",
                    icon: "error"
                });
            </script>
        @endif


    </body>

    </html>
