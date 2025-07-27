<?php
session_start();
include '../config.php';

// Fungsi helper
function sanitize($data)
{
    return trim(htmlspecialchars($data));
}

// === PROSES TAMBAH / EDIT ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tambah syarat
    if (isset($_POST['tambah_syarat'])) {
        $isi = sanitize($_POST['isi']);
        if (!empty($isi)) {
            $stmt = $mysqli->prepare("INSERT INTO syarat_pendaftaran (isi) VALUES (?)");
            $stmt->bind_param("s", $isi);
            $stmt->execute();
            header("Location: kelola_pendaftaran_info.php?status=tambah_syarat");
            exit;
        }
    } elseif (isset($_POST['tambah_tatacara'])) {
        $isi = sanitize($_POST['isi']);
        if (!empty($isi)) {
            $stmt = $mysqli->prepare("INSERT INTO tatacara_pendaftaran (isi) VALUES (?)");
            $stmt->bind_param("s", $isi);
            $stmt->execute();
            header("Location: kelola_pendaftaran_info.php?status=tambah_tatacara");
            exit;
        }
    } elseif (isset($_POST['edit_syarat'])) {
        $id = intval($_POST['id']);
        $isi = sanitize($_POST['isi']);
        if ($id > 0 && !empty($isi)) {
            $stmt = $mysqli->prepare("UPDATE syarat_pendaftaran SET isi = ? WHERE id = ?");
            $stmt->bind_param("si", $isi, $id);
            $stmt->execute();
            header("Location: kelola_pendaftaran_info.php?status=edit_syarat");
            exit;
        }
    } elseif (isset($_POST['edit_tatacara'])) {
        $id = intval($_POST['id']);
        $isi = sanitize($_POST['isi']);
        if ($id > 0 && !empty($isi)) {
            $stmt = $mysqli->prepare("UPDATE tatacara_pendaftaran SET isi = ? WHERE id = ?");
            $stmt->bind_param("si", $isi, $id);
            $stmt->execute();
            header("Location: kelola_pendaftaran_info.php?status=edit_tatacara");
            exit;
        }
    }
}

