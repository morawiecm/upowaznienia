<?php
include 'config.php';
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 2016-09-20
 * Time: 12:41
 */

include './fpdf17/code39.php';
$pdf = new PDF_Code39();
    $pobierz_dane_do_protokolu=mysqli_query($polaczenie,"SELECT * FROM ewidencja_upowaznienia")
    or die("Blad przy pobierz_dane_do_protokolu: ".mysqli_error($polaczenie));
    if(mysqli_num_rows($pobierz_dane_do_protokolu)>0)
    {
        while ($dane_do_protokolu=mysqli_fetch_array($pobierz_dane_do_protokolu))
        {
            $protokol_imie_nazwisko = iconv('utf-8','windows-1250',$dane_do_protokolu['imie_nazwisko']);
            $protokol_nr_kadrowy = iconv('utf-8','windows-1250',$dane_do_protokolu['nr_kadrowy']);
            $protokol_nr_upowaznienia = $dane_do_protokolu['nr_upowaznienia'];
            $protokol_data_nadania = $dane_do_protokolu['data_nadania'];


    //$pdf->AliasNbPages();
    $pdf->AddPage('P','A4');
    $pdf->AddFont('arial_ce','','arial_ce.php');
    $pdf->AddFont('arial_ce','I','arial_ce_i.php');
    $pdf->AddFont('arial_ce','B','arial_ce_b.php');
    $pdf->AddFont('arial_ce','BI','arial_ce_bi.php');
    $pdf->SetFont('arial_ce','B',16);
    $pdf->Image('szablon/001.jpg',0,0,-300);

    $pdf->Ln(24);
    $pdf->Cell(123);
    $pdf->Cell(55,0,$protokol_nr_upowaznienia,0,0,'C');
    $pdf->Ln(84.5);
    $pdf->Cell(10);
    $pdf->Cell(170,0,$protokol_imie_nazwisko." (". $protokol_nr_kadrowy.")",0,0,'C');
    $pdf->SetFont('arial_ce','B',10);
    $pdf->Ln(30.5);
    $pdf->Cell(14);
    //$pdf->Cell(10,0,'',1,1);
    $pdf->Cell(21,0,$protokol_data_nadania,0,0,'C');

        }
    }
$pdf->Close();
$pdf->Output();
