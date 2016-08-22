<?php
//<M>
//×-
//@-FILENÉV   : PROJECT_NAME - SVG_OBJECT.php-@
//@-SZERZŐ    : AX07057-@
//@-LÉTREHOZVA:  2016. júl. 26.-@
//@-FÜGGŐSÉGEK:
//×-
// @-- Konstansok: CLASSES/CONSTANTS.php -@
//-×
//-@
//@-LEÍRÁS    :
// Ez a PHP kód generál SVG elemeket. Az SVG elemek itt nem igaz HTML, vagy XML objektumok
// lesznek hanem csak egyszerű pszeudo class példányok, amiknek a léynegét igazából a 
// kód tag(member)-juk hordozza. Manipulálsuk tiszta szövegmanuipulációval történik, 
// beszúrásuk pedig a $code-elemük HTML tartalomba illesztésével. 
//@-MÓDOSÍTÁSOK :
//×-
// @-- ... -@
//-×
//-×
//</M>	
	require_once $_SERVER['DOCUMENT_ROOT'] . '/PHP_SVG_GNRTR/CLASSES/CONSTANTS.php';
	
class SVG_OBJECT{
	
	//<nn>
	// Az SVG_OBJECT osztály tagváltozói:<br>
	//×-
	// @-- private $name = a létrehozandó SVG objektum neve -@
	// @-- private $type = a létrehozandó SVG typusa [g/defs/cicrcl/rect/...] -@
	// @-- private $code = a létrehozandó SVG objektum kódja, igazából az alapkoncepcióban nem
	// HTML, vag XML elemekként kezelem az SVG objektumokat, csak szövegként.-@
	// @-- private $id = a létrehozandó SVG objektum CSS id-je -@
	// @-- private $class = a létrehozandó SVG objektum CSS class-a -@
	//-×
	// Ezeknek a változóknak kell valamilyen értéket adni a konstruktorban. Nyilván
	// a type ami kötelezően megadandó, a többit csak az esetleges JavaScript felhasnálás,
	// illetve a formázások alkalmazása miatt érdemes megadni.
	//</nn>
	private $name = "";
	private $type = "";
	private $code = "";
	private $id = "";
	private $class = "";
	private $width = "";
	private $height = "";
	
	
	
	public function __construct($params = ""){
	//<SF>
	// A konstruktor, egy inicializáló objektumot küldhetünk be.
	// Ha nincs inicializációs objektum egy alapértelmezett SVG:g
	// objektumot küldünk vissza.<br>
	//
	//</SF>
		if($params == ""){
			$this->name = "group" .  rand(1,9999);
			$this->type = "g";
			$this->id = "svg-grp-" . rand(1,9999);
			$this->code = "<g id=\"" . $this->id . "\">";
			$this->class = "baseSvgGrp";
			$this->width = "64px";
			$this->height = "64px";
			
		}elseif(is_array($params)){
			//<nn>
			// Végigmegyünk a paraméter lehetséges elemein, és beaálítjuk azokat ha voltak,
			// ha hiányoznak, akkor akapértelmezett értéket adun nekik.
			//</nn>
			
			if(isset($params['type']) && $params['type'] !== "" ){
				$this->type = $params['type'];
			}else{
				$this->type = "svg";
			}
			$this->code .= "<" . $this->type . ' ';
			
			if(isset($params['name']) && $params['name'] !== "" ){
				$this->name = $params['name'];
			}else{
				//<DEBUG>
				//$this->name = "group" .  rand(1,9999);
				//</DEBUG>
			}
			
			if(isset($params['id']) && $params['id'] !== "" ){
				$this->id = $params['id'];
			}else{
				$this->id = "svg-id-" .  rand(1,9999);
			}
			$this->code .= 'id="' . $this->id . '" ';
				
			if(isset($params['class']) && $params['class'] !== "" ){
				$this->class = $params['class'];
				$this->code .= 'class="' . $this->class . ' ';
			}else{
				//<DEBUG>
				//$this->class = "svg-g-std-" .  rand(1,9999);
				//</DEBUG>
			}
			
			if(isset($params['width']) && $params['width'] !== "" ){
				$this->width = $params['width'];
				$this->code .= 'width="' . $this->width . '" ';
			}else{
				
			}
			if(isset($params['height']) && $params['height'] !== "" ){
				$this->height = $params['height'];
				$this->code .= 'height="' . $this->height . '" ';
			}else{
			
			}
			
			$this->code .= "></" . $this->type . '>';
			
		}else{
		}
	}
	
