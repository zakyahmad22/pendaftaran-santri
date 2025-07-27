<?php
include '../config.php';

// Tambah data
if (isset($_POST['tambah'])) {
    $title = $_POST['title'];
    $tanggal = $_POST['tanggal'];
    $stmt = $mysqli->prepare("INSERT INTO jadwal_pendaftaran (title, tanggal) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $tanggal);
    $stmt->execute();
    header("Location: kelola_jadwal_pendaftaran.php?status=berhasil");
    exit();
}

// Edit data
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $tanggal = $_POST['tanggal'];
    $stmt = $mysqli->prepare("UPDATE jadwal_pendaftaran SET title=?, tanggal=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $tanggal, $id);
    $stmt->execute();
    header("Location: kelola_jadwal_pendaftaran.php?status=berhasil");
    exit();
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $mysqli->prepare("DELETE FROM jadwal_pendaftaran WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: kelola_jadwal_pendaftaran.php?status=berhasil");
    exit();
}

$result = $mysqli->query("SELECT * FROM jadwal_pendaftaran ORDER BY id ASC");
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Jadwal Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen p-6">
    <section id="kelola_jadwal" class="bg-slate-100 min-h-screen w-full dark:bg-dark">
        <!-- Header -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Jadwal Pendaftaran</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>

        </header>

        <!-- Konten -->
        <div class="ml-64 pt-20 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">

            <!-- Notifikasi Modal -->
            <?php if (isset($_GET['status'])): ?>
                <div id="statusModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div
                        class="bg-white dark:bg-slate-800 p-6 rounded shadow-lg max-w-sm w-full text-center border dark:border-slate-600">
                        <h2 class="text-lg font-bold mb-2 text-dark dark:text-white">
                            <?= $_GET['status'] === 'berhasil' ? 'Berhasil!' : 'Gagal!' ?>
                        </h2>
                        <p class="text-sm text-secondary dark:text-gray-300 mb-4">
                            <?= $_GET['status'] === 'berhasil' ? 'Data berhasil diproses.' : 'Terjadi kesalahan saat memproses data.' ?>
                        </p>
                        <div class="mt-6">
                            <button onclick="closeModal()"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                                Oke
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Form Tambah -->
            <form method="POST" class="mb-6 space-y-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="title" placeholder="Judul Jadwal" required
                        class="p-2 rounded bg-slate-100 dark:bg-slate-700 text-dark dark:text-white">
                    <input type="text" name="tanggal" placeholder="Tanggal (Contoh: 1 Juli - 5 Juli)" required
                        class="p-2 rounded bg-slate-100 dark:bg-slate-700 text-dark dark:text-white">
                </div>
                <button type="submit" name="tambah"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Tambah</button>
            </form>

            <!-- List Jadwal -->
            <ul class="space-y-4">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="bg-slate-50 dark:bg-slate-700 p-4 rounded shadow">
                        <form method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-2 items-center">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>"
                                class="col-span-2 p-2 rounded bg-white dark:bg-slate-800 text-dark dark:text-white">
                            <input type="text" name="tanggal" value="<?= htmlspecialchars($row['tanggal']) ?>"
                                class="col-span-2 p-2 rounded bg-white dark:bg-slate-800 text-dark dark:text-white">
                            <div class="flex gap-2">
                                <button type="submit" name="edit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">Simpan</button>
                                <button type="button" onclick="showDeleteModal(<?= $row['id'] ?>)"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Hapus</button>
                            </div>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>

            <!-- Modal Konfirmasi Hapus -->
            <div id="deleteModal"
                class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div
                    class="bg-white dark:bg-slate-800 p-6 rounded shadow-lg max-w-sm w-full text-center border dark:border-slate-600">
                    <h2 class="text-lg font-bold mb-2 text-dark dark:text-white">Konfirmasi Hapus</h2>
                    <p class="text-sm text-secondary dark:text-gray-300 mb-4">
                        Apakah Anda yakin ingin menghapus data ini?
                    </p>
                    <div class="flex justify-center gap-4">
                        <button onclick="confirmDelete()"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Hapus</button>
                        <button onclick="closeDeleteModal()"
                            class="bg-gray-300 hover:bg-gray-400 text-black dark:text-white dark:bg-slate-600 px-4 py-2 rounded">Batal</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('#kelola_jadwal > div');
            const header = document.querySelector('#kelola_jadwal > header');

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

        let deleteId = null;

        function showDeleteModal(id) {
            deleteId = id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            deleteId = null;
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function confirmDelete() {
            if (deleteId !== null) {
                window.location.href = `?hapus=${deleteId}`;
            }
        }

        function closeModal() {
            const modal = document.getElementById('statusModal');
            if (modal) modal.classList.add('hidden');
            history.replaceState(null, '', 'kelola_jadwal_pendaftaran.php');
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (document.getElementById('statusModal')) {
                setTimeout(() => {
                    closeModal();
                }, 3000);
            }
        });
    </script>
</body>

</html>