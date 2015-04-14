<?php
include("connection.php");
session_start();
$data=oci_parse($conn,"select * from userinfo where Role='user'");
		oci_execute($data);
		while($row=oci_fetch_array($data,OCI_ASSOC+OCI_RETURN_NULLS))
		{
			 $data1=oci_parse($conn,"select * from finalmark where VersityId='".$row["VERSITYID"]."'");
			 oci_execute($data1);
			 $point=0;
			 $count=0;
			 while($row1=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
			 {
				 $mark12=$row1["MARK"];
				$grade=oci_parse($conn,"SELECT * FROM  grade WHERE LowMark <= $mark12 AND HighMark >= $mark12 " ) or die(oci_error());
				oci_execute($grade);
				$grade=oci_fetch_array($grade,OCI_ASSOC+OCI_RETURN_NULLS); 
				$point+=$grade["POINT"];
				 $count++;
		    }
			if($count==0)
			   $point=0;
			else
			  $point=$point/$count;
			$cgpa=oci_parse($conn,"select * from cgpa where VersityId='".$row["VERSITYID"]."'") ;
			oci_execute($cgpa);
			$check=oci_num_rows($cgpa);
			if($check<=0)
			{
				$a=oci_parse($conn,"insert into cgpa values(cgpaid.nextval,'".$row["VERSITYID"]."',$point,$count)");
				oci_execute($a);
			}
			else 
			{
				$cgpa=oci_fetch_array($cgpa,OCI_ASSOC+OCI_RETURN_NULLS);
				$total= ($point+$cgpa["CGPA"])/2;
				$a=oci_parse($conn,"update cgpa set Cgpa=$total where VersityId='".$row["VERSITYID"]."'");
				oci_execute($a);
			}
		}
		 echo " <h4 class='alert_success'>Sucessfully Closed</h4>";

?>