	public function getCODE(){
	//<SF>
	//Az objektum kódjának visszadása.
	//</SF>
		return $this->code;
	}
	
	public function setCODE($cd){
	//<SF>
	// Az obnjektum kódjának beállítása.
	//</SF>
		$this->code = $cd;
	}
	
	public function addObject($svgObj){
	//<SF>
	// Ez a függvény a már meglévő svg objektum kódjába szúrja be egy
	// paraméterként kapott másikobjetum mkódját! 
	//</SF>
		$poz = 1;
		$poz = strrpos($this->code, "</", -1);
		$cd1 = substr($this->code, 0,$poz);
		//<DEBUG>
		// Itt ellenőrizhetjük a string felbontást, mebnézhtejük mi kerül az első részbe.<br>
		// echo "<p>\$cd1: " . htmlentities($cd1) . " </p>";
		//</DEBUG>
		
		$cd2 = substr($this->code, $poz, strlen($this->code));
		//<DEBUG>
		// Itt ellenőrizhetjük a string felbontást, megnézhtejük mi kerül az utolsó részbe.<br>
		// E kettő között kell lennie a hozzáadott elem kódjának.<br>
		//echo "<p>\$cd2: " . htmlentities($cd2) . " </p>";
		//</DEBUG>
		
		$this->code = $cd1;
		$this->code .= $svgObj->getCODE();
		$this->code .= $cd2;
	}
	
	public function getOneSTDGroup($params = ""){
	//<SF>
	//Alap svg:g objektum létrehozása
	//</SF>
		if($params !== ""){
			$nr = random_int(1,9999);
			$this->name = "grp-" . $nr;
			$this->id = "g-id-" . $nr;
			$this->type = "g";
			$this->class = "g-cls-" . $nr;
			
			$w = 64;
			$h = 64;
			
			$this->code = '<g class="' . $this->class . '" ';
			$this->code .= 'id="' . $this->id . '" ';
			$this->code .= 'width="' . $w . "' ";
			$this->code .= 'height="' . $h . "' ";
			$this->code .= '></g>';
			
			
		}else{
			if(isset($params['name']) && $params['name'] !== ""){
				$this->name = $params['name']; 	
			}
			if(isset($params['id']) && $params['id'] !== ""){
				$this->id = $params['id'];
			}
			
		}
		
		return $this;
	}
	
	public function getOneSTDFilter($params = ""){
	//<SF>
	//Alap svg:filter objektum létrehozása
	//</SF>
		return $this;
	}
	
	public function getOneSTDDefs($params = ""){
	//<SF>
	//Alap svg:Defs objektum létrehozása
	//</SF>
		if($params == ""){
			$this->code = 
			'<defs id="BSC-defs">
				<linearGradient id="BSC-linGrad">
					<stop id="stop0001" style="stop-color:#00ccb7;stop-opacity:1" offset="0" />
					<stop id="stop0002" style="stop-color:#5b5f5c;stop-opacity:1" offset="1" />
			    </linearGradient>
			</defs>';
		}else{
			
		}
		return $this;
	}
	
