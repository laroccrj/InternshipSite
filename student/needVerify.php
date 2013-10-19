<?php
$rootDir = "../";
include_once('../includes/top.php');
?>
<?php
    User::checkLogin(UserType::Student, $rootDir);
    $user = $_SESSION["user"];
?>
<div id="content">
    <div style="margin: auto;">
        <h2 style="text-align: center;">Need Verification</h2>
        <p>You need to verify that you are a student. You should have been sent a verification email. <a href="sendVerifEmail.php">Resend Email</a>
        <?php if(ISSET($_GET["sent"]) && $_GET["sent"]) { ?>
            <p style="color:#00FF00">Email Sent</p>
        <?php } ?>
    </div>
    <br />
</div>

<?php include_once('../includes/bottom.php'); ?>