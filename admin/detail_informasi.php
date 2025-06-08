<?php
include '../config.php';
include '../header.php';

if (isset($_GET['id_info'])) {
    $id_info = $_GET['id_info'];
    $query = "SELECT * FROM informasi WHERE id_info = '$id_info'";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<h2 class='text-center mt-20 text-xl font-semibold text-red-500'>Informasi tidak ditemukan.</h2>";
        include '../footer.php';
        exit();
    }
} else {
    echo "<h2 class='text-center mt-20 text-xl font-semibold text-red-500'>Halaman tidak valid.</h2>";
    include '../footer.php';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <title><?php echo $data['judul']; ?></title>
    <link href="../dist/css/final.css" rel="stylesheet">
</head>

<body class="bg-slate-100 dark:bg-dark">

    <section class="pt-36 pb-32 container mx-auto px-4 max-w-3xl">
        <!-- Page Title -->
        <div class="bg-gray-100 dark:bg-dark w-full flex mb-6 reveal">
            <div class="container mx-auto px-4 w-full lg:max-w-5xl">
                <div class="breadcrumbs text-secondary dark:text-white pb-5">
                    <ol class="flex space-x-2 text-sm">
                        <li><a href="../index.php" class="hover:text-primary">Beranda |</a></li>
                        <li class="current text-primary">Detail Informasi</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Title -->
        <!-- Gambar -->
        <div class="w-full flex justify-center mb-6">
            <img src="../uploads/<?php echo $data['gambar']; ?>" alt="Informasi"
                class="rounded-md object-cover w-full max-w-2xl max-h-64 shadow-md border border-gray-200 dark:border-slate-600">
        </div>

        <!-- Judul & Deskripsi -->
        <div class="px-2 md:px-4">
            <!-- Judul -->
            <h2 class="text-3xl font-bold text-dark dark:text-white mb-4">
                <?php echo $data['judul']; ?>
            </h2>

            <!-- Deskripsi -->
            <p class="text-base leading-relaxed text-secondary lg:text-lg dark:text-gray-300 text-left pb-5"
                style="text-align: justify;">
                <?php echo nl2br($data['deskripsi']); ?>
            </p>
        </div>
    </section>


    <?php include '../footer.php'; ?>
</body>

<script src="../dist/js/script.js"></script>

</html>