<?php require_once 'connection.php';

class mdl_salon{
	public function mdl_show_salonRecords(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM services");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	public function mdl_add_salonRecords($data){
		$db = new Connection();
		$pdo = $db->connect();

        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$stmt = $pdo->prepare("INSERT INTO services(category, service, fee, duration, promo) VALUES (:category, :service, :fee, :duration, :promo)");	

			$stmt->bindParam(":category", $data["category"], PDO::PARAM_STR);
			$stmt->bindParam(":service", $data["service"], PDO::PARAM_STR);	
			$stmt->bindParam(":fee", $data["fee"], PDO::PARAM_STR);	
            $stmt->bindParam(":duration", $data["duration"], PDO::PARAM_STR);
            $stmt->bindParam(":promo", $data["promo"], PDO::PARAM_STR);
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