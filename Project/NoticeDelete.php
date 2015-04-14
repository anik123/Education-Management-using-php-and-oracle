<?php
include("connection.php");
session_start();
$desc=$_GET["noticeid"];


	$a=oci_parse($conn,"delete from notice  where NoticeId=".$desc) or die(oci_error());
    oci_execute($a);
	echo "<h4 class='alert_success'>Sucessfully Deleted</h4>";																																		 
?>