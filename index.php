<!doctype HTML>
<html>
	<head>
		<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
		<title>Levegőminőség</title>
	</head>
<?php
	// including the parser
	// see credits in parser file
	require_once('assets/parser/parser.php');
	// hide warnings to display "nice" error messeage
	// delete the below error_reporting line to display warnings
	error_reporting(E_ERROR | E_PARSE);
	// replace Miskolc with other city
	// see available cities at legszennyezes.hu
	$html = file_get_html('http://www.legszennyezes.hu/miskolc');
	// display error message if no such city or no connection
	if(!$html) {
		echo '<body>';
		echo '<h1>Nincs ilyen város, vagy hiba a kapcsolatban. :(</h1>';
		echo '</body></html>';
		exit;
	}

	// get overall air quality
	// based on this, you can style the body as you wish,
	// eg. different background images for different conditions
	$overallQuality = $html->find('div.current-air-lower-local-summary', 0);
?>

<body class="<?php echo $overallQuality->plaintext; // class for body based on $overallQuality ?>">

<?php

// get the title, including the city
	$title = $html->find('h1.current-air-title', 0);
	echo '<h1>'.$title->plaintext.'</h1>';
	
// get timestamp of latest update of data
	$updated = $html->find('div.actual-updated', 0);
	echo '<p>'.$updated->plaintext.' &bull; Forrás: <a href="http://www.legszennyezes.hu/miskolc/" target="_blank">légszennyezés.hu</a></p>';

// get PM10 Data
	$pm10 = $html->find('div.current-air-col', 0);
	$pm10Title = $pm10->find('div.current-air-material', 0);
	$pm10SubTitle = $pm10->find('div.current-air-material-subtext', 0);
	$pm10Data = $pm10->find('div.current-air-row-amount', 0);
	$pm10DataFix = str_replace('m3', 'm<sup>3</sup>', $pm10Data);
	$pm10Text = $pm10->find('div.current-air-row-summary', 0);
	$pm10Percent = $pm10->find('div.current-air-row-percent', 0);
// return PM10 data
	echo '<div class="tile '.$pm10Text->plaintext.'">';
	echo '<h2>'.$pm10Title->plaintext.'<span> ('.$pm10SubTitle->plaintext.')<span></h2>';
	echo '<abbr title="Az egészségügyi határérték '.$pm10Percent->plaintext.'-a">'.$pm10DataFix.'</abbr><br />';
	echo $pm10Text;
	echo '<div class="indicate"><span style="width: '.$pm10Percent->plaintext.';"></span></div>';
	echo '</div>';

// get NO2 Data
	$no2 = $html->find('div.current-air-col', 1);
	$no2Title = $no2->find('div.current-air-material', 0);
	$no2TitleFix = str_replace('NO2', 'NO<sub>2</sub>', $no2Title->plaintext);
	$no2SubTitle = $no2->find('div.current-air-material-subtext', 0);
	$no2Data = $no2->find('div.current-air-row-amount', 0);
	$no2DataFix = str_replace('m3', 'm<sup>3</sup>', $no2Data);
	$no2Text = $no2->find('div.current-air-row-summary', 0);
	$no2Percent = $no2->find('div.current-air-row-percent', 0);
// return NO2 data
	echo '<div class="tile '.$no2Text->plaintext.'">';
	echo '<h2>'.$no2TitleFix.'<span> ('.$no2SubTitle->plaintext.')<span></h2>';
	echo '<abbr title="Az egészségügyi határérték '.$no2Percent->plaintext.'-a">'.$no2DataFix.'</abbr><br />';
	echo $no2Text;
	echo '<div class="indicate"><span style="width: '.$no2Percent->plaintext.';"></span></div>';
	echo '</div>';

