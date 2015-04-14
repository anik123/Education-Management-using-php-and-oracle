<?php
include("connection.php");
session_start();
$course=$_GET["course"];

$check=oci_parse($conn,"select * from assignstudent where CourseCode='$course'");
oci_execute($check) or die(oci_error());
$check=oci_num_rows($check);

$check1=oci_parse($conn,"select * from course where CourseCode='$course'");
oci_execute($check1) or die(oci_error());
$data1=oci_fetch_array($check1,OCI_ASSOC+OCI_RETURN_NULLS);
echo $check." ".$data1["MAXSTUDENT"];

?>