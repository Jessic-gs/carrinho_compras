<?php 

require_once "ResourceManager.php";

Class PedidoDao {

	public function criarPedido($pedido){
		$sql = "insert pedido
                    (id_car, total_compra, forma_pagamento, data_pedido, horario_pedido)
                value
                    (:id_car, :total_compra, :forma_pagamento, :data_pedido, :horario_pedido)";

        $connection = ResourceManager::getConnection();
        
        try{
            $connection->beginTransaction();
            $prepare = $connection->prepare($sql);
            $prepare->bindValue(":id_car", $pedido['id_car']);
            $prepare->bindValue(":total_compra", $pedido['total_compra']);
            $prepare->bindValue(":forma_pagamento", $pedido['forma_pagamento']);
            $prepare->bindValue(":data_pedido", $pedido['data_pedido']);
            $prepare->bindValue(":horario_pedido", $pedido['horario_pedido']);
            $prepare->execute();
            $connection->commit();
        } catch (Exception $ex) {
            $erro = "Erro ao criar PEDIDO";
            throw new Exception($erro);
        }
        $connection = null;
	}

}

?>