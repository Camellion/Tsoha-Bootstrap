<?php
	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";
	require_once "libs/models/elokuva.php";
	
	onkoKirjautunut();
	
	$hakuTulos = elokuva::haeAakkosjarjestyksessa();
	$maara = elokuva::kayttajanElokuvienMaara();
	//require_once 'views/pohja.php';
	naytaNakyma("etusivu.php", array('tulos' => $hakuTulos, 'maara'=>$maara), 'Etusivu');
