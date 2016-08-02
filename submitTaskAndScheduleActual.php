<?php
    //@Author: Mark Genesis T. Romantigue
    //email:markg.romantigue@gmail.com
    //version 1.0
    
    include 'db.php';
    
    if(isset($_GET['user_id'])){
		$userId = $_GET['user_id'];
        $projectId = $_GET['project_id'];
    }

    //get inputs by post
    $phase =($_POST["phase"] );
    $hours =($_POST["hours"] );
    $pv =($_POST["pv"] );
    $taskch = ($_POST["taskch"] );
    $taskcpv = ($_POST["taskcpv"] );
    $taskDateMonday = ($_POST["taskDateMonday"] );
    $totalHours = ($_POST["totalHours"] );
    $schedDateMonday = ($_POST["schedDateMonday"] );
    $plandh = ($_POST["plandh"] );
    $schedch= ($_POST["schedch"] );
    $schedcpv = ($_POST["schedcpv"] );
    
    //actual task
    $taskDate = ($_POST["taskDate"] );
    $ev = ($_POST["ev"] );
    $taskcev = ($_POST["taskcev"] );
    $actualev = ($_POST["actualev"] );
    $caev = ($_POST["caev"] );
    $totalactualev = ($_POST["totalactualev"] );//total
    //actual sched
    $actualdh = ($_POST["actualdh"] );
    $actualschedch = ($_POST["actualschedch"] );
    $schedcev = ($_POST["schedcev"] );
    $adjustedev = ($_POST["adjustedev"] );
    
    $query = mysql_query("DELETE FROM `task_planning` WHERE `project_id` = '".$projectId."' AND `user_id` = '".$userId."'");
    $query = mysql_query("DELETE FROM `task_actual` WHERE `project_id` = '".$projectId."' AND `user_id` = '".$userId."'");
    $query = mysql_query("DELETE FROM `schedule_planning` WHERE `project_id` = '".$projectId."' AND `user_id` = '".$userId."'");
    $query = mysql_query("DELETE FROM `schedule_actual` WHERE `project_id` = '".$projectId."' AND `user_id` = '".$userId."'");
    
    //Task and schedule plan
    foreach ($hours as $index => $value) {
        if (!empty($hours[$index])) {
            $query = mysql_query("INSERT INTO `task_planning`(`user_id`, `project_id`, `task_name`, `hours`, `planned_value`, `cumulative_hours`, `cumulative_pv`, `date_monday`, `total_hours`) VALUES('" . $userId . "','" . $projectId . "','" . $phase[$index] . "','" . $hours[$index] . "','" . $pv[$index] . "','" . $taskch[$index] . "','" . $taskcpv[$index] . "','" . $taskDateMonday[$index] . "','" . $totalHours . "')");
        }
    }
    foreach ($plandh as $index => $value) {
        if (!empty($plandh[$index])) {
            $query = mysql_query("INSERT INTO `schedule_planning`(`user_id`, `project_id`, `date_monday`, `direct_hours`, `cumulative_hours`, `cumulative_pv`) VALUES('" . $userId . "','" . $projectId . "','" . $schedDateMonday[$index] . "','" . $plandh[$index] . "','" . $schedch[$index] . "','" . $schedcpv[$index] . "')");
        }
    }
    
    //task and schedule actual
    foreach ($ev as $index => $value) {
        if (!empty($ev[$index])) {
            $query = mysql_query("INSERT INTO `task_actual`(`user_id`, `project_id`, `date`, `earned_value`, `cumulative_ev`, `actual_ev`, `cumulative_actual_ev`, `total_actual_ev`) VALUES('" . $userId . "','" . $projectId . "','" . $taskDate[$index] . "','" . $ev[$index] . "','" . $taskcev[$index] . "','" . $actualev[$index] . "','" . $caev[$index] . "','" . $totalactualev . "')");
        }
    }
    foreach ($actualdh as $index => $value) {
        if (!empty($actualdh[$index])) {
            $query = mysql_query("INSERT INTO `schedule_actual`(`user_id`, `project_id`, `direct_hours`, `cumulative_hours`, `cumulative_ev`, `adjusted_ev`) VALUES('" . $userId . "','" . $projectId . "','" . $actualdh[$index] . "','" . $actualschedch[$index] . "','" . $schedcev[$index] . "','" . $adjustedev[$index] . "')");
        }
    }
    
    $query = mysql_query("UPDATE `project` SET `TPT`= 1 WHERE `project_id` = '".$projectId."' AND `user_id` = '".$userId."'");
    
    if ($query) {
    echo "success!";
  } else {
    echo "failed!";
  }

    mysql_close();
    header("Location: view_project.php?user_id=$userId&project_id=$projectId");

?>