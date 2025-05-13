<?php
include 'header.php';
?>
<!-- Content Start -->
<!-- Blog Section Start -->
<section id="visimisi" class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
    <!-- Page Title -->
    <div class="bg-gray-100 dark:bg-dark py-16">
        <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
            <div class="breadcrumbs text-secondary dark:text-white pb-3">
                <ol class="flex space-x-2 text-sm px-4 pb-5">
                    <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                    <li class="current text-primary">Visi & Misi</li>
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
                <!-- <h4 class="mb-2 text-lg font-semibold text-primary"></h4> -->
                <!-- <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">Panca Jiwa
                </h2> -->
                <!-- <p class="text-md font-medium text-secondary md:text-lg">Seluruh kehidupan di Pondok Modern Al Muflihin
                    didasarkan pada nilai-nilai kehidupan dalam Panca Jiwa.</p> -->
            </div>
            <div class="mt-5 mb-10">
                <!-- <h4 class="mb-2 text-lg font-semibold text-primary">Blog</h4> -->
                <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-3xl lg:text-4xl fade-in-up">Visi
                </h2>
                <p class="font-medium text-secondary md:text-lg fade-in-up" style="text-align: justify;">Menjadi
                    pesantren unggulan pencetak generasi sholeh, cerdas dan berprestasi.</p>
            </div>
            <div>
                <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-4xl fade-in-up">
                    Misi
                </h2>

                <div class="space-y-4 text-justify text-base font-medium text-secondary md:text-lg fade-in-up">
                    <p><span class="font-bold">1.</span> Menyelenggarakan pendidikan terpadu dengan mengintegrasikan
                        ilmu pengetahuan agama dan umum secara terpadu.</p>
                    <p><span class="font-bold">2.</span> Membina santri agar memiliki multi integritas (kecerdasan dan
                        integritas).</p>
                    <p><span class="font-bold">3.</span> Menumbuhkembangkan potensi santri guna memberikan sumbangsih
                        bagi umat dan bangsa.</p>
                    <p><span class="font-bold">4.</span> Membangun tradisi lingkungan pesantren yang berakhlakul karimah
                        serta mencetak kader-kader ulama dan mubaligh penerus para Nabi dan Rasul.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Back to top Start -->
<a href="#visimisi"
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