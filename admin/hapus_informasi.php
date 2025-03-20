<?php
include '../config.php';

// Pastikan ada parameter id_info pada URL
if (isset($_GET['id_info'])) {
    $id_info = $_GET['id_info'];

    // Ambil data informasi berdasarkan id_info
    $query = "SELECT * FROM informasi WHERE id_info = '$id_info'";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);

    // Jika data ditemukan, lanjutkan ke proses penghapusan
    if ($row) {
        // Menghapus file gambar terkait
        $gambar = $row['gambar'];
        $file_path = "uploads/" . $gambar;
        if (file_exists($file_path)) {
            unlink($file_path); // Hapus file gambar
        }

        // Menghapus data informasi dari database
        $deleteQuery = "DELETE FROM informasi WHERE id_info = '$id_info'";
        if (mysqli_query($mysqli, $deleteQuery)) {
            header("Location: informasi_admin.php?status=hapus_sukses");
            exit();
        } else {
            echo "Gagal menghapus data: " . mysqli_error($mysqli);
        }
    } else {
        // Jika data tidak ditemukan, redirect ke halaman admin
        header("Location: informasi_admin.php?status=error");
        exit();
    }
} else {
    // Jika tidak ada id_info pada URL, redirect ke halaman admin
    header("Location: informasi_admin.php?status=error");
    exit();
}
?>