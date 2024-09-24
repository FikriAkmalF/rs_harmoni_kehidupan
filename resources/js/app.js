// resources/js/app.js

import { createApp } from 'vue'; // Import Vue 3
import Dashboard from './components/Dashboard.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Sidebar from './components/layout/Sidebar.vue';
import User from './components/User.vue';
import Perawat from './components/Perawat.vue';
import Dokter from './components/Dokter.vue';
import Apotek from './components/layout/Apotek.vue';

// Buat aplikasi Vue dan daftarkan komponen
createApp({
    components: {
        Dashboard,  // Daftarkan komponen
        Register,
        Login,
        Sidebar,
        User,
        Perawat,
        Dokter,
        Apotek,
    }
}).mount('#app'); // Mount aplikasi Vue ke elemen dengan ID "app"
