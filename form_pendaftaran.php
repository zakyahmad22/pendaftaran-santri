<?php
include 'header.php';
?>



<body class="bg-gray-100">
    <section id="contact" class="pt-36 pb-32">
        <div class="container mx-auto px-4">
            <div class="w-full">
                <div class="mx-auto mb-16 max-w-xl text-center">
                    <h2 class="mb-4 text-3xl font-bold text-gray-800 sm:text-4xl lg:text-3xl">
                        Formulir Pendaftaran Santri Baru Pondok Pesantren Al Muflihin<br>Tahun 2025
                    </h2>
                    <p class="text-sm font-medium text-gray-600">
                        Pondok Pesantren Al Muflihin menerima pendaftaran Santriwan dan Santriwati baru tahun ajaran
                        2024-2025. Berdomisili di Jl. Soekarno Hatta Blok Balong, Desa Gebang Ilir Kec. Gebang Kab.
                        Cirebon Jawa Barat 45191
                    </p>
                </div>
            </div>

            <form action="proses_pendaftaran.php" method="POST" class="w-full lg:mx-auto lg:w-2/3">
                <!-- Tanggal Pendaftaran -->
                <div class="mb-8 w-full px-4">
                    <label for="tanggal_pendaftaran" class="text-base font-bold text-gray-800">Tanggal
                        Pendaftaran</label>
                    <input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Nama Lengkap -->
                <div class="mb-8 w-full px-4">
                    <label for="nama_lengkap" class="text-base font-bold text-gray-800">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-8 w-full px-4">
                    <label for="tempat_lahir" class="text-base font-bold text-gray-800">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-8 w-full px-4">
                    <label for="tanggal_lahir" class="text-base font-bold text-gray-800">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Alamat Lengkap -->
                <div class="mb-8 w-full px-4">
                    <label for="alamat_lengkap" class="text-base font-bold text-gray-800">Alamat Lengkap</label>
                    <textarea id="alamat_lengkap" name="alamat_lengkap" rows="4" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"></textarea>
                </div>

                <!-- Tinggal Bersama -->
                <div class="mb-8 w-full px-4">
                    <label for="tinggal_bersama" class="text-base font-bold text-gray-800">Tinggal Bersama</label>
                    <select id="tinggal_bersama" name="tinggal_bersama" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Orang Tua">Orang Tua</option>
                        <option value="Wali">Wali</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-8 w-full px-4">
                    <label for="jenis_kelamin" class="text-base font-bold text-gray-800">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Sekolah Terakhir -->
                <div class="mb-8 w-full px-4">
                    <label for="sekolah_terakhir" class="text-base font-bold text-gray-800">Sekolah Terakhir</label>
                    <input type="text" id="sekolah_terakhir" name="sekolah_terakhir" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Pernah Mondok -->
                <div class="mb-8 w-full px-4">
                    <label for="pernah_mondok" class="text-base font-bold text-gray-800">Pernah Mondok</label>
                    <select id="pernah_mondok" name="pernah_mondok" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>

                <!-- Nama Pondok Sebelumnya -->
                <div class="mb-8 w-full px-4">
                    <label for="nama_pondok_sebelumnya" class="text-base font-bold text-gray-800">Nama Pondok
                        Sebelumnya</label>
                    <input type="text" id="nama_pondok_sebelumnya" name="nama_pondok_sebelumnya"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Alamat Pondok Sebelumnya -->
                <div class="mb-8 w-full px-4">
                    <label for="alamat_pondok_sebelumnya" class="text-base font-bold text-gray-800">Alamat Pondok
                        Sebelumnya</label>
                    <textarea id="alamat_pondok_sebelumnya" name="alamat_pondok_sebelumnya" rows="4"
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"></textarea>
                </div>

                <!-- Nama Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="nama_ayah" class="text-base font-bold text-gray-800">Nama Ayah</label>
                    <input type="text" id="nama_ayah" name="nama_ayah" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Nama Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="nama_ibu" class="text-base font-bold text-gray-800">Nama Ibu</label>
                    <input type="text" id="nama_ibu" name="nama_ibu" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tempat Lahir Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="tempat_lahir_ayah" class="text-base font-bold text-gray-800">Tempat Lahir Ayah</label>
                    <input type="text" id="tempat_lahir_ayah" name="tempat_lahir_ayah" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tanggal Lahir Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="tanggal_lahir_ayah" class="text-base font-bold text-gray-800">Tanggal Lahir Ayah</label>
                    <input type="date" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tempat Lahir Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="tempat_lahir_ibu" class="text-base font-bold text-gray-800">Tempat Lahir Ibu</label>
                    <input type="text" id="tempat_lahir_ibu" name="tempat_lahir_ibu" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tanggal Lahir Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="tanggal_lahir_ibu" class="text-base font-bold text-gray-800">Tanggal Lahir Ibu</label>
                    <input type="date" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Pekerjaan Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="pekerjaan_ayah" class="text-base font-bold text-gray-800">Pekerjaan Ayah</label>
                    <select id="pekerjaan_ayah" name="pekerjaan_ayah" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Guru">Guru</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI/POLRI">TNI/POLRI</option>
                        <option value="Pensiunan">Pensiunan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Pekerjaan Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="pekerjaan_ibu" class="text-base font-bold text-gray-800">Pekerjaan Ibu</label>
                    <select id="pekerjaan_ibu" name="pekerjaan_ibu" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Guru">Guru</option>
                        <option value="PNS">PNS</option>
                        <option value="TNI/POLRI">TNI/POLRI</option>
                        <option value="Pensiunan">Pensiunan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <!-- Penghasilan Ayah -->
                <div class="mb-8 w-full px-4">
                    <label for="penghasilan_ayah" class="text-base font-bold text-gray-800">Penghasilan Ayah</label>
                    <select id="penghasilan_ayah" name="penghasilan_ayah" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Dibawah 1 Juta">Dibawah 1 Juta</option>
                        <option value="1-3 Juta">1-3 Juta</option>
                        <option value="3-5 Juta">3-5 Juta</option>
                        <option value="Di atas 5 Juta">Di atas 5 Juta</option>
                    </select>
                </div>

                <!-- Penghasilan Ibu -->
                <div class="mb-8 w-full px-4">
                    <label for="penghasilan_ibu" class="text-base font-bold text-gray-800">Penghasilan Ibu</label>
                    <select id="penghasilan_ibu" name="penghasilan_ibu" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300">
                        <option value="Dibawah 1 Juta">Dibawah 1 Juta</option>
                        <option value="1-3 Juta">1-3 Juta</option>
                        <option value="3-5 Juta">3-5 Juta</option>
                        <option value="Di atas 5 Juta">Di atas 5 Juta</option>
                    </select>
                </div>

                <!-- Alamat Rumah -->
                <div class="mb-8 w-full px-4">
                    <label for="alamat_rumah" class="text-base font-bold text-gray-800">Alamat Rumah</label>
                    <textarea id="alamat_rumah" name="alamat_rumah" rows="4" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300"></textarea>
                </div>

                <!-- No. HP Orang Tua -->
                <div class="mb-8 w-full px-4">
                    <label for="no_hp_ortu" class="text-base font-bold text-gray-800">No. HP Orang Tua</label>
                    <input type="text" id="no_hp_ortu" name="no_hp_ortu" required
                        class="w-full rounded-md bg-white p-3 text-gray-800 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary border border-gray-300" />
                </div>

                <!-- Tombol Daftar -->
                <div class="w-full px-4">
                    <button type="submit"
                        class="rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </section>

    <?php
    include 'footer.php';
    ?>

</body>

</html>