<?php 

require_once "../model/Produto.php";
require_once "ResourceManager.php";

Class ProdutoDao {

	public function listaProdutos(){
        $sql = "select id_produto, nome, descricao, imagem, preco
        		from produto";
        
        $connection = ResourceManager::getConnection();
        $lista = array();
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->execute();
            while ($linha = $prepare->fetch(PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_produto'] = $linha->id_produto;
                    $item['nome'] = $linha->nome;
                    $item['descricao'] = $linha->descricao;
                    $item['imagem'] = $linha->imagem;
                    $item['preco'] = $linha->preco;
                $lista[] = $item;
            }
        } catch (Exception $ex) {
            $erro = "Nenhuma PRODUTO encontrado";
            throw new Exception($erro);
        }

        $connection = null;

        return $lista;
    }

    public function listaProdutosDaCategoria($id_cat){
        $sql = "select produto.id_produto, produto.nome, produto.descricao, 
                       produto.imagem, produto.preco
                from produto inner join prod_cat on produto.id_produto = prod_cat.id_produto
                where prod_cat.id_cat = :id_cat";
        
        $connection = ResourceManager::getConnection();
        $lista = array();

        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->bindParam(":id_cat", $id_cat, PDO::PARAM_STR);
            $prepare->execute();
            while ($linha = $prepare->fetch(PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_produto'] = $linha->id_produto;
                    $item['nome'] = $linha->nome;
                    $item['descricao'] = $linha->descricao;
                    $item['imagem'] = $linha->imagem;
                    $item['preco'] = $linha->preco;
                $lista[] = $item;
            }
        } catch (Exception $ex) {
            $erro = "Nenhuma PRODUTO encontrado";
            throw new Exception($erro);
        }

        $connection = null;

        return $lista;
    }

    public function detalhesProduto($id_produto, $categorias, $caracteristicas) {
        $sql = "select nome, descricao, imagem, preco
                from produto
                where id_produto = :id_produto";

        $produto = new Produto();
        $connection = ResourceManager::getConnection();
        
        try{           
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->bindParam(":id_produto", $id_produto, PDO::PARAM_STR);
            $prepare->execute();
            while ($linha = $prepare->fetch(PDO::FETCH_OBJ)){
                $produto->setID_produto($id_produto);
                $produto->setNome($linha->nome);
                $produto->setDescricao($linha->descricao);
                $produto->setImagem($linha->imagem);
                $produto->setPreco($linha->preco);
                $produto->setCategorias($categorias);
                $produto->setCaracteristicas($caracteristicas);
            }
        } catch (Exception $ex) {
            $erro = "Erro os DETALHES do PRODUTO não forem encontrados";
            throw new Exception($erro);
        }

        $connection = null;
        
        return $produto;
    }

    public function buscaProdutoPeloNome($nome) {
        $sql = "select DISTINCT id_produto, nome, descricao, imagem, preco
                from produto
                where nome like :nome";
        
        try {

            $connection = ResourceManager::getConnection();
            $connection->beginTransaction();
                
            $prepare = $connection->prepare($sql);
            $prepare->bindValue(":nome", "%" . $nome . "%", PDO::PARAM_STR);
            $prepare->execute();
                
            $produtos = array();
                
            while($linha = $prepare->fetch(PDO::FETCH_OBJ)) {
                $item = array();
                    $item['id_produto'] = $linha->id_produto;
                    $item['nome'] = $linha->nome;
                    $item['descricao'] = $linha->descricao;
                    $item['imagem'] = $linha->imagem;
                    $item['preco'] = $linha->preco;
                $produtos[] = $item;
            }
            $connection->commit();
        } catch(Exception $ex){
            $erro = "O PRODUTO não pode ser encontrado!";
            throw new Exception($erro);
        }

        $connection = null;
        return $produtos;
    }

}

?>