<?php
include '../header.php';
include '../config.php';

$data = $mysqli->query("SELECT * FROM struktur_organisasi LIMIT 1")->fetch_assoc();
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

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body>

    <!-- Section Struktur Organisasi -->
    <section class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
        <!-- Page Title -->
        <div id="pageTitle" class="bg-gray-100 dark:bg-dark opacity-0 translate-y-10 transition-all duration-700">
            <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
                <div class="breadcrumbs text-secondary dark:text-white pb-3">
                    <ol class="flex space-x-2 text-sm px-4 pb-5">
                        <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                        <li class="current text-primary">Struktur Organisasi</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="container max-w-5xl mx-auto px-4">
            <!-- Judul -->
            <h1 id="judulStruktur"
                class="text-3xl font-bold text-center text-dark dark:text-white mb-12 opacity-0 translate-y-10 transition-all duration-700">
                <?= htmlspecialchars($data['judul']) ?>
            </h1>

            <!-- Card Struktur -->
            <div
                class="struktur-step opacity-0 translate-y-10 transition-all duration-700 bg-white dark:bg-slate-800 rounded-lg shadow-lg p-8 mb-10 hover:scale-105 hover:shadow-xl">
                <p class="text-base text-secondary dark:text-gray-300 leading-relaxed text-center">
                    <?= nl2br(htmlspecialchars($data['deskripsi'])) ?>
                </p>

                <!-- Gambar Visual -->
                <div class="mt-10 text-center">
                    <img src="../dist/img/<?= htmlspecialchars($data['gambar']) ?>" alt="Struktur Organisasi"
                        class="mx-auto max-w-full rounded-lg shadow border dark:border-slate-700 mt-4 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <p class="text-sm text-gray-500 mt-2 dark:text-gray-400">Gambaran visual struktur organisasi.</p>
                </div>
            </div>
        </div> 
    </section>

    <!-- Animasi muncul dari bawah page title-->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pageTitle = document.getElementById('pageTitle');

            setTimeout(() => {
                pageTitle.classList.remove('opacity-0', 'translate-y-10');
                pageTitle.classList.add('opacity-100', 'translate-y-0');
            }, 100);
        });
    </script>

    <!-- Animasi Masuk -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const judul = document.getElementById('judulStruktur');
            const steps = document.querySelectorAll('.struktur-step');

            setTimeout(() => {
                judul.classList.remove('opacity-0', 'translate-y-10');
                judul.classList.add('opacity-100', 'translate-y-0');
            }, 100);

            steps.forEach((step, index) => {
                setTimeout(() => {
                    step.classList.remove('opacity-0', 'translate-y-10');
                    step.classList.add('opacity-100', 'translate-y-0');
                }, 400 + index * 200);
            });
        });
    </script>

    <?php include '../footer.php'; ?>
    <script src="../dist/js/script.js"></script>

</body>

</html>