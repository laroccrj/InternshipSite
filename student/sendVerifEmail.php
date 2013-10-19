<?php
    include_once('../back/user.php');

    session_start();
    User::checkLogin(UserType::Student, "../");
    $user = $_SESSION["user"];
    
    $to = $user->info["email"];
    $subject = "Confirm Alfred State Email";
    $header = "From AlfredState InternShip Program";
    $message = "Please verify your email by going to this link: http://192.168.56.101/verify.php?id=".$user->info["_id"];
    var_dump(mail($to,$subject,$message,$header));
    
    header("Location: needVerify.php?sent=true");