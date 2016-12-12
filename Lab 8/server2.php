<?php
	session_start();
	ob_start();
	
	header("Content-type: text/event-stream");

	if($_SESSION["modtime1"])
	{
		$oldtime1=$_SESSION["modtime1"];
	}
	else
	{
		$oldtime1=filemtime("user1.txt");
	}
	while(true)
	{
		clearstatcache();
		$newtime1=filemtime("user1.txt");
	
		if($newtime1!=$oldtime1)
		{
			$msgarr=file("user1.txt");
			$lastmsg=array_pop($msgarr);

			echo "event:messagerecvd\n";
			echo "retry:100\n";
			echo "data: $latestmsg\n\n";
			ob_flush();
			flush();

			$oldtime1 = $newtime1;
			$_SESSION["modtime1"] = $newtime1;
		}
		sleep(1);
	}
?>
