<?php 
require_once "../dao/ItemDao.php";
require_once "../dao/CarItemDao.php";
require_once "../dao/CarrinhoDao.php";

Class CarrinhoController{

	private $id_car;
	private $itemDao;
	private $carItemDao;
	private $carrinhoDao;

	function __construct(){
		$this->itemDao = new ItemDao;
		$this->carItemDao = new CarItemDao;
		$this->carrinhoDao = new CarrinhoDao;
		$this->id_car = $_SESSION['id_car'];
	}

	public function criarCarrinho($carrinho){
		$this->carrinhoDao->criarCarrinho($carrinho);
	}

	public function removerCarrinho($id_car){
		$car_item = $this->carItemDao->encontrarCarItem($id_car);
		if (sizeof($car_item) != 0) {
			foreach ($car_item as $key => $car_item) {
				$this->carItemDao->removerCarItem($car_item['id_car'], $car_item['id_item']);
				$this->itemDao->removerItem($car_item['id_item']);
			}
		}
		$this->carrinhoDao->removerCarrinho($id_car);
	}

	public function removerApenasCarrinho($id_car){
		$this->carrinhoDao->removerCarrinho($id_car);
	}

	public function addProduto($produto){
		$car_item = $this->carItemDao->encontrarCarItemDoProduto($produto->getID_produto(), $this->id_car);
		if ($car_item == null) {
			$this->itemDao->inserirItem($produto);
			$id_item = $this->itemDao->ultimoItem();
			$this->carItemDao->inserirCarItem($this->id_car, $id_item);
			return true;
		} else {
			return false;
		}
	}

	public function removerProduto($id_produto){
		$car_item = $this->carItemDao->encontrarCarItemDoProduto($id_produto, $this->id_car);

		foreach ($car_item as $key => $car_item) {
			$this->carItemDao->removerCarItem($car_item['id_car'], $car_item['id_item']);
			$this->itemDao->removerItem($car_item['id_item']);
		}

	}

	public function apresentarCarrinho(){
		$carrinho = $this->carrinhoDao->buscaCarrinho($this->id_car);
		return $carrinho;
	}

	public function alterarQuantidade($id_item, $operacao){
		$item = $this->itemDao->buscaItem($id_item);


		foreach ($item as $key => $item) {
			
	        if ($operacao == "soma") {
	            $item['quantidade']++;
	        } else {
	        	if ($operacao == "subtrai"){
	        		if ($item['quantidade'] == 1) {
					    $this->removerProduto($item['id_produto']);
					} else {
	            		$item['quantidade']--;
					}
	            }
	        }

	        if ($item['quantidade'] != 0) {
	        	$this->itemDao->alterarQuantidade($item);
	        }
		}
	}

	public function valorTotalCompra($carrinho){
		$valor_total = 0;
		foreach ($carrinho as $key => $item) {
			$valor_total += $item['quantidade']*$item['preco'];
		}
		return $valor_total;
	}

	public function listaCarrinhos(){
		$lista = $this->carrinhoDao->listaCarrinhos();
		return $lista;
	}
}
?>