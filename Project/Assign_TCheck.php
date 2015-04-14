<?php
include("connection.php");
session_start();
$course=$_GET["course"];
$teacher=$_GET["teacher"];
//echo $course." ".$teacher;

if($course=="0"){
   echo "<h4 class='alert_error'>You must have to select one couse</h4>";
   die();
}
if($teacher=="0"){
  echo "<h4 class='alert_error'>You must have to select one Teacher</h4>";
  die();
}
else
{
	$check=oci_parse($conn,"select * from assignteacher where CourseCode='$course' and VersityId='$teacher'") or die(oci_error());
	oci_execute($check);
	$data=oci_num_rows($check);
	if($data<=0)
	{
        $a=oci_parse($conn,"insert into assignteacher values(assign_teacher_id.nextval,'$course','$teacher','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))");
		oci_execute($a);
		 echo "<h4 class='alert_success'>Sucessfully Assigned</h4>";
    }
	else
	     echo "<h4 class='alert_error'>Already assigened select course to selected teacher</h4>";
	}
?>