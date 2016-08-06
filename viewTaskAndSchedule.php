<!--
@Author: Mark Genesis T. Romantigue
email:markg.romantigue@gmail.com
version 1.0
-->
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
    $strSQL = "SELECT * FROM users as u, project as p WHERE u.user_id=p.user_id AND name = '" . $myusername . "'";
    $rs = mysql_query($strSQL);
    $row = mysql_fetch_array($rs);
    
    $strSQL2 = "SELECT * FROM `task_planning` WHERE `user_id` = '" . $userId . "' AND `project_id` = '" . $projectId . "'";
    $rs2 = mysql_query($strSQL2);
    //$row2 = mysql_fetch_array($rs2);
    $plocCount2 = mysql_num_rows($rs2);
    ?> <script> var x= <?php echo $plocCount2+1?></script> <?php
    
    $strSQL3 = "SELECT * FROM `schedule_planning` WHERE `user_id` = '" . $userId . "' AND `project_id` = '" . $projectId . "'";
    $rs3 = mysql_query($strSQL3);
    //$row3 = mysql_fetch_array($rs3);
    $plocCount = mysql_num_rows($rs3);
    ?> <script> var y= <?php echo $plocCount+1?></script> <?php
    
    $strSQL4 = "SELECT * FROM `task_actual` WHERE `user_id` = '" . $userId . "' AND `project_id` = '" . $projectId . "'";
    $rs4 = mysql_query($strSQL4);
    $taskActualCount = mysql_num_rows($rs4);
    
    $strSQL5 = "SELECT * FROM `schedule_actual` WHERE `user_id` = '" . $userId . "' AND `project_id` = '" . $projectId . "'";
    $rs5 = mysql_query($strSQL5);
    $scheduleActualCount = mysql_num_rows($rs5);

    if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		if ($msg ==  "success"){
			?> <script> alert("Time log added successfully!"); </script> <?php
		}
		else if ($msg ==  "edit"){
			?> <script> alert("Time log updated successfully!"); </script> <?php
		}
    }
    
