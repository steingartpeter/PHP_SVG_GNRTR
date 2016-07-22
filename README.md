# PHP_SVG_GNRTR

Ennek a PHP projektnek az a c�lja, hogy vizu�lis elemeket gener�ljon, 
aminek a seg�ts�g�vel vizu�lis dokumet�ci� k�sz�thet� a projektekr�l.
Els� l�p�sben egy SVG shape gener�tort kell elk�sz�teni.
Itt egy param�terobjektum alapj�n gener�l sz�veget a megfelel�
PHP oszt�ly, ami benne lesz a weblapban.

Ha ez megoldhat�, �s hat�konynak bizonyul, akkor megn�zz�k, hogy 
�p�thet�-e komplex grafikoin ezekb�l az elemekb�l. Ha igen akkor 
tov�bb l�phet�nk. A k�vetkez� l�p�s az lenne, hogy egy dokument�ci�s
metanyelvet dolgozzunk ki. Vagyis egys�ges, �tl�that�, �ttkeinthet�
[szabv�nyos] grafikus megjelen�t�st hozzunk l�tre a dokument�ci�hoz.
Ez lesz agrafikus metanyelv (egys�ges jelek, elemek, kapcsolatok, stb
mint egy kv�zi UML.)
Ezut�n meg kell teremteni az ez alatt l�tez� sz�veges metanyelvet, 
ami mondjuk egy JSON file lehet. Ennek a sz�vegtartalma, �s strukt�r�ja
k�t szempontnak kell megfeleljen:
 - a m�r meg�rt k�db�l/dokument�ci�b�l el��ll�that�nak kell lennie
 - az itteni PHP kd �ltal �rtelmezhet�nek kell lennie
Ha ez siker�l, akkor a fejleszt�sek sor�n, a k�vetkez� mentet lehet k�vetni:
a k�d meg�r�sa sor�n a dokument�ci� benne lesz a fejleszt�i v�ltozatban, 
ha a k�d �tment a teszten, akkor excellel legener�ljuk a hozz� tartoz� HTML
alap� sz�veges dokuemnt�ci�t. Ez egyb�l haszn�lhat�.
M�sr�szr�l, valamilyen k�ztes programmal szint�n legenr�ljuk az itteni 
grafikus gener�tor sz�m�ra �rthet� JSON filet, �s ezt csak megadjuk a 
gener�torf�gg�nyeknek, amik l�trehozz�k a vizu�lis dokument�ci�t.

A standard SVG elemek k�dj�t az INKSCAPE programb�l vessz�k, mert ott
grafikusan megrajzoljhat� amire sz�ks�g�nk lesz, majd SVG from�tumban 
mentve hozz�f�r�nk a sz�vegtartalomhoz, ami a rajzot le�rja.






