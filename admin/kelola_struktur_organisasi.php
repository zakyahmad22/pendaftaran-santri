<?php
session_start();
include '../config.php';

// Ambil data struktur organisasi
$result = $mysqli->query("SELECT * FROM struktur_organisasi LIMIT 1");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Upload gambar jika ada
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = uniqid() . '_' . $_FILES['gambar']['name'];
        $target = "../dist/img/" . $gambar;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
    } else {
        $gambar = $data['gambar'] ?? '';
    }

    if ($data) {
        $stmt = $mysqli->prepare("UPDATE struktur_organisasi SET judul=?, deskripsi=?, gambar=? WHERE id=?");
        $stmt->bind_param("sssi", $judul, $deskripsi, $gambar, $data['id']);
    } else {
        $stmt = $mysqli->prepare("INSERT INTO struktur_organisasi (judul, deskripsi, gambar) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $judul, $deskripsi, $gambar);
    }

    $stmt->execute();
    $_SESSION['berhasil'] = 'Data struktur organisasi berhasil diperbarui!';
    header("Location: kelola_struktur_organisasi.php");
    exit;

}

include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Struktur Organisasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen p-6">
    <section id="kelola_struktur" class="bg-slate-100 min-h-screen w-full dark:bg-dark">
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Struktur Organisasi</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>

        </header>

        <div class="ml-64 pt-20 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <div class="bg-white dark:bg-slate-800 shadow-md rounded-lg p-6">
                <h1 class="text-xl font-semibold mb-6 text-dark dark:text-white">Formulir Struktur Organisasi</h1>

                <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
                    <div>
                        <label class="block font-medium mb-1 text-gray-700 dark:text-white">Judul</label>
                        <input type="text" name="judul" value="<?= htmlspecialchars($data['judul'] ?? '') ?>"
                            class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white"
                            required>
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-gray-700 dark:text-white">Deskripsi</label>
                        <textarea name="deskripsi" rows="5"
                            class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white"
                            required><?= htmlspecialchars($data['deskripsi'] ?? '') ?></textarea>
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-gray-700 dark:text-white">Gambar (Opsional)</label>
                        <input type="file" name="gambar"
                            class="w-full p-2 border border-gray-300 rounded-lg bg-white dark:bg-slate-700 text-dark dark:text-white">
                        <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                        <?php if (!empty($data['gambar'])): ?>
                            <img src="../dist/img/<?= $data['gambar'] ?>" alt="Gambar Struktur"
                                class="w-32 mt-3 rounded shadow">
                        <?php endif; ?>
                    </div>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- modal berhasil -->
    <?php if (isset($_SESSION['berhasil'])): ?>
        <div id="modalBerhasil" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg w-96 p-6 text-center">
                <h2 class="text-xl font-bold mb-4 text-green-600">Berhasil!</h2>
                <p class="mb-4"><?= $_SESSION['berhasil'] ?></p>
                <button onclick="document.getElementById('modalBerhasil').classList.add('hidden')"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mx-auto block">
                    Tutup
                </button>
            </div>
        </div>
        <?php unset($_SESSION['berhasil']); endif; ?>


    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('#kelola_struktur > div');
            const header = document.querySelector('#kelola_struktur > header');

            if (sidebar.classList.contains('-ml-64')) {
                sidebar.classList.remove('-ml-64');
                mainContent.classList.add('ml-64');
                header.classList.add('ml-64');
            } else {
                sidebar.classList.add('-ml-64');
                mainContent.classList.remove('ml-64');
                header.classList.remove('ml-64');
            }
        }
    </script>
</body>

</html>