<?php
//<M>
//×-
//@-FILENÉV   : PROJECT_NAME - FILE_GENERATOR.php-@
//@-SZERZŐ    : AX07057-@
//@-LÉTREHOZVA:  2016. júl. 26.-@
//@-FÜGGŐSÉGEK:
//×-
// @-- SVG objektumok generálása: SVG_OBJECT.php -@
// @-- Konstansok: CLASSES/CONSTANTS.php -@
//-@
//-×
//@-LEÍRÁS    :
// Ez a PHP kód azt a feladatot látja el hogy egy adott lapot, vagy 
// lapelemet generál.
//@-MÓDOSÍTASOK :
//×-
// @-- ... -@
//-×
//-×
//</M>
	require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP_SVG_GNRTR/CLASSES/CONSTANTS.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP_SVG_GNRTR/CLASSES/SVG_OBJECT.php';	

class PAGE_GNRTR{
//<SF>
// Ez az osztály tartalmazza a SVG objektumokat generáló kódot.
//</SF>
	
	private $htmlContent = "";
	private $rootSVG = "";
	private $wdInUnits = 15;
	private $hgInUnits = 20;
	
	public function __construct($w=15,$h=20){
	//<SF>
	//Az osztály konstruktora, még nemtom kell-e ide valami...
	//</SF>
		//<nn>
		// Amennyiben volt beküldött szélesség, és magasság paraméter, beállítjuk a 
		// \$wdInUnits, és \$hgInUnits változókat.
		//</nn>
		if($this->wdInUnits !== $w){
			$this->wdInUnits = $w;
		}
		if($this->hgInUnits !== $h){
			$this->hgInUnits = $h;
		}
		//<nn>
		// Miután az alap szélesség, és magasságparamétereket beállítottuk,
		// létrehozzuk az alap SVG objektumot a rootSvg-t, vagyis inicializáljuk @author stein
		// $this->rootSVG objektumot.
		// A továbbiakban, minden újabb SVG objektumot ennek a kódjába teszünk be.
		// Ezzel pedig a konstruktor befejezte a dolgát.
		//</nn>
		$this->rootSVG =  $this->createRootSVG($w,$h);
	}
	
	public function GENRT_BASIC_SITE_BACKGROUND($w=15,$h=20){
	//<SF>
	//Ez az osztály generál egy alap SVG hátteret, aminek szintén több eleme lesz.
	//</SF>
		
		//<nn>
		// Létrehozzuk az alap SVG objektumunkat, azzal, 
		// hogy egy new SVG objektumot hozumnk létre.<br>
		// - $svgCntnr
		//</nn>
		$svgCntnr = new SVG_OBJECT();
		
		$svgCntnr = $this->genBSC_BG_SVG($w,$h);
		$svg = $this->rootSVG;
		$htmlCnnt = "";
		
		$htmlCnnt .= '<!DOCTYPE html>' . PHP_EOL;
		$htmlCnnt .= '<head>' . PHP_EOL;
		$htmlCnnt .= '<meta charset="utf-8">';
		$htmlCnnt .= '<link rel="stylesheet" type="text/css" href="/PHP_SVG_GNRTR/CSS/basic.css">';
		$htmlCnnt .= '</head>' . PHP_EOL;
		$htmlCnnt .= '<body><div class="SVG-Container">' . PHP_EOL;
		
		
		$svg->addObject($svgCntnr);
		//$svg->addObject($this->tstSVGIcon());
		//$svg->addObject($this->testShadow());
		$prms = array();
		for($i=0;$i<10; $i++){
			$prms['id'] = "stdCrcl00" . $i;
			$prms['fill'] = $this->genRNDHEXColor();
			$prms['class'] = "clsStdCrcl01";
			$prms['stroke'] = $this->genRNDHEXColor();
			$prms['stroke-width'] = "8";
			$prms['r'] = 32;
			$prms['grd_cx'] = rand(1,10);
			$prms['grd_cy'] = rand(1,10);
			$svg->addObject($this->tstBasicCircle($prms));
		}
		
		$prms['id'] = "stdCrcl001";
		$prms['fill'] = $this->genRNDHEXColor();
		$prms['class'] = "clsStdCrcl01";
		$prms['stroke'] = $this->genRNDHEXColor();
		$prms['stroke-width'] = "8";
		$prms['r'] = 32;
		$prms['grd_cx'] = 3;
		$prms['grd_cy'] = 3;
		$svg->addObject($this->tstBasicCircle($prms));
		
		$htmlCnnt .= $svg->getCODE();
		$htmlCnnt .= '</div></body>' . PHP_EOL;
		$htmlCnnt .= '</html>';
		
		return $htmlCnnt;
	}
	
	private function createRootSVG($w=15,$h=20){
	//<SF>
	// Az alap, közvetlenül a BODY-ba kerülő SVG node.
	// Ezt érdemes megtartani, és a [SVG_OBJECT] osztály addObject függvényével 
	// ehhez adni további elemeket.
	//</SF>
		$prmObj = array();
		$prmObj['id'] = "canvas";
		$prmObj['width'] = ($w *64) . "px";
		$prmObj['height'] = ($h * 64) . "px";
		$prmObj['type'] = "svg";
		
		$rootSvg = new SVG_OBJECT($prmObj);

		return $rootSvg;
	}
	
