<?php
    include_once(ISSET($rootDir)? $rootDir.'back/user.php' : 'back/user.php');
    session_start();
?>
<html>
<head>
<link rel="stylesheet" href="<?php if(ISSET($rootDir)) echo $rootDir; ?>style.css" type="text/css" />
<script type="text/javascript" src="<?php if(ISSET($rootDir)) echo $rootDir; ?>javascript.js"></script>
</head>

<body>
<div id="container">

<div id="header">
<img src="<?php if(ISSET($rootDir)) echo $rootDir; ?>images/header.jpg" alt="Alfred State Logo" />
</div>

<div id="nav">
<ul>
    <a href="<?php if(ISSET($rootDir)) echo $rootDir; ?>index.php"><li>Home</li></a>
    <a href="<?php if(ISSET($rootDir)) echo $rootDir; ?>search.php"><li>Search Internships</li></a>
    <?php
        if(ISSET($_SESSION['user'])) {
            echo '<a href="'.$rootDir.'logout.php"><li>Logout</li></a>';
        }
    ?>
</ul>
</div>
