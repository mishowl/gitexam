<?php require_once 'connection.php';

class mdl_customer{
	public function mdl_show_customerRecords(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM customers");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	public function mdl_add_customerRecords($data){
		$db = new Connection();
		$pdo = $db->connect();

        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$stmt = $pdo->prepare("INSERT INTO customers(lname, fname, service, date, time) VALUES (:lname, :fname, :service, :date, :time)");	

			$stmt->bindParam(":lname", $data["lname"], PDO::PARAM_STR);
			$stmt->bindParam(":fname", $data["fname"], PDO::PARAM_STR);	
			$stmt->bindParam(":service", $data["service"], PDO::PARAM_STR);	
            $stmt->bindParam(":date", $data["date"], PDO::PARAM_STR);
            $stmt->bindParam(":time", $data["time"], PDO::PARAM_STR);
			$stmt->execute();	

		    $pdo->commit();
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
	}

}