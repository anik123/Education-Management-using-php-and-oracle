
<?php
include("connection.php");
session_start();
$course=$_GET["course"];
$student=$_GET["student"];


if($course=="0"){
   echo "<h4 class='alert_error'>You must have to select one role</h4>";
   die();
}
if(strlen($student)==0){
  echo "<h4 class='alert_error'>You must have to enter student id</h4>";
  die();
}
if(strlen($student)>0)
{
	$check=mysql_query("select * from user where VersityId='$student' ");
	$check=mysql_num_rows($check);
	if($check<=0){
	  echo "<h4 class='alert_error'>Invalid student id</h4>";
         die();
	}
    else
	{   $check1=mysql_query("select * from assignacm where VersityId='$course'");
	    $check1=mysql_num_rows($check1);
		
		
	if($check1<=0)
	{
         mysql_query("insert into assignacm values(null,'$course','$student','".$_SESSION["user"]."','".date("Y-m-d H:i:s")."')");
		 echo "<h4 class='alert_success'>Sucessfully Assigned</h4>";
    }
	else
	     echo "<h4 class='alert_error'>Already assigened select acm to selected student</h4>";
		}
	
	
}
else
{
	
	}
?>