<?php
include("connection.php");
session_start();
$course=$_POST["course"];

	echo "<header><h3 class='tabs_involved'>Contest List</h3>
		</header>
       <form onSubmit='return false;' name='myform'>
		<div class='tab_container'>

			
            <div id='tab1' class='tab_content'>
          
			<table  class='tablesorter' > 
			 
   					<thead> <tr>
                   
	
	<th><center>Contest Name</center></th>
	<th><center>Contest Date</center></th>
	<th><center>Contest Time</center></th>
	<th><center>Contest Duration</center></th>
	<th><center>Total Problem</center></th>
	
	<th><center>Created By</center></th>
	
    </tr> </thead>
         		
			<tbody>
        ";   
		if($course=="0")
		$data=mysql_query("select * from contest");
		else if($course=="1")
		$data=mysql_query("select * from contest where ContestDate<'".date("Y-m-d")."'");
		else if($course=="2")
		$data=mysql_query("select * from contest where ContestDate='".date("Y-m-d")."'");
		else if($course=="3")
		$data=mysql_query("select * from contest where ContestDate>'".date("Y-m-d")."'");
		
		while($row=mysql_fetch_array($data))
		{
			
			
			echo "<tr><td><center><a href='ContestHome.php?ContestId=".$row["ContestId"]."'>".$row["ContestName"]."</a></center></td>";
			echo "<td><center>".$row["ContestDate"]."</center></td>";
			echo "<td><center>".$row["ContestTime"]."</center></td>";
			echo "<td><center>".$row["ContestDuration"]."</center></td>";
			echo "<td><center>".$row["TotalProblem"]."</center></td>";
			$userinfo=mysql_query("select * from user where VersityId='".$row["CreatedBy"]."'");
			$userinfo=mysql_fetch_array($userinfo);
			echo "<td><center><a href='UserDetails.php?ProfileId=".$userinfo["UserId"]."'>".$userinfo["FirstName"]." ".$userinfo["LastName"]."</a></center></td></tr>";
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