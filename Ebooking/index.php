<?php

// session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

$activeForm = $_SESSION ['active_form'] ?? 'login';

unset($_SESSION['login_error'], $_SESSION['register_error'], $_SESSION['active_form']);


function showError($error) {
  return !empty($error) ? " <p class='eror-messege' >$error</p>" : '';

}

function isActiveForm($formName, $activeForm) {
  return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
        <form action="action/login_regist.php" method="POST">
          <h2>Login</h2>
          <?= showError($errors['login']); ?>
          <input type="email" name="email" placeholder="Email" required />
          <input
            type="password"
            name="password"
            placeholder="Password"
            required
          />
          <button type="submit" name="login">Login</button>
          <p>
            Belum Punya Akun?
            <a href="#" onclick="tampilForm('register-form')">Register</a>
          </p>
        </form>
      </div>

      <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
        <form action="action/login_regist.php" method="POST">
          <h2>Register</h2>
          <?= showError($errors['register']); ?>
          <input type="text" name="nama" placeholder="Nama" required />
          <input type="email" name="email" placeholder="Email" required />
          <input
            type="password"
            name="password"
            placeholder="Password"
            required
          />
          <button type="submit" name="register">Register</button>
          <p>
            Sudah Punya Akun?
            <a href="#" onclick="tampilForm('login-form')">Login</a>
          </p>
        </form>
      </div>
    </div>

    <script src="assets/js/script.js"></script>
  </body>
</html>
