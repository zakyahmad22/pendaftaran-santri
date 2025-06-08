<?php
include 'header.php';
?>


<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<?php
include 'config.php'; // Pastikan ini adalah file koneksi database
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "ppdb_pondok"; // Ganti sesuai database kamu

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data hero section terbaru
$query = "SELECT * FROM hero_section ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);
$hero = $result->fetch_assoc();

// Ambil data about section terbaru
$queryAbout = mysqli_query($conn, "SELECT * FROM tentang_kami LIMIT 1");
$about = mysqli_fetch_assoc($queryAbout);

// Ambil data tentang kami
$query = mysqli_query($conn, "SELECT * FROM tentang_kami LIMIT 1");
$about = mysqli_fetch_assoc($query);

// Ambil data falsafah
$query = $mysqli->query("SELECT * FROM falsafah LIMIT 1");

if ($query && $query->num_rows > 0) {
  $falsafah = $query->fetch_assoc();
} else {
  // Jika tidak ada data, buat array kosong supaya tidak error
  $falsafah = [
    'judul_section' => '',
    'deskripsi_section' => '',
    'judul1' => '',
    'isi1' => '',
    'link1' => '#',
    'judul2' => '',
    'isi2' => '',
    'link2' => '#',
    'judul3' => '',
    'isi3' => '',
    'link3' => '#'
  ];
}

// Ambil data pendaftaran section
$pendaftaran = $mysqli->query("SELECT * FROM pendaftaran_section LIMIT 1")->fetch_assoc();

// Ambil data alumni
$alumniList = [];

$result = $mysqli->query("SELECT * FROM alumni ORDER BY id DESC");

if ($result) {
  while ($row = $result->fetch_assoc()) {
    $alumniList[] = $row;
  }
}

// Ambil data dari judul alumni
$judul = $mysqli->query("SELECT * FROM judul_alumni LIMIT 1")->fetch_assoc();

// Ambil data dari kontak kami
$query = $mysqli->query("SELECT * FROM kontak");

// Ambil data deskripsi kontak
$kontak_deskripsi = $mysqli->query("SELECT * FROM kontak_deskripsi LIMIT 1");
$data = $kontak_deskripsi->fetch_assoc();

// Ambil data lokasi section
$lokasi_section = $mysqli->query("SELECT * FROM lokasi_section LIMIT 1");
$lokasi = $lokasi_section->fetch_assoc();

?>

<!-- Hero Section Start -->
<section id="home" class="pt-36 dark:bg-dark">
  <div class="container">
    <div class="flex flex-wrap">
      <div class="w-full self-center px-4 lg:w-1/2 opacity-0 translate-y-10 transition-all duration-1000 ease-out"
        id="heroText">
        <h1 class="text-base font-semibold text-primary md:text-xl">
          <?= htmlspecialchars($hero['judul_kecil']) ?>
          <span class="mt-1 block text-4xl font-bold text-dark dark:text-white lg:text-5xl">
            <?= htmlspecialchars($hero['judul_besar']) ?>
          </span>
        </h1>
        <p class="mb-10 font-medium leading-relaxed text-secondary">
          <?= htmlspecialchars($hero['deskripsi']) ?>
        </p>
        <a href="<?= htmlspecialchars($hero['link_pendaftaran']) ?>"
          class="rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">
          Daftar Sekarang
        </a>
      </div>
      <div
        class="w-full self-end px-4 lg:w-1/2 opacity-0 translate-y-10 transition-all duration-1000 ease-out delay-200"
        id="heroImage">
        <div class="relative mt-10 lg:right-0 lg:mt-9">
          <img src="upload_hero_section/<?= htmlspecialchars($hero['gambar']) ?>" alt="Gambar Hero" width="400"
            height="400" class="relative z-10 mx-auto max-w-full" />
          <span class="absolute bottom-0 left-1/2 -translate-x-1/2 md:scale-125">
            <svg width="400" height="400" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
              <path fill="#14b8a6"
                d="M62.4,-52.5C73.7,-35.7,70.6,-10.1,64.2,13.4C57.9,37,48.2,58.5,32.2,65.9C16.1,73.3,-6.3,66.4,-27.2,56.4C-48,46.3,-67.3,33.1,-72.3,15.4C-77.3,-2.3,-67.9,-24.5,-53.4,-42.1C-39,-59.7,-19.5,-72.7,3,-75.2C25.6,-77.6,51.1,-69.4,62.4,-52.5Z"
                transform="translate(100 100) scale(1.1)" />
            </svg>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Hero Section End -->

