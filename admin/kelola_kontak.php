<?php
include '../config.php';
include '../sidebar.php';

// Tambah data kontak
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $nomor_hp = $_POST['nomor_hp'];
    $mysqli->query("INSERT INTO kontak (nama, jabatan, nomor_hp) VALUES ('$nama', '$jabatan', '$nomor_hp')");
    header("Location: kelola_kontak.php");
}

// Edit data kontak
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $nomor_hp = $_POST['nomor_hp'];
    $mysqli->query("UPDATE kontak SET nama='$nama', jabatan='$jabatan', nomor_hp='$nomor_hp' WHERE id=$id");
    header("Location: kelola_kontak.php");
}

// Hapus data kontak
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $mysqli->query("DELETE FROM kontak WHERE id=$id");
    header("Location: kelola_kontak.php");
}

// Ambil data kontak untuk diedit
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM kontak WHERE id=$id");
    $edit_data = $result->fetch_assoc();
}

// Ambil semua data kontak
$data = $mysqli->query("SELECT * FROM kontak");

// Ambil deskripsi "Hubungi Kami"
$deskripsi = $mysqli->query("SELECT * FROM kontak_deskripsi LIMIT 1")->fetch_assoc();

// Update deskripsi
if (isset($_POST['update_deskripsi'])) {
    $judul = $_POST['judul'];
    $desc = $_POST['deskripsi'];
    $mysqli->query("UPDATE kontak_deskripsi SET judul='$judul', deskripsi='$desc' WHERE id=1");
    header("Location: kelola_kontak.php");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Kontak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Kelola Kontak</h2>

        <!-- Form Ubah Deskripsi -->
        <?php
        // Update deskripsi
        if (isset($_POST['update_deskripsi'])) {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $mysqli->query("UPDATE kontak_deskripsi SET judul='$judul', deskripsi='$deskripsi' WHERE id=1");
        header("Location: kelola_kontak.php?sukses=deskripsi");
        exit;
        }

        // Ambil data deskripsi
        $deskripsi = $mysqli->query("SELECT * FROM kontak_deskripsi LIMIT 1")->fetch_assoc();
        ?>

        <!-- ALERT BERHASIL -->
        <?php if (isset($_GET['sukses']) && $_GET['sukses'] == 'deskripsi'): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">Deskripsi berhasil diperbarui.</span>
            </div>
        <?php endif; ?>

        <!-- Form Ubah Deskripsi -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-bold mb-4">Ubah Judul & Deskripsi "Hubungi Kami"</h3>
            <form method="post" class="space-y-4">
                <div>
                    <label class="block font-medium">Judul</label>
                    <input type="text" name="judul" value="<?= htmlspecialchars($deskripsi['judul']) ?>"
                        class="w-full border border-gray-300 p-2 rounded-md" required>
                </div>
                <div>
                    <label class="block font-medium">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="w-full border border-gray-300 p-2 rounded-md"
                        required><?= htmlspecialchars($deskripsi['deskripsi']) ?></textarea>
                </div>
                <div>
                    <button type="submit" name="update_deskripsi"
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>

        <!-- Form Tambah / Edit Kontak -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <form action="" method="post" class="space-y-4">
                <input type="hidden" name="id" value="<?= $edit_data['id'] ?? '' ?>">
                <div>
                    <label class="block font-medium">Nama</label>
                    <input type="text" name="nama" required value="<?= $edit_data['nama'] ?? '' ?>"
                        class="w-full border border-gray-300 p-2 rounded-md">
                </div>
                <div>
                    <label class="block font-medium">Jabatan</label>
                    <input type="text" name="jabatan" required value="<?= $edit_data['jabatan'] ?? '' ?>"
                        class="w-full border border-gray-300 p-2 rounded-md">
                </div>
                <div>
                    <label class="block font-medium">Nomor HP</label>
                    <input type="text" name="nomor_hp" required value="<?= $edit_data['nomor_hp'] ?? '' ?>"
                        class="w-full border border-gray-300 p-2 rounded-md">
                </div>
                <div>
                    <?php if ($edit_data): ?>
                        <button type="submit" name="edit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                        <a href="kelola_kontak.php"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Batal</a>
                    <?php else: ?>
                        <button type="submit" name="tambah"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- Tabel Kontak -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <table class="w-full table-auto border border-gray-200">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 border">Nama</th>
                        <th class="p-3 border">Jabatan</th>
                        <th class="p-3 border">Nomor HP</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($k = $data->fetch_assoc()): ?>
                        <tr>
                            <td class="p-3 border"><?= htmlspecialchars($k['nama']) ?></td>
                            <td class="p-3 border"><?= htmlspecialchars($k['jabatan']) ?></td>
                            <td class="p-3 border"><?= htmlspecialchars($k['nomor_hp']) ?></td>
                            <td class="p-3 border">
                                <a href="?edit=<?= $k['id'] ?>" class="text-yellow-600 hover:underline">Edit</a> |
                                <a href="?hapus=<?= $k['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')"
                                    class="text-red-600 hover:underline">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>