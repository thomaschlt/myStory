<?php
session_start();
require_once "includes/functions.php";

if(isset($_POST['connexion'])){
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

        $stmt = getDb()->prepare('select * from users where usr_login=? and usr_mdp=?');
        $stmt->execute(array($login, $password));
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();

            $_SESSION['id_user'] = $user['usr_id'];
            $_SESSION['login'] = $login;
            //mettre l'id. user en session aussi ? 
            $_SESSION['is_admin'] = $user['is_admin'];          
            header("Location:index.php#slider-container");
        }
        else {
            $error = "Utilisateur non reconnu";
            header("Location:login.php");
        }
    }
}