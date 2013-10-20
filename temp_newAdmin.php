<?php
    if(ISSET($_POST["submit"]))
    {
        include "back/user.php";
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $admin = Admin::newAdmin($email, $password);
        
        if(ISSET($admin))
        {
            echo '<span style="color:#00FF00">Admin added</span><br />';
        }
        else
        {
            echo '<span style="color:#F00">Error</span><br />';
        }
    }
?>
<form action="" method="post">
Email<br />
<input type="text" name="email"><br />
Password:<br />
<input type="text" name="password"><br />
<input type="submit" name="submit">
</form>