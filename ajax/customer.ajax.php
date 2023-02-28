<?php
require_once "../controllers/customer.controller.php";
require_once "../models/customer.model.php";

class Customer{
	public function show_customerRecords(){
		$customer = (new ctr_customer)->ctr_show_customerRecords();
		if(count($customer) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				for($i=0; $i < count($customer); $i++){
					$jsonData .='[
                        "'.$customer[$i]["lname"].'",
						"'.$customer[$i]["fname"].'",
						"'.$customer[$i]["service"].'",
                        "'.$customer[$i]["date"].'",
						"'.$customer[$i]["time"].'"
					],';
				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 
			}';
		echo $jsonData;
	}
}

$customerList = new Customer();
$customerList -> show_customerRecords();