<?php 
Class Prod_Carac {

	private $id_produto;
	private $id_carac;

	function __construct(){
		$this->id_produto = 0;
		$this->id_carac= 0;
	}

	public function setID_produto(){
		return $this->id_produto;
	}
	public function getID_produto($id_produto){
		$this->id_produto = $id_produto;
	}

	public function setID_carac(){
		return $this->id_carac;
	}
	public function getID_categoria($id_carac){
		$this->id_carac = $id_carac;
	}
}
?>