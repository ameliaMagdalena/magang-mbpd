
<?php
    $pdf = new Pdf_oc('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('INVOICE');
    $pdf->SetTopMargin(15);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true,22);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->setPrintHeader(true);
      $pdf->setPrintFooter(true);
    $pdf->AddPage('L','A5');
    
    $fontname = TCPDF_FONTS::addTTFfont('../../../libraries/tcpdf/fonts/tahoma.ttf', 'TrueTypeUnicode', '', 96);
    $pdf->SetFont('Tahoma','', 12); //untuk font, liat dokumentasui


    $content='
    <html>
        <head>
            <title>Invoice</title>
        </head>
        <body>';

        if($apakek[0]['jenis_nota']==1){
            $content = $content .'

                <table>
                    <tr>
                        <td colspan="2" style="text-align:center; font-size:20pt;">
                            <b>I N V O I C E</b><br>
                        </td>
                    </tr>
                    <tr>
                        <td>No. Nota : <b>'. $apakek[0]['id_nota'] .'</b> </td>
                        <td style="text-align: right"> Tanggal : <b>' . date("l, d M Y",strtotime($apakek[0]['waktu_add'])) . '</b> </td>
                    </tr>
                </table>
                <br><br>
                <table style="background-color: #FFBE88; padding: 5px">
                    <tr>
                        <td>Nama File : '. $select_printing[0]['file_printing'] .' </td>
                    </tr>
                    <tr>
                        <td>Deskripsi : '. $select_printing[0]['deskripsi_printing'] .' </td>
                    </tr>
                </table>';

                if($apakek[0]['status_pengantaran']=="0"){

                }else if($apakek[0]['status_pengantaran']=="4"){
                    $content = $content . "<table>
                        <tr>
                            <td>Dengan pengantaran (dibatalkan)</td>
                        </tr>
                    </table>";
                }else{
                    $totalnganter = $apakek[0]['total_tagihan']-(( $select_printing[0]['jumlah_warna'] * $select_printing[0]['harga_satuan_warna']) + ( $select_printing[0]['jumlah_bw'] * $select_printing[0]['harga_satuan_bw']));
                    $content = $content . "<table>
                        <tr>
                            <td>Dengan pengantaran (biaya: Rp ".number_format($totalnganter).",-)</td>
                        </tr>
                    </table>";
                }

                $content = $content .'

                <br><br>
                <table style="text-align:center; font-size:10pt; padding: 5px">
                    <tr>
                        <th width="150px" border="1" style="background-color: #CBCBCB">Jenis Printing</th>
                        <th border="1" style="background-color: #CBCBCB">Harga Satuan</th>
                        <th width="100px"border="1" style="background-color: #CBCBCB">Jumlah</th>
                        <th width="145px" border="1" style="background-color: #CBCBCB">Total Harga</th>
                    </tr>';

                for($a=0; $a<count($select_printing); $a++) {
                    if($select_printing[$a]['id_nota']== $selectNota[0]['id_nota']){
                        if ($select_printing[$a]['jumlah_bw']!=0){
                            $jlhbw = $select_printing[$a]['jumlah_bw'];
                            $hrgbw = $select_printing[$a]['harga_satuan_bw'];
                            $hargabw = $jlhbw*$hrgbw;
                            $content = $content .'
                            <tr>
                                <td border="1"> Hitam-Putih </td>
                                <td border="1">Rp ' . number_format($select_printing[$a]['harga_satuan_bw']) . ',-</td>
                                <td border="1">' . number_format($select_printing[$a]['jumlah_bw']) . '</td>
                                <td border="1">Rp ' . number_format($hargabw) . ',-</td>
                            </tr>';
                        }
                        if ($select_printing[$a]['jumlah_warna']!=0){
                            $jlhwarna = $select_printing[$a]['jumlah_warna'];
                            $hrgwarna = $select_printing[$a]['harga_satuan_warna'];
                            $hargawarna = $jlhwarna*$hrgwarna;
                            $content = $content .'
                            <tr>
                                <td border="1"> Berwarna </td>
                                <td border="1">Rp ' . number_format($select_printing[$a]['harga_satuan_warna']) . ',-</td>
                                <td border="1">' . $select_printing[$a]['jumlah_warna'] . '</td>
                                <td border="1">Rp ' . number_format($hargawarna) . ',-</td>
                            </tr>';
                        }
                    }
                }
                    $content = $content .'
                    <tr>
                        <td colspan="2"></td>
                        <td border="1">Total : </td>
                        <td border="1">Rp ' . number_format($selectNota[0]['total_tagihan']) . ',-</td>
                    </tr>
                </table>';
            
        }
        else{
            $content = $content .'

            <table>
                <tr>
                    <td colspan="2" style="text-align:center; font-size:20pt;">
                        <b>I N V O I C E</b><br>
                    </td>
                </tr>
                <tr>
                    <td>No. Nota : <b>'. $apakek[0]['id_nota'] .'</b> </td>
                    <td style="text-align: right"> Tanggal : <b>' . date("l, d M Y",strtotime($apakek[0]['waktu_add'])) . '</b> </td>';
                    if($stats=="2"){
                        $content = $content .'<td style="text-align: right"> Tanggal : ' . date("l, d M Y",strtotime($apak2[0]['waktu_edit'])) . ' </td>';
                    }
                    else{
                        $content = $content .'<td style="text-align: right"> Tanggal : ' . date("l, d M Y",strtotime($apak[0]['waktu_edit'])) . ' </td>';
                    } $content = $content .'
                </tr>
            </table>';
            
            $content =$content . '<br><br>
            <table style="text-align:center; font-size:10pt; padding: 5px">
                <tr>
                    <th width="30px" border="1" style="background-color: #CBCBCB">No.</th>
                    <th border="1" style="background-color: #CBCBCB">Kode Barang</th>
                    <th width="100px" border="1" style="background-color: #CBCBCB">Nama Barang</th>
                    <th width="100px" border="1" style="background-color: #CBCBCB">Harga Satuan</th>
                    <th width="50px"border="1" style="background-color: #CBCBCB">Jumlah</th>
                    <th width="150px" border="1" style="background-color: #CBCBCB">Total Harga</th>
                </tr>';

                if($stats=="2"){
                    for($a=0; $a<count($select_batal); $a++) {
                        $no = $a+1;
                        $content = $content .'
                        <tr>
                            <td border="1">' . $no . '</td>
                            <td border="1">' . $select_batal[$a]['id_barang'] . '</td>
                            <td border="1">' . $select_batal[$a]['nama_barang'] . '</td>
                            <td border="1">Rp ' . number_format($select_batal[$a]['harga_jual']) . ',-</td>
                            <td border="1">' . $select_batal[$a]['jumlah_barang'] . '</td>
                            <td border="1">Rp ' . number_format($select_batal[$a]['jumlah_harga_barang']) . ',-</td>
                        </tr>';
                    }
                }
                else{
                    $totalss=0;
            for($a=0; $a<count($select_belanja); $a++) {
                $totalss=$totalss+$select_belanja[$a]['jumlah_harga_barang'];
                    $no = $a+1;
                    $content = $content .'
                    <tr>
                        <td border="1">' . $no . '</td>
                        <td border="1">' . $select_belanja[$a]['id_barang'] . '</td>
                        <td border="1">' . $select_belanja[$a]['nama_barang'] . '</td>
                        <td border="1">Rp ' . number_format($select_belanja[$a]['harga_jual']) . ',-</td>
                        <td border="1">' . $select_belanja[$a]['jumlah_barang'] . '</td>
                        <td border="1">Rp ' . number_format($select_belanja[$a]['jumlah_harga_barang']) . ',-</td>
                    </tr>';
            }}
            $content = $content .'
                <tr>
                    <td colspan="4"></td>
                    <td border="1">Total : </td>
                    <td border="1"><b>Rp ' . number_format($selectNota[0]['total_tagihan']) . ',-</b></td>
                </tr>
            </table>';
        }
        if($apakek[0]['status_pengantaran']=="0"){

        }else if($apakek[0]['status_pengantaran']=="4"){
            $content = $content . "<table>
                <tr>
                    <td>Dengan pengantaran (dibatalkan)</td>
                </tr>
            </table>";
        }else{
            $totalnganter = $apakek[0]['total_tagihan']-($totalss);
            $content = $content . "<table>
                <tr>
                    <td>Dengan pengantaran (biaya: Rp ".number_format($totalnganter).",-)</td>
                </tr>
            </table>";
        }


        if($apakek[0]['status_nota']=="3" || $apakek[0]['status_nota']=="1"){
            $content = $content .'
            <img src="' . base_url('assets/images/lunas.png') . '" width="70px">
            '; 
        }
        if($apakek[0]['status_nota']=="2"){
            $content = $content .'
            <img src="' . base_url('assets/images/batal.png') . '" width="70px">
            '; 
        }

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