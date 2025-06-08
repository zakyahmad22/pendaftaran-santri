<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppdb_pondok";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} 

// Pastikan data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username_input = $_POST['username'];
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

    // Cek apakah username sudah dipakai
    $check_query = "SELECT id FROM calon_santri WHERE username = '$username_input'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "<script>
                alert('Username sudah digunakan, silakan pilih yang lain.');
                window.history.back();
              </script>";
        exit();
    }

    // Query insert data lengkap termasuk username
    $sql_insert = "INSERT INTO calon_santri (
        username, tanggal_pendaftaran, nama_lengkap, tempat_lahir, tanggal_lahir, alamat_lengkap, 
        tinggal_bersama, jenis_kelamin, sekolah_terakhir, pernah_mondok, nama_pondok_sebelumnya, 
        alamat_pondok_sebelumnya, nama_ayah, nama_ibu, tempat_lahir_ayah, tanggal_lahir_ayah, 
        tempat_lahir_ibu, tanggal_lahir_ibu, pekerjaan_ayah, pekerjaan_ibu, penghasilan_ayah, 
        penghasilan_ibu, alamat_rumah, no_hp_ortu
    ) VALUES (
        '$username_input', '$tanggal_pendaftaran', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', 
        '$alamat_lengkap', '$tinggal_bersama', '$jenis_kelamin', '$sekolah_terakhir', '$pernah_mondok', 
        " . ($nama_pondok_sebelumnya ? "'$nama_pondok_sebelumnya'" : "NULL") . ", 
        " . ($alamat_pondok_sebelumnya ? "'$alamat_pondok_sebelumnya'" : "NULL") . ", 
        '$nama_ayah', '$nama_ibu', '$tempat_lahir_ayah', '$tanggal_lahir_ayah', 
        '$tempat_lahir_ibu', '$tanggal_lahir_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu', 
        '$penghasilan_ayah', '$penghasilan_ibu', '$alamat_rumah', '$no_hp_ortu'
    )";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>
                alert('Pendaftaran berhasil! Silakan login dengan username Anda.');
                window.location.href = '../form_pendaftaran.php';
                </script>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
} else {
    echo "Data tidak dikirim melalui metode POST.";
}

$conn->close();
?>