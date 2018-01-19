<?php 

Class Produto {

	private $id_produto;
	private $nome;
	private $descricao;
	private $imagem;
	private $preco;
	private $categorias;
	private $caracteristicas;

	function __construct(){
		$this->id_produto = 0;
		$this->nome = "";
		$this->descricao = "";
		$this->imagem = "";
		$this->preco = 0.0;
		$this->categorias = array();
		$this->caracteristicas = array();
	}

	public function getID_produto(){
		return $this->id_produto;
	}
	public function setID_produto($id_produto){
		$this->id_produto = $id_produto;
	}

	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getDescricao(){
		return $this->descricao;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getImagem(){
		return $this->imagem;
	}
	public function setImagem($imagem){
		$this->imagem = $imagem;
	}

	public function getPreco(){
		return $this->preco;
	}
	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getCategorias(){
		return $this->categorias;
	}
	public function setCategorias($categorias){
		$this->categorias = $categorias;
	}

	public function getCaracteristicas(){
		return $this->caracteristicas;
	}
	public function setCaracteristicas($caracteristicas){
		$this->caracteristicas = $caracteristicas;
	}

}
?>