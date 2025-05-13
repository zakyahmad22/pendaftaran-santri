<?php
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
    <link href="../dist/css/final.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="../dist/img/logo.png?v=1">
    <link rel="shortcut icon" type="image/png" href="../dist/img/logo.png?v=1">

    <!-- <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script> -->
</head>

<body>

    <section id="informasi_admin" class="bg-slate-100 w-full dark:bg-dark">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
            <h2 class="text-2xl font-bold text-gray-700">Kelola Informasi</h2>
            <h3 class="text-md font-medium text-secondary md:text-lg"></h3>
        </header>
        <div class="mt-8 bg-white p-6 rounded-lg shadow-lg dark:bg-slate-800">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-dark dark:text-white">Daftar Informasi</h3>
                <a href="tambah_informasi.php"
                    class="bg-primary text-white px-4 py-2 rounded-lg hover:opacity-80">Tambah Informasi</a>
            </div>

            <div class="overflow-x-auto">
                <h3 class="pb-3 text-xl font-medium md:text-lg text-dark dark:text-white">Halaman ini digunakan untuk
                    mengelola
                    informasi
                    yang ditampilkan pada website.</h3>
                <table class="w-full border-collapse border border-gray-200 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                            <th class="p-3 border border-gray-300 dark:border-gray-600">Gambar</th>
                            <th class="p-3 border border-gray-300 dark:border-gray-600">Judul</th>
                            <th class="p-3 border border-gray-300 dark:border-gray-600">Deskripsi</th>
                            <th class="p-3 border border-gray-300 dark:border-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($mysqli, "SELECT * FROM informasi ORDER BY id_info DESC");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                            <td class='p-3 border border-gray-300 dark:border-gray-600'>
                                <img src='../uploads/{$row['gambar']}' alt='Informasi' class='h-16 w-24 object-cover rounded'>
                            </td>
                            <td class='p-3 border border-gray-300 dark:border-gray-600'>{$row['judul']}</td>
                            <td class='p-3 border border-gray-300 dark:border-gray-600 truncate'>{$row['deskripsi']}</td>
                            <td class='p-3 border border-gray-300 dark:border-gray-600 flex space-x-2'>
                                <a href='edit_informasi.php?id_info={$row['id_info']}' class='bg-primary text-white px-3 py-1 rounded-lg hover:opacity-80'>Edit</a>
                                <a href='hapus_informasi.php?id_info={$row['id_info']}' class='bg-red-500 text-white px-3 py-1 rounded-lg hover:opacity-80' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                        </tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="text-dark p-4 text-center bottom-0">
            &copy; 2025 Pondok Pesantren Al-Muflihin | Gebang Ilir, Gebang, Cirebon Jawa Barat.
        </footer>

    </section>

</body>