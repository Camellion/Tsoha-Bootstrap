<?php
	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";
	require_once "libs/models/elokuva.php";
	
	onkoKirjautunut();
	
	$poistettava = $_GET['poistettava'];
	elokuva::poistaElokuva($poistettava);

	$_SESSION['ilmoitus'] = "Elokuva on nyt poistettu arkistosta.";
	lahetaSivulle("etusivu.php");
