<template>
    <div class="content">
        <div class="health-solutions">
            <span>Pasien adalah prioritas kami</span>
        </div>
        <div class="additional-info">
            <p>
                Pasien adalah prioritas utama dalam setiap langkah 
                pelayanan kesehatan yang kami berikan. Setiap tindakan 
                medis, mulai dari diagnosis hingga perawatan, dirancang 
                untuk memberikan yang terbaik bagi pasien. Kami percaya 
                bahwa kesembuhan dan kenyamanan pasien harus selalu berada 
                di pusat perhatian. Oleh karena itu, semua tim medis bekerja 
                dengan penuh dedikasi untuk memastikan kebutuhan pasien terpenuhi dengan baik.
            </p>
        </div>
        <div class="info-boxes">
            <div class="info-box">
                <a href="/perawat/pasien">
                    <p>Pasien</p>
                    <img
                        src="https://cdn-icons-png.flaticon.com/256/2832/2832965.png"
                        alt="Patient"
                    />
                </a>
            </div>
            <div class="info-box">
                <a href="/perawat/jadwal">
                    <p>Jadwal</p>
                    <img
                        src="https://cdn-icons-png.flaticon.com/256/10365/10365034.png"
                        alt="Working Hours"
                    />
                </a>
            </div>
            <div class="info-box">
                <a href="/perawat/riwayat_medis">
                    <p>Riwayat Medis</p>
                    <img src="/img/rekam_medis.png" alt="Working Hours" />
                </a>
            </div>
            <div class="info-box">
                <a href="/perawat/data">
                    <p>Data</p>
                    <i class="bi bi-database" style="font-size: 4rem;"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Perawat",
};
</script>

<style scoped>
@import "/public/css/layout/dashboard.css";
</style>
