<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/PHP_SVG_GNRTR/CLASSES/FILE_GENERATOR.php';
	$gnr = new PAGE_GNRTR();
	echo $gnr->GENRT_BASIC_SITE_BACKGROUND();
	
?>