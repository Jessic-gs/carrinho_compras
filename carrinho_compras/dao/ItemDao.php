<?php 

require_once "ResourceManager.php";

Class ItemDao {

    public function inserirItem($produto){
        $sql = "insert into item
                    (quantidade, id_produto)
                value 
                    (:quantidade, :id_produto);";
        
        $connection = ResourceManager::getConnection();
        
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->bindValue(":quantidade", 1);
            $prepare->bindValue(":id_produto", $produto->getID_produto());
            $prepare->execute();
            $connection->commit();
        } catch (Exception $ex) {
            $erro = "Erro ao inserir ITEM no BD!";
            throw new Exception($erro);
        }
        $connection = null;
    }

    public function ultimoItem(){
        $sql = "select id_item
                from item
                order by id_item desc limit 1";
        
        $connection = ResourceManager::getConnection();
        $id_item = 0;
        
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->execute();
            while ($linha = $prepare->fetch(PDO::FETCH_OBJ)){
                $id_item = $linha->id_item;
            }
        } catch (Exception $ex) {
            $erro = "ITEM não foi encontrado!";
            throw new Exception($erro);
        }

        return $id_item;
    }

    public function removerItem($id_item) {
        $sql = "delete from item
                where id_item = :id_item;";
            
        $connection = ResourceManager::getConnection();
        
        try{
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $prepare = $connection->prepare($sql);
            $prepare->bindParam(":id_item", $id_item);
            $prepare->execute();
        } catch (Exception $ex) {
            $erro = "ITEM não pode ser removido!";
            throw new Exception($erro);
        }
        $connection = null;
    }

    public function buscaItem($id_item){
        $sql = "select id_item, quantidade, id_produto
                from item
                where id_item = :id_item";

        $connection = ResourceManager::getConnection();
        $item = array();
        
        try {
            $connection->beginTransaction();                
            $prepare = $connection->prepare( $sql);
            $prepare->bindValue(":id_item", $id_item);
            $prepare->execute();                
                
            while($linha = $prepare->fetch( PDO::FETCH_OBJ)) {
                $it = array();
                    $it['id_item'] = $linha->id_item;
                    $it['quantidade'] = $linha->quantidade;
                    $it['id_produto'] = $linha->id_produto;
                $item[] = $it;
            }
            $connection->commit();
        } catch(Exception $ex){
            $erro = "O ITEM não pode ser encontrado!";
            throw new Exception( $erro);
        }
        $connection = null;
        
        return $item;
    }

    public function alterarQuantidade($item) {
        $sql = "update item
                    set quantidade = :quantidade
                where id_item = :id_item;";
            
        $connection = ResourceManager::getConnection();
        
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
                $prepare->bindValue(":id_item", $item['id_item']);
                $prepare->bindValue(":quantidade", $item['quantidade']);
            $prepare->execute();
            $connection->commit();
        } catch (Exception $ex) {
            $erro = "QUANTIDADE DO ITEM não pode ser alterada!";
            throw new Exception($erro);
        }
        $connection = null;
    }

}


?>