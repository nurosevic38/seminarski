<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	echo('Popis ruta: <br>');
	echo('------------ <br>');

	echo('GET klase.json <br>');
	echo('GET letovi.json <br>');
	echo('POST ubaciKorisnika.json <br>');
	echo('POST unosLeta.json <br>');
	echo('POST /unosRezervacije.json <br>');
	echo('DELETE /rezervacije/@id <br>');

});

Flight::register('db', 'Database', array('niz'));

Flight::route('GET /klase.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->sveKlase();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /letovi.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->sviLetovi();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});


Flight::route('POST /ubaciKorisnika.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->ubaciKorisnika($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Greska!";

	}

	echo indent(json_encode($response));

});
Flight::route('POST /unosLeta.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->noviLet($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Neuspesno";

	}

	echo indent(json_encode($response));

});

Flight::route('POST /unosRezervacije.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->novaRezervacija($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Neuspesno";

	}

	echo indent(json_encode($response));

});

Flight::route('DELETE /rezervacija/@id', function($id)
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	if($db->ExecuteQuery("DELETE FROM rezervacija WHERE rezervacijaID=$id")){
		$response = "Uspesno!";
	}else{
		$response = "Neuspesno!";
	}

	echo indent(json_encode($response));



	/* $post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->novaRezervacija($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Neuspesno";

	}

	echo indent(json_encode($response)); */

});

Flight::start();
?>
