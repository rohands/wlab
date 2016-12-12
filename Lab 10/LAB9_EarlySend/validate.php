<?php

	$takennames = array("Peter", "bhaskar", "Gayatri", "krishna");
	
	if(isset($_GET["usr"]) && $_GET["usr"] != "")
	{
		$usr = $_GET["usr"];
		if(in_array($usr, $takennames))
		{
			echo "Invalid";
		}
		else
			echo "Valid";
	}
?>