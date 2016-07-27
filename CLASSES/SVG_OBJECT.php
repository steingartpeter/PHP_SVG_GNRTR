<?php
//<M>
//×-
//@-FILENÉV   : PROJECT_NAME - SVG_OBJECT.php-@
//@-SZERZŐ    : AX07057-@
//@-LÉTREHOZVA:  2016. júl. 26.-@
//@-FÜGGŐSÉGEK:
//×-
// @-- Alapfile nincsenek függőségek -@
//-@
//-×
//-@
//@-LEÍRÁS    :
//Ez a PHP kód azt a feladatot látja el ...
//@-MÓDOSÍTÁSOK :
//×-
// @-- ... -@
//-×
//-×
//</M>	
class SVG_OBJECT{
	
	private $name = "";
	private $type = "";
	private $code = "";
	private $id = "";
	private $class = "";
	
	public function __construct($params = ""){
	//<SF>
	//A konstruktor, egy inicializáló objektumot küldhetünk be.
	//</SF>
		if($params == ""){
			$this->name = "group" .  rand(1,9999);
			$this->type = "g";
			$this->id = "svg-grp-" . rand(1,9999);
			$this->code = "<g id=\"" . $this->id . "\">";
			$this->class = "baseSvgGrp";
			
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
				//$this->name = "group" .  rand(1,9999);
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
				//$this->class = "svg-g-std-" .  rand(1,9999);
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
		$cd2 = substr($this->code, $poz, strlen($this->code));
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
		return $this;
	}
	
	public function getOneCircle($params = ""){
	//<SF>
	//Alap svg:Circle objektum létrehozása
	//</SF>
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
	
	
	
}

?>