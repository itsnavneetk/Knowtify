
<?php
include "qrcode1.php";
require_once 'src/QrCode.php';
use Endroid\QrCode\QrCode;

$qr1 = new QrCode();
$qr1 -> setText('http://localhost:8888/angel/list.php');
$qr1 -> setText($ID);
$qr1 -> setText($name);
$qr1 -> setText($lat);
$qr1 -> setText($lng);
$qr1->setSize(100);
$qr1 ->setPadding(10);
$qr1->render();

?>