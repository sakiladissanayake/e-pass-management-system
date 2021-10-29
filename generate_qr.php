<?php
include 'files/phpqrcode/qrlib.php';

$passNo = $_POST["passNo"];
$fileName = "$passNo.png"; 
$tempDir = "images/qrcodes";                 
$filePath = $tempDir . "/" . $fileName;

QRcode::png($passNo, $filePath, 'H', 17.5, 5);
if(file_exists($filePath)) {
    echo '<img src="./'.$filePath.'" />'; 
}
?>