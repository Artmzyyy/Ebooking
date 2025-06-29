<?php
session_start();
require_once '../config/connect.php';


ob_start();

if (isset($_POST['register'])) {
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if (!$checkEmail) {
        die("Query error: " . $conn->error);
    }

    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email sudah terdaftar!';
        $_SESSION['active_form'] = 'register';
    } else {
        $insert = $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
        if (!$insert) {
            die("Insert error: " . $conn->error);
        }
    }

    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if (!$result) {
        die("Login query error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: ../pages/admin_page.php");
            } else {
                header("Location: ../pages/user_page.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Email atau password yang anda masukkan salah!';
    $_SESSION['active_form'] = 'login';
    header("Location: index.php");
    exit();
}

ob_end_flush(); // flush output buffering
?>
