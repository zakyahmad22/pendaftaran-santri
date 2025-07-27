<?php
require '../config.php'; // Sesuaikan dengan file koneksi database

// Ambil ID dari URL
$id = $_GET['id'] ?? '';

if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

// Ambil data santri berdasarkan ID
$query = $mysqli->prepare("SELECT * FROM calon_santri WHERE id = ?");
$query->bind_param("i", $id); // "i" untuk integer
$query->execute();
$result = $query->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "Data tidak ditemukan!";
    exit;
}

// Jika tombol Simpan ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal_pendaftaran = $_POST["tanggal_pendaftaran"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat_lengkap = $_POST["alamat_lengkap"];
    $tinggal_bersama = $_POST["tinggal_bersama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $sekolah_terakhir = $_POST["sekolah_terakhir"];
    $pernah_mondok = $_POST["pernah_mondok"];
    $nama_pondok_sebelumnya = $_POST["nama_pondok_sebelumnya"];
    $alamat_pondok_sebelumnya = $_POST["alamat_pondok_sebelumnya"];
    $nama_ayah = $_POST["nama_ayah"];
    $nama_ibu = $_POST["nama_ibu"];
    $tempat_lahir_ayah = $_POST["tempat_lahir_ayah"];
    $tanggal_lahir_ayah = $_POST["tanggal_lahir_ayah"];
    $tempat_lahir_ibu = $_POST["tempat_lahir_ibu"];
    $tanggal_lahir_ibu = $_POST["tanggal_lahir_ibu"];
    $pekerjaan_ayah = $_POST["pekerjaan_ayah"];
    $pekerjaan_ibu = $_POST["pekerjaan_ibu"];
    $penghasilan_ayah = $_POST["penghasilan_ayah"];
    $penghasilan_ibu = $_POST["penghasilan_ibu"];
    $alamat_rumah = $_POST["alamat_rumah"];
    $no_hp_ortu = $_POST["no_hp_ortu"];

    $update = $mysqli->query("UPDATE calon_santri SET 
    tanggal_pendaftaran = '$tanggal_pendaftaran',
    nama_lengkap = '$nama_lengkap',
    tempat_lahir = '$tempat_lahir',
    tanggal_lahir = '$tanggal_lahir',
    alamat_lengkap = '$alamat_lengkap',
    tinggal_bersama = '$tinggal_bersama',
    jenis_kelamin = '$jenis_kelamin',
    sekolah_terakhir = '$sekolah_terakhir',
    pernah_mondok = '$pernah_mondok',
    nama_pondok_sebelumnya = '$nama_pondok_sebelumnya',
    alamat_pondok_sebelumnya = '$alamat_pondok_sebelumnya',
    nama_ayah = '$nama_ayah',
    nama_ibu = '$nama_ibu',
    tempat_lahir_ayah = '$tempat_lahir_ayah',
    tanggal_lahir_ayah = '$tanggal_lahir_ayah',
    tempat_lahir_ibu = '$tempat_lahir_ibu',
    tanggal_lahir_ibu = '$tanggal_lahir_ibu',
    pekerjaan_ayah = '$pekerjaan_ayah',
    pekerjaan_ibu = '$pekerjaan_ibu',
    penghasilan_ayah = '$penghasilan_ayah',
    penghasilan_ibu = '$penghasilan_ibu',
    alamat_rumah = '$alamat_rumah',
    no_hp_ortu = '$no_hp_ortu'
    WHERE id = '$id'
");


    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='calon_santri.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
include 'sidebar.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../dist/css/final.css" rel="stylesheet" />

</head>

<body class="bg-gray-100">

    <section id="edit_santri" class="bg-slate-100 w-full dark:bg-dark">

        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Edit Data Santri</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <div class="ml-64 pt-20 p-6">
            
                <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
                    <h2 class="text-2xl font-bold text-gray-700 mb-4">Data Santri</h2>
                    <form method="POST">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                            <input type="date" name="tanggal_pendaftaran"
                                value="<?php echo $row['tanggal_pendaftaran']; ?>" required
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" required
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                            <input type="text" name="alamat_lengkap" value="<?php echo $row['alamat_lengkap']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tinggal Bersama</label>
                            <select name="tinggal_bersama" required class="w-full p-2 border rounded">
                                <option value="Ayah dan Ibu" <?php if ($row['tinggal_bersama'] == "Ayah dan Ibu")
                                    echo "selected"; ?>>
                                    Ayah dan Ibu</option>
                                <option value="Ayah" <?php if ($row['tinggal_bersama'] == "Ayah")
                                    echo "selected"; ?>>Ayah</option>
                                <option value="Ibu" <?php if ($row['tinggal_bersama'] == "Ibu")
                                    echo "selected"; ?>>Ibu</option>
                                <option value="Sendiri" <?php if ($row['tinggal_bersama'] == "Sendiri")
                                    echo "selected"; ?>>Sendiri
                                </option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" required class="w-full p-2 border rounded">
                                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == "Laki-laki")
                                    echo "selected"; ?>>
                                    Laki-laki</option>
                                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == "Perempuan")
                                    echo "selected"; ?>>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Sekolah Terakhir</label>
                            <input type="text" name="sekolah_terakhir" value="<?php echo $row['sekolah_terakhir']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Pernah Mondok?</label>
                            <select name="pernah_mondok" required class="w-full p-2 border rounded">
                                <option value="Ya" <?php if ($row['pernah_mondok'] == "Ya")
                                    echo "selected"; ?>>Ya</option>
                                <option value="Tidak" <?php if ($row['pernah_mondok'] == "Tidak")
                                    echo "selected"; ?>>Tidak</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Pondok Sebelumnya</label>
                            <input type="text" name="nama_pondok_sebelumnya"
                                value="<?php echo $row['nama_pondok_sebelumnya']; ?>" class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Alamat Pondok Sebelumnya</label>
                            <input type="text" name="alamat_pondok_sebelumnya"
                                value="<?php echo $row['alamat_pondok_sebelumnya']; ?>"
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                            <input type="text" name="nama_ayah" value="<?php echo $row['nama_ayah']; ?>" required
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                            <input type="text" name="nama_ibu" value="<?php echo $row['nama_ibu']; ?>" required
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tempat Lahir Ayah</label>
                            <input type="text" name="tempat_lahir_ayah" value="<?php echo $row['tempat_lahir_ayah']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir Ayah</label>
                            <input type="date" name="tanggal_lahir_ayah"
                                value="<?php echo $row['tanggal_lahir_ayah']; ?>" required
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tempat Lahir Ibu</label>
                            <input type="text" name="tempat_lahir_ibu" value="<?php echo $row['tempat_lahir_ibu']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir Ibu</label>
                            <input type="date" name="tanggal_lahir_ibu" value="<?php echo $row['tanggal_lahir_ibu']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" value="<?php echo $row['pekerjaan_ayah']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" value="<?php echo $row['pekerjaan_ibu']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Penghasilan Ayah</label>
                            <input type="text" name="penghasilan_ayah" value="<?php echo $row['penghasilan_ayah']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Penghasilan Ibu</label>
                            <input type="text" name="penghasilan_ibu" value="<?php echo $row['penghasilan_ibu']; ?>"
                                required class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Alamat Rumah</label>
                            <input type="text" name="alamat_rumah" value="<?php echo $row['alamat_rumah']; ?>" required
                                class="w-full p-2 border rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">No HP Orang Tua</label>
                            <input type="text" name="no_hp_ortu" value="<?php echo $row['no_hp_ortu']; ?>" required
                                class="w-full p-2 border rounded">
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                class="bg-primary text-white px-4 py-2 rounded-lg hover:opacity-80">Simpan
                                Perubahan</button>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <a href="export_santri_pdf.php?id=<?php echo $id; ?>" target="_blank"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Cetak PDF
                            </a>
                            <a href="export_santri_excel.php?id=<?php echo $id; ?>" target="_blank"
                                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                Cetak Excel
                            </a>
                        </div>

                    </form>
                </div>
            
    </section>
    </section>

    <!-- Script Sidebar Toggle -->
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

</html>