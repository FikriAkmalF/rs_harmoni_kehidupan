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
                        <h4>Tambah Jadwal Praktek</h4>
                        <div>
                            <a href="/perawat/pasien">
                                <button type="button" class="btn btn-secondary">Back</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <form action="{{ route('jadwal.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $pasien->id }}">
                        <div class="form-group">
                            <input type="text" id="keterangan" name="keterangan" value="Selesai"
                                hidden required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" name="name" placeholder="Nama"
                                value="{{ $pasien->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" id="no_hp" name="no_hp" placeholder="Nama"
                                value="{{ $pasien->no_hp }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_bpjs" class="form-label">BPJS</label>
                            <input type="text" id="no_bpjs" name="no_bpjs" placeholder="Nama"
                                value="{{ $pasien->no_bpjs }}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="user_id" name="user_id" placeholder="Nama"
                                value="{{ $pasien->user_id }}" hidden required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Gender</label>
                            <select id="gender" name="gender" required>
                                <option value="">Gender</option>
                                <option value="L" {{ $pasien->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ $pasien->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="form-label">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email (Aktif)</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $pasien->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="keluhan" class="form-label">keluhan</label>
                            <input type="text" class="form-control" id="keluhan" name="keluhan"
                                value="{{ $pasien->keluhan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gol_darah" class="form-label">Gol Darah</label>
                            <input type="text" class="form-control" id="gol_darah" name="gol_darah"
                                value="{{ $pasien->gol_darah }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $pasien->alamat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="dokter" class="form-label">Dokter</label>
                            <select class="form-select" aria-label="Default select example" id="dokter"
                                name="dokter" required>
                                <option selected>Dokter</option>
                                <option value="Dr. Budi Santoso">Dr. Budi Santoso (Dokter Umum)</option>
                                <option value="Dr. Andi Wirawan">Dr. Andi Wirawan (Dokter Gigi)</option>
                                <option value="Dr. Dwi Haryanto">Dr. Dwi Haryanto (Dokter Anak)</option>
                                <option value="Dr. Irwan Raharja">Dr. Irwan Raharja (Dokter Jantung)</option>
                                <option value="Dr. Bambang Hermawan">Dr. Bambang Hermawan (Dokter Mata)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catatan" class="form-label">Catatan</label>
                            <input type="text" id="catatan" name="catatan" placeholder="Catatan" required>
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
        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <script>
            document.getElementById('dokter').addEventListener('change', function() {
                let dokter = this.value;
                let kodeAntrian = '';

                switch (dokter) {
                    case 'Dr. Budi Santoso':
                        kodeAntrian = 'U';
                        break;
                    case 'Dr. Andi Wirawan':
                        kodeAntrian = 'G';
                        break;
                    case 'Dr. Dwi Haryanto':
                        kodeAntrian = 'A';
                        break;
                    case 'Dr. Irwan Raharja':
                        kodeAntrian = 'J';
                        break;
                    case 'Dr. Bambang Hermawan':
                        kodeAntrian = 'M';
                        break;
                }

                document.getElementById('no_antrian').value = kodeAntrian;
            });
        </script>

    </body>

    </html>
