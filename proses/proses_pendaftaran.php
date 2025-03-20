<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan nama server database Anda
$username = "root";        // Ganti dengan username database Anda
$password = "";            // Ganti dengan password database Anda
$dbname = "ppdb_pondok";   // Pastikan nama database benar

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pastikan data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat_lengkap = $_POST['alamat_lengkap'];
    $tinggal_bersama = $_POST['tinggal_bersama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $sekolah_terakhir = $_POST['sekolah_terakhir'];
    $pernah_mondok = $_POST['pernah_mondok'];
    $nama_pondok_sebelumnya = $_POST['nama_pondok_sebelumnya'] ?? null;
    $alamat_pondok_sebelumnya = $_POST['alamat_pondok_sebelumnya'] ?? null;
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $tempat_lahir_ayah = $_POST['tempat_lahir_ayah'];
    $tanggal_lahir_ayah = $_POST['tanggal_lahir_ayah'];
    $tempat_lahir_ibu = $_POST['tempat_lahir_ibu'];
    $tanggal_lahir_ibu = $_POST['tanggal_lahir_ibu'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $penghasilan_ayah = $_POST['penghasilan_ayah'];
    $penghasilan_ibu = $_POST['penghasilan_ibu'];
    $alamat_rumah = $_POST['alamat_rumah'];
    $no_hp_ortu = $_POST['no_hp_ortu'];

    // Query untuk insert data
    $sql = "INSERT INTO calon_santri (
        tanggal_pendaftaran, nama_lengkap, tempat_lahir, tanggal_lahir, alamat_lengkap, 
        tinggal_bersama, jenis_kelamin, sekolah_terakhir, pernah_mondok, nama_pondok_sebelumnya, 
        alamat_pondok_sebelumnya, nama_ayah, nama_ibu, tempat_lahir_ayah, tanggal_lahir_ayah, 
        tempat_lahir_ibu, tanggal_lahir_ibu, pekerjaan_ayah, pekerjaan_ibu, penghasilan_ayah, 
        penghasilan_ibu, alamat_rumah, no_hp_ortu
    ) VALUES (
        '$tanggal_pendaftaran', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$alamat_lengkap', 
        '$tinggal_bersama', '$jenis_kelamin', '$sekolah_terakhir', '$pernah_mondok', 
        " . ($nama_pondok_sebelumnya ? "'$nama_pondok_sebelumnya'" : "NULL") . ", 
        " . ($alamat_pondok_sebelumnya ? "'$alamat_pondok_sebelumnya'" : "NULL") . ", 
        '$nama_ayah', '$nama_ibu', '$tempat_lahir_ayah', '$tanggal_lahir_ayah', 
        '$tempat_lahir_ibu', '$tanggal_lahir_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu', 
        '$penghasilan_ayah', '$penghasilan_ibu', '$alamat_rumah', '$no_hp_ortu'
    )";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Pendaftaran berhasil!');
                window.location.href = '../form_pendaftaran.php';
                </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Data tidak dikirim melalui metode POST.";
}

// Tutup koneksi
$conn->close();
?>