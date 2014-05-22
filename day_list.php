<?php 
function day_list(){
	// Variables
	$xml_file = 'xml/meteo-1.xml';
	$xml = simplexml_load_file($xml_file);
	$previsions = $xml->previsions;

	$selected = '';

// Liste déroulante
	
	// echo '<br />Current day : '.$dayNum.'<br />';

	echo '<form name="select_day" action="'.$_PHP_SELF.'" method="GET">';

		echo '<select name="dayvalue" onchange="this.form.submit()">',"\n";
		$dayvalue = 0;
		foreach ($previsions->prevision as $prevision) {
			if (isset($_GET['dayvalue'])) {
				$dayNum = $_GET['dayvalue'];
			}
		 		$dayName = $prevision['nom'];
		 		$dayvalue++;
		 		if($dayNum === $dayvalue){ $selected = ' selected="selected"';}
		 		echo "\t".'<option value="'. $dayvalue .'"'. $selected .'>'. $dayName .' - '. $dayvalue .'</option>'."\n";

		 		// <option value="January"<?=$row['month'] == 'January' ? ' selected="selected"' : '';>January</option>
		}
		echo '</select>',"\n";
	echo '</form>';

	$test = $_GET['dayvalue'];
	foreach ($previsions->prevision as $prevision ) {
		$prevision_table[] = $prevision;
	}
	$count = count($prevision_table);
	for ($i=0; $i < $count; $i++) {

		// echo 'DAY VALUE : '.$test.'<br />';
		echo '<br />'.$prevision_table[$test]->ville[$i]['id'];
		echo '<br />'.$prevision_table[$test]->ville[$i]['temperature_maxi'];
	}
		// echo '<pre>';
		// print_r($prevision_table);
		// echo '</pre>';



















	// foreach ($previsions->prevision as $prevision) {
	// 	// echo '<pre>';
	// 	// print_r($prevision);
	// 	// echo '</pre>';
	// 	$count = count($prevision);
	// 	for ($i=0; $i < $count; $i++) { 
	// 		$result = $prevision[$dayvalue]->ville[$i]['id'].'<br />';
	// 	}
	// 	echo '__________<br />';
	// }

	// echo $result;





	// foreach ($previsions->prevision as $prevision) {
	// 	$day_name = (string) $prevision['nom'];
	// 	$current_day = (string) $day;
	// 	if ($day_name == $current_day) {
	// 		echo $previsions->ville['id'];
	// 	}
	// }

	// echo '<pre>';
	// print_r($previsions);
	// echo '</pre>';

	// foreach ($previsions->prevision as $prevision) {
			// echo '<pre>';
			// print_r($prevision);
			// echo '</pre>';
			//echo $prevision['nom'].'<br />'; 	// Affiche les noms des jours
			//echo $prevision->ville['id'];		// Affiche le nom de la ville
			// if($day == $dayName){
				// foreach ($prevision->ville as $key) {
					// echo '<pre>';
					// print_r($key);
					// echo '</pre>';
					// echo 'Ville : '.$key['id'].'<br />'; //Affiche la ville
				// }
			// }
	// }

	// foreach ($previsions->prevision as $key) {
	// 	echo '<pre>';
	// 	print_r($key);
	// 	echo '</pre>';

	// 	if($key['nom'] == $day){
	// 	// 	// for ($i=0; $i < count($key); $i++) { 
	// 	// 		$test = $key->ville;
	// 	// 		print_r($test);
	// 	// 		echo $key->ville['temperature_maxi'];
	// 	// 	// }
			
	// 	}
	// }
	// foreach ($previsions->prevision->ville as $value) {
	// 	echo $value['id'].' '.$value['temperature_maxi'].'<br />';
	// }

	//FONCTIONNE
	// foreach ($previsions->prevision->ville as $value) {
	// 	echo $value['id'].' '.$value['temperature_maxi'].'<br />';
	// }
}
?>