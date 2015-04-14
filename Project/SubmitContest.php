<?php
include("connection.php");
session_start();
$course=$_POST["cname"];
$examtype=$_POST["ctime"];
$datepicker=$_POST["datepicker"];
$datepicker= date_create($datepicker);
$datepicker = date_format($datepicker,"Y-m-d"); 
$duration=$_POST["duration"];
$tq=$_POST["tq"];
if(Strlen($course)==0)
    echo "<h4 class='alert_error'>Please Write  Contest Name</h4>";
else if($examtype=="0" || Strlen($course)==0)
     echo "<h4 class='alert_error'>Please Write  Contest Time</h4>";
else if(strlen($datepicker)==0)
      echo "<h4 class='alert_error'>Please Write  Contest Date</h4>";
else if(strlen($tq)==0) 
      echo "<h4 class='alert_error'>Please Write Total Problem</h4>";
else
{
	mysql_query("insert into contest values(null,'$course','$datepicker','$examtype','$duration',$tq,'".$_SESSION["user"]."','".date("Y-m-d H:i:s")."')") or die(mysql_error());
    echo "<h4 class='alert_success'>Sucessfully Created</h4>";																																		 
	
	}
	
?>