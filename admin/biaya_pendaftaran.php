<?php
include '../header.php';
include '../config.php'; // pastikan koneksi DB ada
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
    <section class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
        <!-- Page Title -->
        <div class="bg-gray-100 dark:bg-dark">
            <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
                <div class="breadcrumbs text-secondary dark:text-white pb-3">
                    <ol class="flex space-x-2 text-sm px-4 pb-5">
                        <li><a href="../index.php" class="hover:text-primary">Beranda |</a></li>
                        <li class="current text-primary">Biaya Pendaftaran</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="container max-w-6xl mx-auto px-4">
            <!-- Judul -->
            <h1 id="judulBiaya"
                class="text-3xl font-bold text-center text-dark dark:text-white mb-12 opacity-0 translate-y-10 transition-all duration-700">
                Biaya Pendaftaran Santri Baru
            </h1>

            <!-- Biaya Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php
                $query = $mysqli->query("SELECT * FROM biaya_pendaftaran ORDER BY id ASC");
                while ($data = $query->fetch_assoc()):
                    ?>
                    <div class="biaya-card opacity-0 translate-y-10 transition-all duration-700 
                        bg-white dark:bg-slate-800 shadow-md border border-gray-200 dark:border-slate-700 
                        rounded-lg p-6 hover:scale-105 hover:shadow-xl transition duration-300 ease-in-out">
                        <h3 class="text-xl font-semibold text-dark dark:text-white mb-2 text-center">
                            <?= htmlspecialchars($data['jenis']) ?>
                        </h3>
                        <p class="text-primary text-2xl font-bold text-center mb-4">
                            <?= htmlspecialchars($data['nominal']) ?>
                        </p>
                        <p class="text-sm text-secondary dark:text-gray-300 text-center">
                            <?= htmlspecialchars($data['keterangan']) ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Tombol Aksi -->
            <div class="text-center mt-10">
                <a href="../form_pendaftaran.php"
                    class="inline-block bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-opacity-90 transition">
                    Lanjutkan Pendaftaran
                </a>
            </div>
        </div>
    </section>

    <!-- Animasi -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const judul = document.getElementById('judulBiaya');
            judul.classList.remove('opacity-0', 'translate-y-10');
            judul.classList.add('opacity-100', 'translate-y-0');

            const cards = document.querySelectorAll('.biaya-card');
            cards.forEach((card, i) => {
                setTimeout(() => {
                    card.classList.remove('opacity-0', 'translate-y-10');
                    card.classList.add('opacity-100', 'translate-y-0');
                }, 500 + i * 200);
            });
        });
    </script>

    <?php include '../footer.php'; ?>
</body>


<script src="../dist/js/script.js"></script>

</html>