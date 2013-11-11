<?php
$rootDir = "../";
include_once('../includes/top.php');
?>
<?php
    User::checkLogin(UserType::Company, $rootDir);
    $user = $_SESSION["user"];
    
    if(!$user->info["verified"]) header("Location: needVerify.php");
    
    /*
        TODO: Check that the company is verified
    */
    
    require_once('../back/internship.php');
    
    if(ISSET($_POST["submit"]))
    {
        $compName = $_POST["companyName"];
        $contName = $_POST["contactName"];
        $contEmail = $_POST["contactEmail"];
        $title = $_POST["jobTitle"];
        $desc = $_POST["desc"];
        $semester = $_POST["semester"];
        $year = $_POST["year"];
        
        Internship::newInternship($user->id, $compName, $contName, $contEmail, $title, $desc, $semester, $year);
        
        header("Location: index.php");
    }
?>
<div id="content">
<div style="margin: auto;">
    <h2 style="text-align: center;">Post New Internship</h2>
    <form action="" method="post" enctype="multipart/form-data">
	<span>*</span> is required
	<table cellspacing="10" cellpadding="1">
		<tr>
			<td><span>*</span>Company Name:</td>
			<td><input type="text" name="companyName" value="<?php echo $user->info['name']; ?>" /></td>
		</tr>
		<tr>
			<td><span>*</span>Contact Name:</td>
			<td><input type="text" name="contactName" value="" /></td>
		</tr>
		<tr>
			<td><span>*</span>Contact Email:</td>
			<td><input type="text" name="contactEmail" value="<?php echo $user->info['email']; ?>" /></td>
		</tr>
		<tr>
			<td><span>*</span>Job Title:</td>
			<td><input type="text" name="jobTitle" value="" /></td>
		</tr>
		<tr>
			<td><span>*</span>Job Description:</td>
			<td><textarea cols="50" rows="10" name="desc"></textarea></td>
		</tr>
		<tr>
			<td><span>*</span>Semester:</td>
			<td><select name="semester" style="width: 75px;">
					<option value="Fall">Fall</option>
					<option value="Spring">Spring</option>				
				</select></td>
		</tr>
		<tr>
			<td><span>*</span>Year:</td>
			<td><select name="year" style="width: 75px;">
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>					
				</select></td>
		</tr>
        <!--
        TODO: Allow submitting of company logo and pdf files
		<tr>
			<td>Upload Logo:</td>
			<td><input type="file" name="logo" value="" /></td>
		</tr>
		<tr>
			<td>Upload PDF:</td>
			<td><input type="file" name="pdf" value="" /></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
        -->
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit" style="width: 100px;" /><input type="reset" name="reset" value="Reset" style="width: 100px;" /></td>
		</tr>
	</table>
	</form>
</div>
<br />
</div>

<?php include_once('../includes/bottom.php'); ?>
