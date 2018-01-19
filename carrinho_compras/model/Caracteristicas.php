<?php 
Class Caracteristicas {
	
	private $id_carac;
	private $descricao;

	function __construct(){
		$this->id_carac = 0;
		$this->descricao = "";
	}

	public function getID_carac(){
		return $this->id_carac;
	}
	public function setID_carac($id_carac){
		$this->id_carac =  $id_carac;
	}

	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
}
?>