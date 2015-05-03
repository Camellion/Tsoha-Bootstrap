<?php
	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";
	require_once "libs/models/elokuva.php";
	
	onkoKirjautunut();
	
	if (empty($_POST)) {
		naytaNakyma("lomake.php", array('arvot'=>new Elokuva()), 'Uusi elokuva');
	}
	
	$uusiE = new Elokuva();
	$uusiE->setNimi($_POST['nimi']);
	$uusiE->setKesto($_POST['kesto']);
	$uusiE->setVuosi($_POST['vuosi']);
	$uusiE->setIkaraja($_POST['ikaraja']);
	$uusiE->setKieli($_POST['kieli']);
	$uusiE->setNahty($_POST['nahty']);
	$uusiE->asetaNayttelijat($_POST['nayttelija1'], $_POST['nayttelija2'], $_POST['nayttelija3']);
	$uusiE->asetaOhjaajat($_POST['ohjaaja1'], $_POST['ohjaaja2'], $_POST['ohjaaja3']);
	$uusiE->asetaKategoriat($_POST['kategoria1'], $_POST['kategoria2'], $_POST['kategoria3']);
		

	if($uusiE->onkoKelvollinen()){
		$uusiE->lisaaKantaan();
		elokuva::setNayttelija($_POST['nayttelija1'], $uusiE->getId());
		elokuva::setNayttelija($_POST['nayttelija2'], $uusiE->getId());
		elokuva::setNayttelija($_POST['nayttelija3'], $uusiE->getId());
		elokuva::setOhjaaja($_POST['ohjaaja1'], $uusiE->getId());
		elokuva::setOhjaaja($_POST['ohjaaja2'], $uusiE->getId());
		elokuva::setOhjaaja($_POST['ohjaaja3'], $uusiE->getId());
		elokuva::setKategoria($_POST['kategoria1'], $uusiE->getId());
		elokuva::setKategoria($_POST['kategoria2'], $uusiE->getId());
		elokuva::setKategoria($_POST['kategoria3'], $uusiE->getId());
		$_SESSION['ilmoitus'] = "Uusi elokuva lisättiin onnistuneesti!";
		lahetaSivulle("etusivu.php");
	}else{
		$virheet = $uusiE->getVirheet();
		naytaNakyma("lomake.php", array('virheet'=>$virheet, 'arvot'=>$uusiE), 'Uusi elokuva');
	}
	
	
