<?php
$x = 1;
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
$error = false;
$n = sizeof($_POST['type']);
for ($i = 0 ; $i < $n ; $i++) {
	if ($_POST['inject'][$i] > $_POST['remove'][$i]) {
		$error = true;
	}
}
if (!$error) {
	for ($i = 0 ; $i < $n ; $i++) {
		do {
			$sql = "SELECT * FROM defect_recording_log WHERE user_id = " . $_GET['user_id'] . " AND project_id = " . $_GET['project_id'] . " AND defect_no = " . $x;
			$result = mysql_query($sql) or die(mysql_error());
			$rows = mysql_num_rows($result);
			if ($rows > 0) {
				$x++;
			}
		} while ($rows > 0);
		$curdate = time();
		$sql = "INSERT INTO defect_recording_log(user_id,project_id,date,defect_no,type,inject,remove,fix_time,fix_defect,description) VALUES ('" . $_GET['user_id'] . "','" . $_GET['project_id'] . "','" . date("Y-m-d",$curdate) . "','" . $x . "','" . $_POST['type'][$i] . "','" . $_POST['inject'][$i] . "','" . $_POST['remove'][$i] . "','" . $_POST['fixtime'][$i] . "','" . $_POST['fixdefect'][$i] . "','" . $_POST['description'][$i] . "')";
		$result = mysql_query($sql) or die(mysql_error());
	}
	echo "Defects logged!<br><br>
	<a href=edit_recording_log.php?user_id=" . $_GET['user_id'] . "&project_id=" . $_GET['project_id'] . "><button>Go back to editing menu</button></a>";
	$sql = "UPDATE project SET DRL = 1 WHERE project_id = " . $_GET['project_id'];
	mysql_query($sql) or die(mysql_error());
} else {
	echo "<script>function goBack() {
	window.history.back();
	}</script>
	Error: Please ensure that all phases where defects are removed are later than when they were first injected!<br><br>
	<button onclick=goBack()>Go back</button>";
}
mysql_close();
?>