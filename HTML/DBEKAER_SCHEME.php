<?php
	$file = $_SERVER["DOCUMENT_ROOT"] . "/PHP_SVG_GNRTR/aux_files/db01JSON.json";
	$dbJSON = file_get_contents($file);
	if($dbJSON == FALSE){
		echo "<p>NEM SIKERÜLT A BEOLVASÁS...</p>";
	}else{
		$dataArr = json_decode($dbJSON,true);
		echo "<p><pre>";
		print_r($dataArr);
		echo "</pre></p>";
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>SVG Tables</title>
	<style>
		#svg-canvas{
			/*background-color:#E8E8D8;
			background: linear-gradient(to bottom, #f0b7a1 0%,#8c3310 28%,#752201 73%,#bf6e4e 100%);
			background: linear-gradient(to bottom, #4c4c4c 0%,#595959 12%,#666666 25%,#474747 
				39%,#2c2c2c 46%,#000000 54%,#111111 60%,#2b2b2b 76%,#1c1c1c 91%,#131313 100%); */
			background: linear-gradient(to bottom, #b5bdc8 0%,#949aa8 21%,#828c95 62%,#28343b 100%); 
			border:2px solid #C7C7B7;
		}
		.table-grid{
			background-color:#EFEFEF;
		}
		.tblHeader{
			font-family:"Courier new";
			fill:#020202;
			stroke:none;
			font-size:22px;
			font-weight:bold;
			text-anchor:middle;
		}
		.fldName{
			font-family:"Courier new";
		}
		.stdHdr1{
			fill:#FFFFFF;
			stroke:none;
			font-family:"Courier New";
			font-weight:bold;
		}
		.fldOUT{
			font-weight:bold;
			fill:#252599;
			text-decoration:underline;
		}
		.fldDEFVal{
			font-weight:bold;
			fill:#875511;
			font-style: italic;			
		}
		.fldNone{
			fill:#ADADAD;
		}
		path.stdTableLink{
			fill:none;
			stroke:#00AADD;
			stroke-width:3;
			opacity:.65;
			/*stroke-dasharray:7,3;*/
		}
		path.stdTableLink:hover{
			fill:none;
			
			stroke:#0055FF;
			stroke-width:4;
			opacity:1;
		}
		div#tooltipDiv{
			position:absolute;
			font-family:"Tahoma";
			font-size:18px;
			box-shadow:4px 4px 6px #050505;
			border-radius:5px;
		}
		div#tooltipDiv:hover{
			opacity:1 !important;
			color:#050505 !important;
			background-color: #BBFFFF !important;
			box-shadow:12px 12px 16px #050505;
		}
	</style>
