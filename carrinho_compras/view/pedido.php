<html>
<head>
	<title>Pedido</title>
<?php 
	include '../template/top_menu.php'; 

	require_once "../control/carrinhoController.php";
	require_once "../control/pedidoController.php";

	$carrinhoController = new CarrinhoController;
	$pedidoController = new PedidoController;

	$carrinho = $carrinhoController->apresentarCarrinho();
	if (sizeof($carrinho) >= 1) {
		$total_compra = $carrinhoController->valorTotalCompra($carrinho);
	}

	if (isset($_POST['finalizar'])){
		$pedido = array();
			$pedido['id_car'] = $_SESSION['id_car'];
			$pedido['total_compra'] = $total_compra;
			$pedido['forma_pagamento'] = $_POST['forma_pagamento'];
			$pedido['data_pedido'] = date('Y-m-d');
			$pedido['horario_pedido'] = date('H:i:s');
		$pedidoController->criarPedido($pedido);

		$carrinhoController->removerApenasCarrinho($_SESSION['id_car']);
		$id_car = rand();
		$carrinho = array();
			$carrinho['id_car'] = $id_car;
			$carrinho['data'] = date('Y-m-d');
			$carrinho['horario'] = date('H:i:s');
		$carrinhoController->criarCarrinho($carrinho);
		$_SESSION['id_car'] = $id_car;

		header("Location: ".$_SERVER['PHP_SELF']);
	}
?>

	<div class="container">
		<div class="page-header">
			<h1>Pedido</h1>
		</div>


	<?php  
		if ($carrinho == null){
				echo '<div class="well">Compra Finalizada com sucesso!</div>';
		} else {
	?>
		<form action="" method="post">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nome</th>
						<th><center>Quantidade</center></th>
						<th>Preço Unitário</th>
						<th></th>
					</tr>
				</thead>			
				<?php foreach ($carrinho as $item => $it) { ?>
				<tr>
					<td><label><?php echo $it['nome'] ?></label></td>
					<td><label align="center"><?php echo $it['quantidade'] ?></label></td>
					<td><label>R$ <?php echo $it['preco'] ?></label></td>
				</tr>
			<?php } ?>
				<tr>
					<td colspan="4"><h4 class="pull-right">Valor Total: <?php echo $total_compra ?></h4></td>
				</tr>
			</table>
			<label>Forma de Pagamento:</label>
			<select name="forma_pagamento">
				<option value="0">Cartão</option>
				<option value="1">Boleto</option>
			</select>
			<div align="right">
				<button class="btn btn-primary" name="finalizar">Finalizar</button>
			</div>
		</form>
	<?php } ?>
	</div>

	<?php include '../template/rodape.php' ?>
