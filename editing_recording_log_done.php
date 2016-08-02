<?php
mysql_connect("localhost","root","1234") or die(mysql_error());
mysql_select_db("advanse_mc02") or die(mysql_error());
if ($_POST['inject'] <= $_POST['remove']) {
	$sql = "UPDATE defect_recording_log SET type = '" . $_POST['type'] . "',inject = '" . $_POST['inject'] . "',remove = '" . $_POST['remove'] . "',fix_time = '" . $_POST['fixtime'] . "',fix_defect = '" . $_POST['fixdefect'] . "',description = '" . $_POST['description'] . "' WHERE defect_id = '" . $_GET['id'] . "'";
	$result = mysql_query($sql) or die(mysql_error());
	echo "Defect log updated!<br><br>
	<a href=edit_recording_log.php?user_id=" . $_GET['user_id'] . "&project_id=" . $_GET['project_id'] . "><button>Go back to editing menu</button></a>";
} else {
	echo "<script>function goBack() {
	window.history.back();
	}</script>
	Error: Please ensure that the phase when the defect was removed is later than when it was first injected!<br><br>
	<button onclick=goBack()>Go back</button>";
}
mysql_close();
?>