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
    if($row2['TPT'] == 1){
        header("Location:viewTaskAndSchedule.php?user_id=$userId&project_id=$projectId");
    }
?>
<!DOCTYPE html>
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
                    <tr>
                        <td width="87">
                            <p style="text-align: center;">1</p>
                        </td>
                        <td width="87">
                            <select name="phase[]" data-validation="required">
                                <option value="" disabled selected>Select</option>
                                <option value="Planning">Planning</option>
                                <option value="Design">Design</option>
                                <option value="Code">Code</option>
                                <option value="Compile">Compile</option>
                                <option value="Test">Test</option>
                                <option value="Postmortem">Postmortem</option>
                            </select>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="hours[]" id="hours1" class="toAdd" data-validation="number" data-validation-allowing="float">
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="pv[]" id="pv1" data-validation="number" data-validation-allowing="float">
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="taskch[]" id="taskch1" data-validation="number" data-validation-allowing="float">
                        </td>
                        <td width="87">
                            <input type="text" size="9" name="taskcpv[]" id="taskcpv1" data-validation="number" data-validation-allowing="float">
                        </td>
                        <td width="87">
                            <input type="date" step=7 min=2014-09-08 name="taskDateMonday[]" id="taskDateMonday1" data-validation="required">
                        </td>
                        <td width="87">
                            <input type="date" name="taskDate[]" id="taskDate1" disabled>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="ev[]" id="ev1" disabled>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="taskcev[]" id="taskcev1" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td width="87">
                            <p style="text-align: center;">2</p>
                        </td>
                        <td width="87">
                            <select name="phase[]" id="phase2" data-validation="required" data-validation-depends-on="caev2">
                                <option value="" disabled selected>Select</option>
                                <option value="Planning">Planning</option>
                                <option value="Design">Design</option>
                                <option value="Code">Code</option>
                                <option value="Compile">Compile</option>
                                <option value="Test">Test</option>
                                <option value="Postmortem">Postmortem</option>
                            </select>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="hours[]" id="hours2" class="toAdd" data-validation="number" data-validation-allowing="float" data-validation-depends-on="phase2">
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="pv[]" id="pv2" data-validation="number" data-validation-allowing="float" data-validation-depends-on="hours2">
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="taskch[]" id="taskch2" data-validation="number" data-validation-allowing="float" data-validation-depends-on="pv2">
                        </td>
                        <td width="87">
                            <input type="text" size="9" name="taskcpv[]" id="taskcpv2" data-validation="number" data-validation-allowing="float" data-validation-depends-on="taskch2">
                        </td>
                        <td width="87">
                            <input type="date" step=7 min=2014-09-08 name="taskDateMonday[]" name="taskDateMonday[]" id="taskDateMonday2" data-validation="required" data-validation-depends-on="taskcpv2">
                        </td>
                        <td width="87">
                            <input type="date" name="taskDate[]" id="taskDate2" disabled>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="ev[]" id="ev2" disabled>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="taskcev[]" id="taskcev2" disabled>
                        </td>
                    </tr>
                    <tr class="addMore">
                        <td width="87">
                            <p>&nbsp;</p>
                        </td>
                        <td width="87">
                            <p style="text-align: center;">TOTAL</p>
                        </td>
                        <td width="87">
                            <input type="text" size="8" name="totalHours" id="totalBA" data-validation="number" data-validation-allowing="float">
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
                    </tr>
                    <tr>
                        <td style="width: 109px;">
                            <p style="text-align: center;">1</p>
                        </td>
                        <td style="width: 109px;">
                            <input type="date" step=7 min=2014-09-08 name="schedDateMonday[]" id="schedDateMonday1" data-validation="required">
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="plandh[]" id="plandh1" data-validation="number" data-validation-allowing="float">
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="schedch[]" id="schedch1" data-validation="number" data-validation-allowing="float">
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="schedcpv[]" id="schedcpv1" data-validation="number" data-validation-allowing="float">
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="actualdh[]" id="actualdh1" disabled>
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="actualschedch[]" id="actualschedch1" disabled>
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="schedcev[]" id="schedcev1" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 109px;">
                            <p style="text-align: center;">2</p>
                        </td>
                        <td style="width: 109px;">
                            <input type="date" step=7 min=2014-09-08 name="schedDateMonday[]" id="schedDateMonday2" data-validation="required" data-validation-depends-on="schedcpv2">
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="plandh[]" id="plandh2" data-validation="number" data-validation-allowing="float" data-validation-depends-on="schedDateMonday2">
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="schedch[]" id="schedch2" data-validation="number" data-validation-allowing="float" data-validation-depends-on="plandh2">
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="schedcpv[]" id="schedcpv2" data-validation="number" data-validation-allowing="float" data-validation-depends-on="schedch2">
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="actualdh[]" id="actualdh2" disabled>
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="actualschedch[]" id="actualschedch2" disabled>
                        </td>
                        <td style="width: 110px;">
                            <input type="text" size="13" name="schedcev[]" id="schedcev2" disabled>
                        </td>
                    </tr>
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