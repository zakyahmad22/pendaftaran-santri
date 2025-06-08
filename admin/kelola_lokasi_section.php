<?php
include '../config.php';
include '../sidebar.php';

$result = $mysqli->query("SELECT * FROM lokasi_section LIMIT 1");
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $judul_awal = $_POST['judul_awal'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link_maps = $_POST['link_maps'];

    if ($data) {
        // update
        $mysqli->query("UPDATE lokasi_section SET 
            judul_awal='$judul_awal', 
            judul='$judul', 
            deskripsi='$deskripsi', 
            link_maps='$link_maps' 
            WHERE id={$data['id']}");
    } else {
        // insert
        $mysqli->query("INSERT INTO lokasi_section 
            (judul_awal, judul, deskripsi, link_maps) 
            VALUES 
            ('$judul_awal', '$judul', '$deskripsi', '$link_maps')");
    }

    echo "<script>alert('Berhasil disimpan!'); window.location.href='kelola_lokasi_section.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Lokasi Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-xl shadow-lg p-8 max-w-3xl mx-auto">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Kelola Bagian Lokasi</h1>

            <form method="POST" class="space-y-6">
                <div>
                    <label class="block font-medium mb-1">Judul Awal (contoh: Lokasi)</label>
                    <input type="text" name="judul_awal" value="<?= htmlspecialchars($data['judul_awal'] ?? '') ?>"
                        class="w-full border border-gray-300 rounded-lg p-3">
                </div>
                <div>
                    <label class="block font-medium mb-1">Judul Akhir (contoh: Kami)</label>
                    <input type="text" name="judul" value="<?= htmlspecialchars($data['judul'] ?? '') ?>"
                        class="w-full border border-gray-300 rounded-lg p-3">
                </div>
                <div>
                    <label class="block font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="5"
                        class="w-full border border-gray-300 rounded-lg p-3"><?= htmlspecialchars($data['deskripsi'] ?? '') ?></textarea>
                </div>
                <div>
                    <label class="block font-medium mb-1">Link Google Maps (iframe `src`)</label>
                    <input type="text" name="link_maps" value="<?= htmlspecialchars($data['link_maps'] ?? '') ?>"
                        class="w-full border border-gray-300 rounded-lg p-3">
                </div>
                <div class="text-center">
                    <button type="submit" name="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>