</head>
<body>
<svg id="svg-canvas" width="100%" height="1500px">
	<defs>
		<marker id="arrowhead" markerWidth="50" markerHeight="50" refX="0" refY="2" orient="auto">
      <!-- <polygon points="0 0, 10 3.5, 0 7" /> -->
			<polygon points="0 0, 7 2, 0 4" fill="#0099CC" stroke-width="0"/>
    </marker>
		<marker id="point10" markerWidth="50" markerHeight="50" refX="2" refY="3" orient="auto">
      <!-- <polygon points="0 0, 10 3.5, 0 7" /> -->
			<circle cx="3" cy="3" r="3" fill="#0099CC" stroke-width="0"/>
    </marker>
	</defs>
	
	<!--
		******************************************************************************************
		******************************	tblekrnumbers TÁBLA  *************************************
		******************************************************************************************
	-->
	
		<g id="tbl-tblekrnumbers" transform="translate(0,310)">
		<rect x="10" y="10" height="415" width="400" fill="#EFEFEF"></rect>
		
		<g id="texts">
			<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
			<text class="tblHeader" x="200" y="35">tblekrnumbers</text>
			<!-- Ez a rect nem más mint a fejléckattintás eseményelfogó objektuma, ez érzékeli a kattintást, 
			és a rajta oinclick eseménykezelőben definiált javascript kódot hívja. -->
			<rect x="10" y="10" height="40" width="400" fill="#FF0000" opacity=".0" onclick="tblekrnrDesc()"></rect>
			
			<!-- HEADER background RECTS -->
			<rect class="hdrBGround" x="10" y="50" height="25" width="100" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="13" y="53" height="19" width="93" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="110" y="50" height="25" width="140" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="113" y="53" height="19" width="133" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="250" y="50" height="25" width="160" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="253" y="53" height="19" width="153" fill="none" stroke="#000000" stroke-width="1"/>
			
			<!-- SPECIAL background RECTS -->
			<rect class="lnkBgrnd" x="250" y="75" height="25" width="160" fill="#FFCCCC"/>
			<!--  <rect class="lnkBgrnd" x="250" y="150" height="25" width="160" fill="#B4DCB4"/> -->
			
			<!-- HEADER TEXTS -->
			<text class="stdHdr1" x="20" y="68">Fld.name</text><text class="stdHdr1" x="120" y="68">D.type</text><text class="stdHdr1" x="260" y="68">Role</text>
			<!-- CELL TEXTS -->
			<text class="stdDesc" x="20" y="95">ekrnumber</text><text class="fldName" x="120" y="95">char(15)</text><text class="fldOUT" x="260" y="95">PK-FK</text>
			<text class="stdDesc" x="20" y="120">feladDat</text><text class="fldName" x="120" y="120">date</text><text class="fldNone" x="260" y="120">NULL</text>
			<text class="stdDesc" x="20" y="145">felrakDate</text><text class="fldName" x="120" y="145">date</text><text class="fldNone" x="260" y="145">NULL</text>
			<text class="stdDesc" x="20" y="170">lerakDate</text><text class="fldName" x="120" y="170">date</text><text class="fldNone" x="260" y="170">NULL</text>
			<text class="stdDesc" x="20" y="195">feladUser</text><text class="fldName" x="120" y="195">varchar(50)</text><text class="fldNone" x="260" y="195">NULL</text>
			<text class="stdDesc" x="20" y="220">frsz1</text><text class="fldName" x="120" y="220">varchar(10)</text><text class="fldNone" x="260" y="220">NULL</text>
			<text class="stdDesc" x="20" y="245">frsz2</text><text class="fldName" x="120" y="245">varchar(10)</text><text class="fldNone" x="260" y="245">NULL</text>
			<text class="stdDesc" x="20" y="270">lstModDate</text><text class="fldName" x="120" y="270">date</text><text class="fldNone" x="260" y="270">NULL</text>
			<text class="stdDesc" x="20" y="295">felrakHely</text><text class="fldName" x="120" y="295">varchar(50)</text><text class="fldNone" x="260" y="295">NULL</text>
			<text class="stdDesc" x="20" y="320">lerakHely</text><text class="fldName" x="120" y="320">varchar(50)</text><text class="fldNone" x="260" y="320">NULL</text>
			<text class="stdDesc" x="20" y="345">totsuly</text><text class="fldName" x="120" y="345">int(11)</text><text class="fldNone" x="260" y="345">NULL</text>
			<text class="stdDesc" x="20" y="370">totErtek</text><text class="fldName" x="120" y="370">int(11)</text><text class="fldNone" x="260" y="370">NULL</text>
			<text class="stdDesc" x="20" y="395">szallCeg</text><text class="fldName" x="120" y="395">varchar(50)</text><text class="fldNone" x="260" y="395">NULL</text>
			<text class="stdDesc" x="20" y="420">delplnid</text><text class="fldName" x="120" y="420">varchar(15)</text><text class="fldNone" x="260" y="420">NULL</text>
		</g>
		<g class="table-grid" transform="translate(10,10)">
			
			<line x1="0" x2="400" y1="0" y2="0" stroke="#000000" stroke-width="3" />
			<line x1="0" x2="400" y1="40" y2="40" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="65" y2="65" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="90" y2="90" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="115" y2="115" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="140" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="165" y2="165" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="190" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="215" y2="215" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="240" y2="240" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="265" y2="265" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="290" y2="290" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="315" y2="315" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="340" y2="340" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="365" y2="365" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="390" y2="390" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="415" y2="415" stroke="#000000" stroke-width="3" />

			
			<line x1="0" x2="0" y1="0" y2="415" stroke="#000000" stroke-width="3" />
			<line x1="100" x2="100" y1="40" y2="415" stroke="#000000" stroke-width="1" />
			<line x1="240" x2="240" y1="40" y2="415" stroke="#000000" stroke-width="1" />
			<!-- <line x1="30" x2="30" y1="0" y2="400" stroke="#000000" stroke-width="1" /> -->
			<line x1="400" x2="400" y1="0" y2="415" stroke="#000000" stroke-width="3" />
		</g>
	</g>
	
	<!--
		******************************************************************************************
		******************************	tblinbinvoices TÁBLA  ************************************
		******************************************************************************************
	-->
	<g id="tbl-tblinbinvoices" transform="translate(500,20)">
		<rect x="10" y="10" height="190" width="400" fill="#EFEFEF"></rect>
		<g id="texts">
			<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
			<text class="tblHeader" x="200" y="35">tblinbinvoices</text>
			<!-- Ez a rect nem más mint a fejléckattintás eseményelfogó objektuma, ez érzékeli a kattintást, 
			és a rajta oinclick eseménykezelőben definiált javascript kódot hívja. -->
			<rect x="10" y="10" height="40" width="400" fill="#FF0000" opacity=".0" onclick="tblinbinvDesc()"></rect>
			
			<!-- HEADER background RECTS -->
			<rect class="hdrBGround" x="10" y="50" height="25" width="100" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="13" y="53" height="19" width="93" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="110" y="50" height="25" width="140" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="113" y="53" height="19" width="133" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="250" y="50" height="25" width="160" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="253" y="53" height="19" width="153" fill="none" stroke="#000000" stroke-width="1"/>
			
			<!-- SPECIAL background RECTS -->
			<rect class="lnkBgrnd" x="250" y="75" height="25" width="160" fill="#FFCCCC"/>
			<!--  <rect class="lnkBgrnd" x="250" y="150" height="25" width="160" fill="#B4DCB4"/> -->
			
			<!-- HEADER TEXTS -->
			<text class="stdHdr1" x="20" y="68">Fld.name</text><text class="stdHdr1" x="120" y="68">D.type</text><text class="stdHdr1" x="260" y="68">Role</text>
			<!-- CELL TEXTS -->
			<text class="stdDesc" x="20" y="95">invcid</text><text class="fldName" x="120" y="95">varchar(15)</text><text class="fldOut" x="260" y="95">PK</text>
			<text class="stdDesc" x="20" y="120">invdat</text><text class="fldName" x="120" y="120">date</text><text class="fldNone" x="260" y="120">NOT NULL</text>
			<text class="stdDesc" x="20" y="145">pltnr</text><text class="fldName" x="120" y="145">varchar(12)</text><text class="fldNone" x="260" y="145">NOT NULL</text>
			<text class="stdDesc" x="20" y="170">brtwght</text><text class="fldName" x="120" y="170">float</text><text class="fldNone" x="260" y="170">NOT NULL</text>
			<text class="stdDesc" x="20" y="195">felado</text><text class="fldName" x="120" y="195">varchar(15)</text><text class="fldNone" x="260" y="195">NOT NULL</text>						
		</g>
		<g class="table-grid" transform="translate(10,10)">
			
			<line x1="0" x2="400" y1="0" y2="0" stroke="#000000" stroke-width="3" />
			<line x1="0" x2="400" y1="40" y2="40" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="65" y2="65" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="90" y2="90" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="115" y2="115" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="140" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="165" y2="165" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="190" y2="190" stroke="#000000" stroke-width="3" />
			
			
			<line x1="0" x2="0" y1="0" y2="190" stroke="#000000" stroke-width="3" />
			<line x1="100" x2="100" y1="40" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="240" x2="240" y1="40" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="400" x2="400" y1="0" y2="190" stroke="#000000" stroke-width="3" />
		</g>
	</g>


	<!--
		******************************************************************************************
		******************************	tblinblines TÁBLA  *************************************
		******************************************************************************************
	-->
	<g id="tbl-tblinblines" transform="translate(500,240)">
		<rect x="10" y="10" height="465" width="400" fill="#EFEFEF"></rect>
		<g id="texts">
			<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
			<text class="tblHeader" x="200" y="35">tblinblines</text>
			<!-- Ez a rect nem más mint a fejléckattintás eseményelfogó objektuma, ez érzékeli a kattintást, 
			és a rajta oinclick eseménykezelőben definiált javascript kódot hívja. -->
			<rect x="10" y="10" height="40" width="400" fill="#FF0000" opacity=".0" onclick="tblinblnsDesc()"></rect>
			
			<!-- HEADER background RECTS -->
			<rect class="hdrBGround" x="10" y="50" height="25" width="190" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="13" y="53" height="19" width="169" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="193" y="50" height="25" width="120" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="188" y="53" height="19" width="114" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="309" y="50" height="25" width="100" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="309" y="53" height="19" width="98" fill="none" stroke="#000000" stroke-width="1"/>

			<!-- SPECIAL background RECTS -->
			<rect class="lnkBgrnd" x="305" y="75" height="25" width="105" fill="#FFCCCC"/>
			<!--  <rect class="lnkBgrnd" x="250" y="150" height="25" width="160" fill="#B4DCB4"/> -->
			
			<!-- HEADER TEXTS -->
			<text class="stdHdr1" x="20" y="68">Fld.name</text><text class="stdHdr1" x="200" y="68">D.type</text><text class="stdHdr1" x="315" y="68">Role</text>
			<!-- CELL TEXTS -->
			<text class="stdDesc" x="20" y="95">lnid</text><text class="fldName" x="190" y="95">mediumint(9)</text><text class="fldOut" x="360" y="95">PK</text>
			<text class="stdDesc" x="20" y="120">FLDO</text><text class="fldName" x="190" y="120">varchar(15)</text><text class="fldNone" x="340" y="120">NULL</text>
			<text class="stdDesc" x="20" y="145">SHIPMENT_NR</text><text class="fldName" x="190" y="145">varchar(15)</text><text class="fldNone" x="340" y="145">NULL</text>
			<text class="stdDesc" x="20" y="170">PLATE_NR_1</text><text class="fldName" x="190" y="170">varchar(10)</text><text class="fldNone" x="340" y="170">NULL</text>
			<text class="stdDesc" x="20" y="195">COUNTRY_1</text><text class="fldName" x="190" y="195">varchar(2)</text><text class="fldNone" x="340" y="195">NULL</text>
			<text class="stdDesc" x="20" y="220">PLATE_NR_2</text><text class="fldName" x="190" y="220">varchar(10)</text><text class="fldNone" x="340" y="220">NULL</text>
			<text class="stdDesc" x="20" y="245">COUNTRY_2</text><text class="fldName" x="190" y="245">varchar(2)</text><text class="fldNone" x="340" y="245">NULL</text>
			<text class="stdDesc" x="20" y="270">LOAD_DATE_TIME</text><text class="fldName" x="190" y="270">date</text><text class="fldNone" x="340" y="270">NULL</text>
			<text class="stdDesc" x="20" y="295">PART_NO_ORDERED</text><text class="fldName" x="190" y="295">varchar(15)</text><text class="fldNone" x="340" y="295">NULL</text>
			<text class="stdDesc" x="20" y="320">PART_NO_SHIPPED</text><text class="fldName" x="190" y="320">varchar(15)</text><text class="fldNone" x="340" y="320">NULL</text>
			<text class="stdDesc" x="20" y="345">TARIFF_CODE</text><text class="fldName" x="190" y="345">varchar(10)</text><text class="fldNone" x="340" y="345">NULL</text>
			<text class="stdDesc" x="20" y="370">PART_QTY</text><text class="fldName" x="190" y="370">int(11)</text><text class="fldNone" x="340" y="370">NULL</text>
			<text class="stdDesc" x="20" y="395">PART_DESCRIPTION</text><text class="fldName" x="190" y="395">varchar(50)</text><text class="fldNone" x="340" y="395">NULL</text>
			<text class="stdDesc" x="20" y="420">TTL_AMOUNT</text><text class="fldName" x="190" y="420">double</text><text class="fldNone" x="340" y="420">NULL</text>
			<text class="stdDesc" x="20" y="445">TTL_NET_WEIGHT</text><text class="fldName" x="190" y="445">double</text><text class="fldNone" x="340" y="445">NULL</text>
			<text class="stdDesc" x="20" y="470">ADR</text><text class="fldName" x="190" y="470">varchar(10)</text><text class="fldNone" x="340" y="470">NULL</text>
		</g>
		<g class="table-grid" transform="translate(10,10)">
			
			<line x1="0" x2="400" y1="0" y2="0" stroke="#000000" stroke-width="3" />
			<line x1="0" x2="400" y1="40" y2="40" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="65" y2="65" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="90" y2="90" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="115" y2="115" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="140" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="165" y2="165" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="190" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="215" y2="215" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="240" y2="240" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="265" y2="265" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="290" y2="290" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="315" y2="315" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="340" y2="340" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="365" y2="365" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="390" y2="390" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="415" y2="415" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="440" y2="440" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="465" y2="465" stroke="#000000" stroke-width="3" />
			
			
			
			<line x1="0" x2="0" y1="0" y2="465" stroke="#000000" stroke-width="3" />
			<line x1="175" x2="175" y1="40" y2="465" stroke="#000000" stroke-width="1" />
			<line x1="295" x2="295" y1="40" y2="465" stroke="#000000" stroke-width="1" />
			<line x1="400" x2="400" y1="0" y2="465" stroke="#000000" stroke-width="3" />
		</g>
	</g>


	<!--
		******************************************************************************************
		******************************	tbltcnitems TÁBLA  **************************************
		******************************************************************************************
	-->
	<g id="tbl-tbltcnitems" transform="translate(500,740)">
		<rect x="10" y="10" height="440" width="400" fill="#EFEFEF"></rect>
		<g id="texts">
			<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
			<text class="tblHeader" x="200" y="35">tbltcnitems</text>
			<!-- Ez a rect nem más mint a fejléckattintás eseményelfogó objektuma, ez érzékeli a kattintást, 
			és a rajta oinclick eseménykezelőben definiált javascript kódot hívja. -->
			<rect x="10" y="10" height="40" width="400" fill="#FF0000" opacity=".0" onclick="tbltcnitmsDesc()"></rect>
			
			<!-- HEADER background RECTS -->
			<rect class="hdrBGround" x="10" y="50" height="25" width="190" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="13" y="53" height="19" width="169" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="193" y="50" height="25" width="120" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="188" y="53" height="19" width="114" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="309" y="50" height="25" width="100" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="309" y="53" height="19" width="98" fill="none" stroke="#000000" stroke-width="1"/>
			
			<!-- SPECIAL background RECTS -->
			<rect class="lnkBgrnd" x="305" y="75" height="25" width="105" fill="#FFCCCC"/>
			<!--  <rect class="lnkBgrnd" x="250" y="150" height="25" width="160" fill="#B4DCB4"/> -->
			
			<!-- HEADER TEXTS -->
			<text class="stdHdr1" x="20" y="68">Fld.name</text><text class="stdHdr1" x="200" y="68">D.type</text><text class="stdHdr1" x="315" y="68">Role</text>
			<!-- CELL TEXTS -->
			<text class="stdDesc" x="20" y="95">itmID</text><text class="fldName" x="190" y="95">varchar(15)</text><text class="fldOut" x="330" y="95">PK</text>
			<text class="stdDesc" x="20" y="120">ekrnumber</text><text class="fldName" x="190" y="120">char(15)</text><text class="fldNone" x="330" y="120">NULL</text>
			<text class="stdDesc" x="20" y="145">delplnid</text><text class="fldName" x="190" y="145">varchar(15)</text><text class="fldNone" x="330" y="145">NULL</text>
			<text class="stdDesc" x="20" y="170">productVtsz</text><text class="fldName" x="190" y="170">varchar(8)</text><text class="fldNone" x="330" y="170">NULL</text>
			<text class="stdDesc" x="20" y="195">tradeReason</text><text class="fldName" x="190" y="195">char(1)</text><text class="fldNone" x="330" y="195">NULL</text>
			<text class="stdDesc" x="20" y="220">productName</text><text class="fldName" x="190" y="220">varchar(200)</text><text class="fldNone" x="330" y="220">NULL</text>
			<text class="stdDesc" x="20" y="245">weight</text><text class="fldName" x="190" y="245">int(11)</text><text class="fldNone" x="330" y="245">NULL</text>
			<text class="stdDesc" x="20" y="270">tcnvalue</text><text class="fldName" x="190" y="270">int(11)</text><text class="fldNone" x="330" y="270">NULL</text>
			<text class="stdDesc" x="20" y="295">valueModReasonText</text><text class="fldName" x="190" y="295">varchar(50)</text><text class="fldNone" x="330" y="295">NULL</text>
			<text class="stdDesc" x="20" y="320">weightModReasonText</text><text class="fldName" x="190" y="320">varchar(50)</text><text class="fldNone" x="330" y="320">NULL</text>
			<text class="stdDesc" x="20" y="345">insDate</text><text class="fldName" x="190" y="345">date</text><text class="fldNone" x="330" y="345">NULL</text>
			<text class="stdDesc" x="20" y="370">insTime</text><text class="fldName" x="190" y="370">time</text><text class="fldNone" x="330" y="370">NULL</text>
			<text class="stdDesc" x="20" y="395">insUser</text><text class="fldName" x="190" y="395">varchar(25)</text><text class="fldNone" x="330" y="395">NULL</text>
			<text class="stdDesc" x="20" y="420">modDate</text><text class="fldName" x="190" y="420">date</text><text class="fldNone" x="330" y="420">NULL</text>
			<text class="stdDesc" x="20" y="445">modTime</text><text class="fldName" x="190" y="445">time</text><text class="fldNone" x="330" y="445">NULL</text>
		</g>
		<g class="table-grid" transform="translate(10,10)">
			
			<line x1="0" x2="400" y1="0" y2="0" stroke="#000000" stroke-width="3" />
			<line x1="0" x2="400" y1="40" y2="40" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="65" y2="65" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="90" y2="90" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="115" y2="115" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="140" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="165" y2="165" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="190" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="215" y2="215" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="240" y2="240" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="265" y2="265" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="290" y2="290" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="315" y2="315" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="340" y2="340" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="365" y2="365" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="390" y2="390" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="415" y2="415" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="440" y2="440" stroke="#000000" stroke-width="3" />
			
			
			<line x1="0" x2="0" y1="0" y2="440" stroke="#000000" stroke-width="3" />
			<line x1="175" x2="175" y1="40" y2="440" stroke="#000000" stroke-width="1" />
			<line x1="295" x2="295" y1="40" y2="440" stroke="#000000" stroke-width="1" />
			<line x1="400" x2="400" y1="0" y2="440" stroke="#000000" stroke-width="3" />
		</g>
	</g>

	<!--
		******************************************************************************************
		******************************	tblinvcitms TÁBLA  ************************************
		******************************************************************************************
	-->
	<g id="tbl-tblinvcitms" transform="translate(980,20)">
		<rect x="10" y="10" height="190" width="400" fill="#EFEFEF"></rect>
		<g id="texts">
			<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
			<text class="tblHeader" x="200" y="35">tblinvcitms</text>
			<!-- Ez a rect nem más mint a fejléckattintás eseményelfogó objektuma, ez érzékeli a kattintást, 
			és a rajta oinclick eseménykezelőben definiált javascript kódot hívja. -->
			<rect x="10" y="10" height="40" width="400" fill="#FF0000" opacity=".0" onclick="tblinvcitmsDesc()"></rect>
			
			<!-- HEADER background RECTS -->
			<rect class="hdrBGround" x="10" y="50" height="25" width="100" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="13" y="53" height="19" width="93" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="110" y="50" height="25" width="140" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="113" y="53" height="19" width="133" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="250" y="50" height="25" width="160" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="253" y="53" height="19" width="153" fill="none" stroke="#000000" stroke-width="1"/>
			
			<!-- SPECIAL background RECTS -->
			<rect class="lnkBgrnd" x="250" y="75" height="25" width="160" fill="#FFCCCC"/>
			<!--  <rect class="lnkBgrnd" x="250" y="150" height="25" width="160" fill="#B4DCB4"/> -->
			
			<!-- HEADER TEXTS -->
			<text class="stdHdr1" x="20" y="68">Fld.name</text><text class="stdHdr1" x="120" y="68">D.type</text><text class="stdHdr1" x="260" y="68">Role</text>
			<!-- CELL TEXTS -->
			<text class="stdDesc" x="20" y="95">itmid</text><text class="fldName" x="120" y="95">int(11)</text><text class="fldOut" x="260" y="95">PK</text>
			<text class="stdDesc" x="20" y="120">invceid</text><text class="fldName" x="120" y="120">varchar(15)</text><text class="fldNone" x="260" y="120">NOT NULL</text>
			<text class="stdDesc" x="20" y="145">vtsz</text><text class="fldName" x="120" y="145">char(4)</text><text class="fldNone" x="260" y="145">NOT NULL</text>
			<text class="stdDesc" x="20" y="170">ertek</text><text class="fldName" x="120" y="170">double</text><text class="fldNone" x="260" y="170">NOT NULL</text>
			<text class="stdDesc" x="20" y="195">suly</text><text class="fldName" x="120" y="195">double</text><text class="fldNone" x="260" y="195">NOT NULL</text>
		</g>
		<g class="table-grid" transform="translate(10,10)">
			
			<line x1="0" x2="400" y1="0" y2="0" stroke="#000000" stroke-width="3" />
			<line x1="0" x2="400" y1="40" y2="40" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="65" y2="65" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="90" y2="90" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="115" y2="115" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="140" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="165" y2="165" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="190" y2="190" stroke="#000000" stroke-width="3" />
			
			
			<line x1="0" x2="0" y1="0" y2="190" stroke="#000000" stroke-width="3" />
			<line x1="100" x2="100" y1="40" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="240" x2="240" y1="40" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="400" x2="400" y1="0" y2="190" stroke="#000000" stroke-width="3" />
		</g>
	</g>


	<!--
		******************************************************************************************
		******************************	tblgridcodes TÁBLA  **************************************
		******************************************************************************************
	-->
	<g id="tbl-tblinvcitms" transform="translate(980,250)">
		<rect x="10" y="10" height="290" width="400" fill="#EFEFEF"></rect>
		<g id="texts">
			<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
			<text class="tblHeader" x="200" y="35">tblgridcodes</text>
			<!-- Ez a rect nem más mint a fejléckattintás eseményelfogó objektuma, ez érzékeli a kattintást, 
			és a rajta oinclick eseménykezelőben definiált javascript kódot hívja. -->
			<rect x="10" y="10" height="40" width="400" fill="#FF0000" opacity=".0" onclick="tblgrdCdDesc()"></rect>
			
			<!-- HEADER background RECTS -->
			<rect class="hdrBGround" x="10" y="50" height="25" width="100" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="13" y="53" height="19" width="93" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="110" y="50" height="25" width="140" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="113" y="53" height="19" width="133" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="250" y="50" height="25" width="160" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="253" y="53" height="19" width="153" fill="none" stroke="#000000" stroke-width="1"/>
			
			<!-- SPECIAL background RECTS -->
			<rect class="lnkBgrnd" x="250" y="75" height="25" width="160" fill="#FFCCCC"/>
			<!--  <rect class="lnkBgrnd" x="250" y="150" height="25" width="160" fill="#B4DCB4"/> -->
			
			<!-- HEADER TEXTS -->
			<text class="stdHdr1" x="20" y="68">Fld.name</text><text class="stdHdr1" x="120" y="68">D.type</text><text class="stdHdr1" x="260" y="68">Role</text>
			<!-- CELL TEXTS -->
			<text class="stdDesc" x="20" y="95">dlrid</text><text class="fldName" x="120" y="95">char(9)</text><text class="fldOut" x="260" y="95">PK</text>
			<text class="stdDesc" x="20" y="120">urggrid</text><text class="fldName" x="120" y="120">varchar(10)</text><text class="fldNone" x="260" y="120">NULL</text>
			<text class="stdDesc" x="20" y="145">urgroute</text><text class="fldName" x="120" y="145">char(1)</text><text class="fldNone" x="260" y="145">NULL</text>
			<text class="stdDesc" x="20" y="170">urglmxroute</text><text class="fldName" x="120" y="170">varchar(10)</text><text class="fldNone" x="260" y="170">NULL</text>
			<text class="stdDesc" x="20" y="195">stckday</text><text class="fldName" x="120" y="195">varchar(25)</text><text class="fldNone" x="260" y="195">NULL</text>
			<text class="stdDesc" x="20" y="220">stckgrid</text><text class="fldName" x="120" y="220">varchar(10)</text><text class="fldNone" x="260" y="220">NULL</text>
			<text class="stdDesc" x="20" y="245">stckroute</text><text class="fldName" x="120" y="245">char(1)</text><text class="fldNone" x="260" y="245">NULL</text>
			<text class="stdDesc" x="20" y="270">depttime</text><text class="fldName" x="120" y="270">char(5)</text><text class="fldNone" x="260" y="270">NULL</text>
			<text class="stdDesc" x="20" y="295">stcktprtzone</text><text class="fldName" x="120" y="295">varchar(30)</text><text class="fldNone" x="260" y="295">NULL</text>
		</g>
		<g class="table-grid" transform="translate(10,10)">
			<!-- A vízszintes vonalak vonalak.  -->
			<line x1="0" x2="400" y1="0" y2="0" stroke="#000000" stroke-width="3" />
			<line x1="0" x2="400" y1="40" y2="40" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="65" y2="65" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="90" y2="90" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="115" y2="115" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="140" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="165" y2="165" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="190" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="215" y2="215" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="240" y2="240" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="265" y2="265" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="290" y2="290" stroke="#000000" stroke-width="3" />
			<!-- A függőleges vonalak.  -->
			<line x1="0" x2="0" y1="0" y2="290" stroke="#000000" stroke-width="3" />
			<line x1="100" x2="100" y1="40" y2="290" stroke="#000000" stroke-width="1" />
			<line x1="240" x2="240" y1="40" y2="290" stroke="#000000" stroke-width="1" />
			<line x1="400" x2="400" y1="0" y2="290" stroke="#000000" stroke-width="3" />
		</g>
	</g>


	<!--
		******************************************************************************************
		******************************	  tbldealers TÁBLA  **************************************
		******************************************************************************************
	-->
	<g id="tbl-tblinvcitms" transform="translate(980,580)">
		<rect x="10" y="10" height="290" width="400" fill="#EFEFEF"></rect>
		<g id="texts">
			<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
			<text class="tblHeader" x="200" y="35">tbldealers</text>
			<!-- Ez a rect nem más mint a fejléckattintás eseményelfogó objektuma, ez érzékeli a kattintást, 
			és a rajta oinclick eseménykezelőben definiált javascript kódot hívja. -->
			<rect x="10" y="10" height="40" width="400" fill="#FF0000" opacity=".0" onclick="tbldlrsDesc()"></rect>
			
			<!-- HEADER background RECTS -->
			<rect class="hdrBGround" x="10" y="50" height="25" width="100" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="13" y="53" height="19" width="93" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="110" y="50" height="25" width="140" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="113" y="53" height="19" width="133" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="250" y="50" height="25" width="160" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="253" y="53" height="19" width="153" fill="none" stroke="#000000" stroke-width="1"/>
			
			<!-- SPECIAL background RECTS -->
			<rect class="lnkBgrnd" x="250" y="75" height="25" width="160" fill="#FFCCCC"/>
			<!--  <rect class="lnkBgrnd" x="250" y="150" height="25" width="160" fill="#B4DCB4"/> -->
			
			<!-- HEADER TEXTS -->
			<text class="stdHdr1" x="20" y="68">Fld.name</text><text class="stdHdr1" x="120" y="68">D.type</text><text class="stdHdr1" x="260" y="68">Role</text>
			<!-- CELL TEXTS -->
			<text class="stdDesc" x="20" y="95">Customer</text><text class="fldName" x="120" y="95">varchar(25)</text><text class="fldOut" x="260" y="95">PK</text>
			<text class="stdDesc" x="20" y="120">Cty</text><text class="fldName" x="120" y="120">char(2)</text><text class="fldNone" x="260" y="120">NULL</text>
			<text class="stdDesc" x="20" y="145">Name_1</text><text class="fldName" x="120" y="145">varchar(200)</text><text class="fldNone" x="260" y="145">NOT NULL</text>
			<text class="stdDesc" x="20" y="170">City</text><text class="fldName" x="120" y="170">varchar(50)</text><text class="fldNone" x="260" y="170">NOT NULL</text>
			<text class="stdDesc" x="20" y="195">PostalCode</text><text class="fldName" x="120" y="195">varchar(8)</text><text class="fldNone" x="260" y="195">NULL</text>
			<text class="stdDesc" x="20" y="220">Street</text><text class="fldName" x="120" y="220">varchar(200)</text><text class="fldNone" x="260" y="220">NULL</text>
			<text class="stdDesc" x="20" y="245">lang</text><text class="fldName" x="120" y="245">char(2)</text><text class="fldNone" x="260" y="245">NULL</text>
			<text class="stdDesc" x="20" y="270">TranspZone</text><text class="fldName" x="120" y="270">varchar(12)</text><text class="fldNone" x="260" y="270">NULL</text>
			<text class="stdDesc" x="20" y="295">VATRegNo</text><text class="fldName" x="120" y="295">varchar(20)</text><text class="fldNone" x="260" y="295">NULL</text>
			</g>
		<g class="table-grid" transform="translate(10,10)">
			<!-- Vízszintes vonlak. -->
			<line x1="0" x2="400" y1="0" y2="0" stroke="#000000" stroke-width="3" />
			<line x1="0" x2="400" y1="40" y2="40" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="65" y2="65" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="90" y2="90" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="115" y2="115" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="140" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="165" y2="165" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="190" y2="190" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="215" y2="215" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="240" y2="240" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="265" y2="265" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="290" y2="290" stroke="#000000" stroke-width="3" />
			<!-- Függőleges vonlak. -->
			<line x1="0" x2="0" y1="0" y2="290" stroke="#000000" stroke-width="3" />
			<line x1="100" x2="100" y1="40" y2="290" stroke="#000000" stroke-width="1" />
			<line x1="240" x2="240" y1="40" y2="290" stroke="#000000" stroke-width="1" />
			<line x1="400" x2="400" y1="0" y2="290" stroke="#000000" stroke-width="3" />
		</g>
	</g>


	<!--
		******************************************************************************************
		******************************	  tblvtsz TÁBLA     **************************************
		******************************************************************************************
	-->
	<g id="tbl-tblinvcitms" transform="translate(980,910)">
		<rect x="10" y="10" height="140" width="400" fill="#EFEFEF"></rect>
		<g id="texts">
			<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
			<text class="tblHeader" x="200" y="35">tblvtsz</text>
			<!-- Ez a rect nem más mint a fejléckattintás eseményelfogó objektuma, ez érzékeli a kattintást, 
			és a rajta oinclick eseménykezelőben definiált javascript kódot hívja. -->
			<rect x="10" y="10" height="40" width="400" fill="#FF0000" opacity=".0" onclick="tblvtszDesc()"></rect>
			
			<!-- HEADER background RECTS -->
			<rect class="hdrBGround" x="10" y="50" height="25" width="100" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="13" y="53" height="19" width="93" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="110" y="50" height="25" width="140" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="113" y="53" height="19" width="133" fill="none" stroke="#000000" stroke-width="1"/>
			
			<rect class="hdrBGround" x="250" y="50" height="25" width="160" fill="#7C7C7C"/>
			<rect class="hdrFrm" x="253" y="53" height="19" width="153" fill="none" stroke="#000000" stroke-width="1"/>
			
			<!-- SPECIAL background RECTS -->
			<rect class="lnkBgrnd" x="250" y="75" height="25" width="160" fill="#FFCCCC"/>
			<rect class="lnkBgrnd" x="250" y="125" height="25" width="160" fill="#FABE66"/> -->
			
			<!-- HEADER TEXTS -->
			<text class="stdHdr1" x="20" y="68">Fld.name</text><text class="stdHdr1" x="120" y="68">D.type</text><text class="stdHdr1" x="260" y="68">Role</text>
			<!-- CELL TEXTS -->
			<text class="stdDesc" x="20" y="95">vtsz</text><text class="fldName" x="120" y="95">varchar(8)</text><text class="fldOut" x="260" y="95">PK</text>
			<text class="stdDesc" x="20" y="120">leiras</text><text class="fldName" x="120" y="120">varchar(255)</text><text class="fldNone" x="260" y="120">NOT NULL</text>
			<text class="stdDesc" x="20" y="145">biztKot</text><text class="fldName" x="120" y="145">tinyint(4)</text><text class="fldDEFVal" x="260" y="145">DEF(0)</text>
		</g>
		<g class="table-grid" transform="translate(10,10)">
			<!-- Vízszintes vonlak. -->
			<line x1="0" x2="400" y1="0" y2="0" stroke="#000000" stroke-width="3" />
			<line x1="0" x2="400" y1="40" y2="40" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="65" y2="65" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="90" y2="90" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="115" y2="115" stroke="#000000" stroke-width="1" />
			<line x1="0" x2="400" y1="140" y2="140" stroke="#000000" stroke-width="3" />
			<!-- Függőleges vonlak. -->
			<line x1="0" x2="0" y1="0" y2="140" stroke="#000000" stroke-width="3" />
			<line x1="100" x2="100" y1="40" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="240" x2="240" y1="40" y2="140" stroke="#000000" stroke-width="1" />
			<line x1="400" x2="400" y1="0" y2="140" stroke="#000000" stroke-width="3" />
		</g>
	</g>





