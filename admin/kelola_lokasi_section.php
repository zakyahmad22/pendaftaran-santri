<?php
include '../config.php';
include 'sidebar.php';

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
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="bg-gray-100 min-h-screen">

    <section id="kelola_kontak" class="bg-slate-100 w-full dark:bg-dark">
        <!-- Header disamakan -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Lokasi</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <!-- Konten disamakan -->
        <div class="ml-64 pt-20 bg-white rounded-lg shadow-lg dark:bg-slate-800 p-6">
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
                <div class="text-left">
                    <button type="submit" name="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </section>
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