<!-- About Section Start -->
<section id="about" class="pt-32 pb-10 dark:bg-dark">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-start">

      <!-- Bagian Kiri: Teks Pendaftaran Santri Baru -->
      <div class="w-full px-4 lg:w-1/2 opacity-0 translate-y-10 transition-all duration-700" data-animate>
        <h4 class="mb-3 text-lg font-bold uppercase text-primary">
          <?= htmlspecialchars($about['sub_judul']) ?>
        </h4>
        <h2 class="mb-5 max-w-md text-3xl font-bold text-dark dark:text-white lg:text-4xl">
          <?= htmlspecialchars($about['judul']) ?>
        </h2>
        <p class="max-w-xl text-base font-medium text-secondary lg:text-lg mb-4" style="text-align: justify;">
          <?= nl2br(htmlspecialchars($about['deskripsi'])) ?>
        </p>
      </div>

      <!-- Bagian Kanan: Hubungi Kami -->
      <div class="w-full px-4 lg:w-1/2 opacity-0 translate-y-10 transition-all duration-700" data-animate>

        <h3 class="mb-5 text-3xl font-bold text-dark dark:text-white lg:text-4xl">
          <?= isset($about['judul2']) ? htmlspecialchars($about['judul2']) : 'Hubungi Kami'; ?>
        </h3>
        <p class="mb-6 text-base font-medium text-secondary lg:text-lg" style="text-align: justify;">
          <?= isset($about['deskripsi2']) ? nl2br(htmlspecialchars($about['deskripsi2'])) : 'Silakan hubungi kami untuk informasi lebih lanjut.'; ?>
        </p>

        <div class="flex space-x-3">
          <!-- YouTube -->
          <a href="<?= htmlspecialchars($about['kontak_youtube']) ?>" target="_blank"
            class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>YouTube</title>
              <path
                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
            </svg>
          </a>

          <!-- Instagram -->
          <a href="<?= htmlspecialchars($about['kontak_instagram']) ?>" target="_blank"
            class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Instagram</title>
              <path
                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793 0 1.44.645 1.44 1.439z" />
            </svg>
          </a>

          <!-- Facebook (Heroicons) -->
          <a href="<?= htmlspecialchars($about['kontak_facebook']) ?>" target="_blank"
            class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="none"
              class="h-5 w-5">
              <path
                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54v-2.89h2.54v-2.205c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.774-1.63 1.566v1.874h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12z" />
            </svg>
          </a>

          <!-- TikTok -->
          <a href="<?= htmlspecialchars($about['kontak_tiktok']) ?>" target="_blank"
            class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>TikTok</title>
              <path
                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
            </svg>
          </a>

          <!-- Twitter -->
          <a href="<?= htmlspecialchars($about['kontak_twitter']) ?>" target="_blank"
            class="flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Twitter</title>
              <path
                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- About Section End -->

<!-- falsafah start -->

<style>
  .reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease;
  }

  .reveal.active {
    opacity: 1;
    transform: translateY(0);
  }
</style>

