<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/PHP_SVG_GNRTR/CLASSES/FILE_GENERATOR.php';
	$wInGridUnit = 10;
	$hInGridUnit = 9;
	$gnr = new PAGE_GNRTR($wInGridUnit,$hInGridUnit);
	
	//<DEBUG>
	//Nézzük mit tartalmaz a rootSVG:
	//echo $gnr->getRootSVG()->getCODE();
	//</DEBUG>
	
	echo $gnr->genLottoSzelveny();
?>