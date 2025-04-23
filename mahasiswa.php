<?php
include 'koneksi.php';

// Tambah mahasiswa
if (isset($_POST['tambah'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $koneksi->query("INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')");
    header("Location: mahasiswa.php");
}

// Hapus mahasiswa
if (isset($_GET['hapus'])) {
    $npm = $_GET['hapus'];
    $koneksi->query("DELETE FROM mahasiswa WHERE npm='$npm'");
    header("Location: mahasiswa.php");
}

// Tampilkan data
$data = $koneksi->query("SELECT * FROM mahasiswa");
?>

<link rel="stylesheet" href="style.css">

<h2>Data Mahasiswa</h2>
<form method="post">
    <input type="text" name="npm" placeholder="NPM" required>
    <input type="text" name="nama" placeholder="Nama" required>
    <select name="jurusan">
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
    </select>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <button type="submit" name="tambah">Tambah</button>
</form>

<table border="1" cellpadding="5">
<tr><th>NPM</th><th>Nama</th><th>Jurusan</th><th>Alamat</th><th>Aksi</th></tr>
<?php while ($row = $data->fetch_assoc()) { ?>
<tr>
    <td><?= $row['npm'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['jurusan'] ?></td>
    <td><?= $row['alamat'] ?></td>
    <td><a href="?hapus=<?= $row['npm'] ?>" onclick="return confirm('Hapus?')">Hapus</a></td>
</tr>
<?php } ?>
</table>
