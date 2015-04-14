<?php
include("acmheader.php");
$cate=$_POST["cate"];
$pname=$_POST["pname"];
$desc=$_POST["desc"];
$pdesc=$_POST["pdesc"];
$odesc=$_POST["odesc"];
$sami=$_POST["sami"];
$samo=$_POST["samo"];
$path="acm/";

if(strlen($cate)<=0 || $cate=="0"){
   echo "<h4 class='alert_error'>Please Select Category</h4>";
   echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else if(strlen($pname)==0){
      echo "<h4 class='alert_error'>Please Write Problem Name</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else if(strlen($desc)==0){
      echo "<h4 class='alert_error'>Please Write Description</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else if(strlen($pdesc)==0){
      echo "<h4 class='alert_error'>Please Write Input Description</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else if(strlen($odesc)==0){
      echo "<h4 class='alert_error'>Please Write Output Description</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else if(strlen($sami)==0){
      echo "<h4 class='alert_error'>Please Write Sample Input</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else if(strlen($samo)==0){
      echo "<h4 class='alert_error'>Please Write Sample Output</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else if($_FILES['icase']['name']==NULL)
{
	 echo "<h4 class='alert_error'>Please Choose Input Case</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else if($_FILES['ocase']['name']==NULL)
{
	 echo "<h4 class='alert_error'>Please Choose Output Case</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else
{
	$file1 = $path . basename($_FILES['icase']['name']);
$file2 = $path . basename($_FILES['ocase']['name']);
	 $FileExt = array("txt");
	 $ext=pathinfo($_FILES['icase']['name'], PATHINFO_EXTENSION);
	  $ext1=pathinfo($_FILES['ocase']['name'], PATHINFO_EXTENSION);
	 if(!in_array($ext,$FileExt))
	 {
		 echo "<h4 class='alert_error'>Wrong Formate</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
      }
	 
	
	  else if(!in_array($ext1,$FileExt))
	 {
		 echo "<h4 class='alert_error'>Wrong Formate</h4>";
	  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
      }
	  else
	  {
		 move_uploaded_file($_FILES['icase']['tmp_name'], $file1);
		 move_uploaded_file($_FILES['ocase']['tmp_name'], $file2);
		 mysql_query("insert into problem values(null,$cate,'$pname','$desc','$pdesc','$odesc','$sami','$samo','$file1','$file2','".$_SESSION["user"]."','".date("Y-m-d H:i:s")."')");
		 echo "<h4 class='alert_success'>Sucessfully Created</h4>";
				  echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'></center>";
	   }
	   
}
include("footer.php");
?>