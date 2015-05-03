<?php
	require_once "libs/models/kayttaja.php";
	require_once "libs/common.php";
	require_once "libs/models/elokuva.php";
	
	onkoKirjautunut();
	
	$nimi = $_GET["nimi"];
	$nayttelija = $_GET["nayttelija"];
	$ohjaaja = $_GET["ohjaaja"];
	$kategoria = $_GET["kategoria"];
	
	if(empty($nimi) && empty($nayttelija) && empty($ohjaaja) && empty($kategoria)){
		naytaNakyma("haku.php", array('tyhjaHaku' => "Et antanut yhtään hakusanaa.",), "Haku");
	}else{
		$hakuTulos = elokuva::hae($nimi, $nayttelija, $ohjaaja, $kategoria);
		$maara = elokuva::kayttajanElokuvienMaara();
	
		if(empty($hakuTulos)){
			$hakuTulos = elokuva::haeKaikki();
			naytaNakyma("etusivu.php", array('tyhjaHaku' => "Haulla ei löytänyt mitään. Lista näyttää kaikki elokuvasi.",'tulos' => $hakuTulos, 'maara'=>$maara), "Etusivu");
		}else{
			naytaNakyma("etusivu.php", array('tulos' => $hakuTulos, 'maara'=>$maara), "Etusivu");
		}
	}
	
	
