<?php
session_start();
include ('../config.php');

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    die("Akses ditolak. Anda belum login.");
}

$user_id = $_SESSION['user_id'];

// Ambil data dari form
$nama_lengkap = $_POST['nama_lengkap'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat_lengkap = $_POST['alamat_lengkap'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$sekolah_terakhir = $_POST['sekolah_terakhir'];
$tinggal_bersama = $_POST['tinggal_bersama'];
$pernah_mondok = $_POST['pernah_mondok'];
$nama_pondok_sebelumnya = $_POST['nama_pondok_sebelumnya'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$pekerjaan_ayah = $_POST['pekerjaan_ayah'];
$pekerjaan_ibu = $_POST['pekerjaan_ibu'];
$penghasilan_ayah = $_POST['penghasilan_ayah'];
$penghasilan_ibu = $_POST['penghasilan_ibu'];
$alamat_rumah = $_POST['alamat_rumah'];

// Simpan data ke tabel santri
$query = "INSERT INTO santri (
    user_id, nama_lengkap, tempat_lahir, tanggal_lahir, alamat_lengkap,
    jenis_kelamin, sekolah_terakhir, tinggal_bersama, pernah_mondok, nama_pondok_sebelumnya,
    nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu,
    penghasilan_ayah, penghasilan_ibu, alamat_rumah
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param(
    "issssssssssssssss",
    $user_id,
    $nama_lengkap,
    $tempat_lahir,
    $tanggal_lahir,
    $alamat_lengkap,
    $jenis_kelamin,
    $sekolah_terakhir,
    $tinggal_bersama,
    $pernah_mondok,
    $nama_pondok_sebelumnya,
    $nama_ayah,
    $nama_ibu,
    $pekerjaan_ayah,
    $pekerjaan_ibu,
    $penghasilan_ayah,
    $penghasilan_ibu,
    $alamat_rumah
);

if ($stmt->execute()) {
    header("Location: profile_santri.php");
    exit();
} else {
    echo "Gagal menyimpan data: " . $stmt->error;
}
?>