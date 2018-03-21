<?php

error_reporting(-1);
ini_set('display_errors', 1);

require "vendor/autoload.php";

use \Slim\App;
use \local\Model;
use GoldFlightPlanner\page;
use GoldFlightPlanner\Model\Aeroporto;
use GoldFlightPlanner\Model\PlanoVFR;
use GoldFlightPlanner\Model\Piloto;


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
	$piloto = new Piloto();
	$origem = new Aeroporto();
	$destino = new Aeroporto();
	$alternativo = new Aeroporto();

	$page = new Page();
	$page->setTpl("PlanoVFR", array(
		"Origem" => $origem->getValues(),
		"Destino" => $destino->getValues(),
		"Alternativo" => $alternativo->getValues(),
		"Piloto" => $piloto->getValues()
	));

});

$app->post('/vfr', function ($request, $response, $args) {
	$origem = new Aeroporto();
	$destino = new Aeroporto();
	$alternativo = new Aeroporto();
	$piloto = new Piloto();

	$origem->get($_POST["Origem"]);
	$destino->get($_POST["Destino"]);
	$alternativo->get($_POST["Alternativo"]);
	$piloto->get($_POST["CallSign"]);

	$page = new Page();
	$page->setTpl("PlanoVFR", array(
		"Origem" => $origem->getValues(),
		"Destino" => $destino->getValues(),
		"Alternativo" => $alternativo->getValues(),
		"Piloto" => $piloto->getValues()
	));

});

$app->run();

?>