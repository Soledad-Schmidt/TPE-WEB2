<?php

class UserModel {

    private function connect (){
        //abro conexion a la base de datos
        $db = new PDO('mysql:host=localhost;'.'dbname=db_socks;charset=utf8', 'root', '');
        return $db;
    }

    private $db;

    function __construct() {
        $this->db = $this->connect();
    }

    function getUser($name){
        $query = $this->db->prepare('SELECT * FROM user WHERE name=?');
        $query->execute([$name]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
 
}