<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah pengguna adalah admin atau user
if ($_SESSION['role'] == 'user') {
    $dashboard_title = "User Dashboard";
    $welcome_message = "Selamat datang, User " . $_SESSION['username'] . "!";
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
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span class="text-2xl font-bold nav-text">
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

                <!-- dashboard user start -->
                <?php if ($role === 'user'): ?>
                <?php else: ?>
                    <a href="profile_santri.php" class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
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

                <a href="../logout.php"
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

            <div class="flex-1 p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4"><?php echo $welcome_message; ?></h1>
                <p class="text-md text-gray-600">Anda telah login sebagai <?php echo $role; ?>.</p>
                <p class="text-md text-gray-600 text-justify">Selamat datang di PPDB Pondok Pesantren. Dalam era
                    informasi dan
                    komunikasi yang semakin maju saat ini maka kami melakukan sebuah langkah maju dalam rangka
                    memberikan pelayanan yang lebih baik dan lebih mudah kepada seluruh masyarakat dengan membuka
                    pendaftaran secara Online. Dengan cara ini orang tua / wali calon siswa dapat dengan mudah
                    mendaftarkan anak-anaknya ke sekolah, tanpa harus datang secara langsung melainkan dengan cara
                    mengisi data pendaftaran dari rumah dengan menggunakan fasilitas internet, baik itu menggunakan
                    komputer maupun gadget.</p>
            </div>
            <footer class="text-dark p-4 text-center fixed bottom-0">
                &copy; 2025 Pondok Pesantren Al-Muflihin | Gebang Ilir, Gebang, CIrebon Jawa Barat.
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
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            sidebar.classList.toggle('sidebar-collapsed');
        }
    </script>
</body>

</html>