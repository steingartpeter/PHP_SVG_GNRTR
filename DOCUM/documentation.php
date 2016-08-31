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
		<h4 class="funcNm">A projekt általános leírása</h4>
		<div class="subFunc">
			A projekt célja, hogy valamilyen köztes információhordozó (standard struktúrával, pl. JSON file) alapján, automatikusan generáljon a PHP kód a szerveren SVG tartalmú HTML lapokat.<br>
			Ezeket lehetne aztán vizuális dokumentáció készítésre használni.
			Ez a módszer első osztályú lenne arra, hogy gyorsan, és hatékonyan
			készítsek áttekinthető ábrákat például logikai folyamatokról, vagy programfutási
			sémákról.<br/> A projekt szükségességét azok az esetek indokolják, amikor egy-egy régi
			projekt karbantartása esetén, esetleg hiányos dokumentálásom miatt nagyon nehéz
			újra felidézni a program futásának részleteit. Ilyenkor elhúzódhat a dolog,
			és egy-egy ilyen grafikus ábra nagyban növelheti a hatékonyságot. <br/>
			Szintén ismert az az eset is, hogy egy-egy logikai felépítésen kell változtatni,
			például a Nissan forecast SAP query döntési logikáján. Ilyenkor a laikusokkal való
			együttműködést nagyban segítheti egy megfelelő logikai ábra, amin a döntéseik
			folyamatát egyszerűen végig követhetik.
		</div>
		<h4 class="funcNm">A projekt struktúrája</h4>
		<div class="subFunc">
			Pillanatnyilag a projekt két PHP class-ra épül.<br/>
			Az első az SVG objektumokat reprezentáló osztály: <a href="#SVG_OBJECT">SVG_OBJECT</a>.
			Ennek a feladata, hogy kezelje az SVG objektumokat, jelesül főképpen azok kódját. Jelenleg a megvalósítás elég
			egyszerű, nem igazán objektumorientált, viszonylag alacsony szintű. Az SVG objektumokat olyan objektumoknak
			tételezi, melyek rendelkeznek pár tulajdonsággal, de alapvetően a code, nevű tulajdonság határozza meg őket, ami
			valóban az SVG objektumok HTML/SVG kódját tartalmazza, és egyből egy-egy HTML lapba szúrható. Maguknak a
			tulajdonságoknak a megvalósulása sztring manipulációval történik. Pillanatnyilag még az sem kiforrott, hogy milyen
			mélységben legyenek az SVG elemek felbontva típusokra. <br/>Természetesen az nem okoz problémát, hogy egy rect,
			vagy egy cicrcle elem külön objektumpéldány legyen, de a meta elemek, defs, lineargradien, stb már problémásabbak.
			Röviden, ennek az osztálynak a feladata, hogy SVG objektumokat állítson elő, egy bemenő paraméterobjektum
			elemeinek megfelelően. Ezeket az SVG objektumokat manipulálni is tudja, illetve egymásba illeszteni őket, 
			majd az így létrejött új, összetett objektumot visszaadni.<br/>
			<br/><hr><br/>
			A projekt másik osztálya PAGE_GNRTR class, (a FILE_GENERATOR.php fileban – design hiba, gyenge tervezés ).
			Ez az osztály szerepét tekintve arról gondoskodik, hogy az SVG generátor osztály egy példányától SVG objektumokat
			kér, majd ezeket egy általa generált weblap kódjába illeszti.<br/>Az első feladata, hogy egy lap létrehozásakor
			létrehoz egy rootSVG objektumot, ez történik a konstruktorban.<br/>Ez a <code>createRootSVG</code>
			tagfüggvénye meghívásával történik. A createRootSVG függvényben példányosítjuk a másik osztályt, a
			SVG_OBJECT osztályt, aminek során annak konstruktorát már egy paraméterobjektummal hívjuk, így egy
			SVG objektumot kapunk, ami egy alapszín hátterű, pontozott hálót jelent. A háló a projekt fontos eleme, 
			64x64-es négyzetekből áll. Ezeket relatív koordinátarendszerként szeretném használni, mind pozicionálásra,
			mind méretezésre.<br/> Jelen pillanatban, a createRootSVG függvény csak létrehozza a gyökér SVG objektumot,
			de nem adja hozzá az oldalhoz a kódját.<br>Az SVG objektum akkor kerül hozzáadásra, amikor annak teljes 
			tartalma a szerveren legenerálódót.<br>Vagyis egy-egy céloldal PHP függvények hívásával generáltatja le 
			a saját kódját a szerveren.  Emiatt a PAGE_GNRTR osztály egy-egy függvény kell jelenleg, hogy előre megírt kód
			alapján generáljon le egy-egy oldalt. A későbbiekben ezt az osztály ki fogom bővíteni egy olyan függvénnyel, ami
			egy megfelelő specifikáció alapján készített adathalmazból (mondjuk JSON file) generál dinamikusan tartalmat.<br>
			Sajnos már most látom, hogy ennek vannak hiányosságai. A SVG-OBJECT class-t meg kellett volna hagyni vmi üres
			dolognak pár általános jellemzővel, és kellene egy plusz SVG GENERÁTOR class, ami nincs.
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
			Ez még formálódik.<br/>
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
