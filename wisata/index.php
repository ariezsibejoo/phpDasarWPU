<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$wisatas = query("SELECT * FROM wisata");

// TOMBOL CARI DITEKAN
if( isset($_POST["cari"]) ) {
	$wisatas = cari($_POST["keyword"]);
}


?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- my css -->
	<link rel="stylesheet" href="style.css">
    <title>Daftar Wisata</title>
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#">Wisata Malang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
	<!-- SEARCH -->
    <form class="form-inline my-2 my-lg-0 ml-auto" action="" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="Cari" aria-label="Cari" name="keyword" size="40" autocomplete="off" id="keyword">
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>
  </div>
</nav>
<!-- <a href="logout.php">Logout</a> -->
<div class="row tambah-logout">
<div class="col-1" ><a class="btn btn-info" href="tambah.php" role="button">Tambah data</a></div>
<div class="col-1 ml-auto"><a class="btn btn-danger" href="logout.php" role="button">Logout</a></div>
</div>

<!-- <a href="tambah.php">Tambah data wisata</a> -->
<br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0" class="table table-hover">
<thead class="thead-dark">
<tr>
	<th scope="col">No.</th>
	<th scope="col" width="120">Aksi</th>
	<th scope="col">Gambar</th>
	<th scope="col" width="300">Nama</th>
	<th scope="col">Alamat</th>
	<th scope="col">Jam Operasional</th>
	<th scope="col">HTM</th>
	<th scope="col">Deskripsi</th>
</tr>
</thead>
	<tbody>
	<?php $i=1; ?>
	<?php foreach( $wisatas as $wisata ) : ?>
	<tr>
		<th scope="row"><?= $i;  ?></th>
		<td>
			<a href="ubah.php?id=<?= $wisata["id"]; ?>">Ubah</a> |
			<a href="hapus.php?id=<?= $wisata["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?');">Hapus</a>
		</td>
		<td><img src="img/<?= $wisata["gambar"]; ?>" width="50"></td>
		<td><?= $wisata["nama"]; ?></td>
		<td><?= $wisata["alamat"]; ?></td>
		<td><?= $wisata["operasional"]; ?> </td>
		<td><?= $wisata["htm"]; ?></td>
		<td><?= $wisata["deskripsi"]; ?></td>
		</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>