<template>
    <div class="content">
        <div class="health-solutions">
            <span>Pasien adalah prioritas kami</span>
        </div>
        <div class="additional-info">
            <p>
                Sebagai dokter, kesehatan dan kesejahteraan pasien 
                selalu menjadi prioritas utama saya. Saya berkomitmen 
                untuk memberikan perawatan yang terbaik, mendengarkan 
                setiap keluhan, serta memastikan bahwa setiap pasien 
                mendapatkan perhatian dan penanganan yang tepat. Setiap 
                langkah yang saya ambil didasarkan pada prinsip bahwa pasien 
                adalah pusat dari setiap keputusan medis yang saya buat.
            </p>
        </div>
        <div class="info-boxes">
            <div class="info-box">
                <a href="/dokter/pasien">
                    <p>Pasien</p>
                    <img
                        src="https://cdn-icons-png.flaticon.com/256/2832/2832965.png"
                        alt="Patient"
                    />
                </a>
            </div>
            <div class="info-box">
                <a href="/dokter/jadwal">
                    <p>Jadwal</p>
                    <img
                        src="https://cdn-icons-png.flaticon.com/256/10365/10365034.png"
                        alt="Working Hours"
                    />
                </a>
            </div>
            <div class="info-box">
                <a href="/dokter/riwayat_medis">
                    <p>Riwayat Medis</p>
                    <img src="/img/rekam_medis.png" alt="Working Hours" />
                </a>
            </div>
            <div class="info-box">
                <a href="/dokter/data">
                    <p>Data</p>
                    <i class="bi bi-database" style="font-size: 4rem;"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Dokter",
};
</script>

<style scoped>
@import "/public/css/layout/dashboard.css";
</style>
