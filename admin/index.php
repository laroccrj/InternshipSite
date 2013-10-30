<?php
$rootDir = "../";
include_once('../includes/top.php');
?>
<?php
	if(!ISSET($_SESSION["user"])) header("Location: ../index.php");

    $user = $_SESSION["user"];
    
    if($user->info["type"] != UserType::Admin) header("Location: ../index.php");
?>
<div id="content">
<div style="margin: auto;">
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
        </tr>
    <?php
        
        foreach($companies as $company)
        {
    ?>
        <tr>
            <td style="width:250px;"><?php echo $company["name"]; ?></td>
            <td style="width:250px;"><?php echo $company["email"]; ?></td>
            <td><a href="verifyCompany.php?id=<?php echo $company["_id"]; ?>">Verify</a></td>
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