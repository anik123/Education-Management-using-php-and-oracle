<?php
include("connection.php");
session_start();
$courseid=$_GET["courseid"];
$data=mysql_query("select * from course where CourseId=$courseid");
$data=mysql_fetch_array($data) or die(mysql_query());
if($data["CourseStatus"]=="Open")
{
	mysql_query("update course set CourseStatus='Close' where CourseId=$courseid") or die(mysql_query());
	echo "<h4 class='alert_success'>Sucessfully Close</h4>";
}
else if($data["CourseStatus"]=="Close")
{
	mysql_query("update course set CourseStatus='Open' where CourseId=$courseid") or die(mysql_query());
	echo "<h4 class='alert_success'>Sucessfully Open</h4>";
}
   
?>