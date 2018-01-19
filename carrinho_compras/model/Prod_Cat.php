<?php 
Class Prod_Cat {

	private $id_produto;
	private $id_categoria;

	function __construct(){
		$this->id_produto = 0;
		$this->id_categoria = 0;
	}

	public function setID_produto(){
		return $this->id_produto;
	}
	public function getID_produto($id_produto){
		$this->id_produto = $id_produto;
	}

	public function setID_categoria(){
		return $this->id_categoria;
	}
	public function getID_categoria($id_categoria){
		$this->id_categoria = $id_categoria;
	}
}
?>