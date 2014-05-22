<?php
function day_list(){
	// Variables
	$xml_file = 'xml/meteo-1.xml';			//Declare the XML file
	$xml = simplexml_load_file($xml_file);	//Load the xml file
	$previsions = $xml->previsions;

	// Dropdown list
	echo '<form name="select_day" action="'.$_SERVER['PHP_SELF'].'" method="GET">';
		echo '<select name="dayvalue" onchange="this.form.submit()">',"\n";
		$dayvalue = 0;
		foreach ($previsions->prevision as $prevision) {
			// instancie ta variable pour ne pas avoir d'erreur lorsque tu l'apelle
		 	$dayNum = null;
			// vérifie que la variable est numérique en plus de vérifier si elle existe
			if (isset($_GET['dayvalue']) && is_numeric($_GET['dayvalue'])) {
				$dayNum = intval($_GET['dayvalue']);
			}
	 		$dayName = $prevision['nom'];
	 		$dayvalue++;
	 		$selected = null;

	 		if($dayNum === $dayvalue){ $selected = ' selected="selected"'; }
	 		echo "\t".'<option value="'. $dayvalue .'" '. $selected .' data-num="dayValue'.$dayvalue.' - dayNum'.$dayNum.'">'. $dayName .' - '. $dayvalue .'</option>'."\n";
		} // ENDFOREACH
		echo '</select>',"\n";
	echo '</form>';
} //ENDFUNC

function display_meteo(){

	// Variables
	$xml_file = 'xml/meteo-1.xml';			//Declare the XML file
	$xml = simplexml_load_file($xml_file);	//Load the xml file
	$previsions = $xml->previsions;
	//Verify that the value exists & if is a numeric value
	if (isset($_GET['dayvalue']) && is_numeric($_GET['dayvalue'])) {
		$dayvalue = $_GET['dayvalue'];
		foreach ($previsions->prevision as $prevision ) {
			$prevision_table[] = $prevision;
		} // ENDFOREACH
		$count = count($prevision_table);
		for ($i=0; $i < $count; $i++) {
			$city_name 	= strtolower(
							str_replace(" ", "-",$prevision_table[$dayvalue]->ville[$i]['id']));
			$temp_max 	= $prevision_table[$dayvalue]->ville[$i]['temperature_maxi'];
			$temp_mini 	= $prevision_table[$dayvalue]->ville[$i]['temperature_mini'];
			// echo 'DAY VALUE : '.$test.'<br />';
			echo '<div class="reset '.$city_name.'">';
			echo '<br />'.$city_name;
			echo '<br />'.$temp_max;
			echo '<br />'.$temp_mini;
			echo '</div>';
		} //ENDFOR
	} //ENDIF
} //ENDFUNC
?>