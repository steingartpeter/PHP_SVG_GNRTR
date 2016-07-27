<?php
//<M>
//×-
//@-FILENÉV   : PROJECT_NAME - FILE_GENERATOR.php-@
//@-SZERZŐ    : AX07057-@
//@-LÉTREHOZVA:  2016. júl. 26.-@
//@-FÜGGŐSÉGEK:
//×-
// @-- SVG_OBJECT.php-@
//-@
//-×
//-@
//@-LEÍRÁS    :
// Ez a PHP kód azt a feladatot látja el hogy egy adott lapot, vagy 
// lapelemet generál.
//@-MÓDOSÍTASOK :
//×-
// @-- ... -@
//-×
//-×
//</M>
		
	require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP_SVG_GNRTR/CLASSES/SVG_OBJECT.php';	

class PAGE_GNRTR{
//<SF>
// Ez az osztály tartalmazza a SVG objektumokat generáló kódot.
//</SF>
	
	private $htmlContent = "";
	private $rootSVG = "";
	
	public function __construct(){
	//<SF>
	//Az osztály konstruktora, még nemtom kell-e ide valami...
	//</SF>
		$this->rootSVG =  $this->createRootSVG();
	}
	
	public function GENRT_BASIC_SITE_BACKGROUND(){
	//<SF>
	//Ez az osztály generál egy alap SVG hátteret, aminek szintén több eleme lesz.
	//</SF>
		
		$svgCntnr = new SVG_OBJECT();
		
		$svgCntnr = $this->genBSC_BG_SVG();
		$svg = $this->rootSVG;
		$htmlCnnt = "";
		
		$htmlCnnt .= '<!DOCTYPE html>' . PHP_EOL;
		$htmlCnnt .= '<head>' . PHP_EOL;
		$htmlCnnt .= '<meta charset="utf-8">';
		$htmlCnnt .= '<link rel="stylesheet" type="text/css" href="/PHP_SVG_GNRTR/CSS/basic.css">';
		$htmlCnnt .= '</head>' . PHP_EOL;
		$htmlCnnt .= '<body><div class="SVG-Container">' . PHP_EOL;
		
		
		$svg->addObject($this->genBSC_BG_SVG());
		$svg->addObject($this->tstSVGIcon());
		$svg->addObject($this->testShadow());
		
		
		$htmlCnnt .= $svg->getCODE();
		$htmlCnnt .= '</div></body>' . PHP_EOL;
		$htmlCnnt .= '</html>';
		
		return $htmlCnnt;
	}
	
	private function createRootSVG(){
	//<SF>
	// Az alap, közvetlenül a BODY-ba kerülő SVG node.
	// Ezt érdemes megtartani, és a [SVG_OBJECT] osztály addObject függvényével 
	// ehhez adni további elemeket.
	//</SF>
		$prmObj = array();
		$prmObj['id'] = "canvas";
		$prmObj['width'] = "100%";
		$prmObj['height'] = "100%";
		$prmObj['type'] = "svg";
		
		$rootSvg = new SVG_OBJECT($prmObj);

		return $rootSvg;
	}
	
	private function genBSC_BG_SVG(){
	//<SF>
	//Alap SVG háttér generálása.
	//</SF>
		$prms = array();
		$prms['id'] = "baseGridGrp";
		$grid = new SVG_OBJECT($prms);
		$code = "<g id=\"baseGridGrp\">";
		for($i=0; $i<15; $i++){
			$code .= '<path d="M' . ($i*64) . ' 0 l0 1280" class="bgGrid"></path>';
		}
		for($i=0; $i<20; $i++){
			$code .= '<path d="M0 ' . ($i*64) . ' l960 0" class="bgGrid"></path>';
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
}

?>

