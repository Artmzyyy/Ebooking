<?php
session_start();
require_once '../config/connect.php';

if (!isset($_SESSION['id'])) {
    die("Akses ditolak. Anda belum login.");
}

$user_id  = $_SESSION['id'];
$lapangan = $_POST['lapangan'] ?? '';
$tanggal  = $_POST['tanggal'] ?? '';
$jam      = $_POST['jam'] ?? '';
$status   = 'pending';

// Validasi input kosong
if (!$lapangan || !$tanggal || !$jam) {
    $_SESSION['booking_error'] = "Lengkapi semua input booking!";
    header("Location: ../user/futsal.php");
    exit();
}

// Cek apakah slot sudah dibooking
$cek = $conn->query("SELECT * FROM bookings WHERE lapangan='$lapangan' AND tanggal='$tanggal' AND jam='$jam' AND status != 'cancelled'");

if ($cek->num_rows > 0) {
    $_SESSION['booking_error'] = "Slot sudah dipesan. Pilih jam lain.";
    header("Location: ../pages/futsal.php");
    exit();
}

// Simpan booking
$conn->query("INSERT INTO bookings (user_id, lapangan, tanggal, jam, status)
              VALUES ('$user_id', '$lapangan', '$tanggal', '$jam', '$status')");

// Redirect ke halaman pembayaran
$booking_id = $conn->insert_id;
header("Location: ../pages/pembayaran.php?id=$booking_id");
exit();
