<?php
include '../config.php';
include '../admin/sidebar.php';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
        <!-- Header disamakan -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Data Pengguna</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <!-- Konten utama -->
        <div class="ml-64 pt-20 px-6 pb-10">
            <h1 class="text-xl font-semibold mb-6 text-dark dark:text-white">Daftar Data Pengguna</h1>

            <div class="overflow-x-auto rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
                <table class="min-w-full table-auto bg-white dark:bg-gray-800 text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase text-xs">
                        <tr>
                            <th class="p-4 text-left">No</th>
                            <th class="p-4 text-left">Username</th>
                            <th class="p-4 text-left">Role</th>
                            <th class="p-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($row = $result->fetch_assoc()): ?>
                            <tr
                                class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="p-4"><?= $no++ ?></td>
                                <td class="p-4"><?= htmlspecialchars($row['username']) ?></td>
                                <td class="p-4"><?= htmlspecialchars($row['role']) ?></td>
                                <td class="p-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="edit_pengguna.php?id=<?= $row['id'] ?>"
                                            class="inline-flex items-center px-2 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <button onclick="confirmDelete(<?= $row['id'] ?>)"
                                            class="inline-flex items-center px-2 py-1 text-sm bg-red-500 hover:bg-red-600 text-white rounded-md transition">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <footer class="ml-64 text-dark dark:text-white p-4 text-center">
            &copy; 2025 Pondok Pesantren Al-Muflihin | Gebang Ilir, Gebang, Cirebon Jawa Barat.
        </footer>
    </section>

    <!-- Konfirmasi Hapus (Script) -->
    <script>
        function confirmDelete(id) {
            if (confirm('Yakin ingin menghapus pengguna ini?')) {
                window.location.href = 'hapus_pengguna.php?id=' + id;
            }
        }
    </script>


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

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const headers = document.querySelectorAll('header');
            const contents = document.querySelectorAll('section > div');

            if (sidebar.classList.contains('-ml-64')) {
                sidebar.classList.remove('-ml-64');
                headers.forEach(h => h.classList.add('ml-64'));
                contents.forEach(c => c.classList.add('ml-64'));
            } else {
                sidebar.classList.add('-ml-64');
                headers.forEach(h => h.classList.remove('ml-64'));
                contents.forEach(c => c.classList.remove('ml-64'));
            }
        }
    </script>
</body>

</html>