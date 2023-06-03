<?php
require_once 'qrcode/qrlib.php';

// Data yang akan dijadikan QR Code
$data = 'https://www.example.com'; // Ganti dengan data yang diinginkan

// Nama berkas QR Code yang akan dihasilkan
$filename = 'qrcode.png';

// Path penyimpanan berkas QR Code
$filepath = 'qrcode/' . $filename;

// Ukuran dan level koreksi kesalahan QR Code
$size = 10;
$level = 'L';

// Generate QR Code
QRcode::png($data, $filepath, $level, $size);

echo 'QR Code telah berhasil dibuat: <br>';
echo "<img src='$filepath' alt='QR Code'>";
?>





