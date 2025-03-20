<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "ppdb_pondok");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data calon santri
$sql = "SELECT * FROM calon_santri";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <button id="btnSantri" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Lihat Calon Santri</button>
    </div>

    <!-- Modal -->
    <div id="modalSantri" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-3/4">
            <h2 class="text-2xl font-bold mb-4">Data Calon Santri</h2>
            <table class="w-full border-collapse border border-gray-400">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Tanggal Pendaftaran</th>
                        <th class="border px-4 py-2">Nama Lengkap</th>
                        <th class="border px-4 py-2">Tempat, Tanggal Lahir</th>
                        <th class="border px-4 py-2">Alamat Lengkap</th>
                        <th class="border px-4 py-2">Jenis Kelamin</th>
                        <th class="border px-4 py-2">Sekolah Terakhir</th>
                        <th class="border px-4 py-2">Pernah Mondok</th>
                        <th class="border px-4 py-2">Nama Ayah</th>
                        <th class="border px-4 py-2">Nama Ibu</th>
                        <th class="border px-4 py-2">No HP Ortu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='border'>";
                            echo "<td class='border px-4 py-2 text-center'>" . $no++ . "</td>";
                            echo "<td class='border px-4 py-2'>" . $row['tanggal_pendaftaran'] . "</td>";
                            echo "<td class='border px-4 py-2'>" . $row['nama_lengkap'] . "</td>";
                            echo "<td class='border px-4 py-2'>" . $row['tempat_lahir'] . ", " . $row['tanggal_lahir'] . "</td>";
                            echo "<td class='border px-4 py-2'>" . $row['alamat_lengkap'] . "</td>";
                            echo "<td class='border px-4 py-2 text-center'>" . $row['jenis_kelamin'] . "</td>";
                            echo "<td class='border px-4 py-2'>" . $row['sekolah_terakhir'] . "</td>";
                            echo "<td class='border px-4 py-2 text-center'>" . $row['pernah_mondok'] . "</td>";
                            echo "<td class='border px-4 py-2'>" . $row['nama_ayah'] . "</td>";
                            echo "<td class='border px-4 py-2'>" . $row['nama_ibu'] . "</td>";
                            echo "<td class='border px-4 py-2 text-center'>" . $row['no_hp_ortu'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11' class='border px-4 py-2 text-center text-red-500'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button id="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#btnSantri").click(function () {
                $("#modalSantri").show();
            });
            $("#closeModal").click(function () {
                $("#modalSantri").hide();
            });
        });
    </script>
</body>

</html>