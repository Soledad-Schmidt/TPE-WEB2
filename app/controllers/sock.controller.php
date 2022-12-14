<?php

require_once 'app/models/sock.model.php';
require_once 'app/view/sock.view.php';
require_once 'app/models/brand.model.php';
require_once 'helpers/auth.helper.php';

class SockController {
    private $modelSocks;
    private $view;
    private $modelBrands;
    private $authHelper;

    function __construct() {
        $this->modelSocks = new SockModel();
        $this->modelBrands = new BrandModel();
        $this->view = new SockView();
         
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
       
   
    }

    function showSocks () {
        //obtengo las medias del modelo
        $socks = $this->modelSocks->getAllSocks();
        //actualizo la vista
        $this->view->showSocks($socks);
    }

    function showSock($id) {
        $sock = $this->modelSocks->getSock($id);
        $this->view->showSock($sock);
    }

    function showSale(){
        $socks = $this->modelSocks->getSale();
       
        $this->view->showSale($socks);
    }

    function delSock($id) {
        
        $this->modelSocks->deleteSock($id);
        header("Location:" . BASE_URL . "socks");
    }

    function addSock() {
       
        $model = $_POST['model'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $brand = $_POST['id_brand'];
        $sale = $_POST['sale'];
        $this->modelSocks->insertSock($model, $color, $size, $price, $brand, $sale);
        header("Location:" . BASE_URL . "socks");
    }

    function showInsertForm() {
      
        $brand = $this->modelBrands->getAllBrands();
        $this->view->showInsertForm($brand);
    }

    function showUpdateForm($id_sock){
     
        $brand = $this->modelBrands->getAllBrands();
        $sock = $this->modelSocks->getSock($id_sock);
        $this->view->showUpdateForm($id_sock, $brand, $sock);
    }
    
    function upSock() {
        
        $model = $_POST['model'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $brand = $_POST['id_brand'];
        $sale = $_POST['sale'];
        $id_sock = $_POST['id_sock'];
        $this->modelSocks->updateSock($id_sock, $model, $color, $size, $price, $brand, $sale);
        header("Location:" . BASE_URL . "socks");
    }
}