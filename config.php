<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ppdb_pondok';

// Buat koneksi MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi database gagal: " . $mysqli->connect_error);
}
?>