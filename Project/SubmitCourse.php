<?php
include("connection.php");
session_start();
$cid=$_GET["cid"];
$cname=$_GET["cname"];
$desc=$_GET["desc"];
$maxs=$_GET["maxs"];

$check=oci_parse($conn,"select * from course where CourseCode='$cid'") or die(oci_error());
oci_execute($check)  or die(oci_error());
$check=oci_num_rows($check);
if($check>0)
    echo "Already Exists";

else
{
	$data=oci_parse($conn,"insert into course values( CourseId.nextval,'$cid','$cname','$desc',$maxs,'Close','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD') )") or die(oci_error());
	oci_execute($data) or die(oci_error());
	echo "1";																														 
	}


/*
	 1 CourseId	
     2	CourseCode	varchar(100)
	 3	CourseName	varchar(100)
	 4	Description	varchar(100)
	 5	MaxStudent	int(11)	
	 6	CourseStatus	varchar(100)
	 7	CreatedBy	varchar(100)	
	 8	CreatedDate	datetime		 
*/


?>