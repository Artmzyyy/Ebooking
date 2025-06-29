<?php
session_start();
require_once '../config/connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Akses ditolak.");
}

$result = $conn->query("SELECT bookings.*, users.nama 
                        FROM bookings 
                        JOIN users ON bookings.user_id = users.id 
                        ORDER BY tanggal DESC, jam ASC");
?>


<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
  </head>
  <body>
    <nav>
      <ul style="list-style-type: none">
        <li> <a href="#">Cek Data User</a></li>
        <li> <a href="../action/logout.php">Logout</a></li>
      </ul>
    </nav>
    <h2>
      Selamat datang,
      <?= $_SESSION['nama']; ?>
      (ADMIN)
    </h2>
    <p>Berikut daftar semua booking:</p>

    <table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>Nama</th>
    <th>Lapangan</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
    <th>Bukti</th>
    <th>Aksi</th>
  </tr>

  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['nama']; ?></td>
      <td><?= $row['lapangan']; ?></td>
      <td><?= $row['tanggal']; ?></td>
      <td><?= $row['jam']; ?></td>
      <td style="color:
        <?= ($row['status'] == 'acc') ? 'green' :
             (($row['status'] == 'cancelled') ? 'red' :
             (($row['status'] == 'menunggu_validasi') ? 'orange' : 'gray')) ?>;
      ">
        <?= strtoupper($row['status']); ?>
      </td>

      <td>
        <?php if (!empty($row['bukti_bayar'])): ?>
          <a href="<?= $row['bukti_bayar']; ?>" target="_blank">Lihat Bukti</a>
        <?php else: ?>
          <span style="color: gray;">Belum Ada</span>
        <?php endif; ?>
      </td>

      <td>
        <?php if ($row['status'] != 'acc' && $row['status'] != 'cancelled'): ?>
          <a href="../action/update_status.php?id=<?= $row['id']; ?>&status=acc">✅ ACC</a> |
          <a href="../action/update_status.php?id=<?= $row['id']; ?>&status=cancelled" onclick="return confirm('Yakin membatalkan booking?')">❌ Cancel</a>
        <?php else: ?>
          <span style="color: gray;">-</span>
        <?php endif; ?>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

  </body>
</html>
