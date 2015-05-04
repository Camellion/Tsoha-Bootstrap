<!DOCTYPE HTML>
<html>
	<head>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">

		<link rel="icon" href="favicon.ico"/> 
		
		<title>Kirjautuminen</title>
	</head>
	
	<body>
		<div class="container">
			<h1>Kirjaudu</h1>
			<?php if (!empty($data->virhe)): ?>
				<div class="alert alert-danger"><?php echo $data->virhe; ?><br></div>
			<?php endif; ?>
    <form class="form-horizontal" role="form" action="doLogin.php" method="POST">
      <div class="form-group">
        <label for="tunnus" class="col-md-2 control-label">Käyttäjätunnus</label>
        <div class="col-md-10">
          <input type="text" class="form-control" name="tunnus" value="<?php if(!empty($data->kayttaja)): ?><?php echo htmlspecialchars($data->kayttaja); ?><?php endif; ?>" placeholder="Käyttäjätunnus" />
        </div>
      </div>
      <div class="form-group">
        <label for="salasana" class="col-md-2 control-label">Salasana</label>
        <div class="col-md-10">
          <input type="password" class="form-control" name="salasana" placeholder="Salasana" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
          <button type="submit" class="btn btn-success">Kirjaudu sisään</button>
        </div>
      </div>
    </form>
    <br>
    <p>Puuttuuko sinulta käyttäjätunnus? Voit rekisteröityä alla olevan linkin kautta.</p>
    <p><a href="rekisteroityminen.php">Rekisteröidy</a></p>
  </div>
</body>
</html>
