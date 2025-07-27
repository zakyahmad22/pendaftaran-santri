<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

// Load DomPDF
require '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Fungsi Format Tanggal Indonesia
function tgl_indo($tanggal)
{
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];
    $pecah = explode('-', $tanggal);
    return $pecah[2] . ' ' . $bulan[(int) $pecah[1]] . ' ' . $pecah[0];
}

// Cek login
if (!isset($_SESSION['user_username'])) {
    die("Silakan login terlebih dahulu.");
}

$username = $_SESSION['user_username'];

// Koneksi DB
$conn = new mysqli("localhost", "root", "", "ppdb_pondok");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data calon santri
$stmt = $conn->prepare("SELECT * FROM calon_santri WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$data = $result->fetch_assoc();

// Setup Dompdf
$options = new Options();
$options->set('defaultFont', 'Helvetica');
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Buat HTML
$html = '
    <h2 style="text-align:center;">PONDOK PESANTREN AL MUFLIHIN</h2>
    <h3 style="text-align:center;">Status Pendaftaran Santri Baru</h3>
    <hr>
    <table width="100%" cellspacing="0" cellpadding="8" border="0">
        <tr><td><strong>Nama Lengkap:</strong></td><td>' . htmlspecialchars($data['nama_lengkap']) . '</td></tr>
        <tr><td><strong>Tanggal Pendaftaran:</strong></td><td>' . tgl_indo(date("Y-m-d", strtotime($data['tanggal_pendaftaran']))) . '</td></tr>
        <tr><td><strong>Alamat Lengkap:</strong></td><td>' . htmlspecialchars($data['alamat_lengkap']) . '</td></tr>
        <tr><td><strong>Status Pendaftaran:</strong></td><td>' . htmlspecialchars($data['status_pendaftaran'] ?: 'Belum Diverifikasi') . '</td></tr>
        <tr><td><strong>Keterangan:</strong></td><td>' . htmlspecialchars($data['keterangan'] ?: 'Belum Ada Keterangan') . '</td></tr>
    </table>
    <br><br>

    <table width="100%">
        <tr>
            <td></td>
            <td style="text-align:right;">
                <p>Mengetahui,<br>Panitia PPDB</p>
                <img src="http://localhost/pendaftaran-santri/assets/ttd_panitia.png" width="100" style="margin-top:5px; margin-bottom:5px;">
                <p style="margin-top:-10px;">(...................................)</p>
            </td>
        </tr>
    </table>

    <br><br>
    <p style="text-align:right;">Dicetak pada: ' . tgl_indo(date('Y-m-d')) . ' ' . date('H:i') . ' WIB</p>
    <hr>
    <p style="font-size:12px; text-align:center;">
        Dokumen ini sah tanpa tanda tangan basah. Dicetak melalui sistem PPDB Online Pondok Pesantren Al Muflihin.
    </p>
';

// Render dan tampilkan PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("status_pendaftaran_" . $username . ".pdf", ["Attachment" => true]);
exit;
