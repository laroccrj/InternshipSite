<?php include_once('includes/top.php'); ?>
<?php
    
    if(ISSET($_POST["signUp"]))
    {
        /*
            TODO: error checking on form submission
        */
        
        $email = $_POST["email"];
        $name = $_POST["name"];
        $password = $_POST["password"];
        $confPass = $_POST["confPassword"];
        
        $_SESSION["user"] = Company::newCompany($email, $password, $name);
        
        header("Location: company/index.php");
    }
?>
<div id="content">
<div style="width: 230px; margin: auto; text-align: center;">
<h2>Company Sign Up</h2>
<br />
<form action="" method="post">
<table>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" value="" /></td>
	</tr>
    <tr>
		<td>Name:</td>
		<td><input type="text" name="name" value="" /></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" value="" /></td>
	</tr>
    <tr>
		<td>Confirm:</td>
		<td><input type="password" name="confPassword" value="" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="signUp" value="Sign Up" style="width:100%"/></td>
	</tr>
</table>
</form>
</div>
<br />
</div>

<?php include_once('includes/bottom.php'); ?>