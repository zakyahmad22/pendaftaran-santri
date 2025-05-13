<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "ppdb_pondok");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Handle update status
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    $stmt = $conn->prepare("UPDATE calon_santri SET status_pendaftaran = ?, keterangan = ? WHERE id = ?");
    $stmt->bind_param("ssi", $status, $keterangan, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_status_update.php");
    exit();
}

// Pencarian & filter
$search = $_GET['search'] ?? '';
$filter = $_GET['filter'] ?? '';

$sql = "SELECT * FROM calon_santri WHERE 1";

if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $sql .= " AND nama_lengkap LIKE '%$search%'";
}

if (!empty($filter)) {
    $filter = $conn->real_escape_string($filter);
    $sql .= " AND status_pendaftaran = '$filter'";
}

$sql .= " ORDER BY id DESC";
$result = $conn->query($sql);

// Include sidebar
include('../sidebar.php');
?>

<!-- Konten utama -->
<section id="informasi_admin" class="bg-slate-100 w-full dark:bg-dark">
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                </path>
            </svg>
        </button>
        <h2 class="text-2xl font-bold text-gray-700">Kelola Status Pendaftaran Santri</h2>
        <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
    </header>
    <div class="flex min-h-screen">
        <div class="flex-1 p-6">
            <h1 class="pb-3 text-xl font-semibold text-dark dark:text-white">Status Pendaftaran Santri</h1>

            <!-- Form Pencarian dan Filter -->
            <form method="GET" class="mb-6 flex flex-wrap gap-4 items-center">
                <input type="text" name="search" placeholder="Cari nama santri..."
                    value="<?= htmlspecialchars($search); ?>" class="border rounded px-3 py-2 w-64">
                <select name="filter" class="border rounded px-3 py-2">
                    <option value="">Semua Status</option>
                    <option value="Belum Diverifikasi" <?= $filter == "Belum Diverifikasi" ? "selected" : ""; ?>>Belum
                        Diverifikasi
                    </option>
                    <option value="Diterima" <?= $filter == "Diterima" ? "selected" : ""; ?>>Diterima</option>
                    <option value="Ditolak" <?= $filter == "Ditolak" ? "selected" : ""; ?>>Ditolak</option>
                </select>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Terapkan</button>
                <a href="admin_status_update.php" class="text-blue-600 hover:underline ml-2">Reset</a>
            </form>

            <!-- Tabel -->
            <div class="bg-white shadow rounded-lg p-4 overflow-auto">
                <table class="min-w-full border text-sm">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Username</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Keterangan</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php $no = 1; // Nomor urut dimulai dari 1 ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr class="border-t">
                                    <form method="POST">
                                        <td class="border px-4 py-2"><?= $no++; ?></td> <!-- Nomor urut -->
                                        <td class="border px-4 py-2"><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                                        <td class="border px-4 py-2"><?= htmlspecialchars($row['username']); ?></td>
                                        <td class="border px-4 py-2">
                                            <select name="status" class="border rounded px-2 py-1">
                                                <option value="Belum Diverifikasi" <?= $row['status_pendaftaran'] == "Belum Diverifikasi" ? "selected" : ""; ?>>Belum Diverifikasi</option>
                                                <option value="Diterima" <?= $row['status_pendaftaran'] == "Diterima" ? "selected" : ""; ?>>Diterima
                                                </option>
                                                <option value="Ditolak" <?= $row['status_pendaftaran'] == "Ditolak" ? "selected" : ""; ?>>
                                                    Ditolak</option>
                                            </select>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input type="text" name="keterangan" class="border rounded px-2 py-1 w-full"
                                                value="<?= htmlspecialchars($row['keterangan']); ?>">
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <button type="submit" name="update_status"
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Simpan</button>
                                        </td>
                                    </form>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada data.</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
</section>

</div>
</div>