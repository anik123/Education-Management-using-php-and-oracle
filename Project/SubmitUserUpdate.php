<?php
include("connection.php");
session_start();
//varuiable
$vid=$_POST["vid"];
$pass=$_POST["pass"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$rl=$_POST["rl"];

$datepicker=$_POST["datepicker"];
$datepicker= date_create($datepicker);
$datepicker = date_format($datepicker,"Y-m-d"); 
$pn=$_POST["pn"];
if($rl=="Admin")
{
$role=$_POST["role"];
$us=$_POST["us"];
if(strlen($role)==0 || $role=="0") {
      echo "<h4 class='alert_error'>Please Select Role</h4>";
die();
}
else if(strlen($us)==0 || $us=="0") {
      echo "<h4 class='alert_error'>Please Select Activity</h4>";
	  die();
}
}



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

	
else
{
   if($rl=="Admin")
   {
	   $a=oci_parse($conn,"update userinfo set Password='$pass',FirstName='$fname',LastName='$lname',Email='$email',PhoneNo='$pn',DOB=to_date('$datepicker','YYYY-MM-DD'),Role='$role',Activity='$us' where VersityId='$vid'") or die(oci_error());
	   oci_execute($a) or die(oci_error());
	   echo "<h4 class='alert_success'>$vid admin Sucessfully Updated</h4>";	
  }
  else 
  {
	   $a=oci_parse($conn,"update userinfo set Password='$pass',FirstName='$fname',LastName='$lname',Email='$email',PhoneNo='$pn',DOB=to_date('$datepicker','YYYY-MM-DD') where VersityId='$vid'") or die(oci_error());
	   oci_execute($a);
	   echo "<h4 class='alert_success'>$vid Sucessfully Updated</h4>";	
	  }
}
	
?>