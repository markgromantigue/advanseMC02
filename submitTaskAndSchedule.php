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
    
    foreach ($hours as $index => $value) {
        if (!empty($hours[$index])) {
            $query = mysql_query("INSERT INTO `task_planning`(`user_id`, `project_id`, `task_name`, `hours`, `planned_value`, `cumulative_hours`, `cumulative_pv`, `date_monday`, `total_hours`) VALUES('" . $userId . "','" . $projectId . "','" . $phase[$index] . "','" . $hours[$index] . "','" . $pv[$index] . "','" . $taskch[$index] . "','" . $taskcpv[$index] . "','" . $taskDateMonday[$index] . "','" . $totalHours[$index] . "')");
        }
    }
    
    foreach ($plandh as $index => $value) {
        if (!empty($plandh[$index])) {
            $query = mysql_query("INSERT INTO `schedule_planning`(`user_id`, `project_id`, `date_monday`, `direct_hours`, `cumulative_hours`, `cumulative_pv`) VALUES('" . $userId . "','" . $projectId . "','" . $schedDateMonday[$index] . "','" . $plandh[$index] . "','" . $schedch[$index] . "','" . $schedcpv[$index] . "')");
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