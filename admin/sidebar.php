<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah pengguna adalah admin atau user
if ($_SESSION['role'] == 'admin') {
    $dashboard_title = "Admin Dashboard";
    $welcome_message = "Selamat datang, Admin " . $_SESSION['username'] . "!";
} else {
    $dashboard_title = "User Dashboard";
    $welcome_message = "Selamat datang, " . $_SESSION['username'] . "!";
}

if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];

$currentPage = basename($_SERVER['PHP_SELF']);

if (!function_exists('isActive')) {
    function isActive($page)
    {
        global $currentPage;
        return $currentPage === $page ? 'bg-gray-700 text-white-400' : '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .sidebar-collapsed .nav-text {
            display: none;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class="bg-gray-100 flex">
    <div class="flex min-h-screen">
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);

        function isActive($page)
        {
            global $currentPage;
            return $currentPage === $page ? 'bg-gray-700 text-white-400' : '';
        }
        ?>
        <div id="sidebar"
            class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 h-screen overflow-y-auto fixed top-0 left-0 z-50 transition-all duration-300">
            <div class="text-white flex items-center space-x-2 px-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span class="text-2xl font-bold nav-text">
                    <?php echo ucfirst($role); ?>
                </span>
            </div>
            <nav>
                <a href="/pendaftaran-santri/admin/admin_dashboard.php"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 <?php echo isActive('admin_dashboard.php'); ?>">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-3 nav-text">Dashboard</span>
                </a>

                <!-- Menu Dropdown Kelola Halaman (Tanpa Efek Glitz) -->
                <div x-data="{ open: window.location.pathname.includes('kelola_') }" class="space-y-1">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between py-2.5 px-4 rounded hover:bg-gray-600 text-white">
                        <div class="flex items-center space-x-2">
                            <!-- Icon Folder -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                            </svg>
                            <span>Kelola Halaman</span>
                        </div>
                        <!-- Icon panah -->
                        <svg :class="{ 'rotate-90': open }" class="w-4 h-4 transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <!-- Submenu -->
                    <div x-data="{ currentPath: window.location.pathname }" x-show="open" class="pl-8 space-y-1">
                        <template x-for="item in [
                                { href: 'kelola_hero_section.php', icon: 'sparkles', label: 'Hero Section' },
                                { href: 'kelola_tentang_kami.php', icon: 'information-circle', label: 'Tentang Kami' },
                                { href: 'kelola_pengasuh.php', icon: 'pengasuh', label: 'Pengasuh' },
                                { href: 'kelola_struktur_organisasi.php', icon: 'structure', label: 'Struktur Organisasi' },
                                { href: 'kelola_galeri.php', icon: 'photo', label: 'Galeri' },
                                { href: 'kelola_pendaftaran_info.php', icon: 'document-text', label: 'Info Pendaftaran' },
                                { href: 'kelola_alur_pendaftaran.php', icon: 'arrow-path', label: 'Alur Pendaftaran' },
                                { href: 'kelola_biaya_pendaftaran_smp.php', icon: 'academic-cap', label: 'Biaya SMP' },
                                { href: 'kelola_biaya_pendaftaran_ma.php', icon: 'building-library', label: 'Biaya MA' },
                                { href: 'kelola_jadwal_pendaftaran.php', icon: 'calendar-days', label: 'Jadwal Daftar' },
                                { href: 'kelola_falsafah.php', icon: 'book-open', label: 'Falsafah Pondok' },
                                { href: 'kelola_pendaftaran_section.php', icon: 'clipboard-list', label: 'Pendaftaran' },
                                { href: 'kelola_alumni.php', icon: 'users', label: 'Alumni' },
                                { href: 'kelola_kontak.php', icon: 'phone', label: 'Kontak' },
                                { href: 'kelola_lokasi_section.php', icon: 'location-marker', label: 'Lokasi' },
                                { href: 'kelola_tentang_pondok.php', icon: 'academic-cap', label: 'Tentang Pondok' }
                            ]" :key="item.href">
                            <a :href="item.href" :class="[
                                'flex items-center space-x-2 py-2 px-2 rounded transition-all',
                                currentPath.includes(item.href)
                                    ? 'bg-gray-700 text-white font-semibold'
                                    : 'text-white hover:bg-gray-600'
                            ]">

                                <!-- Icon Templates -->
                                <template x-if="item.icon === 'sparkles'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'information-circle'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'pengasuh'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'structure'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 6h16M4 12h8m-8 6h16" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'photo'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-3-3l2-2a2 2 0 012.828 0L20 14M4 6h16a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'document-text'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12h6m-6 4h6M7 8h10M4 6a2 2 0 012-2h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'arrow-path'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 4v6h6M20 20v-6h-6M4 10a8.003 8.003 0 0113.657-5.657L20 6M20 14a8.003 8.003 0 01-13.657 5.657L4 18" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'building-library'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 20h18M4 10h16M4 6h16M9 10v10m6-10v10M4 14h16" />
                                    </svg>
                                </template>


                                <template x-if="item.icon === 'calendar-days'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M8 7V3m8 4V3m-9 4h10M4 11h16M4 5h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'book-open'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 6v12M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'clipboard-list'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12h6M9 16h6M5 8h14M9 4h6a2 2 0 012 2v14a2 2 0 01-2 2H9a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'users'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17 20h5v-2a4 4 0 00-5-4m-8 6H3v-2a4 4 0 015-4m4-4a4 4 0 100-8 4 4 0 000 8zm6 4a4 4 0 00-3-3.87" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'phone'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'location-marker'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 11c1.38 0 2.5-1.12 2.5-2.5S13.38 6 12 6s-2.5 1.12-2.5 2.5S10.62 11 12 11z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z" />
                                    </svg>
                                </template>

                                <template x-if="item.icon === 'academic-cap'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-4-4h8" />
                                    </svg>
                                </template>

                                <!-- Label -->
                                <span x-text="item.label"></span>
                            </a>
                        </template>
                    </div>

                </div>

                <!-- dashboard admin start -->
                <?php if ($role === 'admin'): ?>
                    <a href="/pendaftaran-santri/admin/calon_santri.php"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 <?php echo isActive('calon_santri.php'); ?>">

                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        <spa n class="ml-3 nav-text">Daftar Santri</spa>
                    </a>
                    <a href="/pendaftaran-santri/admin/informasi_admin.php"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 <?php echo isActive('informasi_admin.php'); ?>">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>
                        <span class="ml-3 nav-text">Informasi</span>
                    </a>

                    <a href="/pendaftaran-santri/data_pengguna/data_pengguna.php"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 <?php echo isActive('data_pengguna.php'); ?>">

                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        <span class="ml-3 nav-text">Data Pengguna</span>
                    </a>

                    <a href="/pendaftaran-santri/admin/admin_status_update.php"
                        class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 <?php echo isActive('admin_status_update.php'); ?>">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>

                        <span class="ml-3 nav-text">Status Pendaftaran</span>
                    </a>
                <?php endif; ?>
                <a href="/pendaftaran-santri/admin/logout_admin.php"
                    class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                    </svg>
                    <span class="ml-3 nav-text">Log Out</span>
                </a>
            </nav>
        </div>
        <!-- dashboard user end -->

    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('#kelola_hero_section > div');
            const header = document.querySelector('#kelola_hero_section > header');

            if (sidebar.classList.contains('-ml-64')) {
                sidebar.classList.remove('-ml-64');
                mainContent.classList.add('ml-64');
                header.classList.add('ml-64');
            } else {
                sidebar.classList.add('-ml-64');
                mainContent.classList.remove('ml-64');
                header.classList.remove('ml-64');
            }
        }
    </script>

    <script src="dist/js/search.js"></script>


</body>

</html>