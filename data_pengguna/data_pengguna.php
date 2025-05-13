<?php
include '../config.php';
include '../sidebar.php';

// Cek jika session belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] != 'admin') {
    header("Location: user_dashboard.php");
    exit();
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppdb_pondok";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM users"; // Sesuaikan dengan tabel pengguna di database
$result = $conn->query($sql);

if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="../dist/css/final.css" rel="stylesheet" />

    <script>
        function confirmDelete(id) {
            // Menampilkan alert konfirmasi
            var result = confirm("Apakah Anda yakin ingin menghapus pengguna ini?");
            if (result) {
                // Jika setuju, lanjutkan dengan penghapusan pengguna
                window.location.href = "data_pengguna.php?action=delete&id=" + id;
            }
        }   
    </script>
</head>

<body class="bg-gray-100">


    <section id="informasi_admin" class="bg-slate-100 w-full dark:bg-dark">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Data Pengguna</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>
        <div class="flex min-h-screen">
            <div class="flex-1 p-6">
                <h1 class="pb-3 text-xl font-semibold text-dark dark:text-white">Daftar Data Pengguna</h1>

                <table class="w-full border-collapse border border-gray-200 dark:border-gray-600">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                            <th class="p-3 border border-gray-300 dark:border-gray-600">No</th>
                            <!-- Ubah ID menjadi No -->
                            <th class="p-3 border border-gray-300 dark:border-gray-600">Username</th>
                            <th class="p-3 border border-gray-300 dark:border-gray-600">Role</th>
                            <th class="p-3 border border-gray-300 dark:border-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Inisialisasi nomor urut
                        while ($row = $result->fetch_assoc()): ?>
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="p-3 border border-gray-300 dark:border-gray-600"><?php echo $no++; ?></td>
                                <!-- Tampilkan nomor urut -->
                                <td class="p-3 border border-gray-300 dark:border-gray-600"><?php echo $row['username']; ?>
                                </td>
                                <td class="p-3 border border-gray-300 dark:border-gray-600"><?php echo $row['role']; ?></td>
                                <td class="p-3 border border-gray-300 dark:border-gray-600 flex space-x-2">
                                    <a href="edit_pengguna.php?id=<?php echo $row['id']; ?>"
                                        class='bg-primary text-white px-3 py-1 rounded-lg hover:opacity-80'>Edit</a>
                                    <button onclick="confirmDelete(<?php echo $row['id']; ?>)"
                                        class='bg-red-500 text-white px-3 py-1 rounded-lg hover:opacity-80'>Delete</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <footer class="text-dark p-4 text-center bottom-0">
            &copy; 2025 Pondok Pesantren Al-Muflihin | Gebang Ilir, Gebang, Cirebon Jawa Barat.
        </footer>


    </section>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Hapus data pengguna berdasarkan ID
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>alert('Pengguna berhasil dihapus'); window.location.href='data_pengguna.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus pengguna!'); window.location.href='data_pengguna.php';</script>";
        }
    }

    $conn->close();
    ?>

</body>

</html>