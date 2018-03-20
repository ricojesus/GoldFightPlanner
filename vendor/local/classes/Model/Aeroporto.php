<?php 

namespace GoldFlightPlanner\Model;

require_once 'vendor/autoload.php';

use GoldFlightPlanner\DB\Sql;
use GoldFlightPlanner\Model;

class Aeroporto extends Model {

	const SESSION = "Aeroporto";

	protected $fields = [
		"Icao", "Nome", "Metar"
	];

	public function __construct(){
		$this->setIcao(null);
		$this->setNome(null);
		$this->setMetar(null);
	}

	public function get($icao){
		$this->setIcao($icao);
		$this->setNome($this->getAirportName($icao));
		$this->setMetar($this->getMetarInformation($icao));

	}

	public function getAirportName($icao){
		$sql = new Sql();

		$result = $sql->select("select name from goldv250_vam.airports where ident = :ICAO", array(
			':ICAO' => $icao
		));

		if (count($result) > 0){
			return $result[0]["name"];
		}else{
			return "Aeroporto não Localizado";
		}
	}	

	public function getMetarInformation($icao){

		return file_get_contents('http://www.redemet.aer.mil.br/api/consulta_automatica/index.php?local='. $icao .'&msg=metar');
	}
}

 ?>