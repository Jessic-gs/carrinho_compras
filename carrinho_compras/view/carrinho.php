<html>
<head>
	<title>Carrinho</title>
<?php 
	include "../template/top_menu.php"; 

	require_once "../control/ProdutoController.php";
	require_once "../control/CarrinhoController.php";

	$carrinhoController = new CarrinhoController;

	$carrinho = $carrinhoController->apresentarCarrinho();
	$total_compra = 0;

	if (isset($_POST['remover'])) {
		$carrinhoController->removerProduto($_POST['remover']);
		header("Location: ".$_SERVER['PHP_SELF']);
	}

	if (isset($_POST['soma'])) {
		$carrinhoController->alterarQuantidade($_POST['soma'], 'soma');
		header("Location: ".$_SERVER['PHP_SELF']);
	} else {
		if (isset($_POST['subtrai'])) {
			$carrinhoController->alterarQuantidade($_POST['subtrai'], 'subtrai');
			header("Location: ".$_SERVER['PHP_SELF']);
		} else {
			if (isset($_POST['finalizar'])){
				header("Location: pedido.php");
			}
		}
	}

	if (sizeof($carrinho) >= 1) {
		$total_compra = $carrinhoController->valorTotalCompra($carrinho);
	}
?>

	<div class="container">
		<div class="page-header">
			<h1>Carrinho</h1>
		</div>

		<?php 
			if ($carrinho == null){
				echo '<div class="well">Nenhum produto foi inserido no carrinho.</div>';
			} else {
		?>
		<form action="" method="post">
			<table  class="table table-bordered">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Quantidade</th>
						<th>Preço Unitário</th>
						<th></th>
					</tr>
				</thead>

					<tbody>
						<?php foreach ($carrinho as $item => $it) {?>
						<tr>
							<td class="span6"><?php echo $it['nome'] ?></td>
							<td class="span2" align="center">
								<button name="soma" value="<?php echo $it['id_item'] ?>" class="btn span">+</button>
								<label id="appendedPrependedDropdownButton" class="span"><?php echo $it['quantidade'] ?></label>
								<button name="subtrai" value="<?php echo $it['id_item'] ?>" class="btn span">-</button>
							</td>
							<td class="span2">R$ <?php echo $it['preco'] ?></td>
							<td class="span1" align="center">
								<button name="remover" value="<?php echo $it['id_produto'] ?>"class="btn">X</button>
							</td>
						</tr>
						
						<?php } ?>
						<tr>
							<td colspan="4" align="right"><h4 class="pull-right">Total:R$ <?php echo $total_compra != 0 ? $total_compra : "00,00" ?></h4></td>
						</tr>
					</tbody>
			</table>
			<div align="right">
				<button class="btn btn-primary" name="finalizar">Finalizar Pedido</button>
			</div>
		</form>
		<?php } ?>

	</div>

	<?php include "../template/rodape.php"; ?>