<?php
include("connection.php");
session_start();
$course=$_POST["course"];

	echo "<header><h3 class='tabs_involved'>Problem List</h3>
		</header>
       <form onSubmit='return false;' name='myform'>
		<div class='tab_container'>

			
            <div id='tab1' class='tab_content'>
          
			<table  class='tablesorter' > 
			 
   					<thead> <tr>
                   
	
	<th><center>Problem Name</center></th>
	<th><center>Tried</center></th>
	
	<th><center>Solved</center></th>
	
    </tr> </thead>
         		
			<tbody>
        ";   
		if($course=="0")
		$data=mysql_query("select * from problem");
		else
		$data=mysql_query("select * from problem where CategoryId=$course");
		while($row=mysql_fetch_array($data))
		{
			
			$data1=mysql_query("select * from submit where ProblemId=".$row["ProblemId"]);
			$tried=mysql_num_rows($data1);
			$data1=mysql_query("select * from submit where Answer='Accepted' and ProblemId=".$row["ProblemId"]);
			$ac=mysql_num_rows($data1);
			echo "<tr><td><center><a href='ViewProblem.php?ProblemId=".$row["ProblemId"]."'>".$row["ProblemName"]."</a></center></td>";
			echo "<td><center>$tried</center></td>";
			echo "<td><center>$ac</center></td></tr>";
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