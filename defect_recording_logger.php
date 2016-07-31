<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
$n = sizeof($_POST['date']);
for ($i = 0 ; $i < $n ; $i++) {
	$sql = "INSERT INTO defect_recording_log(user_id,project_id,date,defect_no,type,inject,remove,fix_time,fix_defect,description) VALUES ('" . $_GET['user_id'] . "','" . $_GET['project_id'] . "','" . $_POST['date'][$i] . "','" . $_POST['number'][$i] . "','" . $_POST['type'][$i] . "','" . $_POST['inject'][$i] . "','" . $_POST['remove'][$i] . "','" . $_POST['fixtime'][$i] . "','" . $_POST['fixdefect'][$i] . "','" . $_POST['description'][$i] . "')";
	$result = mysql_query($sql) or die(mysql_error());
}
mysql_close();
?>
<!-- Next lines of code to be removed during integration -->
Defects logged! Click <a href="defect_recording_log.php?user_id=<?php echo $_GET['user_id'] ?>&project_id=<?php echo $_GET['project_id'] ?>">here</a> to add more defects or <a href="edit_recording_log.php?user_id=<?php echo $_GET['user_id'] ?>&project_id=<?php echo $_GET['project_id'] ?>">here</a> to edit defects.