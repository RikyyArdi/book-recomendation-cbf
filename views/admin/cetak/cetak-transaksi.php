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
$pdf->Cell(187, 6, 'Laporan Transaksi Perpustakaan', 0, 1, 'C');
$pdf->Ln(1);
$pdf->setFont('Arial', 'B', 8);
$pdf->Cell(187, 4, 'Tanggal Cetak ' . $tgl, 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(192, 192, 192);
$pdf->Cell(6, 6, 'No', 1, 0, 'C', 1);
$pdf->Cell(76, 6, 'Judul Buku', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Peminjam', 1, 0, 'C', 1);
$pdf->Cell(33, 6, 'Tanggal Pinjam', 1, 0, 'C', 1);
$pdf->Cell(45, 6, 'Tanggal Jatuh Tempo', 1, 1, 'C', 1);

$nomor = 0;
$q_transaksi = mysqli_query(
	$db,
	"SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, anggota.anggota_nama,
	(SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN anggota ON anggota.anggota_id = pinjam.anggota_id"
);
while ($r_transaksi = mysqli_fetch_array($q_transaksi)) {
	$nomor++;
	$pdf->Ln(0);
	$pdf->setFont('Arial', '', 7);
	$pdf->Cell(6, 4, $nomor, 1, 0, 'C');
	$pdf->Cell(76, 4, $r_transaksi['buku_judul'], 1, 0, 'C');
	$pdf->Cell(30, 4, $r_transaksi['anggota_nama'], 1, 0, 'C');
	$pdf->Cell(33, 4, $r_transaksi['tgl_pinjam'], 1, 0, 'C');
	$pdf->Cell(45, 4, $r_transaksi['tgl_jatuh_tempo'], 1, 1, 'C');
}

$pdf->Output('cetak-transaksi-peminjaman-pengembalian.pdf', 'I');