	private function genBSC_BG_SVG($wdth, $hght){
	//<SF>
	//Alap SVG háttér generálása.
	//</SF>
		$prms = array();
		$prms['id'] = "baseGridGrp";
		$grid = new SVG_OBJECT($prms);
		$code = "<g id=\"baseGridGrp\">";
		for($i=0; $i<$wdth; $i++){
			$code .= '<path d="M' . ($i*64) . ' 0 l0 '. ($hght * STD_GRIDUNIT_HEIGHT) .
			'" class="bgGrid"></path>';
		}
		for($i=0; $i<$hght; $i++){
			$code .= '<path d="M0 ' . ($i*64) . ' l' . ($wdth * STD_GRIDUNIT_WIDTH) . 
			' 0" class="bgGrid"></path>';
		}
		$code .= "</g>";
		$grid->setCODE($code);
		return $grid;
	}
	
	public function tstSVGIcon(){
	//<SF>
	// Egy teljes elem kódjának meggenerálása.
	//</SF>
		$obj = new SVG_OBJECT();
		$code = '<g class="clsGrp" height="64" width="96" transform="translate(256,0)">
		  <defs id="defs4853">
			<linearGradient id="linearGradient10836" gradientTransform="rotate(90)">
			  <stop id="stop10838" offset="0%" style="stop-color:#ffffff;stop-opacity:1;" />
			  <stop id="stop10840" offset="100%" style="stop-color:#ffffff;stop-opacity:0;" />
			</linearGradient>
		</defs>
		  <g id="lyr001">
			<rect class="emptyBgRect" y="0" x="0" height="64" width="64" id="rect9026"></rect>
			<rect id="rect10822" ry="6" y="3" x="3" height="57" width="64"
				style="opacity:0.8;fill:#6098a1;stroke:#3a378a;stroke-width:1.5;stroke-opacity:1">
			</rect>
			<rect id="rect10834" width="60" height="50" x="5" y="5" ry="6"
			   style="opacity:0.8;fill:url(#linearGradient10836);fill-opacity:1;
			   stroke:none;stroke-width:1.34723461;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1">
			</rect>
			<text class="clsTitle"
				id="text10824"
				transform="scale(0.88795809,1.1261793)"
				y="22"
				x="6"
				style="font-weight:bold;font-size:17px;line-height:125%;font-family:sans-serif;
				word-spacing:0px;fill:#5b5858;fill-opacity:1;stroke:#0800c9;stroke-width:1px;
				stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1">
				<tspan y="22" x="6" id="tspan10826">CLASS</tspan>
			</text>
			<text class="clsName" id="text10828"
				y="35" x="5"
				style="font-size:10px;line-height:125%;font-family:sans-serif;fill:#000000; stroke:none;">
				<tspan y="36" x="5" id="clsTspan01">shpGenerator</tspan>
				<tspan id="clsTspan02" y="48" x="5">classname</tspan>
			</text>
		  </g>
		</g>';
		$obj->setCODE($code);
		return $obj;
	}
	
	public function testShadow(){
	//<SF>
	//Egy drop -shadow effect egy cicrcle-hez...
	//</SF>
		$grp = new SVG_OBJECT();
		$cd = '<g width="128" height="128">
			<filter id="dropShadow">
		    	<feGaussianBlur in="SourceAlpha" stdDeviation="3"></feGaussianBlur>
		    	<feOffset dx="3" dy="5"></feOffset>
		    <feMerge>
		        <feMergeNode></feMergeNode>
		        <feMergeNode in="SourceGraphic"></feMergeNode>
		    </feMerge>
		  </filter>
		  <circle cx="64"  cy="64" r="55" fill="#55FFFF" filter="url(#dropShadow)" stroke="#FFFFFF" stroke-width="2px"></circle>
		</g>';
		//$cd= '<circle cx="100" cy="100" r="80" fill="#FFAAFF"></circle>';
		$grp->setCODE($cd);
		return $grp;
	}

	public function getRootSVG(){
	//<SF>
	// Ez a függvény hozzáférést biztosít egy másik lapon ennek az osztélynak
	// a RootSVG objektumához, így elméletileg, ott, a céloldalon is tudunk
	// generálni további SVG elemeket, és ehhez adni. Bár lehet, hogy minden SVG
	// generálási feladatot inkább itt hozok létre, egyedi függvéynként.
	// Ez még formálódik.
	//</SF>
		return $this->rootSVG;
	}

	public function  tstBasicCircle($prmObj = ""){
		$svgGnrtr = new SVG_OBJECT();
		if($prmObj == ""){
			$crcl = $svgGnrtr->getOneCircle();
		}else{
			$crcl = $svgGnrtr->getOneCircle($prmObj);
		}
		
		return $crcl;
	}
	
	
	private function genRNDHEXColor(){
	//<SF>
	// Ez a függvény egy véletlengenerált szinkódot ad vissza.
	//</SF>
		$col = "#";
		for($i=0; $i<3; $i++){
			$nr = rand(1,255);
			$str = substr("0" . strtoupper(dechex($nr)),-2);
			$col .= $str;
		}
		return $col;
	}
}

?>

