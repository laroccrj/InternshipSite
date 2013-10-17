<?php include_once('includes/top.php'); ?>

<div id="content">
	<h3 id="breadcrumb">Home > Internship Submission</h3>
	<br />

	<form action="submit.php" method="post" enctype="multipart/form-data">
	<span>*</span> is required
	<table cellspacing="10" cellpadding="1">
		<tr>
			<td><span>*</span>Company Name:</td>
			<td><input type="text" name="companyName" value="" /></td>
		</tr>
		<tr>
			<td><span>*</span>Contact Name:</td>
			<td><input type="text" name="contactName" value="" /></td>
		</tr>
		<tr>
			<td><span>*</span>Contact Email:</td>
			<td><input type="text" name="contactEmail" value="" /></td>
		</tr>
		<tr>
			<td><span>*</span>Job Title:</td>
			<td><input type="text" name="jobTitle" value="" /></td>
		</tr>
		<tr>
			<td><span>*</span>Job Description:</td>
			<td><textarea cols="50" rows="10"></textarea></td>
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
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit" style="width: 100px;" /><input type="reset" name="reset" value="Reset" style="width: 100px;" /></td>
		</tr>
	</table>
	</form>
</div>

<?php include_once('includes/bottom.php'); ?>
