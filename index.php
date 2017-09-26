<!doctype HTML>
<html>
	<head>
		<meta charset="utf-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
		<title>Levegőminőség</title>
	</head>

<?php
	// change link to valid city/token combination
	// get a token free at http://aqicn.org/data-platform/token/
	$html = json_decode(file_get_contents('http://api.waqi.info/feed/shanghai/?token=demo')); // change this
	$cityName = $html->data->city->name; // name of city and monitoring station
	$aqi = $html->data->aqi; // overall air quality index
	$pm10v = $html->data->iaqi->pm10->v; // PM10 value
	$no2v = $html->data->iaqi->no2->v; // NO2 value
	$so2v = $html->data->iaqi->so2->v; // SO2 value
	$o3v = $html->data->iaqi->o3->v; // O3 value
	$dataTimestamp = $html->data->time->s; // latest data refresh timestamp
	$dominant = strtoupper($html->data->dominentpol); // dominant polluter name

	$pm10percentage = ($pm10v/50)*100; // PM10 health level percentage
	$no2percentage = ($no2v/100)*100; // NO2 health level percentage
	$so2percentage = ($so2v/250)*100; // SO2 health level percentage
	$o3percentage = ($o3v/120)*100; // O3 health level percentage

	require_once('assets/calc/aqicalc.php'); 
	require_once('assets/calc/pm10calc.php');
	require_once('assets/calc/no2calc.php');
	require_once('assets/calc/so2calc.php');
	require_once('assets/calc/o3calc.php');

	// turns off warnings for "nice" error messages
	// comment this line out to display API warnings
	error_reporting(E_ERROR | E_PARSE);

	if(!$html) {
		// display error message if no data returned
		echo '<body>';
		echo '<h1>Nincs ilyen város, vagy hiba a kapcsolatban. :(</h1>';
		echo '</body></html>';
		exit;
	}
?>

<body class="<?php echo $overallQuality; // class for body based on $overallQuality ?>">
	<h1><?php echo $cityName; ?></h1>
	<p>Legutóbbi frissítés: <?php echo $dataTimestamp; ?></p>

	<div class="tile <?php echo $pm10code; ?>">
		<h2>PM<sub>10</sub> <span>(szálló por)</span></h2>
		<div class="current-air-row-amount"><abbr title="Az egészségügyi határérték <?php echo $pm10percentage; ?>%-a"><?php echo $pm10v; ?> µg/m<sup>3</sup></abbr></div><br />
		<div class="current-air-row-summary"><?php echo $pm10code; ?></div>
		<div class="indicate"><span style="width: <?php echo $pm10percentage; ?>%;"></span></div>
	</div>

	<div class="tile <?php echo $no2code; ?>">
		<h2>NO<sub>2</sub> <span>(nitrogén-dioxid)</span></h2>
		<div class="current-air-row-amount"><abbr title="Az egészségügyi határérték <?php echo intval($no2percentage); ?>%-a"><?php echo $no2v; ?> µg/m<sup>3</sup></abbr></div><br />
		<div class="current-air-row-summary"><?php echo $no2code; ?></div>
		<div class="indicate"><span style="width: <?php echo intval($no2percentage); ?>%;"></span></div>
	</div>

	<div class="tile <?php echo $so2code; ?>">
		<h2>SO<sub>2</sub> <span>(kén-dioxid)</span></h2>
		<div class="current-air-row-amount"><abbr title="Az egészségügyi határérték <?php echo intval($so2percentage); ?>%-a"><?php echo $so2v; ?> µg/m<sup>3</sup></abbr></div><br />
		<div class="current-air-row-summary"><?php echo $so2code; ?></div>
		<div class="indicate"><span style="width: <?php echo intval($so2percentage); ?>%;"></span></div>
	</div>

	<div class="tile <?php echo $o3code; ?>">
		<h2>O<sub>3</sub> <span>(ózon)</span></h2>
		<div class="current-air-row-amount"><abbr title="Az egészségügyi határérték <?php echo intval($o3percentage); ?>%-a"><?php echo $o3v; ?> µg/m<sup>3</sup></abbr></div><br />
		<div class="current-air-row-summary"><?php echo $o3code; ?></div>
		<div class="indicate"><span style="width: <?php echo intval($o3percentage); ?>%;"></span></div>
	</div>

	<div class="overall <?php echo $overallQuality; ?>">
		<h2>Összességében: <span><?php echo $overallQuality; ?></span></h2>
		<p>Összesített index: <?php echo $aqi; ?> &bull; Domináns szennyező: <?php echo $dominant; ?></p>
		<p><?php echo $oQText; ?></p>
	</div>
	<footer>
		<p><a href="https://github.com/psztrnk/hunaq" target="_blank" title="Source on Github">Source on Github</a> &bull; CC0 demo images: <a href="https://pixabay.com/en/mountains-clean-air-heaven-cold-679885/" target="_blank">GraceDias</a> &bull; <a href="https://pixabay.com/en/morning-mist-autumn-october-427796/" target="_blank">rkiz</a> &bull; <a href="https://pixabay.com/en/sun-sky-sunset-abendstimmung-358958/" target="_blank">David-Karich</a> &bull; <a href="https://pixabay.com/en/power-station-pollution-energy-374097/" target="_blank">stevepb</a></p>
	</footer>
	</body>
</html>
