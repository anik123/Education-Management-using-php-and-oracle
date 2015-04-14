<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$examtype=$_POST["examtype"];
$datepicker=$_POST["datepicker"];
$datepicker= date_create($datepicker);
$datepicker = date_format($datepicker,"Y-m-d"); 
//echo $datepicker;

$mark=$_POST["mark"];
$duration=$_POST["duration"];
$tq=$_POST["tq"];
if($course=="0" || Strlen($course)==0)
    echo "<h4 class='alert_error'>Please Select One Course</h4>";
else if($examtype=="0" || Strlen($course)==0)
     echo "<h4 class='alert_error'>Please Select One Exam Type</h4>";
else if(strlen($datepicker)==0)
      echo "<h4 class='alert_error'>Please Write Exam Date</h4>";
else if(strlen($mark)==0)
      echo "<h4 class='alert_error'>Please Write Exam Mark</h4>";
else if(strlen($duration)==0) 
      echo "<h4 class='alert_error'>Please Write Exam Duration</h4>";
else if(strlen($tq)==0) 
      echo "<h4 class='alert_error'>Please Write Total Mark</h4>";
else
{
	$a=oci_parse($conn,"insert into exam values(examid.nextval,'$course','$examtype',to_date('$datepicker','YYYY-MM-DD'),$mark,'$duration',$tq,'Close','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))") or die(oci_error());
	oci_execute($a);
    echo "<h4 class='alert_success'>Sucessfully Created</h4>";																																		 
	
	}
	
?>