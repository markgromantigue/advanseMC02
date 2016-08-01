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
    $nRows = sizeof($_POST["name"]);

    for($i = 0; $i < $nRows; $i++) {
            mysqli_query($con, "INSERT test_report (user_id, project_id, test_name_num, test_objective, test_description, test_conditions, expected_results) values ('".$userId."', '".$projectId."','".$_POST["name"][$i]."', '".$_POST["objective"][$i]."', '".$_POST["description"][$i]."', '".$_POST["conditions"][$i]."', '".$_POST["expected"][$i]."')") or die (mysqli_error());
            mysqli_query($con, "UPDATE `project` SET `TRT`= 1 WHERE `project_id` = '".$projectId."' AND `user_id` = '".$userId."'") or die (mysqli_error());
    }
    
    header("Location: view_project.php?msg=done&user_id=$userId&project_id=$projectId");
}
?>