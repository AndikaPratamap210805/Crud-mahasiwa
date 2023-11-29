<?php
include "koneksi.php";

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = "INSERT INTO mahasiswa (nama, nim, jurusan, tanggal_lahir) VALUES ('$nama', '$nim', '$jurusan', '$tanggal_lahir')";
    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan', tanggal_lahir='$tanggal_lahir' WHERE id=$id";
    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $koneksi->error;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM mahasiswa WHERE id=$id";
    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }
}
?>
