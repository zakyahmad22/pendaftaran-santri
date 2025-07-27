<?php
include '../config.php';
include 'sidebar.php';

$query = $mysqli->query("SELECT * FROM falsafah LIMIT 1");
$data = $query->fetch_assoc();

if (isset($_POST['submit'])) {
    $judul_section = $_POST['judul_section'];
    $deskripsi_section = $_POST['deskripsi_section'];

    $judul1 = $_POST['judul1'];
    $isi1 = $_POST['isi1'];
    $link1 = $_POST['link1'];

    $judul2 = $_POST['judul2'];
    $isi2 = $_POST['isi2'];
    $link2 = $_POST['link2'];

    $judul3 = $_POST['judul3'];
    $isi3 = $_POST['isi3'];
    $link3 = $_POST['link3'];

    $update = $mysqli->query("UPDATE falsafah SET 
        judul_section = '$judul_section',
        deskripsi_section = '$deskripsi_section',
        judul1 = '$judul1', isi1 = '$isi1', link1 = '$link1',
        judul2 = '$judul2', isi2 = '$isi2', link2 = '$link2',
        judul3 = '$judul3', isi3 = '$isi3', link3 = '$link3'
        WHERE id = {$data['id']}
    ");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='kelola_falsafah.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Falsafah Pondok</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-50 min-h-screen p-6">
    <section id="kelola_falsafah" class="bg-slate-100 w-full dark:bg-dark">
        <!-- Header disamakan -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Falsafah Pondok</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <!-- Konten disamakan dengan ml-64 dan pt-20 -->
        <div class="ml-64 pt-20 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <h1 class="text-xl font-semibold mb-6">Formulir Falsafah Pondok</h1>

            <form action="" method="POST" class="space-y-4">
                <!-- Section Header -->
                <div>
                    <label class="block font-medium mb-1">Judul Section</label>
                    <input type="text" name="judul_section" value="<?= htmlspecialchars($data['judul_section']) ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Deskripsi Section</label>
                    <textarea name="deskripsi_section" rows="3" class="w-full border rounded px-3 py-2"
                        required><?= htmlspecialchars($data['deskripsi_section']) ?></textarea>
                </div>

                <hr class="my-4 border-t">

                <!-- Kolom 1 -->
                <h2 class="text-lg font-bold mt-6">Kolom 1</h2>
                <div>
                    <label class="block font-medium mb-1">Judul 1</label>
                    <input type="text" name="judul1" value="<?= htmlspecialchars($data['judul1']) ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Isi 1</label>
                    <textarea name="isi1" rows="3" class="w-full border rounded px-3 py-2"
                        required><?= htmlspecialchars($data['isi1']) ?></textarea>
                </div>
                <div>
                    <label class="block font-medium mb-1">Link 1</label>
                    <input type="text" name="link1" value="<?= htmlspecialchars($data['link1']) ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Kolom 2 -->
                <h2 class="text-lg font-bold mt-6">Kolom 2</h2>
                <div>
                    <label class="block font-medium mb-1">Judul 2</label>
                    <input type="text" name="judul2" value="<?= htmlspecialchars($data['judul2']) ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Isi 2</label>
                    <textarea name="isi2" rows="3" class="w-full border rounded px-3 py-2"
                        required><?= htmlspecialchars($data['isi2']) ?></textarea>
                </div>
                <div>
                    <label class="block font-medium mb-1">Link 2</label>
                    <input type="text" name="link2" value="<?= htmlspecialchars($data['link2']) ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <!-- Kolom 3 -->
                <h2 class="text-lg font-bold mt-6">Kolom 3</h2>
                <div>
                    <label class="block font-medium mb-1">Judul 3</label>
                    <input type="text" name="judul3" value="<?= htmlspecialchars($data['judul3']) ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-medium mb-1">Isi 3</label>
                    <textarea name="isi3" rows="3" class="w-full border rounded px-3 py-2"
                        required><?= htmlspecialchars($data['isi3']) ?></textarea>
                </div>
                <div>
                    <label class="block font-medium mb-1">Link 3</label>
                    <input type="text" name="link3" value="<?= htmlspecialchars($data['link3']) ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <button type="submit" name="submit"
                    class="mt-6 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
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