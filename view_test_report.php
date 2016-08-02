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
				'<br><div style="border: 1px solid black;" class="center"><table><tr><td>Test Name/Number:</td><td><textarea class="textarea" name ="name[]" rows="1" cols="60" required></textarea></td></tr><tr><td>Test Objective:</td><td><textarea class="textarea" name ="objective[]" rows="2" cols="60" required></textarea><br></td></tr><tr><td>Test Description:</td><td><textarea class="textarea" name ="description[]" rows="4" cols="60" required></textarea><br></td></tr><tr><td>Test Conditions:</td><td><textarea class="textarea" name ="conditions[]" rows="4" cols="60" required></textarea><br></td></tr><tr><td>Expected Results:</td><td><textarea class="textarea" name ="expected[]" rows="4" cols="60" required></textarea><br></td></tr></table></div>'
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
			?> <script> alert("Test case updated successfully!"); </script> <?php
		}
}

$con = mysqli_connect('localhost', 'root', '1234', 'advanse_mc02');

if (mysqli_connect_errno()) {
    echo "Failed" . mysqli_connect_error();
}
else
{
    if(isset($_GET['test_report_id'])){
		$test_report_id = $_GET['test_report_id'];
		$delete="DELETE FROM test_report WHERE test_report_id = '$test_report_id'";
		$res=mysqli_query($con, $delete);
	}

    $sql = "SELECT * FROM test_report WHERE `project_id` = $projectId AND `user_id` = $userId";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
		echo "<br><div style='border: 1px solid black;' class='center'><table><tr><td>Test Name/Number:</td><td><textarea class='textarea' name ='name[]' rows='1' cols='60' disabled>" .$row['test_name_num']. "</textarea></td></tr><tr><td>Test Objective:</td><td><textarea class='textarea' name ='objective[]' rows='2' cols='60' disabled>" .$row['test_objective']. "</textarea><br></td></tr><tr><td>Test Description:</td><td><textarea class='textarea' name ='description[]' rows='4' cols='60' disabled>" .$row['test_description']. "</textarea><br></td></tr><tr><td>Test Conditions:</td><td><textarea class='textarea' name ='conditions[]' rows='4' cols='60' disabled>" .$row['test_conditions']. "</textarea><br></td><td><a href='edit_test_report.php?test_report_id=".$row['test_report_id']."&user_id=".$userId."&project_id=".$projectId."'><button type='button'><strong><center>Edit Test Case</center></strong></button></a></td></tr><tr><td>Expected Results:</td><td><textarea class='textarea' name ='expected[]' rows='4' cols='60' disabled>" .$row['expected_results']. "</textarea><br></td><td><a href='view_test_report.php?test_report_id=".$row['test_report_id']."&user_id=".$userId."&project_id=".$projectId."'" ?> onclick="return confirm('Are you sure you want to delete this message?')";<?php echo "><button type='button'><strong><center>Delete Test Case</center></strong></button></a></td></tr><tr><td>Actual Results:</td><td><textarea class='textarea' name ='actual[]' rows='4' cols='60' disabled>" .$row['actual_results']. "</textarea><br></td></tr></table></div>";
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