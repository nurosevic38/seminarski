<?php

class Let {

	private $conn;
	private $result;


	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function getResult(){
		return $this->result;
	}

	public function setResult($res){
			$this->result = $res;
	}

	public function sviLetovi() {

		$curl_zahtev = curl_init("http://localhost/rezervacije/api/letovi.json");

		curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
		curl_close($curl_zahtev);
		$this->setResult($json_objekat);
	//	$q=mysqli_query($this->conn,"SELECT * FROM let as l join klasa as k on(l.klasa=k.idKlase)");
	//	$this->setResult($q);
	}

	public function sveKlase() {

		$curl_zahtev = curl_init("http://localhost/rezervacije/api/klase.json");

		curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
		curl_close($curl_zahtev);
		$this->setResult($json_objekat);
		//$q=mysqli_query($this->conn,"SELECT * FROM klasa");
		//$this->setResult($q);
	}

	public function allReservationBySearch($id) {
		$id = mysqli_real_escape_string($this->conn,$id);

		$q = mysqli_query($this->conn, "SELECT * FROM rezervacija as r join let as l on (r.let=l.id ) join klasa as k on (l.klasa=k.idKlase) join korisnik as u on (u.idKorisnik=r.korisnik) where r.let = $id");
		$this->setResult($q);
	}


	public function rezervacija($datum,$let,$brojSedista) {

			$datum = mysqli_real_escape_string($this->conn,$datum);
			
			$let = mysqli_real_escape_string($this->conn,$let);
			$korisnik = $_SESSION["user"]["idKorisnik"];
			$brojSedista = mysqli_real_escape_string($this->conn,$brojSedista);			
			$timestamp = date('Y-m-d H:i:s', strtotime($datum));

			if($brSedista<0 or $brSedista>60)
			{
				$this->setResult(false);
				return;
			}

			$data = Array (
				"datum" => $timestamp,
				"let" => $let,
				"korisnik" => $korisnik,
				"brojSedista" => $brojSedista
				
				);

				$zaSlanje = json_encode($data);

				$curl_zahtev = curl_init("http://localhost/rezervacije/api/unosRezervacije.json");
				curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
				curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $zaSlanje);
				curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
				$curl_odgovor = curl_exec($curl_zahtev);
				$json_objekat=json_decode($curl_odgovor, true);
				curl_close($curl_zahtev);
		//	$q = mysqli_query($this->conn, "INSERT INTO let (mestoOd,mestoDo,klasa,cena) VALUES ('$gradOd','$gradDo',$klasa,'$cena')");
		/* 	if($q == "Uspesno!") {
				$this->setResult(true);
			}
			else {
				$this->setResult(false);
			} */
				if($json_objekat == "Uspesno!") {
					$this->setResult(true);
				}
				else {
					$this->setResult(false);
				}




			/* $sql = "INSERT INTO rezervacija (datum,let,korisnik,brojSedista) VALUES ('$timestamp',$letId,$userID,$brSedista)";
			
		if(mysqli_query($this->conn, $sql)){
			$this->setResult(true);
		}else{
			$this->setResult(false);
		}; */

	}

	public function obrisiRez($id){
		$curl_zahtev = curl_init("http://localhost/rezervacije/api/rezervacija/$id");

		curl_setopt($curl_zahtev, CURLOPT_CUSTOMREQUEST, "DELETE");
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
    	curl_close($curl_zahtev);
	if($json_objekat == "Uspesno!") {
		$this->setResult(true);
	}
	else {
		$this->setResult(false);
	}
	}

	public function unosLeta($mestoOd,$mestoDo,$klasa,$cena) {

			$mestoOd = mysqli_real_escape_string($this->conn,$mestoOd);
			$mestoDo = mysqli_real_escape_string($this->conn,$mestoDo);
			$klasa = mysqli_real_escape_string($this->conn,$klasa);
			$cena = mysqli_real_escape_string($this->conn,$cena);

			$data = Array (
	    "mestoOd" => $mestoOd,
	    "mestoDo" => $mestoDo,
		"klasa" => $klasa,
		"cena" => $cena
	    
	    );

				$zaSlanje = json_encode($data);

				$curl_zahtev = curl_init("http://localhost/rezervacije/api/unosLeta.json");
				curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
				curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $zaSlanje);
				curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
				$curl_odgovor = curl_exec($curl_zahtev);
				$json_objekat=json_decode($curl_odgovor, true);
				curl_close($curl_zahtev);
		//	$q = mysqli_query($this->conn, "INSERT INTO let (mestoOd,mestoDo,klasa,cena) VALUES ('$gradOd','$gradDo',$klasa,'$cena')");
		/* 	if($q == "Uspesno!") {
				$this->setResult(true);
			}
			else {
				$this->setResult(false);
			} */
				if($json_objekat == "Uspesno!") {
					$this->setResult(true);
				}
				else {
					$this->setResult(false);
				}

	}


	public function izmenaLet($mestoOd,$klasa,$cena) {

		$mestoOd = mysqli_real_escape_string($this->conn,$mestoOd);
	
		$klasa = mysqli_real_escape_string($this->conn,$klasa);
		$cena = mysqli_real_escape_string($this->conn,$cena);
	
		if(mysqli_query($this->conn, "UPDATE let SET klasa=$klasa,cena='$cena' WHERE id=$mestoOd")){
			$this->setResult(true);
		}else{
			$this->setResult(false);
		};

	}



}

?>