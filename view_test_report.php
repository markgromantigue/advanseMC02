<!--
@Author: John Zachary S. Raduban
email:zachraduban@gmail.com
version 1.0
-->
<!DOCTYPE html>
<?php
if(isset($_GET['user_id'])){
		$userId = $_GET['user_id'];
        $projectId = $_GET['project_id'];
}
?>
<html>
<head>
<script src="js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$("#addRow").on("click", function(){
			$("#test").append(
				'<br><div style="border: 1px solid black;" class="center"><table><tr><td>Test Name/Number:</td><td><textarea class="textarea" name ="name[]" rows="1" cols="60"></textarea></td></tr><tr><td>Test Objective:</td><td><textarea class="textarea" name ="objective[]" rows="2" cols="60"></textarea><br></td></tr><tr><td>Test Description:</td><td><textarea class="textarea" name ="description[]" rows="4" cols="60"></textarea><br></td></tr><tr><td>Test Conditions:</td><td><textarea class="textarea" name ="conditions[]" rows="4" cols="60"></textarea><br></td></tr><tr><td>Expected Results:</td><td><textarea class="textarea" name ="expected[]" rows="4" cols="60"></textarea><br></td></tr></table></div>'
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
</style>
</head>
<body>
<form action="add_test_report.php?user_id=<?php echo $userId?>&project_id=<?php echo $projectId?>" method="POST">
<a href="view_project.php?user_id=<?php echo $userId?>&project_id=<?php echo $projectId?>">Go Back</a>
<div class="center">
<center><h1>Test Report</h1></center>
</div>


<?php

if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		if ($msg == "edit"){
			?> <script> alert("Time log updated successfully!"); </script> <?php
		}
        else if($msg == "fail"){
            ?> <script> alert("Update failed! Delta time is negative."); </script> <?php
        }
        else if($msg == "inc"){
            ?> <script> alert("Some row/s not added successfully. Delta time is negative."); </script> <?php
        }
}

$con = mysqli_connect('localhost', 'root', '1234', 'advanse_mc02');

if (mysqli_connect_errno()) {
    echo "Failed" . mysqli_connect_error();
}
else
{
    if(isset($_GET['time_log_id'])){
		$time_log_id = $_GET['time_log_id'];
		$delete="DELETE FROM time_recording_log WHERE time_log_id = '$time_log_id'";
		$res=mysqli_query($con, $delete);
	}

    $sql = "SELECT * FROM test_report WHERE `project_id` = $projectId AND `user_id` = $userId";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
		echo '<br><div style="border: 1px solid black;" class="center"><table><tr><td>Test Name/Number:</td><td><textarea class="textarea" name ="name[]" rows="1" cols="60" disabled>'; echo $row['test_name_num'].'</textarea></td></tr><tr><td>Test Objective:</td><td><textarea class="textarea" name ="objective[]" rows="2" cols="60" disabled>'; echo $row['test_objective'].'</textarea><br></td></tr><tr><td>Test Description:</td><td><textarea class="textarea" name ="description[]" rows="4" cols="60" disabled>'; echo $row['test_description'].'</textarea><br></td></tr><tr><td>Test Conditions:</td><td><textarea class="textarea" name ="conditions[]" rows="4" cols="60" disabled>'; echo $row['test_conditions'].'</textarea><br></td></tr><tr><td>Expected Results:</td><td><textarea class="textarea" name ="expected[]" rows="4" cols="60" disabled>'; echo $row['expected_results'].'</textarea><br></td></tr><tr><td>Actual Results:</td><td><textarea class="textarea" name ="actual[]" rows="4" cols="60" disabled>'; echo $row['actual_results'].'</textarea><br></td></tr></table></div>';
	}

    ?>

    <div id="test">
    </div>
    
    <?php
    echo "</table>";
}//end of else

?>
    <br>
	<button type="button" id="addRow" style="float: right; margin-right: 188px;">Add Test Case</button>
    <br><br>
    <input type="submit" value="Submit" style="float: right; margin-right: 188px;">
    </form>
    </div>
 </body>
</html>