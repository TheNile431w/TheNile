<?php

include("cmpsc431w/Header.php");

// print_r(Person::getAttributeList());

$c = new Category(array(
	"name" => "All",
	"description" => "All Products"));

$c1 = new Category(array(
	"name" => "Fashion",
	"description" => "Egyptian Fashion Items",
	"parent" => "All"));

$c2 = new Category(array(
	"name" => "Clothing",
	"description" => "Egyptian Apparel",
	"parent" => "Fashion"));
$c3 = new Category(array(
	"name" => "Jewelry",
	"description" => "Fancy Egyptian Jewelry",
	"parent" => "Fashion"));
$c4 = new Category(array(
	"name" => "Footwear",
	"description" => "Fancy Egyptian Footwear (and sandals)",
	"parent" => "Fashion"));
$c5 = new Category(array(
	"name" => "Sandals",
	"description" => "Sandals for your everyday use",
	"parent" => "Footwear"));
$c6 = new Category(array(
	"name" => "Shoes",
	"description" => "Egyptian shoes",
	"parent" => "Footwear"));

$c7 = new Category(array(
	"name" => "Necklaces",
	"description" => "Egyptian Necklaces",
	"parent" => "Jewelry"));
$c8 = new Category(array(
	"name" => "Rings",
	"description" => "Egyptian rings",
	"parent" => "Jewelry"));
$c9 = new Category(array(
	"name" => "Earings",
	"description" => "Egyptian Earings",
	"parent" => "Jewelry"));
$c10 = new Category(array(
	"name" => "Electronics",
	"description" => "Electronics",
	"parent" => "All"));

$c11 = new Category(array(
	"name" => "Entertainment",
	"description" => "Egyptian Entertainment",
	"parent" => "Electronics"));

$c12 = new Category(array(
	"name" => "Music",
	"description" => "Egyptian Folk Music",
	"parent" => "Entertainment"));
$c13 = new Category(array(
	"name" => "Movies",
	"description" => "Egyptian Movies",
	"parent" => "Entertainment"));
$c14 = new Category(array(
	"name" => "Art",
	"description" => "Egyptian Art",
	"parent" => "All"));
$c15 = new Category(array(
	"name" => "Sculptures",
	"description" => "Egyptian Sculptures",
	"parent" => "Art"));

$c16 = new Category(array(
	"name" => "Paintings",
	"description" => "Egyptian Paintings",
	"parent" => "Art"));

$c17 = new Category(array(
	"name" => "Pottery",
	"description" => "Egyptian Pottery",
	"parent" => "Art"));
$c18 = new Category(array(
	"name" => "Outdoors",
	"description" => "Egyptian Outdoor Items",
	"parent" => "All"));
$c19 = new Category(array(
	"name" => "Toys",
	"description" => "Every days toys!",
	"parent" => "All"));
$c20 = new Category(array(
	"name" => "Food",
	"description" => "Egyptian food",
	"parent" => "All"));
echo("\n\n\nHERE\n\n\n");

// $p1 = new Purchase(Purchase::scrape("http://www.amazon.com/Ajwa-Dates-Egyptian-Valley-Delicious/dp/B012HW8F82/ref=sr_1_7_a_it?ie=UTF8&qid=1458679725&sr=8-7&keywords=Egyptian+food", "johnDoe"));

