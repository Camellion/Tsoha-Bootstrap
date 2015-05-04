<div class="container">
	<h1>Elokuva-arkisto</h1>
	<p>Käyttäjän <b><?php echo htmlspecialchars($_SESSION['kayttaja']->getTunnus()); ?></b> tietokannassa on tallennettuna yhteensä <b><?php echo htmlspecialchars($data->maara); ?></b> elokuvaa.</p>
	
	<table id="pystytila">
		<tr>
			<td><form action="aakkosjarj.php"><button type="submit" class="btn btn-primary">Listaa aakkosjärjestyksessä</button></form></td>
			<td class="vaakatila"></td>
			<td><a href="lisaa_elokuva.php"><button class="btn btn-success">Lisää uusi elokuva</button></a></td>
		<tr>
	<table>
</div>

<div  class="container">
<?php if (!empty($data->tyhjaHaku)): ?>
<br>
		<div class="alert alert-danger"><?php echo $data->tyhjaHaku; ?><br></div>
	<?php endif; ?>
	
	<?php if (!empty($_SESSION['ilmoitus'])): ?>
	<br>
  <div class="alert alert-success">
    <?php echo $_SESSION['ilmoitus']; ?>
  </div>
</div>

<?php
  unset($_SESSION['ilmoitus']); 
  endif;
?>

<div class="container">
    <h1>Elokuvat</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Elokuvan nimi</th>
          <th>Julkaisuvuosi</th>
          <th>Elokuvan kesto</th>
          <th>Elokuvan kieli</th>
          <th> </th>
        </tr>
      </thead>
	  <tbody>
	    <?php foreach($data->tulos as $rivi=>$tieto):?>
		  <tr>
			<td> <?php echo htmlspecialchars($tieto['nimi']); ?></td>
			<td> <?php echo htmlspecialchars($tieto['vuosi']); ?></td>
			<td> <?php echo htmlspecialchars($tieto['kesto']); ?> min</td>
			<td> <?php echo htmlspecialchars($tieto['kieli']); ?></td>
			<td><a class="btn btn-primary" href="elokuvan_tiedot.php?id=<?php echo htmlspecialchars($tieto['idtunnus']); ?>">Lisätietoja (+muokkaus)</a></td>
		  </tr>
	    <?php endforeach; ?>
      </tbody>
    </table>
</div>
