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

<section id="about" class="pt-36 pb-32 dark:bg-dark">
    <!-- Page Title -->
    <div class="container bg-gray-100 dark:bg-dark py-16 reveal">
        <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
            <div class="breadcrumbs text-secondary dark:text-white pb-5">
                <ol class="flex space-x-2 text-sm px-4">
                    <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                    <li class="current text-primary">Tentang</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="container">
        <?php if ($data->num_rows === 0): ?>
            <div class="text-center text-gray-600 text-xl">Tidak ada data untuk jenis "<?= htmlspecialchars($jenis) ?>"
            </div>
        <?php endif; ?>

        <?php foreach ($data as $row): ?>
            <div
                class="container mx-auto flex flex-wrap items-center <?= ($row['jenis'] === 'visi_misi') ? 'reveal' : '' ?>">
                <?php if ($row['jenis'] === 'visi_misi'): ?>
                    <!-- Gambar Kiri -->
                    <div class="w-full px-4 lg:w-1/2 reveal-left">
                        <img src="dist/img/<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar <?= $row['judul'] ?>"
                            class="mx-auto max-w-full rounded-lg shadow-lg">
                    </div>
                    <!-- Teks Kanan -->
                    <div class="mt-10 mb-10 w-full px-4 lg:w-1/2">
                    <?php else: ?>
                        <!-- Teks Kiri -->
                        <div class="mb-10 mt-10 w-full px-4 lg:w-1/2 reveal">
                        <?php endif; ?>
                        <h4 class="mb-3 text-lg font-bold uppercase text-primary"><?= htmlspecialchars($row['sub_judul']) ?>
                        </h4>
                        <h2 class="mb-5 text-3xl font-bold text-dark dark:text-white lg:text-4xl">
                            <?= nl2br(htmlspecialchars($row['judul'])) ?>
                        </h2>
                        <p class="mb-4 text-base font-medium text-secondary lg:text-lg text-justify">
                            <?= substr(strip_tags($row['deskripsi']), 0, 150) ?>...
                        </p>
                        <?php if (!$jenis): ?>
                            <div class="mt-6">
                                <a href="tentang_detail.php?jenis=<?= urlencode($row['jenis']) ?>"
                                    class="rounded-lg bg-primary py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                    <?php if ($row['jenis'] !== 'visi_misi'): ?>
                        <!-- Gambar Kanan -->
                        <div class="w-full px-4 lg:w-1/2 reveal-right">
                            <img src="dist/img/<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar <?= $row['judul'] ?>"
                                class="mx-auto max-w-full rounded-lg shadow-lg">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
</section>

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