<?php
include("connection.php");
   session_start();
 if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
		
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Online Education System</title>
	
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

	function status(code)
	{
		var http=new XMLHttpRequest();
		http.open("GET","ChangeStatus.php?courseid="+code,false);
		http.send();
		document.getElementById("error").innerHTML=http.responseText;
		//alert(code);
	}
	function Delete(v)
	{
		var http=new XMLHttpRequest();
		http.open("GET","DeleteCourse.php?courseid="+v,false);
		http.send();
		document.getElementById("error").innerHTML=http.responseText;
		}
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title">Welcome
             <?php
			$data=oci_parse($conn,"select * from userinfo where VersityId='".$_SESSION["user"]."'");
			oci_execute($data);
			
			$data=oci_fetch_array($data,OCI_ASSOC+OCI_RETURN_NULLS);
			echo " ".$data["FIRSTNAME"]." ".$data["LASTNAME"]."</h2>";
			?></h1>
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
if($data["ROLE"]=="Admin")
{
	echo "<li class='icn_new_article'><a href='CreateCourse.php'>Create Course</a></li>";
	}
?>
           
           <li class="icn_edit_article"><a href="CourseStatus.php">View Course List</a></li>
           <?php
if($data["ROLE"]=="Admin")
{
	echo "<li class='icn_view_users'><a href='AssignTeacher.php'>Assign To Teacher</a></li>
			<li class='icn_view_users'><a href='AssignStudent.php'>Assign To Student</a></li>";
	}
?>
           
            
        </ul>
		 <h3>Message</h3>
         <ul class="toggle">
          <li class="icn_edit_article"><a href="ComposeMessage.php">Compose Message</a></li>
            <li class="icn_folder"><a href="InboxMessage.php">Inbox<?php
			 $count=oci_parse($conn,"select * from message where ToUser='".$_SESSION["user"]."' and Flag='Close'");
			 oci_execute($count);
			 $count=oci_num_rows($count); 
			 if($count>=1) 
			    echo " <span style='color:#FF0000;'>[ ".$count." ]</span>"; 
				
				?></a></li>
             <li class="icn_folder"><a href="HelpAdmin.php">Help Admin</a></li>
         </ul>
        
         <?php
		 
if($data["ROLE"]=="Teacher")
{
	echo " <h3>Exam</h3>
        <ul class='toggle'><li class='icn_edit_article'><a href='CreateExam.php'>Create Exam</a></li>
            <li class='icn_categories'><a href='ExamStatus.php'>Exam Status</a></li>
            <li class='icn_edit_article'><a href='CreateQues.php'>Create Question</a></li>";
}
if($data["ROLE"]=="user")
   echo "<h3>Exam</h3>
        <ul class='toggle'>";
if($data["ROLE"]=="Teacher" || $data["ROLE"]=="user")
  echo "<li class='icn_settings'><a href='CurrentExam.php'>Current Exam</a></li>";
if($data["ROLE"]=="user")
   echo "</ul>";
?>
        
            
            <?php
if($data["ROLE"]=="Teacher")
{
	echo "<li class='icn_security'><a href='MarkStatus.php'>Mark Status</a></li></ul>";
	}
?>
        <h3>User Panel</h3>
        <ul class="toggle">
         <?php
if($data["ROLE"]=="Admin")
{
	echo "<li class='icn_edit_article'><a href='CreateUser.php'>Create User</a></li>";
	echo "<li class='icn_edit_article'><a href='UserList.php'>Change User</a></li>";
	}
?>
        
            <li class="icn_add_user"><a href="UpdateUser.php">Update User</a></li>
            <?php
			
            echo "<li class='icn_profile'><a href='UserDetails.php?ProfileId=".$data["USERID"]."'>Profile</a></li>";
        ?>
		</ul>
        
         <?php
if($data["ROLE"]=="Admin")
{
	echo "<h3>Admin Panel</h3>
        <ul class='toggle'><li class='icn_categories'><a href='BelowMark.php'>Analize Mark</a></li>
	<li class='icn_security'><a href='GradeClose.php'>Close Grade</a></li></ul>";
}
else if($data["ROLE"]=="Teacher")
   echo " <h3>Admin Panel</h3>
        <ul class='toggle'><li class='icn_security'><a href='CourseClose.php'>Close Course</a></li> </ul>";
