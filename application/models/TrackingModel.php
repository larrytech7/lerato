<?php
class TrackingModel{
	
	public $tracking_code;
	public $orderid;
	public $tracking_state;
	public $tracking_details;
	public $created_at;
	public $updated_at;
	public $deleted_at;
	
	public function __construct($code, $order, $state=0, $details){
		$this->tracking_code = $code;
		$this->orderid = $order;
		$this->tracking_state = $state;
		$this->tracking_details = $details;
		$this->created_at = time();
		$this->updated_at = time();
		$this->deleted_at = NULL;
		
	}	
}

?>