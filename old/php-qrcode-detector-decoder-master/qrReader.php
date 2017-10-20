<?php 
	require 'lib/QrReader.php';
	$files = scandir('tests/qrcodes');
	foreach($files as $file){

		if($file == '.'|| $file =='..'){
			continue;
		
	}else{
		$qrcode = new QrReader('tests/qrcodes/'.$file);
		$text = $qrcode->text();
		echo $text.'<br>';
	}
} 
	

?>