// get SO2 Data
	$so2 = $html->find('div.current-air-col', 2);
	$so2Title = $so2->find('div.current-air-material', 0);
	$so2TitleFix = str_replace('SO2', 'SO<sub>2</sub>', $so2Title->plaintext);
	$so2SubTitle = $so2->find('div.current-air-material-subtext', 0);
	$so2Data = $so2->find('div.current-air-row-amount', 0);
	$so2DataFix = str_replace('m3', 'm<sup>3</sup>', $so2Data);
	$so2Text = $so2->find('div.current-air-row-summary', 0);
	$so2Percent = $so2->find('div.current-air-row-percent', 0);
// return SO2 Data
	echo '<div class="tile '.$so2Text->plaintext.'">';
	echo '<h2>'.$so2TitleFix.'<span> ('.$so2SubTitle->plaintext.')<span></h2>';
	echo '<abbr title="Az egészségügyi határérték '.$so2Percent->plaintext.'-a">'.$so2DataFix.'</abbr><br />';
	echo $so2Text;
	echo '<div class="indicate"><span style="width: '.$so2Percent->plaintext.';"></span></div>';
	echo '</div>';

// get NOx Data
	$nox = $html->find('div.current-air-col', 3);
	$noxTitle = $nox->find('div.current-air-material', 0);
	$noxTitleFix = str_replace('NOx', 'NO<sub>X</sub>', $noxTitle->plaintext);
	$noxSubTitle = $nox->find('div.current-air-material-subtext', 0);
	$noxData = $nox->find('div.current-air-row-amount', 0);
	$noxDataFix = str_replace('m3', 'm<sup>3</sup>', $noxData);
	$noxText = $nox->find('div.current-air-row-summary', 0);
	$noxPercent = $nox->find('div.current-air-row-percent', 0);
// return NOx Data
	echo '<div class="tile '.$noxText->plaintext.'">';
	echo '<h2>'.$noxTitleFix.'<span> ('.$noxSubTitle->plaintext.')<span></h2>';
	echo '<abbr title="Az egészségügyi határérték '.$noxPercent->plaintext.'-a">'.$noxDataFix.'</abbr><br />';
	echo $noxText;
	echo '<div class="indicate"><span style="width: '.$noxPercent->plaintext.';"></span></div>';
	echo '</div>';

// get O3 Data
	$o3 = $html->find('div.current-air-col', 4);
	$o3Title = $o3->find('div.current-air-material', 0);
	$o3TitleFix = str_replace('O3', 'O<sub>3</sub>', $o3Title->plaintext);
	$o3SubTitle = $o3->find('div.current-air-material-subtext', 0);
	$o3Data = $o3->find('div.current-air-row-amount', 0);
	$o3DataFix = str_replace('m3', 'm<sup>3</sup>', $o3Data);
	$o3Text = $o3->find('div.current-air-row-summary', 0);
	$o3Percent = $o3->find('div.current-air-row-percent', 0);
// return O3 Data
	echo '<div class="tile '.$o3Text->plaintext.'">';
	echo '<h2>'.$o3TitleFix.'<span> ('.$o3SubTitle->plaintext.')<span></h2>';
	echo '<abbr title="Az egészségügyi határérték '.$o3Percent->plaintext.'-a">'.$o3DataFix.'</abbr><br />';
	echo $o3Text;
	echo '<div class="indicate"><span style="width: '.$o3Percent->plaintext.';"></span></div>';
	echo '</div><div class="clear"></div>';

// get overall air quality
	$overallIndex = $html->find('div.current-air-lower-local-top', 0);
	$overallText = $html->find('div.current-air-lower-description', 0);
	$overallMaterial = $html->find('div.current-air-lower-local-datas', 0);
// return overall air quality
	echo '<div class="overall '.$overallQuality->plaintext.'"><h2>Összességében: <span>'.$overallQuality->plaintext.'</span></h2>';
	echo '<p>'.$overallMaterial->plaintext.'</p>';
	echo '<p>'.$overallIndex->plaintext.'</p>';
	echo '<p>'.$overallText->plaintext.'</p>';
	echo '</div>';
?>

	</body>
</html>
