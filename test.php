<?php
date_default_timezone_set('Asia/Jakarta');
$awal  = date_create('2022-01-07 15:00:00');
$akhir = date_create(); // waktu sekarang
$diff  = date_diff($awal,$akhir);

echo $diff->h . ' jam, ';
echo $diff->i . ' menit, ';
echo $diff->s . ' detik, ';
