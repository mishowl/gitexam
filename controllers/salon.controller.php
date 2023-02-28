<?php
class ctr_salon{
	static public function ctr_show_salonRecords(){
		$answer = (new mdl_salon)->mdl_show_salonRecords();
		return $answer;
	}	

	static public function ctr_add_salonRecords($data){
		$answer = (new mdl_salon)->mdl_add_salonRecords($data);
		return $answer;
	}	
}
?>