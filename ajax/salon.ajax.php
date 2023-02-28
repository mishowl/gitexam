<?php
require_once "../controllers/salon.controller.php";
require_once "../models/salon.model.php";

class Salon{
	public function show_salonRecords(){
		$salon = (new ctr_salon)->ctr_show_salonRecords();
		if(count($salon) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				for($i=0; $i < count($salon); $i++){
					$jsonData .='[
                        "'.$salon[$i]["category"].'",
						"'.$salon[$i]["service"].'",
						"'.$salon[$i]["fee"].'",
                        "'.$salon[$i]["duration"].'",
						"'.$salon[$i]["promo"].'"
					],';
				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 
			}';
		echo $jsonData;
	}
}

$salonList = new Salon();
$salonList -> show_salonRecords();