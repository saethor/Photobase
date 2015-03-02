# Photobase

## Verkefni 3 (form og sessions, 20% af heildareinkunn)

###Verkefnið felst í að gera tvennskonar form:

1. Innskráningarform (login) með notendanafni og lykilorð.
2. Skráningarform (signup) nafn, netfang, lykilorð, Retype password, password strength
checker osfrv.

Eftir að notandi hefur skráð sig inn á hann að fá sitt eigið vefsvæði þar sem hann á að geta séð allar sínar myndir(filterað á mismunandi hátt) t.d. nýjustu myndirnar, myndaflokkar, nýlega skoðað, osfrv.
Bættu við myndum og upplýsingum handvirkt í gagnagrunninn til að vinna með(tökum fyrir upload í næsta verkefni). Ekki er gert ríð fyrir email útfærslu sbr. í kafla 5

###Formin þurfa að hafa eftirfarandi:

1. Formin uppsetning og framsetning skv. lýsingu (HTML, CSS, JavaScript, PHP) (3%)
2. PHP Validation. sjá PHP Solution 5-1. Bættu við fleiri validation aðferðum, sjá t.d. form kaflann bls. 291, (sanitize lausnir) í bókinn Beginning PHP from Novice to Professional. (4%)
3. Sticky form. Ef það kemur upp villumelding við submit þá er input notanda birt aftur í form með php sbr. PHP Solution 5-2. Má einnig útfæra með JavaScript (localStorage). (3%)
4. Hafðu amk einn Multiple-Choice valkost í skráningarforminu þínu; radio button, check box, drop-down, multiple-choice. Ein hugmynd er t.d. hafa spurninguna „Hvar fréttir þú af þessari heimasíðu með drop-box“ Sjá Solution 5-6 til 5-10. (2%)
Login og logout (3%)
5. 
  * Búið til logout takka sem eyðir session sbr. PHP Solution 9-5
  * Session á að eyðast eftir ákveðin tíma (óvirkur) sbr. PHP Solution 9-9
  * Ef session er ekki til eða útrunnið á notandi að færast á login síðu.
6. Mitt Svæði, (síðan eftir login) sýnir profile notanda úr gagnagrunni. Á vefsvæðinu á að vera hægt að sjár myndir og myndaflokka raðað á ákveðinn máta t.d. eftir dagsetningum (nýjasta myndin) og nýlega skoðað. Það þarf ekki á þessum tíma að huga að framsetningu mynda eða myndvinnslu. Ekki er gert ráð fyrir neinum upload fídusum. (5%)
Námsmat:
Gefið er fullt fyrir fullnægjandi lausn, hálft fyrir lausn sem er ábótavant en virkar.
Lesefni:
• Kafli 5 Forms
• Kafli 9 Using Sessions to Restrict Access
• PHP.NET Manual http://www.php.net/manual/en/book.session.php
• Sjá kafla 18, bls. 366 Session Handling í PHP and MySQL from Novice to Professional

## Verkefni 2 - Kafli 4 (20%)

Við munum vinna áfram með það sem við gerum hér í næstu verkefnum. Búðu til myndavef sem geymir myndagagnagrunn ( t.d. flickr.com) , við munum notast við einfaldan ljósmyndagagnagrunn sem þú þarft að búa til og setja í. Notaðu eitthvað framework til að vinna útfrá t.d. Foundation, Bootstrap, eða Boilerplate.

1. Hlutaðu niður vefinn sem hefur að geyma header, nav og footer. Notaðu til þess include (sleppa Solution 4-8 á bls 95) sem kynntir eru í 4.kafla (2%)
2. Búðu til og stílaðu forsíðuna. Settu smá inngangstexta og myndir, ( CSS framework ) (6%)
3. footer - Búðu til copyright með php sbr. Lausn í kafla 4 (1%)
4. nav – búðu til menu og notaðu php til að sýna á hvaða síðu notandi er
staddur. (2%)
5. `<title>` notaðu php fyrir title sbr. Lausn í kafla 4 (1%)
6. header - búðu til random image (ekki úr gagnagrunni), banner fyrir header, láttu fyrirsögn `<h1>` breytast með myndum. Hvernig kemur þú í veg fyrir að mynd birtist tvisvar eða oftar í röð? (2%).
7. Keyrðu meðfylgjandi gagnagrunns skript sem býr til gagnagrunninn (6%). 
  * Settu bæði php-skjölin í sömu möppu undir htdocs (rót).
  * Notaðu **test_page.php** til að setja gögn í grunnninn
  * í skránni **class.datamanager.php** eru meðal annara föllin: **categoryList()**, **newImageInfo()**

Útbúðu vefsíðu (má nota test_page.php) sem nýtir þessi föll til að gera það sem þau eiga að gera; birta lista af categories og inserta nýrri mynd.

Námsmat: Gefið er aðeins fyrir þá liði sem eru leystir á fullnægjandi hátt