</svg>
<div id="tooltipDiv" onclick="vanishme()">

</div>
</body>

<script>
	document.onload = function(){
		console.log("READY!");

	}();
	function tblekrnrDesc(event){
	//<SF>
	// 2016. szept. 26.<br>
	// Egy belő mJAVASCRIPT függvény, ami az onclick eseménnyel csatlakozik, és a tábla leírását jeleníti meg tooltip-ként. <br>
	// PARAMÉTEREK:
	//×-
	// @-- nincsenek paraméterek!  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		//<nn>
		// Egy referecia a cél HTML elemre: id=tooltipDiv.
		//</nn>
		var div = document.getElementById("tooltipDiv");
		//<nn>
		// A kattintás ablak-koordinátái,ennek alapján tudjuk majd elhelyezni a DIV-ünket.
		//</nn>
		var x = window.event.clientX;
		//var x = window.event.screenX;
		var y = window.event.clientY;
		//var y = window.event.screenY;
		//console.log("window.event.clientX: " + ev.clientX + ",window.event.screenX: " + ev.screenX);
		//console.log("window.event.clientY: " + ev.clientY + ",window.event.screenY: " + ev.screenY);
		//<nn>
		// Megírjuk a tooltip szövegét, majd betesszük a tooltip innerHTML-jébe.
		//</nn>
		var htmlTxt = "<h4>A tábla leírása</h4>";
		htmlTxt += '<p class="tltpMsg">Ez a tábla az EKAER számok fejlécadatait tartalmazza.<hr>';
		htmlTxt += 'Fontosabb elemei:<ol><li>ekrNumber: FK ide:<code>tbltcnitems</code> tábla, ami az NAV honlapjáról ';
		htmlTxt += 'visszajött tételeket tartalmazza, tételaznosítóval.</li>';
		htmlTxt += '<li>Dátumok: a <code>lerakdat</code> megkövetelt az XMLben való lezáráshoz!</li>';
		htmlTxt += '<code>tbltcnitems</code> tábla, ami az NAV honlapjáról visszajött tételeket tartalmazza, tételaznosítóval.</p>';
		div.innerHTML = htmlTxt; 

		//<nn>
		// Megformázzuk a tartalomnnak megfelelően a tooltipünket.
		//</nn>
		div.style.left= (x - 20) + "px";
		div.style.top= (y + 100) + "px";
		div.style.width="660px";
		div.style.height="280px";
		div.style.backgroundColor="#5F5F5F";
		div.style.color="#FFFFFF";
		div.style.border = "thick solid #009999";
		div.style.opacity=".75";
		div.style.padding="5";
		div.style.display="block";
	}
	
	function tblinbinvDesc(){
	//<SF>
	// 2016. szept. 26.<br>
	// Lásd: tblekrnrDesc,a funkció teljesen megegyezik, akiülönbslg csak a tábla leírása.<br>
	// PARAMÉTEREK:
	//×-
	// @--Nincsenek paraméterek  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		var div = document.getElementById("tooltipDiv");
		var x = event.clientX+document.body.scrollLeft;
		var y = event.clientY+document.body.scrollTop;
		var htmlTxt = "<h4>A <code>tblinbinvoices</code> tábla leírása:</h4>";
		htmlTxt += '<p class="tltpMsg"> ... ';
		htmlTxt += '</p>';
		div.innerHTML = htmlTxt;
		div.style.left= (x + 20) + "px";
		div.style.top= (y + 50) + "px";
		div.style.width="660px";
		div.style.height="280px";
		div.style.backgroundColor="#5F5F5F";
		div.style.color="#FFFFFF";
		div.style.border = "thick solid #009999";
		div.style.opacity=".75";
		div.style.padding="5";
		div.style.display="block";
	}
	
	function tblinblnsDesc(){
	//<SF>
	// 2016. szept. 26.<br>
	// Lásd: tblekrnrDesc,a funkció teljesen megegyezik, akiülönbslg csak a tábla leírása.<br>
	// PARAMÉTEREK:
	//×-
	// @--Nincsenek paraméterek  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		var div = document.getElementById("tooltipDiv");
		var x = event.clientX+document.body.scrollLeft;
		var y = event.clientY+document.body.scrollTop;
		var htmlTxt = "<h4>A <code>tblinblines</code> tábla leírása:</h4>";
		htmlTxt += '<p class="tltpMsg"> ... ';
		htmlTxt += '</p>';
		div.innerHTML = htmlTxt;
		div.style.left= (x + 20) + "px";
		div.style.top= (y - 100) + "px";
		div.style.width="660px";
		div.style.height="280px";
		div.style.backgroundColor="#5F5F5F";
		div.style.color="#FFFFFF";
		div.style.border = "thick solid #009999";
		div.style.opacity=".75";
		div.style.padding="5";
		div.style.display="block";
	}

	function tbltcnitmsDesc(){
	//<SF>
	// 2016. szept. 26.<br>
	// Lásd: tblekrnrDesc,a funkció teljesen megegyezik, akiülönbslg csak a tábla leírása.<br>
	// PARAMÉTEREK:
	//×-
	// @--Nincsenek paraméterek  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		var div = document.getElementById("tooltipDiv");
		var x = event.clientX+document.body.scrollLeft;
		var y = event.clientY+document.body.scrollTop;
		var htmlTxt = "<h4>A <code>tbltcnitems</code> tábla leírása:</h4>";
		htmlTxt += '<p class="tltpMsg"> ... ';
		htmlTxt += '</p>';
		div.innerHTML = htmlTxt;
		div.style.left= (x + 20) + "px";
		div.style.top= (y - 100) + "px";
		div.style.width="660px";
		div.style.height="280px";
		div.style.backgroundColor="#5F5F5F";
		div.style.color="#FFFFFF";
		div.style.border = "thick solid #009999";
		div.style.opacity=".75";
		div.style.padding="5";
		div.style.display="block";		
	}

	function tblinvcitmsDesc(){
	//<SF>
	// 2016. szept. 26.<br>
	// Lásd: tblekrnrDesc,a funkció teljesen megegyezik, akiülönbslg csak a tábla leírása.<br>
	// PARAMÉTEREK:
	//×-
	// @--Nincsenek paraméterek  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		var div = document.getElementById("tooltipDiv");
		var x = event.clientX+document.body.scrollLeft;
		var y = event.clientY+document.body.scrollTop;
		var htmlTxt = "<h4>A <code>tblinvcitms</code> tábla leírása:</h4>";
		htmlTxt += '<p class="tltpMsg"> ... ';
		htmlTxt += '</p>';
		div.innerHTML = htmlTxt;
		div.style.left= (x + 20) + "px";
		div.style.top= (y - 100) + "px";
		div.style.width="660px";
		div.style.height="280px";
		div.style.backgroundColor="#5F5F5F";
		div.style.color="#FFFFFF";
		div.style.border = "thick solid #009999";
		div.style.opacity=".75";
		div.style.padding="5";
		div.style.display="block";			
	}

	function tblgrdCdDesc(){
	//<SF>
	// 2016. szept. 26.<br>
	// Lásd: tblekrnrDesc,a funkció teljesen megegyezik, akiülönbslg csak a tábla leírása.<br>
	// PARAMÉTEREK:
	//×-
	// @--Nincsenek paraméterek  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		var div = document.getElementById("tooltipDiv");
		var x = event.clientX+document.body.scrollLeft;     // Get the horizontal coordinate
		var y = event.clientY+document.body.scrollTop;
		var htmlTxt = "<h4>A <code>tblgridcodes</code> tábla leírása:</h4>";
		htmlTxt += '<p class="tltpMsg"> ... ';
		htmlTxt += '</p>';
		div.innerHTML = htmlTxt;
		div.style.left= (x + 20) + "px";
		div.style.top= (y - 100) + "px";
		div.style.width="660px";
		div.style.height="280px";
		div.style.backgroundColor="#5F5F5F";
		div.style.color="#FFFFFF";
		div.style.border = "thick solid #009999";
		div.style.opacity=".75";
		div.style.padding="5";
		div.style.display="block";			
	}

	function tbldlrsDesc(){
	//<SF>
	// 2016. szept. 26.<br>
	// Lásd: tblekrnrDesc,a funkció teljesen megegyezik, akiülönbslg csak a tábla leírása.<br>
	// PARAMÉTEREK:
	//×-
	// @--Nincsenek paraméterek  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		var div = document.getElementById("tooltipDiv");
		var x = event.clientX+document.body.scrollLeft;     // Get the horizontal coordinate
		var y = event.clientY+document.body.scrollTop;
		var htmlTxt = "<h4>A <code>tbldealers</code> tábla leírása:</h4>";
		htmlTxt += '<p class="tltpMsg"> ... ';
		htmlTxt += '</p>';
		div.innerHTML = htmlTxt;
		div.style.left= (x + 20) + "px";
		div.style.top= (y - 100) + "px";
		div.style.width="660px";
		div.style.height="280px";
		div.style.backgroundColor="#5F5F5F";
		div.style.color="#FFFFFF";
		div.style.border = "thick solid #009999";
		div.style.opacity=".75";
		div.style.padding="5";
		div.style.display="block";			
	}

	function tblvtszDesc(){
	//<SF>
	// 2016. szept. 26.<br>
	// Lásd: tblekrnrDesc,a funkció teljesen megegyezik, akiülönbslg csak a tábla leírása.<br>
	// PARAMÉTEREK:
	//×-
	// @--Nincsenek paraméterek  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		var div = document.getElementById("tooltipDiv");
		var x = window.event.clientX+document.body.scrollLeft;
		//var x = window.event.screenX;
		var y = window.event.clientY+document.body.scrollTop;
		//var y = window.event.screenY;
		var htmlTxt = "<h4>A <code>tblvtsz</code> tábla leírása:</h4>";
		htmlTxt += '<p class="tltpMsg"> ... ';
		htmlTxt += '</p>';
		div.innerHTML = htmlTxt;
		div.style.left= (x + 20) + "px";
		div.style.top= (y - 100) + "px";
		div.style.width="660px";
		div.style.height="280px";
		div.style.backgroundColor="#5F5F5F";
		div.style.color="#FFFFFF";
		div.style.border = "thick solid #009999";
		div.style.opacity=".75";
		div.style.padding="5";
		div.style.display="block";			
	}
		
	function vanishme(){
	//<SF>
	// 2016. szept. 26.<br>
	// Ez a rövid kis függvény gondoskodik arról, hogy ha kattintunk a tooltip div-en, 
	// akkor az eltűnjön a szemünk elől. <br>
	// PARAMÉTEREK:
	//×-
	// @-- nincsenek paraméterek  -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		var div = document.getElementById("tooltipDiv");
		div.innerHTML="";
		div.style.left="0x";
		div.style.top="0px";
		div.style.width="0px";
		div.style.height="0px";
		div.style.opacity=".0";
		div.style.display="none";
	}
	
</script>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	