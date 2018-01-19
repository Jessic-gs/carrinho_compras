<?php 

require_once "ResourceManager.php";

Class CarItemDao {

    public function inserirCarItem($id_car, $id_item) {
        $sql = "insert into car_item
                    (id_car, id_item)
                value 
                    (:id_car, :id_item);";
        
        $connection = ResourceManager::getConnection();
        
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->bindValue(":id_car", $id_car);
            $prepare->bindValue(":id_item", $id_item);
            $prepare->execute();
            $connection->commit();
        } catch (Exception $ex) {
            $erro = "Erro ao associar CARRINHO ao ITEM!";
            throw new Exception($erro);
        }
        $connection = null;
    }

    public function removerCarItem($id_car, $id_item) {
        $sql = "delete from car_item
                where id_car = :id_car and
                      id_item = :id_item;";
    
        $connection = ResourceManager::getConnection();
        
        try{
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $prepare = $connection->prepare($sql);
            $prepare->bindParam(":id_car", $id_car);
            $prepare->bindParam(":id_item", $id_item);
            $prepare->execute();
        } catch (Exception $ex) {
            $erro = "Relação de ITEM e CARRINHO não pode ser removida!";
            throw new Exception($erro);
        }
        $connection = null;
    }

    public function encontrarCarItemDoProduto($id_produto, $id_car) {
        $sql = "select item.id_item, carrinho.id_car, produto.id_produto 
                from produto inner join item on produto.id_produto = item.id_produto 
                     inner join car_item on item.id_item = car_item.id_item 
                     inner join carrinho on car_item.id_car = carrinho.id_car 
                where item.id_produto = :id_produto and
                      carrinho.id_car = :id_car";

        $connection = ResourceManager::getConnection();
        $car_item = array();
        
        try {
            $connection->beginTransaction();                
            $prepare = $connection->prepare( $sql);
            $prepare->bindValue(":id_produto", $id_produto);
            $prepare->bindValue(":id_car", $id_car);
            $prepare->execute();                
                
            while($linha = $prepare->fetch( PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_car'] = $linha->id_car;
                    $item['id_item'] = $linha->id_item;
                    $item['id_produto'] = $linha->id_produto;
                $car_item[] = $item;
            }
            $connection->commit();
        } catch(Exception $ex){
            $erro = "O CARRINHO não pode ser montado!";
            throw new Exception( $erro);
        }
        $connection = null;
        return $car_item;
    }

    public function encontrarCarItem($id_car) {
        $sql = "select item.id_item, carrinho.id_car, produto.id_produto 
                from produto inner join item on produto.id_produto = item.id_produto 
                     inner join car_item on item.id_item = car_item.id_item 
                     inner join carrinho on car_item.id_car = carrinho.id_car 
                where carrinho.id_car = :id_car";

        $connection = ResourceManager::getConnection();
        $car_item = array();
        
        try {
            $connection->beginTransaction();                
            $prepare = $connection->prepare( $sql);
            $prepare->bindValue(":id_car", $id_car);
            $prepare->execute();                
                
            while($linha = $prepare->fetch( PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_car'] = $linha->id_car;
                    $item['id_item'] = $linha->id_item;
                    $item['id_produto'] = $linha->id_produto;
                $car_item[] = $item;
            }
            $connection->commit();
        } catch(Exception $ex){
            $erro = "O CARRINHO não pode ser montado!";
            throw new Exception( $erro);
        }
        $connection = null;
        return $car_item;
    }

}


?>