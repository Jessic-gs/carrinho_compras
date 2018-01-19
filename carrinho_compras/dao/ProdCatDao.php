<?php 

Class ProdCatDao{

	public function encontrarProdCat($id_produto){
		$sql = "select categoria.id_cat, categoria.descricao
                from categoria inner join prod_cat on categoria.id_cat = prod_cat.id_cat
                where prod_cat.id_produto = :id_produto";

		$connection = ResourceManager::getConnection();
        $prod_cat = array();
        
        try {
            $connection->beginTransaction();                
            $prepare = $connection->prepare( $sql);
            $prepare->bindValue(":id_produto", $id_produto);
            $prepare->execute();                
                
            while($linha = $prepare->fetch( PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_produto'] = $id_produto;
                    $item['id_cat'] = $linha->id_cat;
                    $item['descricao'] = $linha->descricao;
                $prod_cat[] = $item;
            }
            $connection->commit();
        } catch(Exception $ex){
            $erro = "O CARRINHO não pode ser montado!";
            throw new Exception( $erro);
        }
        $connection = null;
        return $prod_cat;
	}

}
?>