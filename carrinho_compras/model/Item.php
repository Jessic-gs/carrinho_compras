<?php 
Class Item {

	private $id_item;
	private $quantidade;
	private $id_produto;

	function __construct(){
		$this->id_item = 0;
		$this->quantidade = 0;
		$this->id_produto = 0;
	}

	public function getID_item(){
		return $this->id_item;
	}
	public function setID_item($id_item){
		$this->id_item = $id_item;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}
	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}

	public function getID_produto(){
		return $this->id_produto;
	}
	public function setID_produto($id_produto){
		$this->id_produto = $id_produto;
	}
}
?>