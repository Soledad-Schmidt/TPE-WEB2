<?php
class SockModel {
       
    private function connect (){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_socks;charset=utf8', 'root', '');
        return $db;
    }

    private $db;

    function __construct() {
        $this->db = $this->connect();
    }

    function getAllSocks() {
        $query = $this->db->prepare('SELECT a. *, b.* 
                                    FROM sock a 
                                    INNER JOIN brand b
                                    ON a.id_brand = b.id_brand');
        $query->execute(); 
        $socks = $query->fetchAll(PDO::FETCH_OBJ);  
        return $socks;
    } 

    function getSock ($id){
        $query = $this->db->prepare('SELECT a. *, b.* 
                                    FROM sock a 
                                    INNER JOIN brand b
                                    ON a.id_brand = b.id_brand
                                    WHERE id_sock=?');
        $query->execute([$id]);
        $sock = $query->fetch(PDO::FETCH_OBJ);
        return $sock;
    }

    function deleteSock($id) {
        $query = $this->db->prepare('DELETE FROM sock WHERE id_sock=?');
        $query->execute([$id]); 
    }

    function insertSock($model, $color, $size, $price, $brand) {
        $query = $this->db->prepare('INSERT INTO sock (model, color, size, price, id_brand) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$model, $color, $size, $price, $brand]);
        return $this->db->lastInsertId();
    }

    function updateSock( $id_sock, $model, $color, $size, $price, $brand) {
        $query = $this->db->prepare('UPDATE sock 
                                    SET model=?, color=?, size=?, price=?, id_brand=?
                                    WHERE id_sock=?');
        $query->execute([$model, $color, $size, $price, $brand, $id_sock]);
    }
}
