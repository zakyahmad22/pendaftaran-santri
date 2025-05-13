<?php
include 'header.php';
?>
<!-- Content Start -->
<!-- Blog Section Start -->
<section id="mottopondok" class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
    <!-- Page Title -->
    <div class="bg-gray-100 dark:bg-dark py-16">
        <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
            <div class="breadcrumbs text-secondary dark:text-white pb-3">
                <ol class="flex space-x-2 text-sm px-4 pb-5">
                    <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                    <li class="current text-primary">Motto Pondok</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <style>
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }

        .fade-in-up.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto mt-5 mb-16 max-w-xl text-center">
                <!-- <h4 class="mb-2 text-lg font-semibold text-primary">Blog</h4> -->
                <!-- <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">Panca Jiwa
                </h2> -->
                <!-- <p class="text-md font-medium text-secondary md:text-lg">Seluruh kehidupan di Pondok Modern Al Muflihin
                    didasarkan pada nilai-nilai kehidupan dalam Panca Jiwa.</p> -->
            </div>
            <div class="mt-5 mb-10">
                <!-- <h4 class="mb-2 text-lg font-semibold text-primary">Blog</h4> -->
                <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-3xl lg:text-4xl fade-in-up">Motto Pondok
                </h2>
                <p class="font-medium text-secondary md:text-lg fade-in-up" style="text-align: justify;">Pendidikan Pondok Modern
                    Darussalam Gontor menekankan pada pembentukan pribadi mukmin muslim yang berbudi tinggi, berbadan
                    sehat, berpengetahuan luas dan berpikiran bebas. Kriteria atau sifat-sifat utama ini merupakan moto
                    pendidikan di Pondok Modern Darussalam Gontor.</p>
            </div>
            <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-3xl lg:text-3xl fade-in-up">Motto Pondok dalam
                kehidupan Pondok Modern Al-Muflihin:
            </h2>
            <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-3xl lg:text-2xl fade-in-up">1. Berbudi tinggi
            </h2>
            <p class="font-medium text-secondary md:text-lg fade-in-up" style="text-align: justify;">Berbudi tinggi merupakan
                landasan paling utama yang ditanamkan oleh Pondok ini kepada seluruh santrinya dalam semua tingkatan;
                dari yang paling rendah sampai yang paling tinggi. Realisasi penanaman moto ini dilakukan melalui
                seluruh unsur pendidikan yang ada.</p>
            <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-3xl lg:text-2xl fade-in-up">2. Berbadan Sehat
            </h2>
            <p class="font-medium text-secondary md:text-lg fade-in-up" style="text-align: justify;">Tubuh yang sehat adalah sisi
                lain yang dianggap penting dalam pendidikan di Pondok ini. Dengan tubuh yang sehat para santri akan
                dapat melaksanakan tugas hidup dan beribadah dengan sebaik-baiknya. Pemeliharaan kesehatan dilakukan
                melalui berbagai kegiatan olahraga, dan bahkan ada olahraga rutin yang wajib diikuti oleh seluruh santri
                sesuai dengan jadwal yang telah ditetapkan.</p>
            <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-3xl lg:text-2xl fade-in-up">3. Berpengetahuan Luas
            </h2>
            <p class="font-medium text-secondary md:text-lg fade-in-up" style="text-align: justify;">Para santri di Pondok ini
                dididik melalui proses yang telah dirancang  secara sistematik untuk dapat memperluas wawasan dan
                pengetahuan mereka. Santri tidak hanya diajari pengetahuan, lebih dari itu mereka diajari cara belajar
                yang dapat digunakan untuk membuka gudang pengetahuan. Kyai sering berpesan bahwa pengetahuan itu luas,
                tidak terbatas, tetapi tidak boleh terlepas dari berbudi tinggi, sehingga seseorang itu tahu untuk apa
                ia belajar serta tahu prinsip untuk apa ia manambah ilmu.</p>
            <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-3xl lg:text-2xl fade-in-up">4. Berpikiran Bebas
                Islamiah
            </h2>
            <p class="font-medium text-secondary md:text-lg fade-in-up" style="text-align: justify;">Berpikiran bebas tidaklah
                berarti bebas sebebas-bebasnya (liberal). Kebebasan di sini tidak boleh menghilangkan prinsip,
                teristimewa prinsip sebagai muslim mukmin. Justru kebebasan di sini merupakan lambang kematangan dan
                kedewasaan dari hasil pendidikan yang telah diterangi petunjuk ilahi (hidayatullah). Moto ini ditanamkan
                sesudah santri memiliki budi tinggi atau budi luhur dan sesudah ia berpengetahuan luas.</p>
        </div>
    </div>
    </div>
</section>

<!-- Back to top Start -->
<a href="#mottopondok"
    class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
    id="to-top">
    <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
</a>
<!-- Back to top End -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const targets = document.querySelectorAll('.fade-in-up');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, {
            threshold: 0.1
        });

        targets.forEach(el => observer.observe(el));
    });
</script>

<?php
include 'footer.php';
?>