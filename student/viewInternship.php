<?php
$rootDir = "../";
include_once('../includes/top.php');
?>
<?php    
    User::checkLogin(UserType::Student, $rootDir);
    $user = $_SESSION["user"];
    
    require_once('../back/internship.php');
    $internship = new Internship($_GET["id"]);
?>
<div id="content">
<div style="margin: auto;">
<h2 style="text-align: center;"><?php echo $internship->info["title"]; ?></h2>
<?php
    include_once("../views/intershipPost.php");
?>
</div>
<br />
</div>

<?php include_once('../includes/bottom.php'); ?>