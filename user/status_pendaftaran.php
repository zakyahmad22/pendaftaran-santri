<?php
session_start();
$current_page = basename(__FILE__);

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil username yang sedang login
$username = $_SESSION['user_username'];


// Koneksi database
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ppdb_pondok";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data status pendaftaran berdasarkan username
$sql = "SELECT * FROM calon_santri WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $santri = $result->fetch_assoc();
} else {
    $santri = null;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Status Pendaftaran Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar-collapsed .nav-text {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">


    <div class="flex flex-1">
        <!-- Sidebar -->
        <?php $role = 'user'; ?>
        <?php
        include 'sidebar_user.php'; // Memasukkan sidebar
        ?>

        <div class="flex-1">
            <header class="bg-white shadow flex justify-between items-center py-4 px-6">
                <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                <div class="flex items-center space-x-3">
                    <span class="text-gray-700 font-medium"><?php echo ucfirst($role) . ' : ' . $username; ?></span>
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Status Pendaftaran</h1>

                <?php if ($santri): ?>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="font-semibold text-gray-700">Nama Lengkap:</label>
                                    <p class="text-gray-900"><?php echo htmlspecialchars($santri['nama_lengkap']); ?></p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Tanggal Pendaftaran:</label>
                                    <p class="text-gray-900"><?php echo htmlspecialchars($santri['tanggal_pendaftaran']); ?>
                                    </p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Alamat Lengkap:</label>
                                    <p class="text-gray-900"><?php echo htmlspecialchars($santri['alamat_lengkap']); ?></p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Status Pendaftaran:</label>
                                    <p class="text-gray-900">
                                        <?php
                                        echo $santri['status_pendaftaran'] ? htmlspecialchars($santri['status_pendaftaran']) : "Belum Diverifikasi";
                                        ?>
                                    </p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Keterangan:</label>
                                    <p class="text-gray-900">
                                        <?php
                                        echo $santri['keterangan'] ? htmlspecialchars($santri['keterangan']) : "Belum Ada Keterangan";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <a href="/pendaftaran-santri/user/cetak_status.php" target="_blank"
                                class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                                Cetak PDF
                            </a>
                        </div>

                    </div>
                <?php else: ?>
                    <div class="bg-white p-6 rounded-lg shadow text-center">
                        <p class="text-gray-600">Data status pendaftaran belum tersedia. Silakan hubungi Admin.</p>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            sidebar.classList.toggle('sidebar-collapsed');
        }
    </script>

</body>

</html>