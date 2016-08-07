<html>
<head>
<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
$sql = "SELECT * FROM defect_recording_log WHERE defect_id = '" . $_GET['id'] . "'";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);
?>
<script>
function goBack() {
	window.history.back();
}
</script>
<title>Editing Defect Log</title>
</head>
<body>
<button onclick="goBack()">Go back</button>
<form action="editing_recording_log_done.php?user_id=<?php echo $_GET['user_id']?>&project_id=<?php echo $_GET['project_id']?>&id=<?php echo $_GET['id']?>" method="post" onsubmit="return confirm('Are you sure you want to edit the defect log?')">
<div align="center">
<?php
$sql = "SELECT * FROM defect_recording_log WHERE user_id = '" . $_GET['user_id'] . "' AND project_id = '" . $_GET['project_id'] . "'";
$result = mysql_query($sql) or die(mysql_error());
while ($rowbefore = mysql_fetch_array($result)) {
	if ($rowbefore['defect_no'] < $row['defect_no']) {
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
	<td><input type='date' value='" . $rowbefore['date'] . "' readonly></td>
	<td><input type='number' value='" . $rowbefore['defect_no'] . "' readonly></td>";
	if ($rowbefore['type'] == 10) {
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
	} else if ($rowbefore['type'] == 20) {
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
	} else if ($rowbefore['type'] == 30) {
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
	} else if ($rowbefore['type'] == 40) {
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
	} else if ($rowbefore['type'] == 50) {
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
	} else if ($rowbefore['type'] == 60) {
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
	} else if ($rowbefore['type'] == 70) {
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
	} else if ($rowbefore['type'] == 80) {
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
	} else if ($rowbefore['type'] == 90) {
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
	if ($rowbefore['inject'] == 1) {
		echo "<td><select disabled><option selected>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowbefore['inject'] == 2) {
		echo "<td><select disabled><option>Planning</option>
		<option selected>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowbefore['inject'] == 3) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option selected>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowbefore['inject'] == 4) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option selected>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowbefore['inject'] == 5) {
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
	if ($rowbefore['remove'] == 1) {
		echo "<td><select disabled><option selected>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option>select></td>";
	} else if ($rowbefore['remove'] == 2) {
		echo "<td><select disabled><option>Planning</option>
		<option selected>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowbefore['remove'] == 3) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option selected>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowbefore['remove'] == 4) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option selected>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option>select></td>";
	} else if ($rowbefore['remove'] == 5) {
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
	echo "<td><input type='number' value='" . $rowbefore['fix_time'] . "' readonly></td>
	<td><input type='number' value='" . $rowbefore['fix_defect'] . "' readonly></td>
	</tr>
	</table>
	<textarea rows='1' cols='150' readonly>" . $rowbefore['description'] . "</textarea><br><br>";
	}
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
<td><input type="date" name="date[]" value="<?php echo $row['date']?>" readonly></td>
<td><input type="number" name="defect_no[]" value="<?php echo $row['defect_no']?>" readonly></td>
<td><select name="type">
<option value="10" <?php if ($row['type'] == 10) {
	echo 'selected';
}?>>10 - Documentation</option>
<option value="20" <?php if ($row['type'] == 20) {
	echo 'selected';
}?>>20 - Syntax</option>
<option value="30" <?php if ($row['type'] == 30) {
	echo 'selected';
}?>>30 - Build/Package</option>
<option value="40" <?php if ($row['type'] == 40) {
	echo 'selected';
}?>>40 - Assignment</option>
<option value="50" <?php if ($row['type'] == 50) {
	echo 'selected';
}?>>50 - Interface</option>
<option value="60" <?php if ($row['type'] == 60) {
	echo 'selected';
}?>>60 - Checking</option>
<option value="70" <?php if ($row['type'] == 70) {
	echo 'selected';
}?>>70 - Data</option>
<option value="80" <?php if ($row['type'] == 80) {
	echo 'selected';
}?>>80 - Function</option>
<option value="90" <?php if ($row['type'] == 90) {
	echo 'selected';
}?>>90 - System</option>
<option value="100" <?php if ($row['type'] == 100) {
	echo 'selected';
}?>>100 - Environment</option>
</select></td>
<td><select name="inject">
<option value="1" <?php if ($row['inject'] == 1) {
	echo 'selected';
}?>>Planning</option>
<option value="2" <?php if ($row['inject'] == 2) {
	echo 'selected';
}?>>Designing</option>
<option value="3" <?php if ($row['inject'] == 3) {
	echo 'selected';
}?>>Coding</option>
<option value="4" <?php if ($row['inject'] == 4) {
	echo 'selected';
}?>>Compiling</option>
<option value="5" <?php if ($row['inject'] == 5) {
	echo 'selected';
}?>>Testing</option>
<option value="6" <?php if ($row['inject'] == 6) {
	echo 'selected';
}?>>Postmortem</option>
</select></td>
<td><select name="remove">
<option value="1" <?php if ($row['remove'] == 1) {
	echo 'selected';
}?>>Planning</option>
<option value="2" <?php if ($row['remove'] == 2) {
	echo 'selected';
}?>>Designing</option>
<option value="3" <?php if ($row['remove'] == 3) {
	echo 'selected';
}?>>Coding</option>
<option value="4" <?php if ($row['remove'] == 4) {
	echo 'selected';
}?>>Compiling</option>
<option value="5" <?php if ($row['remove'] == 5) {
	echo 'selected';
}?>>Testing</option>
<option value="6" <?php if ($row['remove'] == 6) {
	echo 'selected';
}?>>Postmortem</option>
</select></td>
<td><input type="number" name="fixtime" value="<?php echo $row['fix_time']?>" required></td>
<td><input type="number" name="fixdefect" value="<?php echo $row['fix_defect']?>"></td>
</tr>
</table>
<textarea rows='1' cols='150' placeholder="Description" name="description"></textarea><br>
<?php
$sql = "SELECT * FROM defect_recording_log WHERE user_id = '" . $_GET['user_id'] . "' AND project_id = '" . $_GET['project_id'] . "'";
$result = mysql_query($sql) or die(mysql_error());
while ($rowafter = mysql_fetch_array($result)) {
	if ($rowafter['defect_no'] > $row['defect_no']) {
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
	<td><input type='date' value='" . $rowafter['date'] . "' readonly></td>
	<td><input type='number' value='" . $rowafter['defect_no'] . "' readonly></td>";
	if ($rowafter['type'] == 10) {
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
	} else if ($rowafter['type'] == 20) {
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
	} else if ($rowafter['type'] == 30) {
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
	} else if ($rowafter['type'] == 40) {
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
	} else if ($rowafter['type'] == 50) {
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
	} else if ($rowafter['type'] == 60) {
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
	} else if ($rowafter['type'] == 70) {
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
	} else if ($rowafter['type'] == 80) {
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
	} else if ($rowafter['type'] == 90) {
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
	if ($rowafter['inject'] == 1) {
		echo "<td><select disabled><option selected>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowafter['inject'] == 2) {
		echo "<td><select disabled><option>Planning</option>
		<option selected>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowafter['inject'] == 3) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option selected>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowafter['inject'] == 4) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option selected>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowafter['inject'] == 5) {
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
	if ($rowafter['remove'] == 1) {
		echo "<td><select disabled><option selected>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option>select></td>";
	} else if ($rowafter['remove'] == 2) {
		echo "<td><select disabled><option>Planning</option>
		<option selected>Designing</option>
		<option>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowafter['remove'] == 3) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option selected>Coding</option>
		<option>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option></select></td>";
	} else if ($rowafter['remove'] == 4) {
		echo "<td><select disabled><option>Planning</option>
		<option>Designing</option>
		<option>Coding</option>
		<option selected>Compiling</option>
		<option>Testing</option>
		<option>Postmortem</option>select></td>";
	} else if ($rowafter['remove'] == 5) {
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
	echo "<td><input type='number' value='" . $rowafter['fix_time'] . "' readonly></td>
	<td><input type='number' value='" . $rowafter['fix_defect'] . "' readonly></td>
	</tr>
	</table>
	<textarea rows='1' cols='150' readonly>" . $rowafter['description'] . "</textarea><br><br>";
	}
}
?>
</div><br>
<div align="right"><input type="submit" name="Submit"></div>
</form>
</body>
</html>