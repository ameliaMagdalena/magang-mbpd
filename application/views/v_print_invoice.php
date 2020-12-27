
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
        $this->Image($image_file, 15, 14, 15, '', 'PNG', '', 'T', false, 200, '', false, false, 0, false, false, false);
        $this->SetFont('Tahoma','', 12); //nama font, , ukuran
    }

    // Page footer
    public function Footer() {
        $this->SetY(-10);
        $html='<table>
                    <tr>
                        <td style="background-color: #BE2525;height:10px"></td>
                    </tr>
                    <tr>
                        <td style="background-color:#670B0B;height:40px"></td>
                    </tr>
              </table>';
        $this->SetFontSize(8);
        $this->SetTextColor(0, 0, 0); //RGB
        $this->WriteHTML($html, false, true, false, true);                    
    }
}
    //isi pdf
        $pdf = new Pdfx('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Invoice');
        //$pdf->SetTopMargin(10);
        //$pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true,22);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(true);
        $pdf->AddPage('P','A4'); //orientasi Portrait, ukuran A4
        
        $fontname = TCPDF_FONTS::addTTFfont('../../../libraries/tcpdf/fonts/tahoma.ttf', 'TrueTypeUnicode', '', 96);
        $pdf->SetFont('Tahoma','', 10); //nama font, , ukuran

        //$image_file = base_url().'assets/images/logombp.png';

        $atas = '<table>
                    <tr>
                        <td style="width:18%;height:65px;"></td>
                        <td style="width:79%;height:65px;background-color:#BE2525;color:white;padding:1;text-align:right">
                            <span style="text-transform:uppercase;font-size:11px;"><b>'.
                                $nama_perusahaan[0]['isi_tetapan'].'</b></span><br>
                            <span style="font-size:10px">'.$bidang_usaha[0]['isi_tetapan'].' </span><br>
                            <span style="font-size:9px">'.$alamat[0]['isi_tetapan'].' </span><br>
                            <span style="font-size:9px">
                                <span>Phone/Fax: '.$phone[0]['isi_tetapan'].' |</span>
                                <span>Website: '.$website[0]['isi_tetapan'].' |</span>
                                <span>Email: '.$email[0]['isi_tetapan'].' </span>
                            </span>
                        </td>
                        <td style="width:3%;height:65px;background-color:#670B0B"></td>
                    </tr>
                </table>';

        $pdf->WriteHTML($atas);

        $judul = '<div style="text-align:center;font-size:11px">
                    <span><b>INVOICE</b></span><br><span><b>No: '.$inv[0]['id_invoice'].'</b></span>
                </div>';
        
        $pdf->WriteHTML($judul);

        $ditujukan = '<table>
                        <tr>
                            <td><b>Ditujukan Kepada:</b></td>
                        </tr>
                        <tr>
                            <td>'.$inv[0]['ditujukan_kepada'].'</td>
                        </tr>
                        <tr>
                            <td width="50%">'.$cust[0]['nama_customer'].'</td>
                            <td width="50%" style="text-align:right">'.$tanggal.'</td>
                        </tr>
                        <tr>
                            <td width="50%">'.$cust[0]['alamat_customer'].'</td>
                            <td width="50%" style="text-align:right">'.$cust[0]['kode_purchase_order_customer'].'</td>
                        </tr>
                    </table>';

        $pdf->WriteHTML($ditujukan);

        $isi_table = "";

        for($i=0;$i<$jm_dinv;$i++){
            //nama produk
            if($dinv[$i]['keterangan'] == 0){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $dinv[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $dinv[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] . $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $dinv[$i]['nama_produk'] ." ". $nama_ukuran . " (" . $nama_warna . ")";
            }
            else if($dinv[$i]['keterangan'] == 1){
                for($w=0;$w<$jmukuran;$w++){
                    if($ukuran[$w]['id_ukuran_produk'] == $dinv[$i]['id_ukuran_produk']){
                        $nama_ukuran = $ukuran[$w]['ukuran_produk'] ." ". $ukuran[$w]['satuan_ukuran'];
                    }
                }

                $nama_produk = $dinv[$i]['nama_produk'] . $nama_ukuran;
            }
            else if($dinv[$i]['keterangan'] == 2){
                for($w=0;$w<$jmwarna;$w++){
                    if($warna[$w]['id_warna'] == $dinv[$i]['id_warna']){
                        $nama_warna = $warna[$w]['nama_warna'];
                    }
                }

                $nama_produk = $dinv[$i]['nama_produk'] . " (" . $nama_warna . ")";
            }
            else{
                $nama_produk = $dinv[$i]['nama_produk'];
            } 

            $price  = "Rp " . number_format($dinv[$i]['price'],2,',','.');
            $tprice = "Rp " . number_format($dinv[$i]['total_price'],2,',','.');

            $isi_table = $isi_table.
                         '<tr>
                            <td style="text-align: center;vertical-align: middle">'.($i+1).'</td>
                            <td style="text-align: center;vertical-align: middle">'.$nama_produk.'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dinv[$i]['jumlah_produk'].'</td>
                            <td style="text-align: center;vertical-align: middle">Pcs</td>
                            <td style="text-align: center;vertical-align: middle">'.$price.'</td>
                            <td style="text-align: center;vertical-align: middle">'.$tprice.'</td>
                          </tr>';
        }

        $sub_total =  "Rp " . number_format($inv[0]['sub_total'],2,',','.');
        $disc      =  "Rp " . number_format($inv[0]['discount'],2,',','.');
        $ppn       =  "Rp " . number_format($inv[0]['ppn'],2,',','.');
        $total     =  "Rp " . number_format($inv[0]['total'],2,',','.');

        $isi_table = $isi_table.
                    '<table style="padding:2px">
                    <tr>
                        <td width="53.82%"></td>
                        <td border="1" width="27.91%" style="text-align: center;vertical-align: middle">Sub Total</td>
                        <td border="1" width="18.51%" style="text-align: center;vertical-align: middle">'.$sub_total.'</td>
                    </tr>
                    <tr>
                        <td  width="53.82%"></td>
                        <td  border="1"  width="27.91%" style="text-align: center;vertical-align: middle" >Discount '.$inv[0]['discount_rate'].'%</td>
                        <td  border="1" width="18.51%" style="text-align: center;vertical-align: middle">'.$disc.'</td>
                    </tr>
                    <tr>
                        <td  width="53.82%"></td>
                        <td  border="1" width="27.91%" style="text-align: center;vertical-align: middle">PPN '.$inv[0]['ppn_rate'].'%</td>
                        <td  border="1" width="18.51%" style="text-align: center;vertical-align: middle">'.$ppn.'</td>
                    </tr>
                    <tr>
                        <td  width="53.82%"></td>
                        <td  border="1" width="27.91%" style="text-align: center;vertical-align: middle"><b>TOTAL</b></td>
                        <td  border="1" width="18.51%" style="text-align: center;vertical-align: middle"><b>'.$total.'</b></td>
                    </tr>
                    </table>';

        $table = '<table border="1" style="padding:2px">
                    <tr>
                        <td style="text-align: center;vertical-align: middle" width="20px"><b>NO</b></td>
                        <td style="text-align: center;vertical-align: middle" width="200px"><b>ITEM DESCRIPTION</b></td>
                        <td style="text-align: center;vertical-align: middle" width="70px"><b>QTY</b></td>
                        <td style="text-align: center;vertical-align: middle" width="50px"><b>UNIT</b></td>
                        <td style="text-align: center;vertical-align: middle" width="100px"><b>PRICE</b></td>
                        <td style="text-align: center;vertical-align: middle" width="100px"><b>TOTAL PRICE</b></td>
                    </tr>'.
                    $isi_table
                  .'</table>';

        $pdf->WriteHTML($table);

        $pembayaran = '<table>
                            <tr>
                                <td>Pembayaran untuk invoice ini mohon ditransfer ke rekening:</td>
                            </tr>
                            <tr>
                                <td><b>'.$inv[0]['nama_bank'] ." Cab. " .$inv[0]['kantor_cabang'].'</b></td>
                            </tr>
                            <tr>
                                <td><b>'.$inv[0]['nomor_rekening'].'</b></td>
                            </tr>
                            <tr>
                                <td><b>Atas Nama'. $inv[0]['atas_nama'].'</b></td>
                            </tr>
                      </table>';

        $pdf->WriteHTML($pembayaran);

        $ttd = '<table>
                    <tr>
                        <td width="50%"></td>
                        <td style="text-transform:uppercase;text-align: center;vertical-align: middle"><b>'.
                            $nama_perusahaan[0]['isi_tetapan'].'</b><br>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%"></td>
                        <td height="70px"></td>
                    </tr>
                    <tr>
                        <td width="50%"></td>
                        <td style="text-align: center;vertical-align: middle"><u><b>'.$nama_ttd.'</b></u></td>
                    </tr>
                    <tr>
                        <td width="50%"></td>
                        <td style="text-align: center;vertical-align: middle"><b>'.$jabatan_ttd.'</b></td>
                    </tr>
               </table>';

        $pdf->WriteHTML($ttd);

        var_dump(array(
            "data" => "demo"
        ));
        ob_end_clean();
        $pdf->Output('invoice.pdf', 'I');
    //tutup
?>