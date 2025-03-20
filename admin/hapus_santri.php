<?php
require '../config.php'; // Sesuaikan dengan file koneksi database

// Ambil ID dari URL
$id = $_GET['id'] ?? '';

if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

// Hapus data dari database
$delete = $mysqli->query("DELETE FROM calon_santri WHERE id = '$id'");

if ($delete) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='calon_santri.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!');</script>";
}
?>