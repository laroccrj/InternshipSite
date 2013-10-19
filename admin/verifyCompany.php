<?php
    
    require_once("../back/user.php");
    
    User::checkLogin(UserType::Admin, $rootDir);
    $user = $_SESSION["user"];
    
    $id = $_GET["id"];
    
    $company = new Company($id);
    $company->verify();
    
    /*
        TODO: Email company
    */
    
    header("Location: index.php");