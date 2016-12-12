<?php
$f = fopen("availability.txt", "r+");
$data = fread($f, filesize("availability.txt"));

/*if (count($_GET) == 0) {
	echo $data;
} else {
	*/
	
	$watch = $_GET["watch"];
	$racquet = $_GET["racquet"];
	
	$arr = split(":", $data);
	
	if($watch == "0")
		$arr[0] = $arr[0] - 1;
	
	else if($watch == "1")
		$arr[1] = $arr[1] - 1;
	
	if($racquet == "0")
		$arr[1] = $arr[1] - 1;
	
	else if($racquet == "1")
		$arr[2] = $arr[2] - 1;
	
	$data = join(":", $arr);
	echo $data;
	
	fseek($f, 0);
	fwrite($f, $data);

fclose($f);
?>