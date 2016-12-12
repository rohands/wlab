<!DOCTYPE html>
<html>
<head>
<title>AJAX RESPONSE</title>
<script type="text/javascript">
<?php
	extract($_GET);
	$file = fopen("details.txt","r");
	
	while($line = fgets($file))
	{
		$modline = trim($line);	
		$arr = explode(";",$modline);
		$found = false;
		if($usn == $arr[0])
		{
			$found = true;
			break;
		}
	}
	
	if($found == true)
	{
	
		echo "parent.setValues('$modline');";
	}
	
	else
	{
		echo " parent.setValues('INVALID USN')";
	}
?>
</script>
</head>
<body>
</body>
</html>