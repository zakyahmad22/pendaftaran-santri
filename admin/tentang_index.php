<?php
include '../koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tentang_kami");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manajemen Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="p-6 bg-gray-100">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Tentang Kami</h1>
        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">Judul</th>
                    <th class="p-2 border">Deskripsi</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data)): ?>
                    <tr>
                        <td class="p-2 border"><?= htmlspecialchars($row['judul']) ?></td>
                        <td class="p-2 border"><?= htmlspecialchars(substr($row['deskripsi'], 0, 50)) ?>...</td>
                        <td class="p-2 border">
                            <a href="tentang_edit.php?id=<?= $row['id'] ?>"
                                class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>