<?php
include 'header.php';
?>


<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Hero Section Start -->
<section id="home" class="pt-36 dark:bg-dark">
  <div class="container">
    <div class="flex flex-wrap">
      <div class="w-full self-center px-4 lg:w-1/2 opacity-0 translate-y-10 transition-all duration-1000 ease-out"
        id="heroText">
        <h1 class="text-base font-semibold text-primary md:text-xl">Pendaftaran Santri Baru<span
            class="mt-1 block text-4xl font-bold text-dark dark:text-white lg:text-5xl">Pondok Pesantren Al-Muflihin
          </span></h1>
        <p class="mb-10 font-medium leading-relaxed text-secondary">Tahun Ajaran 2025/2026 <span
            class="font-bold text-dark dark:text-white">membuka pendaftaran santri baru.</span>
          Daftar Sekarang!</span>
        </p>
        <a href="form_pendaftaran.php"
          class="rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">Daftar
          Sekarang</a>
      </div>
      <div
        class="w-full self-end px-4 lg:w-1/2 opacity-0 translate-y-10 transition-all duration-1000 ease-out delay-200"
        id="heroImage">
        <div class="relative mt-10 lg:right-0 lg:mt-9">
          <img src="dist/img/santri6.png" alt="santri2" width="400" height="400"
            class="relative z-10 mx-auto max-w-full" />
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
<section id="about" class="pt-10 pb-10 dark:bg-dark">
  <div class="container">
    <div class="flex flex-wrap">
      <div class="mb-10 w-full px-4 lg:w-1/2 opacity-0 translate-y-10 transition-all duration-700" data-animate>
        <h4 class="mb-3 text-lg font-bold uppercase text-primary">Tentang Kami</h4>
        <h2 class="mb-5 max-w-md text-3xl font-bold text-dark dark:text-white lg:text-4xl">Pendaftaran Santri Baru
        </h2>
        <p class="max-w-xl text-base font-medium text-secondary lg:text-lg">Pondok Pesantren Al-Muflihin membuka
          kesempatan bagi generasi muda untuk belajar ilmu agama dan umum. Segera daftarkan
          diri Anda dan jadilah bagian dari keluarga besar kami!</p>
      </div>
      <div class="w-full px-4 lg:w-1/2 opacity-0 translate-y-10 transition-all duration-700" data-animate>
        <h3 class="mb-4 text-2xl font-semibold text-dark dark:text-white lg:pt-10 lg:text-3xl">Hubungi Kami</h3>
        <p class="mb-6 text-base font-medium text-secondary lg:text-lg">
          Untuk informasi lebih lanjut mengenai pendaftaran atau informasi terkait Pondok Pesantren Al-Muflihin,
          silakan hubungi kami melalui media sosial atau datang
          langsung ke
          pondok pesantren.
        </p>
        <div class="flex items-center">
          <!-- Youtube -->
          <a href="https://https://www.youtube.com/@almuflihincirebon7929" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>YouTube</title>
              <path
                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
            </svg>
          </a>

          <!-- Instagram -->
          <a href="https://www.instagram.com/almuflihin_cirebon?igshid=MzRlODBiNWFlZA%3D%3D" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Instagram</title>
              <path
                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
            </svg>
          </a>

          <!-- Twitter -->
          <a href="https://twitter.com/almuflihin_crb" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Twitter</title>
              <path
                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
          </a>

          <!-- TikTok -->
          <a href="https://www.tiktok.com/@almuflihin_cirebon?lang=id-id&is_from_webapp=1&sender_device=mobile&sender_web_id=7192400905366537729"
            target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>TikTok</title>
              <path
                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
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

