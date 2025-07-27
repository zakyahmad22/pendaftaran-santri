<?php
session_start();
include '../config.php';

// Ambil atau simpan judul section
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan_judul'])) {
    $judul = $_POST['judul_section'] ?? '';
    $cek = $mysqli->query("SELECT id FROM galeri LIMIT 1");
    if ($cek->num_rows > 0) {
        $mysqli->query("UPDATE galeri SET judul_section='" . $mysqli->real_escape_string($judul) . "'");
    } else {
        $mysqli->query("INSERT INTO galeri (judul_section) VALUES ('" . $mysqli->real_escape_string($judul) . "')");
    }
    $_SESSION['status'] = ['success', 'Judul galeri berhasil diperbarui!'];
    header('Location: kelola_galeri.php');
    exit;
}

// Tambah galeri
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $deskripsi = $_POST['deskripsi'];
    $urutan = $_POST['urutan'] ?? 0;
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = uniqid() . '_' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../dist/img/' . $gambar);
        $stmt = $mysqli->prepare("INSERT INTO galeri (gambar, deskripsi, urutan) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $gambar, $deskripsi, $urutan);
        $stmt->execute();
        $_SESSION['status'] = ['success', 'Galeri berhasil ditambahkan!'];
    } else {
        $_SESSION['status'] = ['error', 'Gambar wajib diunggah.'];
    }
    header('Location: kelola_galeri.php');
    exit;
}

// Hapus galeri
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    $mysqli->query("DELETE FROM galeri WHERE id=$id");
    $_SESSION['status'] = ['success', 'Galeri berhasil dihapus!'];
    header('Location: kelola_galeri.php');
    exit;
}

// Edit galeri
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $deskripsi = $_POST['deskripsi'];
    $urutan = $_POST['urutan'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = uniqid() . '_' . $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../dist/img/' . $gambar);
        $stmt = $mysqli->prepare("UPDATE galeri SET gambar=?, deskripsi=?, urutan=? WHERE id=?");
        $stmt->bind_param("ssii", $gambar, $deskripsi, $urutan, $id);
    } else {
        $stmt = $mysqli->prepare("UPDATE galeri SET deskripsi=?, urutan=? WHERE id=?");
        $stmt->bind_param("sii", $deskripsi, $urutan, $id);
    }
    $stmt->execute();
    $_SESSION['status'] = ['success', 'Galeri berhasil diperbarui!'];
    header('Location: kelola_galeri.php');
    exit;
}

$judul = $mysqli->query("SELECT judul_section FROM galeri LIMIT 1")->fetch_assoc()['judul_section'] ?? '';
$galeri = $mysqli->query("SELECT * FROM galeri ORDER BY urutan ASC");
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function confirmHapus(url) {
            document.getElementById('modalHapus').classList.remove('hidden');
            document.getElementById('btnHapusKonfirmasi').onclick = () => window.location.href = url;
        }

        function closeModal() {
            document.getElementById('modalHapus').classList.add('hidden');
        }

        function closeNotif() {
            document.getElementById('notifPopup').classList.add('hidden');
        }
    </script>
</head>

<body class="bg-gray-50 min-h-screen p-6">

    <?php if (isset($_SESSION['status'])): ?>
        <?php list($type, $message) = $_SESSION['status'];
        unset($_SESSION['status']); ?>
        <div id="notifPopup" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-lg w-full max-w-md text-center">
                <p class="mb-4 text-lg font-semibold <?= $type === 'success' ? 'text-green-600' : 'text-red-600' ?>">
                    <?= htmlspecialchars($message) ?>
                </p>
                <button onclick="closeNotif()"
                    class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal Konfirmasi Hapus -->
    <div id="modalHapus" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white dark:bg-slate-800 p-6 rounded shadow-lg w-full max-w-sm text-center">
            <p class="text-lg font-semibold mb-4 text-dark dark:text-white">Yakin ingin menghapus gambar ini?</p>
            <div class="flex justify-center gap-4">
                <button onclick="closeModal()"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</button>
                <button id="btnHapusKonfirmasi"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Hapus</button>
            </div>
        </div>
    </div>

    <!-- SECTION -->
    <section id="kelola_galeri" class="bg-slate-100 min-h-screen w-full dark:bg-dark">
        <!-- HEADER FIXED -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Galeri</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <!-- MAIN CONTENT -->
        <div class="ml-64 pt-20 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <!-- Form Judul Section -->
            <form action="" method="POST" class="mb-10">
                <h2 class="text-lg font-semibold text-dark dark:text-white mb-2">Judul Section Galeri</h2>
                <input type="text" name="judul_section" value="<?= htmlspecialchars($judul) ?>"
                    class="w-full p-3 rounded bg-slate-100 dark:bg-slate-700 text-dark dark:text-white">
                <button type="submit" name="simpan_judul"
                    class="mt-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan Judul</button>
            </form>

            <!-- Form Tambah Galeri -->
            <form action="" method="POST" enctype="multipart/form-data" class="mb-10 space-y-4">
                <h2 class="text-lg font-semibold text-dark dark:text-white">Tambah Galeri Baru</h2>
                <div>
                    <label class="block font-medium text-gray-700 dark:text-white">Gambar</label>
                    <input type="file" name="gambar" required
                        class="w-full p-2 rounded bg-white dark:bg-slate-700 text-dark dark:text-white">
                </div>
                <div>
                    <label class="block font-medium text-gray-700 dark:text-white">Deskripsi</label>
                    <textarea name="deskripsi" rows="2" required
                        class="w-full p-2 rounded bg-slate-100 dark:bg-slate-700 text-dark dark:text-white"></textarea>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 dark:text-white">Urutan (opsional)</label>
                    <input type="number" name="urutan"
                        class="w-full p-2 rounded bg-slate-100 dark:bg-slate-700 text-dark dark:text-white">
                </div>
                <button name="tambah" type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">Tambah
                    Galeri</button>
            </form>

            <!-- Daftar Galeri -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php while ($row = $galeri->fetch_assoc()): ?>
                    <div class="bg-white dark:bg-slate-700 rounded shadow p-4 relative">
                        <img src="../dist/img/<?= htmlspecialchars($row['gambar']) ?>" alt="Galeri"
                            class="w-full h-48 object-cover rounded mb-4">
                        <form method="POST" enctype="multipart/form-data" class="space-y-2">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <label class="block font-medium text-gray-700 dark:text-white">Deskripsi</label>
                            <input type="text" name="deskripsi" value="<?= htmlspecialchars($row['deskripsi']) ?>"
                                class="w-full p-2 rounded bg-slate-100 dark:bg-slate-800 text-dark dark:text-white">
                            <label class="block font-medium text-gray-700 dark:text-white">Urutan</label>
                            <input type="number" name="urutan" value="<?= $row['urutan'] ?>"
                                class="w-full p-2 rounded bg-slate-100 dark:bg-slate-800 text-dark dark:text-white">
                            <input type="file" name="gambar"
                                class="w-full p-1 bg-white dark:bg-slate-800 rounded text-sm text-dark dark:text-white">
                            <div class="flex justify-between items-center">
                                <button name="edit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">Simpan</button>
                                <a href="javascript:void(0);" onclick="confirmHapus('?hapus=<?= $row['id'] ?>')"
                                    class="text-red-600 text-sm hover:underline">Hapus</a>
                            </div>
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('#kelola_galeri > div');
            const header = document.querySelector('#kelola_galeri > header');

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