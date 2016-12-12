<?php
	header("Content-type:text/xml");
	extract($_GET);
	$qstring=implode("+",explode(" ",$q));
	$url="http://www.bing.com/search?q=".$qstring."&format=rss";
	echo file_get_contents($url);
?>
