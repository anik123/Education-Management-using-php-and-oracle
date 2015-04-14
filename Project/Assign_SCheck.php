<?php
include("connection.php");
session_start();
$course=$_GET["course"];
$student=$_GET["student"];
$maxts=$_GET["maxts"];
//echo $course." ".$teacher;

if($course=="0"){
   echo "<h4 class='alert_error'>You must have to select one couse</h4>";
   die();
}
if(strlen($student)==0){
  echo "<h4 class='alert_error'>You must have to enter student id</h4>";
  die();
}
if(strlen($student)>0)
{
	/*echo $student;
	$check=oci_parse($conn,"select * from userinfo where VersityId='$student'");
	oci_execute($check) or die(oci_error());
	$check=oci_num_rows($check);
	
	if($check<=0){
	  echo "<h4 class='alert_error'>Invalid student id</h4>";
         die();
	}
    else
	{ */  $check1=oci_parse($conn,"select * from assignstudent where CourseCode='$course'");
	    oci_execute($check1);
		$check1=oci_num_rows($check1);
		if($check1>=$maxts)
		    echo "<h4 class='alert_error'>This course is full</h4>";
		else{
		$check=oci_parse($conn,"select * from assignstudent where CourseCode='$course' and VersityId='$student'") or die(oci_error());
	 oci_execute($check);
	$data=oci_num_rows($check);
	if($data<=0)
	{
        $d=oci_parse($conn,"insert into assignstudent values(assign_student_id.nextval,'$course','$student','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'))");
		oci_execute($d);
		 echo "<h4 class='alert_success'>Sucessfully Assigned</h4>";
    }
	else
	     echo "<h4 class='alert_error'>Already assigened select course to selected student</h4>";
		}
	}
	

?>