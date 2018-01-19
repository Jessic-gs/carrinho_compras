<?php 

Class ProdCaracDao {

	public function encontrarProdCarac($id_produto){
		$sql = "select caracteristica.descricao as carac, prod_carac.descricao
                from caracteristica inner join prod_carac on caracteristica.id_carac = prod_carac.id_carac
                where prod_carac.id_produto = :id_produto";

		$connection = ResourceManager::getConnection();
        $prod_carac = array();
        
        try {
            $connection->beginTransaction();                
            $prepare = $connection->prepare( $sql);
            $prepare->bindValue(":id_produto", $id_produto);
            $prepare->execute();                
                
            while($linha = $prepare->fetch( PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_produto'] = $id_produto;
                    $item['carac'] = $linha->carac;
                    $item['descricao'] = $linha->descricao;
                $prod_carac[] = $item;
            }
            $connection->commit();
        } catch(Exception $ex){
            $erro = "O CARRINHO não pode ser montado!";
            throw new Exception( $erro);
        }
        $connection = null;
        return $prod_carac;
	}

}
?>