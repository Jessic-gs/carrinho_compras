<html>
<head>
	<title>Listagem</title>
	<?php include "../template/top_menu.php"; ?>
<?php
	require_once "../control/ProdutoController.php";

	$produtoController = new ProdutoController;

	$produtos = array();
	$mensagem = null;

	if (isset($_GET['cat'])) {
		$produtos = $produtoController->listaProdutoPelaCategoria($_GET['cat']);
		if (sizeof($produtos) <= 0) {
			$mensagem = 'Nenhum produto da categoria escolhida foi encontrado';
		}
	} else {
		if (isset($_GET['n'])) {
			$produtos = $produtoController->buscaProdutoPeloNome($_GET['n']);
			$mensagem = 'Você pesquisou por "'.$_GET['n'].'".';
			if (sizeof($produtos) <= 0) {
				$mensagem = 'Nenhum produto com o nome "'.$_GET['n'].'" foi encontrado';
			}
		} else {
			$produtos = $produtoController->listaProdutos();
		}
	}
?>
	
	<div class="span4">
		<?php include "../template/menu_lateral.php"; ?>
	</div>
	
		<div class="span12">
			<div class="page-header">
				<h1>Listagem</h1>
			</div>

		<ul class="thumbnails">
				<form action="produto.php" method="post">
			<?php
				echo $mensagem != null ? '<div class="well">'.$mensagem.'</div>' : null;
				foreach ($produtos as $prod => $p){
			?>
			<li class="span4" align="center">
					<a href="produto.php?id=<?php echo $p['id_produto'] ?>" class="thumbnail">
						<h4><?php echo $p['nome'] ?></h4>
						<img src="<?php echo $p['imagem'] ?>" style="height:200px;">
						<p>R$ <?php echo $p['preco'] ?></p>
						<span class="btn">Ver Detalhes</span>
					</a>
					<?php } ?>
			</li>
				</form>
		</ul>
		</div>

	<?php include "../template/rodape.php"; ?>
