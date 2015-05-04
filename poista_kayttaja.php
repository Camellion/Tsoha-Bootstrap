<?php
//ini_set('display_errors', 1);

	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";
	require_once "libs/models/elokuva.php";

	onkoKirjautunut();

	kayttaja::poistaKayttaja($_SESSION['kayttaja']->getKayttajaId());

	lahetaSivulle('logOut.php');

	
