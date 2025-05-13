<?php
include 'header.php';
?>

<!-- Content Start -->

<style>
    .reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s ease;
    }

    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    .reveal-right {
        opacity: 0;
        transform: translateX(60px);
        transition: all 0.8s ease;
    }

    .reveal-right.active {
        opacity: 1;
        transform: translateX(0);
    }

    .reveal-left {
        opacity: 0;
        transform: translateX(-60px);
        /* Geser dari kiri */
        transition: all 0.8s ease;
    }

    .reveal-left.active {
        opacity: 1;
        transform: translateX(0);
    }
</style>


<section id="about" class="pt-36 dark:bg-dark">
    <div class="container">
        <div class="flex flex-wrap">
            <!-- Page Title -->
            <div class="bg-gray-100 dark:bg-dark py-16" data-aos="fade">
                <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
                    <div class="breadcrumbs text-secondary dark:text-white pb-3">
                        <ol class="flex space-x-2 text-sm px-4">
                            <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                            <li class="current text-primary">Tentang</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->
            <div class="container mx-auto flex flex-wrap items-center">
                <!-- Teks -->
                <div class="text-justify mb-10 mt-3 w-full px-4 lg:w-1/2 reveal">
                    <h4 class="mb-3 text-lg font-bold uppercase text-primary">Sejarah Tentang</h4>
                    <h2 class="mb-5 text-3xl font-bold text-dark dark:text-white lg:text-4xl">
                        Pondok Pesantren <br> Al-Muflihin
                    </h2>
                    <p class="mb-4 text-base font-medium text-secondary lg:text-lg" style="text-align: justify;">
                        Pondok pesantren Al Muflihin didirikan oleh salah satu ulama lulusan Pondok Pesantren
                        Darunnajah Jakarta yaitu Alm. Kyai M Rohmat Romdlon dengan dukungan istrinya Hj.Aisyah
                        dan juga mertuanya H.Syamsuri dan Hj.Suhanah, berdiri pada tahun 2003 dengan luas tanah
                        Wakaf ±3 Hektar. Pada saat ini Pondok Pesantren Al Muflihin dipimpin oleh Nyai Aisyah, S.
                        Ag Yang memiliki 100 santri dari berbagai daerah.
                    </p>
                    <!-- Tombol Baca Selengkapnya -->
                    <div class="mt-6">
                        <a href="sejarah.html"
                            class="inline-block rounded-lg bg-primary px-6 py-2 text-white font-semibold shadow-md hover:bg-blue-700 transition duration-300">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 reveal-right">
                    <img src="dist/img/informasi2.JPG" alt="Informasi Al-Muflihin"
                        class="mx-auto max-w-full rounded-lg shadow-lg">
                </div>
            </div>

            <div class="container mx-auto flex flex-wrap items-center reveal">
                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 reveal-left">
                    <img src="dist/img/informasi1.JPG" alt="Informasi Al-Muflihin"
                        class="mx-auto max-w-full rounded-lg shadow-lg">
                </div>
                <!-- Teks -->
                <div class="mt-10 mb-10 w-full px-4 lg:w-1/2">
                    <h4 class="mb-3 text-lg font-bold uppercase text-primary">Visi & Misi</h4>
                    <h2 class="mb-5 text-3xl font-bold text-dark dark:text-white lg:text-4xl">
                        Pondok Pesantren <br> Al-Muflihin
                    </h2>
                    <p class="mb-4 text-base font-medium text-secondary lg:text-lg" style="text-align: justify;">
                        Visi Pondok Pesantren Al Muflihin adalah menjadi lembaga pendidikan yang unggul dalam
                        pembentukan
                        kepribadian santri yang berakhlak mulia, berilmu, dan berwawasan global. Misi Pondok
                        Pesantren Al Muflihin adalah menjadi lembaga pendidikan yang unggul dalam pembentukan
                        kepribadian
                        santri
                        yang berakhlak mulia, berilmu, dan berwawasan global.
                    </p>
                    <!-- Tombol Baca Selengkapnya -->
                    <div class="mt-6">
                        <a href="sejarah.html"
                            class="inline-block rounded-lg bg-primary px-6 py-2 text-white font-semibold shadow-md hover:bg-blue-700 transition duration-300">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

            <div class="container mx-auto flex flex-wrap items-center">
                <!-- Teks -->
                <div class="mb-10 mt-10 w-full px-4 lg:w-1/2 reveal">
                    <h4 class="mb-3 text-lg font-bold uppercase text-primary">Fasilitas</h4>
                    <h2 class="mb-5 text-3xl font-bold text-dark dark:text-white lg:text-4xl">
                        Pondok Pesantren <br> Al-Muflihin
                    </h2>
                    <p class="mb-4 text-base font-medium text-secondary lg:text-lg" style="text-align: justify;">
                        Fasilitas yang dimiliki Pondok Pesantren Al Muflihin antara lain: Asrama, Masjid, Ruang Kelas,
                        Ruang
                        Perpustakaan, Ruang Makan, Lapangan Olahraga, dan lain-lain. Fasilitas yang dimiliki Pondok
                        Pesantren Al
                        Muflihin antara lain: Asrama, Masjid, Ruang Kelas, Ruang Perpustakaan, Ruang Makan, Lapangan
                        Olahraga,
                        dan
                        lain-lain.
                    </p>
                    <!-- Tombol Baca Selengkapnya -->
                    <div class="mt-6">
                        <a href="sejarah.html"
                            class="inline-block rounded-lg bg-primary px-6 py-2 text-white font-semibold shadow-md hover:bg-blue-700 transition duration-300">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 reveal-right">
                    <img src="dist/img/informasi3.JPG" alt="Informasi Al-Muflihin"
                        class="mx-auto max-w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content End -->

<!-- Back to top Start -->
<a href="#about"
    class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
    id="to-top">
    <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
</a>
<!-- Back to top End -->

<script src="dist/js/script.js"></script>

<script>
    function revealElements() {
        const reveals = document.querySelectorAll('.reveal, .reveal-right, .reveal-left');

        reveals.forEach(el => {
            const windowHeight = window.innerHeight;
            const elementTop = el.getBoundingClientRect().top;
            const revealPoint = 100;

            if (elementTop < windowHeight - revealPoint) {
                el.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', revealElements);
    window.addEventListener('load', revealElements);
</script>


<?php
include 'footer.php';
?>