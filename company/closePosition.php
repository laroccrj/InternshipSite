<?php
    
    require_once("../back/user.php");
    require_once("../back/internship.php");
    
    $id = $_GET["id"];
    
    /*
        TODO: Check that id and make sure this company is the owner of this internship
    */
    
    $internship = new Internship($id);
    $internship->close();
    
    /*
        TODO: Email company
    */
    
    header("Location: index.php");