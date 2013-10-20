<?php
$rootDir = "../";
include_once('../includes/top.php');
?>
<?php
	User::checkLogin(UserType::Admin, $rootDir);
    $user = $_SESSION["user"];
    
    if(ISSET($_POST["newAdmin"]))
    {
        $email = $_POST["email"];
        $password = $_POST["pass"];
        try
        {
            $newAdmin = Admin::newAdmin($email, $password);
        }
        catch(UserExistsException $e)
        {
            $error = "Email in use";
        }
    }
?>
<div id="content">
<div style="margin: auto;">
    <h2>Add Admin:</h2>
    <form action="" method="post">
    <table>
        <tr>
            <td>Eamil:</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Add" name="newAdmin" style="width:100%;">
            </td>
        </tr>
        <tr>
            <?php
                if(ISSET($newAdmin))
                {
                    echo '<span style="color:#00FF00">Admin added</span><br />';
                }
                else if(ISSET($error))
                {
                    echo '<span style="color:#F00">'.$error.'</span><br />';
                }
            ?>
        </tr>
    </table>
    </form>
    
    <?php
    $admins = User::getUsers(array("type" => UserType::Admin));
    
    if($admins->count() >= 1)
    {
    ?>
        <h2>Current Admins:</h2>
        <table class="data">
        <tr>
          <th>Email</th>
        </tr>
    <?php
        
        foreach($admins as $admin)
        {
    ?>
        <tr>
            <td style="width:250px;"><?php echo $admin["email"]; ?></td>
            <td><a href="delAdmin.php?id=<?php echo $admin["_id"]; ?>">Delete</a></td>
        </tr>
    <?php
        }
    }
    ?>
    </table>
</div>
<br />
</div>

<?php include_once('../includes/bottom.php'); ?>