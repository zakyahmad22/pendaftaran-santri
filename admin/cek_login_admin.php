<?php
session_start();
include '../config.php'; // Pastikan file config.php sudah benar dan terkoneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $password = $_POST['pass'];

    // Ambil data user dari database
    $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    if (count($result) > 0) {
        $user = $result[0];

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect berdasarkan peran
            if ($user['role'] == 'admin') {
                header("Location: ../admin/admin_dashboard.php");
            } else {
                header("Location: user/user_dashboard.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Password salah!";
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan!";
    }
}

// Redirect kembali ke halaman login jika gagal
header("Location: login_admin.php");
exit();
?>