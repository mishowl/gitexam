<?php
class ctr_customer{
	static public function ctr_show_customerRecords(){
		$answer = (new mdl_customer)->mdl_show_customerRecords();
		return $answer;
	}	

	static public function ctr_add_customerRecords($data){
		$answer = (new mdl_customer)->mdl_add_customerRecords($data);
		return $answer;
	}	
}
?>