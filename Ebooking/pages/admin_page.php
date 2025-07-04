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
  <link rel="stylesheet" href="../assets/css/admin.css" />
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar-minimal">
    <a href="admin_user.php" class="btn-neon">👥 Cek Data User</a>
    <a href="../action/logout.php" class="btn-neon">Logout</a>
  </nav>

  <div class="container">
    <h2>Halo, <?= $_SESSION['nama']; ?> (ADMIN)</h2>
    <p>Berikut daftar semua booking:</p>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Lapangan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Status</th>
            <th>Bukti</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['lapangan']; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['jam']; ?></td>
            <td class="status <?= $row['status']; ?>">
              <?= strtoupper($row['status']); ?>
            </td>
            <td>
              <?php if (!empty($row['bukti_bayar'])): ?>
                <a href="<?= $row['bukti_bayar']; ?>" target="_blank" class="btn-mini">Lihat</a>
              <?php else: ?>
                <span class="text-muted">Belum Ada</span>
              <?php endif; ?>
            </td>
            <td>
              <?php if ($row['status'] != 'acc' && $row['status'] != 'cancelled'): ?>
                <a href="../action/update_status.php?id=<?= $row['id']; ?>&status=acc" class="btn-mini acc">✅ ACC</a>
                <a href="../action/update_status.php?id=<?= $row['id']; ?>&status=cancelled" class="btn-mini cancel" onclick="return confirm('Yakin membatalkan booking?')">❌ Cancel</a>
              <?php else: ?>
                <span class="text-muted">-</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
