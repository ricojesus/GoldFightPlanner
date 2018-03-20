<?php 

namespace GoldFlightPlanner\Model;

require_once 'vendor/autoload.php';

use GoldFlightPlanner\DB\Sql;
use GoldFlightPlanner\Model;
use GoldFlightPlanner\Model\Aeroporto;

class PlanoVFR extends Model {

	const SESSION = "PlanoVFR";

	private $origem;

	protected $fields = [
		"Origem", "Destino", "Alternativo"
	];

	public function getOrigem() {
  		return $this->origem;
	}

	public function setOrigem($icao){

	}

	public function __construct(){
		$this->origem = new aeroporto();
		$this->setdestino(null);
		$this->setalternativo(null);
	}


}

 ?>