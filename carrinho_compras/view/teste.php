<?php 
	// session_start()
	
	require_once "../control/ProdutoController.php";
	require_once "../control/CarrinhoController.php";

	$produtoController = new ProdutoController;
	$carrinhoController = new CarrinhoController;

	$produto = $produtoController->detalhesProduto(2);
	$carrinho = array();

	$carrinho = $carrinhoController->criarItem($produto, rand(), 1);
	
	var_dump($carrinho);
?>