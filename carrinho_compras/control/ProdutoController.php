<?php 

require_once "../dao/CategoriaDao.php";
require_once "../dao/ProdutoDao.php";
require_once "../dao/ProdCatDao.php";
require_once "../dao/ProdCaracDao.php";


Class ProdutoController {

	private $produtoDao;
	private $categoriaDao;
	private $proCatDao;
	private $proCaracDao;

	function __construct(){
		$this->produtoDao = new ProdutoDao;
		$this->categoriaDao = new CategoriaDao;
		$this->prodCatDao = new ProdCatDao;
		$this->prodCaracDao = new ProdCaracDao;
	}

	public function listaProdutos(){
		$produtos = $this->produtoDao->listaProdutos();
		return $produtos;
	}

	public function listaProdutoPelaCategoria($id_cat){
		$prod_cat = $this->categoriaDao->produtosDaCategoria($id_cat);
		$produtos = array();
		foreach ($prod_cat as $key => $id)
			$produtos = $this->produtoDao->listaProdutosDaCategoria($id['id_cat']);
		return $produtos;
	}

	public function buscaProdutoPeloNome($nome){
		$produtos = $this->produtoDao->buscaProdutoPeloNome($nome);
		return $produtos;
	}

	public function listaCategorias(){
		$lista_categorias = $this->categoriaDao->listaCategorias();
		return $lista_categorias;
	}
	
	public function detalhesProduto($id_produto) {
		$categorias = $this->prodCatDao->encontrarProdCat($id_produto);
		$caracteristicas = $this->prodCaracDao->encontrarProdCarac($id_produto);
		$produto = $this->produtoDao->detalhesProduto($id_produto, $categorias, $caracteristicas);	
		return $produto;
	}

}
?>