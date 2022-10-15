<?php

require_once 'app/models/brand.model.php';
require_once 'app/view/brand.view.php';
require_once 'helpers/auth.helper.php';

class BrandController {
    private $model;
    private $view;
    private $authHelper;

    function __construct() {
        $this->model = new BrandModel();
        $this->view = new BrandView();
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();
    }

    function showBrands() {
        $brands = $this->model->getAllBrands();
        $this->view->showBrands($brands);
    }

    function showSocksByBrand($id) {
        $socksByBrand = $this->model->getSocksByBrand($id);
        $this->view->showSocksByBrand($socksByBrand);  
    }

    function brandForm() {
        $this->view->showBrandForm();
    }

    function addBrand() {
        $name = $_POST['name'];
        $this->model->insertNewBrand($name);
        header("Location:" . BASE_URL . "brands");
    }

    function delBrand($id) {
        $this->model->deleteBrand($id);
        header("Location:" . BASE_URL . "brands");
    }

    function showBrandUpdateForm($id_brand) {
        $this->view->showBrandUpdateForm($id_brand);
    }

    function upBrand() {
        $name = $_POST['name'];
        $id_brand = $_POST['id_brand'];
        $this->model->updateBrand($name, $id_brand);
        header("Location:" . BASE_URL . "brands");
    }
}