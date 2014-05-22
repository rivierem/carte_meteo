<?php

	$xml_file = 'xml/meteo-1.xml';
    $xml = simplexml_load_file($xml_file);
	$previsions = $xml->previsions;

	echo '<ul>';
 	foreach ($previsions->prevision as $prevision) {

 		$dayName = $prevision['nom'];
 		$date = $prevision['date'];

		echo '<li>';
		//Infos jour
    	echo '<strong>Nom : '.$dayName.'</strong><br />';
    	echo 'Date : '.$date.'<br /><br />';

    		$villes = $prevision->ville;
    		foreach ($villes as $ville) {
	    		$attributes = $ville->attributes();

	    		echo '<ul>';
	    		foreach ($attributes as $key => $value) {
	    			 if($key)
	        			echo("[".$key ."] ".$value . "<br />");
	    		}
	    		echo '</ul><br />';
	    	}
	  

		echo '</li>';


	}
	echo '</ul>';


?>