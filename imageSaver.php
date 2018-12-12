<?php

for ($i=1; $i<48; $i++) {

	$nr = "0000" . $i;
	$nr = substr($nr, -4);
	
	file_put_contents("Maria_imgs/img_" . $nr . ".png", file_get_contents("https://www.ft.dk/pimage/TingDok_Archive/2013_08/1273686/1273686_" . $nr . ".png"));

}

?>