<?php
    
    require_once("../back/user.php");
    
    $id = $_GET["id"];
    
    /*
        TODO: Check that id
    */
    
    $company = new Company($id);
    $company->verify();
    
    /*
        TODO: Email company
    */
    
    header("Location: index.php");