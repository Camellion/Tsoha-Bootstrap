<?php
	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";

	onkoKirjautunut();

	if(empty($_POST["vanhaS"])) {
		naytaNakyma("omat_tiedot.php", array('virhe' => "Salasanan vaihtaminen epäonnistui. Et antanut vanhaa salasanaasi.",), "Omat tiedot");
	}

	if(empty($_POST["uusiS1"])) {
		naytaNakyma("omat_tiedot.php", array('virhe' => "Salasanan vaihtaminen epäonnistui. Et antanut uutta salasanaa.",), "Omat tiedot");
	}

	if(empty($_POST["uusiS2"])) {
		naytaNakyma("omat_tiedot.php", array('virhe' => "Salasanan vaihtaminen epäonnistui. Et antanut uutta salasanaa uudelleen.",), "Omat tiedot");
	}

	if($_POST["vanhaS"]!=$_SESSION['kayttaja']->getSalasana()) {
		naytaNakyma("omat_tiedot.php", array('virhe' => "Salasanan vaihtaminen epäonnistui. Vanha salasana on väärä.",), "Omat tiedot");
	}

	if($_POST["uusiS1"]!=$_POST["uusiS2"]) {
		naytaNakyma("omat_tiedot.php", array('virhe' => "Salasanan vaihtaminen epäonnistui. Uudet salasanat eivät olleet samat.",), "Omat tiedot");
	}

	kayttaja::vaihdaSalasanaKantaan($_POST["uusiS1"]);

	lahetaSivulle('etusivu.php');
