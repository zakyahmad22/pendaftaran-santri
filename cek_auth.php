<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!-- authentic 
authorisasi walaupun sudah login tapi belum tentu bisa akses data -->