<?php
session_start();

// Cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil username yang sedang login
$username = $_SESSION['username'];

// Koneksi database
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ppdb_pondok";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data calon santri berdasarkan username yang login
$stmt = $conn->prepare("SELECT * FROM calon_santri WHERE username = ?");
$stmt->bind_param("s", $username);  // "s" menunjukkan bahwa $username adalah string
$stmt->execute();
$result = $stmt->get_result();

// Cek data ketemu atau tidak
if ($result->num_rows > 0) {
    $santri = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan";  // Debugging
    $santri = null;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profile Santri</title>
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
        <?php
        $role = 'user'; // atau dari session, misalnya $_SESSION['role']
        $welcome_message = "Profil Santri";
        ?>

        <!-- Main Content -->
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
                <a href="/pendaftaran-santri/user/user_dashboard.php"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-3 nav-text">Dashboard</span>
                </a>
                <a href="profile_santri.php"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                    <span class="ml-3 nav-text">Profile Santri</span>
                </a>
                <a href="/pendaftaran-santri/user/status_pendaftaran.php"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="ml-3 nav-text">Status Pendaftaran</span>
                </a>
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

            <div class="flex-1 p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Profil Santri</h1>

                <?php if ($santri): ?>
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="font-semibold text-gray-700">Nama Lengkap:</label>
                                <p class="text-gray-900"><?php echo $santri['nama_lengkap']; ?></p>
                            </div>
                            <div>
                                <label class="font-semibold text-gray-700">Tempat, Tanggal Lahir:</label>
                                <p class="text-gray-900">
                                    <?php echo $santri['tempat_lahir'] . ', ' . date('d/m/Y', strtotime($santri['tanggal_lahir'])); ?>
                                </p>
                            </div>
                            <div>
                                <label class="font-semibold text-gray-700">Jenis Kelamin:</label>
                                <p class="text-gray-900"><?php echo $santri['jenis_kelamin']; ?></p>
                            </div>
                            <div>
                                <label class="font-semibold text-gray-700">Alamat Lengkap:</label>
                                <p class="text-gray-900"><?php echo $santri['alamat_lengkap']; ?></p>
                            </div>
                            <div>
                                <label class="font-semibold text-gray-700">Nama Ayah:</label>
                                <p class="text-gray-900"><?php echo $santri['nama_ayah']; ?></p>
                            </div>
                            <div>
                                <label class="font-semibold text-gray-700">Nama Ibu:</label>
                                <p class="text-gray-900"><?php echo $santri['nama_ibu']; ?></p>
                            </div>
                            <div>
                                <label class="font-semibold text-gray-700">Nomer HP:</label>
                                <p class="text-gray-900"><?php echo $santri['no_hp_ortu']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
            
                    <div class="bg-white p-6 rounded-lg shadow text-center">
                        <p class="text-gray-600">Data profil Anda belum tersedia. Silakan hubungi Admin.</p>
                    </div>
                <?php endif; ?>
            </div>
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