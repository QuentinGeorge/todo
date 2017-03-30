<?php
namespace Controllers;

use Models\Auth as ModelsAuth;

class Auth {
    private $modelsAuth = null;

    public function __construct() {
        $this->modelsAuth = new ModelsAuth();
    }

    public function getLogin() {

        return ['view' => 'views/userlogin.php'];
    }

    public function postLogin() {
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        if ($this->modelsAuth->checkValidEmail($email) === false) {
            die('Veuiller entrer un email valide');
        }
        $_SESSION['user'] = $this->modelsAuth->getUserDB($email, $password);

        header('Location:' . PROJECT_PATH . 'index.php');
        exit;
    }

    public function getLogout() {
        $_SESSION = array();
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', 1,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        session_destroy();

        header('Location:' . PROJECT_PATH . 'index.php');
        exit;
    }
}
