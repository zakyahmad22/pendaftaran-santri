<?php
session_start();
include '../config.php'; // koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $password = $_POST['pass'];

    // Cek apakah username ada di database
    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Cek password
        if (password_verify($password, $user['password'])) {
            // Cek apakah user adalah admin
            if ($user['role'] == 'admin') {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: ../admin/admin_dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "Anda tidak memiliki akses ke halaman admin!";
            }
        } else {
            $_SESSION['error'] = "Password salah!";
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan!";
    }

    // Redirect ke halaman login admin jika gagal
    header("Location: login_admin.php");
    exit();
}
?>