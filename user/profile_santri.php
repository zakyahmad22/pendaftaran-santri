<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppdb_pondok";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data santri berdasarkan user yang login
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM calon_santri WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$santri = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Santri</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-bold mb-4">Profil Santri</h2>
        <?php if ($santri): ?>
            <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($santri['nama_lengkap']); ?></p>
            <p><strong>Tempat, Tanggal Lahir:</strong> <?php echo htmlspecialchars($santri['tempat_lahir'] . ", " . date('d/m/Y', strtotime($santri['tanggal_lahir']))); ?></p>
            <p><strong>Jenis Kelamin:</strong> <?php echo htmlspecialchars($santri['jenis_kelamin']); ?></p>
            <p><strong>Sekolah Terakhir:</strong> <?php echo htmlspecialchars($santri['sekolah_terakhir']); ?></p>
            <p><strong>Alamat:</strong> <?php echo htmlspecialchars($santri['alamat']); ?></p>
            <p><strong>No HP Orang Tua:</strong> <?php echo htmlspecialchars($santri['no_hp_orangtua']); ?></p>
        <?php else: ?>
            <p class="text-red-500">Data santri tidak ditemukan.</p>
        <?php endif; ?>
        <a href="user_dashboard.php" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Kembali</a>
    </div>
</body>
</html>
