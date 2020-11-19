<?php
include("init.php");

$id=mysqli_real_escape_string($mysqli,$_GET["id"]);

$curl_zahtev = curl_init("http://localhost/rezervacije/api/rezervacija/$id");

		curl_setopt($curl_zahtev, CURLOPT_CUSTOMREQUEST, "DELETE");
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
    	curl_close($curl_zahtev);
	
		header("Location: pregledRez.php");


/*  if(mysqli_query($mysqli, "delete from rezervacija  where rezervacijaID=$id")){
  header("Location: pregledRez.php");
}else{
  echo("Doslo je do greske prilikom brisanja");
};  */



 ?>