<?php
//ini_set('display_errors', 1);

	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";
	require_once "libs/models/elokuva.php";
	
	onkoKirjautunut();
	
	$haettava = $_GET["id"];
	$tulos = elokuva::etsiElokuva($haettava);
	naytaNakyma("elokuvan_tiedot.php",array('tulos'=>$tulos), 'Elokuvan tiedot');
