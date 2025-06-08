<?php
session_start();
include '../config.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    $role = "user"; // Default role untuk user biasa
 
    // Validasi input tidak boleh kosong
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "Semua kolom harus diisi!";
        header("Location: ../register.php");
        exit();
    }

    // Validasi password & konfirmasi password harus sama
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Password dan Konfirmasi Password harus sama!";
        header("Location: ../register.php");
        exit();
    }

    // Cek apakah email sudah terdaftar di users
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Email sudah terdaftar!";
        header("Location: ../register.php");
        exit();
    }

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data ke tabel users
    $insertQuery = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param('ssss', $username, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        // ✅ Setelah berhasil insert ke users, update username di calon_santri
        $updateQuery = "UPDATE calon_santri SET username = ? WHERE email = ?";
        $stmtUpdate = $mysqli->prepare($updateQuery);
        $stmtUpdate->bind_param("ss", $username, $email);
        $stmtUpdate->execute();

        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
        header("Location: ../register.php");
        exit();
    }
} else {
    header("Location: ../register.php");
    exit();
}
