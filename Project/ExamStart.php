<?php
include("connection.php");
   session_start();
   if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
		 
	else{	
		 $exam=0;
		 if(!isset($_GET["ExamId"])){
		   echo "Invalid Page<br>";
		   echo "<a href='home.php'> <<<<< Back <<<<<< </a>";
		   die();
		 }
		 else 
		 {
			 $exam=$_GET["ExamId"];
			 $data=oci_parse($conn,"select count(a.CourseCode) as G from assignstudent a ,exam e where e.CourseCode=a.CourseCode and e.ExamStatus='Open' and to_date(e.Examdate,'YYYY-MM-DD')=to_date(sysdate,'YYYY-MM-DD') and e.ExamId=$exam");
			 oci_execute($data);
			 $data=oci_fetch_array($data,OCI_ASSOC+OCI_RETURN_NULLS);
			 if($data["G"]<=0)
			 {
				  echo "Invalid Page<br>";
		   echo "<a href='home.php'> <<<<< Back <<<<<< </a>";
		   die();
		     }
			 else 
			 {
				 $vis=oci_parse($conn,"select count(*) as G from mark where VersityId='".$_SESSION["user"]."'");
				 oci_execute($vis);
				 $vis=oci_fetch_array($vis,OCI_ASSOC+OCI_RETURN_NULLS);
				 if($vis["G"]>=1)
				 {
					  echo "You Have Already Attended This Exam<br>";
		           echo "<a href='home.php'> <<<<< Back <<<<<< </a>";
		   die();
					 }
				 }
			 }
	}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script> 
<script type="text/javascript">
  var timer=setInterval("clock()",1000);
  function clock()
  {
	  //alert("hi");
	  var time=document.getElementById("duration").value;
	  if(time=="00:00:00") {
	    document.forms["qa"].submit();
	   timer.stop();
		//alert("ses");
		
	  }
	  else{
	  time=time.split(":");
	  var hour = time[0]*1;
	  var mint=time[1]*1;
	  var sec=time[2]*1;
	  if(sec==0)
	   {  
	       if(mint==0)
		   {
			   if(hour=0)
			   {
				    alert("Somoi Ses");
				   }
				else {
				  hour--;
				  mint=59;
				}
			 }
			 else
			 {
				 mint--;
				 sec=59;
				 }
			   
		 }
		 else 
		    sec--;
			var nsec="";
			var nmin="";
			var nhour="";
		if(sec<10)
		      nsec="0"+sec;
		else 
		     nsec=sec;
		if(mint<10)
		      nmin="0"+mint;
		else 
		     nmin=mint;
	    if(hour<10)
		      nhour="0"+hour;
		else 
		     nhour=hour;
	 document.getElementById("time").innerHTML=nhour+":"+nmin+":"+nsec;
	 document.getElementById("duration").value=nhour+":"+nmin+":"+nsec;
	  }
   }
	function status(code)
	{
		var http=new XMLHttpRequest();
		http.open("GET","ChangeStatus.php?courseid="+code,false);
		http.send();
		document.getElementById("error").innerHTML=http.responseText;
		//alert(code);
	}
	function formsubmit()
	{
		document.forms["qa"].submit();
		
		}
	
</script>

</head>


<body onUnload="formsubmit();" >

	<header id="header">
		<hgroup>
			<h1 class="site_title">Welcome
             <?php
			$query=oci_parse($conn,"select * from userinfo where VersityId='".$_SESSION["user"]."'") or die(oci_error());
			oci_execute($query) or die(oci_error());
			$query=oci_fetch_array($query,OCI_ASSOC+OCI_RETURN_NULLS);
			echo " ".$query["FIRSTNAME"]." ".$query["LASTNAME"]."</h2>";			?></h1>
			<h2 class="section_title"></h2>
            <div class="btn_view_site">
            <a href="LogOut.php">Log out</a>
            
            </div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
			
		<hr/>
        <h3>Home</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="Home.php">Home</a></li>
        </ul>
		<h3>Course</h3>
        <ul class="toggle">
<?php
if($query["ROLE"]=="Admin")
{
	echo "<li class='icn_new_article'><a href='CreateCourse.php'>Create Course</a></li>";
	}
?>
           
           <li class="icn_edit_article"><a href="CourseStatus.php">View Course List</a></li>
           <?php
if($query["ROLE"]=="Admin")
{
	echo "<li class='icn_view_users'><a href='AssignTeacher.php'>Assign To Teacher</a></li>
			<li class='icn_view_users'><a href='AssignStudent.php'>Assign To Student</a></li>";
	}
?>
           
            
        </ul>
		 <h3>Message</h3>
         <ul class="toggle">
          <li class="icn_edit_article"><a href="ComposeMessage.php">Compose Message</a></li>
            <li class="icn_folder"><a href="InboxMessage.php">Inbox</a></li>
         </ul>
        
         <?php
		 
if($query["ROLE"]=="Teacher")
{
	echo " <h3>Exam</h3>
        <ul class='toggle'><li class='icn_edit_article'><a href='CreateExam.php'>Create Exam</a></li>
            <li class='icn_categories'><a href='ExamStatus.php'>Exam Status</a></li>
            <li class='icn_edit_article'><a href='CreateQues.php'>Create Question</a></li>";
}
if($query["ROLE"]=="user")
   echo "<h3>Exam</h3>
        <ul class='toggle'>";
