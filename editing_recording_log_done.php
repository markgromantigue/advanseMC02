<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
$sql = "UPDATE defect_recording_log SET date = '" . $_POST['date'] . "',defect_no = '" . $_POST['number'] . "',type = '" . $_POST['type'] . "',inject = '" . $_POST['inject'] . "',remove = '" . $_POST['remove'] . "',fix_time = '" . $_POST['fixtime'] . "',fix_defect = '" . $_POST['fixdefect'] . "',description = '" . $_POST['description'] . "' WHERE defect_id = '" . $_GET['id'] . "'";
$result = mysql_query($sql) or die(mysql_error());
mysql_close();
?>
<!-- Next lines of code to be removed during integration -->
Defect log updated! Click <a href="edit_recording_log.php?user_id=<?php echo $_GET['user_id'] ?>&project_id=<?php echo $_GET['project_id'] ?>">here</a> to go back.