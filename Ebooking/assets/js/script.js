function tampilForm(formId) {
  document
    .querySelectorAll(".form-box")
    .forEach((form) => form.classList.remove("active"));
  document.getElementById(formId).classList.add("active");
}

function setJam(jam) {
  document.getElementById("jamInput").value = jam;

  const buttons = document.querySelectorAll(".jam-btn");
  buttons.forEach((btn) => btn.classList.remove("active"));

  // Tambahkan highlight ke tombol yang diklik
  const clickedBtn = Array.from(buttons).find((btn) => btn.textContent === jam);
  if (clickedBtn) clickedBtn.classList.add("active");
}
