<?php
include '../header.php';
include '../config.php';
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

    <!-- Blog Section Start -->
    <section id="informasi" class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
        <!-- Page Title -->
        <div class="bg-gray-100 dark:bg-dark py-16">
            <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
                <div class="breadcrumbs text-secondary dark:text-white pb-3">
                    <ol class="flex space-x-2 text-sm px-4 pb-5">
                        <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                        <li class="current text-primary">Infomasi</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <style>
            @keyframes fadeInUp {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .fade-in-up {
                animation: fadeInUp 0.6s ease-out forwards;
                opacity: 0;
            }
        </style>

        <div class="container">
            <div class="w-full px-4 fade-in-up animate">
                <div class="mx-auto mt-5 mb-16 max-w-xl text-center">
                    <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">Informasi Terkini</h2>
                    <p class="text-md font-medium text-secondary md:text-lg">Pondok Pesantren Al-Muflihin sedang membuka pendaftaran untuk tahun akademik baru. Pesantren ini menyediakan kesempatan bagi siswa untuk mempelajari ilmu agama dan umum.</p>
                </div>
            </div>

            <div class="fade-in-up animate flex flex-wrap" id="informasi-container">
                <?php
                $result = mysqli_query($mysqli, "SELECT * FROM informasi ORDER BY id_info DESC");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='w-full px-4 lg:w-1/2 xl:w-1/3'>
                        <div class='fade-in-up animate mb-10 overflow-hidden rounded-xl bg-white shadow-lg dark:bg-slate-800'>
                            <img src='../uploads/{$row['gambar']}' alt='Informasi' class='w-full h-60 object-cover' />
                            <div class='py-8 px-6'>
                                <h3 class='mb-3 block truncate text-xl font-semibold text-dark dark:text-white'>{$row['judul']}</h3>
                                <p class='mb-6 text-base font-medium text-secondary'>" . substr($row['deskripsi'], 0, 100) . "...</p>
                                <a href='detail_informasi.php?id_info={$row['id_info']}' class='rounded-lg bg-primary py-2 px-4 text-sm font-medium text-white hover:opacity-80'>Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>

        </div>
    </section>
    <!-- Blog Section End -->

    <a href="#informasi"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>

    <script src="../dist/js/script.js"></script>
    <?php include '../footer.php'; ?>
</body>

</html>