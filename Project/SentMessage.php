<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$message=$_POST["message"];
$sub=$_POST["sub"];
if($course=="0" || Strlen($course)==0)
    echo "<h4 class='alert_error'>Please Select One Course</h4>";
else if(Strlen($message)==0)
     echo "<h4 class='alert_error'>Please Write Message</h4>";
else if(Strlen($sub)==0)
     echo "<h4 class='alert_error'>Please Write Subject</h4>";
else
{
	$user=oci_parse($conn,"select * from userinfo where VersityId='".$_SESSION["user"]."'");
    oci_execute($user) or die(oci_error());
	$user=oci_fetch_array($user,OCI_ASSOC+OCI_RETURN_NULLS);
	if($user["ROLE"]=="user"){
		
	$teacher=oci_parse($conn,"select a.VersityId VersityId from course c,assignteacher a where c.CourseCode=a.CourseCode and a.CourseCode='$course'");
	oci_execute($teacher) or die(oci_error());
	$teacher=oci_fetch_array($teacher,OCI_ASSOC+OCI_RETURN_NULLS);
	$a=oci_parse($conn,"insert into message values(messageid.nextval,'".$_SESSION["user"]."','".$teacher["VERSITYID"]."','$sub','$message','Close',to_date('".date("Y-m-d")."','YYYY-MM-DD'))") or die(oci_error());
	oci_execute($a) or die(oci_error());
	 echo "<h4 class='alert_success'>Sucessfully Send</h4>";	
	}
	else if($user["ROLE"]=="Teacher"){
	$teacher=oci_parse($conn,"select a.VersityId VersityId from course c,assignstudent a where c.CourseCode=a.CourseCode and a.CourseCode='$course'") or die(oci_error());
	oci_execute($teacher) or die(oci_error());
	while($row=oci_fetch_array($teacher,OCI_ASSOC+OCI_RETURN_NULLS)){
	   $a=oci_parse($conn,"insert into message values(messageid.nextval,'".$_SESSION["user"]."','".$row["VERSITYID"]."','$sub','$message','Close',to_date('".date("Y-m-d")."','YYYY-MM-DD'))") or die(oci_error());
		
	
	oci_execute($a) or die(oci_error());
	oci_close($conn);
	}
	 echo "<h4 class='alert_success'>Sucessfully Send</h4>";	
	}
   	else if($user["ROLE"]=="Admin"){
		
	$a=oci_parse($conn,"insert into message values(messageid.nextval,'".$_SESSION["user"]."','$course','$sub','$message','Close',to_date('".date("Y-m-d")."','YYYY-MM-DD'))") or die(oci_error());
	oci_execute($a) or die(oci_error());
	 echo "<h4 class='alert_success'>Sucessfully Send</h4>";	
	}																																 
	
	}
	
?>