<?php
require '../config.php';
require '../vendor/autoload.php'; // Pastikan PhpSpreadsheet terinstall

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Tanggal Pendaftaran')->setCellValue('B1', date('d-m-Y', strtotime($row['tanggal_pendaftaran'])));
$sheet->setCellValue('A2', 'Nama Lengkap')->setCellValue('B2', $row['nama_lengkap']);
$sheet->setCellValue('A3', 'Tempat Lahir')->setCellValue('B3', $row['tempat_lahir']);
$sheet->setCellValue('A4', 'Tanggal Lahir')->setCellValue('B4', date('d-m-Y', strtotime($row['tanggal_lahir'])));
$sheet->setCellValue('A5', 'Alamat Lengkap')->setCellValue('B5', $row['alamat_lengkap']);
$sheet->setCellValue('A6', 'Tinggal Bersama')->setCellValue('B6', $row['tinggal_bersama']);
$sheet->setCellValue('A7', 'Jenis Kelamin')->setCellValue('B7', $row['jenis_kelamin']);
$sheet->setCellValue('A8', 'Sekolah Terakhir')->setCellValue('B8', $row['sekolah_terakhir']);
$sheet->setCellValue('A9', 'Pernah Mondok')->setCellValue('B9', $row['pernah_mondok']);
$sheet->setCellValue('A10', 'Nama Pondok Sebelumnya')->setCellValue('B10', $row['nama_pondok_sebelumnya']);
$sheet->setCellValue('A11', 'Alamat Pondok Sebelumnya')->setCellValue('B11', $row['alamat_pondok_sebelumnya']);
$sheet->setCellValue('A12', 'Nama Ayah')->setCellValue('B12', $row['nama_ayah']);
$sheet->setCellValue('A13', 'Tanggal Lahir Ayah')->setCellValue('B13', date('d-m-Y', strtotime($row['tanggal_lahir_ayah'])));
$sheet->setCellValue('A14', 'Tempat Lahir Ayah')->setCellValue('B14', $row['tempat_lahir_ayah']);
$sheet->setCellValue('A15', 'Nama Ibu')->setCellValue('B15', $row['nama_ibu']);
$sheet->setCellValue('A16', 'Tanggal Lahir Ibu')->setCellValue('B16', date('d-m-Y', strtotime($row['tanggal_lahir_ibu'])));
$sheet->setCellValue('A17', 'Tempat Lahir Ibu')->setCellValue('B17', $row['tempat_lahir_ibu']);
$sheet->setCellValue('A18', 'Pekerjaan Ayah')->setCellValue('B18', $row['pekerjaan_ayah']);
$sheet->setCellValue('A19', 'Pekerjaan Ibu')->setCellValue('B19', $row['pekerjaan_ibu']);
$sheet->setCellValue('A20', 'Penghasilan Ayah')->setCellValue('B20', $row['penghasilan_ayah']);
$sheet->setCellValue('A21', 'Penghasilan Ibu')->setCellValue('B21', $row['penghasilan_ibu']);
$sheet->setCellValue('A22', 'Alamat Rumah')->setCellValue('B22', $row['alamat_rumah']);
$sheet->setCellValue('A23', 'No Hp Orang Tua')->setCellValue('B23', $row['no_hp_ortu']);

$writer = new Xlsx($spreadsheet);
$fileName = 'data_santri_baru' . $id . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

$writer->save('php://output');
?>