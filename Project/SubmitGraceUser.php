<?php
include("connection.php");
session_start();
//http.send("course="+course+"&vid="+vid+"&mark="+mark+"&bonus="+bonus);
$course=$_POST["course"];
$vid=$_POST["vid"];
$mark=$_POST["mark"];
$bonus=$_POST["bonus"];
if(strlen($bonus)==0)
   echo "<h4 class='alert_error'>Write Bonus Mark</h4>";
else
{
	$total=$mark+$bonus;
	mysql_query("update finalmark set Mark=$total where VersityId='$vid' and CourseCode='$course'") or die(mysql_error());
	echo "<h4 class='alert_success'>Sucessfully Bonus Added</h4>";
	}
?>