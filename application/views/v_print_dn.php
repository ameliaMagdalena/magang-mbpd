
<?php
    $pdf = new Pdf_oc('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Sales Order');
    $pdf->SetTopMargin(50);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true,22);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->setPrintHeader(true);
      $pdf->setPrintFooter(true);
    $pdf->AddPage('P','A4'); //orientasi Portrait, ukuran A4
    
    $fontname = TCPDF_FONTS::addTTFfont('../../../libraries/tcpdf/fonts/tahoma.ttf', 'TrueTypeUnicode', '', 96);
    $pdf->SetFont('Tahoma','', 10); //nama font, , ukuran


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
                            <b><u>DELIVERY NOTE</u></b><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td width="8%">Customer</td>
                        <td width="3%"> : </td>
                        <td width="47%">' . ($dn[0]['nama_supplier']) . '</td>
                        <td width="13%" height="15px">DN Date</td>
                        <td width="3%"> : </td>
                        <td width="26%">'. date("d M Y",strtotime($dn[0]['tanggal_dn'])) .'</td>
                    </tr>
                    <tr>
                        <td width="8%" height="15px">No. DN</td>
                        <td width="3%"> : </td>
                        <td width="47%">'. $dn[0]['kode_delivery_note'] .'</td>
                        <td width="13%">Delv. Date</td>
                        <td width="3%"> : </td>
                        <td width="26%">' . date("d M Y",strtotime($dn[0]['tanggal_penerimaan'])) . '</td>
                    </tr>
                </table>
                <br>';

                $content = $content .'

                <br><br>
                <table style="text-align:center; padding: 5px" width="100%">
                    <tr>
                        <th width="5%" border="1" style="background-color: #CBCBCB">No.</th>
                        <th width="25%"border="1" style="background-color: #CBCBCB">Code Item</th>
                        <th width="30%"border="1" style="background-color: #CBCBCB">Description</th>
                        <th width="10%"border="1" style="background-color: #CBCBCB">Qty Req</th>
                        <th width="10%"border="1" style="background-color: #CBCBCB">Qty Act</th>
                        <th width="10%" border="1" style="background-color: #CBCBCB">Unit</th>
                        <th width="10%" border="1" style="background-color: #CBCBCB">Remark</th>
                    </tr>';

                    $no = 1;
                    for($y=0; $y<count($detail_dn); $y++){
                        if($dn[0]['id_delivery_note'] == $detail_dn[$y]['id_delivery_note']){
                            $content = $content .'
                            <tr>
                                <td border="1">'. $no .'</td>
                                <td border="1">' . $detail_dn[$y]['kode_sub_jenis_material'] . '</td>
                                <td border="1">' . $detail_dn[$y]['nama_jenis_material'] . ' ' . $detail_dn[$y]['nama_sub_jenis_material'] . '</td>
                                <td border="1">' . $detail_dn[$y]['jumlah_diminta'] . '</td>
                                <td border="1">' . $detail_dn[$y]['jumlah_aktual'] . '</td>
                                <td border="1">' . $detail_dn[$y]['satuan_ukuran'] . '</td>
                                <td border="1">' . $detail_dn[$y]['remark'] . '</td>
                            </tr>';
                        }
                        $no++;
                    }

                    $content = $content .'
                </table>
                <br><br><br>
                
                <table width="80%" style="padding-left: 10px; padding-right: 10px">
                    <tr>
                        <td style="text-align: center"> Disetujui : </td>
                        <td style="text-align: center"> Dibuat : </td>
                        <td style="text-align: center"> Dicheck : </td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                    <tr><td colspan="3"></td></tr>
                    <tr><td colspan="3"></td></tr>
                    <tr><td colspan="3"></td></tr>
                    <tr>
                        <td style="text-align: center">';
                            if($dn[0]['disetujui_oleh']!="" && $dn[0]['disetujui_oleh'] == $kary[0]['id_user']){
                                $stj = $kary[0]['nama_karyawan'];
                            }else if($dn[0]['disetujui_oleh'] == ""){
                                $stj = "";
                            }
                            $content = $content . $stj .'   
                        </td>
                        <td style="text-align: center">';
                            if($dn[0]['dibuat_oleh'] == $kary[0]['id_user']){
                                $content = $content . $kary[0]['nama_karyawan'];
                            }
                        $content = $content . '</td>
                        <td></td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                    <tr>
                        <td><hr></td>
                        <td><hr></td>
                        <td><hr></td>
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