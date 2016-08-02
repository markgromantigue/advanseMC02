<html>
<head>
<?php
$user_id = $_GET['user_id'];
$project_id = $_GET['project_id'];
?>
<script src="js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$("#addRow").on("click",function() {
			$("#inputRow").append('<br><table><tr><th>Type</th><th>Inject</th><th>Remove</th><th>Fix Time</th><th>Fix Defect</th></tr><tr><td><select name="type[]"><option value="10">10 - Documentation</option><option value="20">20 - Syntax</option><option value="30">30 - Build/Package</option><option value="40">40 - Assignment</option><option value="50">50 - Interface</option><option value="60">60 - Checking</option><option value="70">70 - Data</option><option value="80">80 - Function</option><option value="90">90 - System</option><option value="100">100 - Environment</option></select></td><td><select name="inject[]"><option value="1">Planning</option><option value="2">Designing</option><option value="3">Coding</option><option value="4">Compiling</option><option value="5">Testing</option><option value="6">Postmortem</option></select></td><td><select name="remove[]"><option value="1">Planning</option><option value="2">Designing</option><option value="3">Coding</option><option value="4">Compiling</option><option value="5">Testing</option><option value="6">Postmortem</option></select></td><td><input type="number" name="fixtime[]" required></td><td><input type="number" name="fixdefect[]"></td></tr></table></r><b>Description:</b><br><textarea rows="10" cols="70" name="description[]"></textarea><br>');
		});
	});
</script>
<script>
function goBack() {
	window.history.back();
}
</script>
<title>Defect Recording Log</title>
</head>
<body>
<button onclick="goBack()">Go back</button>
<form action="defect_recording_logger.php?user_id=<?php echo $user_id?>&project_id=<?php echo $project_id?>" method="post">
<div align="center" id="inputRow">
<table>
<tr>
<th>Type</th>
<th>Inject</th>
<th>Remove</th>
<th>Fix Time</th>
<th>Fix Defect</th>
</tr>
<tr>
<td><select name="type[]">
<option value="10">10 - Documentation</option>
<option value="20">20 - Syntax</option>
<option value="30">30 - Build/Package</option>
<option value="40">40 - Assignment</option>
<option value="50">50 - Interface</option>
<option value="60">60 - Checking</option>
<option value="70">70 - Data</option>
<option value="80">80 - Function</option>
<option value="90">90 - System</option>
<option value="100">100 - Environment</option>
</select></td>
<td><select name="inject[]">
<option value="1">Planning</option>
<option value="2">Designing</option>
<option value="3">Coding</option>
<option value="4">Compiling</option>
<option value="5">Testing</option>
<option value="6">Postmortem</option>
</select></td>
<td><select name="remove[]">
<option value="1">Planning</option>
<option value="2">Designing</option>
<option value="3">Coding</option>
<option value="4">Compiling</option>
<option value="5">Testing</option>
<option value="6">Postmortem</option>
</select></td>
<td><input type="number" name="fixtime[]" required></td>
<td><input type="number" name="fixdefect[]"></td>
</tr>
</table>
<b>Description:</b><br>
<textarea rows="10" cols="70" name="description[]"></textarea><br>
</div><br>
<div align="right"><button id="addRow">Add new defects</button> <input type="submit" name="Submit"></div>
</form>
</body>
</html>