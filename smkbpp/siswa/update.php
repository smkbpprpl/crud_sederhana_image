<?php 
include '../koneksi.php';

$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

// Mencari data siswa berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
$gambar_lama = $data['gambar'];

if(!empty($filename)) {
    // Jika ada gambar yang diunggah, lakukan perubahan
    if(!in_array($ext, $ekstensi)) {
        header("location:index.php?alert=gagal_ekstensi");
    } else {
        if($ukuran < 1044070) {
            $xx = $rand . '_' . $filename;

            // Pemeriksaan apakah gambar lama ada dan menghapusnya
            if(!empty($gambar_lama) && file_exists('gambar/' . $gambar_lama)) {
                unlink('gambar/' . $gambar_lama);
            }

            // Pemeriksaan apakah file sudah ada sebelum mengunggahnya
            if(file_exists('gambar/' . $xx)) {
                header("location:index.php?alert=file_sudah_ada");
            } else {
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
                mysqli_query($conn, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', gambar='$xx' WHERE id=$id");
                header("location:index.php?alert=berhasil");
            }
        } else {
            header("location:index.php?alert=gagal_ukuran");
        }
    }
} else {
    // Jika tidak ada gambar yang diunggah, lakukan perubahan data tanpa mengubah gambar
    mysqli_query($conn, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas' WHERE id=$id");
    header("location:index.php?alert=berhasil");
}
?>
