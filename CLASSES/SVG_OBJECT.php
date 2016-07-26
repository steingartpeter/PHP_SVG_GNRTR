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
			
		}else{
			if(isset($params['name']) && $params['name'] !== "" ){
				$this->name = $params['name'];
			}else{
				$this->name = "group" .  rand(1,9999);
			}
			
			if(isset($params['name']) && $params['name'] !== "" ){
				$this->name = $params['name'];
			}else{
				$this->name = "group" .  rand(1,9999);
			}
			
			if(isset($params['name']) && $params['name'] !== "" ){
				$this->name = $params['name'];
			}else{
				$this->name = "group" .  rand(1,9999);
			}
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
	
}

?>