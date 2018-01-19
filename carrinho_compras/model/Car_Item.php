<?php 
Class Car_Item {

	private $id_car;
	private $id_item;

	function __construct(){
		$this->id_car = 0;
		$this->id_item = 0;
	}

	public function setID_car(){
		return $this->id_car;
	}
	public function getID_car($id_car){
		$this->id_car =$id_car;
	}

	public function setID_item(){
		return $this->id_item;
	}
	public function getID_item($id_item){
		$this->id_item = $id_item;
	}
}
?>