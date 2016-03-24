<?php

include("cmpsc431w/Header.php");

$p1 = new Purchase(Purchase::scrape("http://www.amazon.com/Ajwa-Dates-From-Saudi-Arabia/dp/B00WXYTMGE/ref=pd_sim_sbs_325_4?ie=UTF8&dpID=41ul5sjIg4L&dpSrc=sims&preST=_AC_UL160_SR160%2C160_&refRID=04RCSHQ7W368AKETA213", "johnDoe"));

new PartOf(array(
 	"category" => "Food",
 	"pid" => $p1->get("pid")));

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

$p12 = new Purchase(Purchase::scrape("http://www.amazon.com/Akribos-XXIV-AK813BK-Sunburst-Chronograph/dp/B00U0XC1K4/ref=sr_1_1?m=ATVPDKIKX0DER&s=apparel&ie=UTF8&qid=1458853454&sr=1-1&nodeID=14008282011&refinements=p_6%3AATVPDKIKX0DER", "kevinCohen"));

new PartOf(array(
 	"category" => "Necklaces",
 	"pid" => $p12->get("pid")));

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


$p27 = new Purchase(Purchase::scrape("http://www.amazon.com/Portable-RAVPower-External-Technology-Smartphones/dp/B00Y2PX4U2/ref=pd_sim_107_2?ie=UTF8&dpID=418chqW3G5L&dpSrc=sims&preST=_AC_UL160_SR160%2C160_&refRID=1K4JHHHS8F8YNBMJT5QY", "jorgeJim"));

new PartOf(array(
 	"category" => "Electronics",
 	"pid" => $p27->get("pid")));


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


$p42 = new Purchase(Purchase::scrape("http://www.amazon.com/dp/B00VH8G1SY/ref=gbps_img_s-3_6522_3793e852?smid=A294P4X9EWVXLJ&pf_rd_p=2443876522&pf_rd_s=slot-3&pf_rd_t=701&pf_rd_i=gb_main&pf_rd_m=ATVPDKIKX0DER&pf_rd_r=0SX7EG8J7G6K05RHE1E0", "johnnieDoe"));

new PartOf(array(
 	"category" => "Paintings",
 	"pid" => $p42->get("pid")));


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


$p45 = new Purchase(Purchase::scrape("http://www.amazon.com/gp/product/B0198TZYU4/ref=s9_aas_bw_g309_i1?pf_rd_m=ATVPDKIKX0DER&pf_rd_s=merchandised-search-3&pf_rd_r=0HTR72RR395TPXKRMHXB&pf_rd_t=101&pf_rd_p=2435238082&pf_rd_i=13577883011", "scottenand"));

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


?>