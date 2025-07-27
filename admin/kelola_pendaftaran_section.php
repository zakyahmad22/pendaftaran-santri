<?php
include '../config.php';
include 'sidebar.php';

// Ambil data dari tabel pendaftaran_section
$result = $mysqli->query("SELECT * FROM pendaftaran_section LIMIT 1");
$data = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $sub_judul = $mysqli->real_escape_string($_POST['sub_judul']);
    $judul = $mysqli->real_escape_string($_POST['judul']);
    $deskripsi = $mysqli->real_escape_string($_POST['deskripsi']);

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
    <title>Kelola Pendaftaran Section</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-50 min-h-screen p-6">

    <section id="kelola_pendaftaran_section" class="bg-slate-100 w-full dark:bg-dark">
        <!-- Header disamakan -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Pendaftaran Santri</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <!-- Konten disamakan dengan ml-64 dan pt-20 -->
        <div class="ml-64 pt-20 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <h1 class="text-xl font-semibold mb-6">Halaman Untuk Kelola Section Pendaftaran Santri</h1>
            <form method="POST" class="space-y-4">
                <div>
                    <label for="sub_judul" class="block font-medium mb-1">Sub Judul</label>
                    <input type="text" id="sub_judul" name="sub_judul"
                        value="<?= htmlspecialchars($data['sub_judul']); ?>" class="w-full border rounded px-3 py-2"
                        required>
                </div>

                <div>
                    <label for="judul" class="block font-medium mb-1">Judul</label>
                    <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($data['judul']); ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label for="deskripsi" class="block font-medium mb-1">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="5" class="w-full border rounded px-3 py-2"
                        required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
                </div>

                <button type="submit" name="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
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