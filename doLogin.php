<?php
//ini_set('display_errors', 1);

require_once 'libs/models/kayttaja.php';
require_once 'libs/common.php';
require_once 'libs/models/elokuva.php';
	
	if(empty($_POST["tunnus"])) {
		naytaNakyma("login.php", array('virhe' => "Sisäänkirjautuminen epäonnistui. Et antanut käyttäjätunnusta.",));
	}
	
	$tunnus = $_POST["tunnus"];

	if(empty($_POST["salasana"])) {
		naytaNakyma("login.php", array(
	 	'kayttaja' => $tunnus,
	 	'virhe' => "Sisäänkirjautuminen epäonnistui. Et antanut salasanaa.",));
	}
	
	$salasana = $_POST["salasana"];
	
	$kayttaja = Kayttaja::getKayttajaTunnuksilla($tunnus, $salasana);
	
	if($kayttaja != null) {
		$_SESSION['kayttaja'] = $kayttaja;
		
		lahetaSivulle("etusivu.php");
	} else {
		naytaNakyma("login.php", array(
			'kayttaja' => $tunnus, 
			'virhe' => "Sisäänkirjautuminen epäonnistui. Antamasi tunnus tai salasana on väärä.",));
	}
