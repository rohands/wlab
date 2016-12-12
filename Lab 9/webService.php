<?php
	$method = $_SERVER['REQUEST_METHOD']; //to find out what method was used by the client.
	$filename = "newFile.txt";	
	switch ($method) {
		case 'GET': extract($_GET);
					$filename = isset($fname)?$fname:$filename;
					if(!file_exists($filename))
					{
						echo "File does not exist. Please create it first";
					}
					else 
					{
						$f = fopen($filename, "r");
						$out = "";
						while($str = fgets($f))
							$out = $out . $str . '\n'; 						
						echo $out;
					}
			break;
			
		case 'POST':extract($_POST);
					
					$filename = isset($fname)?$fname:$filename;
					if(!isset($txt))
					{
						$txt = "";
					}
					
					$f = (file_exists($filename)) ? fopen($filename, "a+") : fopen($filename, "w+");
					fwrite($f, $txt);
					fclose($f);
						
					echo "File created. Name is : $filename. Contents are:\n";
					
					$file = fopen($filename, "r");
					$out = "";
					while($str = fgets($file))
						$out = $out . $str . "\n" ;
					echo $out;
			break;
			
		case 'PUT':  $str = file_get_contents('php://input');
					
					$arr = explode(";",$str);
					$filename = $arr[0];
					$f = (file_exists($filename)) ? fopen($filename, "a+") : fopen($filename, "w+");
					fwrite($f, $arr[1]);
					fclose($f);
					
					echo "File updated - $filename. Contents are:\n";
					
					$file = fopen($filename, "r");
					$out = "";
					while($str = fgets($file))
						$out = $out . $str . "\n" ;
					echo $out;
			break;
		case 'DELETE':
					$filename = file_get_contents('php://input');
					if(file_exists($filename))
					{
						unlink($filename);
						echo "File deleted!..$filename";
						break;
					}
					else
					{
						echo "File does not exist";
					}
			break;	
		default:
			
			break;
	}
?>