<?php
$QR_BASEDIR = dirname(__FILE__).DIRECTORY_SEPARATOR;
include $QR_BASEDIR."/phpqrcode/qrlib.php";



function getQrcode($md5_email) {
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'phpqrcode/temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'assets/uploads/qrcode';

    $filename = $PNG_TEMP_DIR.md5($md5_email.'|L|4') . '.png';
    QRcode::png($md5_email, $filename, 'L', 4, 2);    

    //display generated file
    //echo '<img src="helpers/phpqrcode/temp/'.basename($filename).'" /><hr/>';  
    return 'helpers/phpqrcode/temp/'.basename($filename);
}
// 3d08dd59c09ff49bef6c2d70c418cba7