<?php 
// calculates the hazard level from the NO2 value returned
if ($no2v < 16) {
	$no2code = 'elfogadható';
} else if ($no2v >= 16 && $no2v < 32) {
	$no2code = 'tűrhető';
} else if ($no2v >= 32 && $no2v < 40) {
	$no2code = 'problémás';
} else if ($no2v >= 40 && $no2v < 80) {
	$no2code = 'egészségtelen';
} else if ($no2v >= 80) {
	$no2code = 'veszélyes';
}
?>
