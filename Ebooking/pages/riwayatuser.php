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
    <table>
      <thead>
        <tr>
          <th>Lapangan</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['lapangan']); ?></td>
            <td><?= htmlspecialchars($row['tanggal']); ?></td>
            <td><?= htmlspecialchars($row['jam']); ?></td>
            <td class="status <?= $row['status']; ?>">
              <?= strtoupper($row['status']); ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <footer class="footer">
    <p>&copy; <?= date('Y'); ?> Sportslot Booking | Riwayat</p>
  </footer>
</body>
</html>
