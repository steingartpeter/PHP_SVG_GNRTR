<!DOCTYPE html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
	$str = "<path M=\"800 5 L5 115 Z\"></path>";
	echo "<p><pre>";
	echo htmlentities($str);
	echo "</pre></p>";
	echo "<p>Ebben a &lt;/ pozíciója: " . (strrpos($str, "</", -1)) . ".</p>";
	$poz = strrpos($str, "</", -1);
	$str1 = substr($str, 0, $poz);
	$str2 = substr($str,$poz, strlen($str)-$poz);
	echo "<p>";
	echo "\$str1: " . htmlentities($str1) . "</br>";
	echo "\$str2: " . htmlentities($str2) . "</br>";
	echo "</p>";
?>
</body>