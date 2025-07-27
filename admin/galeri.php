<?php
include '../config.php';
include '../header.php';

// Ambil judul section galeri
$judul_galeri = $mysqli->query("SELECT judul_section FROM galeri ORDER BY urutan ASC LIMIT 1")->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Santri Baru</title>
    <link href="../dist/css/final.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <script>
        if (localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="dark:bg-dark bg-opacity-10">

    <!-- Section Galeri -->
    <section class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
        <!-- Page Title -->
        <div id="pageTitle" class="bg-gray-100 dark:bg-dark opacity-0 translate-y-10 transition-all duration-700">
            <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
                <div class="breadcrumbs text-secondary dark:text-white pb-5">
                    <ol class="flex space-x-2 text-sm px-4">
                        <li><a href="../index.php" class="hover:text-primary">Beranda |</a></li>
                        <li class="current text-primary">Galeri</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container max-w-6xl mx-auto px-4">
            <h1 id="judulGaleri"
                class="text-3xl font-bold text-center text-dark dark:text-white mb-12 opacity-0 translate-y-10 transition-all duration-700">
                <?= htmlspecialchars($judul_galeri['judul_section'] ?? 'Galeri Kegiatan Pondok Pesantren') ?>
            </h1>

            <div id="galeriGrid"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 opacity-0 translate-y-10 transition-all duration-700">
                <?php
                $result = $mysqli->query("SELECT * FROM galeri ORDER BY id DESC");
                while ($row = $result->fetch_assoc()):
                    ?>
                    <div class="relative overflow-hidden rounded-lg shadow group bg-white dark:bg-slate-800">
                        <img src="../dist/img/<?= htmlspecialchars($row['gambar']) ?>"
                            alt="<?= htmlspecialchars($row['deskripsi']) ?>"
                            class="w-full h-64 object-cover transform transition-transform duration-300 group-hover:scale-105 group-hover:brightness-90">

                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 text-white text-sm p-3
                            opacity-0 translate-y-full group-hover:opacity-100 group-hover:translate-y-0
                            transition-all duration-300">
                            <?= htmlspecialchars($row['deskripsi']) ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Animasi Masuk -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pageTitle = document.getElementById('pageTitle');
            const judul = document.getElementById('judulGaleri');
            const grid = document.getElementById('galeriGrid');

            setTimeout(() => {
                pageTitle.classList.remove('opacity-0', 'translate-y-10');
                pageTitle.classList.add('opacity-100', 'translate-y-0');
            }, 100);

            setTimeout(() => {
                judul.classList.remove('opacity-0', 'translate-y-10');
                judul.classList.add('opacity-100', 'translate-y-0');
            }, 400);

            setTimeout(() => {
                grid.classList.remove('opacity-0', 'translate-y-10');
                grid.classList.add('opacity-100', 'translate-y-0');
            }, 600);
        });
    </script>

    <?php include '../footer.php'; ?>
    <script src="../dist/js/script.js"></script>
</body>

</html>