<?php
	header("Content-type:text/plain");
	$file=fopen("item.txt","r");
	$line=trim(fgets($file));
	fclose($line);
	echo $line;
?>
