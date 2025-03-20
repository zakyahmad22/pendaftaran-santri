
<?php
// Inisialisasi koneksi database
$db = new mysqli('localhost', 'root', '', 'ppdb_pondok');

// Periksa koneksi
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Query untuk calon santri
$query = "SELECT * FROM calon_santri";
$result = $db->query($query);

// Periksa apakah query berhasil
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Nama: " . $row["nama_lengkap"] . " - Tempat Lahir: " . $row["tempat_lahir"] .
                " - Tanggal Lahir: " . $row["tanggal_lahir"] . " - Alamat: " . $row["alamat_lengkap"] .
                " - Jenis Kelamin: " . $row["jenis_kelamin"] . "<br>";
        }
    } else {
        echo "Tidak ada data calon santri.";
    }
} else {
    echo "Error: " . $db->error;
}
?>

<?php
// include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Calon Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    

<div class="max-w-6xl mx-auto p-6">
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        <h3 class="text-2xl font-bold text-center bg-gradient-to-r from-blue-600 to-blue-400 text-white py-4">
            📋 Data Seleksi Calon Santri
        </h3>
        <div class="p-6 overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-blue-500 text-white text-left">
                        <th class="p-3">NO</th>
                        <th class="p-3">ID</th>
                        <th class="p-3">NAMA</th>
                        <th class="p-3">TEMPAT LAHIR</th>
                        <th class="p-3">TANGGAL LAHIR</th>
                        <th class="p-3">ALAMAT</th>
                        <th class="p-3 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-gray-50">
                    <?php
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr class="hover:bg-gray-100 transition duration-300">
                            <td class="p-4 text-gray-700"><?= $no++; ?></td>
                            <td class="p-4 text-gray-700"><?= $row['id']; ?></td>
                            <td class="p-4 text-gray-700 font-semibold"><?= $row['nama_lengkap']; ?></td>
                            <td class="p-4 text-gray-700"><?= $row['tempat_lahir']; ?></td>
                            <td class="p-4 text-gray-700"><?= $row['tanggal_lahir']; ?></td>
                            <td class="p-4 text-gray-700"><?= $row['alamat_lengkap']; ?></td>
                            <td class="p-4 text-center space-x-2">
                                <a href="detail_santri.php?id=<?= $row['id']; ?>"
                                    class="px-3 py-1 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
                                    🔍 Detail
                                </a>
                                <a href="edit_santri.php?id=<?= $row['id']; ?>"
                                    class="px-3 py-1 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">
                                    ✏️ Edit
                                </a>
                                <a href="hapus_santri.php?id=<?= $row['id']; ?>"
                                    class="px-3 py-1 text-white bg-red-500 rounded-lg hover:bg-red-600 transition"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    🗑️ Hapus
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// include 'footer.php';
// echo "<script>
//         alert('Silahkan Login Terlebih Dahulu!');
//         window.location = 'login.php';
//     </script>";

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal_pendaftaran = $db->real_escape_string($_POST['tanggal_pendaftaran']);
    $nama_lengkap = $db->real_escape_string($_POST['nama_lengkap']);
    $tempat_lahir = $db->real_escape_string($_POST['tempat_lahir']);
    $tanggal_lahir = $db->real_escape_string($_POST['tanggal_lahir']);
    $alamat_lengkap = $db->real_escape_string($_POST['alamat_lengkap']);
    $tinggal_bersama = $db->real_escape_string($_POST['tinggal_bersama']);
    $jenis_kelamin = $db->real_escape_string($_POST['jenis_kelamin']);
    $sekolah_terakhir = $db->real_escape_string($_POST['sekolah_terakhir']);
    $pernah_mondok = $db->real_escape_string($_POST['pernah_mondok']);
    $nama_pondok_sebelumnya = !empty($_POST['nama_pondok_sebelumnya']) ? "'" . $db->real_escape_string($_POST['nama_pondok_sebelumnya']) . "'" : "NULL";
    $alamat_pondok_sebelumnya = !empty($_POST['alamat_pondok_sebelumnya']) ? "'" . $db->real_escape_string($_POST['alamat_pondok_sebelumnya']) . "'" : "NULL";
    $nama_ayah = $db->real_escape_string($_POST['nama_ayah']);
    $nama_ibu = $db->real_escape_string($_POST['nama_ibu']);
    $tempat_lahir_ayah = $db->real_escape_string($_POST['tempat_lahir_ayah']);
    $tanggal_lahir_ayah = $db->real_escape_string($_POST['tanggal_lahir_ayah']);
    $tempat_lahir_ibu = $db->real_escape_string($_POST['tempat_lahir_ibu']);
    $tanggal_lahir_ibu = $db->real_escape_string($_POST['tanggal_lahir_ibu']);
    $pekerjaan_ayah = $db->real_escape_string($_POST['pekerjaan_ayah']);
    $pekerjaan_ibu = $db->real_escape_string($_POST['pekerjaan_ibu']);
    $penghasilan_ayah = $db->real_escape_string($_POST['penghasilan_ayah']);
    $penghasilan_ibu = $db->real_escape_string($_POST['penghasilan_ibu']);
    $alamat_rumah = $db->real_escape_string($_POST['alamat_rumah']);
    $no_hp_ortu = $db->real_escape_string($_POST['no_hp_ortu']);

    $sql = "INSERT INTO calon_santri (
        tanggal_pendaftaran, nama_lengkap, tempat_lahir, tanggal_lahir, alamat_lengkap, 
        tinggal_bersama, jenis_kelamin, sekolah_terakhir, pernah_mondok, nama_pondok_sebelumnya, 
        alamat_pondok_sebelumnya, nama_ayah, nama_ibu, tempat_lahir_ayah, tanggal_lahir_ayah, 
        tempat_lahir_ibu, tanggal_lahir_ibu, pekerjaan_ayah, pekerjaan_ibu, penghasilan_ayah, 
        penghasilan_ibu, alamat_rumah, no_hp_ortu
    ) VALUES (
        '$tanggal_pendaftaran', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$alamat_lengkap', 
        '$tinggal_bersama', '$jenis_kelamin', '$sekolah_terakhir', '$pernah_mondok', 
        $nama_pondok_sebelumnya, $alamat_pondok_sebelumnya, 
        '$nama_ayah', '$nama_ibu', '$tempat_lahir_ayah', '$tanggal_lahir_ayah', 
        '$tempat_lahir_ibu', '$tanggal_lahir_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu', 
        '$penghasilan_ayah', '$penghasilan_ibu', '$alamat_rumah', '$no_hp_ortu'
    )";

    if ($db->query($sql) === TRUE) {
        echo "<script>
                alert('Pendaftaran berhasil!');
                window.location.href = 'form_pendaftaran.php';
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

// Tutup koneksi setelah semua query selesai
$db->close();
?>

</tbody>
</table>
</div>
</div>
</div>

</html>
</body>
