<?php 
Class Categoria {

	private $id_categoria;
	private $descricao;

	function __construct(){
		$this->id_categoria = 0;
		$this->descricao = "";
	}

	public function getID_categoria(){
		return $this->id_categoria;
	}
	public function setID_categoria($id_categoria){
		$this->id_categoria =  $id_categoria;
	}

	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
}
?>