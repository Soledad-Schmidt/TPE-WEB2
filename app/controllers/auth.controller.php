<?php
require_once 'app/view/auth.view.php';
require_once 'app/models/user.model.php';
require_once 'app/models/sock.model.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->view = new AuthView();
        $this->model = new UserModel();
    }

    public function showWelcome() {
        $this->view->showWelcome();
    }
    
    public function showLogin(){
        
        $this->view->showFormLogin();
    }

    public function login() {
        if(!empty($_POST['name']) && !empty($_POST['password'])) {
            $name = $_POST['name'];
            $password = $_POST['password']; 
      
            //obtengo el usuario de la db
            $user = $this->model->getUser($name);
       
            //chequeo que el usuario y contraseña existan
            if ($user && password_verify($password, $user->password)) {

                session_start();
                $_SESSION['USER_ID'] = $user->id_user; 
                $_SESSION['USER_NAME'] = $user->name; 
                $_SESSION['IS_LOGGED'] = true;

                header ("Location: " . BASE_URL . "socks");
            } else {
                $this->view->showFormLogin("Usuario o contraseña incorrectos");
            }    
        }
    }

    public function showRegister() {
        $this->view->showFormReg();
    }

    public function register() {
        if(!empty($_POST['name']) && !empty($_POST['password'])) {
            $name = $_POST['name'];
            $password = password_hash ($_POST['password'], PASSWORD_BCRYPT);
        
            //guardo el nuevo usuario en la DB
            $db = new PDO('mysql:host=localhost;'.'dbname=db_socks;charset=utf8', 'root', '');
            $query = $db->prepare('INSERT INTO user (name, password) VALUES (?, ?)');
            $query->execute([$name, $password]);
        }
    }

    public function logout(){
         session_start();
         session_destroy();
         header ("Location: " . BASE_URL . "login");
    }

}