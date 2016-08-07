<!--
@Author: John Zachary S. Raduban
email:zachraduban@gmail.com
version 1.0
-->
<?php
$con = mysqli_connect('localhost', 'root', '1234', 'advanse_mc02');
if (mysqli_connect_errno()) {
    echo "Failed" . mysqli_connect_error();
}
else
{
    if(isset($_GET['user_id'])){
		$userId = $_GET['user_id'];
        $projectId = $_GET['project_id'];
    }
    if(isset($_GET['test_report_id'])){
        $test_report_id = $_GET['test_report_id'];
        $sql = "SELECT test_report_id , test_name_num, test_objective, test_description, test_conditions, expected_results, actual_results FROM test_report WHERE test_report_id = '$test_report_id'";
        $result = mysqli_query($con, $sql);
    }
    while ($row = mysqli_fetch_array($result)) {
		$test_report_id = $row["test_report_id"];
        $test_name_num = $row["test_name_num"];
        $test_objective = $row["test_objective"];
        $test_description = $row["test_description"];
        $test_conditions = $row["test_conditions"];
        $expected_results = $row["expected_results"];
        $actual_results = $row["actual_results"];
	}
}
?>

<!DOCTYPE html>
<html>
<head>

<style type="text/css">
.center {
    margin: auto;
    width: 70%;
    padding: 10px;
}
h1 {
	text-align: center;
}
table {
	width: 100%;
}

</style>
</head>

<body>
<div class="center">
<form action="view_test_report.php?user_id=<?php echo $userId?>&project_id=<?php echo $projectId?>" method="POST">
<input type="submit" value="View Test Report"/>
</form>
<h1>Edit Test Case</h1>
<form action="save_test_report.php?user_id=<?php echo $userId?>&project_id=<?php echo $projectId?>" method="POST">

<div style="border: 1px solid black;" class="center">
<table>
<tbody id="inputRows">
    <tr><td>Test Name/Number:</td><td><textarea class="textarea" name ="name" rows="1" cols="60" required><?php echo $test_name_num; ?></textarea></td></tr>
    <tr><td>Test Objective:</td><td><textarea class="textarea" name ="objective" rows="2" cols="60" required><?php echo $test_objective; ?></textarea><br></td></tr>
    <tr><td>Test Description:</td><td><textarea class="textarea" name ="description" rows="4" cols="60" required><?php echo $test_description; ?></textarea><br></td></tr>
	<tr><td>Test Conditions:</td><td><textarea class="textarea" name ="conditions" rows="4" cols="60" required><?php echo $test_conditions; ?></textarea><br></td></tr>
	<tr><td>Expected Results:</td><td><textarea class="textarea" name ="expected" rows="4" cols="60" required><?php echo $expected_results; ?></textarea><br></td></tr>
	<tr><td>Actual Results:</td><td><textarea class="textarea" name ="actual" rows="4" cols="60"><?php echo $actual_results; ?></textarea><br></td></tr>
</tbody>
</table>
</div>

<input type="hidden" name="test_report_id" value="<?php echo $_GET['test_report_id']; ?>" />
<input type="submit" value="Save Changes" style="float: right; margin-right: 15px;">

</form>
</div>

</body>
</html>