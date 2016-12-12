<?php
	extract($_GET);
	
	$players = array();
	$file = fopen("Players.txt", "r");
	
	while($line = fgets($file))
	{
		$player = trim($line);
		if(strncasecmp($player, $pl, strlen($pl)) == 0)
		{
			$players[] = $player;
		}
	}

	$retobj = json_encode($players);
	echo $retobj;
	
?>