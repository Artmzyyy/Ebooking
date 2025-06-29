<?php
session_start();
require_once '../config/connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Akses ditolak.");
}

$id = $_GET['id'];
$status = $_GET['status'];

if (!in_array($status, ['acc', 'cancelled'])) {
    die("Status tidak valid.");
}

$conn->query("UPDATE bookings SET status = '$status' WHERE id = '$id'");

// ✅ Perbaiki redirect ke folder yang benar:
header("Location: ../pages/admin_page.php");
exit();
