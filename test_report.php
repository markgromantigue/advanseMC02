<!--
@Author: John Zachary S. Raduban
email:zachraduban@gmail.com
version 1.0
-->
<!DOCTYPE html>
<?php
    error_reporting(0);
	session_start();
	if(!isset($_SESSION['myusername'])){ //if login in session is not set
        header("Location:index.php");
	}
	
	include_once 'db.php';
	
	if(isset($_GET['user_id'])){
		$userId = $_GET['user_id'];
        $projectId = $_GET['project_id'];
	}
    
    $myusername = $_SESSION['myusername'];
    $strSQL = "SELECT * FROM users WHERE name = '" . $myusername . "'";
    $rs = mysql_query($strSQL);
    $row = mysql_fetch_array($rs);

    if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		if ($msg ==  "success"){
			?> <script> alert("Time log added successfully!"); </script> <?php
		}
		else if ($msg ==  "edit"){
			?> <script> alert("Time log updated successfully!"); </script> <?php
		}
    }
    
    $query="SELECT * from users c, project o WHERE c.user_id = o. user_id AND o. user_id = $userId AND o. project_id = $projectId";
    $result=mysql_query($query);
    $row2 = mysql_fetch_array($result);
    if($row2['TRT'] == 1){
        header("Location:view_test_report.php?user_id=$userId&project_id=$projectId");
    }
?>
<html>
<head>

<script src="js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$("#addRow").on("click", function(){
			$("#test").append(
				'<br><div style="border: 1px solid black;" class="center"><table id="inputRows"><tr><td>Test Name/Number:</td><td><textarea class="textarea" name ="name[]" rows="1" cols="60"></textarea></td></tr><tr><td>Test Objective:</td><td><textarea class="textarea" name ="objective[]" rows="2" cols="60"></textarea><br></td></tr><tr><td>Test Description:</td><td><textarea class="textarea" name ="description[]" rows="4" cols="60"></textarea><br></td></tr><tr><td>Test Conditions:</td><td><textarea class="textarea" name ="conditions[]" rows="4" cols="60"></textarea><br></td></tr><tr><td>Expected Results:</td><td><textarea class="textarea" name ="expected[]" rows="4" cols="60"></textarea><br></td></tr></table></div>'
				);
		});
	});
</script>

<style type="text/css">
.center {
    margin: auto;
    width: 70%;
    padding: 10px;
}

.textarea {
    resize: vertical;
}

h1 {
	text-align: center;
}

table {
	width: 100%;
}
#inputRows textarea {
    width: 100% !important;
}

</style>
</head>

<body>
<div class="center">
<h1>Add Test Cases</h1>
<form action="add_test_report.php?user_id=<?php echo $userId?>&project_id=<?php echo $projectId?>" method="POST">
<div id="test">
<div style="border: 1px solid black;" class="center">
<table>
<tbody id="inputRows">
    <tr><td>Test Name/Number:</td><td><textarea class="textarea" name ="name[]" rows="1" cols="60" required></textarea></td></tr>
    <tr><td>Test Objective:</td><td><textarea class="textarea" name ="objective[]" rows="2" cols="60" required></textarea><br></td></tr>
    <tr><td>Test Description:</td><td><textarea class="textarea" name ="description[]" rows="4" cols="60" required></textarea><br></td></tr>
	<tr><td>Test Conditions:</td><td><textarea class="textarea" name ="conditions[]" rows="4" cols="60" required></textarea><br></td></tr>
	<tr><td>Expected Results:</td><td><textarea class="textarea" name ="expected[]" rows="4" cols="60" required></textarea><br></td></tr>
</tbody>
</table>
</div>
</div>

<br>
<button type="button" id="addRow" style="float: right; margin-right: 15px;">Add Test Case</button>
<br><br>
<input type="submit" value="Submit" style="float: right; margin-right: 15px;">
</form>
</div>

</body>
</html>