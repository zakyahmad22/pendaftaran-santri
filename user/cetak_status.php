<?php
require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    die("Silakan login terlebih dahulu.");
}

$username = $_SESSION['username'];

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "ppdb_pondok");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data calon santri berdasarkan username (dengan prepared statement)
$stmt = $conn->prepare("SELECT * FROM calon_santri WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$data = $result->fetch_assoc();
// DEBUG (sementara)
echo "<pre>";
print_r($_SESSION);
print_r($data);

// Konfigurasi Dompdf
$options = new Options();
$options->set('defaultFont', 'Helvetica');
$dompdf = new Dompdf($options);

// Isi HTML untuk PDF
$html = '
    <h2 style="text-align:center;">Status Pendaftaran Santri</h2>
    <hr>
    <table width="100%" cellspacing="0" cellpadding="8" border="0">
        <tr><td><strong>Nama Lengkap:</strong></td><td>' . htmlspecialchars($data['nama_lengkap']) . '</td></tr>
        <tr><td><strong>Tanggal Pendaftaran:</strong></td><td>' . htmlspecialchars($data['tanggal_pendaftaran']) . '</td></tr>
        <tr><td><strong>Alamat Lengkap:</strong></td><td>' . htmlspecialchars($data['alamat_lengkap']) . '</td></tr>
        <tr><td><strong>Status Pendaftaran:</strong></td><td>' . htmlspecialchars($data['status_pendaftaran'] ?: 'Belum Diverifikasi') . '</td></tr>
        <tr><td><strong>Keterangan:</strong></td><td>' . htmlspecialchars($data['keterangan'] ?: 'Belum Ada Keterangan') . '</td></tr>
    </table>
    <br><br>
    <p style="text-align:right;">Dicetak pada: ' . date('d-m-Y H:i') . '</p>
';

// Proses render PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output PDF langsung ke browser (tanpa di-download otomatis)
$dompdf->stream("status_pendaftaran_" . $username . ".pdf", ["Attachment" => false]);

exit;
?>