<?php
session_start();
require_once '../config/connect.php'; // pastikan path-nya sesuai

$user_id = $_SESSION['id'];
$result = $conn->query("SELECT * FROM bookings WHERE user_id = '$user_id' ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Books</title>
    <link rel="stylesheet" href="../assets/css/riwayat.css">
</head>
<body>
    <h2>Riwayat Booking</h2>
<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>Lapangan</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
  </tr>

  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['lapangan']); ?></td>
      <td><?= htmlspecialchars($row['tanggal']); ?></td>
      <td><?= htmlspecialchars($row['jam']); ?></td>
      <td style="color: 
          <?= $row['status'] == 'acc' ? 'green' : 
             ($row['status'] == 'pending' ? 'orange' : 'red') ?>;">
        <?= strtoupper($row['status']); ?>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
  <a href="../pages/user_page.php">Kembali ke menu</a>

</body>
</html>