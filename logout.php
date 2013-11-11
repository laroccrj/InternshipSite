<?php include_once('includes/top.php'); ?>
<?php if(ISSET($_SESSION['user'])) {
        unset($_SESSION['user']);
      }

?>
<div id="content">
<div style="text-align: center;">
<br />
<br />
<h2>You have been logged out.</h2>
<br />
<h3><a href="index.php">Home</a></h3>
</div>
<br />
</div>

<?php include_once('includes/bottom.php'); ?>
