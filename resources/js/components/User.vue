<template>
    <div class="content">
        <div class="health-solutions">
            <span>Solusi Kesehatan Anda</span>
        </div>
        <div class="additional-info">
            <p>
                Kami lebih dari sekadar rumah sakit, kami adalah mitra Anda
                dalam perjalanan menuju kesehatan yang lebih baik. Sebagai
                solusi kesehatan Anda, kami menyediakan layanan yang dirancang
                untuk menjaga, memulihkan, dan meningkatkan kualitas hidup Anda
                dengan pendekatan yang seimbang dan berkelanjutan.
            </p>
        </div>
        <div class="info-boxes">
            <div class="info-box">
                <a href="/user/pasien">
                    <p>Pasien</p>
                    <img
                        src="https://cdn-icons-png.flaticon.com/256/2832/2832965.png"
                        alt="Patient"
                    />
                </a>
            </div>
            <div class="info-box">
                <a href="/user/jadwal">
                    <p>Jadwal</p>
                    <img
                        src="https://cdn-icons-png.flaticon.com/256/10365/10365034.png"
                        alt="Working Hours"
                    />
                </a>
            </div>
            <div class="info-box">
                <a href="/user/riwayat_medis">
                    <p>Riwayat Medis</p>
                    <img src="/img/rekam_medis.png" alt="Working Hours" />
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "User",
};
</script>

<style scoped>
@import "/public/css/pasien/user_dashboard.css";
</style>
