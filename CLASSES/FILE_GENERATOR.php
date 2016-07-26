<?php
//<M>
//×-
//@-FILENÉV   : PROJECT_NAME - FILE_GENERATOR.php-@
//@-SZERZÕ    : AX07057-@
//@-LÉTREHOZVA:  2016. júl. 26.-@
//@-FÜGGÕSÉGEK:
//×-
// @-- SVG_OBJECT.php-@
//-@
//-×
//-@
//@-LEÍRÁS    :
// Ez a PHP kód azt a feladatot látja el hogy egy adott lapot, vagy 
// lapelemet generál.
//@-MÓDOSÍTÁSOK :
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

		
	
	public function __construct(){
	//<SF>
	//Az osztály konstruktora, még nemtom kell-e ide valami...
	//</SF>	
	}
	
	public function GENRT_BASIC_SITE_BACKGROUND(){
	//<SF>
	//Ez az osztály generál egy alap SVG hátteret, aminek szintén több eleme lesz.
	//</SF>
		
		$svgCntnr = new SVG_OBJECT();
		
		$svgCntnr = $this->genBSC_BG_SVG();
		
		$htmlCnnt = "";
		
		$htmlCnnt .= '<!DOCTYPE html>' . PHP_EOL;
		$htmlCnnt .= '<head>' . PHP_EOL;
		$htmlCnnt .= '<meta charset="utf-8">';
		$htmlCnnt .= '<link rel="stylesheet" type="text/css" href="/PHP_SVG_GNRTR/CSS/basic.css">';
		$htmlCnnt .= '</head>' . PHP_EOL;
		$htmlCnnt .= '<body>' . PHP_EOL;
		$htmlCnnt .= $svgCntnr;
		$htmlCnnt .= '</body>' . PHP_EOL;
		$htmlCnnt .= '</html>';
		
		return $htmlCnnt;
	}
	
	private function genBSC_BG_SVG(){
	//<SF>
	//Alap SVG háttér generálása.
	//</SF>
		$code = "<svg id=\"canvas\" height=\"100%\" width=\"100%\">";
		$code .= "<g id=\"baseGridGrp\">";
		for($i=0; $i<40; $i++){
			$code .= '<path d="M' . ($i*64) . ' 0 l0 800" class="bgGrid"></path>';
			$code .= '<path d="M0 ' . ($i*64) . ' l1400 0" class="bgGrid"></path>';
		}
		$code .= "</g>";
		$code .= $this->tstSVGIcon();
		$code .= "</svg>";
		
		return $code;
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
		return $obj->getCODE();
	}
	
}

?>

