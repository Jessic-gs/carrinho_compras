<?php 

require_once "ResourceManager.php";

Class CarrinhoDao {

    public function criarCarrinho($carrinho) {
        $sql = "insert carrinho
                    (id_car, data_criacao, horario_criacao)
                value
                    (:id_car, :data_criacao, :horario_criacao)";

        $connection = ResourceManager::getConnection();
        
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->bindValue(":id_car", $carrinho['id_car']);
            $prepare->bindValue(":data_criacao", $carrinho['data']);
            $prepare->bindValue(":horario_criacao", $carrinho['horario']);
            $prepare->execute();
            $connection->commit();
        } catch (Exception $ex) {
            $erro = "Erro ao criar CARRINHA";
            throw new Exception($erro);
        }
        $connection = null;
    }

    public function ultimoCarrinho(){
        $sql = "select id_car
                from carrinho
                order by id_car desc limit 1";
        
        $connection = ResourceManager::getConnection();
        $id_car = 0;
        
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->execute();
            while ($linha = $prepare->fetch(PDO::FETCH_OBJ)){
                $id_car = $linha->id_car;
            }
        } catch (Exception $ex) {
            $erro = "CARRINHO não foi encontrado";
            throw new Exception($erro);
        }

        return $id_car;
    }

    public function buscaCarrinho($id_car) {
        $sql = "select produto.id_produto, produto.nome, produto.imagem, produto.preco, 
                       item.id_item, item.quantidade
                from produto inner join item on produto.id_produto = item.id_produto
                     inner join car_item on item.id_item = car_item.id_item
                     inner join carrinho on car_item.id_car = carrinho.id_car
                where carrinho.id_car = :id_car";

        $connection = ResourceManager::getConnection();
        $carrinho = array();
        
        try {
            $connection->beginTransaction();                
            $prepare = $connection->prepare( $sql);
            $prepare->bindValue(":id_car", $id_car);
            $prepare->execute();                
                
            while($linha = $prepare->fetch( PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_car'] = $id_car;
                    $item['nome'] = $linha->nome;
                    $item['imagem'] = $linha->imagem;
                    $item['preco'] = $linha->preco;
                    $item['quantidade'] = $linha->quantidade;
                    $item['id_produto'] = $linha->id_produto;
                    $item['id_item'] = $linha->id_item;
                $carrinho[] = $item;
            }
            $connection->commit();
        } catch(Exception $ex){
            $erro = "O CARRINHO não pode ser montado!";
            throw new Exception( $erro);
        }
        $connection = null;
        return $carrinho;
    }

    public function listaCarrinhos(){
        $sql = "select id_car, data_criacao, horario_criacao
                from carrinho
                where data_criacao < CURDATE() or (CURRENT_TIME()*1)-(horario_criacao*1) > 50000";
        
        $connection = ResourceManager::getConnection();
        $lista = array();

        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->execute();
            while ($linha = $prepare->fetch(PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_car'] = $linha->id_car;
                    $item['data_criacao'] = $linha->data_criacao;
                    $item['horario_criacao'] = $linha->horario_criacao;
                $lista[] = $item;
            }
        } catch (Exception $ex) {
            $erro = "Nenhuma PRODUTO encontrado";
            throw new Exception($erro);
        }

        $connection = null;

        return $lista;
    }

     public function removerCarrinho($id_car){
        $sql = "delete from carrinho where id_car = :id_car;";
        
        $connection = ResourceManager::getConnection();
        
        try{
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $prepare = $connection->prepare($sql);
            $prepare->bindParam(":id_car", $id_car);
            $prepare->execute();
        } catch (Exception $ex) {
            $erro = "CARRINHO não pode ser removido";
            throw new Exception($erro);
        }
        $connection = null;
    }

}


?>