	<?php
		require_once('src/QrCode.php');
	


		$id = 1;
		$name = "name";
		$uqoute = "hello world";

if (isset($_GET['text'])) {
	# code...

}
		$qr = new QrCode();
		$qr -> setText('QR CODE!!"+$id+" : "+$name+" "+$uqoute');
		$qr	-> setSize(200);
		$qr -> setPadding(10);
		$qr	-> render();
	?>