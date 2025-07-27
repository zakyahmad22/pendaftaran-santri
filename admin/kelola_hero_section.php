<?php

session_start();
// koneksi database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ppdb_pondok';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error)
    die("Koneksi gagal: " . $conn->connect_error);

// Proses hapus data
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $result = $conn->query("SELECT gambar FROM hero_section WHERE id=$id");
    if ($result && $row = $result->fetch_assoc()) {
        if ($row['gambar'] && file_exists('../upload_hero_section/' . $row['gambar'])) {
            unlink('../upload_hero_section/' . $row['gambar']);
        }
    }
    $conn->query("DELETE FROM hero_section WHERE id=$id");
    header('Location: kelola_hero_section.php');
    exit;
}

// Proses tambah/edit data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $judul_kecil = $conn->real_escape_string($_POST['judul_kecil']);
    $judul_besar = $conn->real_escape_string($_POST['judul_besar']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $link_pendaftaran = $conn->real_escape_string($_POST['link_pendaftaran']);

    $gambar = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $filename = time() . '_' . basename($_FILES['gambar']['name']);
        $target_dir = '../upload_hero_section/';
        if (!is_dir($target_dir))
            mkdir($target_dir, 0777, true);
        move_uploaded_file($tmp_name, $target_dir . $filename);
        $gambar = $filename;
    }

    if ($id > 0) {
        if ($gambar) {
            $result = $conn->query("SELECT gambar FROM hero_section WHERE id=$id");
            if ($result && $row = $result->fetch_assoc()) {
                if ($row['gambar'] && file_exists('../upload_hero_section/' . $row['gambar'])) {
                    unlink('../upload_hero_section/' . $row['gambar']);
                }
            }
            $sql = "UPDATE hero_section SET 
                judul_kecil='$judul_kecil',
                judul_besar='$judul_besar',
                deskripsi='$deskripsi',
                link_pendaftaran='$link_pendaftaran',
                gambar='$gambar'
                WHERE id=$id";
        } else {
            $sql = "UPDATE hero_section SET 
                judul_kecil='$judul_kecil',
                judul_besar='$judul_besar',
                deskripsi='$deskripsi',
                link_pendaftaran='$link_pendaftaran'
                WHERE id=$id";
        }
        $conn->query($sql);
        $_SESSION['berhasil'] = 'Data berhasil diedit!';
    } else {
        $sql = "INSERT INTO hero_section 
            (judul_kecil, judul_besar, deskripsi, gambar, link_pendaftaran)
            VALUES ('$judul_kecil', '$judul_besar', '$deskripsi', '$gambar', '$link_pendaftaran')";
        $conn->query($sql);
        $_SESSION['berhasil'] = 'Data berhasil ditambahkan!';
    }
    header('Location: kelola_hero_section.php');
    exit;
}

$result = $conn->query("SELECT * FROM hero_section ORDER BY created_at DESC");

$editData = null;
if (isset($_GET['edit'])) {
    $idEdit = intval($_GET['edit']);
    $resEdit = $conn->query("SELECT * FROM hero_section WHERE id=$idEdit");
    if ($resEdit)
        $editData = $resEdit->fetch_assoc();
}

