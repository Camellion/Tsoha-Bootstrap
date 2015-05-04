<?php
//ini_set('display_errors', 1);

	require_once "libs/common.php";
	unset($_SESSION['kayttaja']);
	lahetaSivulle('index.php');
