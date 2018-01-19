<html>
<head>
	<title>Detalhes do Produto</title>
	<?php include '../template/top_menu.php';	?>
<?php 
	require_once "../control/ProdutoController.php";
	require_once "../control/CarrinhoController.php";

	$produtoController = new ProdutoController;
	$carrinhoController = new CarrinhoController;

	$produto = $produtoController->detalhesProduto($_GET['id']);
	$url_php = $_SERVER['PHP_SELF'];
	$carrinho = array();
	$mensagem = null;

	if (isset($_POST['btn'])){
		if ($_POST['btn'] == "Add") {
			$prod = $carrinhoController->addProduto($produto);
			if ($prod) {
				header("Location: carrinho");
			} else {
				$mensagem = "O produto escolhido já foi adicionado ao carrinho";
			}
		}
	}
?>


	<div class="span4">
		<?php include "../template/menu_lateral.php"; ?>
	</div>

	<div class="span12">
		<div class="page-header">
			<h2>Detalhes do Produto</h2>
		</div>
		
		<?php echo $mensagem != null ?'<div class="well">'.$mensagem.'</div>' : null; ?>

		<form action="" method="post">
			<ul class="media-list">
				<li>
					<h3><?php echo $produto->getNome() ?></h3></li>
					<div class="pull">
						<img class="media-object span5" src="<?php echo $produto->getImagem() ?>">
						<div class="span5">
							<p class="alinhar-texto"><?php echo $produto->getDescricao() ?></p>
							<h3>Caracteristicas</h3>
							<ul>
							<?php foreach ($produto->getCaracteristicas() as $key => $carac) { ?>
								<li><?php echo $carac['carac'].' : '.$carac['descricao'] ?></li>
							<?php } ?>
							</ul>
							<div align="right">
								<h3>Preço: R$ <?php echo $produto->getPreco() ?></h3>
								<button name="btn" value="Add" class="btn btn-primary">Adicionar ao Carrinho</button>
							</div>
						</div>
					</div>
				</li>
			</ul>

		</form>
	</div>

	<?php include '../template/rodape.php'; ?>
