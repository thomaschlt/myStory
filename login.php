<?php
session_start();
require_once "includes/functions.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <title>aStory</title>
</head>
<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form role="form" action="script_inscription.php" method="POST">
                    <label for="chk" aria-hidden="true">Inscription</label>
                    <input type="text" name="username" placeholder="Username" required="">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <input type="password" name="cpswd" placeholder="Confirm password" required="">
                    <button type="submit" name='inscription'>S'inscrire</button>
                </form>
            </div>

            <div class="login">
                <form role="form" action="script_connexion.php" method="POST">
                    <label for="chk" aria-hidden="true">Connexion</label>
                    <input type="text" name="login" placeholder="Username" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button type="submit" name='connexion'>Se connecter</button>
                </form>
            </div>
    </div>
    
</body>
</html>