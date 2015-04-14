<?php
include("connection.php");
session_start();
$courseid=$_GET["courseid"];

	$a=oci_parse($conn,"delete from course where  CourseId=$courseid") or die(oci_error());
	$q="begin course_delete(:cid); end;" ;
$a=oci_parse($conn,$q) or die(oci_error());
oci_bind_by_name($a, ":cid", $courseid);
oci_execute($a) or die(oci_error());

	oci_execute($a);
	echo "<h4 class='alert_success'>Sucessfully Deleted</h4>";
   
?>