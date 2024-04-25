<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Halaman Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Data SMK BPP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Data Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Data Mata Pelajaran</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div class="container mt-4">
    <h5>Data Siswa SMK BPP</h5>

    <?php 
    if(isset($_GET['alert'])){
        if($_GET['alert']=='gagal_ekstensi'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Peringatan!</strong> Ekstensi Tidak Diperbolehkan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>								
            <?php
        } elseif($_GET['alert']=="gagal_ukuran"){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Peringatan!</strong> Ukuran File terlalu Besar
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 								
            <?php
        } elseif($_GET['alert']=="berhasil"){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Berhasil Disimpan
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 								
            <?php
        } elseif($_GET['alert']=="file_sudah_ada"){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Peringatan!</strong> File sudah ada
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 								
            <?php
        } elseif($_GET['alert']=="berhasil_hapus"){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Data Berhasil Dihapus
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 								
            <?php
        } elseif($_GET['alert']=="gagal_hapus"){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> Data Gagal Dihapus
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 								
            <?php
        } 
    }
    ?>



    <a class="btn btn-success" href="create.php" role="button">Tambah Data</a>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIS</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM siswa");
    while($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nis']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['kelas']; ?></td>
                <td>
                    <a class="btn btn-dark" href="detail.php?id=<?php echo $d['id']; ?>">Detail</a>
                    <a class="btn btn-warning" href="edit.php?id=<?php echo $d['id']; ?>">Edit</a>
					<a class="btn btn-danger" href="hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php
    }
    ?>
  </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>