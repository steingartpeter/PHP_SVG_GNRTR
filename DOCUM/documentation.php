<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<link rel="stylesheet" href="../CSS/docum.css"/>
</head>
<body>

<div title="kattints a megynitáshoz/bezáráshoz" class="docDiv" id="FILE_GENERATOR">
	<div class="closeNext">
		<h1>Általános leírás a projekthez</h1>
	</div>
	<div class="toBeClosed">
		<div class="subFunc">
			Ez az osztály tartalmazza a SVG objektumokat generáló kódot.
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - public function __construct()</h4>
		<div class="subFunc">
			Az osztály konstruktora, még nemtom kell-e ide valami...
		</div>
		<div class="normNote">
			Létrehozzuk az alap SVG objektumunkat, azzal, 
			hogy egy new SVG objektumot hozumnk létre.<br>
			- $svgCntnr
		</div>
	</div>
</div>

<div title="kattints a megynitáshoz/bezáráshoz" class="docDiv" id="FILE_GENERATOR">
	<div class="closeNext">
		<h1>FILE_GENERATOR.php - PHP_SVG_GNRTR</h1>
	</div>
	<div class="toBeClosed">
		<div class="modulN">
		<h2>FILE_GENERATOR - PHP_SVG_GNRTR</h2>
			<ul>
				<li>FILENÉV   : PROJECT_NAME - FILE_GENERATOR.php</li>
				<li>SZERZŐ    : AX07057</li>
				<li>LÉTREHOZVA:  2016. júl. 26.</li>
				<li>FÜGGŐSÉGEK:
					<ul>
						<li>- SVG_OBJECT.php</li>
					</ul>
				</li>
				<li>LEÍRÁS    :<br/>
					Ez a PHP kód azt a feladatot látja el hogy egy adott lapot, vagy 
					lapelemet generál.
				<li>MÓDOSÍTASOK :
					<ul>
						<li>- ... </li>
					</ul>
			</ul>
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - </h4>
		<div class="subFunc">
			Ez az osztály tartalmazza a SVG objektumokat generáló kódot.
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - public function __construct()</h4>
		<div class="subFunc">
			Az osztály konstruktora, még nemtom kell-e ide valami...
		</div>
		<div class="code">
			Tesztszöveg kódhoz...
		</div>
		<div class="debugNote">
			debugText<br/>
			&nbsp;&nbsp;&lt;Teszt 01&gt;<br/>
			&nbsp;&nbsp;&lt;Teszt 02&gt;<br/>
			&nbsp;&nbsp;&lt;Teszt 03&gt;<br/>
			most ennyi...
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - public function GENRT_BASIC_SITE_BACKGROUND()</h4>
		<div class="subFunc">
			Ez az osztály generál egy alap SVG hátteret, aminek szintén több eleme lesz.
		</div>
		<div class="normNote">
			Létrehozzuk az alap SVG objektumunkat, azzal, 
			hogy egy new SVG objektumot hozumnk létre.<br>
			- $svgCntnr
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - private function createRootSVG()</h4>
		<div class="subFunc">
			Az alap, közvetlenül a BODY-ba kerülő SVG node.
			Ezt érdemes megtartani, és a [SVG_OBJECT] osztály addObject függvényével 
			ehhez adni további elemeket.
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - private function genBSC_BG_SVG()</h4>
		<div class="subFunc">
			Alap SVG háttér generálása.
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - public function tstSVGIcon()</h4>
		<div class="subFunc">
		 	Egy teljes elem kódjának meggenerálása.
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - public function testShadow()</h4>
		<div class="subFunc">
			Egy drop -shadow effect egy cicrcle-hez...
		</div>
		<h4 class="funcNm">FILE_GENERATOR.php - public function getRootSVG()</h4>
		<div class="subFunc">
			 Ez a függvény hozzáférést biztosít egy másik lapon ennek az osztélynak
			a RootSVG objektumához, így elméletileg, ott, a céloldalon is tudunk
			generálni további SVG elemeket, és ehhez adni. Bár lehet, hogy minden SVG
			generálási feladatot inkább itt hozok létre, egyedi függvéynként.
			Ez még formálódik.
		</div>
	</div>
</div>

