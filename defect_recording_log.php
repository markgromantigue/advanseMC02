<html>
<head>
<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
$user_id = $_GET['user_id'];
$project_id = $_GET['project_id'];
$curdate = time();
$sql = "SELECT * FROM defect_recording_log WHERE user_id = '" . $_GET['user_id'] . "' AND project_id = '" . $_GET['project_id'] . "'";
$result = mysql_query($sql) or die(mysql_error());
$rows = mysql_num_rows($result);
?>
<script src="js/jquery.js"></script>
<script>var x = <?php echo $rows + 1 ?></script>
<script>
	$(document).ready(function(){
		$("#addRow").on("click",function() {
			x++;
			$("#inputRow").append('<br><table><tr><th>Date</th><th>Number</th><th>Type</th><th>Inject</th><th>Remove</th><th>Fix Time</th><th>Fix Defect</th></tr><tr><td><input type="date" name="date[]" value="<?php echo date("Y-m-d",$curdate) ?>" readonly></td><td><input type="number" name="defect_no[]" id="no' + x + '"readonly></td><td><select name="type[]"><option value="10">10 - Documentation</option><option value="20">20 - Syntax</option><option value="30">30 - Build/Package</option><option value="40">40 - Assignment</option><option value="50">50 - Interface</option><option value="60">60 - Checking</option><option value="70">70 - Data</option><option value="80">80 - Function</option><option value="90">90 - System</option><option value="100">100 - Environment</option></select></td><td><select name="inject[]"><option value="1">Planning</option><option value="2">Designing</option><option value="3">Coding</option><option value="4">Compiling</option><option value="5">Testing</option><option value="6">Postmortem</option></select></td><td><select name="remove[]"><option value="1">Planning</option><option value="2">Designing</option><option value="3">Coding</option><option value="4">Compiling</option><option value="5">Testing</option><option value="6">Postmortem</option></select></td><td><input type="number" name="fixtime[]" required></td><td><input type="number" name="fixdefect[]"></td></tr></table><textarea rows=1 cols=150 placeholder="Description" name="description[]"></textarea><br>');
			document.getElementById("no" + x + "").value = x;
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
<form action="defect_recording_logger.php?user_id=<?php echo $user_id?>&project_id=<?php echo $project_id?>" method="post" onsubmit="return confirm('Are you sure you want to add these defect logs?')">
<div align="center" id="inputRow">
<?php
$sql = "SELECT * FROM defect_recording_log WHERE user_id = '" . $_GET['user_id'] . "' AND project_id = '" . $_GET['project_id'] . "'";
$result = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_array($result)) {
	echo "<table>
	<tr>
	<th>Date</th>
	<th>Number</th>
	<th>Type</th>
	<th>Inject</th>
	<th>Remove</th>
	<th>Fix Time</th>
	<th>Fix Defect</th>
	</tr>
	<tr>
	<td><input type='date' value='" . $row['date'] . "' readonly></td>
	<td><input type='number' value='" . $row['defect_no'] . "' readonly></td>";
	if ($row['type'] == 10) {
		echo "<td><select disabled><option selected>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option>50 - Interface</option>
		<option>60 - Checking</option>
		<option>70 - Data</option>
		<option>80 - Function</option>
		<option>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else if ($row['type'] == 20) {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option selected>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option>50 - Interface</option>
		<option>60 - Checking</option>
		<option>70 - Data</option>
		<option>80 - Function</option>
		<option>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else if ($row['type'] == 30) {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option selected>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option>50 - Interface</option>
		<option>60 - Checking</option>
		<option>70 - Data</option>
		<option>80 - Function</option>
		<option>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else if ($row['type'] == 40) {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option selected>40 - Assignment</option>
		<option>50 - Interface</option>
		<option>60 - Checking</option>
		<option>70 - Data</option>
		<option>80 - Function</option>
		<option>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else if ($row['type'] == 50) {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option selected>50 - Interface</option>
		<option>60 - Checking</option>
		<option>70 - Data</option>
		<option>80 - Function</option>
		<option>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else if ($row['type'] == 60) {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option>50 - Interface</option>
		<option selected>60 - Checking</option>
		<option>70 - Data</option>
		<option>80 - Function</option>
		<option>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else if ($row['type'] == 70) {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option>50 - Interface</option>
		<option>60 - Checking</option>
		<option selected>70 - Data</option>
		<option>80 - Function</option>
		<option>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else if ($row['type'] == 80) {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option>50 - Interface</option>
		<option>60 - Checking</option>
		<option>70 - Data</option>
		<option selected>80 - Function</option>
		<option>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else if ($row['type'] == 90) {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option>50 - Interface</option>
		<option>60 - Checking</option>
		<option>70 - Data</option>
		<option>80 - Function</option>
		<option selected>90 - System</option>
		<option>100 - Environment</option></select></td>";
	} else {
		echo "<td><select disabled><option>10 - Documentation</option>
		<option>20 - Syntax</option>
		<option>30 - Build/Package</option>
		<option>40 - Assignment</option>
		<option>50 - Interface</option>
		<option>60 - Checking</option>
		<option>70 - Data</option>
		<option>80 - Function</option>
		<option>90 - System</option>
		<option selected>100 - Environment</option></select></td>";
	}
	if ($row['inject'] == 1) {
		echo "<td><select disabled><option selected>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($row['inject'] == 2) {
		echo "<td><select disabled><option>Planning</option>
		<option selected>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($row['inject'] == 3) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option selected>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($row['inject'] == 4) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option selected>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($row['inject'] == 5) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option selected>Testing</option>
		<option>Postmortem</option></select></td>";
	} else {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option selected>Postmortem</option></select></td>";
	}
	if ($row['remove'] == 1) {
		echo "<td><select disabled><option selected>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option>select></td>";
	} else if ($row['remove'] == 2) {
		echo "<td><select disabled><option>Planning</option>
		<option selected>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($row['remove'] == 3) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option selected>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($row['remove'] == 4) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option selected>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option>select></td>";
	} else if ($row['remove'] == 5) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option selected>Testing</option>
		<option>Postmortem</option></select></td>";
	} else {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option selected>Postmortem</option></select></td>";
	}
	echo "<td><input type='number' value='" . $row['fix_time'] . "' readonly></td>
	<td><input type='number' value='" . $row['fix_defect'] . "' readonly></td>
	</tr>
	</table>
	<textarea rows='1' cols='150' readonly>" . $row['description'] . "</textarea><br><br>";
}
?>
<table>
<tr>
<th>Date</th>
<th>Number</th>
<th>Type</th>
<th>Inject</th>
<th>Remove</th>
<th>Fix Time</th>
<th>Fix Defect</th>
</tr>
<tr>
<td><input type="date" name="date[]" value="<?php echo date("Y-m-d",$curdate) ?>" readonly></td>
<td><input type="number" name="defect_no[]" value="<?php echo $rows + 1 ?>" id="no1" readonly></td>
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
<textarea rows='1' cols='150' placeholder="Description" name="description[]"></textarea><br>
</div><br>
<div align="right"><button id="addRow">Add new defects</button> <input type="submit" name="Submit"></div>
</form>
<?php mysql_close(); ?>
</body>
</html>