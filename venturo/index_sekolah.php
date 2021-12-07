<?php
// connect ke db
require 'functions.php';
$sekolahs = query("SELECT * FROM sekolah");
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

    <title>Data Siswa & Sekolah</title>
</head>

<body>
    <?php require "navbar.php" ?>
    <h1>Data Sekolah</h1>
    <a class="btn btn-primary" href="tambahSekolah.php" role="button">Tambah Data Sekolah</a>

    <div class="section" id="tabelSekolah">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($sekolahs as $sekolah) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $sekolah["nama"]; ?></td>
                        <td><?= $sekolah["telepon"]; ?></td>
                        <td><?= $sekolah["alamat"]; ?></td>
                        <td>
                            <a class="btn btn-warning" href="ubahSekolah.php?id=<?= $sekolah["id"]; ?>" role="button">Edit</a> |
                            <a class="btn btn-danger" href="hapusSekolah.php?id=<?= $sekolah["id"]; ?>" role="button" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>