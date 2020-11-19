<?php
include("init.php");

	$array['cols'][] = array('label' => 'Kalsa','type' => 'string');
    $array['cols'][] = array('label' => 'Broj letova po klasi', 'type' => 'number');

	
		$sql = "SELECT nazivKlase, COUNT(l.klasa) as broj FROM let l JOIN klasa k ON (l.klasa=k.idKlase) join rezervacija r on (r.let=l.id) GROUP BY k.idKlase";
			if (!$q=$mysqli->query($sql)){
					echo '{"greska":"Nastala je greška pri izvršavanju upita."}';
					exit();
			} else {
			if ($q->num_rows>0){

			$niz[] = array();
			while ($red=$q->fetch_object()){
			 $array['rows'][] = array('c' => array( array('v'=>$red->nazivKlase),array('v'=>(int)$red->broj)) );

			}

			$niz_json = json_encode ($array);
			print ($niz_json);
			} else {
			//ako nema rezultata u bazi
			echo '{"greska":"Nema rezultata."}'; 
			}
		}


?>