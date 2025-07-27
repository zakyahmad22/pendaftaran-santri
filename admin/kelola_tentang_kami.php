<?php
session_start();
include '../config.php';

$id = $_GET['id'] ?? '';
$editData = [];

if ($id) {
    $result = $mysqli->query("SELECT * FROM tentang_kami WHERE id = $id");
    $editData = $result->fetch_assoc();
}

if (isset($_POST['hapus_id'])) {
    $hapus_id = intval($_POST['hapus_id']);
    $mysqli->query("DELETE FROM tentang_kami WHERE id = $hapus_id");
    header("Location: kelola_tentang_kami.php?status=success");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sub_judul = $mysqli->real_escape_string($_POST['sub_judul']);
    $judul = $mysqli->real_escape_string($_POST['judul']);
    $deskripsi = $mysqli->real_escape_string($_POST['deskripsi']);
    $judul2 = $mysqli->real_escape_string($_POST['judul2']);
    $deskripsi2 = $mysqli->real_escape_string($_POST['deskripsi2']);
    $kontak_youtube = $mysqli->real_escape_string($_POST['kontak_youtube']);
    $kontak_facebook = $mysqli->real_escape_string($_POST['kontak_facebook']);
    $kontak_instagram = $mysqli->real_escape_string($_POST['kontak_instagram']);
    $kontak_wa = $mysqli->real_escape_string($_POST['kontak_wa']);
    $kontak_tiktok = $mysqli->real_escape_string($_POST['kontak_tiktok']);
    $kontak_twitter = $mysqli->real_escape_string($_POST['kontak_twitter']);
    $hubungi_kami = ''; // tambahkan default value jika belum dipakai di form

    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE tentang_kami SET 
                    sub_judul='$sub_judul', 
                    judul='$judul', 
                    deskripsi='$deskripsi',
                    judul2='$judul2',
                    deskripsi2='$deskripsi2',
                    kontak_youtube='$kontak_youtube',
                    kontak_facebook='$kontak_facebook',
                    kontak_instagram='$kontak_instagram',
                    kontak_twitter='$kontak_twitter',
                    kontak_tiktok='$kontak_tiktok',
                    kontak_wa='$kontak_wa'
                WHERE id=$id";
    } else {
        $sql = "INSERT INTO tentang_kami 
                    (sub_judul, judul, deskripsi, judul2, deskripsi2, kontak_youtube, kontak_facebook, kontak_instagram, kontak_twitter, kontak_tiktok, kontak_wa) 
                VALUES 
                    ('$sub_judul', '$judul', '$deskripsi', '$judul2', '$deskripsi2', '$kontak_youtube', '$kontak_facebook', '$kontak_instagram', '$kontak_twitter', '$kontak_tiktok', '$kontak_wa')";
    }

    if ($mysqli->query($sql) === TRUE) {
        header("Location: kelola_tentang_kami.php?status=success");
        exit;
    } else {
        echo "Error: " . $mysqli->error;
    }
}

$tabelData = $mysqli->query("SELECT * FROM tentang_kami ORDER BY id DESC");

