<?php
include 'header.php';
?>
<script src="https://cdn.tailwindcss.com"></script>

<body class="pt-9 dark:bg-dark bg-opacity-10">
    <!-- Banner Gambar dengan Teks di Tengah -->
    <!-- <section id="pendaftaran" class="pt-20 h-screen bg-cover bg-center relative"
        style="background-image: url('dist/img/informasi2.JPG');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-white text-center">
            <h1 class="text-5xl font-bold mb-4">Pendaftaran Santri Baru Banget</h1>
            <p class="text-lg">Pondok Pesantren Al Muflihin - Tahun Ajaran 2025/2026</p>
        </div>
    </section> -->

    <section>
        <!-- Page Title -->
        <div class="bg-gray-100 dark:bg-dark py-16" data-aos="fade">
            <div class="container mx-auto px-4 max-w-3xl lg:max-w-5xl">
                <div class="breadcrumbs text-secondary dark:text-white pb-5">
                    <ol class="flex space-x-2 text-sm px-4">
                        <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                        <li class="current text-primary">Pendaftaran</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <style>
            .reveal-bottom {
                opacity: 0;
                transform: translateY(50px);
                transition: all 0.8s ease;
            }

            .reveal-bottom.active {
                opacity: 1;
                transform: translateY(0);
            }
        </style>

        <div
            class="container mx-auto px-4 py-10 bg-white rounded-xl shadow-md border border-gray-200 dark:bg-dark dark:border-slate-700 reveal-bottom">
            <div class="w-full">
                <div class="mx-auto mb-16 max-w-xl text-center">
                    <h2 class="mt-5 mb-5 text-3xl font-bold text-dark dark:text-white lg:text-4xl">
                        Formulir Pendaftaran Santri Baru Pondok Pesantren Al Muflihin Tahun 2025
                    </h2>
                    <p class="text-base font-medium text-secondary lg:text-lg">
                        Pondok Pesantren Al Muflihin menerima pendaftaran Santriwan dan Santriwati baru tahun ajaran
                        2024-2025. Berdomisili di Jl. Soekarno Hatta Blok Balong, Desa Gebang Ilir Kec. Gebang Kab.
                        Cirebon Jawa Barat 45191
                    </p>
                </div>
            </div>

            <form action="/pendaftaran-santri/proses/proses_pendaftaran.php" method="POST"
                class="w-full lg:mx-auto lg:w-2/3">
                <!-- Tanggal Pendaftaran -->
                <div class="mb-8 w-full px-4">
                    <label for="tanggal_pendaftaran" class="text-base font-bold text-primary">Tanggal
                        Pendaftaran</label>
                    <input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Nama Lengkap -->
                <div class="mb-8 w-full px-4">
                    <label for="nama_lengkap" class="text-base font-bold text-primary">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Username -->
                <div class="mb-8 w-full px-4">
                    <label for="username" class="text-base font-bold text-primary">Username</label>
                    <input type="text" id="username" name="username" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-8 w-full px-4">
                    <label for="tempat_lahir" class="text-base font-bold text-primary">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-8 w-full px-4">
                    <label for="tanggal_lahir" class="text-base font-bold text-primary">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Alamat Lengkap -->
                <div class="mb-8 w-full px-4">
                    <label for="alamat_lengkap" class="text-base font-bold text-primary">Alamat Lengkap</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" rows="4"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"></textarea>
                </div>

                <!-- Tinggal Bersama -->
                <div class="mb-8 w-full px-4">
                    <label for="tinggal_bersama" class="text-base font-bold text-primary">Tinggal Bersama</label>
                    <select id="tinggal_bersama" name="tinggal_bersama"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"
                        onchange="toggleInput(this, 'tinggal_bersama_lainnya')">
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Wali">Wali</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" id="tinggal_bersama_lainnya" name="tinggal_bersama_lainnya"
                        placeholder="Isi jika memilih Lainnya"
                        class="w-full mt-3 rounded-md bg-white p-3 text-gray-800 border border-gray-300 hidden">
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-8 w-full px-4">
                    <label for="jenis_kelamin" class="text-base font-bold text-primary">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Sekolah Terakhir -->
                <div class="mb-8 w-full px-4">
                    <label for="sekolah_terakhir" class="text-base font-bold text-primary">Sekolah Terakhir</label>
                    <input type="text" id="sekolah_terakhir" name="sekolah_terakhir"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Pernah Mondok -->
                <div class="mb-8 w-full px-4">
                    <label for="pernah_mondok" class="text-base font-bold text-primary">Pernah Mondok</label>
                    <select id="pernah_mondok" name="pernah_mondok"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>

                <!-- Nama Pondok Sebelumnya -->
                <div class="mb-8 w-full px-4">
                    <label for="nama_pondok_sebelumnya" class="text-base font-bold text-primary">Nama Pondok
                        Sebelumnya</label>
                    <input type="text" id="nama_pondok_sebelumnya" name="nama_pondok_sebelumnya"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Alamat Pondok Sebelumnya -->
                <div class="mb-8 w-full px-4">
                    <label for="alamat_pondok_sebelumnya" class="text-base font-bold text-primary">Alamat Pondok
                        Sebelumnya</label>
                    <textarea id="alamat_pondok_sebelumnya" name="alamat_pondok_sebelumnya" rows="4"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"></textarea>
                </div>

                <!-- Nama Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="nama_ayah" class="text-base font-bold text-primary">Nama Ayah</label>
                    <input type="text" id="nama_ayah" name="nama_ayah"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Nama Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="nama_ibu" class="text-base font-bold text-primary">Nama Ibu</label>
                    <input type="text" id="nama_ibu" name="nama_ibu"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tempat Lahir Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="tempat_lahir_ayah" class="text-base font-bold text-primary">Tempat Lahir Ayah</label>
                    <input type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tanggal Lahir Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="tanggal_lahir_ayah" class="text-base font-bold text-primary">Tanggal Lahir Ayah</label>
                    <input type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tempat Lahir Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="tempat_lahir_ibu" class="text-base font-bold text-primary">Tempat Lahir Ibu</label>
                    <input type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tanggal Lahir Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="tanggal_lahir_ibu" class="text-base font-bold text-primary">Tanggal Lahir Ibu</label>
                    <input type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Pekerjaan Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="pekerjaan_ayah" class="text-base font-bold text-primary">Pekerjaan Ayah</label>
                    <select id="pekerjaan_ayah" name="pekerjaan_ayah"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"
                        onchange="toggleInput(this, 'pekerjaan_ayah_lainnya')">
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Guru">Guru</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI/POLRI">TNI/POLRI</option>
                        <option value="Pensiunan">Pensiunan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" id="pekerjaan_ayah_lainnya" name="pekerjaan_ayah_lainnya"
                        placeholder="Isi jika memilih Lainnya"
                        class="w-full mt-3 rounded-md bg-white p-3 text-gray-800 border border-gray-300 hidden">
                </div>

                <!-- Pekerjaan Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="pekerjaan_ibu" class="text-base font-bold text-primary">Pekerjaan Ibu</label>
                    <select id="pekerjaan_ibu" name="pekerjaan_ibu"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"
                        onchange="toggleInput(this, 'pekerjaan_ibu_lainnya')">
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Guru">Guru</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI/POLRI">TNI/POLRI</option>
                        <option value="Pensiunan">Pensiunan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" id="pekerjaan_ibu_lainnya" name="pekerjaan_ibu_lainnya"
                        placeholder="Isi jika memilih Lainnya"
                        class="w-full mt-3 rounded-md bg-white p-3 text-gray-800 border border-gray-300 hidden">
                </div>

                <!-- Penghasilan Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="penghasilan_ayah" class="text-base font-bold text-primary">Penghasilan Ayah</label>
                    <select id="penghasilan_ayah" name="penghasilan_ayah"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Dibawah 1 Juta">Dibawah 1 Juta</option>
                        <option value="1-3 Juta">1-3 Juta</option>
                        <option value="3-5 Juta">3-5 Juta</option>
                        <option value="Di atas 5 Juta">Di atas 5 Juta</option>
                    </select>
                </div>

                <!-- Penghasilan Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="penghasilan_ibu" class="text-base font-bold text-primary">Penghasilan Ibu</label>
                    <select id="penghasilan_ibu" name="penghasilan_ibu"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Dibawah 1 Juta">Dibawah 1 Juta</option>
                        <option value="1-3 Juta">1-3 Juta</option>
                        <option value="3-5 Juta">3-5 Juta</option>
                        <option value="Di atas 5 Juta">Di atas 5 Juta</option>
                    </select>
                </div>

                <!-- Alamat Rumah -->
                <div class="mb-8 w-full px-4">
                    <label for="alamat_rumah" class="text-base font-bold text-primary">Alamat Rumah</label>
                    <textarea id="alamat_rumah" name="alamat_rumah" rows="4"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"></textarea>
                </div>

                <!-- No. HP Orang Tua -->
                <div class="mb-8 w-full px-4">
                    <label for="no_hp_ortu" class="text-base font-bold text-primary">No. HP Orang Tua</label>
                    <input type="text" id="no_hp_ortu" name="no_hp_ortu"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tombol Daftar -->
                <div class="w-full px-4 py-8">
                    <button type="submit"
                        class="rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">
                        Daftar
                    </button>
                </div>
            </form>

        </div>
    </section>

    <!-- Back to top Start -->
    <a href="#pendaftaran"
        class="fixed bottom-4 right-4 z-[9999] hidden h-14 w-14 items-center justify-center rounded-full bg-primary p-4 hover:animate-pulse"
        id="to-top">
        <span class="mt-2 block h-5 w-5 rotate-45 border-t-2 border-l-2"></span>
    </a>
    <!-- Back to top End -->

    <script src="dist/js/script.js"></script>

    <?php
    include 'footer.php';
    ?>

    <!-- isi jika milih lainnya -->
    <script>
        function toggleInput(selectElement, inputId) {
            var inputField = document.getElementById(inputId);
            if (selectElement.value === "Lainnya") {
                inputField.classList.remove("hidden");
                inputField.required = true;
            } else {
                inputField.classList.add("hidden");
                inputField.required = false;
                inputField.value = ""; // Reset input jika berubah pilihan
            }
        }
    </script>

    <script>
        // Form Start
        document.addEventListener("DOMContentLoaded", function () {
            const reveals = document.querySelectorAll(".reveal-bottom");

            const options = {
                threshold: 0.1,
            };

            const observer = new IntersectionObserver(function (entries, observer) {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("active");
                        observer.unobserve(entry.target); // Agar hanya animasi sekali
                    }
                });
            }, options);

            reveals.forEach((reveal) => {
                observer.observe(reveal);
            });
        });
        // Form End
    </script>

</body>

</html>