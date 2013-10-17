<?php
$rootDir = "../";
include_once('../includes/top.php');
?>
<?php    
    $user = $_SESSION["user"];
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
    include_once("../views/intershipPost.php");
?>
</div>
<br />
</div>

<?php include_once('../includes/bottom.php'); ?>