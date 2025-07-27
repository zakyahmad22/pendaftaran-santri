<?php
session_start();    // Mulai session

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Pastikan pengguna sudah login 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
// Cek apakah pengguna adalah admin atau user
if ($_SESSION['role'] == 'admin') {
    $dashboard_title = "Admin Dashboard";
    $welcome_message = "Selamat datang, Admin " . $_SESSION['username'] . "!";
} else {
    $dashboard_title = "User Dashboard";
    $welcome_message = "Selamat datang, " . $_SESSION['username'] . "!";
}

if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login_admin.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .sidebar-collapsed .nav-text {
            display: none;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100">

    <div class="flex ml-64 min-h-screen">
        <!--  include sidebar.php -->


        <?php include 'sidebar.php'; ?>

        <!-- dashboard user end -->

        <div class="flex-1">
            <header
                class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
                <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                <div class="flex items-center space-x-3">
                    <span class="text-gray-700 font-medium">
                        <?php echo ucfirst($role) . ' : ' . $username; ?>
                    </span>
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

            <!-- tampilan data calon santri start -->
            <?php
            // Koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ppdb_pondok";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }
            // Query jumlah data
            $result_santri = $conn->query("SELECT COUNT(*) as total FROM calon_santri");
            $jumlah_santri = $result_santri->fetch_assoc()['total'];

            $result_info = $conn->query("SELECT COUNT(*) as total FROM informasi");
            $jumlah_info = $result_info->fetch_assoc()['total'];

            $result_users = $conn->query("SELECT COUNT(*) as total FROM users");
            $jumlah_users = $result_users->fetch_assoc()['total'];

            $result_status = $conn->query("SELECT COUNT(*) as total FROM calon_santri WHERE status_pendaftaran IS NOT NULL");
            $jumlah_status = $result_status->fetch_assoc()['total'];
            ?>

            <!-- card start -->
            <div class="flex-1 p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4 mt-20">
                    <?= $welcome_message; ?>
                </h1>
                <p class="text-md text-gray-600 mb-6">Anda telah login sebagai <?= $role; ?>.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Card: Calon Santri -->
                    <div
                        class="bg-white rounded-xl shadow-md p-5 transform transition duration-300 hover:scale-105 hover:shadow-xl flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-700">Calon Santri</h2>
                            <p class="text-3xl font-bold text-blue-600 mt-2">
                                <?= $jumlah_santri ?>
                            </p>
                        </div>
                        <a href="calon_santri.php"
                            class="mt-4 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold py-2 px-3 rounded transition">
                            Baca Selengkapnya
                        </a>
                    </div>

                    <!-- Card: Informasi -->
                    <div
                        class="bg-white rounded-xl shadow-md p-5 transform transition duration-300 hover:scale-105 hover:shadow-xl flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-700">Informasi</h2>
                            <p class="text-3xl font-bold text-green-600 mt-2">
                                <?= $jumlah_info ?>
                            </p>
                        </div>
                        <a href="informasi_admin.php"
                            class="mt-4 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold py-2 px-3 rounded transition">
                            Baca Selengkapnya
                        </a>
                    </div>

                    <!-- Card: Data Pengguna -->
                    <div
                        class="bg-white rounded-xl shadow-md p-5 transform transition duration-300 hover:scale-105 hover:shadow-xl flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-700">Data Pengguna</h2>
                            <p class="text-3xl font-bold text-yellow-500 mt-2">
                                <?= $jumlah_users ?>
                            </p>
                        </div>
                        <a href="../data_pengguna/data_pengguna.php"
                            class="mt-4 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold py-2 px-3 rounded transition">
                            Baca Selengkapnya
                        </a>
                    </div>

                    <!-- Card: Status Pendaftaran -->
                    <div
                        class="bg-white rounded-xl shadow-md p-5 transform transition duration-300 hover:scale-105 hover:shadow-xl flex flex-col justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-700">Status Pendaftaran</h2>
                            <p class="text-3xl font-bold text-red-500 mt-2">
                                <?= $jumlah_status ?>
                            </p>
                        </div>
                        <a href="admin_status_update.php"
                            class="mt-4 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-2 px-3 rounded transition">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

            <!-- card end -->

            <footer class="bg-white text-gray-700 p-4 text-center w-full border-t">
                &copy; 2025 Pondok Pesantren Al-Muflihin | Gebang Ilir, Gebang, Cirebon, Jawa Barat.
            </footer>

            <?php
            $conn->close();
            ?>
            <!-- tampilan data calon santri end -->
        </div>
    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('div');
            const header = document.querySelector('header');

            if (sidebar.classList.contains('-ml-64')) {
                sidebar.classList.remove('-ml-64');
                mainContent.classList.add('ml-64');
                header.classList.add('ml-64');
            } else {
                sidebar.classList.add('-ml-64');
                mainContent.classList.remove('ml-64');
                header.classList.remove('ml-64');
            }
        }
    </script>

</body>

</html>