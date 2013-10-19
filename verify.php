<?php
    include_once('back/user.php');
    session_start();
    
    $id = $_GET["id"];
    
    if(empty($id)) header("Location: index.php");
    
    $student = new Student($id);
    
    $student->verify();
    
    User::checkLogin(UserType::Student, $rootDir);
    $_SESSION["user"] = $student;
    
    header("Location: index.php");
    
?>