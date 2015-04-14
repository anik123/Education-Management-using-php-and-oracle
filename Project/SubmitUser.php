<?php
include("connection.php");
session_start();
//varuiable
$vid=$_POST["vid"];
$pass=$_POST["pass"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$datepicker=$_POST["datepicker"];
$datepicker= date_create($datepicker);
$datepicker = date_format($datepicker,"Y-m-d"); 
//echo $datepicker;

$pn=$_POST["pn"];
$role=$_POST["role"];
$us=$_POST["us"];



if(Strlen($vid)==0)
    echo "<h4 class='alert_error'>Please Insert Versity Id</h4>";
else if(Strlen($pass)==0)
     echo "<h4 class='alert_error'>Please Insert Password</h4>";
else if(strlen($datepicker)==0)
      echo "<h4 class='alert_error'>Please Write Date of Birth</h4>";
else if(strlen($fname)==0)
      echo "<h4 class='alert_error'>Please Write First Name</h4>";
else if(strlen($lname)==0)
      echo "<h4 class='alert_error'>Please Write Last Name</h4>";
else if(strlen($email)==0)
      echo "<h4 class='alert_error'>Please Write Email</h4>";

else if(strlen($pn)==0) 
      echo "<h4 class='alert_error'>Please Write Phone Number</h4>";
else if(strlen($role)==0 || $role=="0") 
      echo "<h4 class='alert_error'>Please Select Role</h4>";
else if(strlen($us)==0 || $us=="0") 
      echo "<h4 class='alert_error'>Please Select Activity</h4>";
	
else
{
	$check=oci_parse($conn,"select * from userinfo where VersityId='".$vid."'");
	oci_execute($check);
	$check=oci_num_rows($check);
	if($check==1)
	   echo "<h4 class='alert_error'>".$vid." Already Exixts</h4>";
	else{
	$a=oci_parse($conn,"insert into userinfo values(userid.nextval,'$vid','$pass','$fname','$lname',to_date('$datepicker','YYYY-MM-DD'),'$email','$pn','".$_SESSION["user"]."',to_date('".date("Y-m-d")."','YYYY-MM-DD'),'$role','$us')") or die(oci_error());
	oci_execute($a);
    echo "<h4 class='alert_success'>Sucessfully Created</h4>";																																		 
	}
	}
	
?>