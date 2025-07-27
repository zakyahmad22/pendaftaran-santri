<?php
include 'header.php';
include 'config.php';

$jenis = isset($_GET['jenis']) ? $_GET['jenis'] : '';
if ($jenis) {
    $stmt = $mysqli->prepare("SELECT * FROM tb_tentang_kami WHERE jenis = ? LIMIT 1");
    $stmt->bind_param("s", $jenis);
    $stmt->execute();
    $data = $stmt->get_result();
} else {
    $data = $mysqli->query("SELECT * FROM tb_tentang_kami ORDER BY id ASC");
}
?>

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
        transition: all 0.8s ease;
    }

    .reveal-left.active {
        opacity: 1;
        transform: translateX(0);
    }
</style>

<body>

    <!-- Section Tentang Pondok -->
    <section id="about" class="bg-slate-100 pt-36 pb-32 dark:bg-dark">
        <!-- Page Title -->
        <div class="bg-gray-100 dark:bg-dark">
            <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
                <div class="breadcrumbs text-secondary dark:text-white pb-3">
                    <ol class="flex space-x-2 text-sm px-4 pb-5">
                        <li><a href="../index.php" class="hover:text-primary">Beranda |</a></li>
                        <li class="current text-primary">Tentang Pondok</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="container max-w-5xl mx-auto px-4">
            <?php if ($data->num_rows === 0): ?>
                <div class="text-center text-gray-600 text-xl">Tidak ada data untuk jenis "<?= htmlspecialchars($jenis) ?>"
                </div>
            <?php endif; ?>

            <?php foreach ($data as $row): ?>
                <div
                    class="tentang-step opacity-0 translate-y-10 transition-all duration-700 bg-white dark:bg-slate-800 rounded-lg shadow-lg p-8 mb-10 hover:scale-105 hover:shadow-xl flex flex-col lg:flex-row items-center gap-8">

                    <?php if ($row['jenis'] === 'visi_misi'): ?>
                        <!-- Gambar Kiri -->
                        <div class="w-full lg:w-1/2">
                            <img src="dist/img/<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar <?= $row['judul'] ?>"
                                class="w-full h-auto max-w-full rounded-lg shadow-md">
                        </div>
                        <!-- Teks Kanan -->
                        <div class="w-full lg:w-1/2">
                        <?php else: ?>
                            <!-- Teks Kiri -->
                            <div class="w-full lg:w-1/2">
                            <?php endif; ?>

                            <h4 class="mb-2 text-lg font-bold uppercase text-primary">
                                <?= htmlspecialchars($row['sub_judul']) ?>
                            </h4>
                            <h2 class="mb-4 text-2xl font-bold text-dark dark:text-white">
                                <?= nl2br(htmlspecialchars($row['judul'])) ?>
                            </h2>
                            <p class="text-base text-secondary dark:text-gray-300 leading-relaxed text-justify mb-4">
                                <?= substr(strip_tags($row['deskripsi']), 0, 150) ?>...
                            </p>
                            <?php if (!$jenis): ?>
                                <a href="tentang_detail.php?jenis=<?= urlencode($row['jenis']) ?>"
                                    class="inline-block mt-4 rounded-lg bg-primary py-2 px-6 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">
                                    Baca Selengkapnya
                                </a>
                            <?php endif; ?>
                        </div>

                        <?php if ($row['jenis'] !== 'visi_misi'): ?>
                            <!-- Gambar Kanan -->
                            <div class="w-full lg:w-1/2">
                                <img src="dist/img/<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar <?= $row['judul'] ?>"
                                    class="w-full h-auto max-w-full rounded-lg shadow-md">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
    </section>

    <!-- Animasi Masuk -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const steps = document.querySelectorAll('.tentang-step');

            steps.forEach((step, index) => {
                setTimeout(() => {
                    step.classList.remove('opacity-0', 'translate-y-10');
                    step.classList.add('opacity-100', 'translate-y-0');
                }, 300 + index * 200);
            });
        });
    </script>

    <script src="../dist/js/script.js"></script>




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

    <?php include 'footer.php'; ?>
</body>

</html>