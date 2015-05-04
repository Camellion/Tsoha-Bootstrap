<?php
//ini_set('display_errors', 1);

require_once "libs/yhteys.php"; 
require_once "libs/models/kayttaja.php";

$lista = Kayttaja::getKayttajat();
?><!DOCTYPE HTML>
<html>
  <head><title>Käyttäjät</title></head>
  <body>
    <h1>Käyttäjät</h1>
    <ul>
    <?php foreach($lista as $asia) { ?>
      <li><?php echo $asia->getTunnus(); ?></li>
    <?php } ?>
    </ul>
  </body>
</html>
