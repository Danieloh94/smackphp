<?php

	require('../vendor/autoload.php');

	$reqFactory = new \Smack\HttpCore\ServerRequestFactory(new \Smack\HttpCore\UriFactory);

	$req = $reqFactory->fromGlobals();

	var_dump($req);