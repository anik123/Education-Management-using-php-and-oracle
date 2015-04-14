<?php
include("header.php");
$problem=$_POST["ProblemId"];
$ContestId=$_POST["ContestId"];
$path="solve/";
 

if($_FILES['a']['name']==NULL)
{
	 echo "<h4 class='alert_error'>Please Choose Output Case</h4>";
	  //echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
}
else
{
	
	 $FileExt = array("txt");
	 $ext=pathinfo($_FILES['a']['name'], PATHINFO_EXTENSION);
	 
	 if(!in_array($ext,$FileExt))
	 {
		 echo "<h4 class='alert_error'>Wrong Formate</h4>";
	  //echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
	  echo "<a href='ContestHome.php?ContestId=".$ContestId."'><font style='color:#F00;font-size:16px;' ><b> || Contest Home || </b></font></a>";
      }
	  
	  else
	  {
		  $file = $path . basename($_FILES['a']['name']); 
	  move_uploaded_file($_FILES['a']['tmp_name'], $file);
		 $data=mysql_query("select * from contestproblem where ProblemId=".$problem) or die(mysql_error());
		 $data=mysql_fetch_array($data);
		$name="acm/".basename($data["OutputCase"]);
		
 $c1 = strtoupper(dechex(crc32(file_get_contents($file))));
$c2 = strtoupper(dechex(crc32(file_get_contents($name))));
		
		 if($c1!=$c2)
		    {
		 
		 mysql_query("insert into contestsubmit values(null,".$problem.",'Wrong Answer','".$_SESSION["user"]."','".date("Y-m-d H:i:s")."')") or die(mysql_error());
		 $count=mysql_query("select * from contestrank where VersityId='".$_SESSION["User"]."'") or die(mysql_error());
		 $coun1=mysql_num_rows($count);
		 if($coun1>0)
		 {
			 $datarank=mysql_fetch_array($count);
			 mysql_query("update contestrank set Tried=".($datarank["Tried"]+1)." where VersityId='".$_SESSION["user"]."' amd ContestId=".$ContestId) or die(mysql_error());
		  }
		  else
		  {
			   mysql_query("insert into contestrank values(null,$ContestId,'".$_SESSION["user"]."',0,1)") or die(mysql_error()) ;
		   }
		 echo "<h4 class='alert_error'>Wrong Answer</h4>";
		 echo "<a href='ContestHome.php?ContestId=".$ContestId."'><font style='color:#F00;font-size:16px;' ><b> || Contest Home || </b></font></a>";
	 // echo "<meta http-equiv='refresh' content='5;url=CreateProblem.php'>";
      }
	  else 
	  {
		   mysql_query("insert into contestsubmit values(null,".$problem.",'Accepted','".$_SESSION["user"]."','".date("Y-m-d H:i:s")."')");
		   $count=mysql_query("select * from contestrank where VersityId='".$_SESSION["user"]."'") or die(mysql_error());
		 $coun1=mysql_num_rows($count);
		 if($coun1>0)
		 {
			 $datarank=mysql_fetch_array($count);
			 mysql_query("update contestrank set Tried=".($datarank["Tried"]+1).",Accepted=".($datarank["Accepted"]+1)." where VersityId='".$_SESSION["user"]."' amd ContestId=".$ContestId) or die(mysql_error());
		  }
		  else
		  {
			   mysql_query("insert into contestrank values(null,$ContestId,'".$_SESSION["user"]."',1,1)") or die(mysql_error());
		   }
		  echo "<h4 class='alert_success'>Accepted</h4>";
			echo "<center><a href='ContestHome.php?ContestId=".$ContestId."'><font style='color:#F00;font-size:16px;' ><b> || Contest Home || </b></font></a></center>";	  
		  }
	   }
	   
}
include("footer.php");
?>



