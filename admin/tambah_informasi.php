<?php
ob_start(); // Memulai output buffering
include '../config.php';
include '../sidebar.php';
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Informasi</title>
    <link href="../dist/css/final.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <section id="tambah_informasi" class="bg-slate-100 w-full dark:bg-dark min-h-screen">
        <div class="flex-1">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </button>
                <h2 class="text-2xl font-bold text-gray-700">Tambah Informasi</h2>
                <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
            </header>

            <div class="mt-8 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
                <h3 class="pb-3 text-xl font-medium md:text-lg text-dark dark:text-white">
                    Silakan isi formulir di bawah untuk menambahkan informasi baru.
                </h3>
                <form action="tambah_informasi.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="block text-dark dark:text-white font-medium mb-2">Gambar</label>
                        <input type="file" name="gambar"
                            class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-dark dark:text-white font-medium mb-2">Judul</label>
                        <input type="text" name="judul"
                            class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-dark dark:text-white font-medium mb-2">Deskripsi</label>
                        <textarea name="deskripsi"
                            class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white" rows="4"
                            required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-dark dark:text-white font-medium mb-2">Link</label>
                        <input type="text" name="link"
                            class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="submit"
                            class="bg-primary text-white px-4 py-2 rounded-lg hover:opacity-80">Simpan</button>
                        <a href="informasi_admin.php"
                            class="bg-primary text-white px-4 py-2 rounded-lg hover:opacity-80">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Modal Sukses -->
    <div id="successModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300 z-50">
        <div id="modalContent"
            class="bg-white p-6 rounded-lg shadow-lg text-center w-96 transform scale-95 opacity-0 transition-all duration-300">
            <h2 class="text-xl font-bold text-green-600 mb-2">Berhasil!</h2>
            <p class="text-gray-700 mb-4">Informasi berhasil ditambahkan.</p>
            <button onclick="closeModal()"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tutup</button>
        </div>
    </div>

    <script>
        function closeModal() {
            const modal = document.getElementById('successModal');
            const content = document.getElementById('modalContent');
            content.classList.remove('opacity-100', 'scale-100');
            content.classList.add('opacity-0', 'scale-95');
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('pointer-events-none');
                window.history.replaceState(null, null, window.location.pathname);
            }, 300);
        }

        <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
            window.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('successModal');
                const content = document.getElementById('modalContent');
                modal.classList.remove('opacity-0', 'pointer-events-none');
                modal.classList.add('opacity-100');
                content.classList.remove('opacity-0', 'scale-95');
                content.classList.add('opacity-100', 'scale-100');
            });
        <?php endif; ?>
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $link = $_POST['link'];

        if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
            $gambar = $_FILES['gambar']['name'];
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($gambar);

            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $query = "INSERT INTO informasi (judul, deskripsi, gambar, link) VALUES ('$judul', '$deskripsi', '$gambar', '$link')";
                if (mysqli_query($mysqli, $query)) {
                    header("Location: tambah_informasi.php?status=sukses");
                    exit();
                } else {
                    echo "<script>alert('Gagal menyimpan data: " . mysqli_error($mysqli) . "');</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah gambar.');</script>";
            }
        } else {
            echo "<script>alert('Error pada file upload.');</script>";
        }
    }
    ?>

</body>

</html>