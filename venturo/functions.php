<?php
// connect ke db
$conn = mysqli_connect("localhost", "root", "", "venturo");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


function tambahSiswa($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $sekolah_id = htmlspecialchars($data["sekolah_id"]);

    // query insert data
    $query = "INSERT INTO siswa
      VALUES
      ('', '$nis', '$nama', '$tgl_lahir','$sekolah_id')
      ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahSekolah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $alamat = htmlspecialchars($data["alamat"]);

    // query insert data
    $query = "INSERT INTO sekolah
      VALUES
      ('', '$nama', '$telepon','$alamat')
      ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusSiswa($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapusSekolah($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM sekolah WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubahSiswa($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $sekolah_id = htmlspecialchars($data["sekolah_id"]);

    // query insert data
    $query = "UPDATE siswa SET 
            nis = '$nis', 
            nama = '$nama',
            tgl_lahir = '$tgl_lahir',
            sekolah_id = '$sekolah_id'
            WHERE id = $id
      ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubahSekolah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $alamat = htmlspecialchars($data["alamat"]);

    // query insert data
    $query = "UPDATE sekolah SET 
            nama = '$nama',
            telepon = '$telepon', 
            alamat = '$alamat'
            WHERE id = $id
      ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
