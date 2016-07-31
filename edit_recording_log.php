<html>
<head>
<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
?>
<title>Edit Recording Log</title>
</head>
<body>
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
		echo "<td><select disabled><option>10 - Documentation</option></select></td>";
	} else if ($row['type'] == 20) {
		echo "<td><select disabled><option>20 - Syntax</option></select></td>";
	} else if ($row['type'] == 30) {
		echo "<td><select disabled><option>30 - Build/Package</option></select></td>";
	} else if ($row['type'] == 40) {
		echo "<td><select disabled><option>40 - Assignment</option></select></td>";
	} else if ($row['type'] == 50) {
		echo "<td><select disabled><option>50 - Interface</option></select></td>";
	} else if ($row['type'] == 60) {
		echo "<td><select disabled><option>60 - Checking</option></select></td>";
	} else if ($row['type'] == 70) {
		echo "<td><select disabled><option>70 - Data</option></select></td>";
	} else if ($row['type'] == 80) {
		echo "<td><select disabled><option>80 - Function</option></select></td>";
	} else if ($row['type'] == 90) {
		echo "<td><select disabled><option>90 - System</option></select></td>";
	} else {
		echo "<td><select disabled><option>100 - Environment</option></select></td>";
	}
	if ($row['inject'] == "planning") {
		echo "<td><select disabled><option>Planning</option></select></td>";
	} else if ($row['inject'] == "designing") {
		echo "<td><select disabled><option>Designing</option></select></td>";
	} else if ($row['inject'] == "coding") {
		echo "<td><select disabled><option>Coding</option></select></td>";
	} else if ($row['inject'] == "compiling") {
		echo "<td><select disabled><option>Compiling</option></select></td>";
	} else if ($row['inject'] == "testing") {
		echo "<td><select disabled><option>Testing</option></select></td>";
	} else {
		echo "<td><select disabled><option>Postmortem</option></select></td>";
	}
	if ($row['remove'] == "planning") {
		echo "<td><select disabled><option>Planning</option></select></td>";
	} else if ($row['remove'] == "designing") {
		echo "<td><select disabled><option>Designing</option></select></td>";
	} else if ($row['remove'] == "coding") {
		echo "<td><select disabled><option>Coding</option></select></td>";
	} else if ($row['remove'] == "compiling") {
		echo "<td><select disabled><option>Compiling</option></select></td>";
	} else if ($row['remove'] == "testing") {
		echo "<td><select disabled><option>Testing</option></select></td>";
	} else {
		echo "<td><select disabled><option>Postmortem</option></select></td>";
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