<?php include_once('includes/top.php'); ?>
<?php
    
       if(ISSET($_POST["signUp"]))
    {
        $error = array();
        
        try
        {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confPass = $_POST["confPassword"];
            $name = $_POST["name"];
            if($password != $confPass) $error["pass"] = "Passwords don't match";

            if(count($error) == 0)
            {
                $_SESSION["user"] = Company::newCompany($email, $password,$name);
            
                header("Location: company/index.php");
            }
        }
        catch(UserExistsException $e)
        {
            $error["email"] = "Email already in use";
        }
        catch(InvalidEmailException $e)
        {
            $error["email"] = "Invalid email";
        }
		catch(BadPasswordException $e)
		{
			$error["pass"] = "Password must be 6 characters or longer";
		}
		catch(InvalidNameException $e)
		{
			$error["name"] = "Must have a name";
		}
    }
?>
<div id="content">
<div style="width: 230px; margin: auto; text-align: center;">
<h2>Company Sign Up</h2>
<br />
<form action="" id="companysignup" method="post">
<div id="errors"></div>
<table>
	<tr>
		<td>Email:</td>
		<td><input type="text" name="email" value="" /></td>
	</tr>
	    <?php if(ISSET($error["email"])) { ?>
        <tr>
        <td style="color:#ff0000" colspan="2">
            <?php echo $error["email"]; ?>
        </td>
        </tr>
		<?php } ?>
    <tr>
		<td>Name:</td>
		<td><input type="text" name="name" value="" /></td>
	</tr>
		<?php if(ISSET($error["name"])) { ?>
        <tr>
        <td style="color:#ff0000" colspan="2">
            <?php echo $error["name"]; ?>
        </td>
        </tr>
		<?php } ?>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" value="" /></td>
	</tr>
		<?php if(ISSET($error["pass"])) { ?>
        <tr>
        <td style="color:#ff0000" colspan="2">
            <?php echo $error["pass"]; ?>
        </td>
        </tr>
		<?php } ?>
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