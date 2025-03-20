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
    <title>Pendaftaran Santri Baru</title>
    <!-- <link href="dist/css/final.css" rel="stylesheet" /> -->
    <link href="../dist/css/final.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script> -->
</head>

<body>

    <section id="tambah_informasi" class="bg-slate-100 w-full dark:bg-dark">
        <!-- <div class="container mx-auto px-4 max-w-3xl"> -->
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
                <!-- <h3 class="text-md font-medium text-secondary md:text-lg"></h3> -->
            </header>
            <!-- <div class="bg-gray-100 dark:bg-dark py-6 px-6 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-dark dark:text-white">Tambah Informasi</h2>
                <p class="text-md font-medium text-secondary md:text-lg">Silakan isi formulir di bawah untuk menambahkan
                    informasi baru.</p>
            </div> -->

            <div class="mt-8 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
                <h3 class="pb-3 text-xl font-medium md:text-lg text-dark dark:text-white">Silakan isi formulir di bawah
                    untuk menambahkan
                    informasi baru.</h3>
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
    <?php
    include '../config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $link = $_POST['link'];

        // Memeriksa apakah gambar sudah diupload dengan benar
        if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
            $gambar = $_FILES['gambar']['name'];
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($gambar);

            // Pindahkan file ke folder uploads
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                // Simpan data ke database
                $query = "INSERT INTO informasi (judul, deskripsi, gambar, link) VALUES ('$judul', '$deskripsi', '$gambar', '$link')";
                if (mysqli_query($mysqli, $query)) {
                    // Redirect ke halaman admin jika sukses
                    header("Location: informasi_admin.php?status=sukses");
                    exit(); // Menghindari pengiriman ulang form
                } else {
                    echo "Gagal menyimpan data: " . mysqli_error($mysqli);
                }
            } else {
                echo "Gagal mengunggah gambar.";
            }
        } else {
            echo "Error pada file upload.";
        }
    }
    ?>

</body>