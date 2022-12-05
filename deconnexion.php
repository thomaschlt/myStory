<?php
session_start();
require_once "includes/functions.php";
unset($_SESSION['id_user']);
session_destroy();
header("Location:index.php");