<?php
session_start();
include '../config.php';
// include 'admin_header.php'; // pastikan ini memuat Tailwind & autentikasi admin

// Ambil data pengasuh (1 baris)
$result = $mysqli->query("SELECT * FROM pengasuh LIMIT 1");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_section = $_POST['judul_section'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $kutipan = $_POST['kutipan'];

    // Upload foto jika ada
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $target = "../dist/img/" . $foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $target);
        $mysqli->query("UPDATE pengasuh SET foto='$foto'");
    }

    $mysqli->query("UPDATE pengasuh SET judul_section='$judul_section', nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi', visi='$visi', misi='$misi', kutipan='$kutipan'");

    $_SESSION['berhasil'] = 'Data berhasil diperbarui!';
    header("Location: kelola_pengasuh.php");
    exit;
}
include 'sidebar.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen p-6">
    <section id="kelola_pengasuh" class="bg-slate-100 min-h-screen w-full dark:bg-dark">
        <!-- Header disamakan -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Pengasuh</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <!-- Konten -->
        <div class="ml-64 pt-20 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <div class="bg-white dark:bg-slate-800 shadow-md rounded-lg p-6">
                <h1 class="text-xl font-semibold mb-6 text-dark dark:text-white">Formulir Data Pengasuh</h1>

                <form action="" method="POST" enctype="multipart/form-data" class="space-y-5">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium mb-1 text-gray-700 dark:text-white">Judul Section</label>
                            <input type="text" name="judul_section"
                                value="<?= htmlspecialchars($data['judul_section']) ?>"
                                class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white">
                        </div>
                        <div>
                            <label class="block font-medium mb-1 text-gray-700 dark:text-white">Nama Pengasuh</label>
                            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>"
                                class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium mb-1 text-gray-700 dark:text-white">Jabatan</label>
                            <input type="text" name="jabatan" value="<?= htmlspecialchars($data['jabatan']) ?>"
                                class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white">
                        </div>
                        <div>
                            <label class="block font-medium mb-1 text-gray-700 dark:text-white">Kutipan</label>
                            <textarea name="kutipan" rows="2"
                                class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white"><?= htmlspecialchars($data['kutipan']) ?></textarea>
                        </div>
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-gray-700 dark:text-white">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                            class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium mb-1 text-gray-700 dark:text-white">Visi</label>
                            <textarea name="visi" rows="3"
                                class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white"><?= htmlspecialchars($data['visi']) ?></textarea>
                        </div>
                        <div>
                            <label class="block font-medium mb-1 text-gray-700 dark:text-white">Misi</label>
                            <textarea name="misi" rows="3"
                                class="w-full p-3 rounded-lg bg-slate-100 dark:bg-slate-700 text-dark dark:text-white"><?= htmlspecialchars($data['misi']) ?></textarea>
                        </div>
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-gray-700 dark:text-white">Foto Pengasuh
                            (Opsional)</label>
                        <input type="file" name="foto"
                            class="w-full p-2 border border-gray-300 rounded-lg bg-white dark:bg-slate-700 text-dark dark:text-white">
                        <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto.</p>
                        <?php if ($data['foto']): ?>
                            <img src="../dist/img/<?= $data['foto'] ?>" alt="Foto Pengasuh"
                                class="w-24 mt-3 rounded-full shadow">
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
            const mainContent = document.querySelector('#kelola_pengasuh > div');
            const header = document.querySelector('#kelola_pengasuh > header');

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