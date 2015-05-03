<!DOCTYPE html>
<html>

	<head>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">

		<title><?php echo "$otsikko" ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>

	<body>
		<ul class="nav nav-tabs">
			<li <?php if ($otsikko == 'Etusivu'): ?>class="active"<?php endif; ?>>
				<a href="etusivu.php">Elokuvalista</a>
			</li>
			<li <?php if ($otsikko == 'Omat tiedot'): ?>class="active"<?php endif; ?>>
				<a href="omat_tiedot.php">Muokkaa tietojasi</a>
			</li>
			<li <?php if ($otsikko == 'Haku'): ?>class="active"<?php endif; ?>>
				<a href="haku.php">Hae elokuvia</a>
			</li>
			<li>
				<a href="logOut.php">Kirjaudu ulos</a>
			</li>
		</ul>
  	
		<div id="content">
		<?php require_once $sivu; ?>
	  	</div>
	  	
	</body>
</html>
