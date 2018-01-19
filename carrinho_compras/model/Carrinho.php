<?php 
Class Carrinho {

	private $id_car;
	private $data_criacao;	
	private $horario_criacao;	

	function __construct($id_car){
		$this->id_car = $id_car;
		$this->data_criacao = "00/00/000";
		$this->horario_criacao = "00:00:00";
	}

	public function getID_car(){
		return $this->id_car;
	}
	public function setID_car($id_car){
		$this->id_car = $id_car;
	}

	public function getDate_criacao(){
		return $this->data_criacao;
	}
	public function setData_criacao($data_criacao){
		$this->data_criacao = $data_criacao;
	}

	public function getHorario_criacao(){
		return $this->horario_criacao;
	}
	public function setHorario_criacao($horario_criacao){
		$this->horario_criacao = $horario_criacao;
	}
}
?>