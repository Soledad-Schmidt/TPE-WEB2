<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class BrandView {
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showBrands($brands) {
        $this->smarty->assign('titulo', 'Lista de Marcas');
        $this->smarty->assign('brands', $brands);
        $this->smarty->display('templates/brandsList.tpl');
    }

    function showSocksByBrand($socksByBrand){
        $this->smarty->assign('titulo', 'Medias por Marca');
        $this->smarty->assign('socksByBrand', $socksByBrand);
        $this->smarty->display('templates/socksByBrand.tpl');
    }

    function showBrandForm() {
        $this->smarty->assign('titulo', 'Agregar Marca');
        $this->smarty->display('templates/form-insert-brand.tpl');
    }

    function showBrandUpdateForm($id_brand) {
        $this->smarty->assign('titulo', 'Editar Marca');
        $this->smarty->assign('id_brand', $id_brand);
        $this->smarty->display('templates/form-update-brand.tpl');
    }
}
