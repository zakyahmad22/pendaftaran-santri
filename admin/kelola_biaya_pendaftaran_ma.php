<?php
include '../config.php'; // ganti sesuai path koneksi database kamu

// Simpan data (tambah/edit)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $keterangan = $mysqli->real_escape_string($_POST['keterangan']);
    $biaya = preg_replace('/\D/', '', $_POST['biaya']);
    $jenis_kelamin = $_POST['jenis_kelamin'];

    if ($id) {
        $mysqli->query("UPDATE biaya_pendaftaran_ma SET keterangan='$keterangan', biaya='$biaya', jenis_kelamin='$jenis_kelamin' WHERE id=$id");
    } else {
        $mysqli->query("INSERT INTO biaya_pendaftaran_ma (keterangan, biaya, jenis_kelamin) VALUES ('$keterangan', '$biaya', '$jenis_kelamin')");
    }

    echo "<script>window.location.href=window.location.pathname;</script>";
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $mysqli->query("DELETE FROM biaya_pendaftaran_ma WHERE id=$id");
    echo "<script>window.location.href=window.location.pathname;</script>";
    exit;
}
include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Biaya Pendaftaran MA</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">

</head>

<body class="bg-gray-100 dark:bg-slate-900 text-gray-900 dark:text-white">
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
            <h2 class="text-2xl font-bold text-gray-700 dark:text-white">Kelola Biaya MA</h2>
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

            <!-- Tabel PUTRA -->
            <div class="mb-10">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-xl font-semibold">Biaya Pendaftaran Putra</h3>
                    <button onclick="openModal('Putra')"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">+ Tambah Data</button>
                </div>
                <table
                    class="min-w-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-600 rounded">
                    <thead class="bg-gray-100 dark:bg-slate-700 text-left">
                        <tr>
                            <th class="py-3 px-4 border-b dark:border-slate-600">No</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Keterangan</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Biaya</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $putra = $mysqli->query("SELECT * FROM biaya_pendaftaran_ma WHERE jenis_kelamin='Putra' ORDER BY id ASC");
                        while ($row = $putra->fetch_assoc()):
                            ?>
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                                <td class="py-3 px-4 border-b dark:border-slate-600"><?= $no++ ?></td>
                                <td class="py-3 px-4 border-b dark:border-slate-600">
                                    <?= htmlspecialchars($row['keterangan']) ?>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-slate-600">Rp.
                                    <?= number_format($row['biaya'], 0, ',', '.') ?>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-slate-600 space-x-2">
                                    <button onclick='editData(<?= json_encode($row) ?>)'
                                        class="text-yellow-500 hover:underline">Edit</button>
                                    <a href="?hapus=<?= $row['id'] ?>"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="text-red-500 hover:underline">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tabel PUTRI -->
            <div>
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-xl font-semibold">Biaya Pendaftaran Putri</h3>
                    <button onclick="openModal('Putri')"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">+ Tambah Data</button>
                </div>
                <table
                    class="min-w-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-600 rounded">
                    <thead class="bg-gray-100 dark:bg-slate-700 text-left">
                        <tr>
                            <th class="py-3 px-4 border-b dark:border-slate-600">No</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Keterangan</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Biaya</th>
                            <th class="py-3 px-4 border-b dark:border-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $putri = $mysqli->query("SELECT * FROM biaya_pendaftaran_ma WHERE jenis_kelamin='Putri' ORDER BY id ASC");
                        while ($row = $putri->fetch_assoc()):
                            ?>
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                                <td class="py-3 px-4 border-b dark:border-slate-600"><?= $no++ ?></td>
                                <td class="py-3 px-4 border-b dark:border-slate-600">
                                    <?= htmlspecialchars($row['keterangan']) ?>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-slate-600">Rp.
                                    <?= number_format($row['biaya'], 0, ',', '.') ?>
                                </td>
                                <td class="py-3 px-4 border-b dark:border-slate-600 space-x-2">
                                    <button onclick='editData(<?= json_encode($row) ?>)'
                                        class="text-yellow-500 hover:underline">Edit</button>
                                    <a href="?hapus=<?= $row['id'] ?>"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="text-red-500 hover:underline">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal Form -->
    <div id="modalForm" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-slate-800 p-6 rounded-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-white" id="modalTitle">Tambah Biaya</h2>
            <form method="POST">
                <input type="hidden" name="id" id="formId">
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-white mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="formJenisKelamin" required
                        class="w-full p-2 border border-gray-300 rounded dark:bg-slate-700 dark:text-white">
                        <option value="">-- Pilih --</option>
                        <option value="Putra">Putra</option>
                        <option value="Putri">Putri</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-white mb-1">Keterangan</label>
                    <input type="text" name="keterangan" id="formKeterangan" required
                        class="w-full p-2 border border-gray-300 rounded dark:bg-slate-700 dark:text-white">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-white mb-1">Biaya</label>
                    <input type="text" name="biaya" id="formBiaya" required
                        class="w-full p-2 border border-gray-300 rounded dark:bg-slate-700 dark:text-white"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 dark:bg-slate-600 text-black dark:text-white rounded">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(jk = '') {
            document.getElementById('modalForm').classList.remove('hidden');
            document.getElementById('modalTitle').innerText = 'Tambah Biaya';
            document.getElementById('formId').value = '';
            document.getElementById('formKeterangan').value = '';
            document.getElementById('formBiaya').value = '';
            document.getElementById('formJenisKelamin').value = jk;
        }

        function closeModal() {
            document.getElementById('modalForm').classList.add('hidden');
        }

        function editData(data) {
            document.getElementById('modalForm').classList.remove('hidden');
            document.getElementById('modalTitle').innerText = 'Edit Biaya';
            document.getElementById('formId').value = data.id;
            document.getElementById('formKeterangan').value = data.keterangan;
            document.getElementById('formBiaya').value = data.biaya;
            document.getElementById('formJenisKelamin').value = data.jenis_kelamin;
        }

        function closeStatusModal() {
            document.getElementById('statusModal').classList.add('hidden');
        }
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
    </script>
</body>


</html>