<section id="about" class="pt-10 pb-10 dark:bg-dark">
  <div class="bg-slate-100 pt-10 pb-10 dark:bg-dark">
    <div class="container mx-auto text-center">
      <h1 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl reveal">Falsafah Pondok</h1>
      <p class="text-md font-medium text-secondary md:text-lg reveal">
        Al Muflihin adalah Pondok Pesantren Modern dengan manhaj Darunnajah dan Gontor yang
        menyelenggarakan pendidikan untuk mengembangkan seluruh potensi para santri secara menyeluruh.
      </p>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
        <!-- Kolom 1: Panca Jiwa -->
        <div class="bg-white p-6 rounded-lg shadow-md reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
            class="bi bi-file-earmark-text-fill mx-auto" viewBox="0 0 16 16">
            <path
              d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />
          </svg>
          <h2 class="text-2xl font-bold font-sans mt-4 reveal">Panca Jiwa</h2>
          <p class="mt-2 reveal">
            Seluruh kehidupan di Pondok Modern Al Muflihin didasarkan pada nilai-nilai kehidupan dalam
            Panca Jiwa.
          </p>
          <a href="pancajiwa.php">
            <button
              class="rounded-full bg-primary mt-4 py-2 px-6 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg reveal">
              Baca Selengkapnya
            </button>
          </a>
        </div>

        <!-- Kolom 2: Motto Pondok -->
        <div class="bg-white p-6 rounded-lg shadow-md reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
            class="bi bi-chat-square-text-fill mx-auto" viewBox="0 0 16 16">
            <path
              d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
          </svg>
          <h2 class="text-2xl font-bold font-sans mt-4 reveal">Motto Pondok</h2>
          <p class="mt-2 reveal">
            Pendidikan Pondok Modern Al Muflihin menekankan pada pembentukan pribadi mukmin muslim.
          </p>
          <a href="mottopondok.php">
            <button
              class="rounded-full bg-primary mt-4 py-2 px-6 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg reveal">
              Baca Selengkapnya
            </button>
          </a>
        </div>

        <!-- Kolom 3: Visi & Misi -->
        <div class="bg-white p-6 rounded-lg shadow-md reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
            class="bi bi-bag-dash-fill mx-auto" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M6 9.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z" />
          </svg>
          <h2 class="text-2xl font-bold font-sans mt-4 reveal">Visi & Misi</h2>
          <p class="mt-2 reveal">
            Panca Jangka merupakan program kerja Pondok untuk mewujudkan upaya pengembangan dan pemajuan.
          </p>
          <a href="visimisi.php">
            <button
              class="rounded-full bg-primary mt-4 py-2 px-6 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg reveal">
              Baca Selengkapnya
            </button>
          </a>
        </div>
      </div>
    </div>
</section>
<!-- falsafah end -->

<!-- Clients Section Start -->
<section id="clients" class="bg-slate-800 pt-36 pb-32 dark:bg-slate-300 reveal">
  <div class="container">
    <div class="w-full px-4">
      <div class="mx-auto mb-16 text-center reveal">
        <h4 class="mb-2 text-3xl font-semibold text-primary reveal">Pendaftaran Santri Baru</h4>
        <h2 class="mb-4 text-3xl font-bold text-white dark:text-dark sm:text-4xl lg:text-5xl reveal">
          Pondok Pesantren Al-Muflihin
        </h2>
        <p class="text-md font-medium text-secondary md:text-lg reveal">
          "Bergabunglah bersama keluarga besar Pondok Pesantren Al-Muflihin dan jadilah bagian dari generasi islami yang
          berprestasi dan berakhlakul karimah."
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Clients Section End -->


