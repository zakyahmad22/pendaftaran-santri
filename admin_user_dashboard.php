<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah pengguna adalah admin atau user
if ($_SESSION['role'] == 'admin') {
    $dashboard_title = "Admin Dashboard";
    $welcome_message = "Selamat datang, Admin " . $_SESSION['username'] . "!";
} else {
    $dashboard_title = "User Dashboard";
    $welcome_message = "Selamat datang, " . $_SESSION['username'] . "!";
}

if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
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
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">
        <div id="sidebar" class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 transition-all duration-300">
            <div class="text-white flex items-center space-x-2 px-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span class="text-2xl font-extrabold nav-text">
                    <?php echo ucfirst($role); ?>
                </span>
            </div>
            <nav>
                <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-3 nav-text">Dashboard</span>
                </a>

                <!-- dashboard admin start -->
                <?php if ($role === 'admin'): ?>
                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 10h10M7 14h10m-5 4h5M4 6h16"></path>
                        </svg>
                        <span class="ml-3 nav-text">Santri Seleksi</span>
                    </a>
                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="ml-3 nav-text">Santri Diterima</span>
                    </a>
                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                        <span class="ml-3 nav-text">Santri Tidak Diterima</span>
                    </a>
                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <span class="ml-3 nav-text">Settings</span>
                    </a>
                    <!-- dashboard admin end -->


                    <!-- dashboard user start -->
                <?php else: ?>
                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z">
                            </path>
                        </svg>
                        <span class="ml-3 nav-text">Profile Santri</span>
                    </a>
                    <a href="#" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="ml-3 nav-text">Status Pendaftaran</span>
                    </a>
                <?php endif; ?>
                <!-- dashboard user end -->

                <a href="logout.php"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                    </svg>
                    <span class="ml-3 nav-text">Log Out</span>
                </a>
            </nav>
        </div>

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

            $sql = "SELECT * FROM calon_santri";
            $result = $conn->query($sql);
            ?>

            <!DOCTYPE html>
            <html lang="id">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Data Calon Santri</title>
                <script src="https://cdn.tailwindcss.com"></script>
            </head>

            <!-- card data santri start -->
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card Calon Santri -->
                <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-700">Calon Santri</h2>
                            <p class="text-2xl font-bold text-blue-500">120</p>
                        </div>
                        <div class="text-blue-500 text-4xl">
                            📄
                        </div>
                    </div>
                    <a href="#" class="mt-4 text-blue-500 hover:underline text-sm font-semibold">Baca Selengkapnya →</a>
                </div>

                <!-- Card Santri Seleksi -->
                <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-700">Santri Seleksi</h2>
                            <p class="text-2xl font-bold text-yellow-500">85</p>
                        </div>
                        <div class="text-yellow-500 text-4xl">
                            📋
                        </div>
                    </div>
                    <a href="#" class="mt-4 text-yellow-500 hover:underline text-sm font-semibold">Baca Selengkapnya
                        →</a>
                </div>

                <!-- Card Santri Diterima -->
                <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-700">Santri Diterima</h2>
                            <p class="text-2xl font-bold text-green-500">60</p>
                        </div>
                        <div class="text-green-500 text-4xl">
                            ✅
                        </div>
                    </div>
                    <a href="#" class="mt-4 text-green-500 hover:underline text-sm font-semibold">Baca Selengkapnya
                        →</a>
                </div>

                <!-- Card Santri Tidak Diterima -->
                <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-700">Santri Tidak Diterima</h2>
                            <p class="text-2xl font-bold text-red-500">25</p>
                        </div>
                        <div class="text-red-500 text-4xl">
                            ❌
                        </div>
                    </div>
                    <a href="#" class="mt-4 text-red-500 hover:underline text-sm font-semibold">Baca Selengkapnya →</a>
                </div>
            </div>
            <!-- card data santri end -->


            </html>

            <?php
            $conn->close();
            ?>
            <!-- tampilan data calon santri end -->


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