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
        $this->authHelper = new AuthHelper();        
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

    function delSock($id) {
        
        $this->authHelper->checkLoggedIn();
        $this->modelSocks->deleteSock($id);
        header("Location:" . BASE_URL . "socks");
    }

    function addSock() {
        $this->authHelper->checkLoggedIn();
        $model = $_POST['model'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $brand = $_POST['id_brand'];
        $this->modelSocks->insertSock($model, $color, $size, $price, $brand);
        header("Location:" . BASE_URL . "socks");
    }

    function showInsertForm() {
        $this->authHelper->checkLoggedIn();
        $brand = $this->modelBrands->getAllBrands();
        $this->view->showInsertForm($brand);
    }

    function showUpdateForm($id_sock){
        $this->authHelper->checkLoggedIn();
        $brand = $this->modelBrands->getAllBrands();
        $sock = $this->modelSocks->getSock($id_sock);
        $this->view->showUpdateForm($id_sock, $brand, $sock);
    }
    
    function upSock() {
        $this->authHelper->checkLoggedIn();
        $model = $_POST['model'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $brand = $_POST['id_brand'];
        $id_sock = $_POST['id_sock'];
        $this->modelSocks->updateSock($id_sock, $model, $color, $size, $price, $brand);
        header("Location:" . BASE_URL . "socks");
    }
}