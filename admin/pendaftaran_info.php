<?php
include '../header.php';
include '../config.php';

// Ambil data dari database
$judulResult = $mysqli->query("SELECT isi FROM pendaftaran_info WHERE tipe = 'judul' LIMIT 1");
$judul = ($judulResult && $judulResult->num_rows > 0) ? $judulResult->fetch_assoc()['isi'] : 'Judul Tidak Ditemukan';

$syarat = $mysqli->query("SELECT isi FROM syarat_pendaftaran ORDER BY id ASC");
$tatacara = $mysqli->query("SELECT isi FROM tatacara_pendaftaran ORDER BY id ASC");
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
                        <li class="current text-primary">Informasi Pendaftaran</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="container max-w-6xl mx-auto px-4">
            <!-- Judul -->
            <h1 id="judulPendaftaran"
                class="text-3xl font-bold text-center text-dark dark:text-white mb-12 opacity-0 translate-y-10 transition-all duration-700">
                <?= htmlspecialchars($judul) ?>
            </h1>


            <!-- Dua Card Samping-sampingan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Persyaratan -->
                <div
                    class="pendaftaran-step opacity-0 translate-y-10 transition-all duration-700 bg-white dark:bg-slate-800 shadow-md border border-gray-200 dark:border-slate-700 rounded-lg p-6 hover:scale-105 hover:shadow-xl">
                    <h2 class="text-2xl font-semibold text-dark dark:text-white mb-4">Persyaratan Pendaftaran</h2>
                    <ul
                        class="list-disc list-inside space-y-3 text-base text-secondary dark:text-gray-300 leading-relaxed">
                        <?php while ($row = $syarat->fetch_assoc()): ?>
                            <li><?= htmlspecialchars($row['isi']) ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>

                <!-- Tata Cara -->
                <div
                    class="pendaftaran-step opacity-0 translate-y-10 transition-all duration-700 bg-white dark:bg-slate-800 shadow-md border border-gray-200 dark:border-slate-700 rounded-lg p-6 hover:scale-105 hover:shadow-xl">
                    <h2 class="text-2xl font-semibold text-dark dark:text-white mb-4">Tata Cara Pendaftaran</h2>
                    <ol
                        class="list-decimal list-inside space-y-3 text-base text-secondary dark:text-gray-300 leading-relaxed">
                        <?php while ($row = $tatacara->fetch_assoc()): ?>
                            <li><?= htmlspecialchars($row['isi']) ?></li>
                        <?php endwhile; ?>
                    </ol>
                </div>
            </div>

            <!-- Checkbox dan Tombol -->
            <form onsubmit="return validateCheckbox()" action="../form_pendaftaran.php" method="GET"
                class="mt-10 text-center">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="setuju" class="form-checkbox text-primary mr-2">
                    <span class="text-sm text-secondary dark:text-gray-300">
                        Saya telah membaca dan menyetujui semua persyaratan dan tata cara pendaftaran.
                    </span>
                </label>

                <div class="mt-6">
                    <button type="submit"
                        class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-opacity-90 transition">
                        Lanjutkan Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        // Animasi ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('judulPendaftaran').classList.remove('opacity-0', 'translate-y-10');
            document.querySelectorAll('.pendaftaran-step').forEach(card => {
                card.classList.remove('opacity-0', 'translate-y-10');
            });
        });
    </script>


    <!-- Modal -->
    <div id="modalAlert" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div
            class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-lg text-center max-w-sm mx-auto border border-gray-200 dark:border-slate-700">
            <h3 class="text-lg font-bold text-dark dark:text-white mb-2">Peringatan</h3>
            <p class="text-sm text-secondary dark:text-gray-300 mb-4">Silakan centang persetujuan terlebih dahulu.</p>
            <button onclick="closeModal()"
                class="bg-primary text-white px-4 py-2 rounded hover:bg-opacity-90 transition">
                Oke
            </button>
        </div>
    </div>

    <script>
        function validateCheckbox() {
            const checkbox = document.getElementById('setuju');
            if (!checkbox.checked) {
                document.getElementById('modalAlert').classList.remove('hidden');
                return false;
            }
            return true;
        }

        function closeModal() {
            document.getElementById('modalAlert').classList.add('hidden');
        }

        // Trigger animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const section = document.getElementById('animateSection');
            section.classList.remove('opacity-0', 'translate-y-10');
            section.classList.add('opacity-100', 'translate-y-0');
        });
    </script>

    <?php include '../footer.php'; ?>
</body>

<script src="../dist/js/script.js"></script>

</html>