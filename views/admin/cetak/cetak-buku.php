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
$pdf->Cell(187, 6, 'PERPUSTAKAAN UMUM', 0, 1, 'C');
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(187, 6, 'SMA MUHAMMADIYAH 8 SUKODADI', 0, 1, 'C');
$pdf->SetLineWidth(0.3);
$pdf->Line(10, 28, 200, 28);
$pdf->setFont('Arial', 'B', 10);
$pdf->Cell(187, 6, 'Laporan Data Buku', 0, 1, 'C');
$pdf->Ln(1);
$pdf->setFont('Arial', 'B', 8);
$pdf->Cell(187, 4, 'Tanggal Cetak ' . $tgl, 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 11);
$pdf->SetFillColor(192, 192, 192);
$pdf->Cell(8, 7, 'No', 1, 0, 'C', 1);
$pdf->Cell(48, 7, 'Judul', 1, 0, 'C', 1);
$pdf->Cell(25, 7, 'Kategori', 1, 0, 'C', 1);
$pdf->Cell(40, 7, 'Penulis', 1, 0, 'C', 1);
$pdf->Cell(40, 7, 'Lokasi Rak', 1, 0, 'C', 1);
$pdf->Cell(29, 7, 'Stok', 1, 1, 'C', 1);

$nomor = 0;
$sql = mysqli_query($db, "SELECT buku.*, kategori.kategori_nama, rak.nama_rak, penerbit.nama_penerbit
FROM buku
JOIN kategori ON buku.kategori_id = kategori.kategori_id
JOIN rak ON buku.rak_id = rak.rak_id
JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit");

while ($data = mysqli_fetch_array($sql)) {
	$nomor++;
	$pdf->Ln(0);
	$pdf->setFont('Arial', '', 10);
	$pdf->Cell(8, 6, $nomor, 1, 0, 'C');
	$pdf->Cell(48, 6, $data['buku_judul'], 1, 0, 'C');
	$pdf->Cell(25, 6, $data['kategori_nama'], 1, 0, 'C');
	$pdf->Cell(40, 6, $data['penulis'], 1, 0, 'C');
	$pdf->Cell(40, 6, $data['nama_rak'], 1, 0, 'C');
	$pdf->Cell(29, 6, $data['buku_jumlah'], 1, 1, 'C');
}
$pdf->Output('cetak-buku.pdf', 'I');
