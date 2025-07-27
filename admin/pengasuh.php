<?php
include '../header.php';
include '../config.php'; // pakai config.php, bukan koneksi.php

// Ambil data pengasuh
$result = $mysqli->query("SELECT * FROM pengasuh LIMIT 1");
$data = $result->fetch_assoc();
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

    <!-- Section Pengasuh -->
    <section id="pengasuh" class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
        <!-- Page Title -->
        <div class="bg-gray-100 dark:bg-dark">
            <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
                <div class="breadcrumbs text-secondary dark:text-white pb-3">
                    <ol class="flex space-x-2 text-sm px-4 pb-5">
                        <li><a href="../index.php" class="hover:text-primary">Beranda |</a></li>
                        <li class="current text-primary">Profile Pengasuh</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Title -->
        <div class="container max-w-5xl mx-auto px-4">
            <!-- Judul -->
            <h1 id="judulPengasuh"
                class="text-3xl font-bold text-center text-dark dark:text-white mb-12 opacity-0 translate-y-10 transition-all duration-700">
                <?= htmlspecialchars($data['judul_section']) ?>
            </h1>

            <!-- Card Profil -->
            <div
                class="pengasuh-step opacity-0 translate-y-10 transition-all duration-700 bg-white dark:bg-slate-800 rounded-lg shadow-lg p-8 mb-10 hover:scale-105 hover:shadow-xl">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <img src="../dist/img/<?= htmlspecialchars($data['foto']) ?>" alt="Foto Pengasuh"
                        class="w-40 h-40 object-cover rounded-full shadow-md">
                    <div>
                        <h2 class="text-xl font-semibold text-dark dark:text-white">
                            <?= htmlspecialchars($data['nama']) ?>
                        </h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">
                            <?= htmlspecialchars($data['jabatan']) ?>
                        </p>
                        <p class="text-base text-secondary dark:text-gray-300 leading-relaxed">
                            <?= nl2br(htmlspecialchars($data['deskripsi'])) ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Visi Misi -->
            <div
                class="pengasuh-step opacity-0 translate-y-10 transition-all duration-700 bg-white dark:bg-slate-800 rounded-lg shadow p-6 mb-10 hover:scale-105 hover:shadow-xl">
                <h3 class="text-xl font-bold text-dark dark:text-white mb-4">Visi & Misi</h3>
                <p class="text-base text-secondary dark:text-gray-300 leading-relaxed mb-2">
                    <span class="font-semibold">Visi:</span> <?= nl2br(htmlspecialchars($data['visi'])) ?>
                </p>
                <p class="text-base text-secondary dark:text-gray-300 leading-relaxed">
                    <span class="font-semibold">Misi:</span> <?= nl2br(htmlspecialchars($data['misi'])) ?>
                </p>
            </div>

            <!-- Kutipan -->
            <div
                class="pengasuh-step opacity-0 translate-y-10 transition-all duration-700 text-center text-secondary italic text-lg text-gray-300 dark:text-gray-300 mb-10">
                <?= htmlspecialchars($data['kutipan']) ?>
                <div class="mt-2 text-sm font-medium text-dark dark:text-white">- <?= htmlspecialchars($data['nama']) ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Animasi Masuk -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const judul = document.getElementById('judulPengasuh');
            const steps = document.querySelectorAll('.pengasuh-step');

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

    <!-- Back to top Start -->
    <a href="#pengasuh"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- Back to top End -->

    <script src="../dist/js/script.js"></script>
    <script>
        // Tombol back to top
        const toTop = document.getElementById('to-top');

        // Tampilkan tombol saat scroll ke bawah
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                toTop.classList.remove('hidden');
                toTop.classList.add('flex');
            } else {
                toTop.classList.remove('flex');
                toTop.classList.add('hidden');
            }
        });

        // Smooth scroll ke atas saat diklik
        toTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

</body>

</html>