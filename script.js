//
// Ini adalah file JavaScript Anda.
// Saat ini digunakan untuk mengarahkan tombol login.
//
document.addEventListener('DOMContentLoaded', () => {
    console.log('Aplikasi Booking Kendaraan siap!');

    const loginButton = document.getElementById('loginButton');
    if (loginButton) {
        loginButton.addEventListener('click', () => {
            // Mengarahkan pengguna ke halaman dashboard
            window.location.href = 'dashboard.html';
        });
    }
});
