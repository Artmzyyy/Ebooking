<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Booking Lapangan Basket</title>
  <link rel="stylesheet" href="../assets/css/booking.css" />
</head>
<body>
  <nav class="navbar-minimal">
  <a href="user_page.php" class="btn-neon">← Kembali ke Menu</a>
</nav>
  <div class="container">
    <div class="card">
      <img src="../assets/img/basket.png" alt="basket" />
    </div>

    <form class="card" action="../action/proses_booking.php" method="POST" onsubmit="return validateBooking()">
      <h2>BOOKING</h2>

      <input type="hidden" name="lapangan" value="Basket" />

      <select name="tanggal" required>
        <option value="" disabled selected>PILIH HARI</option>
        <?php
          date_default_timezone_set("Asia/Jakarta");
          for ($i = 0; $i < 3; $i++) {
            $tgl = date('Y-m-d', strtotime("+$i day"));
            $label = ($i == 0) ? "Hari Ini" : (($i == 1) ? "Besok" : "Lusa");
            echo "<option value='$tgl'>$label ($tgl)</option>";
          }
        ?>
      </select>

      <div id="time-slots">
      <input type="hidden" name="jam" id="selectedTime">
      <button type="button" class="time-button" onclick="selectTime(this)">08:00 - 10:00</button>
      <button type="button" class="time-button" onclick="selectTime(this)">10:00 - 12:00</button>
      <button type="button" class="time-button" onclick="selectTime(this)">12:00 - 14:00</button><br>
      <button type="button" class="time-button" onclick="selectTime(this)">14:00 - 16:00</button>
      <button type="button" class="time-button" onclick="selectTime(this)">16:00 - 18:00</button>
      <button type="button" class="time-button" onclick="selectTime(this)">18:00 - 20:00</button><br>
      <button type="button" class="time-button" onclick="selectTime(this)">20:00 - 22:00</button>
    </div>

      <button type="submit" class="btn-submit">BOOKING SEKARANG</button>

      <?php
if (isset($_SESSION['booking_error'])) {
  echo "<p style='color:red; font-weight:bold;'>".$_SESSION['booking_error']."</p>";
  unset($_SESSION['booking_error']);
}
?>

    </form>
  
  </div>
  <script>
    function selectTime(button) {
      const buttons = document.querySelectorAll(".time-button");
      buttons.forEach((btn) => btn.classList.remove("selected"));
      button.classList.add("selected");
      document.getElementById("selectedTime").value = button.textContent;
    }

    function validateBooking() {
      const waktu = document.getElementById("selectedTime").value;
      if (!waktu) {
        alert("Silakan pilih waktu booking terlebih dahulu.");
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
