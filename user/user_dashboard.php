<?php
session_start();
$current_page = basename(__FILE__);

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user_username'];

$role = $_SESSION['role'];
$dashboard_title = "User Dashboard";
$welcome_message = "Selamat datang, " . $_SESSION['user_username'] . "!";


// Koneksi ke database
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "ppdb_pondok";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data calon santri berdasarkan username login
$stmt = $conn->prepare("SELECT * FROM calon_santri WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$santri = ($result->num_rows > 0) ? $result->fetch_assoc() : null;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar-collapsed .nav-text {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <?php
        include 'sidebar_user.php'; // Memasukkan sidebar
        ?>

        <!-- Main Content -->
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
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </header>

            <div class="flex-1 p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-4"><?php echo $welcome_message; ?></h1>
                <p class="text-md text-gray-600 mb-6">Silakan pilih menu di bawah:</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Card Profil Santri -->
                    <a href="profile_santri.php"
                        class="block bg-white dark:bg-slate-800 rounded-lg shadow-md hover:shadow-xl transition transform hover:scale-105 p-6 text-center border border-gray-200 dark:border-slate-700">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Profil Santri</h2>
                        <p class="text-gray-600 dark:text-gray-300">Lihat data lengkap santri yang Anda daftarkan.</p>
                    </a>

                    <!-- Card Status Pendaftaran -->
                    <a href="status_pendaftaran.php"
                        class="block bg-white dark:bg-slate-800 rounded-lg shadow-md hover:shadow-xl transition transform hover:scale-105 p-6 text-center border border-gray-200 dark:border-slate-700">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Status Pendaftaran</h2>
                        <p class="text-gray-600 dark:text-gray-300">Cek status verifikasi pendaftaran santri Anda.</p>
                    </a>
                </div>
            </div>

            <footer class="bg-white border-t border-gray-200 text-center text-gray-600 text-sm py-4">
                &copy; 2025 Pondok Pesantren Al-Muflihin | Gebang Ilir, Gebang, Cirebon Jawa Barat.
            </footer>

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

<?php $conn->close(); ?>