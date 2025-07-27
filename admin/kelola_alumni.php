<?php
session_start();
include '../config.php'; // menggunakan config.php dengan $mysqli

// Ambil data judul alumni
$judulResult = $mysqli->query("SELECT * FROM judul_alumni LIMIT 1");
$judul = $judulResult->fetch_assoc();

// Simpan judul alumni
if (isset($_POST['simpan_judul'])) {
    $judul_tebal = $_POST['judul_tebal'];
    $judul_biasa = $_POST['judul_biasa'];
    $deskripsi_judul = $_POST['deskripsi_judul'];

    if ($judul) {
        $mysqli->query("UPDATE judul_alumni SET judul_tebal='$judul_tebal', judul_biasa='$judul_biasa', deskripsi='$deskripsi_judul' WHERE id={$judul['id']}");
    } else {
        $mysqli->query("INSERT INTO judul_alumni (judul_tebal, judul_biasa, deskripsi) VALUES ('$judul_tebal', '$judul_biasa', '$deskripsi_judul')");
    }

    $_SESSION['alert'] = "Judul alumni berhasil disimpan.";
    header("Location: kelola_alumni.php");
    exit;
}

// Handle hapus alumni
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    $mysqli->query("DELETE FROM alumni WHERE id = $id");
    header("Location: kelola_alumni.php");
    exit;
}

// Handle tambah/edit alumni
if (isset($_POST['simpan'])) {
    $id = (int) $_POST['id'];
    $nama = $_POST['nama'];
    $angkatan = $_POST['angkatan'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link_selengkapnya'];

    // Upload gambar
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "../dist/img/$gambar");
    } else {
        $gambar = $_POST['gambar_lama'] ?? '';
    }

    if ($id) {
        $query = "UPDATE alumni SET 
                    nama='$nama', 
                    angkatan='$angkatan', 
                    deskripsi='$deskripsi', 
                    link_selengkapnya='$link', 
                    gambar='$gambar' 
                    WHERE id=$id";
    } else {
        $query = "INSERT INTO alumni (nama, angkatan, deskripsi, gambar, link_selengkapnya) 
                    VALUES ('$nama', '$angkatan', '$deskripsi', '$gambar', '$link')";
    }

    $mysqli->query($query);
    $_SESSION['alert'] = "Judul alumni berhasil disimpan.";
    header("Location: kelola_alumni.php");
    exit;
}

// Ambil data jika mode edit alumni
$edit = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM alumni WHERE id = $id");
    $edit = $result->fetch_assoc();
}

// Ambil semua data alumni
$data = $mysqli->query("SELECT * FROM alumni ORDER BY id DESC");
?>
<?php
// Include sidebar
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Alumni - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">
    <section id="kelola_hero_section" class="bg-slate-100 w-full dark:bg-dark">
        <!-- Header disamakan -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Alumni</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <!-- Konten dengan jarak dari header -->
        <div class="ml-64 pt-20 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <!-- Form Judul -->
            <div class="mb-10">
                <h2 class="text-xl font-semibold mb-4">Edit Judul Bagian Alumni</h2>
                <form action="" method="post" class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-medium">Judul Tebal (warna biru)</label>
                        <input type="text" name="judul_tebal" value="<?= $judul['judul_tebal'] ?? '' ?>"
                            class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Judul Biasa</label>
                        <input type="text" name="judul_biasa" value="<?= $judul['judul_biasa'] ?? '' ?>"
                            class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block mb-1 font-medium">Deskripsi</label>
                        <textarea name="deskripsi_judul" rows="3"
                            class="w-full border px-3 py-2 rounded"><?= $judul['deskripsi'] ?? '' ?></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" name="simpan_judul"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Alert -->
            <?php if (isset($_SESSION['alert'])): ?>
                <div
                    class="max-w-xl mx-auto text-center mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    <?= $_SESSION['alert'] ?>
                </div>
                <?php unset($_SESSION['alert']); ?>
            <?php endif; ?>

            <!-- Form Alumni -->
            <form action="" method="post" enctype="multipart/form-data" class="mb-10">
                <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
                <input type="hidden" name="gambar_lama" value="<?= $edit['gambar'] ?? '' ?>">

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 font-medium">Nama</label>
                        <input type="text" name="nama" value="<?= $edit['nama'] ?? '' ?>"
                            class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Angkatan</label>
                        <input type="text" name="angkatan" value="<?= $edit['angkatan'] ?? '' ?>"
                            class="w-full border px-3 py-2 rounded" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block mb-1 font-medium">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" class="w-full border px-3 py-2 rounded"
                            required><?= $edit['deskripsi'] ?? '' ?></textarea>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Gambar
                            <?= $edit ? '(kosongkan jika tidak diubah)' : '' ?></label>
                        <input type="file" name="gambar" class="w-full border px-3 py-2 rounded">
                        <?php if (!empty($edit['gambar'])): ?>
                            <img src="../dist/img/<?= $edit['gambar'] ?>" alt="gambar" class="w-20 mt-2">
                        <?php endif; ?>
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Link Selengkapnya</label>
                        <input type="text" name="link_selengkapnya" value="<?= $edit['link_selengkapnya'] ?? '' ?>"
                            class="w-full border px-3 py-2 rounded">
                    </div>
                </div>

                <button type="submit" name="simpan"
                    class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                    <?= $edit ? 'Update' : 'Tambah' ?>
                </button>
            </form>

            <!-- Tabel Alumni -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Angkatan</th>
                            <th class="px-4 py-2 border">Gambar</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $row): ?>
                            <tr class="text-center">
                                <td class="border px-4 py-2"><?= $no++ ?></td>
                                <td class="border px-4 py-2"><?= $row['nama'] ?></td>
                                <td class="border px-4 py-2"><?= $row['angkatan'] ?></td>
                                <td class="border px-4 py-2">
                                    <img src="../dist/img/<?= $row['gambar'] ?>" alt="foto"
                                        class="w-12 h-12 mx-auto object-cover rounded">
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="?edit=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                                    <a href="?hapus=<?= $row['id'] ?>" class="text-red-600 hover:underline"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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