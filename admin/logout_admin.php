<?php
session_start();
session_unset(); // Menghapus semua variabel session
session_destroy(); // Menghancurkan session

// Redirect ke halaman login admin
header("Location: login_admin.php");
exit();
?>