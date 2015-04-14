<?php
include("connection.php");
session_start();
$desc=$_POST["desc"];
$noticeid=$_POST["noticeid"];
if(Strlen($desc)==0)
     echo "<h4 class='alert_error'>Please Write  Blog Description</h4>";

else
{
  $q="begin :in :=update_notice(:un,:us); end;" ;
  $p=oci_parse($conn,$q);
  
  oci_bind_by_name($p,":un",$desc);
  oci_bind_by_name($p,":us",$noticeid);
  oci_bind_by_name($p,":in",$o,20);
  oci_execute($p);
echo "<h4 class='alert_success'>Sucessfully Updated</h4>";																																		 	
	}
	
?>