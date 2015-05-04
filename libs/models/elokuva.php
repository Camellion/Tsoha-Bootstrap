<?php
require_once "libs/models/kayttaja.php";
require_once "libs/yhteys.php";

class Elokuva {
	private $id;
	private $nimi;
	private $kesto;
	private $ikaraja;
	private $vuosi;
	private $kieli;
	private $virheet;
	private $nayttelija1;
	private $nayttelija2;
	private $nayttelija3;
	private $ohjaaja1;
	private $ohjaaja2;
	private $ohjaaja3;
	private $kategoria1;
	private $kategoria2;
	private $kategoria3;
	
	public function setNimi($nimi){
		$this->nimi = $nimi;
		
		if(trim($this->nimi) ==''){
			$this->virheet['nimi'] = "Nimi ei saa olla tyhjä.";
		}else if(strlen(trim($this->nimi)) >100){
			$this->virheet['nimi'] = "Nimi ei saa olla yli 100 merkkiä.";
		} else{
			unset($this->virheet['nimi']);	
		}	
	}
	
	public function setKesto($kesto){
		$this->kesto = $kesto;
		
		if(!is_numeric($kesto) && $kesto!=''){
			$this->virheet['kesto'] = "Kesto pitää antaa numeroina.";
		} else if(!is_numeric($kesto)){
			$this->kesto = null;
			unset($this->virheet['kesto']);
		} else if($this->kesto >=10000){
			$this->virheet['kesto'] = "Kesto voi olla vain 4 merkkiä pitkä.";
		} else {
			unset($this->virheet['kesto']);
		}
		
	}
	
	public function setIkaraja($ikaraja){
		$this->ikaraja = $ikaraja;
		
		if(!is_numeric($ikaraja) && $ikaraja!=''){
			$this->virheet['ikaraja'] = "Ikäraja pitää antaa numeroina.";
		} else if(!is_numeric($ikaraja)){
			$this->ikaraja = null;
			unset($this->virheet['ikaraja']);
		} else {
			unset($this->virheet['ikaraja']);
		}

	}
	
	public function setVuosi($vuosi){
		$this->vuosi = $vuosi;
		
		if(!is_numeric($vuosi) && $vuosi!=''){
			$this->virheet['vuosi'] = "Vuosi pitää antaa numeroina.";
		} else if(!is_numeric($vuosi)){
			$this->vuosi = null;
			unset($this->virheet['vuosi']);
		}  else if($this->vuosi >=10000){
			$this->virheet['vuosi'] = "Vuosiluvussa voi olla vain 4 merkkiä.";
		} else {
			unset($this->virheet['vuosi']);
		}
	}
	
	public function setKieli($kieli){
		$this->kieli = $kieli;

		if(strlen(trim($this->kieli)) >50){
			$this->virheet['kieli'] = "Kielitiedot voivat olla 50 merkkiä.";
		} else {
			unset($this->virheet['kieli']);
		}
	}
		
	public function asetaNayttelijat($n1, $n2, $n3){
		$this->nayttelija1 = $n1;
		$this->nayttelija2 = $n2;
		$this->nayttelija3 = $n3;
		if(strlen(trim($this->nayttelija1)) >50 || strlen(trim($this->nayttelija2)) >50 || strlen(trim($this->nayttelija3)) >50){
			$this->virheet['nayttelija'] = "Näyttelijän nimi voi olla 50 merkkiä.";
		} else {
			unset($this->virheet['nayttelija']);
		}
		
	}
	
	public function asetaOhjaajat($o1, $o2, $o3){
		$this->ohjaaja1 = $o1;
		$this->ohjaaja2 = $o2;
		$this->ohjaaja2 = $o3;

		if(strlen(trim($this->ohjaaja1)) >50 || strlen(trim($this->ohjaaja2)) >50 || strlen(trim($this->ohjaaja3)) >50){
			$this->virheet['ohjaaja'] = "Ohjaajan nimi voi olla 50 merkkiä.";
		} else {
			unset($this->virheet['ohjaaja']);
		}
	}
	
	public function asetaKategoriat($k1, $k2, $k3){
		$this->kategoria1 = $k1;
		$this->kategoria2 = $k2;
		$this->kategoria3 = $k3;

		if(strlen(trim($this->kategoria1)) >50 || strlen(trim($this->kategoria2)) >50 || strlen(trim($this->kategoria3)) >30){
			$this->virheet['kategoria'] = "Kategorian nimi voi olla 30 merkkiä.";
		} else {
			unset($this->virheet['kategoria']);
		}
	}
	
