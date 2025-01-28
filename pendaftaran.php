<?php
include 'header.php';
?>

<section id="contact" class="pt-36 pb-32 dark:bg-slate-800">
    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto mb-16 max-w-xl text-center">
                <h2 class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl lg:text-3xl">Formulir
                    Pendaftaran
                    Santri Baru Pondok Pesantren Al Muflihin<br>Tahun 2025
                </h2>
                <p class="text-sm font-medium text-secondary">Pondok Pesantren Al Muflihin menerima
                    pendaftaran Santriwan dan Santriwati baru tahun ajaran 2024-2025. Berdomisili di Jl. Soekarno Hatta
                    Blok Balong, Desa Gebang Ilir Kec. Gebang Kab. Cirebon Jawa Barat 45191</p>
            </div>
        </div>

        <form>
            <div class="w-full lg:mx-auto lg:w-2/3">
                <div class="mb-8 w-full px-4">
                    <label for="name" class="text-base font-bold text-primary">Nama</label>
                    <input type="text" id="name"
                        class="w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" />
                </div>
                <div class="mb-8 w-full px-4">
                    <label for="email" class="text-base font-bold text-primary">Email</label>
                    <input type="email" id="email"
                        class="w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary" />
                </div>
                <div class="mb-8 w-full px-4">
                    <label for="message" class="text-base font-bold text-primary">Pesan</label>
                    <textarea type="email" id="email"
                        class="h-32 w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"></textarea>
                </div>
                <div class="w-full px-4">
                    <button
                        class="w-full rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-500 hover:opacity-80 hover:shadow-lg">Kirim</button>
                </div>
            </div>
        </form>
    </div>
</section>


<?php
include 'footer.php';
?>