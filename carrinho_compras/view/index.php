<?php 
	session_start();

	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d');
	$time = date('H:i:s');
	
	require_once "../control/CarrinhoController.php";

	$carrinhoController = new CarrinhoController;

	$id_car = rand();
	$carrinho = array();
		$carrinho['id_car'] = $id_car;
		$carrinho['data'] = $date;
		$carrinho['horario'] = $time;
	$carrinhoController->criarCarrinho($carrinho);
	$_SESSION['id_car'] = $id_car;

	$odl_car = $carrinhoController->listaCarrinhos();
	foreach ($odl_car as $key => $car) {
		$carrinhoController->removerCarrinho($car['id_car']);		
	}

	header("Location: home.php");

?>