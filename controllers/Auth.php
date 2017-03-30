<?php
namespace Controllers;

use Models\Auth as ModelsAuth;

class Auth {
    public function getLogin() {

        return ['view' => 'views/userlogin.php'];
    }

    public function postLogin() {
        $modelsAuth = new ModelsAuth();
        
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        if ($modelsAuth->checkValidEmail($email) === false) {
            die('Veuiller entrer un email valide');
        }
        $_SESSION['user'] = $modelsAuth->getUserDB($email, $password);

        header('Location:' . PROJECT_PATH . 'index.php');
        exit;
    }

    public function getLogout() {
        session_destroy();

        header('Location:' . PROJECT_PATH . 'index.php');
        exit;
    }
}
