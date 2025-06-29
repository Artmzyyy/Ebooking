<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Booking Lapangan</title>
  <style>
    
  </style>
</head>
<body>

<div class="container">
  <!-- Kosong di kiri -->
  <div class="card">
    <img src="image.png" alt="futsal">
  </div>

  <!-- Form Booking -->
  <form class="card" action="pembayaran.html" method="GET" onsubmit="return validateBooking()">
    <h2>BOOKING</h2>

    <input type="hidden" name="lapangan" value="Futsal">

    <select name="hari" required>
      <option value="" disabled selected>PILIH HARI</option>
      <option value="Senin">Senin</option>
      <option value="Selasa">Selasa</option>
      <option value="Rabu">Rabu</option>
      <option value="Kamis">Kamis</option>
      <option value="Jumat">Jumat</option>
      <option value="Sabtu">Sabtu</option>
      <option value="Minggu">Minggu</option>
    </select>

    <div id="time-slots">
      <input type="hidden" name="waktu" id="selectedTime">
      <button type="button" class="time-button" onclick="selectTime(this)">08:00 - 10:00</button>
      <button type="button" class="time-button" onclick="selectTime(this)">10:00 - 12:00</button>
      <button type="button" class="time-button" onclick="selectTime(this)">12:00 - 14:00</button><br>
      <button type="button" class="time-button" onclick="selectTime(this)">14:00 - 16:00</button>
      <button type="button" class="time-button" onclick="selectTime(this)">16:00 - 18:00</button>
      <button type="button" class="time-button" onclick="selectTime(this)">18:00 - 20:00</button><br>
      <button type="button" class="time-button" onclick="selectTime(this)">20:00 - 22:00</button>
    </div>

    <button type="submit" class="btn-submit">BOOKING SEKARANG</button>
  </form>
</div>

<script>
  function selectTime(button) {
    const buttons = document.querySelectorAll('.time-button');
    buttons.forEach(btn => btn.classList.remove('selected'));
    button.classList.add('selected');
    document.getElementById('selectedTime').value = button.textContent;
  }

  function validateBooking() {
    const waktu = document.getElementById('selectedTime').value;
    if (!waktu) {
      alert("Silakan pilih waktu booking terlebih dahulu.");
      return false;
    }
    return true;
  }
</script>

</body>
</html>