// === HAPUS ===
if (isset($_GET['hapus_syarat'])) {
    $id = intval($_GET['hapus_syarat']);
    if ($id > 0) {
        $stmt = $mysqli->prepare("DELETE FROM syarat_pendaftaran WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header("Location: kelola_pendaftaran_info.php?status=hapus_syarat");
        exit;
    }
}

if (isset($_GET['hapus_tatacara'])) {
    $id = intval($_GET['hapus_tatacara']);
    if ($id > 0) {
        $stmt = $mysqli->prepare("DELETE FROM tatacara_pendaftaran WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header("Location: kelola_pendaftaran_info.php?status=hapus_tatacara");
        exit;
    }
}

// Ambil data
$syarat = $mysqli->query("SELECT * FROM syarat_pendaftaran ORDER BY id ASC");
$tatacara = $mysqli->query("SELECT * FROM tatacara_pendaftaran ORDER BY id ASC");

// Ambil judul
$judulResult = $mysqli->query("SELECT * FROM pendaftaran_info WHERE tipe = 'judul' LIMIT 1");
$judulData = $judulResult->fetch_assoc();

// Handle update judul
if (isset($_POST['update_judul'])) {
    $judulBaru = trim($_POST['judul_baru']);
    if (!empty($judulBaru)) {
        if ($judulData) {
            // Update jika sudah ada
            $stmt = $mysqli->prepare("UPDATE pendaftaran_info SET isi = ? WHERE id = ?");
            $stmt->bind_param("si", $judulBaru, $judulData['id']);
        } else {
            // Tambah baru jika belum ada
            $stmt = $mysqli->prepare("INSERT INTO pendaftaran_info (tipe, isi) VALUES ('judul', ?)");
            $stmt->bind_param("s", $judulBaru);
        }
        $stmt->execute();
        header("Location: kelola_pendaftaran_info.php"); // Redirect untuk hindari re-submit
        exit;
    }
}

include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Pendaftaran Info</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen p-6">
    <section id="kelola_pendaftaran_info"
        class="bg-slate-100 min-h-screen w-full dark:bg-dark transition-all duration-700">
        <!-- Header -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Info Pendaftaran</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>

        <!-- Konten -->
        <div class="ml-64 pt-20 p-6 bg-white dark:bg-slate-800 min-h-screen transition-all duration-700">
            <h1 class="text-2xl font-bold mb-6 text-dark dark:text-white">Kelola Informasi Pendaftaran</h1>
            <!-- Form Ubah Judul -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-dark dark:text-white mb-4">Judul Halaman</h2>
                <form method="POST" class="flex gap-2">
                    <input type="text" name="judul_baru" value="<?= htmlspecialchars($judulData['isi'] ?? '') ?>"
                        class="w-full p-2 rounded bg-slate-100 dark:bg-slate-700 text-dark dark:text-white" required>
                    <button type="submit" name="update_judul"
                        class="flex items-center bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded space-x-2">
                        <span>Simpan</span>
                        <span>Judul</span>
                    </button>

                </form>
            </div>

            <!-- Syarat Pendaftaran -->
            <div class="mb-12 animate-fade-in">
                <h2 class="text-xl font-semibold text-dark dark:text-white mb-4">Persyaratan Pendaftaran</h2>

                <form method="POST" class="mb-4 flex gap-2">
                    <input type="text" name="isi" placeholder="Tulis syarat baru..."
                        class="w-full p-2 rounded bg-slate-100 dark:bg-slate-700 text-dark dark:text-white" required>
                    <button type="submit" name="tambah_syarat"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Tambah</button>
                </form>

                <ul class="space-y-4">
                    <?php while ($row = $syarat->fetch_assoc()): ?>
                        <li class="bg-slate-50 dark:bg-slate-700 p-4 rounded shadow">
                            <form method="POST" class="flex flex-col md:flex-row md:items-center gap-2">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="text" name="isi" value="<?= htmlspecialchars($row['isi']) ?>"
                                    class="flex-1 p-2 rounded bg-white dark:bg-slate-800 text-dark dark:text-white">
                                <button name="edit_syarat"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Simpan</button>
                                <a href="?hapus_syarat=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</a>
                            </form>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <!-- Tata Cara Pendaftaran -->
            <div class="animate-fade-in">
                <h2 class="text-xl font-semibold text-dark dark:text-white mb-4">Tata Cara Pendaftaran</h2>

                <form method="POST" class="mb-4 flex gap-2">
                    <input type="text" name="isi" placeholder="Tulis tata cara baru..."
                        class="w-full p-2 rounded bg-slate-100 dark:bg-slate-700 text-dark dark:text-white" required>
                    <button type="submit" name="tambah_tatacara"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Tambah</button>
                </form>

                <ul class="space-y-4">
                    <?php while ($row = $tatacara->fetch_assoc()): ?>
                        <li class="bg-slate-50 dark:bg-slate-700 p-4 rounded shadow">
                            <form method="POST" class="flex flex-col md:flex-row md:items-center gap-2">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="text" name="isi" value="<?= htmlspecialchars($row['isi']) ?>"
                                    class="flex-1 p-2 rounded bg-white dark:bg-slate-800 text-dark dark:text-white">
                                <button name="edit_tatacara"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Simpan</button>
                                <a href="?hapus_tatacara=<?= $row['id'] ?>"
                                    onclick="return confirm('Yakin ingin menghapus?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</a>
                            </form>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </section>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('#kelola_pendaftaran_info > div');
            const header = document.querySelector('#kelola_pendaftaran_info > header');

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

        // Fade-in saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const section = document.getElementById('kelola_pendaftaran_info');
            section.classList.remove('opacity-0', 'translate-y-10');
            section.classList.add('opacity-100', 'translate-y-0');
        });
    </script>
</body>


<?php if (isset($_GET['status'])): ?>
    <div id="modalAlert" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-lg text-center max-w-md border dark:border-slate-600">
            <h3 class="text-lg font-bold text-dark dark:text-white mb-2">Berhasil</h3>
            <p class="text-sm text-secondary dark:text-gray-300 mb-4">
                <?php
                switch ($_GET['status']) {
                    case 'tambah_syarat':
                        echo "Syarat berhasil ditambahkan.";
                        break;
                    case 'edit_syarat':
                        echo "Syarat berhasil diperbarui.";
                        break;
                    case 'hapus_syarat':
                        echo "Syarat berhasil dihapus.";
                        break;
                    case 'tambah_tatacara':
                        echo "Tata cara berhasil ditambahkan.";
                        break;
                    case 'edit_tatacara':
                        echo "Tata cara berhasil diperbarui.";
                        break;
                    case 'hapus_tatacara':
                        echo "Tata cara berhasil dihapus.";
                        break;
                    default:
                        echo "Operasi berhasil.";
                        break;
                }
                ?>
            </p>
            <button onclick="closeModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Tutup
            </button>
        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById('modalAlert').remove();
            history.replaceState(null, '', window.location.pathname);
        }
    </script>
<?php endif; ?>