<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST["email"]);
    $no_telp = $conn->real_escape_string($_POST["no_telp"]);
    $nama = $conn->real_escape_string($_POST["nama"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        echo "Username sudah terdaftar!";
    } else {
        $conn->query("INSERT INTO users (email, password, no_telp, nama) VALUES ('$email', '$password', '$no_telp', '$nama')");
        echo "Registrasi berhasil. <a href='login.php'>Login</a>";
    }
}
?>

<h2>Register</h2>
<form method="post">
    Nama Lengkap: <input type="text" name="nama" reqired><br><br>
    Email: <input type="temail" name="email" required><br><br>
    Nomor Telfon: <input type="text" name="no_telp" reqired><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Daftar</button>
</form>
