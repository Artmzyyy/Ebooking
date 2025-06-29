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
    <link rel="stylesheet" href="../assets/css/user.css" />
  </head>
  <body>
    <nav>
      <div class="">
        <img src="../assets/img/logo.png">
      </div>
      <ul style="list-style-type: none">
        <li><p>Halo, <?= $_SESSION['nama']; ?></p></li>
        <li><a href="../pages/riwayatuser.php">Cek Riwayat Booking</a></li>
        <li><a href="../action/logout.php">Logout</a></li>
      </ul>
    </nav>
    <div class="container">
      <div class="box">
        <h2>SELAMAT DATANG DI WEBSITE <br />BOOKING LAPANGAN!</h2>
        <br />
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
  </body>
</html>
