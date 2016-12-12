<?php
	$file = fopen("counts.txt", "r");
	if($file) {
		$invalid = false;
		$line = fgets($file);
		$arr = explode(";", $line);
		if($_GET["college"] == "PESIT") {
			if($_GET["dept"] == "ComputerScience") {
				if((int)$arr[0] - 1 < 0)
					$invalid = true;
				else
					$arr[0] = (string)((int)$arr[0] - 1);
			}
			else {
				if((int)$arr[1] - 1 < 0)
					$invalid = true;
				else
					$arr[1] = (string)((int)$arr[1] - 1);
			}
		}
		else {
			if($_GET["dept"] == "ComputerScience") {
				if((int)$arr[2] - 1 < 0)
					$invalid = true;
				else
					$arr[2] = (string)((int)$arr[2] - 1);
			}
			else {
				if((int)$arr[3] - 1 < 0)
					$invalid = true;
				else
					$arr[3] = (string)((int)$arr[3] - 1);
			}
		}
		if($invalid)
			echo "invalid";
		else {
			fclose($file);
			$file1 = fopen("counts.txt", "w+");
			fwrite($file1, $arr[0] . ";" . $arr[1] . ";" . $arr[2] . ";" . $arr[3]);
			fclose($file1);
		}
	}
?>