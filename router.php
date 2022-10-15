<?php
require_once 'app/controllers/sock.controller.php';
require_once 'app/controllers/brand.controller.php';
require_once 'app/controllers/auth.controller.php';
//defino la base url para la construccion de links con url semanticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'welcome';
}

$params = explode('/',$action);

//TABLA DE RUTEO

switch ($params[0]) {
    case 'welcome':
        $authController = new AuthController();
        $authController->showWelcome();
        break;

    case 'socks':
        $sockController = new SockController();
        $sockController->showSocks(); 
        break;

    case 'detail':
        $sockController = new SockController();
        $sockController->showSock($params[1]);
        break;

    case 'brands':
        $brandController = new BrandController();
        $brandController->showBrands();
        break;
        
    case 'socksbybrand':
        $brandController = new BrandController();
        $brandController->showSocksByBrand($params[1]);
        break;

    case 'deletesock':
        $sockController = new SockController();
        $sockController->delSock($params[1]);
        break;

    case 'insertsock':
        $sockController = new SockController();
        $sockController->showInsertForm();
        break;

    case 'addsock':
        $sockController = new SockController();
        $sockController->addSock();
        break;

    case 'insertbrand':
        $brandController = new BrandController();
        $brandController->brandForm();
        break;

    case 'addbrand':
        $brandController = new BrandController(); //agregar una marca nueva
        $brandController->addBrand();
        break;

    case 'detelebrand':
        $brandController = new BrandController();
        $brandController->delBrand($params[1]);
        break;

    case 'editsock':
        $sockController = new SockController();
        $sockController->showUpdateForm($params[1]);
        break;

    case 'updatesock':
        $sockController = new SockController();
        $sockController->upSock();
        break;

    case 'editbrand':
        $brandController = new BrandController();
        $brandController->showBrandUpdateForm($params[1]);
        break;

    case 'updatebrand': 
        $brandController = new BrandController();
        $brandController->upBrand();
        break;

    case 'login':
        $authController = new AuthController();
        $authController->showLogin();
        break;

    case 'verify':
        $authController = new AuthController();
        $authController->login();   
        break;

    case 'register':
        $authController = new AuthController();
        $authController->showRegister();
        break;

    case 'usercreate':
        $authController = new AuthController();
        $authController->register();

    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    default:
        echo '404 - Pagina no encontrada';        
}