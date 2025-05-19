<?php 
setlocale(LC_TIME, 'id_ID');

// Ambil data dari POST
$nama = $_POST['Nama'] ?? 'Tidak ada';
$alamat = $_POST['Alamat'] ?? 'Tidak ada';
$no_hp = $_POST['Nohp'] ?? 'Tidak ada';
$pesan = $_POST['Pesan'] ?? 'Tidak ada';
$email = $_POST['Email'] ?? 'tidak ada';
 
$waktu = date("l, d-F-Y");
// Periksa file gambar
$gambar = $_FILES['gambar'] ?? null;
$gambarType = null;

// Tampilkan data
echo "<h2>Data yang Diterima</h2>";
echo "Nama: $nama<br>";
echo "Alamat: $alamat<br>";
echo "No HP: $no_hp<br>";
echo "Pesan: $pesan<br>";
echo "email: $email<br>";
?>