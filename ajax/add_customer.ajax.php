<?php
require_once "../controllers/customer.controller.php";
require_once "../models/customer.model.php";

class Customer{
    public $lname;
    public $fname;
    public $service;
    public $date;
    public $time;

	public function add_customerRecords(){
        $lname = $this->lname;
        $fname = $this->fname;
        $service = $this->service;
        $date = $this->date;
        $time = $this->time;

        $data = array(
            "lname"=>$lname,
            "fname"=>$fname,
            "service"=>$service,
            "date"=>$date,
            "time"=>$time,
        );

		$answer = (new ctr_customer)->ctr_add_customerRecords($data);
	}
}

if (isset($_POST["lname"])){
    $customerList = new Customer();

    $customerList -> lname = $_POST["lname"];
    $customerList -> fname = $_POST["fname"];
    $customerList -> service = $_POST["service"];
    $customerList -> date = $_POST["date"];
    $customerList -> time = $_POST["time"];
    
    $customerList -> add_customerRecords();
}