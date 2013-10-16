<?php
  include('php-barcode.php');
  require('fpdf.php');
  
  // -------------------------------------------------- //
  //                      USEFUL
  // -------------------------------------------------- //
  
  class eFPDF extends FPDF{
    function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
    {
        $font_angle+=90+$txt_angle;
        $txt_angle*=M_PI/180;
        $font_angle*=M_PI/180;
    
        $txt_dx=cos($txt_angle);
        $txt_dy=sin($txt_angle);
        $font_dx=cos($font_angle);
        $font_dy=sin($font_angle);
    
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        if ($this->ColorFlag)
            $s='q '.$this->TextColor.' '.$s.' Q';
        $this->_out($s);
    }
  }

  // -------------------------------------------------- //
  //                  PROPERTIES
  // -------------------------------------------------- //
  
  $fontSize = 15;
  $marge    = -10;   // between barcode and hri in pixel
  $x        = 65;  // barcode center
  $y        = 13;  // barcode center
  $height   = 17;   // barcode height in 1D ; module size in 2D
  $width    = 0.5;    // barcode height in 1D ; not use in 2D
  $angle    = 0;   // rotation in degrees
  $code     = $_POST['code'];
  $type     = 'code128';
  $black    = '000000'; // color in hexa
  
  // -------------------------------------------------- //
  //            ALLOCATE FPDF RESSOURCE
  // -------------------------------------------------- //
    
//$pdf = new eFPDF('P', 'pt');
  $pdf = new eFPDF('P','mm',array(101.60,33));
  $pdf->AddPage();

  // -------------------------------------------------- //
  //                      Rectangulo
  // -------------------------------------------------- //

  $pdf->Rect(1, 1, 100, 30, 'D');

  // -------------------------------------------------- //
  //                      BARCODE
  // -------------------------------------------------- //
  
  $data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
  
  // -------------------------------------------------- //
  //                      HRI
  // -------------------------------------------------- //
  
  $pdf->SetFont('Courier','B',$fontSize);
  $pdf->SetTextColor(0, 0, 0);
  $len = $pdf->GetStringWidth($data['hri']);
  Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt);
  $pdf->TextWithRotation($x + $xt, $y + $yt, $data['hri'], $angle);

  // -------------------------------------------------- //
  //                      LOGO
  // -------------------------------------------------- //
  
  $pdf->Image('images/logo_pdvsa.png',10,5,17,21);
  
  
  $pdf->Output();
?>
