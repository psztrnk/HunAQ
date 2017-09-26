<?php 
if ($o3v < 48) {
	$o3code = 'elfogadható';
} else if ($o3v >= 48 && $o3v < 96) {
	$o3code = 'tűrhető';
} else if ($o3v >= 96 && $o3v < 120) {
	$o3code = 'problémás';
} else if ($o3v >= 120 && $o3v < 220) {
	$o3code = 'egészségtelen';
} else if ($o3v >= 220) {
	$o3code = 'veszélyes';
}
?>
