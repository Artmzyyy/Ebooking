<?php
session_start();
require_once '../config/connect.php';

if (!isset($_SESSION['id'])) {
  die("Akses ditolak.");
}

$id = $_GET['id'];


$conn->query("UPDATE bookings 
              SET status = 'cancelled' 
              WHERE id = '$id' AND user_id = '{$_SESSION['id']}' AND status = 'pending'");

header("Location: user_page.php");
exit();
