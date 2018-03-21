<?php 

namespace GoldFlightPlanner\Model;

require_once 'vendor/autoload.php';

use GoldFlightPlanner\DB\Sql;
use GoldFlightPlanner\Model;

class Piloto extends Model {

	const SESSION = "Aeroporto";

	protected $fields = [
		"CallSign", "Name"
	];

	public function __construct(){
		$this->setCallSign(null);
		$this->setName(null);
	}

	public function get($callsign){
		$sql = new Sql();

		$result = $sql->select("select CallSign, concat(name,' ', surname) as Name from goldv250_vam.gvausers where callsign = :CALLSIGN", array(
			':CALLSIGN' => $callsign
		));

		if (count($result) > 0){
			$this->setData($result[0]);
		}else{
			$this->setData(new Piloto());
		}
	}	
}

 ?>