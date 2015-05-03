<div class="container">
    <h1>Salasanan vaihtaminen</h1>

	<?php if (!empty($data->virhe)): ?>
		<div class="alert alert-danger"><?php echo $data->virhe; ?><br></div>
	<?php endif; ?>
    
    <form class="form-horizontal" role="form" action="vaihda_salasana.php" method="POST">
      <div class="form-group">
        <label for="inputPassword1" class="col-md-2 control-label">Vanha salasana</label>
        <div class="col-md-10">
          <input type="password" class="form-control" name="vanhaS" placeholder="Vanha salasana">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword1" class="col-md-2 control-label">Uusi salasana</label>
        <div class="col-md-10">
          <input type="password" class="form-control" name="uusiS1" placeholder="Uusi salasana">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword1" class="col-md-2 control-label">Uusi salasana uudelleen</label>
        <div class="col-md-10">
          <input type="password" class="form-control" name="uusiS2" placeholder="Uusi salasana">
        </div>
      </div>
            <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-default">Tallenna</button>
        </div>
      </div>
    </form>
    <form class="form-horizontal" role="form" action="poista_kayttaja.php" method="POST">
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-default">Poista käyttäjä</button>
        </div>
      </div>
    </form>
  </div>
