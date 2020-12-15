
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
                             Bukti Pengiriman Delivery Barang (BPBD)
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
        <br><br><span style='font-size: medium'>PT Maju Bersama Persada Dayamu</span> - Bukti Pengiriman Delivery Barang (BPBD)
        </p>";
        $this->SetFontSize(8);
        $this->SetTextColor(0, 0, 0); //RGB
        $this->WriteHTML($html, false, true, false, true);                    
    }
}
    //isi pdf
        $pdf = new Pdfx('l', 'mm', 'A5', true, 'UTF-8', false);
        $pdf->SetTitle('Bukti Pengiriman Delivery Barang (BPBD)');
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true,22);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(true);
        $pdf->AddPage('l','A5'); //orientasi Portrait, ukuran A4
        
        $fontname = TCPDF_FONTS::addTTFfont('../../../libraries/tcpdf/fonts/tahoma.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont('Tahoma','', 10); //nama font, , ukuran

        $atas = '<table>
                    <tr>
                        <td width="58%"></td>
                        <td width="15%">No BPBD</td>
                        <td width="27%">: '.$bpbd[0]['no_bpbd'].'</td>
                    </tr>
                    <tr>
                        <td width="58%"></td>
                        <td width="15%">Hari & Tanggal</td>
                        <td width="27%">: '.$tanggal.'</td>
                    </tr>
                </table>';

        $pdf->WriteHTML($atas);

        $isi_table="";

        for($i=0;$i<$jmdet_bpbd;$i++){
            //nama produk
            if($det_bpbd[$i]['keterangan'] == 0){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $det_bpbd[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }
      
                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $det_bpbd[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                    }
                }
      
                $nama_produk = $det_bpbd[$i]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
            }
            else if($det_bpbd[$i]['keterangan'] == 1){
                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $det_bpbd[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                    }
                }
      
                $nama_produk = $det_bpbd[$i]['nama_produk'] . $nama_ukuran;
            }
            else if($det_bpbd[$i]['keterangan'] == 2){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $det_bpbd[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }
      
                $nama_produk = $det_bpbd[$i]['nama_produk'] . " (" . $nama_warna . ")";
            }
            else{
                $nama_produk = $det_bpbd[$i]['nama_produk'];
            }

            $isi_table = $isi_table.
                        '<tr>
                            <td style="text-align: center;vertical-align: middle">'.($i+1).'</td>
                            <td style="text-align: center;vertical-align: middle">'.$nama_produk.'</td>
                            <td style="text-align: center;vertical-align: middle">'.$det_bpbd[$i]['jumlah_produk'].' pcs'.'</td>
                            <td style="text-align: center;vertical-align: middle">Pcs</td>
                            <td style="text-align: center;vertical-align: middle">'.$det_bpbd[$i]['keterangan_bpbd'].'</td>
                        </tr>';
          }


        $table = '<table border="1" style="border-collapse: collapse;padding:5px">
                    <tr>
                        <td style="text-align: center;vertical-align: middle;width:30px"><b>NO</b></td>
                        <td style="text-align: center;vertical-align: middle;width:230px"><b>ITEM</b></td>
                        <td style="text-align: center;vertical-align: middle;width:75px"><b>QTY</b></td>
                        <td style="text-align: center;vertical-align: middle;width:50px"><b>UNIT</b></td>
                        <td style="text-align: center;vertical-align: middle;width:150px"><b>KET</b></td>
                    </tr>'.
                        $isi_table.
                '</table>';

        $pdf->WriteHTML($table);

        $keterangan = '<table border="1" style="padding:5px">
                            <tr>
                                <td>'.$bpbd[0]['keterangan'].'</td>
                            </tr>
                        </table>';
        $pdf->WriteHTML($keterangan);

        $ttd = '<table style="padding:5px">
                    <tr>   
                        <td width="55%">Plat No<span> : '.$bpbd[0]['plat_no'].'</span></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle;width:75px"><b>Diterima</b></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle;width:75px"><b>Dicek</b></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle;width:75px"><b>WH FG</b></td>
                    </tr>
                    <tr> 
                        <td width="55%">Driver<span>  : '.$bpbd[0]['driver'].'</span></td>
                        <td border="1" width="15%" height="50px"></td>
                        <td border="1" width="15%" height="50px"></td>
                        <td border="1" width="15%" height="50px"></td>
                    </tr>
                </table>';

        $pdf->WriteHTML($ttd);

        var_dump(array(
            "data" => "demo"
        ));
        ob_end_clean();
        $pdf->Output('contoh1.pdf', 'I');
    //tutup
?>