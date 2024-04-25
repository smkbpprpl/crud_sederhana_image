<?php 
include '../koneksi.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

// Cek apakah ada file yang diunggah
if(!empty($filename)) {
    if(!in_array($ext,$ekstensi)) {
        header("location:index.php?alert=gagal_ekstensi");
    } else {
        if($ukuran < 1044070){        
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
            mysqli_query($conn, "INSERT INTO siswa VALUES(NULL,'$nis','$nama','$kelas','$xx')");
            header("location:index.php?alert=berhasil");
        } else {
            header("location:index.php?alert=gagal_ukuran");
        }
    }
} else {
    // Jika tidak ada gambar yang diunggah, gunakan gambar default
    $gambar_default = 'default.jpg';
    mysqli_query($conn, "INSERT INTO siswa VALUES(NULL,'$nis','$nama','$kelas','$gambar_default')");
    header("location:index.php?alert=berhasil");
}
?>
