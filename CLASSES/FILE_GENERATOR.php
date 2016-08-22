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
		$htmlCnnt .= '</html>' . PHP_EOL;
		
		return $htmlCnnt;
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

	public function tstBasicCircle($prmObj = ""){
		$svgGnrtr = new SVG_OBJECT();
		if($prmObj == ""){
			$crcl = $svgGnrtr->getOneCircle();
		}else{
			$crcl = $svgGnrtr->getOneCircle($prmObj);
		}
		
		return $crcl;
	}
	
	public function genLottoSzelveny(){
	//<SF>
	//Ez a függvény egy lottószelvényt generál.
	// A működése ugyanaz mint a GENRT_BASIC_SITE_BACKGROUND függvénynek.
	// Először a példány rootSVG objektumára szerzünk egy referenciát, majd
	// egy SVG_OBJECT példánnyal legeneráltatjuk a tartalmat, ami ezúttal 
	// egy lottószelvény lesz. 
	// A generált svg tartalom kódja az oldal HTML kódjába kerül, majd elküldjük a 
	// kliensnek.
	//</SF>
		$svg = $this->rootSVG;
		$htmlCnnt = "";
		$svgGnrtr = new SVG_OBJECT();
		
		$htmlCnnt .= '<!DOCTYPE html>' . PHP_EOL;
		$htmlCnnt .= '<head>' . PHP_EOL;
		$htmlCnnt .= '<meta charset="utf-8">';
		$htmlCnnt .= '<link rel="stylesheet" type="text/css" href="/PHP_SVG_GNRTR/CSS/basic.css">';
		$htmlCnnt .= '</head>' . PHP_EOL;
		$htmlCnnt .= '<body><div class="SVG-Container">' . PHP_EOL;
		
		$szelveny = $svgGnrtr->genLottoSzelveny();
		$svg->addObject($szelveny);
		
		$htmlCnnt .= $svg->getCODE();
		$htmlCnnt .= '</div>';
		$htmlCnnt .= '<script>';
		$htmlCnnt .= 'function refresh(){';
		//                      document.getElementById
		$htmlCnnt .= 'var btn = document.getElementById("regenBtn"); ';
		$htmlCnnt .= 'location.reload(); ';
		$htmlCnnt .= 'console.log("Kattintás kezelő"); ';
		$htmlCnnt .= '}';
		$htmlCnnt .= '</script>';
		$htmlCnnt .= '</body>' . PHP_EOL;
		$htmlCnnt .= '</html>' . PHP_EOL;
		
		return $htmlCnnt;
	}
	
	public function createTestSite(){
	//<SF>
	// 2016-08-22<br>
	// Ebben a függvényben tesztelek mindent, ami nem a standard hálós kiosztással készül.<br>
	// Az első ilyen érdekesség, az adatbázistáblák grafikus megjelenítésének tesztelése.
	// PARAMÉTEREK:
	//×-
	// @-- nincs -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		//<nn>
		// Itt készítünk egy SVG_OBJECT példányt, ezt használjuk majd a generátofüggvények hívogatására.<br>
		// <code>$svgCntnr = new SVG_OBJECT();</code>
		//</nn>
		$svgGnrtr = new SVG_OBJECT();
		
		//<nn>
		// Itt egy üres array-t deklarálunk paraméterobjektumnak. Ebbe tehetjük bele az egyes
		// beállítások értékeit.<br>Itt a createBaseSVGGrp($p) függvény hívásánál nincs nagyon sok
		// beállítanivaló, csak a szélesség $params['width'], és a magasság $params['height'].<br>
		// A függvény ezekkel a paraméterekkel fogja legenrálni az alap SVG tárolónkat.
		// Fontos, hogy ez nem az &lt;SVG&gt; objektum, hanem már abban egy svg:group elem.<br>
		// Minden más elemet ebbe fogunk bepakolni.<br>
		// Itt például táblákat generáltatunk majd, és minden tábla (amik maguk is group-okból álló group elemek) 
		// ebbe a groupba kerül majd bele.
		//</nn>
		$params=array();
		$params["width"] = 1200;
		$params["height"] = 1200;
		$svgCntnr = $this->createBaseSVGGrp($params);
		//<nn>
		// Szerzünk egy referenciát a rootSVG objektumra, ami maga a legfelső szint SVG elem &lt;SVG&gt;.<br>
		// <code>$svg = $this->rootSVG;</code><br>
		// Erre szükség lesz, mert a szépen lépésenként, egyesével legenerált elemeket ehhez kell majd hozzáadnunk, 
		// a megfeleleő <code>[addObject(SVG_OBJECT obj)]</code> metódussal.
		//</nn>
		$svg = $this->rootSVG;
		//<nn>
		// A dolog végül egyszerű HTML kód formájában fog a lapra kerülni, ezt ideiglenesen a $htmlCnnt változóban
		// tásoljuk, amninek.
		//</nn>
		$htmlCnnt = "";
		
		
		//<nn>
		// A $htmlCnnt változóba bepakoljuk a fejlécadatokat. Betesszük a doctype, html, head, és body
		// deklarációkat feltöltve, plusz elkezdünk egy div elemet is, ami az svg elem tárolója lesz.
		//</nn>
		$htmlCnnt .= '<!DOCTYPE html>' . PHP_EOL;
		$htmlCnnt .= '<head>' . PHP_EOL;
		$htmlCnnt .= '<meta charset="utf-8">';
		$htmlCnnt .= '<link rel="stylesheet" type="text/css" href="/PHP_SVG_GNRTR/CSS/basic.css">';
		$htmlCnnt .= '</head>' . PHP_EOL;
		$htmlCnnt .= '<body><div class="SVG-Container">' . PHP_EOL;
		
		//<DEBUG>
		// Először ezzel próbálkoztam:<br>
		// A probléma az volt, hogy ez csak egyetlen elmet képes így legenerálni. A következő generálási
		// híváskor a $svgGnrtr objektumon, ez az objektum [a $svgDEF01], megsemmisül, és több  nem érhető el.<br>
		// $svgDEF01 = $svgGnrtr->getOneSTDDefs();<br>
		// Így ez nem ahsználható abban a munkamenetben, hogy:
		//×-
		// @-- különböző változókba (SVG_OBJECT) példányokba begeneráljuk az egyes SVG elemeket -@
		// @-- majd ezeket az elemeket egyenként az addObject(SVG_OBJECT) metódussal az alap tárolóhoz adjuk -@
		//-×
		// Ha ezt így használtam, az volt a dolog vége, hogy az utoljára generált objektumot adtam a tárolóhoz
		// minden másik objektum helyett. <br> Gondolom, hogy az lehetett a baj, hogy az újonnan létrehozott 
		// objektum [$svgDEF01] csak egy referencia tipus volt, így a következő hívásnál, ennek a code elme is
		// felülíródott, mint az eredeti $svgGnrtr objektumé.<br>
		// A megoldás, hogy helyben inicializálunk egy új SVG objektumotz minden alkalommal:<br>
		// $svgDEF01 = (new SVG_OBJECT())->getOneSTDDefs();<br>
		// az ilyen objektumokat aztán tetszés szerinti sorrendben adhatjuk a tároló objektumhoz.
		//</DEBUG>
		$svgDEF01 = (new SVG_OBJECT())->getOneSTDDefs();
		//<DEBUG>
		// echo "<p>************************************</p><p>DEF hozzáadása: </p>";
		//</DEBUG>
		
		//<DEBUG>
		// A korábbi, nem működő havás:<br>
		// $svgTable = $svgGnrtr->generateTable();<br>
		// Az új, működő:<br>
		// $svgTable = (new SVG_OBJECT())->generateTable();
		//</DEBUG>
		$svgTable = (new SVG_OBJECT())->generateTable();
		//<DEBUG>
		// A kódtartalom kiíratása, amennyiben kell:<br>
		// echo "<p>************************************</p><p>TABLE hozzáadása: </p>";
		//</DEBUG>
		
		
		//<nn>
		// A létrhozott objektumokat hozzáadjuk a tároló SVG objektumhoz:<br>
		// $svgCntnr->addObject($svgTable);<br>
		// $svgCntnr->addObject($svgDEF01);<br>
		// $svg->addObject($svgCntnr);<br>
		//</nn>
		$svgCntnr->addObject($svgTable);
		$svgCntnr->addObject($svgDEF01);
		$svg->addObject($svgCntnr);
		
		//<nn>
		// Végül a legfelső szintű tároló kódját adjuk hozzá a HTML kódot tartalmazó változónkhoz:<br>
		// $htmlCnnt .= $svg->getCODE();
		//</nn>
		$htmlCnnt .= $svg->getCODE();
		
		//<nn>
		// Most már nincs más dolgunk, csak a HTML kódban lezárni a DIV-et, és BODY-t.
		//</nn>
		
		$htmlCnnt .= '</div></body>' . PHP_EOL;
		$htmlCnnt .= '</html>' . PHP_EOL;
		
		//<nn>
		// Végül visszaadjuk a szép hosszú HTML stringet.
		//</nn>
		return $htmlCnnt;
		
	}
	
	/*************************************************************************************************************/
	/******************************              ___PRIVATE SECTION___              ******************************/
	/*************************************************************************************************************/
	
	private function genBSC_BG_SVG($wdth, $hght){
	//<SF>
	//Alap SVG háttér háló generálása.
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

	private function createBaseSVGGrp($params){
	//<SF>
	//Alap SVG tároló generálása.
	//</SF>
		$prms = array();
		$prms['id'] = "baseSVGGrp";
		$bGroup = new SVG_OBJECT($prms);
		$code = "<g id=\"baseSVGGrp\" ";
		if($params !== ""){
			
			if(isset($params["width"])){
				$code .= 'width="' . $params["width"] . 'px" '; 
			}else{
				$code .= 'width="500px" ';
			}
			if(isset($params["height"])){
				$code .= 'height="' . $params["height"] . 'px" ';
			}else{
				$code .= 'height="500px" ';
			}
			
		}
		$code .= "></g>";
		$bGroup->setCODE($code);
		return $bGroup;		
	}
}

?>

