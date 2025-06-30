<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #0a0a0a;
      color: #ffffff;
      line-height: 1.6;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #111;
      padding: 1rem 2rem;
    }

    nav img {
      height: 50px;
    }

    nav ul {
      display: flex;
      list-style: none;
      gap: 2rem;
      align-items: center;
    }

    nav ul li a, nav ul li p {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }

    .container {
      padding: 3rem 2rem;
      max-width: 1200px;
      margin: auto;
    }

    .box h2 {
      font-size: 2.5rem;
      margin-bottom: 2rem;
      text-align: center;
      font-weight: 800;
    }

    .lapangan {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      justify-items: center;
    }

    .lapangan div {
      background-color: #1a1a1a;
      padding: 1rem;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);
      transition: transform 0.3s ease;
    }

    .lapangan div:hover {
      transform: scale(1.05);
    }

    .lapangan img {
      max-width: 100%;
      border-radius: 8px;
      margin-bottom: 1rem;
    }

    .lapangan a {
      text-decoration: none;
      color: #00ff88;
      font-weight: bold;
      font-size: 1.1rem;
    }
  </style>
</head>
<body>
  <nav>
    <img src="../assets/img/logo.png" alt="Logo">
    <ul>
      <li><p>Halo, <?= $_SESSION['nama']; ?></p></li>
      <li><a href="../pages/riwayatuser.php">Cek Riwayat Booking</a></li>
      <li><a href="../action/logout.php">Logout</a></li>
    </ul>
  </nav>
  <div class="container">
    <div class="box">
      <h2>SELAMAT DATANG DI WEBSITE BOOKING LAPANGAN!</h2>
      <div class="lapangan">
        <div>
          <img src="../assets/img/lapangan-futsal.jpg" alt="Futsal">
          <p><a href="../pages/futsal.php">Lapangan Futsal</a></p>
        </div>
        <div>
          <img src="../assets/img/lapangan-basket.jpg" alt="Basket">
          <p><a href="../pages/basket.php">Lapangan Basket</a></p>
        </div>
        <div>
          <img src="../assets/img/lapangan-badminton.jpeg" alt="Badminton">
          <p><a href="../pages/badminton.php">Lapangan Badminton</a></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
