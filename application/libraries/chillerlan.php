<?php 

public  function gerador( $link = null){
        

    namespace \chillerlan\QRCodeExamples;
    use chillerlan\QRCode\QRCode;
    use chillerlan\QRCode\QROptions;

    $data = 'https://www.youtube.com/watch?v=DLzxrzFCyOs&t=43s';


    $data = 'https://www.youtube.com/watch?v=DLzxrzFCyOs&t=43s';

    $options = new QROptions([
        'version'      => 5,
        'outputType'   => QRCode::OUTPUT_STRING_TEXT,
        'eccLevel'     => QRCode::ECC_L,
    ]);
    
    // <pre> to view it in a browser
    echo '<pre style="font-size: 75%; line-height: 1;">'.(new QRCode($options))->render($data).'</pre>';
    
    
}
?>