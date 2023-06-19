<?php
session_start();

if (!isset($_SESSION['superadmin_name'])) {
	header('location:login_form.php');
}

include '../connection.php';
include '../fpdf181/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage('P', 'A4');

$tgl = date('Y/m/d');
$pdf->setFont('Arial', 'B', 15);
$pdf->Image('../assets/images/logo.png', 10, 8, 20, 19);
$pdf->Cell(187, 6, 'PERPUSTAKAAN SEKOLAH', 0, 1, 'C');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(187, 6, 'SMA MUHAMMADIYAH 8 SUKODADI', 0, 1, 'C');
$pdf->SetLineWidth(0.3);
$pdf->Line(10, 28, 200, 28);
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(187, 6, 'Laporan Data Anggota', 0, 1, 'C');
$pdf->Ln(1);
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(187, 7, 'Tanggal Cetak ' . $tgl, 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(192, 192, 192);
$pdf->Cell(8, 6, 'No', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Nama', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Jenis Kelamin', 1, 0, 'C', 1);
$pdf->Cell(87, 6, 'Kelas', 1, 1, 'C', 1);

$nomor = 0;
$sql = mysqli_query($db, "SELECT anggota.*, kelas.nama_kelas FROM anggota JOIN kelas ON anggota.kelas_id = kelas.kelas_id");
while ($data = mysqli_fetch_array($sql)) {
	$nomor++;
	$pdf->Ln(0);
	$pdf->setFont('Arial', '', 11);
	$pdf->Cell(8, 6, $nomor, 1, 0, 'C');
	$pdf->Cell(50, 6, $data['anggota_nama'], 1, 0, 'C');
	$pdf->Cell(45, 6, $data['anggota_jk'], 1, 0, 'C');
	$pdf->Cell(87, 6, $data['nama_kelas'], 1, 1, 'C');
}

$pdf->Output('Daftar Anggota Perpustakan SMAM 8.pdf', 'I');
