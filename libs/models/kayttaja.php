<?php
require_once "libs/yhteys.php";
class Kayttaja {
  
	private $id;
	private $tunnus;
	private $salasana;

 
	public function setTunnus($tunnus){
		$this->tunnus = $tunnus;
	}

	public function setSalasana($salasana){
		$this->salasana = $salasana;
	}

	public function setId($id){
		$this->id = $id;
	}
  
	public static function getKayttajat() {
		$sql = "SELECT idtunnus,tunnus, salasana from kayttaja";
		$kysely = annaYhteys()->prepare($sql); 
		$kysely->execute();
    
		$tulokset = array();
		
		foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
			$kayttaja = new Kayttaja();
			$kayttaja->setTunnus($tulos->tunnus); 
			$kayttaja->setSalasana($tulos->salasana);
			$kayttaja->setId($tulos->idtunnus);
			$tulokset[] = $kayttaja;
		}
		
		return $tulokset;
	}
  
	public function getTunnus(){
		return $this->tunnus;
	}
  
	public function getSalasana(){
		return $this->salasana;
	}
  
	public function getKayttajaId(){
		return $this->id;
	}

	public static function getKayttajaTunnuksilla($kayttaja, $salasana) {
		$sql = "SELECT idtunnus, tunnus, salasana 
				FROM kayttaja 
				WHERE tunnus = ? AND salasana = ? LIMIT 1";
		$kysely = annaYhteys()->prepare($sql);
		$kysely->execute(array($kayttaja, $salasana));

		$tulos = $kysely->fetchObject();
		
		if ($tulos == null){
			return null;
		} else {
		$kayttaja = new Kayttaja();
		$kayttaja->id = $tulos->idtunnus;
		$kayttaja->tunnus = $tulos->tunnus;
		$kayttaja->salasana = $tulos->salasana;
		return $kayttaja;
		}
	}

	public function getKayttaja($tunnus){
		$sql = "SELECT tunnus 
				FROM kayttaja 
				WHERE tunnus = ? LIMIT 1";
		$kysely = annaYhteys()->prepare($sql);
		$kysely->execute(array($tunnus));

		$tulos = $kysely->fetchObject();
		
		if ($tulos == null){
			return null;
		} else {
		$kayttaja = new Kayttaja();
		$kayttaja->id = $tulos->idtunnus;
		$kayttaja->tunnut = $tulos->tunnus;
		$kayttaja->salasana = $tulos->salasana;
		return $kayttaja;
		}
	}

	public function lisaaKantaan(){
		$sql = "INSERT INTO Kayttaja(tunnus, salasana)
				VALUES(?,?)
				RETURNING idtunnus";
		$kysely = annayhteys() -> prepare($sql);
		$ok = $kysely-> execute(array($this->getTunnus(), $this->getSalasana()));
		if($ok){
			$this->id = $kysely->fetchColumn();
		}

		return $ok;
	}

	function poistaKayttaja($id){
		$sql = "DELETE
				FROM kayttaja
				WHERE idtunnus = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($id));
	}

	function vaihdaSalasanaKantaan($uusiS){
		$sql = "UPDATE kayttaja
				SET salasana = ?
				WHERE idtunnus = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($uusiS, $_SESSION['kayttaja']->getKayttajaId()));
	}

}
