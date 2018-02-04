# PHP_SVG_GNRTR

Ennek a PHP projektnek az a célja, hogy vizuális elemeket generáljon, 
aminek a segétségével vizuális dokumetáció készíthető a projektekről.
Első lépésben egy SVG shape generátort kell elkőszéteni.
Itt egy paraméterobjektum alapján generál szöveget a megfelelő
PHP osztály, ami benne lesz a weblapban.

Ha ez megoldható, és hatékonynak bizonyul, akkor megnézzük, hogy 
építhető-e komplex grafikoin ezekből az elemekből. Ha igen akkor 
tovább léphetünk. 
A következő lépés az lenne, hogy egy dokumentációs
metanyelvet dolgozzunk ki. Vagyis egységes, átlátható, áttkeinthető
[szabványos] grafikus megjelenítést hozzunk l�étre a dokumentációhoz.
Ez lesz agrafikus metanyelv (egységes jelek, elemek, kapcsolatok, stb
mint egy kvázi UML.)
Ezután meg kell teremteni az ez alatt létező szöveges metanyelvet, 
ami mondjuk egy JSON file lehet. Ennek a szövegtartalma, és struktúrája
két szempontnak kell megfeleljen:
 - a már megírt kódból/dokumentációből előállíthatónak kell lennie
 - az itteni PHP kód által értelmezhetőnek kell lennie
Ha ez siker�l, akkor a fejlesztések során, a következő mentet lehet követni:
- a kód megírása során a dokumentáció benne lesz a fejlesztői változatban, 
- ha a kód átment a teszten, akkor excellel legeneráljuk a hozzá tartozó HTML
alapú szöveges dokuemntációt. Ez egyből használható.
Másrészről, valamilyen köztes programmal szintén legenráljuk az itteni 
grafikus generátor számára érthető JSON filet, és ezt csak megadjuk a 
generátorfüggényeknek, amik létrehozzák a vizuális dokumentációt.

A standard SVG elemek kódját az INKSCAPE programból vesszük, mert ott
grafikusan megrajzoljható amire szükségünk lesz, majd SVG fromátumban 
mentve hozzáférünk a szövegtartalomhoz, ami a rajzot leírja.






