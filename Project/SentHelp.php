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
	
   	$a=oci_parse($conn,"insert into message values(messageid.nextval,'".$_SESSION["user"]."','$course','$sub','$message','Close',to_date('".date("Y-m-d")."','YYYY-MM-DD'))") or die(oci_error());
	oci_execute($a);
	 echo "<h4 class='alert_success'>Sucessfully Send</h4>";	
}
	
?>