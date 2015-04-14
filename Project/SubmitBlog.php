<?php
include("connection.php");
session_start();
$blog=$_POST["cname"];
$desc=$_POST["desc"];

if(Strlen($blog)==0)
    echo "<h4 class='alert_error'>Please Write  Title</h4>";
else if(Strlen($desc)==0)
     echo "<h4 class='alert_error'>Please Write  Blog Description</h4>";

else
{
	mysql_query("insert into blog values(null,'$blog','$desc','".$_SESSION["user"]."','".date("Y-m-d H:i:s")."')") or die(mysql_error());
    echo "<h4 class='alert_success'>Sucessfully Created</h4>";																																		 
	
	}
	
?>