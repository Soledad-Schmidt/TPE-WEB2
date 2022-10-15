<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class SockView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }
  
    function showSocks ($socks) {
        $this->smarty->assign('titulo', 'Lista de Medias');
        $this->smarty->assign('socks', $socks);
        $this->smarty->display('templates/socksList.tpl');
    } 

    function showSock($sock){ 
        $this->smarty->assign('titulo', 'Detalle');
        $this->smarty->assign('sock', $sock);
        $this->smarty->display('templates/sockDetail.tpl');
    }

    function showInsertForm($brand) {
        $this->smarty->assign('titulo', 'Agregar Media');
        $this->smarty->assign('brand', $brand);
        $this->smarty->display('templates/form-insert.tpl');
    }   

    function showUpdateForm($id_sock, $brand, $sock) {
        $this->smarty->assign('titulo', 'Modificar un item');
        $this->smarty->assign('id_sock', $id_sock);
        $this->smarty->assign('brand', $brand);
        $this->smarty->assign('sock', $sock);
        $this->smarty->display('templates/form-update-sock.tpl');
    }
}
