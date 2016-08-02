<html>
<head>
<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
?>
<title>Edit Recording Log</title>
</head>
<body>
<a href="view_project.php?user_id=<?php echo $_GET['user_id']?>&project_id=<?php echo $_GET['project_id']?>"><button>Go back to main menu</button></a> <a href="defect_recording_log.php?user_id=<?php echo $_GET['user_id']?>&project_id=<?php echo $_GET['project_id']?>"><button>Add more defects</button></a><br><br>
<div align="center">
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
	<td><input type='date' value='" . $row['date'] . "' disabled></td>
	<td><input type='number' value='" . $row['defect_no'] . "' disabled></td>";
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
	echo "<td><input type='number' value='" . $row['fix_time'] . "' disabled></td>
	<td><input type='number' value='" . $row['fix_defect'] . "' disabled></td>
	<td><a href='editing_recording_log.php?user_id=" . $_GET['user_id'] . "&project_id=" . $_GET['user_id'] . "&id=" . $row['defect_id'] . "'><button>Edit</button></a></td>
	<td><a href='delete_recording_log.php?user_id=" . $_GET['user_id'] . "&project_id=" . $_GET['user_id'] . "&id=" . $row['defect_id'] . "'><button>Delete</button></a></td>
	</tr>
	</table>
	<b>Description:</b><br>
	<textarea rows='10' cols='70' disabled>" . $row['description'] . "</textarea><br><br>";
}
mysql_close();
?>
</div>
</body>
</html>