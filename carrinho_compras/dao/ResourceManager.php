<?php

class ResourceManager {
    public static function getConnection() {
        $connection = null;
        $server = 'mysql:host=127.0.0.1;';
        $database = 'dbname=carrinho_compras';
        $user = "root";
        $password = "";
        $endereco = $server . $database;
        try {
            $connection = new PDO($endereco, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            throw new Exception("Unable to connect to the database!", 1);
        }
        return $connection;
    }
}

?>