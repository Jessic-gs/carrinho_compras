<?php 

Class CategoriaDao{

	public function listaCategorias(){
		$sql = "select id_cat, descricao
				from categoria";

		$connection = ResourceManager::getConnection();
        $lista_categorias = array();
        
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->execute();
            while ($linha = $prepare->fetch(PDO::FETCH_OBJ)){
                $item = array();
                	$item['id_cat'] = $linha->id_cat;
                	$item['descricao'] = $linha->descricao;
                $lista_categorias[] = $item;
            }
        } catch (Exception $ex) {
            $erro = "as CATEGORIAS não foram encontradas!";
            throw new Exception($erro);
        }

        return $lista_categorias;
	}

     public function produtosDaCategoria($id_cat){
        $sql = "select id_produto, id_cat
                from prod_cat
                where id_cat = :id_cat";

        $connection = ResourceManager::getConnection();
        $prod_cat = array();
        
        try {
            $connection->beginTransaction();                
            $prepare = $connection->prepare( $sql);
            $prepare->bindValue(":id_cat", $id_cat);
            $prepare->execute();                
                
            while($linha = $prepare->fetch( PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_produto'] = $linha->id_produto;
                    $item['id_cat'] = $linha->id_cat;
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