<?php
include '../config.php';

// Tambah data
if (isset($_POST['tambah'])) {
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $keterangan = $_POST['keterangan'];
    $biaya = $_POST['biaya'];

    mysqli_query($mysqli, "INSERT INTO biaya_pendaftaran_smp (jenis_kelamin, keterangan, biaya) VALUES ('$jenis_kelamin', '$keterangan', '$biaya')");
    header("Location: kelola_biaya_pendaftaran_smp.php?status=berhasil");
    exit;
}

// Edit data
$edit_mode = false;
$edit_data = null;

if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $edit_query = mysqli_query($mysqli, "SELECT * FROM biaya_pendaftaran_smp WHERE id = $edit_id");
    $edit_data = mysqli_fetch_assoc($edit_query);
    $edit_mode = true;
}

// Simpan perubahan
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $keterangan = $_POST['keterangan'];
    $biaya = $_POST['biaya'];

    mysqli_query($mysqli, "UPDATE biaya_pendaftaran_smp SET jenis_kelamin = '$jenis_kelamin', keterangan = '$keterangan', biaya = '$biaya' WHERE id = $id");
    header("Location: kelola_biaya_pendaftaran_smp.php?status=berhasil");
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    mysqli_query($mysqli, "DELETE FROM biaya_pendaftaran_smp WHERE id = $id");
    header("Location: kelola_biaya_pendaftaran_smp.php?status=berhasil");
    exit;
}

// Ambil semua data
$result = mysqli_query($mysqli, "SELECT * FROM biaya_pendaftaran_smp ORDER BY jenis_kelamin, id");

include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Biaya Pendaftaran SMP</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen p-6 dark:bg-dark dark:text-white">
    <section id="kelola_biaya" class="min-h-screen w-full">

        <!-- Header -->
        <header
            class="fixed top-0 left-0 right-0 z-40 bg-white dark:bg-slate-900 shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700 dark:text-white">Kelola Biaya SMP</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>

        </header>

        <div class="ml-64 pt-24 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <?php if (isset($_GET['status'])): ?>
                <div id="statusModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                    <div
                        class="bg-white dark:bg-slate-800 p-6 rounded shadow-lg max-w-sm w-full text-center border dark:border-slate-600">
                        <h2 class="text-lg font-bold mb-2 text-dark dark:text-white">Berhasil!</h2>
                        <p class="text-sm text-secondary dark:text-gray-300 mb-4">Data berhasil diproses.</p>
                        <button onclick="closeModal()"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Oke</button>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Form Tambah / Edit -->
            <div class="mb-6">
                <h3 class="text-xl font-bold mb-2"><?= $edit_mode ? 'Edit Data' : 'Tambah Data' ?></h3>
                <form method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <input type="hidden" name="id" value="<?= $edit_mode ? $edit_data['id'] : '' ?>">
                    <div>
                        <label class="block font-semibold mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" required
                            class="w-full p-2 border border-gray-300 rounded dark:bg-slate-700 dark:text-white">
                            <option value="">-- Pilih --</option>
                            <option value="Putra" <?= ($edit_mode && $edit_data['jenis_kelamin'] == 'Putra') ? 'selected' : '' ?>>Putra
                            </option>
                            <option value="Putri" <?= ($edit_mode && $edit_data['jenis_kelamin'] == 'Putri') ? 'selected' : '' ?>>Putri
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Keterangan</label>
                        <input type="text" name="keterangan" required
                            value="<?= $edit_mode ? htmlspecialchars($edit_data['keterangan']) : '' ?>"
                            class="w-full p-2 border border-gray-300 rounded dark:bg-slate-700 dark:text-white">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Biaya (Rp)</label>
                        <input type="number" name="biaya" required value="<?= $edit_mode ? $edit_data['biaya'] : '' ?>"
                            class="w-full p-2 border border-gray-300 rounded dark:bg-slate-700 dark:text-white">
                    </div>
                    <div class="md:col-span-3 text-right mt-2">
                        <?php if ($edit_mode): ?>
                            <a href="kelola_biaya_pendaftaran_smp.php"
                                class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">Batal</a>
                            <button type="submit" name="simpan"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan Perubahan</button>
                        <?php else: ?>
                            <button type="submit" name="tambah"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">+ Tambah Data</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <!-- Tabel Data -->
            <div class="overflow-x-auto">
                <table
                    class="min-w-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-600 rounded">
                    <thead class="bg-gray-100 dark:bg-slate-700 text-left">
                        <tr>
                            <th class="py-3 px-4 border-b dark:border-slate-600">No</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Jenis Kelamin</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Keterangan</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Biaya</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                                <td class="py-3 px-4 border-b dark:border-slate-600"><?= $no++ ?></td>
                                <td class="py-3 px-4 border-b dark:border-slate-600">
                                    <?= htmlspecialchars($row['jenis_kelamin']) ?>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-slate-600">
                                    <?= htmlspecialchars($row['keterangan']) ?>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-slate-600">Rp.
                                    <?= number_format($row['biaya'], 0, ',', '.') ?>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-slate-600 space-x-2">
                                    <a href="?edit=<?= $row['id'] ?>" class="text-blue-500 hover:underline">Edit</a>
                                    <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')"
                                        class="text-red-500 hover:underline">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('#kelola_biaya > div');
        const header = document.querySelector('#kelola_biaya > header');

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

    function closeModal() {
        const modal = document.getElementById('statusModal');
        modal.style.display = 'none';
        history.replaceState(null, '', 'kelola_biaya_pendaftaran_smp.php');
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (document.getElementById('statusModal')) {
            setTimeout(() => closeModal(), 3000);
        }
    });
</script>

</html>