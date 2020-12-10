<?php
  require('tfpdf/tfpdf.php');
//соединение с БД
$mysqli = new mysqli("localhost","f0474103_city", "city", "f0474103_city");
//конец блока соединения с БД
   //if (!$mysqli->connect_errno) {
       echo "OKoK";
        $result = $mysqli->query("SELECT
                 seti_magaz.name as seti_magaz_name,
                 seti_magaz.INN as seti_magaz_INN,
                 tochki_prod.adress,
                 tochki_prod.sales_volume,
                 tochki_prod.trade_balance,
                 tochki_prod.FIO_director
                 FROM tochki_prod
                 LEFT JOIN city1 ON tochki_prod.id_city1=city1.id
                 LEFT JOIN seti_magaz ON tochki_prod.id_seti_magaz=seti_magaz.id"
        );
    //s}

    $pdf = new tFPDF();
    $pdf->AddFont('PDFFont','','times.ttf');
    $pdf->SetFont('PDFFont','',14);
    $pdf->AddPage();

    $pdf->Cell(50);
    $pdf->Cell(80,10,'Населенные пункты',1,0,'C');
    $pdf->Ln(20);

    $pdf->SetFillColor(200,200,200);
    $pdf->SetFontSize(10);

    $header = array("п/п","Название сети","ИНН","Адрес точки продаж","Объем продаж","Торговый баланс","ФИО директора");
    $w = array(10,30,30,35,30,30,30);
    $h = 7;
    for ($c = 0; $c < 7; $c++){
        $pdf->Cell($w[$c],$h,$header[$c],'LRTB','0','',true);
    }
    $pdf->Ln();

    if ($result){
        $counter = 1;
        while ($row = $result->fetch_row()){
            $pdf->Cell($w[0],$h,$counter,'LRBT','0','C',true);
            $pdf->Cell($w[1],$h,$row[0],'LRB');

            for ($c = 2; $c < 7; $c++){
                $pdf->Cell($w[$c],$h,$row[$c-1],'RB');
            }
            $pdf->Ln();
            $counter++;
        }
    }

    $pdf->Output("I",'NP.pdf',true);