<?php

session_start();
include 'config.php';

// fungsi cek sesi
if (isset($_SESSION['sesi'])) {
    $header = "- Siswa Diterima";
    include 'header_admin.php';
}
?>

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

<body class="bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto">
        <?php if ($result->num_rows > 0): ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="px-6 py-4 bg-green-600">
                    <h2 class="text-2xl font-bold text-white">Data Calon Santri</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Pendaftaran</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Lengkap</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Info Pribadi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Riwayat Pendidikan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Data Orang Tua</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kontak</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo date('d/m/Y', strtotime($row["tanggal_pendaftaran"])); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo $row["nama_lengkap"]; ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            <p>Tempat Lahir: <?php echo $row["tempat_lahir"]; ?></p>
                                            <p>Tanggal Lahir: <?php echo date('d/m/Y', strtotime($row["tanggal_lahir"])); ?></p>
                                            <p>Jenis Kelamin: <?php echo $row["jenis_kelamin"]; ?></p>
                                            <p>Tinggal Bersama: <?php echo $row["tinggal_bersama"]; ?></p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            <p>Sekolah: <?php echo $row["sekolah_terakhir"]; ?></p>
                                            <?php if ($row["pernah_mondok"] == "Ya"): ?>
                                                <p class="mt-2 text-green-600">Pernah Mondok di:</p>
                                                <p><?php echo $row["nama_pondok_sebelumnya"]; ?></p>
                                                <p class="text-sm text-gray-500"><?php echo $row["alamat_pondok_sebelumnya"]; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            <div class="mb-2">
                                                <p class="font-medium">Ayah:</p>
                                                <p><?php echo $row["nama_ayah"]; ?></p>
                                                <p class="text-gray-500"><?php echo $row["pekerjaan_ayah"]; ?></p>
                                                <p class="text-gray-500 text-xs">Penghasilan:
                                                    <?php echo $row["penghasilan_ayah"]; ?>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="font-medium">Ibu:</p>
                                                <p><?php echo $row["nama_ibu"]; ?></p>
                                                <p class="text-gray-500"><?php echo $row["pekerjaan_ibu"]; ?></p>
                                                <p class="text-gray-500 text-xs">Penghasilan:
                                                    <?php echo $row["penghasilan_ayah"]; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            <p class="font-medium">Alamat:</p>
                                            <p class="text-gray-500"><?php echo $row["alamat_rumah"]; ?></p>
                                            <p class="mt-2 font-medium">No. HP:</p>
                                            <p class="text-gray-500"><?php echo $row["no_hp_ortu"]; ?></p>
                                        </div>
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
</body>

</html>

<?php
$conn->close();
?>