<?php
    //	Connexion à la base de données
	$pdo = new PDO
	(
		'mysql:host=localhost;dbname=tp_modelisme;charset=UTF8',
		'wordpressusr',
		'hugo2411',
	    [
	    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	    ]
    );
?>