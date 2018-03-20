<?php 

namespace GoldFlightPlanner\DB;

class Sql {

	const HOSTNAME = "191.101.235.156";
	const USERNAME = "goldv250_vam";
	const PASSWORD = "TBG;*X_]fV{~";
	const DBNAME = "goldv250_vam";

	private $conn;

	public function __construct()
	{
		try{
			$this->conn = new \PDO(
				"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
				Sql::USERNAME,
				Sql::PASSWORD
			);

		} catch (Exception $e){
			echo "Erro conectando ao MySql " . $e->getMessage();
		}
	}

	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);

		}

	}

	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		echo $rawQuery;

	}

	public function select($rawQuery, $params = array()):array
	{


		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		
		if (!$stmt->execute()) {
			die('There was an error running the query [' . implode(":",$this->conn->errorInfo()) . ']');
		}

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);


	}

}

 ?>