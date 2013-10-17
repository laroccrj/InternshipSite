<?php include_once('includes/top.php'); ?>
<?php    
    $user = $_SESSION["user"];
    
    /*
        TODO: Check that the user is logged in and is a company
    */
?>
<div id="content">
<div style="margin: auto;">
<h2 style="text-align: center;">Welcome <?php echo $user->info["name"]; ?></h2>
<?php
    if($user->info["verified"])
    {
?>
    <p>
        Company stuff
    </p>
<?php
    }
    else
    {
?>
    <p>
        Your account needs to be approved by an administrator before you can post positions. You will be contacted once an administrator approves your account.
    </p>
<?php
    }
?>
</div>
<br />
</div>

<?php include_once('includes/bottom.php'); ?>