<?php
include '../config.php'; // Sudah benar, config ini mendefinisikan $mysqli
include '../sidebar.php'; // Sudah benar, ini untuk sidebar admin

// Ambil data dari tabel pendaftaran_section
$result = $mysqli->query("SELECT * FROM pendaftaran_section LIMIT 1");
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $sub_judul = $_POST['sub_judul'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Update data
    $update = $mysqli->query("UPDATE pendaftaran_section SET
    sub_judul = '$sub_judul',
    judul = '$judul',
    deskripsi = '$deskripsi'
    WHERE id = {$data['id']}
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='kelola_pendaftaran_section.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Pendaftaran Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Kelola Bagian Pendaftaran Santri</h1>

            <form method="POST" class="space-y-6">
                <div>
                    <label for="sub_judul" class="block font-medium text-gray-700 mb-1">Sub Judul</label>
                    <input type="text" id="sub_judul" name="sub_judul"
                        value="<?= htmlspecialchars($data['sub_judul']); ?>"
                        class="w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring focus:ring-blue-200"
                        required>
                </div>

                <div>
                    <label for="judul" class="block font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($data['judul']); ?>"
                        class="w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring focus:ring-blue-200"
                        required>
                </div>

                <div>
                    <label for="deskripsi" class="block font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="5"
                        class="w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring focus:ring-blue-200"
                        required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" name="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>