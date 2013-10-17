<?php include_once('includes/top.php'); ?>
<?php
    
    if(ISSET($_POST["signUp"]))
    {
        /*
            TODO: error checking on form submission
        */
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confPass = $_POST["confPassword"];
        
        $_SESSION["user"] = Student::newStudent($email, $password);
        
        header("Location: student/index.php");
    }
?>
<div id="content">
<div style="width: 230px; margin: auto; text-align: center;">
<h2>Student Sign Up</h2>
<br />
<form action="" method="post">
<table>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" value="" /></td>
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