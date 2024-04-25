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
          <a class="nav-link" href="index.php">Data Siswa</a>
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
    <h5>Tambah Data Siswa Baru</h5>
    <?php
	include '../koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($conn,"select * from siswa where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="NIS" class="form-label">NIS</label>
            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukan NIS" value="<?php echo $d['nis'] ?>">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" value="<?php echo $d['nama'] ?>">
        </div>
        <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <select class="form-select" aria-label="Default select example" name="kelas">
            <option selected value="<?php echo $d['kelas'] ?>"><?php echo $d['kelas'] ?></option>
            <option>- Pilih kelas -</option>
            <option value="x">X</option>
            <option value="xi">XI</option>
            <option value="xii">XII</option>
        </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <div class="mb-3">
                <img src="gambar/<?php echo $d['gambar'] ?>" alt="">
            </div>
            <input class="form-control" type="file" id="gambar" name="gambar">
        </div>
        <button type="submit" value="simpan" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="index.php">Kembali</a>
    </form>
    <?php 
	}
	?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>