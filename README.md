# PHP_SVG_GNRTR

Ennek a PHP projektnek az a célja, hogy vizuális elemeket generáljon, 
aminek a segítségével vizuális dokumetáció készíthetõ a projektekrõl.
Elsõ lépésben egy SVG shape generátort kell elkészíteni.
Itt egy paraméterobjektum alapján generál szöveget a megfelelõ
PHP osztály, ami benne lesz a weblapban.

Ha ez megoldható, és hatékonynak bizonyul, akkor megnézzük, hogy 
építhetõ-e komplex grafikoin ezekbõl az elemekbõl. Ha igen akkor 
tovább léphetünk. A következõ lépés az lenne, hogy egy dokumentációs
metanyelvet dolgozzunk ki. Vagyis egységes, átlátható, áttkeinthetõ
[szabványos] grafikus megjelenítést hozzunk létre a dokumentációhoz.
Ez lesz agrafikus metanyelv (egységes jelek, elemek, kapcsolatok, stb
mint egy kvázi UML.)
Ezután meg kell teremteni az ez alatt létezõ szöveges metanyelvet, 
ami mondjuk egy JSON file lehet. Ennek a szövegtartalma, és struktúrája
két szempontnak kell megfeleljen:
 - a már megírt kódból/dokumentációból elõállíthatónak kell lennie
 - az itteni PHP kd által értelmezhetõnek kell lennie
Ha ez sikerül, akkor a fejlesztések során, a következõ mentet lehet követni:
a kód megírása során a dokumentáció benne lesz a fejlesztõi változatban, 
ha a kód átment a teszten, akkor excellel legeneráljuk a hozzá tartozó HTML
alapú szöveges dokuemntációt. Ez egybõl használható.
Másrészrõl, valamilyen köztes programmal szintén legenráljuk az itteni 
grafikus generátor számára érthetõ JSON filet, és ezt csak megadjuk a 
generátorfüggényeknek, amik létrehozzák a vizuális dokumentációt.

A standard SVG elemek kódját az INKSCAPE programból vesszük, mert ott
grafikusan megrajzoljható amire szükségünk lesz, majd SVG fromátumban 
mentve hozzáférünk a szövegtartalomhoz, ami a rajzot leírja.