// new PartOf(array(
// 	"category" => "Food",
// 	"pid" => $p1->get("pid")));
/*
$p2 = new Purchase(Purchase::scrape("http://www.amazon.com/ToySmith-Dig-Play-Egyptian-Tomb/dp/B000LOBORS/ref=sr_1_2?ie=UTF8&qid=1458679272&sr=8-2&keywords=Egyptian+toys", "tutankamon"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p2->get("pid")));

$p3 = new Purchase(Purchase::scrape("http://www.amazon.com/Safari-Historical-Figurines-Tutankhamen-Hieroglyph/dp/B000GYSZES/ref=sr_1_1?ie=UTF8&qid=1458679272&sr=8-1&keywords=Egyptian+toys", "kevinCohen"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p3->get("pid")));

$p4 = new Purchase(Purchase::scrape("http://www.amazon.com/GeoCentral-DGMY-Egypt-Mummy-Excavation/dp/B004GUSDAO/ref=sr_1_3?ie=UTF8&qid=1458679272&sr=8-3&keywords=Egyptian+toys", "kevinCohen"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p4->get("pid")));

$p5 = new Purchase(Purchase::scrape("http://www.amazon.com/Plastic-Soldiers-Ancient-Egyptian-Infantry/dp/B00HYJY23Q/ref=sr_1_4?ie=UTF8&qid=1458679272&sr=8-4&keywords=Egyptian+toys", "nickPatel"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p5->get("pid")));

$p6 = new Purchase(Purchase::scrape("http://www.amazon.com/Oasis-supply-Lustre-Egyptian-Super/dp/B0000VLH8S/ref=sr_tnr_p_11_6492276011_1_a_it?ie=UTF8&qid=1458679742&sr=8-11&keywords=Egyptian+food", "kevinCohen"));


new PartOf(array(
	"category" => "Food",
	"pid" => $p6->get("pid")));


$p7 = new Purchase(Purchase::scrape("http://www.amazon.com/EGYPTIAN-Adventure-Featuring-Decorative-Accessories/dp/B00VSEY94U/ref=sr_1_5?ie=UTF8&qid=1458679272&sr=8-5&keywords=Egyptian+toys","kevinCohen"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p7->get("pid")));

$p8 = new Purchase(Purchase::scrape("http://www.amazon.com/Hen-night-Personality-exaggerated-modelling-necklace/dp/B01A917TCQ/ref=sr_1_1?ie=UTF8&qid=1458679165&sr=8-1&keywords=egyptian+earings", "kevinCohen"));

new PartOf(array(
	"category" => "Necklaces",
	"pid" => $p8->get("pid")));


$p9 = new Purchase(Purchase::scrape("http://www.amazon.com/Ancient-Egypt-Egyptian-Figurines-EG-8/dp/B00HCHWNVS/ref=sr_1_6?ie=UTF8&qid=1458679272&sr=8-6&keywords=Egyptian+toys
", "google"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p9->get("pid")));


$p10 = new Purchase(Purchase::scrape("http://www.amazon.com/Real-Spark-Boomerange-Primitive-Statement/dp/B01C5GUQ6E/ref=sr_1_2?ie=UTF8&qid=1458679165&sr=8-2&keywords=egyptian+earings", "yusan"));

new PartOf(array(
	"category" => "Necklaces",
	"pid" => $p10->get("pid")));


$p11 = new Purchase(Purchase::scrape("http://www.amazon.com/LEGO-Scooby-Doo-Museum-Mystery-Building/dp/B00WHZDIG4/ref=sr_1_7?ie=UTF8&qid=1458679272&sr=8-7&keywords=Egyptian+toys", "pepsico"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p11->get("pid")));

// $p12 = new Purchase(Purchase::scrape("http://www.amazon.com/Medium-CLEOPATRA-ORIENTAL-NECKLACE-B20/dp/B007FQLY7A/ref=sr_1_1?ie=UTF8&qid=1458681021&sr=8-1&keywords=egyptian+necklace", "kevinCohen"));

// new PartOf(array(
// 	"category" => "Necklaces",
// 	"pid" => $p12->get("pid")));

$p13 = new Purchase(Purchase::scrape("http://www.amazon.com/Thames-Kosmos-Classic-Science-Archaeology/dp/B001ALLMX2/ref=sr_1_8?ie=UTF8&qid=1458679272&sr=8-8&keywords=Egyptian+toys", "jorgeJim"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p13->get("pid")));

$p14 = new Purchase(Purchase::scrape("http://www.amazon.com/Girl-Era-Crystal-Fashion-Necklaces/dp/B0130TRNGG/ref=sr_1_4?ie=UTF8&qid=1458681021&sr=8-4&keywords=egyptian+necklace", "yusan"));

new PartOf(array(
	"category" => "Necklaces",
	"pid" => $p14->get("pid")));

$p15 = new Purchase(Purchase::scrape("http://www.amazon.com/Scientific-Explorer-Amazing-Mummies-Model/dp/B000BL5Y5Y/ref=sr_1_9?ie=UTF8&qid=1458679272&sr=8-9&keywords=Egyptian+toys", "jorgeJim"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p15->get("pid")));


$p16 = new Purchase(Purchase::scrape("http://www.amazon.com/Pharaoh-Ankh-Necklace-Positive-Egyptian/dp/B009FIF7X8/ref=sr_1_8?ie=UTF8&qid=1458681021&sr=8-8&keywords=egyptian+necklace", "jorgeJim"));

new PartOf(array(
	"category" => "Necklaces",
	"pid" => $p16->get("pid")));


$p17 = new Purchase(Purchase::scrape("
http://www.amazon.com/LEGO-Minifigures-Egyptian-Warrior-Construction/dp/B00R8C448M/ref=sr_1_12?ie=UTF8&qid=1458679272&sr=8-12&keywords=Egyptian+toys", "alexaLewis"));

new PartOf(array(
	"category" => "Toys",
	"pid" => $p17->get("pid")));


$p18 = new Purchase(Purchase::scrape("http://www.amazon.com/Luxury-Egyptian-Costume-Jewelry-Necklace/dp/B011RYYCDS/ref=sr_1_11?ie=UTF8&qid=1458681021&sr=8-11&keywords=egyptian+necklace", "jorgeJim"));

new PartOf(array(
	"category" => "Necklaces",
	"pid" => $p18->get("pid")));


$p19 = new Purchase(Purchase::scrape("http://www.amazon.com/Packs-Natural-Egyptian-Molokhia-Cooking/dp/B015LYHVMY/ref=sr_1_2_a_it?ie=UTF8&qid=1458679666&sr=8-2&keywords=Egyptian+food", "jorgeJim"));

new PartOf(array(
	"category" => "Food",
	"pid" => $p19->get("pid")));


$p20 = new Purchase(Purchase::scrape("http://www.amazon.com/Horus-Ankh-Pendant-Chain-Necklaces/dp/B00QMIWAJS/ref=sr_1_10?ie=UTF8&qid=1458681021&sr=8-10&keywords=egyptian+necklace", "kevinCohen"));

new PartOf(array(
	"category" => "Necklaces",
	"pid" => $p20->get("pid")));


$p21 = new Purchase(Purchase::scrape("http://www.amazon.com/Al-Wadi-Foul-Moudammas-Egyptian/dp/B004P0OU4I/ref=sr_1_3_a_it?ie=UTF8&qid=1458679688&sr=8-3&keywords=Egyptian+food
", "jorgeJim"));

new PartOf(array(
	"category" => "Food",
	"pid" => $p21->get("pid")));

$p22 = new Purchase(Purchase::scrape("http://www.amazon.com/Tagoo-Womens-Rhinestone-Turquoise-Earrings/dp/B017IGZIS2/ref=sr_1_19?ie=UTF8&qid=1458679165&sr=8-19&keywords=egyptian+earings", "yusan"));

new PartOf(array(
	"category" => "Earings",
	"pid" => $p22->get("pid")));

$p23 = new Purchase(Purchase::scrape("http://www.amazon.com/Castania-Egyptian-Small-Seeds-Gram/dp/B0142WN05S/ref=sr_1_5_a_it?ie=UTF8&qid=1458679697&sr=8-5&keywords=Egyptian+food", "facebook"));

new PartOf(array(
	"category" => "Food",
	"pid" => $p23->get("pid")));

$p24 = new Purchase(Purchase::scrape("http://www.amazon.com/Girl-Era-Outside-Filigree-Earrings/dp/B0138HOS9K/ref=sr_1_20?ie=UTF8&qid=1458681151&sr=8-20&keywords=egyptian+earings", "kevinCohen"));

new PartOf(array(
	"category" => "Earings",
	"pid" => $p24->get("pid")));

$p25 = new Purchase(Purchase::scrape("http://www.amazon.com/Tagoo-Teardrop-Artificial-Rhinestone-Earrings/dp/B0199GKESI/ref=sr_1_23?ie=UTF8&qid=1458681151&sr=8-23&keywords=egyptian+earings
", "nickPatel"));

new PartOf(array(
	"category" => "Earings",
	"pid" => $p25->get("pid")));

$p26 = new Purchase(Purchase::scrape("http://www.amazon.com/Kaariag-Punkin-Elegant-Flower-Earring/dp/B014COPLL2/ref=sr_1_44?ie=UTF8&qid=1458681151&sr=8-44&keywords=egyptian+earings", "alexaLewis"));

new PartOf(array(
	"category" => "Earings",
	"pid" => $p26->get("pid")));


// $p27 = new Purchase(Purchase::scrape("http://www.amazon.com/Egyptian-Goddess-Sculptures-Statue-thedigitalangel/dp/B001L524J8/ref=sr_1_38?ie=UTF8&qid=1458679165&sr=8-38&keywords=egyptian+earings", "jorgeJim"));

// new PartOf(array(
// 	"category" => "Sculptures",
// 	"pid" => $p27->get("pid")));


$p28 = new Purchase(Purchase::scrape("http://www.amazon.com/Design-Toscano-Egyptian-Horus-Sculpture/dp/B00FFG9KSM/ref=sr_1_1?ie=UTF8&qid=1458679861&sr=8-1&keywords=Egyptian+sculptures", "nickPatel"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p28->get("pid")));


$p29 = new Purchase(Purchase::scrape("http://www.amazon.com/Egyptian-Anubis-Collectible-Figurine-Sculpture/dp/B001S5H996/ref=sr_1_2?ie=UTF8&qid=1458679861&sr=8-2&keywords=Egyptian+sculptures", "jorgeJim"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p29->get("pid")));


$p30 = new Purchase(Purchase::scrape("http://www.amazon.com/Anubis-Egyptian-Bust-Statue-Sculpture/dp/B00TSP2L5K/ref=sr_1_3?ie=UTF8&qid=1458679861&sr=8-3&keywords=Egyptian+sculptures", "facebook"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p30->get("pid")));


$p31 = new Purchase(Purchase::scrape("http://www.amazon.com/Egyptian-Androsphinx-Deities-Jewelry-Sculpture/dp/B00UW19QHU/ref=sr_1_4?ie=UTF8&qid=1458679861&sr=8-4&keywords=Egyptian+sculptures
", "kevinCohen"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p31->get("pid")));


$p32 = new Purchase(Purchase::scrape("http://www.amazon.com/Egyptian-Sm-Nefertiti-Collectible-Sculpture/dp/B00K7JUW8Y/ref=sr_1_5?ie=UTF8&qid=1458679861&sr=8-5&keywords=Egyptian+sculptures", "yusan"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p32->get("pid")));


$p33 = new Purchase(Purchase::scrape("http://www.amazon.com/Egyptian-Sm-King-Tut-Collectible/dp/B001S5HAGS/ref=sr_1_7?ie=UTF8&qid=1458679861&sr=8-7&keywords=Egyptian+sculptures", "nickPatel"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p33->get("pid")));


$p34 = new Purchase(Purchase::scrape("http://www.amazon.com/Design-Toscano-Egyptian-Treasure-Sculpture/dp/B00B9HWM36/ref=sr_1_8?ie=UTF8&qid=1458679861&sr=8-8&keywords=Egyptian+sculptures
", "nickPatel"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p34->get("pid")));


$p35 = new Purchase(Purchase::scrape("http://www.amazon.com/Wedjat-Horus-Collectible-Egyptian-Sculpture/dp/B0034DKE60/ref=sr_1_9?ie=UTF8&qid=1458679861&sr=8-9&keywords=Egyptian+sculptures", "yusan"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p35->get("pid")));


$p36 = new Purchase(Purchase::scrape("http://www.amazon.com/Sale-Egyptian-Style-Winged-Sculpture/dp/B0041SI0M2/ref=sr_1_10?ie=UTF8&qid=1458679861&sr=8-10&keywords=Egyptian+sculptures
", "kevinCohen"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p36->get("pid")));


$p37 = new Purchase(Purchase::scrape("http://www.amazon.com/Black-Egyptian-Obelisk-Collectible-Figurine/dp/B001S5DXZ0/ref=sr_1_11?ie=UTF8&qid=1458679861&sr=8-11&keywords=Egyptian+sculptures", "alexaLewis"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p37->get("pid")));

$p38 = new Purchase(Purchase::scrape("http://www.amazon.com/Egyptian-Bronze-Isis-Collectible-Statue/dp/B001S5FIYY/ref=sr_1_12?ie=UTF8&qid=1458679861&sr=8-12&keywords=Egyptian+sculptures", "pepsico"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p38->get("pid")));

$p39 = new Purchase(Purchase::scrape("http://www.amazon.com/Hathor-Collectible-Figurine-Egyptian-Sculpture/dp/B001S5HHM0/ref=sr_1_13?ie=UTF8&qid=1458679861&sr=8-13&keywords=Egyptian+sculptures
", "scottenand"));

new PartOf(array(
	"category" => "Sculptures",
	"pid" => $p39->get("pid")));


$p40 = new Purchase(Purchase::scrape("http://www.amazon.com/Leolana-Coronation-Nefertari-Authentic-Paper-9x13-Black/dp/B010CDFMAM/ref=sr_1_1?ie=UTF8&qid=1458680078&sr=8-1-spons&keywords=Egyptian+painting&psc=1", "scottenand"));

new PartOf(array(
	"category" => "Paintings",
	"pid" => $p40->get("pid")));


$p41 = new Purchase(Purchase::scrape("http://www.amazon.com/Leolana-Egyptian-Painting-Authentic-Paper-13x17-Black/dp/B010CFLM22/ref=sr_1_2?ie=UTF8&qid=1458680078&sr=8-2-spons&keywords=Egyptian+painting&psc=1
", "tutankCompany"));

new PartOf(array(
	"category" => "Paintings",
	"pid" => $p41->get("pid")));

*/
// $p42 = new Purchase(Purchase::scrape("http://www.amazon.com/H-COZY-Egyptian-Pyramids-beautiful-nyjzd104/dp/B0179QL5GA/ref=sr_1_4?ie=UTF8&qid=1458680078&sr=8-4&keywords=Egyptian+painting", "johnnieDoe"));

