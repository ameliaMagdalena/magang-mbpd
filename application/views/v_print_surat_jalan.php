
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
                        <td><span>&nbsp;&nbsp; SURAT JALAN</span></td>
                    </tr>
                    <tr>
                        <td>
                           <small>Jl. Boulevard blok L 7 nomor 1 H Citra Raya, Cikupa, Tangerang</small>
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
        <br><br><span style='font-size: medium'>PT Maju Bersama Persada Dayamu</span> - Surat Jalan
        </p>";
        $this->SetFontSize(8);
        $this->SetTextColor(0, 0, 0); //RGB
        $this->WriteHTML($html, false, true, false, true);                    
    }
}
    //isi pdf
        $pdf = new Pdfx('l', 'mm', 'A5', true, 'UTF-8', false);
        $pdf->SetTitle('Surat Jalan');
        $pdf->SetTopMargin(10);
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
                        <td width="65%"></td>
                        <td width="35%"><b>'.$kota[0]['isi_tetapan'].', '.$tanggal.'</b></td>
                    </tr>
                    <tr>
                        <td width="65%"></td>
                        <td width="35%"><b>Kepada Yth:</b></td>
                    </tr>
                    <tr>
                        <td width="65%"></td>
                        <td width="35%"><b>'.$po[0]['nama_customer'].'</b></td>
                    </tr>
                    <tr>
                        <td width="65%"></td>
                        <td width="35%"><b>'.$po[0]['alamat_customer'].'</b></td>
                    </tr>
                    <tr>
                        <td width="100%"></td>
                    </tr>
                    <tr>
                        <td width="50%"><b>No Surat Jalan: '.$sj[0]['id_surat_jalan'].' </b></td>
                        <td width="50%"><b>No PO: '.$po[0]['kode_purchase_order_customer'].'</b></td>
                    </tr>
                </table>';

        $pdf->WriteHTML($atas);


        $isi_table="";
        for($i=0;$i<$jm_isj;$i++){
            //nama produk
            if($isj[$i]['keterangan'] == 0){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $isj[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $isj[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $isj[$i]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
            }
            else if($isj[$i]['keterangan'] == 1){
                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $isj[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $isj[$i]['nama_produk'] . $nama_ukuran;
            }
            else if($isj[$i]['keterangan'] == 2){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $isj[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                $nama_produk = $isj[$i]['nama_produk'] . " (" . $nama_warna . ")";
            }
            else{
                $nama_produk = $isj[$i]['nama_produk'];
            }

            $isi_table = $isi_table.
                        '<tr>
                            <td style="text-align: center;vertical-align: middle">'.($i+1).'</td>
                            <td style="text-align: center;vertical-align: middle">'.$isj[$i]['jumlah_produk'].'</td>
                            <td style="text-align: center;vertical-align: middle">Pcs</td>
                            <td style="text-align: center;vertical-align: middle">'.$isj[$i]['kode_produk'].'</td>
                            <td style="text-align: center;vertical-align: middle">'.$nama_produk.'</td>
                        </tr>';
        }

        $table = '<table border="1" style="border-collapse: collapse;padding:5px">
                    <tr>
                        <td style="text-align: center;vertical-align: middle;width:30px"><b>NO</b></td>
                        <td style="text-align: center;vertical-align: middle;width:70px"><b>QTY</b></td>
                        <td style="text-align: center;vertical-align: middle;width:75px"><b>SATUAN</b></td>
                        <td style="text-align: center;vertical-align: middle;width:150px"><b>KODE PRODUK</b></td>
                        <td style="text-align: center;vertical-align: middle;width:210px"><b>NAMA PRODUK</b></td>
                    </tr>'.
                        $isi_table.
                '</table>';

        $pdf->WriteHTML($table);

        $keterangan = '<table border="1" style="padding:5px">
                            <tr>
                                <td>'.$sj[0]['keterangan'].'</td>
                            </tr>
                        </table>';
        $pdf->WriteHTML($keterangan);

        $ttd = '<table style="padding:5px">
                    <tr>   
                        <td width="55%"></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle;width:75px"><b>Tanda Tangan</b></td>
                        <td colspan="2" border="1" width="30%" style="text-align: center;vertical-align: middle;width:150px"><b>Hormat Kami</b></td>
                    </tr>
                    <tr> 
                        <td width="55%"></td>
                        <td border="1" width="15%" height="50px"></td>
                        <td border="1" width="15%" height="50px"></td>
                        <td border="1" width="15%" height="50px"></td>
                    </tr>
                    <tr> 
                        <td width="55%"></td>
                        <td border="1" width="15%"></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle"><b>Driver</b></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle"><b>Mengetahui</b></td>
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