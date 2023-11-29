<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa</title>
</head>
<body>
    <?php
    include "koneksi.php";

    // Tampilkan data mahasiswa
    $sql = "SELECT * FROM mahasiswa";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nama</th><th>NIM</th><th>Jurusan</th><th>Tanggal Lahir</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["nim"] . "</td>";
            echo "<td>" . $row["jurusan"] . "</td>";
            echo "<td>" . $row["tanggal_lahir"] . "</td>";
            echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='mahasiswa.php?delete=" . $row["id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data mahasiswa.";
    }

    $koneksi->close();
    ?>
    <br>
    <h2>Tambah Mahasiswa</h2>
    <form action="mahasiswa.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>NIM:</label>
        <input type="text" name="nim" required><br>
        <label>Jurusan:</label>
        <input type="text" name="jurusan" required><br>
        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir"><br>
        <input type="submit" name="tambah" value="Tambah">
    </form>
</body>
</html>
