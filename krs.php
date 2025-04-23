<?php
include 'koneksi.php';

$query = "
SELECT 
    m.nama AS nama_mahasiswa, 
    mk.nama AS nama_matkul, 
    mk.jumlah_sks
FROM krs k
JOIN mahasiswa m ON m.npm = k.mahasiswa_npm
JOIN matakuliah mk ON mk.kodemk = k.matakuliah_kodemk
";

$result = $koneksi->query($query);

echo '<link rel="stylesheet" href="style.css">';

$no = 1;
echo "<table border='1' cellpadding='8'>";
echo "<tr><th>No</th><th>Nama Lengkap</th><th>Mata Kuliah</th><th>Keterangan</th></tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$no}</td>";
    echo "<td>{$row['nama_mahasiswa']}</td>";
    echo "<td>{$row['nama_matkul']}</td>";
    echo "<td><span style='color:#E91E63;font-weight:bold;'>{$row['nama_mahasiswa']}</span> Mengambil Mata Kuliah <span style='color:#3F51B5;font-weight:bold;'>{$row['nama_matkul']}</span> ({$row['jumlah_sks']} SKS)</td>";
    echo "</tr>";
    $no++;
}

echo "</table>";
?>