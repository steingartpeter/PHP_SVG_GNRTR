<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/PHP_SVG_GNRTR/CLASSES/FILE_GENERATOR.php';
	$wInGridUnit = 25;
	$hInGridUnit = 25;
	$gnr = new PAGE_GNRTR($wInGridUnit,$hInGridUnit);
	
	//echo $gnr->GENRT_BASIC_SITE_BACKGROUND($wInGridUnit,$hInGridUnit);
	echo $gnr->createTestSite();
	
?>