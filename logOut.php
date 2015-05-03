<?php
	require_once "libs/common.php";
	unset($_SESSION['kayttaja']);
	lahetaSivulle('index.php');
