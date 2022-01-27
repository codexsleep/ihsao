<?php
 $awal   = strtotime(date('Y-m-d H:i'));
 $akhir  = strtotime(date('2022-01-26 17:00'));
 $diff  = $akhir - $awal;
 $menit  = $diff/60;
 ?>
<p id="demo"></p>
<script>
var countDownDate = new Date("2022-01-26 17:00:00").getTime();

// Memperbarui hitungan mundur setiap 1 detik
var x = setInterval(function() {

  // Untuk mendapatkan tanggal dan waktu hari ini
  var now = new Date().getTime();
    
  // Temukan jarak antara sekarang dan tanggal hitung mundur
  var distance = countDownDate - now;
    
  // Perhitungan waktu untuk hari, jam, menit dan detik
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Keluarkan hasil dalam elemen dengan id = "demo"
  document.getElementById("demo").innerHTML = hours + ":"
  + minutes + ":" + seconds;
    
  // Jika hitungan mundur selesai, tulis beberapa teks 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Timeout";
  }
}, 1000);
</script>