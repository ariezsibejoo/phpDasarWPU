<?php

// connect ke db
require 'functions.php';
// ambil data di url
$id = $_GET["id"];
// query data siswa berdasarkan id
$sekolah = query("SELECT * FROM sekolah WHERE id = $id")[0];

// cek tombol udah ditekan/belum
if (isset($_POST["submit"])) {
    // cek keberhasilan
    if (ubahSekolah($_POST) > 0) {
        echo "
        <script>
        alert ('Data berhasil diubah');
        document.location.href = 'index_sekolah.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert ('Data gagal diubah');
        document.location.href = 'index_sekolah.php';
        </script>
        ";
    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- my CSS -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <title>Edit Data Sekolah</title>
</head>

<body>
    <?php require "navbar.php"; ?>
    <h1>Edit Data Sekolah</h1>

    <div class="mb-3">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $sekolah["id"]; ?>">

            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control mb-3" id="nama" placeholder="Nama" required value="<?= $sekolah['nama']; ?>">

            <label for="telepon" class="form-label">No Telepon</label>
            <input type="text" name="telepon" class="form-control mb-3" id="telepon" placeholder="No Telepon" value="<?= $sekolah['telepon']; ?>">


            <label for="alamat" class="form-label">Alamat Sekolah</label>
            <input type="text" name="alamat" class="form-control mb-3" id="alamat" placeholder="Alamat Sekolah" value="<?= $sekolah['alamat']; ?>">

            <button class="btn btn-primary" type="submit" name="submit">Ubah Data</button>
        </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>