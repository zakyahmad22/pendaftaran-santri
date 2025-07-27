<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Santri Baru</title>
    <link href="dist/css/final.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="/pendaftaran-santri/dist/img/logo.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body>

    <!-- Header Start -->
    <header class="fixed top-0 left-0 z-10 flex w-full items-center bg-transparent">
        <div class="container">
            <div class="relative flex items-center justify-between">
                <div class="flex items-center">
                    <!-- <img src="dist/img/logo1.png" alt="Logo Al Muflihin" width="150" height="150" class="h-10 w-10 mr-2" /> -->
                    <img src="/pendaftaran-santri/dist/img/logo.png" alt="Logo Al Muflihin" width="50" height="50"
                        class="max-w-full h-auto" />
                    <a href="index.php" class="block py-6 text-lg font-bold text-primary">Al Muflihin</a>
                </div>
                <div class="flex items-center">
                    <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
                        <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                    </button>

                    <nav id="nav-menu"
                        class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark dark:shadow-slate-500 lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none lg:dark:bg-transparent">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="/pendaftaran-santri/index.php"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Beranda</a>
                            </li>
                            <!-- dropdown profile start -->
                            <li class="relative">
                                <button id="profileDropdownBtn"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white z-50">
                                    Profile
                                    <svg class="w-4 h-4 ml-1 mt-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <ul id="profileDropdown"
                                    class="absolute left-0 right-0 mt-2 hidden w-56 rounded-md bg-white shadow-lg opacity-0 transition-opacity duration-300 z-50 dark:bg-dark">
                                    <li class="group">
                                        <a href="/pendaftaran-santri/tentang.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Tentang Pondok
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/pengasuh.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Pengasuh Pondok
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/struktur_organisasi.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Struktur Organisasi
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/galeri.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Galeri
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- JavaScript untuk Dropdown Profile -->
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const profileBtn = document.getElementById("profileDropdownBtn");
                                    const profileMenu = document.getElementById("profileDropdown");

                                    profileBtn.addEventListener("click", function (event) {
                                        event.stopPropagation();
                                        profileMenu.classList.toggle("hidden");
                                        profileMenu.classList.toggle("opacity-0");
                                    });

                                    document.addEventListener("click", function (event) {
                                        if (!profileBtn.contains(event.target) && !profileMenu.contains(event.target)) {
                                            profileMenu.classList.add("hidden");
                                            profileMenu.classList.add("opacity-0");
                                        }
                                    });
                                });
                            </script>
                            <!-- dropdown profile end -->

                            <!-- dropdown pendaftaran start -->
                            <li class="relative">
                                <button id="pendaftaranDropdownBtn"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white z-50">
                                    Pendaftaran
                                    <svg class="w-4 h-4 ml-1 mt-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <ul id="pendaftaranDropdown"
                                    class="absolute left-0 right-0 mt-2 hidden w-60 rounded-md bg-white shadow-lg opacity-0 transition-opacity duration-300 z-50 dark:bg-dark">
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/pendaftaran_info.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Syarat Pendaftaran
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/alur_pendaftaran.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Alur Pendaftaran
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/biaya_pendaftaran_smp.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Biaya Pendaftaran SMP
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/biaya_pendaftaran_ma.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Biaya Pendaftaran MA
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/jadwal_pendaftaran.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Jadwal Pendaftaran
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- JavaScript untuk Dropdown -->
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const pendaftaranBtn = document.getElementById("pendaftaranDropdownBtn");
                                    const pendaftaranMenu = document.getElementById("pendaftaranDropdown");

                                    // Toggle dropdown saat tombol diklik
                                    pendaftaranBtn.addEventListener("click", function (event) {
                                        event.stopPropagation(); // Mencegah bubbling
                                        pendaftaranMenu.classList.toggle("hidden");
                                        pendaftaranMenu.classList.toggle("opacity-0");
                                    });

                                    // Tutup dropdown jika klik di luar menu
                                    document.addEventListener("click", function (event) {
                                        if (!pendaftaranBtn.contains(event.target) && !pendaftaranMenu.contains(event.target)) {
                                            pendaftaranMenu.classList.add("hidden");
                                            pendaftaranMenu.classList.add("opacity-0");
                                        }
                                    });
                                });
                            </script>
                            <!-- dropdown pendaftaran end -->


                            <li class="group">
                                <a href="/pendaftaran-santri/admin/informasi.php"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Informasi
                                </a>
                            </li>

                            <!-- menu dropdown akun start -->
                            <!-- Tambahkan ID ke button dan dropdown -->
                            <li class="relative">
                                <button id="contactDropdownBtn"
                                    class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white z-50 ">
                                    Akun
                                    <svg class="w-4 h-4 ml-1 mt-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <ul id="contactDropdown"
                                    class="absolute left-0 right-0 mt-2 hidden w-48 rounded-md bg-white shadow-lg opacity-0 transition-opacity duration-300 z-50 dark:bg-dark">
                                    <li class="group">
                                        <a href="/pendaftaran-santri/admin/login_admin.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Login Admin
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/login.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Login User
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="/pendaftaran-santri/register.php"
                                            class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">
                                            Registrasi
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Tambahkan JavaScript -->
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const dropdownBtn = document.getElementById("contactDropdownBtn");
                                    const dropdownMenu = document.getElementById("contactDropdown");

                                    // Toggle dropdown ketika tombol diklik
                                    dropdownBtn.addEventListener("click", function (event) {
                                        event.stopPropagation(); // Mencegah event bubbling
                                        dropdownMenu.classList.toggle("hidden");
                                        dropdownMenu.classList.toggle("opacity-0");
                                    });

                                    // Tutup dropdown jika klik di luar menu
                                    document.addEventListener("click", function (event) {
                                        if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                            dropdownMenu.classList.add("hidden");
                                            dropdownMenu.classList.add("opacity-0");
                                        }
                                    });
                                });
                            </script>
                            <!-- menu dropdown akun end -->


                            <li class="mt-3 flex items-center pl-8 lg:mt-0">

                                <div class="flex">
                                    <span class="mr-2 text-sm text-slate-500">light</span>
                                    <input type="checkbox" class="hidden" id="dark-toggle" />
                                    <label for="dark-toggle">
                                        <div
                                            class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                                            <div
                                                class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out">
                                            </div>
                                        </div>
                                    </label>
                                    <span class="ml-2 text-sm text-slate-500">dark</span>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <script src="dist/js/script.js"></script>

</body>

</html>