<?php
include("connection.php");
session_start();
$ToUser=$_POST["ToUser"];
$message=$_POST["message"];
$subject=$_POST["subject"];
if(strlen($message)==0)
   echo "<h4 class='alert_error'>Please Write Message</h4>";
 else 
 {
	 $subject="Re : ".$subject;
	 $a=oci_parse($conn,"insert into message values(messageid.nextval,'".$_SESSION["user"]."','$ToUser','$subject','$message','Close',to_date('".date("Y-m-d")."','YYYY-MM-DD'))") or die(oci_error());
	 oci_execute($a);
	 echo "<h4 class='alert_success'>Sucessfully Send</h4>";
	 }
?>