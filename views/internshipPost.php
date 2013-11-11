<?php
    $info = $internship->info;
?>
<div class="posting">
<h3><?php echo $info['title']; ?></h3>
<table cellspacing="10" cellpadding="1">
		<tr>
			<td>Contact Name:</td>
			<td><?php echo $info["contact"]; ?></td>
		</tr>
		<tr>
			<td>Contact Email:</td>
			<td><?php echo $info["contactEmail"]; ?></td>
		</tr>
		<tr>
			<td>Job Title:</td>
			<td><?php echo $info["title"]; ?></td>
		</tr>
		<tr>
			<td>Job Description:</td>
			<td><?php echo $info["desc"]; ?></td>
		</tr>
		<tr>
			<td>Semester:</td>
			<td><?php echo $info["semester"]; ?></td>
		</tr>
		<tr>
			<td>Year:</td>
			<td><?php echo $info["year"]; ?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>