<!-- Alumni section Start -->
<section id="contact" class="bg-slate-100 pt-36 pb-16 dark:bg-slate-800 m-0 p-0 overflow-hidden">
  <div class="w-full px-4">
    <div class="mx-auto mb-16 max-w-xl text-center reveal">
      <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl">
        <span class="mb-4 text-3xl font-bold sm:text-4xl lg:text-5xl text-primary">Alumni</span> Pondok Pesantren
        Al-Muflihin
      </h2>
      <p class="text-md font-medium text-secondary md:text-lg">
        Pusat Informasi Pondok Pesantren Al-Muflihin hadir untuk memberikan kemudahan akses informasi terkait
        pendaftaran santri baru, program pendidikan, jadwal kegiatan, dan fasilitas pondok.
      </p>
    </div>

    <div class="flex justify-center items-center reveal">
      <div class="bg-white shadow-lg rounded-lg w-full max-w-2xl relative reveal">
        <!-- Swiper -->
        <div class="swiper-container reveal">
          <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide reveal">
              <div class="flex">
                <div class="w-1/2 bg-gray-200 rounded-l-lg">
                  <img src="dist/img/zaky3.png" alt="Profile Image" class="w-full h-full object-cover rounded-l-lg" />
                </div>
                <div class="w-1/2 p-6">
                  <h2 class="text-2xl font-bold text-gray-800">Ahmad Zaky, S.Kom</h2>
                  <p class="text-gray-600">Angkatan 1990</p>
                  <p class="text-gray-500 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, error
                    doloribus ipsam illo non amet?</p>
                  <a href="#"
                    class="text-sm font-medium text-primary transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">Baca
                    Selengkapnya</a>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide reveal">
              <div class="flex">
                <div class="w-1/2 bg-gray-200 rounded-l-lg">
                  <img src="dist/img/zaky3.png" alt="Profile Image" class="w-full h-full object-cover rounded-l-lg" />
                </div>
                <div class="w-1/2 p-6">
                  <h2 class="text-2xl font-bold text-gray-800">John Doe, S.T.</h2>
                  <p class="text-gray-600">Angkatan 1995</p>
                  <p class="text-gray-500 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, error
                    doloribus ipsam illo non amet?</p>
                  <a href="#"
                    class="text-sm font-medium text-primary transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">Baca
                    Selengkapnya</a>
                </div>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide reveal">
              <div class="flex">
                <div class="w-1/2 bg-gray-200 rounded-l-lg">
                  <img src="dist/img/zaky3.png" alt="Profile Image" class="w-full h-full object-cover rounded-l-lg" />
                </div>
                <div class="w-1/2 p-6">
                  <h2 class="text-2xl font-bold text-gray-800">Jane Doe, S.E.</h2>
                  <p class="text-gray-600">Angkatan 2000</p>
                  <p class="text-gray-500 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, error
                    doloribus ipsam illo non amet?</p>
                  <a href="#"
                    class="text-sm font-medium text-primary transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">Baca
                    Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination reveal"></div>
        </div>

        <!-- Tombol Navigasi -->
        <div class="swiper-button-next reveal"></div>
        <div class="swiper-button-prev reveal"></div>
      </div>
    </div>
  </div>
</section>


<!-- Alumni section end -->

