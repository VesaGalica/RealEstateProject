<?php 
    session_start();
    unset($_SESSION["user"]);
    $_SESSION['errors']=array();
    array_push($_SESSION['errors'],"Jeni qkyqur");
    header("Location: login.php");

?>