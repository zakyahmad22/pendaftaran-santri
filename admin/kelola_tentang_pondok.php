<?php
ob_start();
include '../config.php';
include '../sidebar.php';

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $mysqli->query("DELETE FROM tb_tentang_kami WHERE id = $id");
    header("Location: kelola_tentang_pondok.php");
    exit;
}

// Tambah atau Edit data
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $sub_judul = $_POST['sub_judul'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = "tentang.php?jenis=" . $jenis; // otomatis generate link berdasarkan jenis

    // Upload Gambar
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../dist/img/" . $gambar);
    } else {
        $gambar = $_POST['gambar_lama'];
    }

    if ($id == '') {
        // Tambah
        $mysqli->query("INSERT INTO tb_tentang_kami (jenis, sub_judul, judul, deskripsi, gambar, link_selengkapnya)
            VALUES ('$jenis', '$sub_judul', '$judul', '$deskripsi', '$gambar', '$link')");
    } else {
        // Edit
        $mysqli->query("UPDATE tb_tentang_kami SET
            jenis='$jenis', sub_judul='$sub_judul', judul='$judul', deskripsi='$deskripsi',
            gambar='$gambar', link_selengkapnya='$link' WHERE id=$id");
    }

    header("Location: kelola_tentang_pondok.php");
    exit;
}

// Ambil data untuk edit
$edit = ['id' => '', 'jenis' => '', 'sub_judul' => '', 'judul' => '', 'deskripsi' => '', 'gambar' => ''];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM tb_tentang_kami WHERE id = $id");
    $edit = $result->fetch_assoc();
}

// Ambil semua data
$data = $mysqli->query("SELECT * FROM tb_tentang_kami ORDER BY id ASC");

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Tentang Pondok</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center text-primary">Kelola Tentang Pondok</h1>

        <!-- Form -->
        <form method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-4 mb-6">
            <input type="hidden" name="id" value="<?= $edit['id'] ?>">
            <input type="hidden" name="gambar_lama" value="<?= $edit['gambar'] ?>">

            <select name="jenis" required class="border p-2 rounded">
                <option value="">-- Pilih Jenis --</option>
                <option value="sejarah" <?= ($edit['jenis'] == 'sejarah' ? 'selected' : '') ?>>Sejarah</option>
                <option value="visi_misi" <?= ($edit['jenis'] == 'visi_misi' ? 'selected' : '') ?>>Visi Misi</option>
                <option value="fasilitas" <?= ($edit['jenis'] == 'fasilitas' ? 'selected' : '') ?>>Fasilitas</option>
            </select>

            <input type="text" name="sub_judul" placeholder="Sub Judul"
                value="<?= htmlspecialchars($edit['sub_judul']) ?>" required class="border p-2 rounded">
            <input type="text" name="judul" placeholder="Judul" value="<?= htmlspecialchars($edit['judul']) ?>" required
                class="border p-2 rounded">
            <textarea name="deskripsi" placeholder="Deskripsi" required
                class="border p-2 rounded"><?= htmlspecialchars($edit['deskripsi']) ?></textarea>

            <input type="file" name="gambar" class="border p-2 rounded">
            <?php if ($edit['gambar']): ?>
                <img src="../dist/img/<?= $edit['gambar'] ?>" alt="gambar" class="w-32 mt-2">
            <?php endif; ?>

            <button type="submit" name="simpan"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                <?= $edit['id'] ? 'Update' : 'Tambah' ?>
            </button>
        </form>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Jenis</th>
                        <th class="py-2 px-4 border">Judul</th>
                        <th class="py-2 px-4 border">Gambar</th>
                        <th class="py-2 px-4 border">Link</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $data->fetch_assoc()): ?>
                        <tr>
                            <td class="py-2 px-4 border"><?= htmlspecialchars($row['jenis']) ?></td>
                            <td class="py-2 px-4 border"><?= htmlspecialchars($row['judul']) ?></td>
                            <td class="py-2 px-4 border">
                                <img src="../dist/img/<?= $row['gambar'] ?>" class="w-16">
                            </td>
                            <td class="py-2 px-4 border">
                                <a href="../<?= $row['link_selengkapnya'] ?>" class="text-blue-600 hover:underline"
                                    target="_blank">Lihat</a>
                            </td>
                            <td class="py-2 px-4 border">
                                <a href="?edit=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                                <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data ini?')"
                                    class="text-red-600 hover:underline">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>