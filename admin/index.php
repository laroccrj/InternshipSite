<?php
$rootDir = "../";
include_once('../includes/top.php');
?>
<?php
	User::checkLogin(UserType::Admin, $rootDir);
    $user = $_SESSION["user"];
?>
<div id="content">
<div style="margin: auto;">
    <h2>Control Panel:</h2>
    <ul>
        <li>
            <a href="adminAccounts.php">Admin Accounts</a>
        </li>
    </ul>
    <?php
    $companies = User::getUsers(array("type" => UserType::Company, "verified" => false));
    
    if($companies->count() >= 1)
    {
    ?>
        <h2>Companies awaiting approval:</h2>
        <table class="data">
        <tr>
          <th>Name</th>
          <th>Contact</th>
          <th>Verify</th>
		  <th>Delete</th>
        </tr>
    <?php
        
        foreach($companies as $company)
        {
    ?>
        <tr>
            <td style="width:250px;"><?php echo $company["name"]; ?></td>
            <td style="width:250px;"><?php echo $company["email"]; ?></td>
            <td><a href="verifyCompany.php?id=<?php echo $company["_id"]; ?>">Verify</a></td>
			<td><a href="delCompany.php?id=<?php echo $company["_id"]; ?>">Delete</a></td>
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
