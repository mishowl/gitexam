<?php
require_once "../controllers/salon.controller.php";
require_once "../models/salon.model.php";

class Salon{
    public $category;
    public $service;
    public $fee;
    public $duration;
    public $promo;

	public function add_salonRecords(){
        $category = $this->category;
        $service = $this->service;
        $fee = $this->fee;
        $duration = $this->duration;
        $promo = $this->promo;

        $data = array(
            "category"=>$category,
            "service"=>$service,
            "fee"=>$fee,
            "duration"=>$duration,
            "promo"=>$promo,
        );

		$answer = (new ctr_salon)->ctr_add_salonRecords($data);
	}
}

if (isset($_POST["category"])){
    $salonList = new Salon();

    $salonList -> category = $_POST["category"];
    $salonList -> service = $_POST["service"];
    $salonList -> fee = $_POST["fee"];
    $salonList -> duration = $_POST["duration"];
    $salonList -> promo = $_POST["promo"];
    
    $salonList -> add_salonRecords();
}