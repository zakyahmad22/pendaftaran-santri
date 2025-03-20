<!-- tampilan data calon santri start -->
<?php
include '../sidebar.php';
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
        <header class="bg-white shadow p-4 flex justify-between items-center">
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

        <div class="p-6">
            <?php if ($result->num_rows > 0): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Tanggal Pendaftaran</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Nama Lengkap</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Tempat, Tanggal Lahir</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Jenis Kelamin</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Sekolah Terakhir</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Pernah Mondok</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Nama Pondok Sebelumnya</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Alamat Pondok Sebelumnya</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Nama Ayah & Ibu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        TTL Ayah & Ibu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Pekerjaan Ayah & Ibu</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        No HP Orang Tua</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Alamat</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="dataTable">
                                <?php
                                $no = 1;
                                while ($row = $result->fetch_assoc()): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-500"><?php echo $no++; ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            <?php echo date('d/m/Y', strtotime($row["tanggal_pendaftaran"])); ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 nama">
                                            <?php echo $row["nama_lengkap"]; ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <?php echo $row["tempat_lahir"] . ", " . date('d/m/Y', strtotime($row["tanggal_lahir"])); ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo $row["jenis_kelamin"]; ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo $row["sekolah_terakhir"]; ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo $row["pernah_mondok"]; ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <?php echo $row["nama_pondok_sebelumnya"]; ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <?php echo $row["alamat_pondok_sebelumnya"]; ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <p>Ayah: <?php echo $row["nama_ayah"]; ?></p>
                                            <p>Ibu: <?php echo $row["nama_ibu"]; ?></p>
                                        </td>
                                        <td class="px-6 py-6 text-sm text-gray-900">
                                            <p>TTL Ayah:
                                                <?php echo $row["tempat_lahir_ayah"] . ", " . $row["tanggal_lahir_ayah"]; ?>
                                            </p>
                                            <p>TTL Ibu:
                                                <?php echo $row["tempat_lahir_ibu"] . ", " . $row["tanggal_lahir_ibu"]; ?>
                                            </p>
                                        </td>
                                        <td class="px-6 py-6 text-sm text-gray-900">
                                            <p>Pekerjaan Ayah:
                                                <?php echo $row["pekerjaan_ayah"]?>
                                            </p>
                                            <p>Pekerjaan Ibu:
                                                <?php echo $row["pekerjaan_ibu"]?>
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo $row["no_hp_ortu"]; ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?php echo $row["alamat_rumah"]; ?></td>
                                        <td class="px-6 py-4 flex space-x-2">
                                            <a href="edit_santri.php?id=<?php echo $row['id']; ?>"
                                                class='bg-primary text-white px-3 py-1 rounded-lg hover:opacity-80'>
                                                Edit
                                            </a>
                                            <a href="hapus_santri.php?id=<?php echo $row['id']; ?>"
                                                class='bg-red-500 text-white px-3 py-1 rounded-lg hover:opacity-80'
                                                onclick="return confirm('Yakin ingin menghapus?');">
                                                Hapus
                                            </a>
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
        document.getElementById("searchInput").addEventListener("keyup", function () {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll("#dataTable tr");

            rows.forEach(row => {
                let rowData = row.innerText.toLowerCase(); // Ambil teks dari seluruh baris
                row.style.display = rowData.includes(searchValue) ? "" : "none";
            });
        });

    </script>
</body>

</html>

<script src="dist/js/search.js"></script>

<?php
$conn->close();
?>
<!-- tampilan data calon santri end -->