	public function getOneCircle($params = ""){
	//<SF>
	//Alap svg:Circle objektum létrehozása
	//</SF>
		
		//<nn>
		// Az objektum létrehozása minden esetben így történik:
		//×-
		// @-- Mivel a függvény egy adott objektumtipusra vonatkozik, így azzal
		// inicializálhatjuk az objektum code elemét, pl.: circel, rect, defs, stb-@
		// @-- Ezután megvizsgáljuk, hogy  volt-e beküldött paraméterobjektum -@
		// @-- Ha nem volt legeneráljuk a standard kódot, és visszaadjuk az objektumot -@
		// @-- Ha volt, akkor végigmegyünk az elemeken, és ha volt beküldött érték,
		// akkor azt, ha nem volt, akkor az alapértelmezett értéket állítjuk be.-@
		//-×
		// Első lépésként megnyitjuk az objektum code elemét. Erről tudjuk, hogy 
		// &quot;&gt;circle &quot; lesz a kezdete. Ezenkivül még a tipusa [tye] 
		// is biztos: &quot; cicrcle &quot;.
		//</nn>
		$this->code = '<circle ';
		
		$this->type = "circle";
		
		//<nn>
		// Megvizsgáljuk volt-e beküldött paraméter.
		//×-
		// @-- Ha nem, minden alapértelemezett értékkel lesz beállítva. -@
		// @-- Ha igen,m egynként szépen végigsétálunk rajta. -@
		//-×
		//</nn>
		if($params == ""){
			$this->class = "stdCrcl";
			$this->id = "crclId" . rand(1,999);
			$this->type = "circle";
			$cx = STD_GRIDUNIT_HEIGHT/2;
			$cy = STD_GRIDUNIT_WIDTH/2;
			$r = STD_GRIDUNIT_HEIGHT/2;
			$fill = "#FF0000";
			$style = 'fill:' . $fill . ';stroke:#FFFF00;stroke-width:3;';
		}else{
			//<nn>
			// Class megadása, ha bejött paraméterelem, akkor azzal, ha nem
			// akkor az alapértelemzett értékkel.
			//</nn>
			if(isset($params["class"]) && $params["class"] !== ""){
				$this->class = $params["class"];
			}else{
				$this->class = "stdCrcl";
			}
			//<nn>
			// ID megadása, ha bejött paraméterelem, akkor azzal, ha nem
			// akkor az alkapértelemzett értékkel.
			//</nn>
			if(isset($params["id"]) && $params["id"] !== ""){
				$this->id = $params["id"];
			}else{
				$this->id = "crclId" . rand(1,999);
			}
			//<nn>
			// cx [középpont x koordináta] megadása, vagy 
			// grd_cx [középpont x koordináta] megadása, [az alapháló lépésközei szerint]
			// ha bejött paraméterelem, akkor azzal, ha nem
			// akkor az alkapértelemzett értékkel [32].
			//</nn>
			if(isset($params["cx"]) && $params["cx"] !== ""){
				$cx = $params["cx"];
			}elseif(isset($params["grd_cx"]) && $params["grd_cx"] !== ""){
				$cx = ($params["grd_cx"]*64 - (STD_GRIDUNIT_WIDTH/2));
			}else{
				$cx = 32;
			}
			
			//<nn>
			// cy [középpont y koordináta] megadása,
			// ha bejött paraméterelem, akkor azzal, ha nem
			// grd_cy [középpont y koordináta] megadása, [az alapháló lépésközei szerint]
			// akkor az alkapértelemzett értékkel [32].
			//</nn>
			if(isset($params["cy"]) && $params["cy"] !== ""){
				$cy = $params["cy"];
			}elseif(isset($params["grd_cy"]) && $params["grd_cy"] !== ""){
				//<nn>
				// Itt számoljuk ki a koordinátát a haló koordinátából.
				// Bár a számlálás 0-tól indul, amikor a képernyőkoordinátákat
				// számoljuk úgy teszünk mintha 1 el kezdenénk. SZóval az első
				// négyzetrácsba kerülő koordináták (1,1). Emiatt, hogy ennek
				// középpontját kapjuk meg le kell vonnunk a hálócellák magasságának
				// felét:<br/>
				// $params["grd_cy"]*64 - 32.
				//</nn>
				$cy = ($params["grd_cy"]*64 - (STD_GRIDUNIT_HEIGHT/2));
			}else{
				$cy = 32;
			}
			
			//<nn>
			// r [sugár] megadása, ha bejött paraméterelem, akkor azzal, ha nem
			// akkor az alkapértelemzett értékkel [32].
			//</nn>
			if(isset($params["r"]) && $params["r"] !== ""){
				$r = $params["r"];
			}else{
				$r = 32;
			}
		
			//<nn>
			// r [sugár] megadása, ha bejött paraméterelem, akkor azzal, ha nem
			// akkor az alkapértelemzett értékkel [32].
			//</nn>
			if(isset($params["fill"]) && $params["fill"] !== ""){
				$fill = $params["fill"];
			}else{
				$fill = 32;
			}
			
			//<nn>
			// Innentől a style elem kialakítása van soron, alapértelemzésben beteszem
			// a fill-t, de megadható még itt a 
			//×-
			// @-- stroke -@
			// @-- stroke-width -@
			// @-- ... -@
			//-×
			//</nn>
			$style = "fill:" . $fill . ";";
			if(isset($params['stroke']) && $params['stroke']!== ""){
				$style .= "stroke:" . $params["stroke"] . ";"; 
			}else{
				$style .= "stroke:#FFFF00;";
			}
			
			if(isset($params['stroke-width']) && $params['stroke-width']!== ""){
				$style .= "stroke-width:" . $params["stroke-width"] . "px;";
				$r = $r - ($params['stroke-width']/2);
			}else{
				$style .= "stroke-width:3px;";
			}
		}
		
		$this->code .= 'id="' . $this->id . '" ';
		$this->code .= 'class="' . $this->class .'" ';
		$this->code .= 'cx="' . $cx .'" ';
		$this->code .= 'cy="' . $cy .'" ';
		$this->code .= 'r="' . $r .'" ';
		$this->code .= 'style="' . $style .'" ';
		$this->code .= '/>';
		return $this;
	}
	
