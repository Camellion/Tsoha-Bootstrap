<div class="container">
	<h1>Haku</h1>
    
	<p>Voit hakea elokuvan nimellä (tai se osalla) sekä ohjaajan, näyttelijän tai kategorian nimellä.</p>
    	
	<?php if (!empty($data->tyhjaHaku)): ?>
		<div class="alert alert-danger"><?php echo $data->tyhjaHaku; ?><br></div>
	<?php endif; ?>
    	
    <form class="form-horizontal" role="form" action="listaa_haku.php" method="GET">
      <div class="form-group">
        <label for="elokuva" class="col-md-2 control-label">Elokuvan nimi</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nimi" placeholder="nimi">
        </div>
      </div>
      <div class="form-group">
        <label for="naytttelija" class="col-md-2 control-label">Näyttelijä</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="nayttelija" placeholder="näyttelijä">
        </div>
      </div>
      <div class="form-group">
        <label for="ohjaaja" class="col-md-2 control-label">Ohjaaja</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="ohjaaja" placeholder="ohjaaja">
        </div>
      </div>
      <div class="form-group">
        <label for="kategoria" class="col-md-2 control-label">Kategoria</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="kategoria" placeholder="kategoria">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-default">Hae</button>
        </div>
      </div>
    </form>
  </div>
