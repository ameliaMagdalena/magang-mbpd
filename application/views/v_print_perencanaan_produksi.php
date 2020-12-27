
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/../libraries/tcpdf/tcpdf.php';

class Pdfx extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    
    //Page header
    public function Header(){
        $image_file = base_url().'assets/images/logombp.png';
        //Image( filename, left, top, width, height, type, link, align, resize, dpi, align, ismask, imgmask, border, fitbox, hidden, fitonpage) 
        $this->Image($image_file, 5, 8, 15, '', 'PNG', '', 'T', false, 200, '', false, false, 0, false, false, false);
        $this->SetFont('Tahoma','', 12); //nama font, , ukuran

        $html = '<table>
                    <tr>
                        <td>
                            <b>PT. MAJU BERSAMA PERSADA DAYAMU</b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            PERENCANAAN PRODUKSI '.$tanggalnya.'
                        </td>
                    </tr>
                </table>';

        $this->WriteHTML($html, false, true, false, true); 
    }

    // Page footer
    public function Footer() {
        $this->SetY(-18);
        $html="
        <p>
        <hr style='width:98%;'>
        <br><br><span style='font-size: medium'>PT Maju Bersama Persada Dayamu</span> - Perencanaan Produksi<br>
        </p>";
        $this->SetFontSize(8);
        $this->SetTextColor(0, 0, 0); //RGB
        $this->WriteHTML($html, false, true, false, true);                    
    }
    
}
    //isi pdf
        $pdf = new Pdfx('l', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Perencanaan Produksi '. $tanggalnya);
        $pdf->SetTopMargin(15);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true,22);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(true);
        $pdf->AddPage('l','A4'); //orientasi Portrait, ukuran A4
        
        $fontname = TCPDF_FONTS::addTTFfont('../../../libraries/tcpdf/fonts/tahoma.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont('Tahoma','', 10); //nama font, , ukuran

        $tanggal = ""; 

        for($i=0;$i<7;$i++){
            $tanggal =  $tanggal. '<td style="text-align:center;vertical-align:middle;width:40px"><b>'.$day[$i].'</b></td>';
        }

        $jumlah_normal = "";
        $baris_table = "";
        for($k=0;$k<$jm_dpo;$k++){
            $id_dpo = $dpo[$k]['id_detail_purchase_order'];

            //nama produk
                if($dpo[$k]['keterangan'] == 0){
                    for($w=0;$w<$jmwarna;$w++){
                        if($warna[$w]['id_warna'] == $dpo[$k]['id_warna']){
                            $nama_warna = $warna[$w]['nama_warna'];
                        }
                    }

                    for($w=0;$w<$jmukuran;$w++){
                        if($ukuran[$w]['id_ukuran_produk'] == $dpo[$k]['id_ukuran_produk']){
                            $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                        }
                    }

                    $nama_produk = $dpo[$k]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
                }
                else if($dpo[$k]['keterangan'] == 1){
                    for($w=0;$w<$jmukuran;$w++){
                        if($ukuran[$w]['id_ukuran_produk'] == $dpo[$k]['id_ukuran_produk']){
                            $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                        }
                    }

                    $nama_produk = $dpo[$k]['nama_produk'] . $nama_ukuran;
                }
                else if($dpo[$k]['keterangan'] == 2){
                    for($w=0;$w<$jmwarna;$w++){
                        if($warna[$w]['id_warna'] == $dpo[$k]['id_warna']){
                            $nama_warna = $warna[$w]['nama_warna'];
                        }
                    }

                    $nama_produk = $dpo[$k]['nama_produk'] . " (" . $nama_warna . ")";
                }
                else{
                    $nama_produk = $dpo[$k]['nama_produk'];
                }
            //tutup
            
            //keterangan
                $ct_berapa = 0;
                $cari ="";
                for($o=0;$o<$jm_jumlah_ct;$o++){
                    if($jumlah_ct[$o]['id_produk'] == $dpo[$k]['id_produk']){
                        $ct_berapa = $jumlah_ct[$o]['jumlah_ctnya'];
                    }        
                }


                $ket =" ";
                $ct_ke = 0;
                for($p=0;$p<$jm_semua_ct;$p++){
                    $id_line = $semua_ct[$p]['id_line'];
                    $total[$p] = 0;

                    if($ct_ke == 0){
                        $inputan0 = "";

                        for($u=0;$u<7;$u++){
                            for($q=0;$q<$jm_dpl;$q++){
                                $id_dpo_dpl  = $dpl[$q]['id_detail_purchase_order'];
                                $id_line_dpl = $dpl[$q]['id_line'];
                                $tgl_dpl     = $dpl[$q]['tanggal'];

                                $tanggal_cek = $semua_tanggal[$u]['tanggal'];

                                if($id_dpo_dpl == $id_dpo && $id_line_dpl == $id_line && $tgl_dpl == $tanggal_cek){
                                    if($dpl[$q]['jumlah_item_perencanaan'] == 0){
                                        //$isi_inputan = $isi_inputan.'<td> </td>';
                                        $inputan0 = $inputan0.
                                    '<td></td>';
                                    }
                                    else{
                                        $inputan0 = $inputan0.'<td style="text-align: center;vertical-align: middle">'.$dpl[$q]['jumlah_item_perencanaan'].'</td>';
                                        $total[$p] = $total[$p] + intval($dpl[$q]['jumlah_item_perencanaan']);
                                    }
                                }
                            }
                        }
                        if($total[$p] == 0){
                            $inputan0 = $inputan0.
                                '<td style="text-align: center;vertical-align: middle">-</td>';
                        }
                        else{
                            $inputan0 = $inputan0.
                                '<td style="text-align: center;vertical-align: middle">'.$total[$p].'</td>';
                        }
                    }else{
                        //isi inputan
                        $inputan = "";
                        for($u=0;$u<7;$u++){
                            for($q=0;$q<$jm_dpl;$q++){
                                $id_dpo_dpl  = $dpl[$q]['id_detail_purchase_order'];
                                $id_line_dpl = $dpl[$q]['id_line'];
                                $tgl_dpl     = $dpl[$q]['tanggal'];

                                $tanggal_cek = $semua_tanggal[$u]['tanggal'];

                                if($id_dpo_dpl == $id_dpo && $id_line_dpl == $id_line && $tgl_dpl == $tanggal_cek){
                                    if($dpl[$q]['jumlah_item_perencanaan'] == 0){
                                        //$isi_inputan = $isi_inputan.'<td> </td>';
                                        $inputan = $inputan.
                                    '<td></td>';
                                    }
                                    else{
                                        $inputan = $inputan.'<td style="text-align: center;vertical-align: middle">'.$dpl[$q]['jumlah_item_perencanaan'].'</td>';
                                        $total[$p] = $total[$p] + intval($dpl[$q]['jumlah_item_perencanaan']);
                                    }
                                }
                            }
                        }
                        if($total[$p] == 0){
                            $inputan = $inputan.
                                '<td style="text-align: center;vertical-align: middle">-</td>';
                        }
                        else{
                            $inputan = $inputan.
                                '<td style="text-align: center;vertical-align: middle">'.$total[$p].'</td>';
                        }
                    }
                    
                    if($semua_ct[$p]['id_produk'] ==  $dpo[$k]['id_produk']){
                        if($ct_ke == 0){
                            $nama_line0 = $semua_ct[$p]['nama_line'];
                        } else{
                            $ket = $ket .
                                '<tr>
                                    <td style="text-align: center;vertical-align: middle">'.
                                        $semua_ct[$p]['nama_line'].
                                    '</td>'.
                                    $inputan.
                                '</tr>';
                        }
                        $ct_ke++;
                    }
                }
            //tutup
           
            if($ct_berapa == 4){
                $baris_table = $baris_table.
                            '<tr>
                                <td rowspan="4" style="text-align: center;vertical-align: middle">'.($k+1).'</td>
                                <td rowspan="4" style="text-align: center;vertical-align: middle">'.$nama_produk.'</td>
                                <td rowspan="4" style="text-align: center;vertical-align: middle">'.$dpo[$k]['kode_purchase_order_customer'].'</td>
                                <td rowspan="4" style="text-align: center;vertical-align: middle">'.$dpo[$k]['jumlah_produk'].'</td>
                                <td style="text-align: center;vertical-align: middle">'.$nama_line0.'</td>'.
                                $inputan0.
                            '</tr>'.$ket;
            } else if($ct_berapa == 3){
                $baris_table = $baris_table.
                            '<tr>
                                <td rowspan="3" style="text-align: center;vertical-align: middle">'.($k+1).'</td>
                                <td rowspan="3" style="text-align: center;vertical-align: middle">'.$nama_produk.'</td>
                                <td rowspan="3" style="text-align: center;vertical-align: middle">'.$dpo[$k]['kode_purchase_order_customer'].'</td>
                                <td rowspan="3" style="text-align: center;vertical-align: middle">'.$dpo[$k]['jumlah_produk'].'</td>
                                <td style="text-align: center;vertical-align: middle">'.$nama_line0.'</td>'.
                                $inputan0.
                            '</tr>'.$ket;
            } 
            
            $jumlah_normal++;
        }

        $tertunda = "";
        for($k=0;$k<$jm_dpore;$k++){
            $id_dpo = $dpore[$k]['id_detail_purchase_order'];
            $id_produksi_tertunda = $dpore[$k]['id_produksi_tertunda'];
           
            
            $jumlah_normal++;

            //nama produk
                if($dpore[$k]['keterangan'] == 0){
                    for($w=0;$w<$jmwarna;$w++){
                        if($warna[$w]['id_warna'] == $dpore[$k]['id_warna']){
                            $nama_warna = $warna[$w]['nama_warna'];
                        }
                    }

                    for($w=0;$w<$jmukuran;$w++){
                        if($ukuran[$w]['id_ukuran_produk'] == $dpore[$k]['id_ukuran_produk']){
                            $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                        }
                    }

                    $nama_produk = $dpore[$k]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
                }
                else if($dpore[$k]['keterangan'] == 1){
                    for($w=0;$w<$jmukuran;$w++){
                        if($ukuran[$w]['id_ukuran_produk'] == $dpore[$k]['id_ukuran_produk']){
                            $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                        }
                    }

                    $nama_produk = $dpore[$k]['nama_produk'] . $nama_ukuran;
                }
                else if($dpore[$k]['keterangan'] == 2){
                    for($w=0;$w<$jmwarna;$w++){
                        if($warna[$w]['id_warna'] == $dpore[$k]['id_warna']){
                            $nama_warna = $warna[$w]['nama_warna'];
                        }
                    }

                    $nama_produk = $dpore[$k]['nama_produk'] . " (" . $nama_warna . ")";
                }
                else{
                    $nama_produk = $dpore[$k]['nama_produk'];
                }
            //tutup

            //inputan
                $total[$k] = 0;
                $inputan = "";

                for($u=0;$u<7;$u++){
                    $tanggal_cek = $semua_tanggal[$u]['tanggal'];

                    $cari_terisi = 0;
                    for($q=0;$q<$jm_dplre;$q++){
                        $id_prodtun  = $dplre[$q]['id_produksi_tertunda'];
                        $tgl_dpl     = $dplre[$q]['tanggal'];

                        if($id_prodtun == $id_produksi_tertunda && $tgl_dpl == $tanggal_cek){
                            $cari_terisi++;
                        } 
                    }

                    if($cari_terisi == 0){
                        $inputan = $inputan.'<td style="text-align: center;vertical-align: middle"></td>';
                    } else{
                        for($q=0;$q<$jm_dplre;$q++){
                            $id_prodtun  = $dplre[$q]['id_produksi_tertunda'];
                            $tgl_dpl     = $dplre[$q]['tanggal'];
    
                            if($id_prodtun == $id_produksi_tertunda && $tgl_dpl == $tanggal_cek){
                                $inputan = $inputan.'<td style="text-align: center;vertical-align: middle">'.$dplre[$q]['jumlah_item_perencanaan'].'</td>';
                                $total[$k] = $total[$k] + intval($dplre[$q]['jumlah_item_perencanaan']);
                            } 
                        }
                    }
                }

                if($total[$k] == 0){
                    $inputan = $inputan.'<td style="text-align: center;vertical-align: middle">-</td>';
                }
                else{
                    $inputan = $inputan.'<td style="text-align: center;vertical-align: middle">'.$total[$k].'</td>';
                }
            //tutup

            $tertunda = $tertunda.
                        '<tr>
                            <td style="text-align: center;vertical-align: middle">'.($jumlah_normal).'</td>
                            <td style="text-align: center;vertical-align: middle">'.$nama_produk.'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dpore[$k]['kode_purchase_order_customer'].'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dpore[$k]['jumlah_tertunda'].'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dpore[$k]['nama_line'].'</td>'.
                            $inputan.
                        '</tr>';    
                
            }

        
        $content =
            '<html>
                <body>
                    <h3 style="text-align:center">'.$tanggalnya.'</h3>
                    <table border="1" style="border-collapse: collapse;padding:5px">
                        <tr>
                            <td style="text-align: center;vertical-align: middle;width:30px"><b>NO</b></td>
                            <td style="text-align: center;vertical-align: middle;width:180px"><b>NAMA PRODUK</b></td>
                            <td style="text-align: center;vertical-align: middle;width:70px"><b>KODE PO</b></td>
                            <td style="text-align: center;vertical-align: middle;width:50px"><b>QTY</b></td>
                            <td style="text-align: center;vertical-align: middle;width:100px"><b>KET</b></td>'.
                                $tanggal.
                            '<td style="text-align: center;vertical-align: middle;width:55px"><b>TOTAL</b></td>
                        </tr>'.
                            $baris_table.
                            $tertunda.
                    '</table>
                </body>
            </html>';

        $pdf->writeHTML($content);

        var_dump(array(
            "data" => "demo"
        ));
        ob_end_clean();
        $pdf->Output('perencanaan_produksi.pdf', 'I');
    //tutup
?>