	public function getNimi(){
		return $this->nimi;
	}
	
	public function getKesto(){
		return $this->kesto;
	}
	
	public function getIkaraja(){
		return $this->ikaraja;
	}
	
	public function getVuosi(){
		return $this->vuosi;
	}
	
	public function getKieli(){
		return $this->kieli;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getNayttelija1(){
		return $this->nayttelija1;
	}
	
	public function getNayttelija2(){
		return $this->nayttelija2;
	}
	
	public function getNayttelija3(){
		return $this->nayttelija3;
	}
	
	public function getOhjaaja1(){
		return $this->ohjaaja1;
	}
	
	public function getOhjaaja2(){
		return $this->ohjaaja2;
	}
	
	public function getOhjaaja3(){
		return $this->ohjaaja3;
	}
	
	public function getKategoria1(){
		return $this->kategoria1;
	}
	
	public function getKategoria2(){
		return $this->kategoria2;
	}
	
	public function getKategoria3(){
		return $this->kategoria3;
	}
	
	public function lisaaKantaan(){
		$sql = "INSERT INTO Elokuva(nimi, kesto, ikaraja, vuosi, kieli, kayttaja) 
				VALUES(?,?,?,?,?,?) 
				RETURNING idtunnus";
		$kysely = annayhteys() -> prepare($sql);
		$ok = $kysely-> execute(array($this->getNimi(), $this->getKesto(), $this->getIkaraja(), $this->getVuosi(), $this->getKieli(), $_SESSION['kayttaja']->getKayttajaId()));
		if($ok){
			$this->id = $kysely->fetchColumn();
		}
		return $ok;
	}
	
	public function onkoKelvollinen(){
		return empty($this->virheet);
	}
	
	public function getVirheet(){
		return $this->virheet;
	}
	
	public static function etsiElokuva($id){
		$sql = "SELECT *
				FROM elokuva
				WHERE idtunnus = ? LIMIT 1";
		$kysely = annayhteys() -> prepare($sql);	
		$kysely -> execute(array($id));
		$tulos = $kysely -> fetchObject();
		
		if($tulos==null){
			return null;
		} else {
			$elokuva = new Elokuva();
			$elokuva->id = $tulos->idtunnus;
			$elokuva->nimi = $tulos->nimi;
			$elokuva->kesto = $tulos->kesto;
			$elokuva->vuosi = $tulos->vuosi;
			$elokuva->ikaraja = $tulos->ikaraja;
			$elokuva->kieli = $tulos->kieli;

			$nayttelijat = self::etsiNayttelijat($elokuva->id);
			
			$elokuva->nayttelija1 = $nayttelijat[0];
			$elokuva->nayttelija2 = $nayttelijat[1];
			$elokuva->nayttelija3 = $nayttelijat[2];
			
			$ohjaajat = self::etsiOhjaajat($elokuva->id);
			
			$elokuva->ohjaaja1 = $ohjaajat[0];
			$elokuva->ohjaaja2 = $ohjaajat[1];
			$elokuva->ohjaaja3 = $ohjaajat[2];
			
			$kategoriat = self::etsiKategoriat($elokuva->id);
			
			$elokuva->kategoria1 = $kategoriat[0];
			$elokuva->kategoria2 = $kategoriat[1];
			$elokuva->kategoria3 = $kategoriat[2];
			
			return $elokuva;
		}
		
	}
	
	function hae($nimi, $nayttelija, $ohjaaja, $kategoria){
		$nimi = "%$nimi%";
		$sql = "SELECT elokuva.idtunnus, elokuva.nimi, elokuva.vuosi, elokuva.kesto, elokuva.kieli
				FROM elokuva";
		$joins = '';
		$wheres = array();
		$data = array();
	
		if($nimi!=null){
			$wheres[] = "elokuva.nimi LIKE ?";
			$data[]= $nimi;
		}
		
		if($nayttelija!=null){
			$joins = $joins." JOIN roolisuoritus ON roolisuoritus.elokuva = elokuva.idtunnus 
			JOIN henkilo ON nayttelija = henkilo.idtunnus";
			$wheres[] = "henkilo.nimi = ?";
			$data[] =$nayttelija;
		}
		
		if($ohjaaja!=null){
			$joins = $joins." JOIN ohjaus ON ohjaus.elokuva = elokuva.idtunnus
			JOIN henkilo ON ohjaaja = henkilo.idtunnus";
			$wheres[] ="henkilo.nimi = ?"; 
			$data[] = $ohjaaja;
		}
		
		if($kategoria!=null){
			$joins = $joins." JOIN luokitus ON luokitus.elokuva = elokuva.idtunnus
			JOIN kategoria ON luokitus.kategoria = kategoria.idtunnus";
			$wheres[] = "kategoria.nimi = ?";
			$data[] = $kategoria;
		}
		
		$wheres = implode(" AND ",$wheres);
		$sql = $sql.$joins.' WHERE '.$wheres.' AND kayttaja = ?';
		$data[] = $_SESSION['kayttaja']->getKayttajaId();
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute($data);
		$tulos = $kysely -> fetchAll(PDO::FETCH_ASSOC);
		
		return $tulos;
	}

	function haeAakkosjarjestyksessa(){
		$sql = "SELECT idtunnus, nimi, vuosi, kesto, kieli
				FROM elokuva WHERE kayttaja = ? ORDER BY nimi ASC";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($_SESSION['kayttaja']->getKayttajaId()));
		$tulos = $kysely -> fetchAll(PDO::FETCH_ASSOC);
		
		return $tulos;
	}
	
	function haeKaikki(){
	//session_start();
		$sql = "SELECT idtunnus, nimi, vuosi, kesto, kieli
			FROM elokuva WHERE kayttaja = ? ORDER BY elokuva.idtunnus DESC";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($_SESSION['kayttaja']->getKayttajaId()));
		$tulos = $kysely -> fetchAll(PDO::FETCH_ASSOC);
		
		return $tulos;
	}
	
	function setNayttelija($nayttelija, $elokuva){
	
		if($nayttelija != null){
			$sql = "SELECT idtunnus
					FROM henkilo
					WHERE nimi LIKE ?";
			$kysely = annayhteys() -> prepare($sql);
			$kysely -> execute(array($nayttelija));
			$tulos = $kysely -> fetchColumn();
			
			if($tulos == false){
				self::lisaaNayttelijaKantaan($nayttelija, $elokuva);
			} else {
				self::setRoolisuoritus($tulos, $elokuva);
			}
		}
	}
	
	private function lisaaNayttelijaKantaan($nayttelija, $elokuva){
		$sql = "INSERT INTO henkilo(nimi)
				VALUES (?)
				RETURNING idtunnus";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($nayttelija));
		$nayttelijaId = $kysely -> fetchColumn();
		self::setRoolisuoritus($nayttelijaId, $elokuva);
	}
	
	private function setRoolisuoritus($nayttelijaId, $elokuvaId){
		$sql = "INSERT INTO roolisuoritus(elokuva, nayttelija)
				VALUES (?,?)";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId, $nayttelijaId));
	}
	
	function setOhjaaja($ohjaaja, $elokuva){
		if($ohjaaja != null){
			$sql = "SELECT idtunnus
					FROM henkilo
					WHERE nimi LIKE ?";
			$kysely = annayhteys() -> prepare($sql);
			$kysely -> execute(array($ohjaaja));
			$tulos = $kysely -> fetchColumn();
			
			if($tulos == false){
				self::lisaaOhjaajaKantaan($ohjaaja, $elokuva);
			} else {
				self::setOhjaus($tulos, $elokuva);
			}
		}
	}
	
	private function lisaaOhjaajaKantaan($ohjaaja, $elokuva){
		$sql = "INSERT INTO henkilo(nimi)
				VALUES (?)
				RETURNING idtunnus";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($ohjaaja));
		$ohjaajaId = $kysely -> fetchColumn();
		self::setOhjaus($ohjaajaId, $elokuva);
	}
	
	private function setOhjaus($ohjaajaId, $elokuvaId){
		$sql = "INSERT INTO ohjaus(elokuva, ohjaaja)
				VALUES (?,?)";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId, $ohjaajaId));
	}
	
	function setKategoria($kategoria, $elokuva){
		if($kategoria != null){
			$sql = "SELECT idtunnus
					FROM kategoria
					WHERE nimi LIKE ?";
			$kysely = annayhteys() -> prepare($sql);
			$kysely -> execute(array($kategoria));
			$tulos = $kysely -> fetchColumn();
			
			if($tulos == false){
				self::lisaaKategoriaKantaan($kategoria, $elokuva);
			} else {
				self::setLuokitus($tulos, $elokuva);
			}
		}
	}
	
	private function lisaaKategoriaKantaan($kategoria, $elokuva){
		$sql = "INSERT INTO kategoria(nimi)
				VALUES (?)
				RETURNING idtunnus";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($kategoria));
		$kategoriaId = $kysely -> fetchColumn();
		self::setLuokitus($kategoriaId, $elokuva);
	}
	
	private function setLuokitus($kategoriaId, $elokuvaId){
		$sql = "INSERT INTO luokitus(elokuva, kategoria)
				VALUES (?,?)";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId, $kategoriaId));
	}
	
	function etsiNayttelijat($elokuvaId){
		$sql = "SELECT nimi
				FROM roolisuoritus
				INNER JOIN henkilo ON nayttelija = henkilo.idtunnus
				WHERE elokuva = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId));
		$tulos = $kysely -> fetchAll(PDO::FETCH_COLUMN);
		
