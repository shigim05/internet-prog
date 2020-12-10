<?php
    require_once('php_excel/Classes/PHPExcel.php');
    require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php');
$mysqli= new mysqli("localhost","f0474103_city", "city", "f0474103_city");
if ($mysqli->connect_errno) {
echo "Невозможно подключиться к серверу";
}
//конец блока соединения с БД
   if (!$mysqli->connect_errno) {
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
    }
    
    $xls = new PHPExcel();
    // Устанавливаем индекс активного листа
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Населенные пункты');
    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", 'Населенные пункты');
    $sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
    // Объединяем ячейки
    $sheet->mergeCells('A1:J1');
    // Выравнивание текста
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $c = 0;

    $header = array("п/п","Название сети","ИНН","Адрес точки продаж","Объем продаж","Торговый баланс","ФИО директора");
    foreach ($header as $h){
        $sheet->setCellValueByColumnAndRow($c,2,$h);
        // Применяем выравнивание
        $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
        $c++;
    }

    if ($result){
        $r = 3;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $c = 0;

            $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
            $c++;

            foreach ($row as $cell){
                //if ($c==7 || $c==8){
                   // $cell = date('d-m-Y', strtotime($cell));
                //}
                $sheet->setCellValueByColumnAndRow($c,$r,$cell);
                $c++;
            }
            $r++;
        }
    }

    header('Content-Type: application/xls');
    header('Content-Disposition: inline; filename=city.xls');
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');

    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');
?>