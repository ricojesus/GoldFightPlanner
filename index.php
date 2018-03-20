<?php

error_reporting(-1);
ini_set('display_errors', 1);

require "vendor/autoload.php";

use \Slim\App;
use \local\Model;
use GoldFlightPlanner\page;
use GoldFlightPlanner\Model\Aeroporto;
use GoldFlightPlanner\Model\PlanoVFR;

$config = [
    'settings' => [
    	'addContentLengthHeader' => false,
        'displayErrorDetails' => true # change this <------
    ],
];

$app = new App($config);


$app->get('/', function () {
	$origem = new Aeroporto();

	$page = new Page();
	$page->setTpl("index", array(
		"Origem" => $origem
	));

});

$app->get('/vfr', function () {

	$page = new Page();
	$page->setTpl("PlanoVFR");

});

$app->post('/vfr', function ($request, $response, $args) {
	$origem = new Aeroporto();
	$destino = new Aeroporto();
	$alternativo = new Aeroporto();

	$origem->get($_POST["Origem"]);
	$destino->get($_POST["Destino"]);
	$alternativo->get($_POST["Alternativo"]);


	$org = array(
		'Icao' => $origem->getIcao(), 
		'Nome' => $origem->getNome(),
		'Metar' => $origem->getMetar()
	);

	$dest = array(
		'Icao' => $destino->getIcao(), 
		'Nome' => $destino->getNome(),
		'Metar' => $destino->getMetar()
	);	

	$alt = array(
		'Icao' => $alternativo->getIcao(), 
		'Nome' => $alternativo->getNome(),
		'Metar' => $alternativo->getMetar()
	);
	//var_dump($org);

	$page = new Page();
	$page->setTpl("index", array(
		"Origem" => $org,
		"Destino" => $dest,
		"Alternativo" => $alt
	));
	
});

$app->run();

?>