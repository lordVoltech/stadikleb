<?php
require '../config.php';
check_login();

$email = $_SESSION["email"];
$id = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = 'BKG-' . $id . "-" . bin2hex(random_bytes(5));
    $nama = $_POST["nama_kendaraan"];
    $jenis = $_POST["jenis_service"];
    $tanggal = $_POST["tanggal"];
    var_dump($status);
    $user = $_SESSION["email"];
    $user_id = $conn->query("SELECT id FROM users WHERE email='$user'")->fetch_assoc()["id"];
    $conn->query("INSERT INTO bookings (id, nama_kendaraan, jenis_service, tanggal, user_id, status) 
                  VALUES ('$id', '$nama', '$jenis', '$tanggal', '$user_id', 'Menunggu')");
    header("Location: index.php");
    exit;
}
?>
<h2>Tambah Booking</h2>
<form method="post">
    Nama Kendaraan: <input type="text" name="nama_kendaraan" required><br><br>
    Jenis Service: 
    <select name="jenis_service" id="jenis_service" required>
        <option value="">-- Pilih Jenis Service --</option>
        <option value="Servis Ringan">Servis Ringan</option>
        <option value="Servis Besar">Service Besar</option>
        <option value="Tune Up">Tune Up</option>
        <option value="Penggantian Suku Cadang">Penggantian Suku Cadang</option>
    </select><br><br>
    Tanggal: <input type="date" name="tanggal" required><br><br>
    <button type="submit">Simpan</button>
</form>
