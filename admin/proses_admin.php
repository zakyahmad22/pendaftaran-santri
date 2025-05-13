<?php
session_start();
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    $role = "admin"; // khusus admin

    // Validasi input
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "Semua kolom harus diisi!";
        header("Location: ../register_admin.php");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Password dan Konfirmasi Password harus sama!";
        header("Location: ../register_admin.php");
        exit();
    }

    // Cek email
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Email sudah terdaftar!";
        header("Location: ../register_admin.php");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user admin
    $insertQuery = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param('ssss', $username, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registrasi admin berhasil! Silakan login.";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
        header("Location: ../register_admin.php");
        exit();
    }
} else {
    header("Location: ../register_admin.php");
    exit();
}
?>