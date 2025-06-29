<?php
session_start();
require_once '../config/connect.php';

if (!isset($_GET['id'])) {
  die("Booking tidak ditemukan.");
}
$booking_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pembayaran Booking</title>
  <link rel="stylesheet" href="../assets/css/pembayaran.css">
</head>
<body>
  <div class="container">
    <h2>Pembayaran Booking</h2>
    <p>Silakan scan QR berikut untuk melakukan pembayaran:</p>
    <img src="../assets/img/qris.jpg" alt="QR Pembayaran" width="250" />

    <form action="../action/uploadbukti.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="booking_id" value="<?= $booking_id; ?>">
      <label>Upload Bukti Pembayaran:</label><br>
      <input type="file" name="bukti" accept="image/*" required><br><br>
      <button type="submit" name="upload">Kirim Bukti</button>
    </form>
  </div>
</body>
</html>