if($query["ROLE"]=="Teacher" || $query["ROLE"]=="user")
  echo "<li class='icn_settings'><a href='CurrentExam.php'>Current Exam</a></li>";
if($query["ROLE"]=="user")
   echo "</ul>";
?>
        
            
            <?php
if($query["ROLE"]=="Teacher")
{
	echo "<li class='icn_security'><a href='MarkStatus.php'>Mark Status</a></li></ul>";
	}
?>
        <h3>User Panel</h3>
        <ul class="toggle">
         <?php
if($query["ROLE"]=="Admin")
{
	echo "<li class='icn_edit_article'><a href='CreateUser.php'>Create User</a></li>";
	echo "<li class='icn_edit_article'><a href='UserList.php'>Change User</a></li>";
	}
?>
        
            <li class="icn_add_user"><a href="UpdateUser.php">Update User</a></li>
            <?php
			
            echo "<li class='icn_profile'><a href='UserDetails.php?ProfileId=".$query["USERID"]."'>Profile</a></li>";
        ?>
		</ul>
        
         <?php
if($query["ROLE"]=="Admin")
{
	echo "<h3>Admin Panel</h3>
        <ul class='toggle'><li class='icn_categories'><a href='BelowMark.php'>Analize Mark</a></li>
	<li class='icn_security'><a href='GradeClose.php'>Close Grade</a></li></ul>";
}
else if($query["ROLE"]=="Teacher")
   echo " <h3>Admin Panel</h3>
        <ul class='toggle'><li class='icn_security'><a href='CourseClose.php'>Close Course</a></li> </ul>";
?>
         
           
            
       <?php
	   if($query["ROLE"]=="user")
{
       echo "<h3>Media</h3>
        <ul class='toggle'>
            <li class='icn_video'><a href='Video.php'>Video</a></li>
            <li class='icn_audio'><a href='Audio.php'>Audio</a></li>
            <li class='icn_photo'><a href='File.php'>File</a></li>
        </ul>";
}
		?>
         <?php
	   if($query["ROLE"]=="Teacher")
{
       echo "<h3>Management</h3>
        <ul class='toggle'>
            <li class='icn_edit_article'><a href='UploadCourseMatarial.php'>Upload Matarial</a></li>
            <li class='icn_categories'><a href='UploadStatus.php'>View Content</a></li>
        </ul>";
}
		?>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2012 Anik Islam</strong></p>
			
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		
		
		
		<!-- end of messages article -->
		
		<div class="clear"></div>
		
		<!-- end of post new article -->
		
		<span id="error"></span>
		<article class="module width_full">
			<header>
            <table  style="width:100%;">
            <tr>
            <td>
            <?php
			 $data=oci_parse($conn,"select * from exam where ExamId=$exam");
			 oci_execute($data);
				$row=oci_fetch_array($data,OCI_ASSOC+OCI_RETURN_NULLS);
				
           echo "<span style='float:left'><h3>Exam Type : ". $row["EXAMTYPE"]." </h3></span></td><td> <span style='float:center'><h3>Total Mark :  ". $row["EXAMMARK"]." </h3></span></td>";
		   echo "<input type='hidden' id='duration'    value='".$row["EXAMDURATION"]."'  />";
		  // echo "<input type='hidden' id='duration'    value='00:01:00'  />";
			?>
           <td> <span style='float:right'><h3>Your Time Remaining : <span id="time"></span></h3></span>
		   </td>
            </tr>
            </table>
            </header>
            <form name="qa" action="CheckAns.php" method="post" >
			<div class="module_content">
            
			<ol>
            <?php
			$id=1;
			
			
			$cdata=oci_parse($conn,"select count(*) as G from question where ExamId=$exam");
			oci_execute($cdata);
			$cdata=oci_fetch_array($cdata);
			//$ques=mysql_num_rows($data);
			$data=oci_parse($conn,"select * from question where ExamId=$exam");
			oci_execute($data);
			echo "<input type='hidden' name='ques' value='".$cdata["G"]."'/>";
			echo "<input type='hidden' name='examid' value='$exam'/>";
				while($row=oci_fetch_array($data,OCI_ASSOC+OCI_RETURN_NULLS)){
               
					echo "<li><h2>".$row["QUESTION"]."</h2></li><fieldset>
                 <table  style='width:100%'>
                 <tr>";
					$data1=oci_parse($conn,"select * from questionoption where QuestionId=".$row["QUESTIONID"]);
					oci_execute($data1);
					while($row1=oci_fetch_array($data1,OCI_ASSOC+OCI_RETURN_NULLS))
					{
						echo "<td><input type='radio' name='op".$id."' value='".$row["QUESTIONID"]."#".$row1["OPTIONNAME"]."' >".$row1["OPTIONNAME"]."</td>";
						}
						$id++;
				echo "</tr></table></fieldset>";
				}
			  // echo "<input type='hidden' id='duration'    value='".$row["ExamDuration"]."'  />";
            ?>
            
                   </ol>
            
				<div class="clear"></div>
			</div>
            <footer>
				<div class="submit_link">
					
					<input type="submit" onClick="return confirm('Are you sure you want to do that?');" value="Submit"  class="alt_btn" />
					
				</div>
              
			</footer>
              </form>
		</article>
		<div class="spacer"></div>
	</section>

</body>

</html>