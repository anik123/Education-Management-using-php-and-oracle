<?php
include("connection.php");
session_start();
$courseid=$_GET["courseid"];
$data=oci_parse($conn,"select * from exam where ExamId=$courseid");
oci_execute($data);
$data=oci_fetch_array($data,OCI_ASSOC+OCI_RETURN_NULLS) or die(oci_error());
if($data["EXAMSTATUS"]=="Open")
{
	$a=oci_parse($conn,"update exam set ExamStatus='Close' where ExamId=$courseid") or die(oci_error());
	oci_execute($a);
	echo "<h4 class='alert_success'>Sucessfully Close</h4>";
}
else if($data["EXAMSTATUS"]=="Close")
{
	$b=oci_parse($conn,"update exam set ExamStatus='Open' where ExamId=$courseid") or die(oci_error());
	oci_execute($b);
	echo "<h4 class='alert_success'>Sucessfully Open</h4>";
}
?>