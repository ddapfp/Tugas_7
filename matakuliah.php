<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];

    $koneksi->query("INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kode', '$nama', '$sks')");
    header("Location: matakuliah.php");
}

if (isset($_GET['hapus'])) {
    $kode = $_GET['hapus'];
    $koneksi->query("DELETE FROM matakuliah WHERE kodemk='$kode'");
    header("Location: matakuliah.php");
}

$data = $koneksi->query("SELECT * FROM matakuliah");
?>

<link rel="stylesheet" href="style.css">

<h2>Data Matakuliah</h2>
<form method="post">
    <input type="text" name="kode" placeholder="Kode MK" required>
    <input type="text" name="nama" placeholder="Nama Matkul" required>
    <input type="number" name="sks" placeholder="Jumlah SKS" required>
    <button type="submit" name="tambah">Tambah</button>
</form>

<table border="1" cellpadding="5">
<tr><th>Kode</th><th>Nama</th><th>SKS</th><th>Aksi</th></tr>
<?php while ($row = $data->fetch_assoc()) { ?>
<tr>
    <td><?= $row['kodemk'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['jumlah_sks'] ?></td>
    <td><a href="?hapus=<?= $row['kodemk'] ?>" onclick="return confirm('Hapus?')">Hapus</a></td>
</tr>
<?php } ?>
</table>