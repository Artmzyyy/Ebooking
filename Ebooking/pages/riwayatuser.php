<?php
session_start();
require_once '../config/connect.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['id'];
$result = $conn->query("SELECT * FROM bookings WHERE user_id = '$user_id' ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Riwayat Booking</title>
  <link rel="stylesheet" href="../assets/css/riwayat.css">
</head>
<body>
  <nav>
  <div>
    <img src="../assets/img/fairnew.png" alt="Logo Sportslot" class="logo-sportslot">
  </div>
  <div class="nav-right">
    <p class="halo-user">Halo, <?= $_SESSION['nama']; ?></p>
    <a href="../pages/user_page.php" class="btn-neon">Kembali ke Menu</a>
    <a href="../action/logout.php" class="btn-neon">Logout</a>
  </div>
</nav>
  <div class="container">
    <h2>Riwayat Booking Anda</h2>
    <table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>Lapangan</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>

  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['lapangan']; ?></td>
      <td><?= $row['tanggal']; ?></td>
      <td><?= $row['jam']; ?></td>
      <td style="color:
        <?= $row['status'] == 'acc' ? 'green' :
           ($row['status'] == 'pending' ? 'orange' :
           ($row['status'] == 'cancelled' ? 'red' : 'gray')) ?>;">
        <?= strtoupper($row['status']); ?>
      </td>

      <td>
        <?php if ($row['status'] == 'pending'): ?>
          <a href="pembayaran.php?id=<?= $row['id']; ?>">💸 Bayar</a> |
          <a href="batal_booking.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin batalkan booking?')">❌ Batal</a>
        <?php else: ?>
          -
        <?php endif; ?>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
  </div>

  <footer class="footer">
    <p>&copy; <?= date('Y'); ?> Sportslot Booking | Riwayat</p>
  </footer>
</body>
</html>