<div title="kattints a megynitáshoz/bezáráshoz" class="docDiv" id="SVG_OBJECT">
	<div class="closeNext">
		<h1>SVG_OBJECT.php - PHP_SVG_GNRTR</h1>
	</div>
	<div class="toBeClosed">
		<div class="modulN">
		<h2>SVG_OBJECT.php - PHP_SVG_GNRTR</h2>
		<ul>
			<li>FILENÉV   : PROJECT_NAME - SVG_OBJECT.php</li>
			<li>SZERZŐ    : AX07057</li>
			<li>LÉTREHOZVA:  2016. júl. 26.</li>
			<li>FÜGGŐSÉGEK:
				<ul>
				<li>- Alapfile nincsenek függőségek </li>
				</ul>
			</li>
		<li>LEÍRÁS    :
			Ez a PHP kód generál SVG elemeket. Az SVG elemek itt nem igaz HTML, vagy XML objektumok
			lesznek hanem csak egyszerű pszeudo class példányok, amiknek a léynegét igazából a 
			kód tag(member)-juk hordozza. Manipulálsuk tiszta szövegmanuipulációval történik, 
			beszúrásuk pedig a $code-elemük HTML tartalomba illesztésével. 
		<li>MÓDOSÍTÁSOK :
		<ul>
		<li>- ... </li>
		</ul>
		</ul>
		</div>
		<div class="normNote">
		 Az SVG_OBJECT osztály tagváltozói:<br>
		<ul>
		<li>- private $name = a létrehozandó SVG objektum neve </li>
		<li>- private $type = a létrehozandó SVG typusa [g/defs/cicrcl/rect/...] </li>
		<li>- private $code = a létrehozandó SVG objektum kódja, igazából az alapkoncepcióban nem
		HTML, vag XML elemekként kezelem az SVG objektumokat, csak szövegként.</li>
		<li>- private $id = a létrehozandó SVG objektum CSS id-je </li>
		<li>- private $class = a létrehozandó SVG objektum CSS class-a </li>
		</ul>
			Ezeknek a változóknak kell valamilyen értéket adni a konstruktorban. Nyilván
			a type ami kötelezően megadandó, a többit csak az esetleges JavaScript felhasnálás,
			illetve a formázások alkalmazása miatt érdemes megadni.
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function __construct($params = "")</h4>
		<div class="subFunc">
			A konstruktor, egy inicializáló objektumot küldhetünk be.
			Ha nincs inicializációs objektum egy alapértelmezett SVG:g
			objektumot küldünk vissza.<br>
		</div>
		<div class="normNote">
			Végigmegyünk a paraméter lehetséges elemein, és beaálítjuk azokat ha voltak,
			ha hiányoznak, akkor akapértelmezett értéket adun nekik.
		</div>
		<div class="debugNote">DEBUG:<br/>
			$this-&gt;name = "group" .  rand(1,9999);
		<br/></div>
		<div class="debugNote">DEBUG:<br/>
			$this-&gt;class = "svg-g-std-" .  rand(1,9999);
		<br/></div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getCODE()</h4>
		<div class="subFunc">
			Az objektum kódjának visszadása.
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function setCODE($cd)</h4>
		<div class="subFunc">
			Az obnjektum kódjának beállítása.
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function addObject($svgObj)</h4>
		<div class="subFunc">
			Ez a függvény a már meglévő svg objektum kódjába szúrja be egy
			paraméterként kapott másikobjetum mkódját! 
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOneSTDGroup($params = "")</h4>
		<div class="subFunc">
			Alap svg:g objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOneSTDFilter($params = "")</h4>
		<div class="subFunc">
			Alap svg:filter objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOneSTDDefs($params = "")</h4>
		<div class="subFunc">
			Alap svg:Defs objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOneCircle($params = "")</h4>
		<div class="subFunc">
			Alap svg:Circle objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOneEllipse($params = "")</h4>
		<div class="subFunc">
			Alap svg:Ellipse objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOneLine($params = "")</h4>
		<div class="subFunc">
			Alap svg:line objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOnePolygon($params = "")</h4>
		<div class="subFunc">
			Alap svg:polygon objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOneRect($params = "")</h4>
		<div class="subFunc">
			Alap svg:rect objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOnePath($params = "")</h4>
		<div class="subFunc">
			Alap svg:path objektum létrehozása
		</div>
		<h4 class="funcNm">SVG_OBJECT.php - public function getOneDecisionShape($params = "")</h4>
		<div class="subFunc">
			 Ez a függvény egy hastzögletű elemet generál, ami egy szöveg elemet tartalmaz,
			és egy döntési lehetőséget tartalmaz.
			Alapértelmezésben egy YES, és egy NO ága van.
		</div>
	</div>
</div>


<script type="text/javascript" 
src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script>
	$(".closeNext").click(function(){
		var cim = $(this).next(".toBeClosed");
		cim.slideToggle();
	});
</script>
</body>
</html>