		return $tulos;
	}
	
	function etsiOhjaajat($elokuvaId){
		$sql = "SELECT nimi
				FROM ohjaus
				INNER JOIN henkilo ON ohjaaja = henkilo.idtunnus
				WHERE elokuva = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId));
		$tulos = $kysely -> fetchAll(PDO::FETCH_COLUMN);
		
		return $tulos;
	}
	
	function etsiKategoriat($elokuvaId){
		$sql = "SELECT nimi
				FROM luokitus
				INNER JOIN kategoria ON kategoria = kategoria.idtunnus
				WHERE elokuva = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId));
		$tulos = $kysely -> fetchAll(PDO::FETCH_COLUMN);
		
		return $tulos;
	}
	
	function poistaElokuva($elokuvaId){
		$sql = "DELETE
				FROM elokuva
				WHERE idtunnus = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId));
	}
	
	function poistaRoolisuoritukset($elokuvaId){
		$sql = "DELETE
				FROM roolisuoritus
				WHERE elokuva = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId));
	}
	
	function poistaOhjaukset($elokuvaId){
		$sql = "DELETE
				FROM ohjaus
				WHERE elokuva = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId));
	}
	
	function poistaLuokitukset($elokuvaId){
		$sql = "DELETE
				FROM luokitus
				WHERE elokuva = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuvaId));
	}
	
	function tallennaMuokattuElokuva($elokuva){
		$sql = "UPDATE elokuva
				SET nimi = ?, kesto = ?, ikaraja = ?, vuosi = ?, kieli = ?
				WHERE idtunnus = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely -> execute(array($elokuva->getNimi(), $elokuva->getKesto(), $elokuva->getIkaraja(), $elokuva->getVuosi(), $elokuva->getKieli(), $elokuva->getId()));
	}

	function tallennaMuokattuRoolisuoritus($elokuva, $nayttelija1, $nayttelija2, $nayttelija3){
		self::poistaRoolisuoritukset($elokuva->getId());
		self::setNayttelija($nayttelija1, $elokuva->getId());
		self::setNayttelija($nayttelija2, $elokuva->getId());
		self::setNayttelija($nayttelija3, $elokuva->getId());
	}

	function tallennaMuokattuOhjaus($elokuva, $ohjaaja1, $ohjaaja2, $ohjaaja3){
		self::poistaOhjaukset($elokuva->getId());
		self::setOhjaaja($ohjaaja1, $elokuva->getId());
		self::setOhjaaja($ohjaaja2, $elokuva->getId());
		self::setOhjaaja($ohjaaja3, $elokuva->getId());
	}

	function tallennaMuokattuLuokitus($elokuva, $kategoria1, $kategoria2, $kategoria3){
		self::poistaLuokitukset($elokuva->getId());
		self::setKategoria($kategoria1, $elokuva->getId());
		self::setKategoria($kategoria2, $elokuva->getId());
		self::setKategoria($kategoria3, $elokuva->getId());
	}

	function poistaKayttajanElokuvat($kayttajaId){
		$sql = "DELETE
				FROM elokuva
				WHERE kayttaja = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely->execute(array($kayttajaId));
	}

	function kayttajanElokuvienMaara(){
		$sql = "SELECT count(*)
				FROM elokuva
				WHERE kayttaja = ?";
		$kysely = annayhteys() -> prepare($sql);
		$kysely->execute(array($_SESSION['kayttaja']->getKayttajaId()));
		$maara = $kysely->fetchColumn();

		return $maara;
	}
	
}
