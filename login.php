<?php
include 'header.php';
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles/login.css">
</head>

<body class="bg-gray-100">

    <style>
        /* Custom CSS untuk gambar login */
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
                            <li class="current text-primary">Login</li>
                        </ol>
                    </div>
                </div>
                <!-- End Page Title -->
                <!-- Gambar Login (Tampil hanya di desktop) -->
                <div class="hidden md:block md:w-1/2 bg-cover bg-center min-h-screen"
                    style="background-image: url('dist/img/logo2.png');"></div>

                <!-- Form Login -->
                <div class="w-full md:w-1/2 p-3 mb-16 px-5">
                    <form method="POST" action="cek_login.php" class="space-y-6">
                        <h1 class="text-dark dark:text-white text-3xl font-bold mb-8">Halaman Login</h1>

                        <!-- Input Username -->
                        <div>
                            <input type="text" id="name" name="name" placeholder="Username"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:border-primary focus:ring-primary">
                        </div>

                        <!-- Input Password -->
                        <div>
                            <input type="password" id="pass" name="pass" placeholder="Password"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:border-primary focus:ring-primary">
                        </div>

                        <!-- Tombol Login -->
                        <div>

                            <button type="submit" name="submit"
                                class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:opacity-80 focus:outline-none focus:ring-2 ">
                                Log In
                            </button>
                        </div>

                        <!-- Garis Pemisah -->
                        <!-- <hr class="my-6 border-gray-300"> -->

                        <!-- Link Register -->
                        <p class="text-center text-gray-600">
                            Belum punya akun?
                            <a href="register.php" class="text-primary hover:underline">Register</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>

</html>