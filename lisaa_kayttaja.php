<?php
//ini_set('display_errors', 1);

	require_once 'libs/models/kayttaja.php';
	require_once 'libs/common.php';

	if(empty($_POST["tunnus"])) {
		naytaNakyma("rekisteroityminen.php", array('virhe' => "Rekisteröityminen epäonnistui. Et antanut käyttäjätunnusta.",));
	}

	$tunnus = $_POST["tunnus"];

	if(empty($_POST["salasana1"])) {
		naytaNakyma("rekisteroityminen.php", array(
	 	'kayttaja' => $tunnus,
	 	'virhe' => "Rekisteröityminen epäonnistui. Et antanut salasanaa.",));
	}

	if(empty($_POST["salasana2"])) {
		naytaNakyma("rekisteroityminen.php", array(
	 	'kayttaja' => $tunnus,
	 	'virhe' => "Rekisteröityminen epäonnistui. Et antanut salasanaa toista kertaa.",));
	}

	if($_POST["salasana1"]!=$_POST["salasana2"]){
		naytaNakyma("rekisteroityminen.php", array(
	 	'kayttaja' => $tunnus,
	 	'virhe' => "Rekisteröityminen epäonnistui. Antamasi salasanat eivät olleet samat.",));
	}

	$kayttaja = Kayttaja::getKayttaja($tunnus);

	if($kayttaja!=null){
		naytaNakyma("rekisteroityminen.php", array('virhe' => "Rekisteröityminen epäonnistui. Käyttäjätunnus on jo käytössä.",));
	} else {
		$kayttaja = new Kayttaja();
		$kayttaja->setTunnus($tunnus);
		$kayttaja->setSalasana($_POST["salasana1"]);
		$kayttaja->lisaaKantaan();
		$kayttaja = Kayttaja::getKayttajaTunnuksilla($kayttaja->getTunnus(), $kayttaja->getSalasana());
		$_SESSION['kayttaja'] = $kayttaja;
		lahetaSivulle("etusivu.php");
	}

	

	

	
	
