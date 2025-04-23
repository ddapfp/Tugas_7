<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];

    $koneksi->query("INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')");
    echo "KRS berhasil ditambahkan.";
}

// Data untuk dropdown
$mhs = $koneksi->query("SELECT * FROM mahasiswa");
$mk = $koneksi->query("SELECT * FROM matakuliah");
?>

<link rel="stylesheet" href="style.css">

<h2>Ambil Mata Kuliah</h2>
<form method="post">
    <label>Mahasiswa:</label>
    <select name="npm">
        <?php while ($row = $mhs->fetch_assoc()) { ?>
            <option value="<?= $row['npm'] ?>"><?= $row['nama'] ?></option>
        <?php } ?>
    </select><br><br>

    <label>Mata Kuliah:</label>
    <select name="kodemk">
        <?php while ($row = $mk->fetch_assoc()) { ?>
            <option value="<?= $row['kodemk'] ?>"><?= $row['nama'] ?></option>
        <?php } ?>
    </select><br><br>

    <button type="submit" name="submit">Tambah KRS</button>
</form>
 