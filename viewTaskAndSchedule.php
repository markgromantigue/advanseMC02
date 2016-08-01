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
    
    $strSQL3 = "SELECT * FROM `schedule_planning` WHERE `user_id` = '" . $userId . "' AND `project_id` = '" . $projectId . "'";
    $rs3 = mysql_query($strSQL3);
    //$row3 = mysql_fetch_array($rs3);
    $plocCount = mysql_num_rows($rs3);
    

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
        <form name="myform" id="myform" role="form" action="submitTaskAndSchedule.php?user_id=<?php echo $userId?>&project_id=<?php echo $projectId?>" method="POST">
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
                        <td colspan="2" width="87">
                            <p style="text-align: center;"><strong>Real Actual</strong></p>
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
                        <td width="87">
                            <p style="text-align: center;"><em>Actual</em></p>
                            <p style="text-align: center;"><em>Earned&nbsp;Value</em></p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;"><em>Cumulative</em></p>
                            <p style="text-align: center;"><em>Actual&nbsp;E.V.</em></p>
                        </td>
                    </tr>
                    <?php
                        while ($row2 = mysql_fetch_array($rs2)) {
                            echo "<tr>                         <td width='87'>                             <p style='text-align: center;'>1</p>                         </td>                         <td width='87'>                             <select name='phase[]' disabled>                                 <option value='' disabled selected>" . $row2['task_name'] . "</option>                                 <option value='Planning'>Planning</option>                                 <option value='Design'>Design</option>                                 <option value='Code'>Code</option>                                 <option value='Compile'>Compile</option>                                 <option value='Test'>Test</option>                                 <option value='Postmortem'>Postmortem</option>                             </select>                         </td>                         <td width='87'>                             <input type='text' size='8' value='" . $row2['hours'] . "' name='hours[]' id='hours1' class='toAdd' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' value='" . $row2['planned_value'] . "' name='pv[]' id='pv1' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskch[]' value='" . $row2['cumulative_hours'] . "' id='taskch1' disabled>                         </td>                         <td width='87'>                             <input type='text' size='9' name='taskcpv[]' id='taskcpv1' value='" . $row2['cumulative_pv'] . "' disabled>                         </td>                         <td width='87'>                             <input type='date' step=7 min=2014-09-08 name='taskDateMonday[]' value='" . $row2['date_monday'] . "' id='taskDateMonday1' disabled>                         </td>                         <td width='87'>                             <input type='date' name='taskDate[]' id='taskDate1' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='ev[]' id='ev1' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='taskcev[]' id='taskcev1' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='actualev[]' id='actualev1' disabled>                         </td>                         <td width='87'>                             <input type='text' size='8' name='caev[]' id='caev1' disabled>                         </td>                     </tr>";
                        }
                        ?>
                    <tr class="addMore">
                        <td width="87">
                            <p>&nbsp;</p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;">TOTAL</p>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="totalHours" id="totalBA" value="<?php echo $row2['total_hours']; ?>" disabled>
                        </td>
                        <td width="87">
                            <p style="text-align: center;">1.0</p>
                        </td>
                        <td colspan="6" width="87">
                            <p style="text-align: center;">&nbsp;&nbsp;</p>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="totalactualev" id="totalactualev" disabled>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="totalcaev" id="totalcaev" disabled>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="button" value="Add more tasks" onClick="addRow()" border=0       style='cursor:pointer;background-color: white;
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
                        <td style="width: 110px;">
                            <p style="text-align: center;"><em>Adjusted</em></p>
                            <p style="text-align: center;"><em>Earned&nbsp;Value</em></p>
                        </td>
                    </tr>
                    
                    <?php
                        while ($row3 = mysql_fetch_array($rs3)) {
                            echo "<tr>                         <td style='width: 109px;'>                             <p style='text-align: center;'>1</p>                         </td>                         <td style='width: 109px;'>                             <input type='date' step=7 min=2014-09-08 name='schedDateMonday[]' id='schedDateMonday1' value='" . $row3['date_monday'] . "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='plandh[]' id='plandh1' value='" . $row3['direct_hours'] . "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedch[]' id='schedch1' value='" . $row3['cumulative_hours'] . "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedcpv[]' id='schedcpv1' value='" . $row3['cumulative_pv'] . "' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='actualdh[]' id='actualdh1' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='actualschedch[]' id='actualschedch1' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='schedcev[]' id='schedcev1' disabled>                         </td>                         <td style='width: 110px;'>                             <input type='text' size='11' name='adjustedev[]' id='adjustedev1' disabled>                         </td>                     </tr>";
                        }
                    ?>
                    <tr class="addMoreObjectRow"></tr>
                </tbody>
            </table>
            <input type="button" value="Add more week/day" onClick="addObjectRow()" border=0       style='cursor:pointer;background-color: white;
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