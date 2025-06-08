<?php
include 'header.php';
include 'config.php';

if (!isset($_GET['jenis'])) {
    echo "<p>Data tidak ditemukan.</p>";
    include 'footer.php';
    exit;
}

$jenis = $_GET['jenis'];
$stmt = $mysqli->prepare("SELECT * FROM tb_tentang_kami WHERE jenis = ? LIMIT 1");
$stmt->bind_param("s", $jenis);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<p>Data tidak ditemukan.</p>";
    include 'footer.php';
    exit;
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

<section class="pt-36 dark:bg-dark">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center mb-10 reveal">
            <h4 class="mb-3 text-lg font-bold uppercase text-primary"><?= htmlspecialchars($data['sub_judul']) ?></h4>
            <h2 class="text-3xl font-bold text-dark dark:text-white lg:text-4xl"><?= htmlspecialchars($data['judul']) ?>
            </h2>
        </div>

        <div class="mb-6 reveal-left">
            <img src="dist/img/<?= htmlspecialchars($data['gambar']) ?>" alt="<?= htmlspecialchars($data['judul']) ?>"
                class="mx-auto rounded-lg shadow-md w-full max-w-xl">
        </div>

        <div class="text-justify font-medium text-base text-secondary lg:text-lg leading-relaxed reveal-right"
            style="text-align: justify;">
            <?= nl2br(htmlspecialchars($data['deskripsi'])) ?>
        </div>
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