<?php 
	session_start();

	if (isset($_POST['busca'])){
		header("Location: home.php?n=".$_POST['nome_produto']);
	}
?>

	<link rel="stylesheet" href="../css/estilo.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>

	<ul class="nav nav-pills">
		<li><a href="home.php">Home</a></li>
		<li><a href="carrinho.php">Carrinho</a></li>
	</ul>

	<div class="navbar">
	  	<div class="navbar-inner">
			<form action="" method="post" class="navbar-form pull-left form-inline">
				<input type:"text" name="nome_produto" class="span4">
				<button name="busca" class="btn">Pesquisar</button>
			</form>
		</div>
	</div>
