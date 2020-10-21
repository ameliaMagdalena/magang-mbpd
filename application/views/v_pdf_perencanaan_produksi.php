
<?php
    $pdf = new FPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('INVOICE');
    $pdf->SetTopMargin(15);
    //$pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true,22);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    //$pdf->setPrintHeader(true);
    //$pdf->setPrintFooter(true);
    $pdf->AddPage('L','A5');
    
    //$fontname = TCPDF_FONTS::addTTFfont('../../../libraries/tcpdf/fonts/tahoma.ttf', 'TrueTypeUnicode', '', 96);
    //$pdf->SetFont('Tahoma','', 12); //untuk font, liat dokumentasui


    $content='
    <html>
        <head>
            <title>Invoice</title>
        </head>
        <body>';


            $content = $content .'
        </body>
    </html>
';

//$pdf->writeHTML($content);


/* $pdf->SetFont('MonotypeCorsivai','', 24);
$content = $this->session->id_user;
$pdf->writeHTML($content); //yang keluarin html nya. Setfont nya harus diatas kontennya



$pdf->SetFont('Tahoma','', 10.5);
$content ='PT LEITER INDONESIA';
$pdf->writeHTML($content); */
    //$obj_pdf->SetFont(Courier','', 8); //untuk font, liat dokumentasui
    //$pdf->writeHTML($content); //yang keluarin html nya. Setfont nya harus diatas kontennya
    //$pdf->Write(5, 'Contoh Laporan PDF dengan CodeIgniter + tcpdf');
    var_dump(array(
        "data" => "demo"
    ));
    ob_end_clean();
    $pdf->Output('contoh1.pdf', 'I');
?>