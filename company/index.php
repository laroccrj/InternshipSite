<?php
$rootDir = "../";
include_once('../includes/topCompany.php');
?>
<?php
    User::checkLogin(UserType::Company, $rootDir);
    $user = $_SESSION["user"];
    
    require_once('../back/internship.php');
?>
<div id="content">
<div style="margin: auto;">
<h2 style="text-align: center;">Welcome <?php echo $user->info["name"]; ?></h2>
<?php
    if($user->info["verified"])
    {
?>
        <p>
            <a href="newInternship.php">Post New Internship</a>
        </p>
        <h3>Current Open Internships:</h3>
        <table class="data">
            <tr>
              <th style="width:200px;">Title</th>
              <th style="width:150px;">Contact Name</th>
              <th style="width:150px;">Contact Email</th>
              <th></th>
            </tr>
        <?php
        $internships = Internship::getInternships(array("user" => $user->id, "open" => true));

        foreach($internships as $internship)
        {
        ?>
            <tr>
                <td><a href="viewInternship.php?id=<?php echo $internship["_id"]; ?>"><?php echo $internship["title"]; ?></a></td>
                <td><?php echo $internship["contact"]; ?></td>
                <td><?php echo $internship["contactEmail"]; ?></td>
                <td><a href="closePosition.php?id=<?php echo $internship["_id"]; ?>">Close</a></td>
            </tr>
        <?php
        }
    }
    else
    {
?>
    <p>
        Your account needs to be approved by an administrator before you can post positions. You will be contacted once an administrator approves your account.
    </p>
<?php
    }
?>
</div>
<br />
</div>

<?php include_once('../includes/bottom.php'); ?>