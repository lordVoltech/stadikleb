<?php
require 'config.php';
check_login();

$id = $_GET["id"];
$conn->query("DELETE FROM bookings WHERE id='$id'");
header("Location: index.php");
exit;
?>
