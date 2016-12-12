<?php
$f = fopen("availability.txt", "r+");
$data = fread($f, filesize("availability.txt"));

/*if (count($_GET) == 0) {
	echo $data;
} else {
	*/
	
	$college = $_GET["clg"];
	$department = $_GET["dept"];
	
	$arr = split(":", $data);
	
	if($college == "0")
		$arr[0] = $arr[0] - 1;
	
	else if($college == "1")
		$arr[1] = $arr[1] - 1;
	
	if($department == "0")
		$arr[1] = $arr[1] - 1;
	
	else if($department == "1")
		$arr[2] = $arr[2] - 1;
	
	$data = join(":", $arr);
	echo $data;
	
	fseek($f, 0);
	fwrite($f, $data);

fclose($f);
?>