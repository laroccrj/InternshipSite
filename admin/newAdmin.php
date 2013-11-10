<?php include_once('includes/topAdmin.php'); ?>
<?php
    
    if(ISSET($_POST["signUp"]))
    {
        $error = array();
        
        try
        {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confPass = $_POST["confPassword"];
            
            if($password != $confPass) $error["pass"] = "Passwords don't match";

            if(count($error) == 0)
            {
                $_SESSION["user"] = Admin::newAdmin($email, $password);
            
                header("Location: admin/index.php");
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
    }
?>
<div id="content">
<div style="width: 230px; margin: auto; text-align: center;">
<h2>New Administrator</h2>
<br />
<form action="" method="post">
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