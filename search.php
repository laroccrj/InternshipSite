<?php include_once('includes/top.php'); ?>

<div id="content">
	<h3 id="breadcrumb">Home > Search Internships</h3>
<form action="" method="post">
<table cellspacing="10" cellpadding="1">
	<tr>
		<td>Keywords:</td>
		<td><input type="text" name="keywords" value="" /></td>
	</tr>
	<tr>
		<td>Location:</td>
		<td><input type="text" name="location" value="" /></td>
	</tr>
	<tr>
		<td>Semester:</td>
		<td><select name="semester" style="width: 75px;">
				<option value="Fall">Fall</option>
				<option value="Spring">Spring</option>				
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

</div>
<br />
</div>

<?php include_once('includes/bottom.php'); ?>
