<?php
	session_start();
	ob_start();
	
	header("Content-type: text/event-stream");

	if($_SESSION["modtime2"])
	{
		$oldtime2=$_SESSION["modtime2"];
	}
	else
	{
		$oldtime2=filemtime("user2.txt");
	}
	while(true)
	{
		clearstatcache();
		$newtime2=filemtime("user2.txt");
	
		if($newtime2!=$oldtime2)
		{
			$msgarr=file("user2.txt");
			$lastmsg=array_pop($msgarr);

			echo "event:messagerecvd\n";
			echo "retry:100\n";
			echo "data: $latestmsg\n\n";
			ob_flush();
			flush();

			$oldtime2 = $newtime2;
			$_SESSION["modtime2"] = $newtime2;
		}
		sleep(1);
	}
?>
