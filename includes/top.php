<?php
    include_once(ISSET($rootDir)? $rootDir.'back/user.php' : 'back/user.php');
    session_start();

    if(!ISSET($rootDir))
        $rootDir = "";
		/*TODO -- MAKE email from session appear
		if(isset($_SESSION['email']))
		{
		$email = $_SESSION['email'];;
		}else
		$email = "";
		*/
?>
<html>
<head>
<link rel="stylesheet" href="<?php echo $rootDir; ?>style.css" type="text/css" />
<script type="text/javascript" src="<?php echo $rootDir; ?>javascript.js"></script>
</head>

<body>
<div id="container">

<div id="header">
<img src="<?php echo $rootDir; ?>images/header.jpg" alt="Alfred State Logo" /> <?php //echo $email ?>
</div>

<div id="nav">
<ul>
    <a href="<?php echo $rootDir; ?>index.php"><li>Home</li></a>
    <?php
   
        if(ISSET($_SESSION['user'])) {
			
            switch($_SESSION['user']->info['type']) {
                case(UserType::Student):
                    echo '<a href="'.$rootDir.'search.php"><li>Search Internships</li></a>';
                    break;
                case(UserType::Admin):
                    echo '<a href="'.$rootDir.'admin/adminAccounts.php"><li>Add a New Administrator</li></a>';
                    echo '<a href="'.$rootDir.'search.php"><li>Search Internships</li></a>';
                    break;
                case(UserType::Company):
                    echo '<a href="'.$rootDir.'company/viewInternship.php"><li>Check your Internships</li></a>';
                    break;  
            }
            echo '<a href="'.$rootDir.'logout.php"><li>Logout</li></a>';
        }
    ?>
</ul>
</div>
