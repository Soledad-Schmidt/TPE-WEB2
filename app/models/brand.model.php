<?php
class BrandModel {
           
    private function connect (){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_socks;charset=utf8', 'root', '');
        return $db;
    }

    private $db;

    function __construct() {
        $this->db = $this->connect();
    }

    function getAllBrands () {
        $query = $this->db->prepare('SELECT * FROM brand');
        $query->execute();
        $brands = $query->fetchAll(PDO::FETCH_OBJ);
        return $brands;
    }

    function getSocksByBrand($id) {
        $query = $this->db->prepare('SELECT br.*, so.*
                                    FROM brand br
                                    INNER JOIN sock so
                                    ON br.id_brand = so.id_brand
                                    WHERE name=?');
        $query->execute([$id]);
        $socksByBrand = $query->fetchAll(PDO::FETCH_OBJ);
        return $socksByBrand;
    }

    function insertNewBrand($name) {
        $query = $this->db->prepare('INSERT INTO brand (name) VALUE (?)');
        $query->execute([$name]);
        return $this->db->lastInsertId();
    }

    function deleteBrand($id) {
        $query = $this->db->prepare('DELETE FROM brand WHERE id_brand=?');
        $query->execute([$id]);
    }

    function updateBrand($name, $id_brand) {
        $query = $this->db->prepare('UPDATE brand SET name=? WHERE id_brand=?');
        $query->execute([$name, $id_brand]);
    }
}