<?php
include '../config.php';
include '../sidebar.php';

$id = $_GET['id'] ?? '';
$editData = [];

if ($id) {
    $result = $mysqli->query("SELECT * FROM tentang_kami WHERE id = $id");
    $editData = $result->fetch_assoc();
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
                    (sub_judul, judul, deskripsi, judul2, deskripsi2, hubungi_kami, kontak_youtube, kontak_facebook, kontak_instagram, kontak_twitter, kontak_tiktok, kontak_wa) 
                VALUES 
                    ('$sub_judul', '$judul', '$deskripsi', '$judul2', '$deskripsi2', '$hubungi_kami', '$kontak_youtube', '$kontak_facebook', '$kontak_instagram', '$kontak_twitter', '$kontak_tiktok', '$kontak_wa')";
    }

    if ($mysqli->query($sql) === TRUE) {
        header("Location: kelola_tentang_kami.php");
        exit;
    } else {
        echo "Error: " . $mysqli->error;
    }
}

$tabelData = $mysqli->query("SELECT * FROM tentang_kami ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen p-6">

    <section id="kelola_hero_section" class="bg-slate-100 w-full dark:bg-dark">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Tentang Kami</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>
        <div class="bg-white shadow-md rounded p-6 max-w-6xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Kelola Tentang Kami</h1>
            <form action="" method="post" class="space-y-4">
                <input type="hidden" name="id" value="<?= htmlspecialchars($editData['id'] ?? '') ?>">

                <div>
                    <label class="block font-medium mb-1">Sub Judul</label>
                    <input type="text" name="sub_judul" value="<?= htmlspecialchars($editData['sub_judul'] ?? '') ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-medium mb-1">Judul</label>
                    <input type="text" name="judul" value="<?= htmlspecialchars($editData['judul'] ?? '') ?>"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-medium mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required
                        class="w-full border rounded px-3 py-2"><?= htmlspecialchars($editData['deskripsi'] ?? '') ?></textarea>
                </div>

                <div>
                    <label class="block font-medium mb-1">Judul 2</label>
                    <input type="text" name="judul2" value="<?= htmlspecialchars($editData['judul2'] ?? '') ?>"
                        class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-1">Deskripsi 2</label>
                    <input type="text" name="deskripsi2" value="<?= htmlspecialchars($editData['deskripsi2'] ?? '') ?>"
                        class="w-full border rounded px-3 py-2">
                </div>

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
                <div>
                    <label class="block font-medium mb-1">Twitter</label>
                    <input type="text" name="kontak_twitter"
                        value="<?= htmlspecialchars($editData['kontak_twitter'] ?? '') ?>"
                        class="w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block font-medium mb-1">WhatsApp</label>
                    <input type="text" name="kontak_wa" value="<?= htmlspecialchars($editData['kontak_wa'] ?? '') ?>"
                        class="w-full border rounded px-3 py-2">
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
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>
    
    <script>
        function toggleSidebar() {
            // Implement sidebar toggle functionality here
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

</body>

</html>