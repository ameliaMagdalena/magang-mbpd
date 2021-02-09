
<?php
    $pdf = new Pdf_po('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('PO Supplier');
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true,5);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->setPrintHeader(true);
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(5, 8, 5, true); // set the margins // kiri,atas,kanan
    $pdf->setCellHeightRatio(1.5);
    $pdf->AddPage('L','A5'); //orientasi landscape, ukuran A4
    
    $fontname = TCPDF_FONTS::addTTFfont('../../../libraries/tcpdf/fonts/tahoma.ttf', 'TrueTypeUnicode', '', 96);
    $pdf->SetFont('Tahoma','', 8); //nama font, , ukuran

    $content = '
    <table width="100%">
        <tr>
            <td width="65%"></td>
            <td width="35%">
                Kepada :<br> <b>'.$detail_po_sup[0]['nama_supplier'].'</b><br>
                '.$detail_po_sup[0]['alamat_supplier'].'
            </td>
        </tr>
    </table>';
    $pdf->writeHTML($content);
    $pdf->SetMargins(5, 30, 5, true); // set the margins // kiri,atas,kanan

    $content='
    <html>
        <head>
            <title>Invoice</title>
        </head>
        <body>';

            $content = $content .'
            <br>
            <table width="100%" style="padding: 2px">
                <tr>
                    <td style="text-align:center; font-size:12pt;">
                        <b><u>Purchase Order Supplier</u></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                        No : '.$detail_po_sup[0]['kode_purchase_order_supplier'].'<br>
                        Tanggal/Date : '.date("d M Y",strtotime($detail_po_sup[0]['tanggal_po'])).'
                    </td>
                </tr>
            </table>

            <br><br>
            <table style="padding: 3px" width="100%">
                <tr>
                    <th width="17%" border="1" style="background-color: #CBCBCB; text-align:center">Kode Barang</th>
                    <th width="30%"border="1" style="background-color: #CBCBCB; text-align:center">Nama Barang/Description</th>
                    <th width="10%" border="1" style="background-color: #CBCBCB; text-align:center">Unit</th>
                    <th width="10%"border="1" style="background-color: #CBCBCB; text-align:center">Quantity</th>
                    <th colspan="2" width="15%" border="1" style="background-color: #CBCBCB; text-align:center">Harga Satuan</th>
                    <th colspan="2" width="18%" border="1" style="background-color: #CBCBCB; text-align:center">Jumlah/Total Price</th>
                </tr>';

                for($y=0; $y<count($detail_po_sup); $y++){
                    $content = $content .'
                    <tr>
                        <td border="1" style="text-align:center">' . $detail_po_sup[$y]['kode_sub_jenis_material'] . '</td>
                        <td border="1">' . $detail_po_sup[$y]['nama_jenis_material'] . ' '.$detail_po_sup[$y]['nama_sub_jenis_material']. '</td>
                        <td border="1" style="text-align:center">' . $detail_po_sup[$y]['satuan_ukuran'] . '</td>
                        <td border="1" style="text-align:center">' . $detail_po_sup[$y]['jumlah_material'] . '</td>
                        <td width="4%">Rp</td>
                        <td style="text-align:right; border-right: 1px solid black" width="11%">' . $detail_po_sup[$y]['harga_satuan'] . '</td>
                        <td style="border-bottom: 1px solid black" width="4%">Rp</td>
                        <td style="text-align:right; border-right: 1px solid black; border-bottom: 1px solid black" width="14%">' . $detail_po_sup[$y]['harga_total'] . '</td>
                    </tr>';
                }

                $content = $content .'
                <tr>
                    <td>Pengiriman</td>
                    <td colspan="2"> : </td>
                    <td border="1" colspan="3">Dasar Pengenaan Pajak</td>
                    <td style="border-bottom: 1px solid black" width="4%">Rp</td>
                    <td style="text-align:right; border-right: 1px solid black; border-bottom: 1px solid black" width="14%">' . $po_sup[0]['harga_sebelum_pajak'] . '</td>
                </tr>
                <tr>
                    <td>Pembayaran</td>
                    <td colspan="2"> : </td>
                    <td style="border-left: 1px solid black">PPN</td>
                    <td style="border-right: 1px solid black" colspan="2">10%</td>
                    <td style="border-bottom: 1px solid black" width="4%">Rp</td>
                    <td style="text-align:right; border-right: 1px solid black; border-bottom: 1px solid black" width="14%">' . $po_sup[0]['ppn'] . '</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td colspan="2"> : '. $po_sup[0]['keterangan'] .'</td>
                    <td border="1" colspan="3">Total (Rp)</td>
                    <td style="border-bottom: 1px solid black" width="4%">Rp</td>
                    <td style="text-align:right; border-right: 1px solid black; border-bottom: 1px solid black" width="14%">' . $po_sup[0]['total_harga_akhir'] . '</td>
                </tr>
            </table>
            
            <br><br>

            <table nobr="true">
                <tr>
                    <td colspan="2" width="49%"></td>
                    <td style="text-align:center" border="1" colspan="2" width="17%"> Dibuat, </td>
                    <td style="text-align:center" border="1" colspan="3" width="17%"> Disetujui, </td>
                    <td style="text-align:center" border="1" width="17%"> Diterima, </td>
                </tr>
                <tr>
                    <td colspan="2" width="49%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black" colspan="2" width="17%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black" colspan="3" width="17%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black; border-right: 1px solid black" width="17%"></td>
                </tr>
                <tr>
                    <td colspan="2" width="49%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black" colspan="2" width="17%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black" colspan="3" width="17%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black; border-right: 1px solid black" width="17%"></td>
                </tr>
                <tr>
                    <td colspan="2" width="49%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black" colspan="2" width="17%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black" colspan="3" width="17%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black; border-right: 1px solid black" width="17%"></td>
                </tr>
                <tr>
                    <td colspan="2" width="49%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black" colspan="2" width="17%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black" colspan="3" width="17%"></td>
                    <td style="text-align:center" style="border-left: 1px solid black; border-right: 1px solid black" width="17%"></td>
                </tr>
                <tr>
                    <td colspan="2" width="49%"></td>
                    <td style="text-align:center" border="1" colspan="2" width="17%">'. $po_sup[0]['nama_karyawan'] .'</td>
                    <td style="text-align:center" border="1" colspan="3" width="17%"> Direktur </td>
                    <td style="text-align:center" border="1" width="17%"> Supplier </td>
                </tr>
            </table>
        </body>
    </html>';
    
    $pdf->writeHTML($content);
    var_dump(array(
        "data" => "demo"
    ));
    ob_end_clean();
    $pdf->Output('contoh1.pdf', 'I');
?>