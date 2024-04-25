<?php 
include '../koneksi.php';

$id = $_GET['id'];

// Konstanta untuk nama gambar default
define('GAMBAR_DEFAULT', 'default.jpg');

// Mencari data siswa berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
$gambar_lama = $data['gambar'];

// Hapus data siswa
mysqli_query($conn, "DELETE FROM siswa WHERE id='$id'");

// Periksa apakah gambar lama sama dengan gambar default dan tidak kosong
if($gambar_lama != GAMBAR_DEFAULT && !empty($gambar_lama) && file_exists('gambar/' . $gambar_lama)) {
    // Hapus gambar jika bukan gambar default
    unlink('gambar/' . $gambar_lama);
}

header("location:index.php?alert=berhasil_dihapus");
?>
