<?php
include '../config.php';
include '../sidebar.php';

// Gunakan $mysqli sesuai file config.php
$query = $mysqli->query("SELECT * FROM falsafah LIMIT 1");
$data = $query->fetch_assoc();

// Proses update jika form disubmit
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <section id="kelola_hero_section" class="bg-slate-100 w-full dark:bg-dark">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Tentang Kami</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>
        <div class="max-w-4xl mx-auto mt-10 p-8 bg-white rounded shadow">
            <h1 class="text-2xl font-bold mb-6">Kelola Falsafah Pondok</h1>

            <form action="" method="POST" class="space-y-6">
                <!-- Section Header -->
                <div>
                    <label class="block font-semibold">Judul Section</label>
                    <input type="text" name="judul_section" value="<?= htmlspecialchars($data['judul_section']) ?>"
                        class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block font-semibold">Deskripsi Section</label>
                    <textarea name="deskripsi_section" class="w-full p-2 border rounded" rows="3"
                        required><?= htmlspecialchars($data['deskripsi_section']) ?></textarea>
                </div>

                <hr class="my-4 border-t">

                <!-- Kolom 1 -->
                <h2 class="text-lg font-bold">Kolom 1</h2>
                <input type="text" name="judul1" value="<?= htmlspecialchars($data['judul1']) ?>"
                    class="w-full p-2 border rounded mb-2" placeholder="Judul 1" required>
                <textarea name="isi1" class="w-full p-2 border rounded mb-2" rows="3" placeholder="Isi 1"
                    required><?= htmlspecialchars($data['isi1']) ?></textarea>
                <input type="text" name="link1" value="<?= htmlspecialchars($data['link1']) ?>"
                    class="w-full p-2 border rounded mb-4" placeholder="Link 1" required>

                <!-- Kolom 2 -->
                <h2 class="text-lg font-bold">Kolom 2</h2>
                <input type="text" name="judul2" value="<?= htmlspecialchars($data['judul2']) ?>"
                    class="w-full p-2 border rounded mb-2" placeholder="Judul 2" required>
                <textarea name="isi2" class="w-full p-2 border rounded mb-2" rows="3" placeholder="Isi 2"
                    required><?= htmlspecialchars($data['isi2']) ?></textarea>
                <input type="text" name="link2" value="<?= htmlspecialchars($data['link2']) ?>"
                    class="w-full p-2 border rounded mb-4" placeholder="Link 2" required>

                <!-- Kolom 3 -->
                <h2 class="text-lg font-bold">Kolom 3</h2>
                <input type="text" name="judul3" value="<?= htmlspecialchars($data['judul3']) ?>"
                    class="w-full p-2 border rounded mb-2" placeholder="Judul 3" required>
                <textarea name="isi3" class="w-full p-2 border rounded mb-2" rows="3" placeholder="Isi 3"
                    required><?= htmlspecialchars($data['isi3']) ?></textarea>
                <input type="text" name="link3" value="<?= htmlspecialchars($data['link3']) ?>"
                    class="w-full p-2 border rounded mb-4" placeholder="Link 3" required>

                <button type="submit" name="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </section>
    <script>
        function toggleSidebar() {
            // Implement sidebar toggle functionality here
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>