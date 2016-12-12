<?php
	extract($_POST);
	if($user1)
	{
		$file = fopen("user1.txt","a");
		fwrite($file,$user1);
		fclose($file);
	}
	else
	{
		$file = fopen("user2.txt","a");
		fwrite($file,$user2);
		fclose($file);		
	}
?> 
	
