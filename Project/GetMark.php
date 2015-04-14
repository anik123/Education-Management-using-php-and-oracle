<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$role=oci_parse($conn,"select * from userinfo where VersityId='".$_SESSION["user"]."'");
oci_execute($role);
$role=oci_fetch_array($role,OCI_ASSOC+OCI_RETURN_NULLS);
if($role["ROLE"]=="user"){
echo "<header><h3 class='tabs_involved'>Mark Status</h3>
		</header>
       <form onSubmit='return false;' name='myform'>
		<div class='tab_container'>

			
            <div id='tab1' class='tab_content'>
          
			<table  class='tablesorter' > 
			 
   					<thead> <tr>
                   
	<th><center>Exam Type</center></th>
	
	<th><center>Exam Duration</center></th>
	<th><center>Total Question</center></th>
	<th><center>Corret Answer</center></th>
	<th><center>Exam Mark</center></th>
	<th><center>Obtained Mark</center></th>
	<th><center>Exam Date</center></th>
                    </tr> </thead>
         		
			<tbody>
        ";   
		
		$data1=oci_parse($conn,"select * from View_Student_Mark where CourseCode='$course' and CreatedBy='".$_SESSION["user"]."'");
		oci_execute($data1);
		while($row=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
		{
			
			echo "<tr><td><center>".$row["EXAMTYPE"]."</center></td>";
			
			echo"<td><center>".$row["EXAMDURATION"]."</center></td>";
						
			$data2=oci_parse($conn,"select count(*) as G from question where ExamId=".$row["EXAMID"]) or die(oci_error());
			oci_execute($data2);
			$data2=oci_fetch_array($data2,OCI_ASSOC+OCI_RETURN_NULLS);
			echo"<td><center>".$data2["G"]."</center></td>";
			echo"<td><center>".$row["RIGHTANSWER"]."</center></td>";
			echo "<td><center>".$row["EXAMMARK"]."</center></td>";
			echo"<td><center>".$row["OBTAINEDMARK"]."</center></td>";

			echo"<td><center>".$row["EXAMDATE"]."</center></td></tr>";
			}
		
		echo 	"</tbody> 
			</table>
			</div><!-- end of #tab1 -->
            <footer>
				<div class='submit_link'>
					
					
				</div>
                
			</footer>
            </form>
		</div>";
}
else if($role["ROLE"]=="Teacher")
{
	echo "<header><h3 class='tabs_involved'>Mark Status</h3>
		</header>
       <form onSubmit='return false;' name='myform'>
		<div class='tab_container'>

			
            <div id='tab1' class='tab_content'>
          
			<table  class='tablesorter' > 
			 
   					<thead> <tr>
                   
	<th><center>Student Id</center></th>
	<th><center>Full Name</center></th>
	<th><center>Exam Type</center></th>
	
	<th><center>Exam Duration</center></th>
	<th><center>Total Question</center></th>
	<th><center>Corret Answer</center></th>
	<th><center>Exam Mark</center></th>
	<th><center>Obtained Mark</center></th>
	<th><center>Exam Date</center></th>
                    </tr> </thead>
         		
			<tbody>
        ";   
		
		$data1=oci_parse($conn,"select * from View_Teacher_Mark where CourseCode='$course' and CreatedBy='".$_SESSION["user"]."'") or die(oci_error());
		oci_execute($data1);
		while($row=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
		{
			
			
			echo "<td><center>".$row["VERSITYID"]."</center></td>";
			echo "<td><center>".$row["FIRSTNAME"]." ".$row["LASTNAME"]."</center></td>";
			echo "<td><center>".$row["EXAMTYPE"]."</center></td>";
			
			echo"<td><center>".$row["EXAMDURATION"]."</center></td>";
						
			$data2=oci_parse($conn,"select count(*) as G from question where ExamId=".$row["ExamId"]) or die(mysql_error());
			oci_execute($data2);
			$data2=oci_fetch_array($data2,OCI_ASSOC+OCI_RETURN_NULLS);
			echo"<td><center>".$data2["G"]."</center></td>";
			echo"<td><center>".$row["RIGHTANSWER"]."</center></td>";
			echo "<td><center>".$row["EXAMMARK"]."</center></td>";
			echo"<td><center>".$row["OBTAINEDMARK"]."</center></td>";

			echo"<td><center>".$row["EXAMDATE"]."</center></td></tr>";
			}
		
		echo 	"</tbody> 
			</table>
			</div><!-- end of #tab1 -->
            <footer>
				<div class='submit_link'>
					
					
				</div>
                
			</footer>
            </form>
		</div>";
	
	}

?>