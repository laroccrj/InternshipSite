<?php include_once('includes/top.php'); ?>
<?php
    require_once('back/internship.php');
$title = "";
$year = "";
$semester = "";
$location = "";
?>
<div id="content">
	<h3 id="breadcrumb">Home > Search Internships</h3>
<form action="" method="post">
<table cellspacing="10" cellpadding="1">
	<tr>
		<td>Title:</td>
		<td><input type="text" name="title" value="" /></td>
	</tr>
<!--	<tr>
		<td>Location:</td>
		<td><input type="text" name="location" value="" /></td>
	</tr> -->
	<tr>
		<td>Semester:</td>
			<td><select name="semester" style="width: 75px;">
					<option value="Fall">fall</option>
					<option value="Spring">spring</option>
					<option value="Summer">summer</option>	
					<option value="Winter">winter</option>
					<option value="Year Round">All-Round</option>
				</select></td>
	</tr>
	<tr>
			<td>Year:</td>
			<td><select name="year" style="width: 75px;">
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>					
				</select></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Search" /></td>
	</tr>
</table>
</form>


<div id="searchResults">
<?php
if(ISSET($_POST["submit"]))
{
	$searchterms = array();
	$title = $_POST['title'];
	$year = $_POST['year'];
	$semester = $_POST['semester'];
	$titleregex = new MongoRegex('/^.*'.$title.'.*/i');
	$yearregex = new MongoRegex('/^'.$year.'/i');
	$semesterregex = new MongoRegex('/^'.$semester.'/i');
	$query=	array( '$or' => array(array('title' => $titleregex),
									array('year' => $yearregex),
									array('semester' => $semesterregex)));
}
$internships = Internship::getInternships($query);
	if($internships->count() >= 1)
    {	
	?>
	<table class ="data">
		<th>Title</th>
	<?php
		foreach ($internships as $internship)
		{
			if(ISSET($_SESSION['user'])) 
			{
				switch($_SESSION['user']->info['type']) 
				{
					case(UserType::Student):
				?>
					<tr>
						<td><a href="../student/viewInternship.php?id=<?php echo $internship['_id']; ?>"><?php echo $internship["title"]; ?></a></td>
					</tr>
				<?php
					break;
					case(UserType::Admin):
				?>
					<tr>
						<td><a href="../admin/viewInternship.php?id=<?php echo $internship['_id']; ?>"><?php echo $internship["title"]; ?></a></td>
					</tr>
				<?php
					break;
				}
				?>

	</table>
	<?php
			}
		}
	}
	?>
</div>
<br />
</div>

<?php include_once('includes/bottom.php'); ?>