	public function getOneEllipse($params = ""){
	//<SF>
	//Alap svg:Ellipse objektum létrehozása
	//</SF>
		return $this;
	}
	
	public function getOneLine($params = ""){
	//<SF>
	//Alap svg:line objektum létrehozása
	//</SF>
		return $this;
	}
	
	public function getOnePolygon($params = ""){
	//<SF>
	//Alap svg:polygon objektum létrehozása
	//</SF>
		return $this;
	}
	
	public function getOneRect($params = ""){
	//<SF>
	//Alap svg:rect objektum létrehozása
	//</SF>
		return $this;
	}
	
	public function getOnePath($params = ""){
	//<SF>
	//Alap svg:path objektum létrehozása
	//</SF>
		return $this;
	}
	
	public function getOneDecisionShape($params = ""){
	//<SF>
	// Ez a függvény egy hastzögletű elemet generál, ami egy szöveg elemet tartalmaz,
	// és egy döntési lehetőséget tartalmaz.
	// Alapértelmezésben egy YES, és egy NO ága van.
	//</SF>
		if($params = ""){
			
		}
	}
	
	public function generateTable($params = ""){
	//<SF>
	// 2016-08-22<br>
	// Ez a függgvény egy táblázatot generál majd. Olyan rácsozott téglalap ez, amiben szövegelemek vannak, és 
	// adatbázis táblákat, valamint kapcsolataikat írja le.<br>
	// PARAMÉTEREK:
	//×-
	// @-- $params = egy opcionális paraméter ami valamennyi szükséges/lehetséges paramétert 
	// tartalamazhat egy opcionális tömbben -@
	//-×
	// MÓDOSÍTÁSOK :
	//×-
	// @-- ... -@
	//-×
	//</SF>
		if($params == ""){
			$this->code = '<g id="tblTest" transform="translate(10,10)">
				<rect x="10" y="10" height="340" width="400" fill="#EFEFEF"></rect>
					<g id="vbfa-texts">
						<rect id="ttlBGround" x="11" y="11" height="38" width="398" fill="#FFFF5A" />
						<text class="tblHeader" x="200" y="35">TEST</text>
						
						<rect class="hdrBGround" x="10" y="50" height="25" width="200" fill="#7C7C7C" />
						<rect class="hdrFrm" x="13" y="53" height="19" width="194" fill="none" stroke="#000000" stroke-width="1" />
						
						<rect class="hdrBGround" x="210" y="50" height="25" width="100" fill="#7C7C7C"/>
						<rect class="hdrFrm" x="213" y="53" height="19" width="93" fill="none" stroke="#000000" stroke-width="1" />
						
						<rect class="hdrBGround" x="310" y="50" height="25" width="100" fill="#7C7C7C"/>
						<rect class="hdrFrm" x="313" y="53" height="19" width="93" fill="none" stroke="#000000" stroke-width="1" />
						
						
						<!-- SPECIAL background RECTS -->
						<rect class="lnkBgrnd" x="310" y="75" height="25" width="100" fill="#B4DCB4" />
						<rect class="lnkBgrnd" x="310" y="100" height="25" width="100" fill="#B4DCB4" />
						<rect class="fltrBgrnd" x="310" y="175" height="25" width="100"  fill="#FFCCCC" />
						
						<text class="stdHdr1" x="20" y="68">Descr.</text><text class="stdHdr1" x="220" y="68">Tech.Name</text><text class="stdHdr1" x="320" y="68">Role</text>
						
						<text class="stdDesc" x="20" y="95">Preceding Document</text><text class="fldName" x="220" y="95">VBELV</text><text class="fldName" x="320" y="95">LINK</text>
						<text class="stdDesc" x="20" y="120">Preceding item</text><text class="fldName" x="220" y="120">POSNV</text><text class="fldName" x="320" y="120">LINK</text>
						<text class="stdDesc" x="20" y="145">Subsequent document</text><text class="fldName" x="220" y="145">VBELN</text><text class="fldOUT" x="320" y="145">OUT</text>
						<text class="stdDesc" x="20" y="170">Subsequent item</text><text class="fldName" x="220" y="170">POSNN</text><text class="fldOUT" x="320" y="170">OUT</text>
						<text class="stdDesc" x="20" y="195">Subsequent doc. cat.</text><text class="fldName" x="220" y="195">VBTYP_N</text><text font-size="14" class="fldOUT" x="315" y="195">OUT-FILTER</text>
						<rect id="tstRect" x="310" y="175" width="100" height="25" fill="#FF00FF" stroke="#FF0000" stroke-width="1" opacity=".0" title="..." onclick="shwFltr01()"/>
						<text class="stdDesc" x="20" y="220">Quantity</text><text class="fldName" x="220" y="220">RFMNG</text><text class="fldNone" x="320" y="220">NONE</text>
						<text class="stdDesc" x="20" y="245">Reference value</text><text class="fldName" x="220" y="245">RFWRT</text><text class="fldOUT" x="320" y="245">OUT</text>
						<text class="stdDesc" x="20" y="270">Statistics currency</text><text class="fldName" x="220" y="270">WAERS</text><text class="fldOUT" x="320" y="270">OUT</text>
						<text class="stdDesc" x="20" y="295">Created on</text><text class="fldName" x="220" y="295">ERDAT</text><text class="fldOUT" x="320" y="295">OUT</text>
						<text class="stdDesc" x="20" y="320">Time</text><text class="fldName" x="220" y="320">ERZET</text><text class="fldOUT" x="320" y="320">OUT</text>
						<text class="stdDesc" x="20" y="345">Billing category</text><text class="fldName" x="220" y="345">FKTYP</text><text class="fldOUT" x="320" y="345">OUT</text>
		
					</g>
					
					
					<g class="table-grid" transform="translate(10,10)">
						<!-- VBFA - VÍZSZIINTES VONALAK -->
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
						<line x1="0" x2="400" y1="340" y2="340" stroke="#000000" stroke-width="3" />
						
						<!-- VBFA - FÜGGŐLEGES VONALAK -->
						<line x1="0" x2="0" y1="0" y2="340" stroke="#000000" stroke-width="3" />
						<line x1="200" x2="200" y1="40" y2="340" stroke="#000000" stroke-width="1" />
						<line x1="300" x2="300" y1="40" y2="340" stroke="#000000" stroke-width="1" />
						<line x1="400" x2="400" y1="0" y2="340" stroke="#000000" stroke-width="3" />
					</g>
			</g>';
		}else{
			$this->code = "<g id=";
			
			if(isset($params["mainGroupID"])){
				$this->code .= '"'. $params["mainGroupID"] .'"';
			}else{
				$this->code .= '"tbl-'. rand(100,999) .'" ';
			}
			$this->code .= 'transform="translate(';
			if(isset($params["mainGrpTranslate"])){
				$this->code .= $params["mainGrpTranslate"]["x"] . ",";
				$this->code .= $params["mainGrpTranslate"]["y"] . ')" >';
			}
		}
		
		return $this;
		
	}
	
