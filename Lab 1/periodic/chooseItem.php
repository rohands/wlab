<?php
	header("Content-type:text/html");
	extract($_POST);
	$file=fopen("item.txt","r");
	$line = trim(fgets($file));
	fclose($file);

	$index = $opts;
	$items=explode(";",$line);
	$item_bought=0;
	if($items[$index] > 0)
	{
		$item_bought = 1;
		$items[$index] -= 1;
	}
	$line = implode(";", $items);

	$file = fopen("item.txt", "w");
	fputs($file, $line);
	fclose($file);
	echo "<script>parent.selectionResult(" . $item_bought . ");</script>";
?>
