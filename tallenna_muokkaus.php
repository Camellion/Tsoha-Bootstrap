<?php
	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";
	require_once "libs/models/elokuva.php";
	
	onkoKirjautunut();
	
	if (empty($_POST)) {
		naytaNakyma("elokuvan_tiedot.php", array(), 'Muokkaa elokuvaa');
	}
	
	$elokuva = elokuva::etsiElokuva($_POST['talletettava']);
	
	$elokuva->setNimi($_POST['nimi']);
	$elokuva->setKesto($_POST['kesto']);
	$elokuva->setVuosi($_POST['vuosi']);
	$elokuva->setIkaraja($_POST['ikaraja']);
	$elokuva->setKieli($_POST['kieli']);
	$elokuva->setNahty($_POST['nahty']);
	$elokuva->asetaNayttelijat($_POST['nayttelija1'], $_POST['nayttelija2'], $_POST['nayttelija3']);
	$elokuva->asetaOhjaajat($_POST['ohjaaja1'], $_POST['ohjaaja2'], $_POST['ohjaaja3']);
	$elokuva->asetaKategoriat($_POST['kategoria1'], $_POST['kategoria2'], $_POST['kategoria3']);
	
	if($elokuva->onkoKelvollinen()){
		
		elokuva::tallennaMuokattuElokuva($elokuva);
		elokuva::setNayttelija($_POST['nayttelija1'], $elokuva->getId());
		elokuva::setNayttelija($_POST['nayttelija2'], $elokuva->getId());
		elokuva::setNayttelija($_POST['nayttelija3'], $elokuva->getId());
		elokuva::setOhjaaja($_POST['ohjaaja1'], $elokuva->getId());
		elokuva::setOhjaaja($_POST['ohjaaja2'], $elokuva->getId());
		elokuva::setOhjaaja($_POST['ohjaaja3'], $elokuva->getId());
		elokuva::setKategoria($_POST['kategoria1'], $elokuva->getId());
		elokuva::setKategoria($_POST['kategoria2'], $elokuva->getId());
		elokuva::setKategoria($_POST['kategoria3'], $elokuva->getId());
		elokuva::tallennaMuokattuRoolisuoritus($elokuva, $_POST['nayttelija1'],$_POST['nayttelija2'],$_POST['nayttelija3']);
		elokuva::tallennaMuokattuOhjaus($elokuva, $_POST['ohjaaja1'], $_POST['ohjaaja2'], $_POST['ohjaaja3']);
		elokuva::tallennaMuokattuLuokitus($elokuva, $_POST['kategoria1'],$_POST['kategoria2'],$_POST['kategoria3']);
		$tulos=elokuva::haeKaikki();
		$_SESSION['ilmoitus'] = "Elokuva tallennettiin onnistuneesti!";
		lahetaSivulle("etusivu.php", array('tulos'=>$tulos));
	}else{
		$virheet = $elokuva->getVirheet();
		naytaNakyma("elokuvan_tiedot.php", array('virheet'=>$virheet, 'tulos'=>$elokuva), 'Muokkaa elokuvaa');
	}
