
<?php
    $pdf = new Pdf_oc('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Sales Order');
    $pdf->SetTopMargin(8);
    $pdf->setFooterMargin(10);
    $pdf->SetAutoPageBreak(true,10);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->setPrintHeader(false);
      $pdf->setPrintFooter(false);
    $pdf->AddPage('L','A5'); //orientasi landscape, ukuran A4
    
    $fontname = TCPDF_FONTS::addTTFfont('../../../libraries/tcpdf/fonts/tahoma.ttf', 'TrueTypeUnicode', '', 96);
    $pdf->SetFont('Tahoma','', 9); //nama font, , ukuran


    $content='
    <html>
        <head>
            <title>Invoice</title>
        </head>
        <body>';

            $content = $content .'

                <table width="100%">
                    <tr>
                        <td colspan="6" style="text-align:center; font-size:15pt;">
                            <b><u>SALES ORDER</u></b><br>
                        </td>
                    </tr>
                    <tr>
                        <td width="7%" height="15px">SO No.</td>
                        <td width="3%"> : </td>
                        <td width="42%">'. $so[0]['kode_so'] .'</td>
                        <td width="13%">Customer</td>
                        <td width="3%"> : </td>
                        <td width="32%">' . ($so[0]['nama_customer']) . '</td>
                    </tr>
                    <tr>
                        <td width="7%" height="15px">PO No.</td>
                        <td width="3%"> : </td>
                        <td width="42%">'. $so[0]['kode_purchase_order_customer'] .'</td>
                        <td width="13%">Schedule Delv.</td>
                        <td width="3%"> : </td>
                        <td width="32%">' . date("d M Y",strtotime($so[0]['tanggal_pengantaran'])) . '</td>
                    </tr>
                </table>
                <br>';

                $content = $content .'

                <br><br>
                <table style="text-align:center; padding: 5px" width="100%">
                    <tr>
                        <th width="5%" border="1" style="background-color: #CBCBCB">No.</th>
                        <th width="40%"border="1" style="background-color: #CBCBCB">Part Name</th>
                        <th width="15%"border="1" style="background-color: #CBCBCB">Qty</th>
                        <th width="15%" border="1" style="background-color: #CBCBCB">Unit</th>
                        <th width="25%" border="1" style="background-color: #CBCBCB">Remark</th>
                    </tr>';

                    $no = 1;
                    for($y=0; $y<count($detail_po_cust); $y++){
                        if($so[0]['id_purchase_order_customer'] == $detail_po_cust[$y]['id_purchase_order_customer']){
                            $content = $content .'
                            <tr>
                                <td border="1">'. $no .'</td>
                                <td border="1">' . $detail_po_cust[$y]['nama_produk'] . '</td>
                                <td border="1">' . $detail_po_cust[$y]['jumlah_produk'] . '</td>
                                <td border="1"> Pcs </td>
                                <td border="1">' . $detail_po_cust[$y]['remark'] . '</td>
                            </tr>';
                        }
                        $no++;
                    }

                    $content = $content .'
                </table>
                <br><br><br>
                
                <table width="100%" style="padding-left: 50px; padding-right: 50px" nobr="true">
                    <tr>
                        <td> Dibuat : </td>
                        <td> Diterima : </td>
                    </tr>
                    <tr><td colspan="2"></td></tr>
                    <tr><td colspan="2"></td></tr>
                    <tr><td colspan="2"></td></tr>
                    <tr><td colspan="2"></td></tr>
                    <tr>
                        <td style="text-align: center">'. $so[0]['nama_karyawan'] .'</td>
                        <td style="text-align: center">';

                            if($so[0]['diterima_oleh'] != 0){
                                $terima = $so[0]['nama_customer'];
                            } else {
                                $terima = "";
                            }
                    
                        $content = $content . $terima .'   
                        </td>
                    </tr>
                    <tr>
                        <td> <hr> <br> Date : </td>
                        <td> <hr> <br> Date : </td>
                    </tr>
                </table>';
                    



            $content = $content .'
        </body>
    </html>
';

$pdf->writeHTML($content);


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