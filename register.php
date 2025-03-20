<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/register.css">
</head>

<body class="bg-gray-100">

    <style>
        /* Custom CSS untuk gambar */
        .bg-cover {
            background-size: cover;
            background-position: center;
        }

        /* Custom CSS untuk tombol */
        button:hover {
            transition: background-color 0.3s ease;
        }
    </style>

    <!-- Container -->

    <section id="blog" class="bg-slate-100 pt-5 pb-5 dark:bg-dark">
        <div class="container mx-auto">

            <div class="flex flex-wrap mt-20">
                <!-- Page Title -->
                <div class="container mx-auto max-w-3xl lg:max-w-5xl">
                    <div class="breadcrumbs text-secondary dark:text-white">
                        <ol class="flex space-x-2 text-sm px-1 pb-5">
                            <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                            <li class="current text-primary">Register</li>
                        </ol>
                    </div>
                </div>
                <!-- End Page Title -->
                <!-- Gambar Registrasi (Hanya tampil di desktop) -->
                <div class="hidden md:block md:w-1/2 bg-cover bg-center min-h-screen"
                    style="background-image: url('dist/img/logo2.png');"></div>

                <!-- Form Registrasi -->
                <div class="w-full md:w-1/2 p-3 mb-12 px-5">
                    <form method="POST" action="proses/proses_register.php" class="space-y-6">
                        <h1 class="text-dark dark:text-white text-3xl font-bold mb-8">Halaman Registrasi</h1>

                        <!-- Input Username -->
                        <div>
                            <input type="text" id="username" name="username" placeholder="Username"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:border-primary focus:ring-primary">
                        </div>

                        <!-- Input Email -->
                        <div>
                            <input type="email" id="email" name="email" placeholder="Email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:border-primary focus:ring-primary">
                        </div>

                        <!-- Input Password -->
                        <div>
                            <input type="password" id="password" name="password" placeholder="Password"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:border-primary focus:ring-primary">
                        </div>

                        <!-- Input Konfirmasi Password -->
                        <div>
                            <input type="password" id="confirm_password" name="confirm_password"
                                placeholder="Konfirmasi Password"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:border-primary focus:ring-primary">
                        </div>

                        <!-- Tombol Registrasi -->
                        <div>
                            <button type="submit" name="register"
                                class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:opacity-80 focus:outline-none focus:ring-2">
                                Daftar
                            </button>
                        </div>

                        <!-- Link ke Halaman Login -->
                        <p class="text-center text-gray-600">
                            Sudah punya akun?
                            <a href="login.php" class="text-primary hover:underline">Login</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>

</html>