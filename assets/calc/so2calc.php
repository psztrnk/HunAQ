<?php 
if ($so2v < 16) {
	$so2code = 'elfogadható';
} else if ($so2v >= 16 && $so2v < 32) {
	$so2code = 'tűrhető';
} else if ($so2v >= 32 && $so2v < 40) {
	$so2code = 'problémás';
} else if ($so2v >= 40 && $so2v < 80) {
	$so2code = 'egészségtelen';
} else if ($so2v >= 80) {
	$so2code = 'veszélyes';
}
?>
