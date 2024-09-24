<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/pasien/dokter.css">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    @include('layout.sidebar')

    <h5 class="anggota mt-4">Beberapa Dokter, Perawat dan Apoteker<br> yang berperan aktif dalam RS Harmoni Kehidupan demi mencapai kesehatan yang maksimal</h5>
    <div class="container mt-2">
        <div class="card-container">
            <div class="card" style="width: 18rem;">
                <img src="https://www.writergirl.com/wp-content/uploads/2014/11/Doctor-790X1024.jpg" alt="Doctor Photo"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-center">Dr. Budi Santoso</h5>
                    <p><b>Spesialis:</b> Dokter Umum
                        <b>Pengalaman:</b> 15 Tahun
                        <b>Jadwal:</b> <br>Senin & Selasa, 09:00-15:00
                    </p>
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <img src="https://st.depositphotos.com/2234518/3930/i/950/depositphotos_39307949-stock-photo-doctor.jpg"
                    alt="Doctor Photo" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-center">Dr. Andi Wirawan</h5>
                    <p><b>Spesialis:</b> Gigi
                        <b>Pengalaman:</b> 10 Tahun
                        <b>Jadwal:</b> <br>Rabu & Kamis, 09:00-16:00
                    </p>
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <img src="https://png.pngtree.com/background/20211216/original/pngtree-doctor-and-female-doctors-office-holding-glasses-picture-image_1521887.jpg"
                    alt="Doctor Photo" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-center">Dr. Dwi Haryanto</h5>
                    <p><b>Spesialis:</b> Anak
                        <b>Pengalaman:</b> 10 Tahun
                        <b>Jadwal:</b> <br>Sabtu & Minggu, 08:00-13:00
                    </p>
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <img src="https://media.sciencephoto.com/image/c0312082/800wm/C0312082-Doctor.jpg" alt="Doctor Photo"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-center">Dr. Irwan Raharja</h5>
                    <p><b>Spesialis:</b> Jantung
                        <b>Pengalaman:</b> 25 Tahun
                        <b>Jadwal:</b> <br>Jumat & Sabtu, 10:00-16:00
                    </p>
                </div>
            </div>
        </div>
        <div class="card-container mt-5">
            <div class="card" style="width: 18rem;">
                <img src="https://www.topteny.com/wp-content/uploads/2015/02/doc-1.jpg" alt="Doctor Photo"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title text-center">Dr. Bambang Hermawan</h5>
                    <p><b>Spesialis:</b> Mata
                        <b>Pengalaman:</b> 15 Tahun
                        <b>Jadwal:</b> <br>Senin & Rabu, 11:00-16:00
                    </p>
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <img src="https://parableassociates.com/wp-content/uploads/2024/02/wepik-export-20240212185359ytqz-2-e1708005855295.png" class="card-img-top-2" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Lucy</h5>
                    <p><b>Posisi:</b> Perawat
                        <b>Pengalaman:</b> 6 Tahun
                    </p>
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <img src="https://media.istockphoto.com/id/1286928187/id/foto/potret-apoteker-muda-dalam-mantel-lab-putih.jpg?s=170667a&w=0&k=20&c=Tg_1qXyu13OvGVSX--9FOXbmg6SKTC2pOmpE3tach2U=" class="card-img-top-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Putri</h5>
                    <p><b>Posisi:</b> Apoteker
                        <b>Pengalaman:</b> 5 Tahun
                    </p>
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <img src="https://blog.assist.id/content/images/2019/02/persyaratan-menjadi-apoteker-assist-id-software-klinik-sistem-informasi-klinik.jpg" class="card-img-top-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Herdiyanto</h5>
                    <p><b>Posisi:</b> Apoteker
                        <b>Pengalaman:</b> 5 Tahun
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <sidebar></sidebar>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>


</body>

</html>
