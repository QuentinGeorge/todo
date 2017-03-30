<?php

function checkValidEmail($input) {
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}

function getUserDB($email, $password) {
    $pdo = connectDB();
    if ($pdo) {
        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
        try {
            $pdoSt = $pdo->prepare($sql);
            $pdoSt->execute([
                ':email' => $email,
                ':password' => $password
            ]);
            return $pdoSt->fetch();
        } catch (PDOException $e) {
            die('Une erreure est survenue lors de la connection');
        }
    } else {
        die('Une erreure est survenue lors de la connection a la DB');
    }
}
