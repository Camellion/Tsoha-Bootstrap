<div class="container">
    <h1>Elokuvan tiedot</h1>
    
    <p>Tarkastele tai muokkaa elokuvan tietoja.</p>

    <?php if (!empty($data->virheet)): ?>
		<div class="alert alert-danger">
			<?php foreach($data->virheet as $virhe):?>
				<?php echo $virhe; ?><br>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
    	
    <form class="form-horizontal" role="form" action="tallenna_muokkaus.php" method="POST">
      <div class="form-group">
        <label for="elokuva" class="col-md-2 control-label">Elokuvan nimi</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="<?php echo htmlspecialchars($data->tulos->getNimi()); ?>" name="nimi" placeholder="nimi">
        </div>
      </div>
      <div class="form-group">
        <label for="kesto" class="col-md-2 control-label">Kesto (min)</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="<?php echo htmlspecialchars($data->tulos->getKesto()); ?>" name="kesto" placeholder="kesto">
        </div>
      </div>
      <div class="form-group">
        <label for="vuosi" class="col-md-2 control-label">Julkaisuvuosi</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="<?php echo htmlspecialchars($data->tulos->getVuosi()); ?>" name="vuosi" placeholder="Julkaisuvuosi">
        </div>
      </div>
      <div class="form-group">
        <label for="ikaraja" class="col-md-2 control-label">Ikäraja</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="<?php echo htmlspecialchars($data->tulos->getIkaraja()); ?>" name="ikaraja" placeholder="Ikäraja">
        </div>
      </div>
      <div class="form-group">
        <label for="kieli" class="col-md-2 control-label">Kieli</label>
        <div class="col-md-10">
          <input type="text" class="form-control" value="<?php echo htmlspecialchars($data->tulos->getKieli()); ?>" name="kieli" placeholder="Kieli">
        </div>
      </div>
      <div class="form-group">
        <label for="naytttelija" class="col-md-2 control-label">Näyttelijä</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nayttelija1" value="<?php echo htmlspecialchars($data->tulos->getNayttelija1()); ?>" placeholder="näyttelijä">
        </div>
      </div>
      <div class="form-group">
        <label for="naytttelija" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nayttelija2" value="<?php echo htmlspecialchars($data->tulos->getNayttelija2()); ?>" placeholder="näyttelijä">
        </div>
      </div>
      <div class="form-group">
        <label for="naytttelija" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nayttelija3" value="<?php echo htmlspecialchars($data->tulos->getNayttelija3()); ?>" placeholder="näyttelijä">
        </div>
      </div>
      <div class="form-group">
        <label for="ohjaaja" class="col-md-2 control-label">Ohjaaja</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="ohjaaja1" value="<?php echo htmlspecialchars($data->tulos->getOhjaaja1()); ?>" placeholder="ohjaaja">
        </div>
      </div>
      <div class="form-group">
        <label for="ohjaaja" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="ohjaaja2" value="<?php echo htmlspecialchars($data->tulos->getOhjaaja2()); ?>" placeholder="ohjaaja">
        </div>
      </div>
      <div class="form-group">
        <label for="ohjaaja" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="ohjaaja3" value="<?php echo htmlspecialchars($data->tulos->getOhjaaja3()); ?>" placeholder="ohjaaja">
        </div>
      </div>
      <div class="form-group">
        <label for="kategoria" class="col-md-2 control-label">Kategoria</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kategoria1" value="<?php echo htmlspecialchars($data->tulos->getKategoria1()); ?>" placeholder="kategoria">
        </div>
      </div>
      <div class="form-group">
        <label for="kategoria" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kategoria2" value="<?php echo htmlspecialchars($data->tulos->getKategoria2()); ?>" placeholder="kategoria">
        </div>
      </div>
      <div class="form-group">
        <label for="kategoria" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kategoria3" value="<?php echo htmlspecialchars($data->tulos->getKategoria3()); ?>" placeholder="kategoria">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
        <input type="hidden" value="<?php echo htmlspecialchars($data->tulos->getId()); ?>" name="talletettava">
          <button type="submit" class="btn btn-success">Tallenna</button>
        </div>
      </div>
      </form>
      
      <form class="form-horizontal" role="form" action="poista_elokuva.php" method="GET">
      	<div class="form-group">
      		<div class="col-md-offset-2 col-md-10">
      			<input type="hidden" value="<?php echo htmlspecialchars($data->tulos->getId()); ?>" name="poistettava">
  				<button type="submit" class="btn btn-danger">Poista elokuva</button>
  			</div>
     	 </div>
      </form>
  </div>
