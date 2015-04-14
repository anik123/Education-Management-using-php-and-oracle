<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$check=oci_parse($conn,"select count(*) as G from question where ExamId=$course") or die(oci_error());
oci_execute($check);
$check=oci_fetch_array($check,OCI_ASSOC+OCI_RETURN_NULLS);
$check1= oci_parse($conn,"select * from exam where ExamId=$course") or die(oci_error());
oci_execute($check1);
$row=oci_fetch_array($check1,OCI_ASSOC+OCI_RETURN_NULLS);
$total=$row["EXAMTOTALQUESTION"]-$check["G"];
echo ($row["EXAMTOTALQUESTION"]-$check["G"]);

?>