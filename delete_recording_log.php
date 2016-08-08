<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
$sql = "SELECT * FROM defect_recording_log WHERE user_id = " . $_GET['user_id'] . " AND project_id = " . $_GET['project_id'];
$result = mysql_query($sql) or die(mysql_error());
$rows = mysql_num_rows($result);
$rs = mysql_fetch_array($result);
$int = $rs['defect_no'] + 1;
for ($i = $int ; $i <= $rows ; $i++) {
	$sql = "UPDATE defect_recording_log SET defect_no = " . ($i - 1) . " WHERE defect_no = " . $i . " AND user_id = ". $_GET['user_id'] . " AND project_id = ". $_GET['project_id'];
	$result = mysql_query($sql) or die(mysql_error());
}
$sql = "DELETE FROM defect_recording_log WHERE defect_id = '" . $_GET['id'] . "' AND user_id = ". $_GET['user_id'] . " AND project_id = ". $_GET['project_id'];
$result = mysql_query($sql) or die(mysql_error());
mysql_close();
?>
<!-- Next lines of code to be removed during integration -->
Defect log removed!<br><br>
<a href="edit_recording_log.php?user_id=<?php echo $_GET['user_id'] ?>&project_id=<?php echo $_GET['project_id'] ?>"><button>Go back to editing menu</button></a>