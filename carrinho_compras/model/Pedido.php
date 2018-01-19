<?php 
Class Pedido {

	private $id_pedido;
	private $cep;
	private $logradouro;
	private $numero;
	private $complemento;
	private $forma_pagamento;
	private $id_car;

	function __construct(){
		$this->id_pedido = 0;
		$this->cep = 0;
		$this->logradouro = "";
		$this->numero = 0;
		$this->complemento = null;
		$this->forma_pagamento = 0; // 1 - Cartão; 2 - Boleto; 
		$this->id_car = 0;
	}

	public function setID_pedido(){
		return $this->id_pedido;
	}
	public function getID_pedido($id_pedido){
		$this->id_pedido = $id_pedido;
	}

	public function setCEP(){
		return $this->cep;
	}
	public function getCEP($cep){
		$this->cep = $cep;
	}

	public function setLogradouro(){
		return $this->logradouro;
	}
	public function getLogradouro($logradouro){
		$this->logradouro = $logradouro;
	}

	public function setNumero(){
		return $this->numero;
	}
	public function getNumero($numero){
		$this->numero = $numero;
	}

	public function setComplemento(){
		return $this->complemento;
	}
	public function getComplemento($complemento){
		$this->complemento = $complemento;
	}

	public function setFoma_pagamento(){
		return $this->forma_pagamento;
	}
	public function getForma_pagamento($forma_pagamento){
		$this->forma_pagamento = $forma_pagamento;
	}

	public function setID_car(){
		return $this->id_car;
	}
	public function getID_car($id_car){
		$this->id_car = $car;
	}
}
?>