<section id="falsafah" class="pt-10 pb-10 dark:bg-dark">
  <div class="bg-slate-100 pt-10 pb-10 dark:bg-dark">
    <div class="container mx-auto text-center">
      <h1 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl reveal">
        <?= htmlspecialchars($falsafah['judul_section']) ?>
      </h1>
      <p class="text-md font-medium text-secondary md:text-lg reveal">
        <?= nl2br(htmlspecialchars($falsafah['deskripsi_section'])) ?>
      </p>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
        <!-- Kolom 1 -->
        <div class="bg-white p-6 rounded-lg shadow-md reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
            class="bi bi-file-earmark-text-fill mx-auto" viewBox="0 0 16 16">
            <path
              d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
          </svg>
          <h2 class="text-2xl font-bold font-sans mt-4 reveal"><?= htmlspecialchars($falsafah['judul1']) ?></h2>
          <p class="mt-2 reveal"><?= nl2br(htmlspecialchars($falsafah['isi1'])) ?></p>
          <a href="<?= htmlspecialchars($falsafah['link1']) ?>">
            <button
              class="rounded-full bg-primary mt-4 py-2 px-6 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg reveal">
              Baca Selengkapnya
            </button>
          </a>
        </div>

        <!-- Kolom 2 -->
        <div class="bg-white p-6 rounded-lg shadow-md reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
            class="bi bi-chat-square-text-fill mx-auto" viewBox="0 0 16 16">
            <path
              d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
          </svg>
          <h2 class="text-2xl font-bold font-sans mt-4 reveal"><?= htmlspecialchars($falsafah['judul2']) ?></h2>
          <p class="mt-2 reveal"><?= nl2br(htmlspecialchars($falsafah['isi2'])) ?></p>
          <a href="<?= htmlspecialchars($falsafah['link2']) ?>">
            <button
              class="rounded-full bg-primary mt-4 py-2 px-6 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg reveal">
              Baca Selengkapnya
            </button>
          </a>
        </div>

        <!-- Kolom 3 -->
        <div class="bg-white p-6 rounded-lg shadow-md reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
            class="bi bi-bag-dash-fill mx-auto" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M6 9.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z" />
          </svg>
          <h2 class="text-2xl font-bold font-sans mt-4 reveal"><?= htmlspecialchars($falsafah['judul3']) ?></h2>
          <p class="mt-2 reveal"><?= nl2br(htmlspecialchars($falsafah['isi3'])) ?></p>
          <a href="<?= htmlspecialchars($falsafah['link3']) ?>">
            <button
              class="rounded-full bg-primary mt-4 py-2 px-6 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg reveal">
              Baca Selengkapnya
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- falsafah end -->

<!-- Pendaftaran Section Start -->
<section id="clients" class="bg-slate-800 pt-36 pb-32 dark:bg-slate-300">
  <div class="container">
    <div class="w-full px-4">
      <div class="mx-auto mb-16 text-center reveal">
        <h4 class="mb-2 text-3xl font-bold text-primary reveal">
          <?= htmlspecialchars($pendaftaran['sub_judul']); ?>
        </h4>
        <h2 class="mb-4 text-3xl font-bold text-white dark:text-dark sm:text-4xl lg:text-5xl reveal">
          <?= htmlspecialchars($pendaftaran['judul']); ?>
        </h2>
        <p class="text-md font-medium text-secondary md:text-lg reveal">
          <?= htmlspecialchars($pendaftaran['deskripsi']); ?>
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Pendaftaran Section End -->


<!-- Alumni section Start -->

<style>
  .swiper {
    padding: 20px;
  }

  .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>

