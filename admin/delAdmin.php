<?php
    session_start();

    $rootDir = "../";
    
    require_once($rootDir."back/user.php");
    
    User::checkLogin(UserType::Admin, $rootDir);
    
    $id = $_GET["id"];
    
    User::delUser($id);
    
    header("Location: adminAccounts.php");