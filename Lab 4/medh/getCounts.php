<?php
	$file = fopen("counts.txt", "r");
	if($file) {
		$invalid = false;
		$line = fgets($file);
		echo $line;
	}
?>