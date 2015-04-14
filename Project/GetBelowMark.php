<?php
include("connection.php");
session_start();
$course=$_POST["course"];
$mark=$_POST["mark"];

	echo "<header><h3 class='tabs_involved'>Mark Status</h3>
		</header>
       <form onSubmit='return false;' name='myform'>
		<div class='tab_container'>

			
            <div id='tab1' class='tab_content'>
          
			<table  class='tablesorter' > 
			 
   					<thead> <tr>
    <th><center>Course Code</center></th>               
	<th><center>Course Name</center></th>
	<th><center>Teacher Id</center></th>
	<th><center>Teacher Name</center></th>
	<th><center>Student Id</center></th>
	<th><center>Student Name</center></th>
	<th><center>Exam Type</center></th>
	<th><center>Exam Mark</center></th>
	<th><center>Obtained Mark</center></th>
	<th><center>Exam Date</center></th>
	
                    </tr> </thead>
         		
			<tbody>
        ";   
		$data1=oci_parse($conn,"select * from Get_Below_Mark");
		oci_execute($data1);
		while($row=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
		{
			$tm= ($row["ObtainedMark"]*100)/$row["ExamMark"];
			if($tm<=$mark){
			$coursedata=oci_parse($conn,"select * from course where CourseCode='".$row["CourseCode"]."'");
			oci_execute($coursedata);
			$coursedata=oci_fetch_array($coursedata,OCI_ASSOC+OCI_RETURN_NULLS);
			$teacherdata=oci_parse($conn,"select * from userinfo where VersityId='".$row["CreatedBy"]."'");
			oci_execute($teacherdata);
			$teacherdata=oci_fetch_array($teacherdata,OCI_ASSOC+OCI_RETURN_NULLS);
			$studentdata=oci_parse($conn,"select * from userinfo where VersityId='".$row["VersityId"]."'");
			oci_execute($studentdata);
			$studentdata=oci_fetch_array($studentdata,OCI_ASSOC+OCI_RETURN_NULLS);
			echo "<td><center>".$coursedata["COURSECODE"]."</center></td>";
			echo "<td><center>".$coursedata["COURSENAME"]."</center></td>";
			echo "<td><center>".$teacherdata["VERSITYID"]."</center></td>";
			echo "<td><center>".$teacherdata["FIRSTNAME"]." ".$teacherdata["LASTNAME"]."</center></td>";
			echo "<td><center>".$studentdata["VERSITYID"]."</center></td>";
			echo "<td><center>".$studentdata["FIRSTNAME"]." ".$studentdata["LASTNAME"]."</center></td>";
			echo"<td><center>".$row["EXAMTYPE"]."</center></td>";
			echo"<td><center>".$row["EXAMMARK"]."</center></td>";
			echo"<td><center>".$row["OBTAINEDMARK"]."</center></td>";
			echo"<td><center>".$row["EXAMDATE"]."</center></td></tr>";
			
		}
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


?>