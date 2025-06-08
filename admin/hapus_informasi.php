<?php
include '../config.php';

// Cek apakah ada parameter id_info
if (isset($_GET['id_info'])) {
    $id_info = intval($_GET['id_info']); // Pastikan ini integer untuk keamanan

    // Ambil data informasi berdasarkan id_info
    $query = "SELECT * FROM informasi WHERE id_info = $id_info";
    $result = mysqli_query($mysqli, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Hapus file gambar jika ada
        $gambar = $row['gambar'];
        $file_path = "../uploads/" . $gambar;
        if (file_exists($file_path) && !empty($gambar)) {
            unlink($file_path);
        }

        // Hapus data dari database
        $deleteQuery = "DELETE FROM informasi WHERE id_info = $id_info";
        if (mysqli_query($mysqli, $deleteQuery)) {
            // Redirect ke halaman admin dengan status sukses
            header("Location: informasi_admin.php?status=hapus_sukses");
            exit();
        } else {
            // Gagal hapus data
            header("Location: informasi_admin.php?status=error");
            exit();
        }
    } else {
        // Data tidak ditemukan
        header("Location: informasi_admin.php?status=error");
        exit();
    }
} else {
    // id_info tidak diberikan
    header("Location: informasi_admin.php?status=error");
    exit();
}
