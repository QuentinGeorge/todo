<?php
function getLogin() {

    return ['view' => 'views/userlogin.php'];
};

function postLogin() {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    include 'models/authModel.php';

    if (checkValidEmail($email) === false) {
        die('Veuiller entrer un email valide');
    }
    $_SESSION['user'] = getUserDB($email, $password);

    header('Location: http://homestead.app/PHP/todo/index.php');
    exit;
};

function getLogout() {
    session_destroy();

    header('Location: http://homestead.app/PHP/todo/index.php');
    exit;
};
