<?php
$rootDir = "../";
include_once('../includes/top.php');
?>
<?php    
    User::checkLogin(UserType::Company, $rootDir);
    $user = $_SESSION["user"];
    
    if(!$user->info["verified"]) header("Location: needVerify.php");
    
    require_once('../back/internship.php');
    /*
        TODO: Check the get id and that the company owns that id
    */
    $internship = new Internship($_GET["id"]);
?>
<div id="content">
<div style="margin: auto;">
<h2 style="text-align: center;"><?php echo $internship->info["title"]; ?></h2>
<?php
    include_once("../views/internshipPost.php");
?>
</div>
<br />
</div>

<?php include_once('../includes/bottom.php'); ?>
