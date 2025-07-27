<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $password = $_POST['pass'];

    // Gunakan prepared statement
    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Cek peran dan set session secara terpisah
            if ($user['role'] === 'admin') {
                // Jika admin
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                $_SESSION['role'] = 'admin';
                header("Location: admin/admin_dashboard.php");
                exit();
            } elseif ($user['role'] === 'user') {
                // Jika user biasa
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_username'] = $user['username'];
                $_SESSION['role'] = 'user';
                header("Location: user/user_dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "Role tidak dikenali!";
            }
        } else {
            $_SESSION['error'] = "Password salah!";
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan!";
    }

    header("Location: login.php");
    exit();
}
?>