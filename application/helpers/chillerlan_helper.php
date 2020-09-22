<?php 
 use chillerlan\QRCode\QRCode;
 use chillerlan\QRCode\QROptions;

 function gerador( $link = null){

    $data = $link;
  
    // echo (new QRCode($options))->render($data);
    return '<img src="'.(new QRCode)->render($data).'" alt="QR Code"  width="300" heigth="300"/>';

    
    
}
?>