<section id="alumni" class="bg-slate-100 pt-36 pb-16 dark:bg-slate-800">
  <div class="w-full px-4 reveal">
    <div class="mx-auto mb-16 max-w-xl text-center reveal">
      <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl reveal">
        <span class="text-primary"><?= htmlspecialchars($judul['judul_tebal']) ?></span>
        <?= htmlspecialchars($judul['judul_biasa']) ?>
      </h2>
      <p class="text-md font-medium text-secondary md:text-lg reveal">
        <?= nl2br(htmlspecialchars($judul['deskripsi'])) ?>
      </p>

    </div>

    <!-- Swiper Container -->
    <div class="swiper alumniSwiper max-w-4xl mx-auto reveal">
      <div class="swiper-wrapper">
        <?php if (!empty($alumniList)): ?>
          <?php foreach ($alumniList as $alumni): ?>
            <div class="swiper-slide">
              <div class="flex bg-white rounded-lg shadow-md overflow-hidden">
                <div class="w-1/2">
                  <img src="dist/img/<?= htmlspecialchars($alumni['gambar']) ?>"
                    alt="<?= htmlspecialchars($alumni['nama']) ?>" class="object-cover w-full h-full" />
                </div>
                <div class="w-1/2 p-6">
                  <h2 class="text-xl font-bold text-gray-800"><?= htmlspecialchars($alumni['nama']) ?></h2>
                  <p class="text-gray-600 mb-2">Angkatan <?= htmlspecialchars($alumni['angkatan']) ?></p>
                  <p class="text-gray-500 text-sm"><?= nl2br(htmlspecialchars($alumni['deskripsi'])) ?></p>
                  <?php if (!empty($alumni['link_selengkapnya'])): ?>
                    <a href="<?= htmlspecialchars($alumni['link_selengkapnya']) ?>" target="_blank"
                      class="inline-block mt-4 text-sm font-medium text-primary hover:underline">
                      Baca Selengkapnya
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="swiper-slide text-center p-10">
            <p class="text-gray-500">Belum ada data alumni ditambahkan.</p>
          </div>
        <?php endif; ?>
      </div>

      <!-- Navigation and Pagination -->
      <div class="swiper-pagination mt-4"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>
</section>
<!-- Alumni section end -->

<!-- Contact Section Start -->
<section id="contact" class="pt-10 pb-10 bg-slate-100 dark:bg-slate-800">
  <div class="container mx-auto text-center">
    <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl reveal">
      <span class="text-primary"><?= htmlspecialchars($data['judul']) ?></span>
    </h2>
    <p class="text-md font-medium text-secondary md:text-lg reveal">
      <?= nl2br(htmlspecialchars($data['deskripsi'])) ?>
    </p>
    <div class="flex justify-center flex-wrap gap-4 mt-10 reveal">
      <?php while ($row = mysqli_fetch_assoc($query)): ?>
        <div class="bg-white dark:bg-slate-700 p-4 rounded-lg shadow-md text-center w-64 reveal">
          <div class="mb-3 reveal">
            <?= $row['icon'] ?>
          </div>
          <h4 class="text-secondary font-semibold reveal">
            <?= $row['nama'] ?>
          </h4>
          <p class="text-secondary reveal">
            <?= $row['jabatan'] ?>
          </p>
          <p class="text-secondary reveal">
            <?= $row['nomor_hp'] ?>
          </p>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<!-- Contact Section End -->

<!-- Lokasi Kami Start -->
<section id="lokasi" class="pt-36 pb-32 bg-slate-100 dark:bg-slate-800">
  <div class="container mx-auto text-center reveal">
    <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl reveal">
      <span class="text-primary"><?= htmlspecialchars($lokasi['judul_awal']); ?></span>
      <?= htmlspecialchars($lokasi['judul']); ?>
    </h2>

    <p class="text-md font-medium text-secondary md:text-lg reveal">
      <?= nl2br(htmlspecialchars($lokasi['deskripsi'])); ?>
    </p>
    <div class="flex justify-center flex-wrap gap-4 mt-10 reveal">
      <iframe src="<?= htmlspecialchars($lokasi['link_maps']); ?>" width="1000" height="450" frameborder="0"
        style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
      </iframe>
    </div>
  </div>
</section>
<!-- Lokasi Kami End -->


<!-- Contact Section End -->

<?php
include 'footer.php';
?>

<!-- Back to top Start -->
<a href="#home"
  class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
  id="to-top">
  <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
</a>
<!-- Back to top End -->

<script src="https://cdn.tailwindcss.com"></script>
<script src="dist/js/swiper.js"></script>


<script src="dist/js/script.js"></script>
<script src="dist/js/main.js"></script>
<script src="dist/js/reveal.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Swiper Init -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".alumniSwiper", {
      loop: true,
      spaceBetween: 30,
      speed: 1000, // ⏳ Transisi geser selama 1 detik (1000ms)
      autoplay: {
        delay: 5000, // ⏱️ Ganti slide tiap 5 detik
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  });
</script>


</body>