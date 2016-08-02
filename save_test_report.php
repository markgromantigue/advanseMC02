<!--
@Author: John Zachary S. Raduban
email:zachraduban@gmail.com
version 1.0
-->
<?php

if(isset($_GET['user_id'])){
		$userId = $_GET['user_id'];
        $projectId = $_GET['project_id'];
}

$con = mysqli_connect('localhost', 'root', '1234', 'advanse_mc02');

if (mysqli_connect_errno()) {
    echo "Failed" . mysqli_connect_error();
}
else
{
    if(isset($_POST['test_report_id'])){
        //echo $_POST['test_report_id'];
		$test_report_id = $_POST['test_report_id'];

        $update = "UPDATE test_report SET test_name_num = '".$_POST["name"]."', test_objective = '".$_POST["objective"]."', test_description = '".$_POST["description"]."', test_conditions = '".$_POST["conditions"]."', expected_results = '".$_POST["expected"]."', actual_results = '".$_POST["actual"]."' WHERE test_report_id = '".$test_report_id."'";
        mysqli_query($con, $update) or die (mysqli_error());

        header("Location: view_test_report.php?msg=edit&user_id=$userId&project_id=$projectId");
	}
}
?>