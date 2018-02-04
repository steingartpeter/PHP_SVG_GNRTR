//<M>
//×-
//@-FILENÉV   : BOILER_PLATE - mainApp.js-@
//@-SZERZŐ    : AX07057-@
//@-LÉTREHOZVA: 2017. dec. 24.-@
//@-FÜGGŐSÉGEK:
//×-
// @-- RQRD_FILE01.js-@
// @-- RQRD_FILE02.js-@
// @-- RQRD_FILE03.js-@
// @-- RQRD_FILE04.js-@
//-@
//-×
//-@
//@-LEÍRÁS    :
//Ez az javascript file készült arra a feladatra, hogy ...
//@-MÓDOSÍTÁSOK :
//×-
// @-- ... -@
//-×
//-×
//</M>


//<nn>
// A teljes javascrip alkalmazást tartlamazó objektum.<br/>
// Érdemes neki olyan nevet adni ami az aktuális projektet írja le.<br/>
// Ennek az objektumnak az a szerepe, hogy a kódunkat elkülönítse a globális névtértől, 
// így az esetleges névütközéseknek lejét vehetjük.
//</nn>
var mainApp = mainApp || {};
//<nn>
// A document.ready függvényben a jQueryn keresztül meghívhatjuk az inicializációs kódunkat.
//</nn>
$(function(){
	console.log("OK JQ initialized!");
	init();
});

mainApp.showModal = a001;


function init(){
//<SF>
// 2017. dec. 24.<br>
// Az incializációs függvény, ami meghívódik a jQuery miatt a lap ready() fügvényével.<br>
// PARAMÉTEREK:
//×-
// @- nincsenek paraméeterei -@
//-×
//MÓDOSÍTÁSOK:
//×-
// @-- ... -@
//-×
//</SF>	
	
	
	//<nn>
	//A gombok jQuery gombosítása.
	//</nn>
	$("button").button();
	
	//<nn>
	//A modális ablakok inicializálása.
	//Ez egy a lapon lapuló DIV-en alapul, amiből egy dailog() elemet csinálunk.
	//</nn>
	$(".modal-base").dialog({
		modal: true,
		autoOpen: false,
		show:{
			effect: "blind",
			duration: 600
		},
		hide:{
			effect: "explode",
			duration: 300
		},
		close:{
			effect: "explode",
			duration: 300
		},
		buttons: {
			Ok: function(){
				$(this).dialog("close");
			}
		},
		position: { my: "top", at: "top+150"}
	});
	
	
	console.log("Inicializítion done ...");
}

//+-----------------------------------------------------------------------------+
//|¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤|
//|                               SEGÉD FÜGGVÉNYEK                              |
//|¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤¤|
//+-----------------------------------------------------------------------------+

function a001(type,msg){
//<SF>
//Egy modális ablak megynitása.
//Paraméterként a modális ablak tipusát küldjük be.
//</SF>
	console.log("type: " + type);
	//<nn>
	//Ha nem volt megadott tipus, akkor üres stringet teszünk bele, hogy később ezt
	//detektálva alapértelmezett értéket használhassunk.
	//</nn>
	var tp = type || "";
	
	//<nn>
	//Szerzünk egy referenciát a div-re, ami a modális ablakot tárolja.
	//</nn>
	var modW = $("#modalWndw");
	
	//<nn>
	//A tipustól függően megjelenítjük a modális ablakunkat.
	//Alapvetően 3 dolgot kell tenni:
	// - A megefelelő CSS osztályt a divhez adni, és anem megfelelőket eltávolítani.
	// - Beállítani az üzenetet a html tulajdonságba (icon).
	// - a modW.dialog("open") függvényhívással megjeleníteni az ablakot.
	//</nn>
	if (tp == ""){
		//<nn>
		//A nem megfelelő CSS osztályokat eltávolítjuk a modális ablakot hordozó DVI ből, 
		//a szükségeset pedig hozzáadjuk.
		//</nn>
		modW.removeClass("danger-mod");
		modW.removeClass("warning-mod");
		modW.removeClass("everok-mod");
		modW.removeClass("info-mod");
		//<nn>
		//Ha volt msg paraméter, akkor azt a modális ablak üzenetébe írjuk, 
		//ha nem, akkor egy standard üzenetet küldünk.
		//</nn>
		if(msg == ""){
			modW.html("Sima lap modális ablak?");
		}else{
			modW.html(msg);
		}
		//<nn>
		//A .diaog("open") függvényhívással megnyitjuk a modális ablakot.
		//</nn>
		modW.dialog("open");
	}else if (tp == "dng"){
		//<nn>
		//tp = dng a veszélyt jelző modásli ablak.
		//</nn>
		modW.removeClass("warning-mod");
		modW.removeClass("everok-mod");
		modW.removeClass("info-mod");
		modW.addClass("danger-mod");
		var html = '<span class="ui-icon ui-icon-gear"></span>';
		if(msg == ""){
			html += "Ez egy SÚLYOS figyelmeztetés!";
		}else{
			html += msg;
		}
		modW.html(html);
		modW.dialog("open");
	}else if (tp == "wrn"){
		//<nn>
		//tp = wrn a figyelmeztetést jelző modális ablak.
		//</nn>
		modW.removeClass("danger-mod");
		modW.removeClass("everok-mod");
		modW.removeClass("info-mod");
		modW.addClass("warning-mod");
		var html = '<span class="ui-icon ui-icon-alert"></span>';
		if(msg == ""){
			html += "Ez egy figyelemfelhívó üzenet :)";
		}else{
			html += msg;
		}
		modW.html(html);
		modW.dialog("open");
	}else if (tp == "eok"){
		//<nn>
		//tp = wrn a figyelmeztetést jelző modális ablak.
		//</nn>
		modW.removeClass("danger-mod");
		modW.removeClass("warning-mod");
		modW.removeClass("info-mod");
		modW.addClass("everok-mod");
		var html = '<span class="ui-icon ui-icon-alert"></span>';
		if(msg == ""){
			html += "Ez egy figyelemfelhívó üzenet :)";
		}else{
			html += msg;
		}
		modW.html(html);
		modW.dialog("open");
	}else if (tp == "info"){
		//<nn>
		//tp = wrn a figyelmeztetést jelző modális ablak.
		//</nn>
		modW.removeClass("danger-mod");
		modW.removeClass("warning-mod");
		modW.removeClass("everok-mod");
		modW.addClass("info-mod");
		var html = '<span class="ui-icon ui-icon-alert"></span>';
		if(msg == ""){
			html += "Ez egy figyelemfelhívó üzenet :)";
		}else{
			html += msg;
		}
		modW.html(html);
		modW.dialog("open");
		$(modW).parent().addClass("info-mod");
	}
		
};



