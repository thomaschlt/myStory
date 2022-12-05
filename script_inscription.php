<?php 
session_start();
require 'includes/functions.php';

if(isset($_POST['inscription'])){
    if(!empty($_POST['username']) && !empty($_POST['pswd']) && !empty($_POST['cpswd'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['pswd']);
        $cpassword = htmlspecialchars($_POST['cpswd']);
        if($password == $cpassword){
        $query = getDb()->prepare("insert into `users`(usr_login, usr_mdp) values (?,?)");
        try {
            $query->execute(array($username,$password));
        } catch(Exception $e){
            echo $e->getMessage();
        }
        }
        else {
            $error = "Identifiants incorrects";
        }
        header("Location:login.php");
    }
}