// new PartOf(array(
// 	"category" => "Paintings",
// 	"pid" => $p42->get("pid")));


$p43 = new Purchase(Purchase::scrape("http://www.amazon.com/Design-Toscano-Rameses-Between-Anubis/dp/B002T0KNZG/ref=sr_1_7?ie=UTF8&qid=1458680078&sr=8-7&keywords=Egyptian+painting
", "yusan"));

new PartOf(array(
	"category" => "Paintings",
	"pid" => $p43->get("pid")));


$p44 = new Purchase(Purchase::scrape("http://www.amazon.com/XhsdHome-Waterproof-Polyester-Curtain-Easter-Mothers-Day-Birthday/dp/B00VJB43NE/ref=sr_1_11?ie=UTF8&qid=1458680078&sr=8-11&keywords=Egyptian+painting
", "kevinCohen"));

new PartOf(array(
	"category" => "Paintings",
	"pid" => $p44->get("pid")));


$p45 = new Purchase(Purchase::scrape("http://www.amazon.com/Pack-Egyptian-Paintings-Papyrus-Nefertiti/dp/B00Y7IMWGG/ref=sr_1_25?ie=UTF8&qid=1458680078&sr=8-25&keywords=Egyptian+painting", "scottenand"));

new PartOf(array(
	"category" => "Paintings",
	"pid" => $p45->get("pid")));


$p46 = new Purchase(Purchase::scrape("http://www.amazon.com/Leolana-Egyptian-Painting-Authentic-Paper-9x13-Multi/dp/B010CC0P1Y/ref=sr_1_31?ie=UTF8&qid=1458680078&sr=8-31&keywords=Egyptian+painting", "microsoft"));

new PartOf(array(
	"category" => "Paintings",
	"pid" => $p46->get("pid")));


$p47 = new Purchase(Purchase::scrape("http://www.amazon.com/DY3S-SE08-19-Piece-Pottery-Tool/dp/B00HMDD64U/ref=sr_1_6?ie=UTF8&qid=1458680454&sr=8-6&keywords=pottery", "microsoft"));

new PartOf(array(
	"category" => "Pottery",
	"pid" => $p47->get("pid")));


$p48 = new Purchase(Purchase::scrape("http://www.amazon.com/Pottery-Hand-Glazed-Hand-Thrown-Ireland-Original/dp/B00XWDMEGU/ref=sr_1_9?ie=UTF8&qid=1458680471&sr=8-9&keywords=pottery
", "scottenand"));

new PartOf(array(
	"category" => "Pottery",
	"pid" => $p48->get("pid")));


$p49 = new Purchase(Purchase::scrape("http://www.amazon.com/Pottery-Wheel-Artista-Table-Top/dp/B0009F76BM/ref=sr_1_12?ie=UTF8&qid=1458680483&sr=8-12&keywords=pottery", "scottenand"));

new PartOf(array(
	"category" => "Pottery",
	"pid" => $p49->get("pid")));


$p50 = new Purchase(Purchase::scrape("http://www.amazon.com/WonderBat-Square-Adapter-Pottery-Wheels/dp/B0167IKYXQ/ref=sr_1_18?ie=UTF8&qid=1458680500&sr=8-18&keywords=pottery", "scottenand"));

new PartOf(array(
	"category" => "Pottery",
	"pid" => $p50->get("pid")));








$a1 = new Auction(Auction::scrape("http://www.amazon.com/Sculpt-Pro-Deluxe-Pottery-Sculpting/dp/B00CTTLZOA/ref=sr_1_19?ie=UTF8&qid=1458680513&sr=8-19&keywords=pottery
", "johnnieDoe"));

new PartOf(array(
	"category" => "Pottery",
	"pid" => $a1->get("pid")));


$a2 = new Auction(Auction::scrape("http://www.amazon.com/California-Costumes-Egyptian-Costume-Sandals/dp/B00YHFEQ4A/ref=sr_1_2?ie=UTF8&qid=1458679540&sr=8-2&keywords=egyptian+sandals", "johnnieDoe" ));

new PartOf(array(
	"category" => "Sandals",
	"pid" => $a2->get("pid")));

$a3 = new Auction(Auction::scrape("http://www.amazon.com/California-Costumes-Goddess-Costume-Accessory/dp/B003JH8T1I/ref=sr_1_1?ie=UTF8&qid=1458679540&sr=8-1&keywords=egyptian+sandals", "johnDoe" ));

new PartOf(array(
	"category" => "Sandals",
	"pid" => $a3->get("pid")));

$a4 = new Auction(Auction::scrape("http://www.amazon.com/UIN-Egyptian-Leather-Painted-Multicolored/dp/B01CRYFH3Q/ref=sr_1_5?ie=UTF8&qid=1458679639&sr=8-5&keywords=egyptian+shoes", "tutankamon" ));

new PartOf(array(
	"category" => "Shoes",
	"pid" => $a4->get("pid")));


$a5 = new Auction(Auction::scrape("http://www.amazon.com/Egyptian-Finger-Hieroglyphic-Pharaoh-Engraved/dp/B01C46EGQG/ref=sr_1_1?ie=UTF8&qid=1458679674&sr=8-1&keywords=egyptian+rings", "tutankamon" ));

new PartOf(array(
	"category" => "Rings",
	"pid" => $a5->get("pid")));


$a6 = new Auction(Auction::scrape("http://www.amazon.com/Fashion%C2%AE-Egyptian-Buddhist-Feather-Gemstone/dp/B00ZEYBD9E/ref=sr_1_2?ie=UTF8&qid=1458680900&sr=8-2&keywords=egyptian+rings", "tutankamon" ));

new PartOf(array(
	"category" => "Rings",
	"pid" => $a6->get("pid")));


$a7 = new Auction(Auction::scrape("http://www.amazon.com/Eye-Horus-Ring-Egyptian-Jewelry/dp/B010UOLYYG/ref=sr_1_3?ie=UTF8&qid=1458680900&sr=8-3&keywords=egyptian+rings", "kevinCohen" ));

new PartOf(array(
	"category" => "Rings",
	"pid" => $a7->get("pid")));


$a8 = new Auction(Auction::scrape("http://www.amazon.com/Patina-Brass-Egyptian-Motif-Scarab/dp/B00ZB7Y4MW/ref=sr_1_4?ie=UTF8&qid=1458680900&sr=8-4&keywords=egyptian+rings", "kevinCohen" ));

new PartOf(array(
	"category" => "Rings",
	"pid" => $a8->get("pid")));


$a9 = new Auction(Auction::scrape("http://www.amazon.com/Pharaoh-Color-Stretch-Egyptian-Medusa/dp/B00E0D2NLW/ref=sr_1_5?ie=UTF8&qid=1458680900&sr=8-5&keywords=egyptian+rings", "kevinCohen" ));

new PartOf(array(
	"category" => "Rings",
	"pid" => $a9->get("pid")));


$a10 = new Auction(Auction::scrape("http://www.amazon.com/Fashion-Vintage-Egyptian-Cleopatra-Gemstone/dp/B00WDRZXV4/ref=sr_1_6?ie=UTF8&qid=1458680900&sr=8-6&keywords=egyptian+rings", "alexaLewis" ));

new PartOf(array(
	"category" => "Rings",
	"pid" => $a10->get("pid")));


$a11 = new Auction(Auction::scrape("http://www.amazon.com/Fashion%C2%AE-Vintage-Tribal-Egyptian-Carved/dp/B00Y2GE658/ref=sr_1_7?ie=UTF8&qid=1458680900&sr=8-7&keywords=egyptian+rings", "alexaLewis" ));

new PartOf(array(
	"category" => "Rings",
	"pid" => $a11->get("pid")));


$a12 = new Auction(Auction::scrape("http://www.amazon.com/RedExtend-Womens-Egyptian-Pyramids-Skinny/dp/B00Q2PTFNA/ref=sr_1_3?ie=UTF8&qid=1458679736&sr=8-3&keywords=Egyptian+Clothing", "alexaLewis" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a12->get("pid")));


$a13 = new Auction(Auction::scrape("http://www.amazon.com/QZUnique-Ancient-Egyptian-Printed-Leggings/dp/B016MD8T7O/ref=sr_1_6?ie=UTF8&qid=1458679736&sr=8-6&keywords=Egyptian+Clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a13->get("pid")));


$a14 = new Auction(Auction::scrape("http://www.amazon.com/Looney-Tunes-Martian-Egyptian-Graphic/dp/B00PBG69XK/ref=sr_1_8?ie=UTF8&qid=1458679736&sr=8-8&keywords=Egyptian+Clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a14->get("pid")));


$a15 = new Auction(Auction::scrape("http://www.amazon.com/Sunward-Fashion-Womens-T-shirt-Sweatshirt/dp/B0176HNWGI/ref=sr_1_4?s=apparel&ie=UTF8&qid=1458680954&sr=1-4&nodeID=7141123011&keywords=clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a15->get("pid")));


$a16 = new Auction(Auction::scrape("http://www.amazon.com/Shivali-Womens-Sweater-Polyamide-Cardigan/dp/B015MT5XDC/ref=sr_1_2?s=apparel&ie=UTF8&qid=1458680954&sr=1-2&nodeID=7141123011&keywords=clothing", "johnnieDoe" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a16->get("pid")));


$a17 = new Auction(Auction::scrape("http://www.amazon.com/Womens-Neck-Short-Sleeve-DolmanTop/dp/B01A9C14PS/ref=sr_1_7?s=apparel&ie=UTF8&qid=1458680954&sr=1-7&nodeID=7141123011&keywords=clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a17->get("pid")));


$a18 = new Auction(Auction::scrape("http://www.amazon.com/Toms-Ware-Premium-Contrast-TWNMS310S-1-SKYBLUE-XL/dp/B00JQGLDO6/ref=sr_1_10?s=apparel&ie=UTF8&qid=1458680954&sr=1-10&nodeID=7141123011&keywords=clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a18->get("pid")));

$a19 = new Auction(Auction::scrape("http://www.amazon.com/Womens-Neck-Short-Sleeve-DolmanTop/dp/B01A9C14PS/ref=sr_1_7?s=apparel&ie=UTF8&qid=1458680954&sr=1-7&nodeID=7141123011&keywords=clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a19->get("pid")));


$a20 = new Auction(Auction::scrape("http://www.amazon.com/SOFIRE-Infant-Toddler-Clothing-Button/dp/B01ASXM3PI/ref=sr_1_13?s=apparel&ie=UTF8&qid=1458680954&sr=1-13&nodeID=7141123011&keywords=clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a20->get("pid")));


$a21 = new Auction(Auction::scrape("http://www.amazon.com/HIMONE-Womens-Casual-Blouse-Clothing/dp/B01CJGA4Y4/ref=sr_1_14?s=apparel&ie=UTF8&qid=1458681108&sr=1-14&nodeID=7141123011&keywords=clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a21->get("pid")));


$a22 = new Auction(Auction::scrape("http://www.amazon.com/Womens-Frill-Necklace-Gypsy-Tunic/dp/B01A8XVO8U/ref=sr_1_16?s=apparel&ie=UTF8&qid=1458681108&sr=1-16&nodeID=7141123011&keywords=clothing", "scottenand" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a22->get("pid")));


$a23 = new Auction(Auction::scrape("http://www.amazon.com/Carters-Baby-Piece-Terry-Cardigan/dp/B00XG01LGI/ref=sr_1_17?s=apparel&ie=UTF8&qid=1458681108&sr=1-17&nodeID=7141123011&keywords=clothing", "johnnieDoe" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a23->get("pid")));


$a24 = new Auction(Auction::scrape("http://www.amazon.com/LittleSpring-Little-Girls-Clothing-Flower/dp/B014A4D9FO/ref=sr_1_20?s=apparel&ie=UTF8&qid=1458681108&sr=1-20&nodeID=7141123011&keywords=clothing", "jorgeJim" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a24->get("pid")));


$a25 = new Auction(Auction::scrape("http://www.amazon.com/LnLClothing-Juniors-Distressed-Skinny-Blue1691/dp/B01B9X8JMW/ref=sr_1_25?s=apparel&ie=UTF8&qid=1458681108&sr=1-25&nodeID=7141123011&keywords=clothing", "jorgeJim" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a25->get("pid")));


$a26 = new Auction(Auction::scrape("http://www.amazon.com/gp/product/B01BXD64AM/ref=s9_hps_bw_g193_i1?pf_rd_m=ATVPDKIKX0DER&pf_rd_s=merchandised-search-8&pf_rd_r=1H8ZXNG80E77GVC8C5CH&pf_rd_t=101&pf_rd_p=2362011402&pf_rd_i=1040658", "jorgeJim" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a26->get("pid")));


$a27 = new Auction(Auction::scrape("http://www.amazon.com/gp/product/B01C3FMBI8/ref=s9_hps_bw_g193_i2?pf_rd_m=ATVPDKIKX0DER&pf_rd_s=merchandised-search-8&pf_rd_r=1H8ZXNG80E77GVC8C5CH&pf_rd_t=101&pf_rd_p=2362011402&pf_rd_i=1040658", "jorgeJim" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a27->get("pid")));


$a28 = new Auction(Auction::scrape("http://www.amazon.com/Paul-Fredrick-Cotton-European-Straight/dp/B000VDC21Q/ref=sr_1_7?s=apparel&ie=UTF8&qid=1458681219&sr=1-7&nodeID=2476517011&refinements=p_28%3AStraight", "jorgeJim" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a28->get("pid")));


$a29 = new Auction(Auction::scrape("http://www.amazon.com/Forever-Womens-Sleeves-Fleece-Hoodie/dp/B00TO4F0QC/ref=sr_1_4?s=apparel&ie=UTF8&qid=1458681239&sr=1-4&nodeID=7141123011&keywords=clothes", "jorgeJim" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a29->get("pid")));


$a30 = new Auction(Auction::scrape("http://www.amazon.com/Paul-Fredrick-Cotton-Straight-Collar/dp/B00CF0VU48/ref=pd_sim_193_1?ie=UTF8&dpID=415y4iPgwKL&dpSrc=sims&preST=_AC_UL200_SR150%2C200_&refRID=0C5H6FG7FJVQG1VPT28V", "jorgeJim" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a30->get("pid")));


$a31 = new Auction(Auction::scrape("http://www.amazon.com/Paul-Fredrick-Mens-Pleated-Separate/dp/B00B3WACCU/ref=cts_ap_4_srecsc", "jorgeJim" ));

new PartOf(array(
	"category" => "Clothing",
	"pid" => $a31->get("pid")));


$a32 = new Auction(Auction::scrape("http://www.amazon.com/ACTIVA-Decor-Sand-28oz-Light/dp/B00A7FWBJ6/ref=sr_1_2?ie=UTF8&qid=1458679947&sr=8-2&keywords=sand", "jorgeJim" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a32->get("pid")));


$a33 = new Auction(Auction::scrape("http://www.amazon.com/Bluetooth-Waterproof-SUNDATOM%C2%AE-Anti-drop-Anti-water/dp/B019W04V4O/ref=sr_1_1?s=electronics&ie=UTF8&qid=1458681842&sr=1-1&keywords=outdoors+sports", "jorgeJim" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a33->get("pid")));

$a34 = new Auction(Auction::scrape("http://www.amazon.com/HC-Electronic-Accessories-Outdoor-Fixation/dp/B019LCFJ2Q/ref=sr_1_2?s=electronics&ie=UTF8&qid=1458681859&sr=1-2&keywords=outdoors+sports", "jorgeJim" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a34->get("pid")));


$a35 = new Auction(Auction::scrape("http://www.amazon.com/ABLEGRID%C2%AE-SJ5000-Waterproof-Motorcycle-Accessories/dp/B01116IB84/ref=sr_1_3?s=electronics&ie=UTF8&qid=1458681872&sr=1-3&keywords=outdoors+sports", "jorgeJim" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a35->get("pid")));


$a36 = new Auction(Auction::scrape("http://www.amazon.com/ABLEGRID%C2%AE-SJ5000-Waterproof-Camcorder-Motorcycle/dp/B012ZSGGS4/ref=sr_1_4?s=electronics&ie=UTF8&qid=1458681883&sr=1-4&keywords=outdoors+sports", "jorgeJim" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a36->get("pid")));


$a37 = new Auction(Auction::scrape("http://www.amazon.com/waterproof-shockproof-Camcorder-Motorcycle-Accessories/dp/B016IKT2CM/ref=sr_1_5?s=electronics&ie=UTF8&qid=1458681894&sr=1-5&keywords=outdoors+sports", "johnnieDoe" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a37->get("pid")));


$a38 = new Auction(Auction::scrape("http://www.amazon.com/Bluedio-headphones-wireless-headset-Earphones/dp/B00Q3TA3QS/ref=sr_1_11?s=electronics&ie=UTF8&qid=1458681905&sr=1-11&keywords=outdoors+sports", "yusan" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a38->get("pid")));


$a39 = new Auction(Auction::scrape("http://www.amazon.com/Children-Digital-Stopwatch-Childrens-Wristwatches/dp/B014RGW244/ref=sr_1_12?s=electronics&ie=UTF8&qid=1458681920&sr=1-12&keywords=outdoors+sports", "yusan" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a39->get("pid")));


$a40 = new Auction(Auction::scrape("http://www.amazon.com/Kans-Premium-Outdoors-Portable-Multifunctional/dp/B016NTIA9Y/ref=sr_1_13?s=electronics&ie=UTF8&qid=1458681932&sr=1-13&keywords=outdoors+sports", "yusan" ));

new PartOf(array(
	"category" => "Outdoor",
	"pid" => $a40->get("pid")));


$a41 = new Auction(Auction::scrape("http://www.amazon.com/Falcon-SmartGuard-Printable-Disc-Cakebox/dp/B015JS3XUG/ref=sr_1_1?s=electronics&ie=UTF8&qid=1458681720&sr=1-1-spons&keywords=blank+dvd&psc=1", "yusan" ));

new PartOf(array(
	"category" => "Movies",
	"pid" => $a41->get("pid")));


$a42 = new Auction(Auction::scrape("http://www.amazon.com/Verbatim-Branded-Recordable-50-Disc-95101/dp/B00081A2KY/ref=sr_1_3?s=electronics&ie=UTF8&qid=1458681720&sr=1-3&keywords=blank+dvd", "yusan" ));

new PartOf(array(
	"category" => "Movies",
	"pid" => $a42->get("pid")));


$a43 = new Auction(Auction::scrape("http://www.amazon.com/Verbatim-to16x-Branded-Recordable-Disc/dp/B00081A2KE/ref=sr_1_6?s=electronics&ie=UTF8&qid=1458681720&sr=1-6&keywords=blank+dvd.", "yusan" ));

new PartOf(array(
	"category" => "Movies",
	"pid" => $a43->get("pid")));


$a44 = new Auction(Auction::scrape("http://www.amazon.com/Philips-Branded-Spindle-DM4S6H00F-17/dp/B001BXS4LW/ref=sr_1_7?s=electronics&ie=UTF8&qid=1458681720&sr=1-7&keywords=blank+dvd", "yusan" ));

new PartOf(array(
	"category" => "Movies",
	"pid" => $a44->get("pid")));


$a45 = new Auction(Auction::scrape("http://www.amazon.com/HP-DVD-R-4-7GB-Spindle-Handle/dp/B00CHCGRH4/ref=sr_1_10?s=electronics&ie=UTF8&qid=1458681720&sr=1-10&keywords=blank+dvd", "johnnieDoe" ));

new PartOf(array(
	"category" => "Movies",
	"pid" => $a45->get("pid")));


$a46 = new Auction(Auction::scrape("http://www.amazon.com/Sony-50CRM80RS-CD-R-Audio-Spindle/dp/B0002ZDIKW/ref=sr_1_1?ie=UTF8&qid=1458681736&sr=8-1&keywords=blank+music+cds", "johnnieDoe" ));

new PartOf(array(
	"category" => "Music",
	"pid" => $a46->get("pid")));


$a47 = new Auction(Auction::scrape("http://www.amazon.com/Verbatim-Minute-Digital-10-Disc-97935/dp/B00ED0Z5OO/ref=sr_1_13?ie=UTF8&qid=1458681736&sr=8-13&keywords=blank+music+cds", "johnnieDoe" ));

new PartOf(array(
	"category" => "Music",
	"pid" => $a47->get("pid")));


$a48 = new Auction(Auction::scrape("http://www.amazon.com/MAGIX-Samplitude-Music-Studio-2016/dp/B0171RL86Y/ref=sr_1_1?ie=UTF8&qid=1458681811&sr=8-1&keywords=B00ZR00CPQ|B00ZR00DE6|B00ZR00E2C|B0171RL86Y", "johnnieDoe" ));

new PartOf(array(
	"category" => "Music",
	"pid" => $a48->get("pid")));


$a49 = new Auction(Auction::scrape("http://www.amazon.com/Sony-25CRM80XS-Audio-Color-25-Pack/dp/B0009DRSWQ/ref=sr_1_17?ie=UTF8&qid=1458681835&sr=8-17&keywords=blank+music+cds", "johnnieDoe" ));

new PartOf(array(
	"category" => "Music",
	"pid" => $a49->get("pid")));

$a50 = new Auction(Auction::scrape("http://www.amazon.com/Egyptian-Tambourine-8-1-2/dp/B00634YQES/ref=sr_1_2?ie=UTF8&qid=1458681908&sr=8-2&keywords=egyptian+instruments", "johnnieDoe" ));

new PartOf(array(
	"category" => "Music",
	"pid" => $a50->get("pid")));

echo("\n\n\nHERE AFTER BIDS\n\n\n");
?>
