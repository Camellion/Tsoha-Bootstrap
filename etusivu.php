<?php
	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";
	require_once "libs/models/elokuva.php";
	
	onkoKirjautunut();
	$hakuTulos = elokuva::haeKaikki();
	$maara = elokuva::kayttajanElokuvienMaara();

	naytaNakyma("etusivu.php", array('tulos' => $hakuTulos, 'maara' => $maara), 'Etusivu');
