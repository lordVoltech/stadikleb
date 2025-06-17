<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Aplikasi Booking</title>
    <!-- Tailwind CSS CDN untuk styling yang cepat dan responsif -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Mengatur font Inter */
        html { font-family: 'Inter', sans-serif; }

        /* Custom styles untuk transisi sidebar overlay */
        .sidebar-overlay {
            transition: transform 0.3s ease-in-out;
            transform: translateX(-100%); /* Tersembunyi secara default di luar layar */
        }
        .sidebar-overlay.open {
            transform: translateX(0); /* Terlihat saat terbuka */
        }
        .overlay-backdrop {
            display: none; /* Tersembunyi secara default */
            background-color: rgba(0, 0, 0, 0.5); /* Background gelap transparan */
            backdrop-filter: blur(2px); /* Efek blur pada background */
            z-index: 40; /* Z-index di bawah sidebar, di atas konten utama */
        }
        .overlay-backdrop.active {
            display: block; /* Terlihat saat aktif */
        }
    </style>
</head>
<body class="font-inter bg-gray-100 min-h-screen flex flex-col">
    <!-- Overlay Backdrop - akan muncul saat sidebar terbuka untuk efek gelap/blur -->
    <div id="overlayBackdrop" class="overlay-backdrop fixed inset-0 w-full h-full"></div>

    <!-- Container untuk Sidebar - konten sidebar akan disuntikkan di sini oleh JavaScript -->
    <div id="sidebar-container"></div>

    <div class="flex flex-1">
        <!-- Area Konten Utama Dashboard -->
        <div class="flex-1 p-6 md:p-10 transition-all duration-300 ease-in-out">
            <!-- Header untuk konten utama dashboard -->
            <header class="bg-white p-4 rounded-lg shadow-md mb-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-blue-800">Dashboard</h1>
                <!-- Tombol untuk membuka/menutup sidebar (ikon hamburger) -->
                <button id="sidebarToggle" class="p-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </header>

            <!-- Bagian konten utama dashboard -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Selamat Datang di Dashboard Anda!</h2>
                <p class="text-gray-600">Ini adalah area utama dashboard. Di sini Anda bisa melihat ringkasan booking, jadwal, dan informasi penting lainnya.</p>
                <!-- Contoh kartu informasi (bisa diganti dengan data asli nanti) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    <div class="bg-blue-50 p-5 rounded-lg shadow flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-600">Total Booking</p>
                            <p class="text-3xl font-bold text-blue-800">12</p>
                        </div>
                        <!-- Icon Booking -->
                        <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="bg-green-50 p-5 rounded-lg shadow flex items-center justify-between">
                        <div>
                            <p class="text-sm text-green-600">Booking Selesai</p>
                            <p class="text-3xl font-bold text-green-800">8</p>
                        </div>
                        <!-- Icon Selesai -->
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="bg-yellow-50 p-5 rounded-lg shadow flex items-center justify-between">
                        <div>
                            <p class="text-sm text-yellow-600">Booking Menunggu</p>
                            <p class="text-3xl font-bold text-yellow-800">4</p>
                        </div>
                        <!-- Icon Menunggu -->
                        <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Menghubungkan script JavaScript dashboard (penting: type="module" karena menggunakan import/export) -->
    <script type="module" src="dashboard.js"></script>
</body>
</html>
