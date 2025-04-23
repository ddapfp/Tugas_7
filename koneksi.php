<?php
$koneksi = new mysqli("localhost", "root", "", "kampus");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>