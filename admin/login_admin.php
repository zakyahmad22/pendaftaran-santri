<?php
include('../header.php');
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin</title>
    <link href="../dist/css/final.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <!-- <link rel="icon" href="../dist/img/logo.png" type="image/icon"> -->
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/login.css">
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

    <section id="blog" class="bg-slate-100 pt-5 pb-5 dark:bg-dark">
        <div class="container mx-auto">
            <div class="flex flex-wrap mt-20">
                <!-- Breadcrumb -->
                <div class="container mx-auto max-w-3xl lg:max-w-5xl">
                    <div class="breadcrumbs text-secondary dark:text-white">
                        <ol class="flex space-x-2 text-sm px-1 pb-5">
                            <li><a href="index.php" class="hover:text-primary">Beranda |</a></li>
                            <li class="current text-primary">Login Admin</li>
                        </ol>
                    </div>
                </div>

                <style>
                    .fade-in-up {
                        opacity: 0;
                        transform: translateY(30px);
                        transition: all 0.6s ease-out;
                    }

                    .fade-in-up.show {
                        opacity: 1;
                        transform: translateY(0);
                    }
                </style>

                <!-- Form Login -->
                <div class="w-full md:w-1/2 p-3 mb-16 px-5 fade-in-up">
                    <form method="POST" action="cek_login_admin.php" class="space-y-6">
                        <h1 class="text-dark dark:text-white text-3xl font-bold mb-8">Halaman Login Admin</h1>
                        <div>
                            <input type="text" id="name" name="name" placeholder="Username"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:border-primary focus:ring-primary" />
                        </div>
                        <div>
                            <input type="password" id="pass" name="pass" placeholder="Password"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:border-primary focus:ring-primary" />
                        </div>
                        <div>
                            <button type="submit" name="submit"
                                class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:opacity-80 focus:outline-none focus:ring-2">
                                Log In
                            </button>
                        </div>
                        <p class="text-center text-gray-600">
                            Belum punya akun?
                            <a href="register_admin.php" class="text-primary hover:underline">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include '../footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const targets = document.querySelectorAll('.fade-in-up');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    }
                });
            }, { threshold: 0.1 });
            targets.forEach(el => observer.observe(el));
        });
    </script>

    <script src="../dist/js/script.js"></script>

</body>

</html>