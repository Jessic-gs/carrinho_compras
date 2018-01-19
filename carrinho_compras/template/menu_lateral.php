<?php 
	require_once "../control/ProdutoController.php";

	$produtoController = new ProdutoController;
	
	$lista_categorias = $produtoController->listaCategorias();

	echo '<h2>Categorias</h2>
		  	<ul>';
	foreach ($lista_categorias as $key => $cat) {
		echo '<li><a href="home.php?cat='.$cat['id_cat'].'"> '.$cat['descricao'].' </a></li>';
	} 
	echo '</ul>';
?>