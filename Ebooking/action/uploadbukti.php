<?php
session_start();
require_once '../config/connect.php';

if (isset($_POST['upload'])) {
    $booking_id = $_POST['booking_id'];
    $upload_dir = "../uploads/";
    $file_name = basename($_FILES["bukti"]["nama"]);
    $target_file = $upload_dir . time() . "_" . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi file
    if (in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
            // Simpan path ke database
            $conn->query("UPDATE bookings SET bukti_bayar='$target_file', status='menunggu_validasi' WHERE id='$booking_id'");
            header("Location: ../pages/user_page.php?status=upload_sukses");
            exit();
        } else {
            echo "Gagal upload file.";
        }
    } else {
        echo "Format file tidak valid.";
    }
}