$pesan_berhasil = '';
if (isset($_SESSION['berhasil'])) {
    $pesan_berhasil = $_SESSION['berhasil'];
    unset($_SESSION['berhasil']);
}
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Kelola Hero Section</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="../dist/css/final.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 font-sans">

    <section id="kelola_hero_section" class="bg-slate-100 w-full dark:bg-dark">
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Hero Section</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>
        <div class="ml-64 pt-20 pb-5 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <h1 class="text-xl font-semibold mb-4"><?= $editData ? 'Edit Hero Section' : 'Tambah Hero Section' ?>
            </h1>
            <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
                <input type="hidden" name="id" value="<?= $editData['id'] ?? 0 ?>" />

                <div>
                    <label class="block font-medium mb-1">Judul Kecil</label>
                    <input type="text" name="judul_kecil" required class="w-full border rounded px-3 py-2"
                        value="<?= htmlspecialchars($editData['judul_kecil'] ?? '') ?>" />
                </div>

                <div>
                    <label class="block font-medium mb-1">Judul Besar</label>
                    <input type="text" name="judul_besar" required class="w-full border rounded px-3 py-2"
                        value="<?= htmlspecialchars($editData['judul_besar'] ?? '') ?>" />
                </div>

                <div>
                    <label class="block font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required
                        class="w-full border rounded px-3 py-2"><?= htmlspecialchars($editData['deskripsi'] ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block font-medium mb-1">Link Pendaftaran</label>
                    <input type="url" name="link_pendaftaran" class="w-full border rounded px-3 py-2"
                        value="<?= htmlspecialchars($editData['link_pendaftaran'] ?? '') ?>" />
                </div>

                <div>
                    <label class="block font-medium mb-1">Gambar Hero</label>
                    <input type="file" name="gambar" class="w-full border rounded px-3 py-2" <?= $editData ? '' : 'required' ?> />
                    <?php if ($editData && $editData['gambar']): ?>
                        <img src="../upload_hero_section/<?= htmlspecialchars($row['gambar']) ?>" />
                        <p class="text-sm text-gray-500">Gambar saat ini: <?= htmlspecialchars($editData['gambar']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="pt-4 flex items-center gap-4">
                    <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Simpan
                    </button>
                    <?php if ($editData): ?>
                        <a href="kelola_hero_section.php"
                            class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition inline-block">
                            Batal
                        </a>
                    <?php endif; ?>
                </div>

            </form>


            <div class="bg-white shadow-md rounded p-6 max-w-6xl mx-auto">
                <h2 class="text-2xl font-semibold mb-4">Daftar Hero Section</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-left">
                                <th class="p-3 border">No</th>
                                <th class="p-3 border">Judul Kecil</th>
                                <th class="p-3 border">Judul Besar</th>
                                <th class="p-3 border">Deskripsi</th>
                                <th class="p-3 border">Gambar</th>
                                <th class="p-3 border">Link</th>
                                <th class="p-3 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Mulai nomor dari 1
                            while ($row = $result->fetch_assoc()): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="p-3 border text-center"><?= $no++ ?></td>
                                    <td class="p-3 border"><?= htmlspecialchars($row['judul_kecil']) ?></td>
                                    <td class="p-3 border"><?= htmlspecialchars($row['judul_besar']) ?></td>
                                    <td class="p-3 border"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
                                    <td class="p-3 border text-center">
                                        <?php if ($row['gambar'] && file_exists('../upload_hero_section/' . $row['gambar'])): ?>
                                            <img src="../upload_hero_section/<?= htmlspecialchars($row['gambar']) ?>"
                                                class="w-24 mx-auto rounded" />
                                        <?php else: ?>
                                            <span class="text-sm text-gray-500">Tidak ada gambar</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="p-3 border">
                                        <a href="<?= htmlspecialchars($row['link_pendaftaran']) ?>" target="_blank"
                                            class="text-blue-600 hover:underline text-sm">
                                            <?= htmlspecialchars($row['link_pendaftaran']) ?>
                                        </a>
                                    </td>
                                    <td class="p-3 border text-center">
                                        <a href="javascript:void(0)" onclick="konfirmasiEdit(<?= $row['id'] ?>)"
                                            class="text-yellow-600 hover:underline font-medium">Edit</a> |
                                        <a href="javascript:void(0)" onclick="konfirmasiHapus(<?= $row['id'] ?>)"
                                            class="text-red-600 hover:underline font-medium">Hapus</a>

                                    </td>
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
                </div>
            </div>
    </section>

    <!-- Modal Konfirmasi -->
    <div id="modalKonfirmasi" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold mb-4" id="modalJudul">Konfirmasi</h2>
            <p class="mb-6" id="modalPesan">Apakah Anda yakin?</p>
            <div class="flex justify-end space-x-3">
                <button onclick="tutupModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <a id="modalBtnLanjut" href="#"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Lanjutkan</a>
            </div>
        </div>
    </div>
    <!-- Modal Berhasil -->
    <div id="modalBerhasil" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-xl font-semibold mb-4 text-green-600">Berhasil!</h2>
            <p class="mb-6" id="pesanBerhasil">Data berhasil disimpan.</p>
            <button onclick="tutupModalBerhasil()"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tutup</button>
        </div>
    </div>

    <!-- script modal -->
    <script>
        function tutupModal() {
            document.getElementById('modalKonfirmasi').classList.add('hidden');
        }

        function bukaModal(judul, pesan, linkTujuan) {
            document.getElementById('modalJudul').innerText = judul;
            document.getElementById('modalPesan').innerText = pesan;
            document.getElementById('modalBtnLanjut').href = linkTujuan;
            document.getElementById('modalKonfirmasi').classList.remove('hidden');
        }

        function konfirmasiEdit(id) {
            bukaModal("Edit Data", "Anda yakin ingin mengedit data ini?", "?edit=" + id);
        }

        function konfirmasiHapus(id) {
            bukaModal("Hapus Data", "Data yang dihapus tidak dapat dikembalikan. Yakin ingin menghapus?", "?delete=" + id);
        }

        // Modal simpan saat submit form
        document.querySelector("form").addEventListener("submit", function (e) {
            e.preventDefault(); // cegah submit langsung
            bukaModal("Simpan Data", "Apakah Anda yakin ingin menyimpan data ini?", "#");
            document.getElementById("modalBtnLanjut").onclick = () => {
                this.submit();
            };
        });
    </script>

    <!-- modal berhasil -->
    <script>
        function tutupModalBerhasil() {
            document.getElementById('modalBerhasil').classList.add('hidden');
        }

        <?php if (!empty($pesan_berhasil)): ?>
            window.addEventListener('DOMContentLoaded', () => {
                document.getElementById('pesanBerhasil').innerText = <?= json_encode($pesan_berhasil) ?>;
                document.getElementById('modalBerhasil').classList.remove('hidden');
            });
        <?php endif; ?>
    </script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('#kelola_hero_section > div');
            const header = document.querySelector('#kelola_hero_section > header');

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