<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_admin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hero_content = htmlspecialchars($_POST['hero_content']);
    file_put_contents("hero_section.txt", $hero_content);
    header("Location: admin_dashboard.php?success=1");
    exit();
}
?>