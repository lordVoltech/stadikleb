<?php
session_start();
$host = "localhost";
$user = "u951570841_coba";
$pass = "Coba333#";
$db   = "u951570841_coba";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function check_login() {
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
}

function pembatalan() {
    
}
?>