?>
         
           
            
       <?php
	   if($data["ROLE"]=="user")
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
	   if($data["ROLE"]=="Teacher")
{
       echo "<h3>Management</h3>
        <ul class='toggle'>
            <li class='icn_edit_article'><a href='UploadCourseMatarial.php'>Upload Matarial</a></li>
            <li class='icn_categories'><a href='UploadStatus.php'>View Content</a></li>
        </ul>";
}
if($data["ROLE"]=="Admin")
   echo "<h3>Notice</h3>
        <ul class='toggle'>
            <li class='icn_edit_article'><a href='CreateNotice.php'>Create Notice</a></li>
            <li class='icn_categories'><a href='NoticeStatus.php'>View Notice</a></li>
        </ul>
		";
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
		<article class="module width_list_quarter">
      		<header><h3 class="tabs_involved">Course List</h3>
		<!-- <ul class="tabs">
   			<li><a href="#tab1">Posts</a></li>
    		<li><a href="#tab2">Comments</a></li>
		</ul>-->
		</header>

		<div class="tab_container">

			<div id="tab1" class="tab_content">
           
			<table  class="tablesorter" > 
			<thead> 
				<tr> 
   					
    				<th><center>Course Code</center></th> 
    				<th><center>Course Name</center></th> 
    				<th><center>Created On</center></th> 
    				<th><center>Course Status</center></th> 
                   
                    <th><center>Current Student</center></th>
                    <th><center>Maximum Student</center></th>
                    <?php
                    if($data["ROLE"]=="Admin")
					echo "<th><center>Action</center></th>";
					?>
				</tr> 
			</thead> 
			<tbody>
            <?php
			
			
			if($data["ROLE"]=="Teacher")
			{
				$query=oci_parse($conn,"select * from teacher_courselist_view where  VersityId='".$_SESSION["user"]."'") or die(oci_error());
				}
			else if($data["ROLE"]=="Admin")
			$query=oci_parse($conn,"select c.CourseId CourseId, c.CourseCode CourseCode,c.CourseName CourseName,c.CreatedDate CreatedDate,c.CourseStatus CourseStatus,c.MaxStudent MaxStudent  from course c") or die(oci_error());
			else
			{
				$query=oci_parse($conn,"select * from student_courselist_view where VersityId='".$_SESSION["user"]."'") or die(oci_error());
			}
			oci_execute($query);
			while($row=oci_fetch_array($query,OCI_ASSOC+OCI_RETURN_NULLS))
					{
						$query1=oci_parse($conn,"select count(VersityId) value from assignstudent where CourseCode='".$row["COURSECODE"]."'");
						oci_execute($query1);
						$query1=oci_fetch_array($query1,OCI_ASSOC+OCI_RETURN_NULLS);
						echo "<tr><td><center>".$row["COURSECODE"]."</center></td>";
						echo "<td><center><a href='CourseDetails.php?CourseId=".$row["COURSEID"]."'>".$row["COURSENAME"]."</a></center></td>";
						echo "<td><center>".$row["CREATEDDATE"]."</center></td>";
						echo "<td><center>".$row["COURSESTATUS"]."</center></td>";
						//echo "<td><center><a href='UserDetails.php?ProfileId=".$row["USERID"]."'>".$row["FullName"]."</a></center></td>";
						echo "<td><center>".$query1["VALUE"]."</center></td>";
						echo "<td><center>".$row["MAXSTUDENT"]."</center></td>";
						if($data["ROLE"]=="Admin"){
						
						    echo "<td><center>[ <a href='UpdateCourse.php?CourseId=".$row["COURSEID"]."'>Edit</a> ] [ <a href='#' onClick='Delete(".$row["COURSEID"].")' >Delete</a> ]</center></td></tr>";
						
						}
						
						}
				
					?>
				
						</tbody> 
			</table>
			</div><!-- end of #tab1 -->
		</div>
			
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>