include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen p-6">

    <section id="kelola_hero_section" class="bg-slate-100 w-full dark:bg-dark">
        <!-- Header disamakan -->
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-md p-4 flex justify-between items-center ml-64">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Tentang Kami</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>


        <!-- Konten disamakan dengan ml-64 dan pt-20 -->
        <div class="ml-64 pt-20 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <h1 class="text-xl font-semibold mb-6">Kelola Tentang Kami</h1>
            <form action="" method="post" class="space-y-4">
                <input type="hidden" name="id" value="<?= htmlspecialchars($editData['id'] ?? '') ?>">

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Sub Judul</label>
                        <input type="text" name="sub_judul"
                            value="<?= htmlspecialchars($editData['sub_judul'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Judul</label>
                        <input type="text" name="judul" value="<?= htmlspecialchars($editData['judul'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2" required>
                    </div>
                </div>

                <div>
                    <label class="block font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required
                        class="w-full border rounded px-3 py-2"><?= htmlspecialchars($editData['deskripsi'] ?? '') ?></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Judul 2</label>
                        <input type="text" name="judul2" value="<?= htmlspecialchars($editData['judul2'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Deskripsi 2</label>
                        <input type="text" name="deskripsi2"
                            value="<?= htmlspecialchars($editData['deskripsi2'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">YouTube</label>
                        <input type="text" name="kontak_youtube"
                            value="<?= htmlspecialchars($editData['kontak_youtube'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Instagram</label>
                        <input type="text" name="kontak_instagram"
                            value="<?= htmlspecialchars($editData['kontak_instagram'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Facebook</label>
                        <input type="text" name="kontak_facebook"
                            value="<?= htmlspecialchars($editData['kontak_facebook'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Tiktok</label>
                        <input type="text" name="kontak_tiktok"
                            value="<?= htmlspecialchars($editData['kontak_tiktok'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Twitter</label>
                        <input type="text" name="kontak_twitter"
                            value="<?= htmlspecialchars($editData['kontak_twitter'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block font-medium mb-1">WhatsApp</label>
                        <input type="text" name="kontak_wa"
                            value="<?= htmlspecialchars($editData['kontak_wa'] ?? '') ?>"
                            class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
            </form>

            <hr class="my-6">
            <h2 class="text-xl font-semibold mb-4">Data Tentang Kami</h2>
            <table class="w-full border text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-3 py-2">Sub Judul</th>
                        <th class="border px-3 py-2">Judul</th>
                        <th class="border px-3 py-2">Deskripsi</th>
                        <th class="border px-3 py-2">Judul 2</th>
                        <th class="border px-3 py-2">Deskripsi 2</th>
                        <th class="border px-3 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $tabelData->fetch_assoc()): ?>
                        <tr>
                            <td class="border px-3 py-2"><?= htmlspecialchars($row['sub_judul']) ?></td>
                            <td class="border px-3 py-2"><?= htmlspecialchars($row['judul']) ?></td>
                            <td class="border px-3 py-2"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
                            <td class="border px-3 py-2"><?= htmlspecialchars($row['judul2']) ?></td>
                            <td class="border px-3 py-2"><?= htmlspecialchars($row['deskripsi2']) ?></td>
                            <td class="border px-3 py-2">
                                <a href="?id=<?= $row['id'] ?>" class="text-blue-600 hover:underline">Edit</a>
                            <button onclick="konfirmasiHapus(<?= $row['id'] ?>)" class="text-red-600 hover:underline">Hapus</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Modal Berhasil -->
            <div id="modalBerhasil"
                class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-lg shadow-lg text-center w-96 p-6">
                    <h2 class="text-xl font-bold mb-4 text-green-600">Berhasil!</h2>
                    <p class="mb-4">Data telah berhasil disimpan.</p>
                    <button onclick="closeModal('modalBerhasil')"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Tutup</button>
                </div>
            </div>

            <!-- Modal Konfirmasi Hapus -->
            <div id="modalHapus"
                class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center hidden z-50">
                <div class="bg-white rounded-lg shadow-lg text-center w-96 p-6">
                    <h2 class="text-xl font-bold mb-4 text-red-600">Konfirmasi Hapus</h2>
                    <p class="mb-4">Yakin ingin menghapus data ini?</p>
                    <form id="hapusForm" method="post">
                        <input type="hidden" name="hapus_id" id="hapus_id">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Ya,
                            Hapus</button>
                        <button type="button" onclick="closeModal('modalHapus')"
                            class="ml-2 bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">Batal</button>
                    </form>
                </div>
            </div>

        </div>
    </section>

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

<script>
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}

// Modal berhasil tampil otomatis
<?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
        window.addEventListener('DOMContentLoaded', () => {
            openModal('modalBerhasil');
        });
    <?php endif; ?>

    // Modal hapus
    function konfirmasiHapus(id) {
        document.getElementById('hapus_id').value = id;
        openModal('modalHapus');
    }
</script>


    <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>