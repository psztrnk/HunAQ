<?php
if ($aqi < 50) {
	$overallQuality = 'elfogadható';
	$oQText = 'A levegő minősége elfogadható, a légszennyezés nem, vagy csak csekély mértékben veszélyes.';
} else if ($aqi >= 51 && $aqi <= 100) {
	$overallQuality = 'kedvezőtlen';
	$oQText = 'A levegő minősége kedvezőtlen, ugyanakkor a légszennyezés csak a lakosság arra kimondottan érzékeny tagjait veszélyezteti csekély mértékben.';
} else if ($aqi >= 101 && $aqi <= 150) {
	$overallQuality = 'problémás';
	$oQText = 'A levegő minősége problémás. A légszennyezettségre érzékenyek egészségügyi panaszoktól szenvedhetnek, de a nagy átlag nem tapasztal ilyen panaszokat.';
} else if ($aqi >= 151 && $aqi <= 200) {
	$overallQuality = 'egészségtelen';
	$oQText = 'A levegő minősége egészségtelen. A légszennyezettségre érzékenyek fokozottan szenvedhetnek az egészségügyi panaszoktól. A népesség minden tagja tapasztalhat egészségügyi panaszokat.';
} else if ($aqi >= 201 && $aqi <= 300) {
	$overallQuality = 'káros';
	$oQText = 'A levegő minősége káros. A teljes népesség tapasztalhat komolyabb egészségügyi panaszokat. Elrendelhetik a szmogriadó tájékoztatási fokozatát.';
} else if ($aqi >= 301) {
	$overallQuality = 'veszélyes';
	$oQText = 'A levegő minősége veszélyes. A teljes népesség komoly egészségügyi panaszokat tapasztal. Elrendelhetik a szmogriadó riasztási fokozatát.';
}
?>
