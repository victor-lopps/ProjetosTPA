<?php
header('Content-Type: text/html; charset=utf-8');
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial','B', 16);
$pdf -> Cell(40, 10, 'Relatório Mensal');
$pdf -> Output();
?>