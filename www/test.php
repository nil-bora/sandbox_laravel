<?php
	
	$str = "sample data кирилица";
$bzstr = bzcompress($str, 9);
echo $bzstr."<br>".mb_strlen($bzstr)."<br>";
$bzstr = bzdecompress($bzstr);
echo $bzstr."<br>".mb_strlen($bzstr)."<br>";
?>