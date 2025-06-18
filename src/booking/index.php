<?php
require '../config.php';
check_login();

$result = $conn->query("SELECT b.id, b.nama_kendaraan, b.jenis_service, b.status , b.tanggal, u.email 
                        FROM bookings b JOIN users u ON b.user_id = u.id 
                        WHERE b.user_id = (SELECT id FROM users WHERE email='{$_SESSION['email']}')");   
                        

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_status"])) {
    $id = $_POST["booking_id"];
    // var_dump($id);
    $status = 'Dibatalkan';

    $conn->query("UPDATE bookings SET status='$status' WHERE id='$id'");
    header("Location: index.php");
    exit;
}

?>

<h2>Daftar Booking Service</h2>
<h2>Selamat datang, <?php echo $_SESSION["nama"]; ?>!</h2>
<a href='tambah.php'>+ Tambah Booking</a><br><br>
<table border='1' cellpadding='10'>
    <tr>
        <th>ID Booking</th>
        <th>Nama Kendaraan</th>
        <th>Jenis Service</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nama_kendaraan']}</td>
        <td>{$row['jenis_service']}</td>
        <td>{$row['tanggal']}</td>
        <td>{$row['status']}</td>
        <td>
            <form method='post' style='display:inline;'>
                <input type='hidden' name='booking_id' value={$row["id"]}>
                <button type='submit' name='update_status'>Batalkan</button>
            </form>
        </td>
    </tr>";
}
echo "</table>";
?>
    <a href="logout.php">Logout</a>