?>
<html>
    <head>
        <title>Task and Schedule Planning Template</title>
        <script src="js/jquery.js"></script>
        <script src="js/sizeEstimatingTemplate.js"></script>
        <link rel="stylesheet" href="css/task.css">
    </head>
    <body>
        <h2 style="text-align: center;"><strong>Task and Schedule Planning Template</strong></h2>
        <h2><strong>&nbsp;</strong></h2>
        <center>
        <table width="1046">
            <tbody>
                <tr>
                    <td style="width: 9%;">
                        <p>Student</p>
                    </td>
                    <td style="width: 71.9665%;">
                        <p><u><?php echo $row['name'];?></u></p>
                    </td>
                    <td style="width: 10%;">
                        <p>Date</p>
                    </td>
                    <td style="width: 10%;">
                        <p><u><?php echo $row['date'];?></u></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 9%;">
                        <p>Professor</p>
                    </td>
                    <td style="width: 71.9665%;">
                        <p><u><?php echo $row['professor'];?></u></p>
                    </td>
                    <td style="width: 10%;">
                        <p>Program #</p>
                    </td>
                    <td style="width: 10%;">
                        <p><u><?php echo $row['program_no'];?></u></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p><strong>&nbsp;</strong></p>
        <p>&nbsp;</p>
        <p style="text-align: center;"><strong>TASK PLANNING TEMPLATE&nbsp;</strong></p>
        <form name="myform" id="myform" role="form" action="submitTaskAndScheduleActual.php?user_id=<?php echo $userId?>&project_id=<?php echo $projectId?>" method="POST">
            <table border="1" width="1046" id="myTable">
                <tbody>
                    <tr>
                        <td colspan="2" width="174">
                            <p style="text-align: center;"><strong>Task</strong></p>
                        </td>
                        <td colspan="5" width="87">
                            <p style="text-align: center;"><strong>Plan</strong></p>
                        </td>
                        <td colspan="3" width="87">
                            <p style="text-align: center;"><strong>Actual</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="87">
                            <p style="text-align: center;"><em>Number</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Name</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Hours</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Planned</em></p>
                            <p style="text-align: center;"><em>Value</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Cumulative</em></p>
                            <p style="text-align: center;"><em>Hours</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Cumulative</em></p>
                            <p style="text-align: center;"><em>Planned&nbsp;Value</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Date</em></p>
                            <p style="text-align: center;"><em>(Monday)</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Date</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Earned</em></p>
                            <p style="text-align: center;"><em>Value</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Cumulative</em></p>
                            <p style="text-align: center;"><em>Earned&nbsp;Value</em></p>
                        </td>
                    </tr>
                    <?php
                        $i = 1;
                        if($taskActualCount > 0){
                            while (($row2 = mysql_fetch_array($rs2))) {
                                $row4 = mysql_fetch_array($rs4);
                                echo "<tr>                         <td width='87'>                             <p style='text-align: center;'>" . $i . "</p>                         </td>                         <td width='87'>                             <select name='phase[]' readonly>                                 <option value='" . $row2['task_name'] . "' selected>" . $row2['task_name'] . "</option>                                 <option value='Planning' disabled>Planning</option>                                 <option value='Design' disabled>Design</option>                                 <option value='Code' disabled>Code</option>                                 <option value='Compile' disabled>Compile</option>                                 <option value='Test' disabled>Test</option>                                 <option value='Postmortem' disabled>Postmortem</option>                             </select>                         </td>                         <td width='87'>                             <input type='text' size='8' value='" . $row2['hours'] . "' name='hours[]' id='hours" . $i . "' class='toAdd' readonly>                         </td>                         <td width='87'>                             <input type='text' size='8' value='" . $row2['planned_value'] . "' name='pv[]' id='pv" . $i . "' readonly>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskch[]' value='" . $row2['cumulative_hours'] . "' id='taskch" . $i . "' readonly>                         </td>                         <td width='87'>                             <input type='text' size='9' name='taskcpv[]' id='taskcpv" . $i . "' value='" . $row2['cumulative_pv'] . "' readonly>                         </td>                         <td width='87'>                             <input type='date' step=7 min=20" . $i . "4-09-08 name='taskDateMonday[]' value='" . $row2['date_monday'] . "' id='taskDateMonday" . $i . "' readonly>                         </td>                         <td width='87'>                             <input type='date' name='taskDate[]' value='" . $row4['date'] . "' id='taskDate" . $i . "' data-validation='required'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='ev[]' value='" . $row4['earned_value'] . "' id='ev" . $i . "' data-validation='number' data-validation-allowing='float'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskcev[]' value='" . $row4['cumulative_ev'] . "' id='taskcev" . $i . "' data-validation='number' data-validation-allowing='float'>                         </td>                          </tr>";
                                $i++;
                            }
                        }else{
                            while ($row2 = mysql_fetch_array($rs2)) {
                                echo "<tr>                         <td width='87'>                             <p style='text-align: center;'>" . $i . "</p>                         </td>                         <td width='87'>                             <select name='phase[]' readonly>                                 <option value='" . $row2['task_name'] . "' selected>" . $row2['task_name'] . "</option>                                 <option value='Planning' disabled>Planning</option>                                 <option value='Design' disabled>Design</option>                                 <option value='Code' disabled>Code</option>                                 <option value='Compile' disabled>Compile</option>                                 <option value='Test' disabled>Test</option>                                 <option value='Postmortem' disabled>Postmortem</option>                             </select>                         </td>                         <td width='87'>                             <input type='text' size='8' value='" . $row2['hours'] . "' name='hours[]' id='hours" . $i . "' class='toAdd' readonly>                         </td>                         <td width='87'>                             <input type='text' size='8' value='" . $row2['planned_value'] . "' name='pv[]' id='pv" . $i . "' readonly>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskch[]' value='" . $row2['cumulative_hours'] . "' id='taskch" . $i . "' readonly>                         </td>                         <td width='87'>                             <input type='text' size='9' name='taskcpv[]' id='taskcpv" . $i . "' value='" . $row2['cumulative_pv'] . "' readonly>                         </td>                         <td width='87'>                             <input type='date' step=7 min=20" . $i . "4-09-08 name='taskDateMonday[]' value='" . $row2['date_monday'] . "' id='taskDateMonday" . $i . "' readonly>                         </td>                         <td width='87'>                             <input type='date' name='taskDate[]' id='taskDate" . $i . "' data-validation='required'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='ev[]' id='ev" . $i . "' data-validation='number' data-validation-allowing='float'>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskcev[]' id='taskcev" . $i . "' data-validation='number' data-validation-allowing='float'>                         </td>                                      </tr>";
                                $i++;
                            }
                        }
                        ?>
                    <tr class="addMore">
                        <td width="87">
                            <p>&nbsp;</p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;">TOTAL</p>
                        </td>
                        <?php
                        $strSQL2 = "SELECT * FROM `task_planning` WHERE `user_id` = '" . $userId . "' AND `project_id` = '" . $projectId . "'";
                        $rs2 = mysql_query($strSQL2);
                        $row2 = mysql_fetch_array($rs2);
                        ?>
                        <td width="87">
                            <input type="text" size="8" name="totalHours" id="totalBA" value="<?php echo $row2['total_hours']; ?>" readonly>
                        </td>
                        <td width="87">
                            <p style="text-align: center;">1.0</p>
                        </td>
                        <td colspan="6" width="87">
                            <p style="text-align: center;">&nbsp;&nbsp;</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="button" value="Add more tasks" onClick="addRow2()" border=0       style='cursor:pointer;background-color: white;
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: underline;
            display: inline-block;
            font-size: 14px;'>
            <p><br /><br /></p>
            <p style="text-align: center;"><strong>SCHEDULE PLANNING TEMPLATE</strong></p>
            <table style="width: 1044px;" border="1" id="myTable2">
                <tbody>
                    <tr>
                        <td style="width: 109px;">
                            <p style="text-align: center;"><em>Week/Day</em></p>
                            <p style="text-align: center;"><em>Number</em></p>
                        </td>
                        <td style="width: 109px;">
                            <p style="text-align: center;"><em>Date</em></p>
                            <p style="text-align: center;"><em>(Monday)</em></p>
                        </td>
                        <td style="width: 110px;">
                            <p style="text-align: center;"><em>Direct Hours</em></p>
                        </td>
                        <td style="width: 110px;">
                            <p style="text-align: center;"><em>Cumulative</em></p>
                            <p style="text-align: center;"><em>Hours</em></p>
                        </td>
                        <td style="width: 110px;">
                            <p style="text-align: center;"><em>Cumulative</em></p>
                            <p style="text-align: center;"><em>Planned&nbsp;Value</em></p>
                        </td>
                        <td style="width: 110px;">
                            <p style="text-align: center;"><em>Direct Hours</em></p>
                        </td>
                        <td style="width: 110px;">
                            <p style="text-align: center;"><em>Cumulative</em></p>
                            <p style="text-align: center;"><em>Hours</em></p>
                        </td>
                        <td style="width: 110px;">
                            <p style="text-align: center;"><em>Cumulative</em></p>
                            <p style="text-align: center;"><em>Earned&nbsp;Value</em></p>
                        </td>
                    </tr>
                    
                    <?php
                        $j = 1;
                        if($scheduleActualCount > 0){
                            while (($row3 = mysql_fetch_array($rs3))) {
                                $row5 = mysql_fetch_array($rs5);
                                echo "<tr>                         <td style='width: 109px;'>                             <p style='text-align: center;'>" . $j . "</p>                         </td>                         <td style='width: 109px;'>                             <input type='date' step=7 min=2014-09-08 name='schedDateMonday[]' id='schedDateMonday" . $j . "' value='" . $row3['date_monday'] . "' readonly>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='plandh[]' id='plandh" . $j . "' value='" . $row3['direct_hours'] . "' readonly>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='schedch[]' id='schedch" . $j . "' value='" . $row3['cumulative_hours'] . "' readonly>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='schedcpv[]' id='schedcpv" . $j . "' value='" . $row3['cumulative_pv'] . "' readonly>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='actualdh[]' value='" . $row5['direct_hours'] . "' id='actualdh" . $j . "' data-validation='number' data-validation-allowing='float'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='actualschedch[]' value='" . $row5['cumulative_hours'] . "' id='actualschedch" . $j . "' data-validation='number' data-validation-allowing='float'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='schedcev[]' value='" . $row5['cumulative_ev'] . "' id='schedcev" . $j . "' data-validation='number' data-validation-allowing='float'>                         </td>                        </tr>";
                                $j++;
                            }
                        }else{
                            while ($row3 = mysql_fetch_array($rs3)) {
                                echo "<tr>                         <td style='width: 109px;'>                             <p style='text-align: center;'>" . $j . "</p>                         </td>                         <td style='width: 109px;'>                             <input type='date' step=7 min=2014-09-08 name='schedDateMonday[]' id='schedDateMonday" . $j . "' value='" . $row3['date_monday'] . "' readonly>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='plandh[]' id='plandh" . $j . "' value='" . $row3['direct_hours'] . "' readonly>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='schedch[]' id='schedch" . $j . "' value='" . $row3['cumulative_hours'] . "' readonly>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='schedcpv[]' id='schedcpv" . $j . "' value='" . $row3['cumulative_pv'] . "' readonly>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='actualdh[]' id='actualdh" . $j . "' data-validation='number' data-validation-allowing='float'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='actualschedch[]' id='actualschedch" . $j . "' data-validation='number' data-validation-allowing='float'>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='13' name='schedcev[]' id='schedcev" . $j . "' data-validation='number' data-validation-allowing='float'>                         </td>                               </tr>";
                                $j++;
                            }
                        }
                    ?>
                    <tr class="addMoreObjectRow"></tr>
                </tbody>
            </table>
            <input type="button" value="Add more week/day" onClick="addObjectRow2()" border=0       style='cursor:pointer;background-color: white;
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: underline;
            display: inline-block;
            font-size: 14px;'>
            <br><br>
        <input type="submit" value="Submit" />
        </form>
        </center>
        <p><strong>&nbsp;</strong></p>
        <p><strong><br /> </strong></p>
        <p>&nbsp;</p>
        <script src="js/jquery.form-validator.js"></script>
        <script>
        $.validate({
          modules : 'logic',
          onError: function() {
            alert('Failed to save to database! Please check your inputs!');
            return false;
          },
          onSuccess: function() {
            alert('Data successfully saved!');
            return true;
          }
        });
        </script>
    </body>
</html>