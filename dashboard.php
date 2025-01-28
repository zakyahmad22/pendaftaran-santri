<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Modern Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-md h-screen fixed left-0 top-0">
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        </div>
        <nav class="p-4">
            <ul>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <i class="fas fa-home mr-3"></i>
                        Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <i class="fas fa-graduation-cap mr-3"></i>
                        Data Santri
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <i class="fas fa-user mr-3"></i>
                        Data Guru
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <i class="fas fa-book mr-3"></i>
                        Data Pelajaran
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                        <i class="fas fa-chart-line mr-3"></i>
                        Ekstrakurikuler
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 flex-1 p-8">
        <div class="container mx-auto px-4 py-8">
            <section class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Welcome to Pondok Modern Al Muflihin</h1>
            </section>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white shadow-lg rounded-xl p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div
                        class="bg-blue-500 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-graduation-cap text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Data Santri</h3>
                    <a href="data.php"
                        class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition-colors">
                        More Info
                    </a>
                </div>

                <div
                    class="bg-white shadow-lg rounded-xl p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div
                        class="bg-purple-500 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Data Guru</h3>
                    <a href="data_guru.php"
                        class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition-colors">
                        More Info
                    </a>
                </div>

                <div
                    class="bg-white shadow-lg rounded-xl p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div
                        class="bg-green-500 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-book-open text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Data Pelajaran</h3>
                    <a href="data_pelajaran.php"
                        class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition-colors">
                        More Info
                    </a>
                </div>

                <div
                    class="bg-white shadow-lg rounded-xl p-6 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                    <div
                        class="bg-red-500 text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Ekstrakurikuler</h3>
                    <a href="ekstrakulikuler.php"
                        class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition-colors">
                        More Info
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>