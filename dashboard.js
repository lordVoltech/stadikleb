//
// Ini adalah file JavaScript untuk mengelola fungsionalitas dashboard.
// Menggunakan 'type="module"' di HTML agar bisa mengimpor 'sidebarHTML'.
//
import { sidebarHTML } from './sidebar.js'; // Mengimpor konten HTML sidebar dari file terpisah

document.addEventListener('DOMContentLoaded', () => {
    // 1. Suntikkan HTML sidebar ke dalam container yang sudah disiapkan di dashboard.html
    const sidebarContainer = document.getElementById('sidebar-container');
    if (sidebarContainer) {
        sidebarContainer.innerHTML = sidebarHTML;
    }

    // 2. Ambil elemen-elemen yang dibutuhkan untuk fungsionalitas sidebar
    const sidebarToggle = document.getElementById('sidebarToggle'); // Tombol hamburger
    const sidebar = document.querySelector('.sidebar-overlay');     // Elemen sidebar itu sendiri
    const overlayBackdrop = document.getElementById('overlayBackdrop'); // Backdrop gelap

    // 3. Tambahkan event listener untuk tombol toggle sidebar
    if (sidebarToggle && sidebar && overlayBackdrop) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open'); // Toggle kelas 'open' untuk menampilkan/menyembunyikan sidebar
            overlayBackdrop.classList.toggle('active'); // Toggle kelas 'active' untuk menampilkan/menyembunyikan backdrop
        });

        // 4. Tambahkan event listener untuk backdrop (menutup sidebar saat backdrop diklik)
        overlayBackdrop.addEventListener('click', () => {
            sidebar.classList.remove('open'); // Hapus kelas 'open' untuk menyembunyikan sidebar
            overlayBackdrop.classList.remove('active'); // Hapus kelas 'active' untuk menyembunyikan backdrop
        });
    }

    // 5. Tangani fungsionalitas tombol logout
    const logoutButton = document.getElementById('logoutButton');
    if (logoutButton) {
        logoutButton.addEventListener('click', () => {
            // Untuk saat ini, kita hanya menampilkan alert dan mengarahkan kembali ke halaman utama
            alert('Anda telah logout dari aplikasi.'); // Ganti dengan modal kustom di masa depan
            window.location.href = 'index.html'; // Kembali ke halaman index/login
        });
    }

    console.log('Dashboard siap!');
});
