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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            transition: width 0.3s ease;
        }

        .sidebar-collapsed {
            width: 5rem;
        }

        .sidebar-expanded {
            width: 16rem;
        }

        .content-shifted {
            margin-left: 16rem;
        }

        .content-collapsed {
            margin-left: 5rem;
        }

        .nav-text {
            transition: opacity 0.3s ease;
        }

        .sidebar-collapsed .nav-text {
            display: none;
        }

        .main-content {
            min-height: 100vh;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar sidebar-expanded fixed top-0 left-0 h-full bg-gray-800 text-white z-10">
        <div class="px-4 py-6">
            <div class="flex items-center justify-between">
                <span class="text-lg font-semibold nav-text">PPDB Pondok</span>
                <button id="toggleSidebar" class="p-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-home"></i>
                    <span class="ml-3 nav-text">Dashboard</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 bg-gray-700 rounded-lg">
                    <i class="fas fa-user-graduate"></i>
                    <span class="ml-3 nav-text">Data Santri</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-book"></i>
                    <span class="ml-3 nav-text">Akademik</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-money-bill"></i>
                    <span class="ml-3 nav-text">Pembayaran</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-700 rounded-lg">
                    <i class="fas fa-cog"></i>
                    <span class="ml-3 nav-text">Pengaturan</span>
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div id="content" class="content-shifted main-content">
        <div class="p-6">
            <!-- Header dan Tombol Tambah -->
            <div class="mb-6 flex justify-between items-center">
                <a href="tambah_santri.php"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg inline-flex items-center">
                    + Tambah Data
                </a>
            </div>

            <!-- Filter dan Pencarian -->
            <div class="mb-6 flex justify-between items-center">
                <div class="flex items-center">
                    <span class="mr-2">Tampilkan</span>
                    <select class="border rounded px-2 py-1">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    <span class="ml-2">data</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2">Cari Santri:</span>
                    <input type="text" class="border rounded px-3 py-1 w-64" placeholder="Masukkan kata kunci...">
                </div>
            </div>

            <?php if ($result->num_rows > 0): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID Santri</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Alamat</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                $no = 1;
                                while ($row = $result->fetch_assoc()):
                                    ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $no++; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo $row["id"]; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php echo $row["nama_lengkap"]; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php echo $row["alamat_lengkap"]; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?php echo $row["email"] ?? "-"; ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                            <a href="edit.php?id=<?php echo $row['id']; ?>"
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Edit</a>
                                            <a href="hapus.php?id=<?php echo $row['id']; ?>"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <p class="text-gray-500">Tidak ada data yang ditemukan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Toggle Sidebar
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleButton = document.getElementById('toggleSidebar');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-collapsed');
            sidebar.classList.toggle('sidebar-expanded');
            content.classList.toggle('content-shifted');
            content.classList.toggle('content-collapsed');
        });

        // Pencarian
        document.querySelector('input[type="text"]').addEventListener('keyup', function () {
            let searchText = this.value.toLowerCase();
            let tableRows = document.querySelectorAll('tbody tr');

            tableRows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchText) ? '' : 'none';
            });
        });

        // Jumlah data yang ditampilkan
        document.querySelector('select').addEventListener('change', function () {
            let limit = parseInt(this.value);
            let tableRows = document.querySelectorAll('tbody tr');

            tableRows.forEach((row, index) => {
                row.style.display = index < limit ? '' : 'none';
            });
        });
    </script>
</body>

</html>

<?php
$conn->close();
?>