	public function genLottoSzelveny(){
	//<SF>
	// Ez a függvény egy számmezőt generál, ami egy lottószelvényt reprezentál.
	// A lényege annyi, hogy csinálunk egy 10X9-es négyzethálót, amibe beírjuk a számokat.
	// A sorsolást egy másik függvény fogja megvalósítani, ami majd átlátszó lila pöttyöket
	// tesz a kihúzott számok elé.
	//</SF>	
		$this->code = '<g class="lottoSzelveny" id="aktSzelveny001" transform="translate(30,30)">';
		$w=32;
		$h=32;
		for($i=0; $i<9; $i++){
			for($j=0;$j<10;$j++){
				$this->code .= '<g id="cell' . $i . '-' . $j . '">';
				$this->code .= '<rect x="' . (($j*32)+($j*2)) .'" ';
				$this->code .= 'y="' . (($i*32)+($i*2)) . '" ';
				$this->code .= 'width="32" ';
				$this->code .= 'height="32" ';
				$this->code .= 'fill="#FFFFFF" ';
				$this->code .= 'style="stroke:#050505;stroke-width:1px" ';
				$this->code .= '></rect>';
				$this->code .= '<text '; 
				$this->code .= 'x="' . ((($j*32)+($j*2))+16) .'" ';
				$this->code .= 'y="' . ((($i*32)+($i*2))+25) . '" ';
				$this->code .= 'style="fill:#050505;stroke:none;font-size:25px;text-anchor:middle;"';
				$this->code .= '>' . (($i*10)+($j*1)+1) . '</text>';
				$this->code .= '</g>';
			}
		}
		
		$szamok = array();
		for($i=0; $i<5; $i++){
			$szam = rand(1,90);
			if(in_array($szam, $szamok) == false){
				array_push($szamok, $szam);
			}else{
				$i = $i-1;
			}
		}
		//<DEBUG>
		//...
		//echo "<p><pre>";
		//print_r($szamok);
		//echo "</pre></p>";
		//</DEBUG>
		
		$this->code .= '<g id="szamJelolok">';
		
		for($i=0; $i<sizeof($szamok); $i++){
			if($szamok[$i] % 10 !== 0){
				$x = (($szamok[$i] % 10)*32) + ((($szamok[$i] % 10)*2)) - 18;
			}else{
				$x = 322;
			}
			$y = ((ceil($szamok[$i]/10))*32) + (((ceil($szamok[$i]/10))*2)) - 18 ;
			$this->code .= '<circle ';
			$this->code .= 'cx="' . $x . '" cy="' . $y . '" r="14"';
			$this->code .= 'fill="#FF00FF" opacity=".3" value="' . $szamok[$i] .  '"';
			$this->code .= '></circle>';
		}	
		$this->code .= '</g>';
		
		$this->code .= '<g class="button01">';
		$this->code .= '<rect id="regenBtn" x="400" y="25" height="40" width="100" rx="10" ry="10" onCLick="refresh()" ';
		$this->code .= 'fill="#CDCDCD" stroke="#FFFFFF" stroke-width="3" ';
		$this->code .= '></rect>';
		$this->code .= '<text x="450" y="50" font-weight="bold" text-anchor="middle">' . "ÚJRA" . '</text></g>';
		
		$this->code .= '</g>';
		return $this;
	}
	
}

?>