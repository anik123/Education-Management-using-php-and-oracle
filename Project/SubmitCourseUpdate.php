<?php
include("connection.php");
session_start();
$cid=$_GET["cid"];
$cname=$_GET["cname"];
$desc=$_GET["desc"];
$maxs=$_GET["maxs"];
$coid=$_GET["coid"];
$state=$_GET["state"];
$check=mysql_query("select * from course where CourseCode='$cid'") or die(mysql_error());
$check=mysql_num_rows($check);

	mysql_query("update course set CourseCode='$cid',CourseName='$cname',Description='$desc',MaxStudent='$maxs',CourseStatus='$state' where CourseId=$coid") or die(mysql_error());
	echo "1";
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