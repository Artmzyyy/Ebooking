<?php
session_start();
require_once '../config/connect.php';

if (!isset($_GET['id'])) {
  die("Booking tidak ditemukan.");
}
$booking_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran Booking</title>
  <link rel="stylesheet" href="../assets/css/pembayaran.css" />
</head>
<body>
  <!-- NAVBAR MINIMAL -->
  <nav class="navbar-minimal">
    <a href="user_page.php" class="btn-neon">← Kembali ke Menu</a>
  </nav>

  <!-- KONTEN UTAMA -->
  <div class="container">
    <h2>Pembayaran Booking</h2>
    <p>Silakan scan QR berikut untuk melakukan pembayaran:</p>
    <img src="../assets/img/qris.jpg" alt="QR Pembayaran" class="qr-img" />

    <form action="../action/uploadbukti.php" method="POST" enctype="multipart/form-data" class="upload-form">
      <input type="hidden" name="booking_id" value="<?= $booking_id; ?>">
      
      <label for="bukti">Upload Bukti Pembayaran</label>
      <input type="file" name="bukti" id="bukti" accept="image/*" required>
      
      <button type="submit" name="upload" class="btn-submit">Kirim Bukti</button>
    </form>
  </div>
</body>
</html>
