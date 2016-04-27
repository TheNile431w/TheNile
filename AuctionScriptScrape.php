<?php


include("cmpsc431w/Header.php");


$a1 = new Auction(Auction::scrape("http://www.amazon.com/Sculpt-Pro-Deluxe-Pottery-Sculpting/dp/B00CTTLZOA/ref=sr_1_19?ie=UTF8&qid=1458680513&sr=8-19&keywords=pottery
", "johnnieDoe"));

new PartOf(array(
	"category" => "Pottery",
	"pid" => $a1->get("pid")));


$a2 = new Auction(Auction::scrape("http://www.amazon.com/dp/B00VQJWFC0?psc=1", "johnnieDoe" ));

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


$a13 = new Auction(Auction::scrape("http://www.amazon.com/dp/B015RPDVPS?psc=1", "scottenand" ));

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


$a16 = new Auction(Auction::scrape("http://www.amazon.com/Womens-Vogue-Shoulder-Design-Shirt/dp/B00V4GB12K/ref=pd_srecs_cs_193_1?ie=UTF8&dpID=4105ZM68CxL&dpSrc=sims&preST=_AC_UL250_SR170%2C250_&refRID=1F6VVY4CKJT7199286JT", "johnnieDoe" ));

new PartOf(array(
 	"category" => "Clothing",
 	"pid" => $a16->get("pid")));


$a17 = new Auction(Auction::scrape("http://www.amazon.com/dp/B012VP9OA8?psc=1", "scottenand" ));

new PartOf(array(
 	"category" => "Clothing",
 	"pid" => $a17->get("pid")));


$a18 = new Auction(Auction::scrape("http://www.amazon.com/dp/B00VUSWJT6?psc=1", "scottenand" ));

	new PartOf(array(
 	"category" => "Clothing",
 	"pid" => $a18->get("pid")));

$a19 = new Auction(Auction::scrape("http://www.amazon.com/URBAN-mens-bandana-leather-T-shirt/dp/B00SCK9SN0/ref=pd_srecs_cs_193_24?ie=UTF8&dpID=51fOmmnZxpL&dpSrc=sims&preST=_AC_UL250_SR170%2C250_&refRID=107PE9BAY6781RR0X5ZJ", "scottenand" ));

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


$a23 = new Auction(Auction::scrape("http://www.amazon.com/dp/B011R3UXXC?psc=1", "johnnieDoe" ));

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


$a29 = new Auction(Auction::scrape("http://www.amazon.com/dp/B013TVHBH6?psc=1", "jorgeJim" ));

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
	"category" => "Outdoors",
	"pid" => $a32->get("pid")));


$a33 = new Auction(Auction::scrape("http://www.amazon.com/Bluetooth-Waterproof-SUNDATOM%C2%AE-Anti-drop-Anti-water/dp/B019W04V4O/ref=sr_1_1?s=electronics&ie=UTF8&qid=1458681842&sr=1-1&keywords=outdoors+sports", "jorgeJim" ));

new PartOf(array(
	"category" => "Outdoors",
	"pid" => $a33->get("pid")));

$a34 = new Auction(Auction::scrape("http://www.amazon.com/HC-Electronic-Accessories-Outdoor-Fixation/dp/B019LCFJ2Q/ref=sr_1_2?s=electronics&ie=UTF8&qid=1458681859&sr=1-2&keywords=outdoors+sports", "jorgeJim" ));

new PartOf(array(
	"category" => "Outdoors",
	"pid" => $a34->get("pid")));


$a35 = new Auction(Auction::scrape("http://www.amazon.com/ABLEGRID%C2%AE-SJ5000-Waterproof-Motorcycle-Accessories/dp/B01116IB84/ref=sr_1_3?s=electronics&ie=UTF8&qid=1458681872&sr=1-3&keywords=outdoors+sports", "jorgeJim" ));

new PartOf(array(
	"category" => "Outdoors",
	"pid" => $a35->get("pid")));


$a36 = new Auction(Auction::scrape("http://www.amazon.com/ABLEGRID%C2%AE-SJ5000-Waterproof-Motorcycle-Accessories/dp/B01116IB84/ref=pd_sim_421_2?ie=UTF8&dpID=61XNUXNyVOL&dpSrc=sims&preST=_AC_UL160_SR160%2C160_&refRID=0V6VXFASMTY8HQV5ZSFQ", "jorgeJim" ));

new PartOf(array(
 	"category" => "Outdoors",
 	"pid" => $a36->get("pid")));


