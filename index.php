<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Auto Care | Premium Automotive Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        .hero-overlay {
            background: linear-gradient(to right, rgba(0, 21, 41, 0.9), rgba(0, 21, 41, 0.7));
        }
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        .feature-icon {
            transition: all 0.3s ease;
        }
        .feature-card:hover .feature-icon {
            transform: scale(1.1);
            color: #003366;
        }
        .typing-text {
            border-right: 2px solid white;
            animation: blink 0.75s step-end infinite;
        }
        @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: white; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="bg-gray-900 text-white fixed w-full z-50 shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-900 to-gray-800 flex items-center justify-center mr-2">
                    <i class="fas fa-car text-gray-300"></i>
                </div>
                <span class="text-xl font-semibold tracking-tight">Luxury<span class="text-blue-400">Auto</span></span>
            </div>
            
            <div class="hidden md:flex space-x-8">
                <a href="#" class="hover:text-blue-300 transition duration-300">Home</a>
                <a href="#services" class="hover:text-blue-300 transition duration-300">Layanan</a>
                <a href="#about" class="hover:text-blue-300 transition duration-300">Tentang Kami</a>
                <a href="#contact" class="hover:text-blue-300 transition duration-300">Kontak</a>
            </div>
            
            <!-- Tombol "Book Sekarang" di navigasi atas -->
            <button id="bookNowNav" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md transition duration-300 hidden md:block">
                Book Sekarang
            </button>
            
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 px-4 py-2">
            <div class="flex flex-col space-y-3">
                <a href="#" class="hover:text-blue-300 transition duration-300 py-1">Home</a>
                <a href="#services" class="hover:text-blue-300 transition duration-300 py-1">Layanan</a>
                <a href="#about" class="hover:text-blue-300 transition duration-300 py-1">Tentang Kami</a>
                <a href="#contact" class="hover:text-blue-300 transition duration-300 py-1">Kontak</a>
                <!-- Tombol "Book Sekarang" di menu mobile -->
                <button id="bookNowMobile" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md transition duration-300 w-full">
                    Book Sekarang
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 hero-overlay"></div>
        
        <!-- Background Image Slideshow -->
        <div id="hero-slideshow" class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1494972308805-46337c858e80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center transition-opacity duration-1000 opacity-100"></div>
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center transition-opacity duration-1000 opacity-0"></div>
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1504215680853-026ed2a45def?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80')] bg-cover bg-center transition-opacity duration-1000 opacity-0"></div>
        </div>
        
        <div class="relative z-10 text-center px-4 md:px-8 max-w-4xl mx-auto">
            <h1 id="typing-text" class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-6 text-shadow typing-text">
                Presisi Tak Tertandingi. Performa Tanpa Kompromi.
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8 text-shadow max-w-2xl mx-auto">
                Booking service dan maintenance kendaraan premium Anda kini lebih mudah, cepat, dan mewah.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <!-- Tombol "Jelajahi Layanan Kami" di Hero Section -->
                <button id="jelajahiLayanan" class="bg-blue-900 hover:bg-blue-800 text-white px-8 py-3 rounded-md transition duration-300 font-medium">
                    Jelajahi Layanan Kami
                </button>
                <!-- Tombol "Mulai Sekarang" di Hero Section, diubah menjadi "Book Sekarang" -->
                <button id="bookNowHero" class="border-2 border-white hover:bg-white hover:bg-opacity-10 text-white px-8 py-3 rounded-md transition duration-300 font-medium">
                    Book Sekarang
                </button>
            </div>
        </div>
        
        <div class="absolute bottom-8 left-0 right-0 flex justify-center">
            <a href="#about" class="text-white animate-bounce">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Pengalaman Otomotif Premium di Genggaman Anda
                </h2>
                <p class="text-gray-600 md:text-lg">
                    Selamat datang di LuxuryAuto, platform inovatif yang menghadirkan standar baru dalam perawatan dan maintenance kendaraan. Kami menghubungkan Anda dengan jaringan service center dan teknisi ahli terverifikasi, memastikan kendaraan Anda selalu dalam kondisi puncak dengan kemudahan reservasi online yang belum pernah ada sebelumnya.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <div class="bg-gray-50 p-8 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-blue-900 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-4">Perawatan Berkala</h3>
                    <p class="text-gray-600 text-center">
                        Program maintenance terjadwal untuk menjaga performa optimal kendaraan Anda dengan standar pabrikan.
                    </p>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-blue-900 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-car-crash text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-4">Perbaikan Kompleks</h3>
                    <p class="text-gray-600 text-center">
                        Penanganan oleh spesialis untuk masalah teknis yang memerlukan keahlian khusus dan peralatan canggih.
                    </p>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-blue-900 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-spa text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-4">Detailing Premium</h3>
                    <p class="text-gray-600 text-center">
                        Perawatan eksterior dan interior dengan material premium untuk menjaga keindahan dan nilai kendaraan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="services" class="py-16 md:py-24 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Mengapa Memilih Kami?
                </h2>
                <p class="text-gray-600 md:text-lg">
                    Keunggulan layanan yang membedakan kami dari yang lain
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <div class="feature-card bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                    <div class="feature-icon w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 mx-auto text-blue-900">
                        <i class="fas fa-mobile-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-4">Aksesibilitas Tanpa Batas</h3>
                    <p class="text-gray-600 text-center">
                        Reservasi layanan kapan saja, di mana saja. Jaringan service center luas siap melayani Anda.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                    <div class="feature-icon w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 mx-auto text-blue-900">
                        <i class="fas fa-user-shield text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-4">Teknisi Ahli Bersertifikasi</h3>
                    <p class="text-gray-600 text-center">
                        Kendaraan Anda ditangani oleh para profesional berpengalaman yang memahami setiap detailnya.
                    </p>
                </div>
                
                <div class="feature-card bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition duration-300">
                    <div class="feature-icon w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-6 mx-auto text-blue-900">
                        <i class="fas fa-clock text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-4">Transparansi & Efisiensi</h3>
                    <p class="text-gray-600 text-center">
                        Nikmati proses booking yang cepat, harga transparan, dan update status real-time.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-blue-900 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold mb-2">150+</div>
                    <div class="text-blue-200">Teknisi Bersertifikasi</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold mb-2">24/7</div>
                    <div class="text-blue-200">Layanan Darurat</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold mb-2">5000+</div>
                    <div class="text-blue-200">Kendaraan Dilayani</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-bold mb-2">98%</div>
                    <div class="text-blue-200">Kepuasan Pelanggan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Apa Kata Klien Kami
                </h2>
                <p class="text-gray-600 md:text-lg">
                    Pengalaman nyata dari pemilik kendaraan premium
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-8 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4 overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold">Michael Tan</h4>
                            <p class="text-sm text-gray-500">Porsche 911 Owner</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Pelayanan yang sangat profesional. Teknisi benar-benar memahami mobil saya dan memberikan penjelasan detail tentang setiap perawatan yang dilakukan."
                    </p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4 overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold">Sarah Wijaya</h4>
                            <p class="text-sm text-gray-500">Mercedes-Benz S-Class Owner</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Sangat menghemat waktu dengan sistem booking online. Mobil saya selalu siap tepat waktu dan dalam kondisi sempurna."
                    </p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-300 mr-4 overflow-hidden">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-semibold">David Hartono</h4>
                            <p class="text-sm text-gray-500">Ferrari 488 Owner</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Detailing mereka luar biasa. Mobil saya terlihat seperti baru setiap kali selesai dari bengkel. Worth every penny!"
                    </p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-gray-900 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Memberikan Perawatan Terbaik untuk Kendaraan Anda</h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Jadwalkan kunjungan Anda sekarang dan rasakan perbedaan layanan premium kami.
            </p>
            <!-- Tombol "Reservasi Sekarang" di CTA Section, diubah menjadi "Book Sekarang" -->
            <button id="reservasiSekarang" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-md transition duration-300 font-medium text-lg">
                Book Sekarang
            </button>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>
                    <p class="text-gray-600 mb-8">
                        Kami siap membantu Anda dengan segala pertanyaan tentang layanan kami. Tim customer service kami akan dengan senang hati membantu Anda.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-blue-900"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Lokasi</h4>
                                <p class="text-gray-600">Jl. Sudirman Kav. 52-53, Jakarta Selatan</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-phone-alt text-blue-900"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Telepon</h4>
                                <p class="text-gray-600">(021) 1234-5678</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-envelope text-blue-900"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Email</h4>
                                <p class="text-gray-600">info@luxuryauto.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-xl shadow-sm">
                    <h3 class="text-xl font-semibold mb-6">Kirim Pesan</h3>
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                            <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-3 rounded-md transition duration-300 w-full">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-900 to-gray-800 flex items-center justify-center mr-2">
                            <i class="fas fa-car text-gray-300"></i>
                        </div>
                        <span class="text-xl font-semibold tracking-tight">Luxury<span class="text-blue-400">Auto</span></span>
                    </div>
                    <p class="text-gray-400">
                        Penyedia layanan perawatan kendaraan premium terkemuka dengan standar internasional.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Perawatan Berkala</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Perbaikan Kompleks</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Detailing Premium</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Diagnosis Komputer</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Tim Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Testimonial</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition duration-300">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    <p class="text-gray-400">
                        Berlangganan newsletter kami untuk penawaran eksklusif
                    </p>
                    <div class="mt-4 flex">
                        <input type="email" placeholder="Email Anda" class="px-4 py-2 bg-gray-800 text-white rounded-l-md focus:outline-none w-full">
                        <button class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-r-md">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 mb-4 md:mb-0">
                    &copy; 2023 LuxuryAuto. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">Terms of Service</a>
                    <a href="#" class="text-400 hover:text-white transition duration-300">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Hero slideshow
        let currentSlide = 0;
        const slides = document.querySelectorAll('#hero-slideshow > div');
        
        function showSlide(n) {
            slides.forEach((slide, index) => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            });
            
            slides[n].classList.remove('opacity-0');
            slides[n].classList.add('opacity-100');
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }
        
        // Change slide every 5 seconds
        setInterval(nextSlide, 5000);
        
        // Typing effect for hero text
        const texts = [
            "Presisi Tak Tertandingi. Performa Tanpa Kompromi.",
            "Layanan Eksklusif untuk Kendaraan Istimewa Anda.",
            "Revolusi Perawatan Otomotif Ada di Sini."
        ];
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        const typingText = document.getElementById('typing-text');
        
        function type() {
            const currentText = texts[textIndex];
            
            if (isDeleting) {
                typingText.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typingText.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
            }
            
            if (!isDeleting && charIndex === currentText.length) {
                isDeleting = true;
                setTimeout(type, 2000);
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % texts.length;
                setTimeout(type, 500);
            } else {
                const speed = isDeleting ? 100 : 150;
                setTimeout(type, speed);
            }
        }
        
        // Start the typing effect
        setTimeout(type, 1000);
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Menambahkan event listener untuk tombol-tombol yang akan redirect ke login.php
        document.getElementById('bookNowNav').addEventListener('click', function() {
            window.location.href = 'login.php';
        });

        document.getElementById('bookNowMobile').addEventListener('click', function() {
            window.location.href = 'login.php';
        });

        document.getElementById('bookNowHero').addEventListener('click', function() {
            window.location.href = 'login.php';
        });

        document.getElementById('reservasiSekarang').addEventListener('click', function() {
            window.location.href = 'login.php';
        });
    </script>
</body>
</html>
