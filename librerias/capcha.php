<?php 
	$n = $_GET['key'];
	header('Content-Type: image/gif');
	$grafico = imagecreate(60, 20);
	$fondo = imagecolorallocate($grafico, 48, 87, 150);
	$color = imagecolorallocate($grafico, 255, 255, 255);
	$margen = 5;
	for($x = 0; $x < strlen($n); $x++) {
		$c = substr($n,$x,1);
		if(($x % 2)==0) { $rend = 10; } else { $rend = -10; }
		imagettftext($grafico, 14, $rend, $margen, 16, $color, 'arial.ttf', $c);
		$margen += 14;
	}
	imagegif($grafico);
	imagedestroy($grafico);
?>