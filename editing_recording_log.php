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
<form action="editing_recording_log_done.php?user_id=<?php echo $_GET['user_id']?>&project_id=<?php echo $_GET['project_id']?>&id=<?php echo $_GET['id']?>" method="post">
<div align="center">
<table>
<tr>
<th>Type</th>
<th>Inject</th>
<th>Remove</th>
<th>Fix Time</th>
<th>Fix Defect</th>
</tr>
<tr>
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
<b>Description:</b><br>
<textarea rows="10" cols="70" name="description"><?php echo $row['description']?></textarea><br>
</div><br>
<div align="right"><input type="submit" name="Submit"></div>
</form>
</body>
</html>