<!-- Contact Section Start -->
<section id="contact" class="pt-10 pb-10 bg-slate-100 dark:bg-slate-800">
  <div class="container mx-auto text-center">
    <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl reveal">
      <span class="mb-4 text-3xl font-bold sm:text-4xl lg:text-5xl text-primary">Hubungi</span> Kami
    </h2>
    <p class="text-md font-medium text-secondary md:text-lg reveal">
      Al Muflihin adalah Pondok Pesantren Modern dengan manhaj Darunnajah dan Gontor yang menyelenggarakan
      pendidikan untuk mengembangkan seluruh potensi para santri secara menyeluruh meliputi pembinaan skill,
      kecerdasan intelektual, kematangan emosi, dan sikap yang taat kepada Allah SWT.
    </p>
    <div class="flex justify-center flex-wrap gap-4 mt-10 reveal">
      <!-- Card 1 -->
      <div class="bg-white dark:bg-slate-700 p-4 rounded-lg shadow-md text-center w-64 reveal">
        <div class="mb-3 reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150"
            class="mx-auto text-slate-500 dark:text-slate-300" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            <path fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
          </svg>
        </div>
        <h4 class="text-lg font-semibold text-slate-800 dark:text-white reveal">Contact 1</h4>
        <p class="text-secondary reveal">Front End Developer</p>
        <div class="flex justify-center space-x-3 mt-3 reveal">
          <!-- Youtube -->
          <a href="https://www.youtube.com/@almuflihincirebon7929" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>YouTube</title>
              <path
                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
            </svg>
          </a>

          <!-- Instagram -->
          <a href="https://www.instagram.com/almuflihin_cirebon?igshid=MzRlODBiNWFlZA%3D%3D" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Instagram</title>
              <path
                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
            </svg>
          </a>

          <!-- Twitter -->
          <a href="https://twitter.com/almuflihin_crb" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Twitter</title>
              <path
                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
          </a>

          <!-- TikTok -->
          <a href="https://www.tiktok.com/@almuflihin_cirebon?lang=id-id&is_from_webapp=1&sender_device=mobile&sender_web_id=7192400905366537729"
            target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>TikTok</title>
              <path
                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-white dark:bg-slate-700 p-4 rounded-lg shadow-md text-center w-64 reveal">
        <div class="mb-3 reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150"
            class="mx-auto text-slate-500 dark:text-slate-300" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            <path fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
          </svg>
        </div>
        <h4 class="text-lg font-semibold text-slate-800 dark:text-white reveal">Contact 1</h4>
        <p class="text-secondary reveal">Back End Developer</p>
        <div class="flex justify-center space-x-3 mt-3 reveal">
          <!-- Youtube -->
          <a href="https://www.youtube.com/@almuflihincirebon7929" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>YouTube</title>
              <path
                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
            </svg>
          </a>

          <!-- Instagram -->
          <a href="https://www.instagram.com/almuflihin_cirebon?igshid=MzRlODBiNWFlZA%3D%3D" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Instagram</title>
              <path
                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
            </svg>
          </a>

          <!-- Twitter -->
          <a href="https://twitter.com/almuflihin_crb" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Twitter</title>
              <path
                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
          </a>

          <!-- TikTok -->
          <a href="https://www.tiktok.com/@almuflihin_cirebon?lang=id-id&is_from_webapp=1&sender_device=mobile&sender_web_id=7192400905366537729"
            target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>TikTok</title>
              <path
                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-white dark:bg-slate-700 p-4 rounded-lg shadow-md text-center w-64 reveal">
        <div class="mb-3 reveal">
          <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150"
            class="mx-auto text-slate-500 dark:text-slate-300" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            <path fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
          </svg>
        </div>
        <h4 class="text-lg font-semibold text-slate-800 dark:text-white reveal">Contact 1</h4>
        <p class="text-secondary reveal">Full Stack Developer</p>
        <div class="flex justify-center space-x-3 mt-3 reveal">
          <!-- Youtube -->
          <a href="https://www.youtube.com/@almuflihincirebon7929" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>YouTube</title>
              <path
                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
            </svg>
          </a>

          <!-- Instagram -->
          <a href="https://www.instagram.com/almuflihin_cirebon?igshid=MzRlODBiNWFlZA%3D%3D" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Instagram</title>
              <path
                d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
            </svg>
          </a>

          <!-- Twitter -->
          <a href="https://twitter.com/almuflihin_crb" target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Twitter</title>
              <path
                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
          </a>

          <!-- TikTok -->
          <a href="https://www.tiktok.com/@almuflihin_cirebon?lang=id-id&is_from_webapp=1&sender_device=mobile&sender_web_id=7192400905366537729"
            target="_blank"
            class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>TikTok</title>
              <path
                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
            </svg>
          </a>
        </div>
      </div>
      <!-- end card -->
    </div>

    <section id="lokasi" class="pt-36 pb-32 bg-slate-100 dark:bg-slate-800 reveal">
      <div class="container mx-auto text-center reveal">
        <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-5xl reveal">
          <span class="mb-4 text-3xl font-bold sm:text-4xl lg:text-5xl text-primary reveal">Lokasi</span> Kami
        </h2>
        <p class="text-md font-medium text-secondary md:text-lg reveal">
          Al Muflihin adalah Pondok Pesantren Modern dengan manhaj Darunnajah dan Gontor yang menyelenggarakan
          pendidikan untuk mengembangkan seluruh potensi para santri secara menyeluruh meliputi pembinaan
          skill,
          kecerdasan intelektual, kematangan emosi, dan sikap yang taat kepada Allah SWT.
        </p>
        <div class="flex justify-center flex-wrap gap-4 mt-10 reveal">
          <iframe
            src=https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5498457306826!2d108.74044787367052!3d-6.8244712931733265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0751d17aefcd%3A0x1c32cd5446d53dd9!2sPondok%20Pesantren%20Al%20Muflihin!5e0!3m2!1sid!2sid!4v1733900401006!5m2!1sid!2sid"
            width="1000" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
        </div>
      </div>
    </section>
  </div>
  </div>
</section>

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