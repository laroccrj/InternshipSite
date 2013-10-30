<?php include_once('includes/top.php'); ?>
<?php
		$emailerr = "";
		$passerr = "";
    if(ISSET($_POST["login"]))
    {
	function stripInput($input) 
		{
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
		return $input;
		}	

		$email = "";
		$password = "";
		if(empty($_POST["email"]))
				{$emailerr = "Email is required";}
		else
				{$email = stripInput($_POST["email"]);}
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
			{
				$emailerr = "Invalid email format";
			}
		if(empty($_POST["password"]))
			{$passerr = "Password is required";}
		else
		   {$password = stripInput($_POST["password"]);}
        try
        {
            $_SESSION["user"] = User::login($email, $password);
            
            switch($_SESSION["user"]->info["type"])
            {
                case(UserType::Student):
                    header("Location: student/index.php");
                    break;
                case(UserType::Admin):
                    header("Location: admin/index.php");
                    break;
                case(UserType::Company):
                    header("Location: company/index.php");
                    break;
            }
        }
        catch(BadLoginException $e)
        {
            $error = $e->getMessage();
            /*
                TODO: display errors
            */
        }
    }
?>
<div id="content">
<div style="width: 230px; margin: auto; text-align: center;">
<h2>Please Log In</h2>
<br />
<form action="" method="post">
<table style="margin-bottom:10px;">
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" value="" /><? echo $emailerr; ?></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" value="" /><? echo $passerr; ?></td>
	</tr>
	<tr>
		<td><input type="submit" name="login" value="Login" style="width: 100px;"/></td>
		<td><input type="button" name="forget" value="Forgot Password?" /></td>
	</tr>
</table>
</form>
<a href="newStudent.php">
    Student Sign Up
</a>
<br />
<a href="newCompany.php">
    Company Sign Up 
</a>
</div>
<br />
</div>

<?php include_once('includes/bottom.php'); ?>
