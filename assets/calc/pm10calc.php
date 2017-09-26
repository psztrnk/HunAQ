<?php 
// calculates the hazard level from the PM10 value returned
if ($pm10v < 20) {
	$pm10code = 'elfogadható';
} else if ($pm10v >= 20 && $pm10v < 40) {
	$pm10code = 'tűrhető';
} else if ($pm10v >= 40 && $pm10v < 50) {
	$pm10code = 'problémás';
} else if ($pm10v >= 50 && $pm10v < 100) {
	$pm10code = 'egészségtelen';
} else if ($pm10v >= 100) {
	$pm10code = 'veszélyes';
}
?>
