
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
                            LAPORAN LEMBUR
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
        <br><br><span style='font-size: medium'>PT Maju Bersama Persada Dayamu</span> - Laporan Lembur
        </p>";
        $this->SetFontSize(8);
        $this->SetTextColor(0, 0, 0); //RGB
        $this->WriteHTML($html, false, true, false, true);                    
    }
}
    //isi pdf
        $pdf = new Pdfx('l', 'mm', 'A5', true, 'UTF-8', false);
        $pdf->SetTitle('Laporan Lembur ');
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
                        <td width="15%">Line</td>
                        <td width="27%">: '.$spl[0]['nama_line'].'</td>
                    </tr>
                    <tr>
                        <td width="58%"></td>
                        <td width="15%">Hari & Tanggal</td>
                        <td width="27%">: '.$tanggal.'</td>
                    </tr>
                    <tr>
                        <td width="58%"></td>
                        <td width="15%">Waktu</td>
                        <td width="27%">: '.$spl[0]['waktu_lembur'].'</td>
                    </tr>
                </table>';

        $pdf->WriteHTML($atas);

        $isi_table = "";
        for($i=0;$i<$jm_dspl;$i++){
            $isi_table = $isi_table.
                        '<tr>
                            <td style="text-align: center;vertical-align: middle">'.($i+1).'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dspl[$i]['nama_karyawan'].'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dspl[$i]['aktual_lembur'].'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dspl[$i]['waktu_in_aktual'].'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dspl[$i]['waktu_out_aktual'].'</td>
                            <td style="text-align: center;vertical-align: middle">'.$dspl[$i]['keterangan_aktual'].'</td>
                        </tr>';
        }

        $table = '<table border="1" style="border-collapse: collapse;padding:5px">
                    <tr>
                        <td rowspan="2" style="text-align: center;vertical-align: middle;width:30px"><b>NO</b></td>
                        <td rowspan="2" style="text-align: center;vertical-align: middle;width:150px"><b>NAMA KARYAWAN</b></td>
                        <td rowspan="2" style="text-align: center;vertical-align: middle;width:75px"><b>AKTUAL LEMBUR</b></td>
                        <td colspan="2" style="text-align: center;vertical-align: middle;width:150px"><b>JAM LEMBUR</b></td>
                        <td rowspan="2" style="text-align: center;vertical-align: middle;width:130px"><b>KETERANGAN</b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;vertical-align: middle;width:75px"><b>IN</b></td>
                        <td style="text-align: center;vertical-align: middle;width:75px"><b>OUT</b></td>
                    </tr>'.
                        $isi_table.
                '</table>';

        $pdf->WriteHTML($table);

        $keterangan = '<table border="1" style="padding:5px">
                            <tr>
                                <td>'.$spl[0]['keterangan_laporan'].'</td>
                            </tr>
                        </table>';
        $pdf->WriteHTML($keterangan);

        $ttd = '<table style="padding:5px">
                    <tr>   
                        <td width="55%"></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle;width:75px"><b>Diajukan</b></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle;width:75px"><b>Disetujui</b></td>
                        <td border="1" width="15%" style="text-align: center;vertical-align: middle;width:75px"><b>Mengetahui</b></td>
                    </tr>
                    <tr> 
                        <td width="55%"></td>
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
        $pdf->Output('laporan_lembur.pdf', 'I');
    //tutup
?>