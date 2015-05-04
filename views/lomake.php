<div class="container">
    <h1>Elokuvan tiedot</h1>
    
	<p>Syötä elokuvan tiedot. Nimi on pakollinen.</p>

	<?php if (!empty($data->virheet)): ?>
		<div class="alert alert-danger">
			<?php foreach($data->virheet as $virhe):?>
				<?php echo $virhe; ?><br>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
   	
    <form class="form-horizontal" role="form" action="lisaa_elokuva.php" method="POST">
      <div class="form-group">
        <label for="elokuva" class="col-md-2 control-label">Elokuvan nimi*</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nimi" value="<?php echo htmlspecialchars($data->arvot->getNimi()); ?>" placeholder="nimi">
        </div>
      </div>
      <div class="form-group">
        <label for="kesto" class="col-md-2 control-label">Kesto (min)</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kesto" value="<?php echo htmlspecialchars($data->arvot->getKesto()); ?>" placeholder="kesto">
        </div>
      </div>
      <div class="form-group">
        <label for="vuosi" class="col-md-2 control-label">Julkaisuvuosi</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="vuosi" value="<?php echo htmlspecialchars($data->arvot->getVuosi()); ?>" placeholder="Julkaisuvuosi">
        </div>
      </div>
      <div class="form-group">
        <label for="ikaraja" class="col-md-2 control-label">Ikäraja</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="ikaraja" value="<?php echo htmlspecialchars($data->arvot->getIkaraja()); ?>" placeholder="Ikäraja">
        </div>
      </div>
      <div class="form-group">
        <label for="kieli" class="col-md-2 control-label">Kieli</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kieli" value="<?php echo htmlspecialchars($data->arvot->getKieli()); ?>" placeholder="Kieli">
        </div>
      </div>
      <div class="form-group">
        <label for="naytttelija" class="col-md-2 control-label">Näyttelijä</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nayttelija1" value="<?php echo htmlspecialchars($data->arvot->getNayttelija1()); ?>" placeholder="näyttelijä">
        </div>
      </div>
       <div class="form-group">
        <label for="naytttelija" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nayttelija2" value="<?php echo htmlspecialchars($data->arvot->getNayttelija2()); ?>" placeholder="näyttelijä">
        </div>
      </div>
       <div class="form-group">
        <label for="naytttelija" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nayttelija3" value="<?php echo htmlspecialchars($data->arvot->getNayttelija3()); ?>" placeholder="näyttelijä">
        </div>
      </div>
      <div class="form-group">
        <label for="ohjaaja" class="col-md-2 control-label">Ohjaaja</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="ohjaaja1" value="<?php echo htmlspecialchars($data->arvot->getOhjaaja1()); ?>" placeholder="ohjaaja">
        </div>
      </div>
      <div class="form-group">
        <label for="ohjaaja" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="ohjaaja2" value="<?php echo htmlspecialchars($data->arvot->getOhjaaja2()); ?>" placeholder="ohjaaja">
        </div>
      </div>
      <div class="form-group">
        <label for="ohjaaja" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="ohjaaja3" value="<?php echo htmlspecialchars($data->arvot->getOhjaaja3()); ?>" placeholder="ohjaaja">
        </div>
      </div>
      <div class="form-group">
        <label for="kategoria" class="col-md-2 control-label">Kategoria</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kategoria1" value="<?php echo htmlspecialchars($data->arvot->getKategoria1()); ?>" placeholder="kategoria">
        </div>
      </div>
      <div class="form-group">
        <label for="kategoria" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kategoria2" value="<?php echo htmlspecialchars($data->arvot->getKategoria2()); ?>" placeholder="kategoria">
        </div>
      </div>
      <div class="form-group">
        <label for="kategoria" class="col-md-2 control-label"></label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kategoria3" value="<?php echo htmlspecialchars($data->arvot->getKategoria3()); ?>" placeholder="kategoria">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success">Tallenna</button>
        </div>
      </div>
      </form>
	<form class="form-horizontal" role="form" action="lisaa_elokuva.php" method="POST">
		<button type="submit" class="btn btn-default">Tyhjennä kentät</button>
	</form>
  </div>
  <br>
