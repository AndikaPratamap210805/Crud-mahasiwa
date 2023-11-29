<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <?php
    include "koneksi.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM mahasiswa WHERE id=$id";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
    <h2>Edit Mahasiswa</h2>
    <form action="mahasiswa.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        <label>NIM:</label>
        <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required><br>
        <label>Jurusan:</label>
        <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required><br>
        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>"><br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php
        } else {
            echo "Data mahasiswa tidak ditemukan.";
        }
    } else {
        echo "ID mahasiswa tidak ditemukan.";
    }

    $koneksi->close();
    ?>
</body>
</html>
