<?php
    include_once('back/user.php');
    
    $id = $_GET["id"];
    
    if(empty($id)) header("Location: index.php");
    
    $student = new Student($id);
    
    $student->verify();
    
    header("Location: index.php");
    
?>