<?php include_once('includes/top.php'); ?>
<?php
	if(ISSET($_SESSION["user"]))
    {
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
    
    if(ISSET($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
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
        }
    }
?>
<div id="content">
<div style="width: 230px; margin: auto; text-align: center;">
<h2>Please Log In</h2>
<br />
<form action="" id="loginform" method="post">
<table style="margin-bottom:10px;">
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" value="" /></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" value="" /></td>
	</tr>
	<tr>
		<td><input type="submit" name="login" value="Login" style="width: 100px;"/></td>
		<td><input type="button" name="forget" value="Forgot Password?" /></td>
	</tr>
    <div id="errors"></div>
    <tr>
        <td colspan="2" style="color:#FF0000">
            <?php
                if(ISSET($error)) echo $error;
            ?>
        </td>
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
