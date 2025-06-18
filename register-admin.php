<?php
require 'config.php'; // Pastikan path ke config.php sudah benar

// Inisialisasi variabel untuk pesan feedback
$register_message = "";
$message_type = ""; // 'success' atau 'error'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar di tabel admin
    $check_email = $conn->query("SELECT * FROM admin WHERE email='$email'");

    if ($check_email->num_rows > 0) {
        $register_message = "Email ini sudah terdaftar sebagai Admin!";
        $message_type = "error";
    } else {
        $insert_query = "INSERT INTO admin (email, password) VALUES ('$email', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            $register_message = "Registrasi Admin berhasil. Silakan <a href='login.php' class='font-semibold text-indigo-900 hover:underline'>Login Admin</a>"; // Asumsi login admin ke login.php
            $message_type = "success";
        } else {
            $register_message = "Error: " . $insert_query . "<br>" . $conn->error;
            $message_type = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Motors | Register Admin</title> <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #191970; /* Midnight Blue */
        }
        
        .register-container {
            backdrop-filter: blur(5px);
        }
        
        .input-field:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(25, 25, 112, 0.2);
        }
        
        .btn-register:hover {
            background-color: #121258;
            transform: translateY(-1px);
        }
        
        .btn-register:active {
            transform: translateY(0);
        }
        
        .link-hover:hover {
            color: #191970;
        }
        
        @media (max-width: 640px) {
            .register-box {
                width: 90%;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1494976388531-d1058494cdd8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
    <div class="register-container absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
        <div class="register-box bg-white rounded-xl shadow-xl p-8 w-full max-w-md transition-all duration-300">
            <div class="flex justify-center mb-6">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    <span class="ml-2 text-2xl font-bold text-indigo-900">LUXURY AUTO</span>
                </div>
            </div>
            
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Daftar Akun Admin Baru</h1> <?php
            // Menampilkan pesan registrasi (sukses/gagal)
            if (!empty($register_message)) {
                $text_color = ($message_type == "success") ? "text-green-600" : "text-red-500";
                echo '<p class="' . $text_color . ' text-center mb-4">' . $register_message . '</p>';
            }
            ?>

            <form id="registerForm" class="space-y-6" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Admin</label> <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-7.5a.75.75 0 00-1.5 0v2.25H13a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H19a.75.75 0 000-1.5h-2.25V8.25z" />
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email admin" required
                               class="input-field w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-indigo-900 focus:ring-1 focus:ring-indigo-900 transition duration-200">
                    </div>
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Admin</label> <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Buat password admin" required
                               class="input-field w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-indigo-900 focus:ring-1 focus:ring-indigo-900 transition duration-200">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div>
                    <button type="submit" class="btn-register w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-indigo-900 hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-900 transition duration-200">
                        Daftar Admin
                    </button>
                </div>
            </form>
            
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Sudah punya akun Admin?</span> </div>
                </div>
                
                <div class="mt-6">
                    <a href="login.php" class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-900 transition duration-200">
                        Masuk Admin di sini
                    </a> </div>
            </div>
            
            <div class="mt-8 text-center text-xs text-gray-500">
                &copy; 2023 Luxury Motors. All rights reserved.
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            
            if (togglePassword && password) { // Memastikan elemen ditemukan sebelum menambahkan event listener
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    
                    // Toggle the eye icon
                    const eyeIcon = this.querySelector('svg');
                    if (type === 'password') {
                        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                    } else {
                        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
                    }
                });
            }
        });
    </script>
</body>
</html>