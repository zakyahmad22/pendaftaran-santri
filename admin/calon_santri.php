<!-- tampilan data calon santri start -->
<?php
include 'sidebar.php';
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
    <link href="../dist/css/final.css" rel="stylesheet" />

</head>

<body class="bg-gray-50 flex">

    <!-- Main Content -->
    <div class="flex-1">
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Data Daftar Santri</h2>
            <input type="text" id="searchInput" placeholder="Cari Nama..."
                class="p-2 border rounded-lg shadow-sm focus:ring focus:ring-gray-300">
        </header>

        <div class="ml-64 pt-20 p-6">
            <?php if ($result->num_rows > 0): ?>
                <div class="bg-gray-100 p-6 min-h-screen">
                    <div class="max-w-7xl mx-auto">
                        <h2 class="text-2xl font-bold text-gray-700 mb-4">Data Lengkap Pendaftaran Santri</h2>

                        <div class="bg-white rounded-xl shadow overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-200 text-gray-800 uppercase text-xs tracking-wider">
                                        <tr>
                                            <th class="px-6 py-3 text-left">No</th>
                                            <th class="px-6 py-3 text-left">Tanggal Pendaftaran</th>
                                            <th class="px-6 py-3 text-left">Nama Lengkap</th>
                                            <th class="px-6 py-3 text-left">Tempat, Tanggal Lahir</th>
                                            <th class="px-6 py-3 text-left">Jenis Kelamin</th>
                                            <th class="px-6 py-3 text-left">Sekolah Terakhir</th>
                                            <th class="px-6 py-3 text-left">Pernah Mondok</th>
                                            <th class="px-6 py-3 text-left">Nama Pondok Sebelumnya</th>
                                            <th class="px-6 py-3 text-left">Alamat Pondok Sebelumnya</th>
                                            <th class="px-6 py-3 text-left">Nama Ayah & Ibu</th>
                                            <th class="px-6 py-3 text-left">TTL Ayah & Ibu</th>
                                            <th class="px-6 py-3 text-left">Pekerjaan Ayah & Ibu</th>
                                            <th class="px-6 py-3 text-left">No HP Orang Tua</th>
                                            <th class="px-6 py-3 text-left">Alamat</th>
                                            <th class="px-6 py-3 text-left">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100" id="dataTable">
                                        <?php $no = 1;
                                        while ($row = $result->fetch_assoc()): ?>
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 text-gray-600"><?php echo $no++; ?></td>
                                                <td class="px-6 py-4 text-gray-600">
                                                    <?php echo date('d/m/Y', strtotime($row["tanggal_pendaftaran"])); ?>
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-800">
                                                    <?php echo $row["nama_lengkap"]; ?>
                                                </td>
                                                <td class="px-6 py-4 text-gray-700">
                                                    <?php echo $row["tempat_lahir"] . ", " . date('d/m/Y', strtotime($row["tanggal_lahir"])); ?>
                                                </td>
                                                <td class="px-6 py-4 text-gray-700"><?php echo $row["jenis_kelamin"]; ?></td>
                                                <td class="px-6 py-4 text-gray-700"><?php echo $row["sekolah_terakhir"]; ?></td>
                                                <td class="px-6 py-4 text-gray-700"><?php echo $row["pernah_mondok"]; ?></td>
                                                <td class="px-6 py-4 text-gray-700">
                                                    <?php echo $row["nama_pondok_sebelumnya"]; ?></td>
                                                <td class="px-6 py-4 text-gray-700">
                                                    <?php echo $row["alamat_pondok_sebelumnya"]; ?></td>
                                                <td class="px-6 py-4 text-gray-700">
                                                    <p>Ayah: <?= $row["nama_ayah"]; ?></p>
                                                    <p>Ibu: <?= $row["nama_ibu"]; ?></p>
                                                </td>
                                                <td class="px-6 py-4 text-gray-700">
                                                    <p>Ayah:
                                                        <?= $row["tempat_lahir_ayah"] . ", " . $row["tanggal_lahir_ayah"]; ?>
                                                    </p>
                                                    <p>Ibu: <?= $row["tempat_lahir_ibu"] . ", " . $row["tanggal_lahir_ibu"]; ?>
                                                    </p>
                                                </td>
                                                <td class="px-6 py-4 text-gray-700">
                                                    <p>Ayah: <?= $row["pekerjaan_ayah"]; ?></p>
                                                    <p>Ibu: <?= $row["pekerjaan_ibu"]; ?></p>
                                                </td>
                                                <td class="px-6 py-4 text-gray-700"><?= $row["no_hp_ortu"]; ?></td>
                                                <td class="px-6 py-4 text-gray-700"><?= $row["alamat_rumah"]; ?></td>
                                                <td class="px-6 py-4">
                                                    <div class="flex space-x-2">
                                                        <a href="edit_santri.php?id=<?= $row['id']; ?>"
                                                            class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition text-xs shadow">
                                                            Edit
                                                        </a>
                                                        <a href="hapus_santri.php?id=<?= $row['id']; ?>"
                                                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition text-xs shadow"
                                                            onclick="return confirm('Yakin ingin menghapus?');">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        document.getElementById("searchInput").addEventListener("keyup", function () {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll("#dataTable tr");

            rows.forEach(row => {
                let rowData = row.innerText.toLowerCase(); // Ambil teks dari seluruh baris
                row.style.display = rowData.includes(searchValue) ? "" : "none";
            });
        });

    </script>

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
<script src="dist/js/search.js"></script>

</html>