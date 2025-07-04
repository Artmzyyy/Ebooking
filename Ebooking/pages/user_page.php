<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Page</title>
  <link rel="stylesheet" href="../assets/css/user.css"> <!-- Pastikan cache dibypass -->
</head>
<body>
  <!-- NAVBAR -->
  <nav>
    <div>
      <img src="../assets/img/fairnew.png" alt="Logo Sportslot" class="logo-sportslot">
    </div>
    <div class="nav-right">
      <p class="halo-user">Halo, <?= $_SESSION['nama']; ?></p>
      <a href="../pages/riwayatuser.php" class="btn-neon">Cek Riwayat Booking</a>
      <a href="../action/logout.php" class="btn-neon">Logout</a>
    </div>
  </nav>

  <!-- ISI UTAMA -->
  <div class="container">
    <div class="box">
      <h2>SELAMAT DATANG DI WEBSITE <br />BOOKING LAPANGAN!</h2><br />
      <div class="lapangan">
        <div class="futsal">
          <img src="../assets/img/lapangan-futsal.jpg" alt="Futsal" /><br />
          <p><a href="../pages/futsal.php">Lapangan Futsal</a></p>
        </div>
        <div class="basket">
          <img src="../assets/img/lapangan-basket.jpg" alt="Basket" /><br />
          <p><a href="../pages/basket.php">Lapangan Basket</a></p>
        </div>
        <div class="badminton">
          <img src="../assets/img/lapangan-badminton.jpeg" alt="Badminton" /><br />
          <p><a href="../pages/badminton.php">Lapangan Badminton</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-content">
      <h3>Tentang Kami</h3>
      <p>Kami adalah platform pemesanan lapangan olahraga online yang memudahkan Anda untuk booking futsal, basket, dan badminton secara cepat dan efisien.</p>
    </div>
  </footer>
</body>
</html>
