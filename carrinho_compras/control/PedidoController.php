<?php 

require_once "../dao/PedidoDao.php";

Class PedidoController {

	private $pedidoDao;

	function __construct(){
		$this->pedidoDao = new PedidoDao;
	}

	public function criarPedido($pedido){
		$this->pedidoDao->criarPedido($pedido);
	}

}
?>