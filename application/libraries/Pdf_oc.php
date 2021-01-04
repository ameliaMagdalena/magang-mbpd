<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf_oc extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    //Page header
    public function Header() {
        // Logo
        $image_file = base_url().'assets/images/header.jpg';
        $this->Image($image_file, 4, 7, 200, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        //($image_file, margin kiri, margin atas, ukuran gbr, ..., jenis file, ..., ..., ..., resolusi, ..., ..., ..., ..., ..., ..., ...)

        //$this->Image('@' . $image_file, 10, 8, 45, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        // Set font
        //$this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        $image_file = base_url().'assets/images/footer.jpg';
        $this->Image($image_file, 5, $this->SetY(-18), 200, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        /* $html="
        <p>
        <hr style='width:98%;'>
        <br><br><span style='font-size: medium'>PT Maju Bersama Persada Dayamu</span><br><span style='font-size:2pt '>Tlp: 081234567890</span>
        </p>";
        $this->SetFontSize(8);
        $this->SetTextColor(0, 0, 0); //RGB
        //$this->writeHTML($html, false, true, false, 0);
        //$this->WriteHTML($html, true, 0, true, 0);     
        //$this->Cell(0, 27, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->WriteHTML($html, false, true, false, true); */            
    }
}

class Pdf_po extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function Header() {
        $html='
            <br><br><br>
            <table width="100%">
                <tr>
                    <td width="10%">
                        <img src="' . base_url(). 'assets/images/logombp.png" alt="mbp_logo" width="45px">
                    </td>
                    <td width="40%"><b>  PT. MAJU BERSAMA PERSADA DAYAMU</b><br>
                        Taman Palem Lestari Blok A11 No. 26 <br>
                        Cengkareng, Jakarta Barat<br>
                        Telp/Fax : (021) 5986198, Finance@mbpindo.com
                    </td>
                </tr>
            </table>';
        $this->SetFont('Tahoma','', 8);
        $this->SetTextColor(0, 0, 0);
        $this->setCellHeightRatio(1.3);
        $this->WriteHTML($html, false, true, false, true);
    }
}
?>