<?php

class AuthView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showWelcome() {
        $this->smarty->display('templates/welcome.tpl');
    }

    function showFormLogin($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->assign('titulo', 'Ingresar');
        $this->smarty->display('templates/login.tpl');
    }

    function showFormReg() {
        $this->smarty->assign('titulo', 'Registrarse');
        $this->smarty->display('templates/register.tpl');
    }

    function showSocks($admin) {
        $this->smarty->assign('titulo','Administrar medias');
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/socksList.tpl');
    }

}
 