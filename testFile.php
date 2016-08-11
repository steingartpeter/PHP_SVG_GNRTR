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
<svg height="250" width="640">
<g id="dgrmCim" height="128" width="320">
  <defs id="defs4">
    <filter height="1" y="0" width="1" x="0"
       id="fltShdw16081101" style="color-interpolation-filters:sRGB">
      <feGaussianBlur id="feGaussianBlur4150" stdDeviation="3" />
    </filter>
  </defs>
  <g transform="translate(0,0)" id="layer1">
    <rect id="ttl-shdwRect" x="15" y="20" ry="0" width="300" height="105" 
	style="fill:#00020b;filter:url(#fltShdw16081101)" />
    <rect ry="6" x="6" y="10" height="105" width="302" id="ttlRect"
       style="fill:#9ca3c6;stroke:#463781;stroke-width:3;" />
	</g>
	<g id="txts">
		<text class="txt-dgrm-MNttl" x="10" y="30" style="fill:#0505DD;font-family:sans-serif;font-weight:bold;font-size:14px;"
		>33 karakternyi hely a FŐCIM-nek  $</text>
		<text class="txt-dgrm-sbTTl" x="10" y="50" style="fill:#252525;font-family:Tahoma;font-size:12px;"
		>44 karakternyi hely a FŐCIM-nekMMMMMMMMMMMM]</text>
		<text class="txt-dgrm-bscTxt" x="10" y="65" style="fill:#FEFEFE;font-family:Times New Roman;font-size:10px;">
		44 karakternyi hely a FŐCIM-nekMMMMMMMMMMMM]</text>
		<text class="txt-dgrm-bscTxt" x="10" y="77" style="fill:#FEFEFE;font-family:Times New Roman;font-size:10px;">
		44 karakternyi hely a FŐCIM-nekMMMMMMMMMMMM]</text>
		<text class="txt-dgrm-bscTxt" x="10" y="89" style="fill:#FEFEFE;font-family:Times New Roman;font-size:10px;">
		44 karakternyi hely a FŐCIM-nekMMMMMMMMMMMM]</text>
	</g>
</g>
</svg>
</body>