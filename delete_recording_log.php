<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
$sql = "DELETE FROM defect_recording_log WHERE defect_id = '" . $_GET['id'] . "'";
$result = mysql_query($sql) or die(mysql_error());
mysql_close();
?>
<!-- Next lines of code to be removed during integration -->
Defect log removed! Click <a href="edit_recording_log.php?user_id=<?php echo $_GET['user_id'] ?>&project_id=<?php echo $_GET['project_id'] ?>">here</a> to go back.