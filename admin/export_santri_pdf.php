<?php
ob_start(); // Mencegah output sebelum PDF

require '../config.php';
require '../vendor/autoload.php'; // Load Composer autoload

$id = $_GET['id'] ?? '';

if (!$id) {
    die("ID tidak ditemukan!");
}

// Ambil data santri berdasarkan ID
$query = $mysqli->prepare("SELECT * FROM calon_santri WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Data tidak ditemukan!");
}

// Buat objek PDF
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

$html = '<h2 align="center">Data Santri</h2>';
$html .= '<table border="1" cellpadding="5">
<tr><td><b>Tanggal Pendaftaran</b></td><td>' . date('d-m-Y', strtotime($row['tanggal_pendaftaran'])) . '</td></tr>
<tr><td><b>Nama Lengkap</b></td><td>' . $row['nama_lengkap'] . '</td></tr>
<tr><td><b>Tempat Lahir</b></td><td>' . $row['tempat_lahir'] . '</td></tr>
<tr><td><b>Tanggal Lahir</b></td><td>' . date('d-m-Y', strtotime($row['tanggal_lahir'])) . '</td></tr>
<tr><td><b>Alamat Lengkap</b></td><td>' . $row['alamat_lengkap'] . '</td></tr>      
<tr><td><b>Tinggal Bersama</b></td><td>' . $row['tinggal_bersama'] . '</td></tr>
<tr><td><b>Jenis Kelamin</b></td><td>' . $row['jenis_kelamin'] . '</td></tr>
<tr><td><b>Sekolah Terakhir</b></td><td>' . $row['sekolah_terakhir'] . '</td></tr>
<tr><td><b>Pernah Mondok</b></td><td>' . $row['pernah_mondok'] . '</td></tr>
<tr><td><b>Nama Pondok Sebelumnya</b></td><td>' . $row['nama_pondok_sebelumnya'] . '</td></tr>
<tr><td><b>Alamat Pondok Sebelumnya</b></td><td>' . $row['alamat_pondok_sebelumnya'] . '</td></tr>
<tr><td><b>Nama Ayah</b></td><td>' . $row['nama_ayah'] . '</td></tr>
<tr><td><b>Nama Ibu</b></td><td>' . $row['nama_ibu'] . '</td></tr>
<tr><td><b>Tempat Lahir Ayah</b></td><td>' . $row['tempat_lahir_ayah'] . '</td></tr>
<tr><td><b>Tanggal Lahir Ayah</b></td><td>' . date('d-m-Y', strtotime( $row['tanggal_lahir_ayah'])) . '</td></tr>
<tr><td><b>Tempat Lahir Ibu</b></td><td>' . $row['tempat_lahir_ibu'] . '</td></tr>
<tr><td><b>Tanggal Lahir Ibu</b></td><td>' . date('d-m-Y', strtotime( $row['tanggal_lahir_ibu'])) . '</td></tr>
<tr><td><b>Pekerjaan Ayah</b></td><td>' . $row['pekerjaan_ayah'] . '</td></tr>
<tr><td><b>Pekerjaan Ibu</b></td><td>' . $row['pekerjaan_ibu'] . '</td></tr>
<tr><td><b>Penghasilan Ayah</b></td><td>' . $row['penghasilan_ayah'] . '</td></tr>
<tr><td><b>Penghasilan Ibu</b></td><td>' . $row['penghasilan_ibu'] . '</td></tr>
<tr><td><b>Alamat Rumah</b></td><td>' . $row['alamat_rumah'] . '</td></tr>
<tr><td><b>No Hp Orang Tua</b></td><td>' . $row['no_hp_ortu'] . '</td></tr>
</table>';

$pdf->writeHTML($html);
$pdf->Output('data_santri_baru' . $id . '.pdf', 'D');
?>