$a37 = new Auction(Auction::scrape("http://www.amazon.com/waterproof-shockproof-Camcorder-Motorcycle-Accessories/dp/B016IKT2CM/ref=sr_1_5?s=electronics&ie=UTF8&qid=1458681894&sr=1-5&keywords=outdoors+sports", "johnnieDoe" ));

new PartOf(array(
	"category" => "Outdoors",
	"pid" => $a37->get("pid")));


$a38 = new Auction(Auction::scrape("http://www.amazon.com/Bluedio-headphones-wireless-headset-Earphones/dp/B00Q3TA3QS/ref=sr_1_11?s=electronics&ie=UTF8&qid=1458681905&sr=1-11&keywords=outdoors+sports", "yusan" ));

new PartOf(array(
	"category" => "Outdoors",
	"pid" => $a38->get("pid")));


$a39 = new Auction(Auction::scrape("http://www.amazon.com/Children-Digital-Stopwatch-Childrens-Wristwatches/dp/B014RGW244/ref=sr_1_12?s=electronics&ie=UTF8&qid=1458681920&sr=1-12&keywords=outdoors+sports", "yusan" ));

new PartOf(array(
	"category" => "Outdoors",
	"pid" => $a39->get("pid")));


$a40 = new Auction(Auction::scrape("http://www.amazon.com/Kans-Premium-Outdoors-Portable-Multifunctional/dp/B016NTIA9Y/ref=sr_1_13?s=electronics&ie=UTF8&qid=1458681932&sr=1-13&keywords=outdoors+sports", "yusan" ));

new PartOf(array(
	"category" => "Outdoors",
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


$a45 = new Auction(Auction::scrape("http://www.amazon.com/Yens%C2%AE-White-Sleeves-Envelopes-Window/dp/B00HMCDTSE/ref=pd_sim_23_2?ie=UTF8&dpID=41W%2Bq-IaMOL&dpSrc=sims&preST=_AC_UL160_SR160%2C160_&refRID=1FPERAC0AKPV8BH5DVWW", "johnnieDoe" ));

new PartOf(array(
 	"category" => "Movies",
 	"pid" => $a45->get("pid")));


$a46 = new Auction(Auction::scrape("http://www.amazon.com/Sony-50CRM80RS-CD-R-Audio-Spindle/dp/B0002ZDIKW/ref=sr_1_1?ie=UTF8&qid=1458681736&sr=8-1&keywords=blank+music+cds", "johnnieDoe" ));

new PartOf(array(
	"category" => "Music",
	"pid" => $a46->get("pid")));


$a47 = new Auction(Auction::scrape("http://www.amazon.com/Verbatim-Branded-Recordable-10-Disc-97955/dp/B00J88QCIE/ref=pd_sim_23_3?ie=UTF8&dpID=415BhZMNg%2BL&dpSrc=sims&preST=_AC_UL160_SR160%2C160_&refRID=0WC9F34FWBY352VCC4D3", "johnnieDoe" ));

new PartOf(array(
 	"category" => "Music",
 	"pid" => $a47->get("pid")));


$a48 = new Auction(Auction::scrape("http://www.amazon.com/MAGIX-Samplitude-Music-Studio-2016/dp/B0171RL86Y/ref=sr_1_1?ie=UTF8&qid=1458681811&sr=8-1&keywords=B00ZR00CPQ|B00ZR00DE6|B00ZR00E2C|B0171RL86Y", "johnnieDoe" ));

new PartOf(array(
	"category" => "Music",
	"pid" => $a48->get("pid")));


$a49 = new Auction(Auction::scrape("http://www.amazon.com/Sony-100CDQ80SP-Recordable-Media-Spindle/dp/B000HCNZI0/ref=pd_sim_23_3?ie=UTF8&dpID=41pAwK1vygL&dpSrc=sims&preST=_AC_UL160_SR160%2C160_&refRID=0BSNTC44KV4KSB6B6DH6", "johnnieDoe" ));

new PartOf(array(
 	"category" => "Music",
 	"pid" => $a49->get("pid")));

$a50 = new Auction(Auction::scrape("http://www.amazon.com/Egyptian-Tambourine-8-1-2/dp/B00634YQES/ref=sr_1_2?ie=UTF8&qid=1458681908&sr=8-2&keywords=egyptian+instruments", "johnnieDoe" ));

new PartOf(array(
	"category" => "Music",
	"pid" => $a50->get("pid")));
?>