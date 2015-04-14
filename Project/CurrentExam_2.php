<?php
include("connection.php");
   session_start();
 if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
		 
		
		 $user=mysql_query("select * from user where VersityId='".$_SESSION["user"]."'"); 
		 $user=mysql_fetch_array($user);
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

	function status(code)
	{
		var http=new XMLHttpRequest();
		http.open("GET","ChangeStatus.php?courseid="+code,false);
		http.send();
		document.getElementById("error").innerHTML=http.responseText;
		//alert(code);
		}
	
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title">Welcome
             <?php
			$query=mysql_query("select * from user where VersityId='".$_SESSION["user"]."'");
			$query=mysql_fetch_array($query);
			echo " ".$query["FirstName"]." ".$query["LastName"]."</h2>";
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
		<form class="quick_search">
			<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		       <h3>Course</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="CreateCourse.php">Create Course</a></li>
			<li class="icn_edit_article"><a href="CourseStatus.php">View Course List</a></li>
			<li class="icn_categories"><a href="AssignTeacher.php">Assign To Teacher</a></li>
			<li class="icn_tags"><a href="AssignStudent.php">Assign To Student</a></li>
            <li class="icn_folder"><a href="UploadCourseMatarial.php">Upload Matarial</a></li>
            <li class="icn_folder"><a href="UploadStatus.php">View Content</a></li>
            <li class="icn_folder"><a href="CreateExam.php">Create Exam</a></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Add New User</a></li>
			<li class="icn_view_users"><a href="#">View Users</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Help</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul>
		
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
    				<th><center>Exam Type</center></th> 
    				<th><center>Exam Date</center></th> 
                    <th><center>Exam Duration</center></th> 
                    <th><center>Exam Mark</center></th>
                    <th><center>Exam Total Question</center></th>
                    
                    <?php
					if($user["Role"]=="Teacher")
					   echo "<th></th>";
					?>
				</tr> 
			</thead> 
			<tbody>
            <?php
			if($user["Role"]=="user")
			    $query=mysql_query("select c.CourseCode CourseCode,c.CourseName CourseName,e.ExamType ExamType,e.ExamDate ExamDate,e.ExamId ExamId,e.ExamDuration ExamDuration,e.ExamMark ExamMark,e.ExamTotalQuestion ExamTotalQuestion,e.ExamStatus ExamStatus  from exam e,course c,assignstudent a where c.CourseCode=a.CourseCode and e.CourseCode=a.CourseCode and a.VersityId='".$user["VersityId"]."' and e.ExamDate ='".date("Y-m-d")."'");
			else if($user["Role"]=="Teacher")
			    $query=mysql_query("select c.CourseCode CourseCode,c.CourseName CourseName,e.ExamType ExamType,e.ExamDate ExamDate,e.ExamId ExamId,e.ExamDuration ExamDuration,e.ExamMark ExamMark,e.ExamTotalQuestion ExamTotalQuestion,e.ExamStatus ExamStatus from exam e,course c,assignteacher a where c.CourseCode=a.CourseCode and a.CourseCode=e.CourseCode and a.VersityId='".$user["VersityId"]."' and e.ExamDate ='".date("Y-m-d")."'");
			
			while($row=mysql_fetch_array($query))
					{
						echo "<tr><td><center>".$row["CourseCode"]."</center></td>";
						echo "<td><center>".$row["CourseName"]."</center></td>";
						if($user["Role"]=="user" && $row["ExamStatus"]=="Open")
						             echo "<td><center><a href='ExamStart.php?ExamId=".$row["ExamId"]."' >".$row["ExamType"]."</a></center></td>";
						else 
						  echo "<td><center>".$row["ExamType"]."</center></td>";
						echo "<td><center>".$row["ExamDate"]."</center></td>";
						echo "<td><center>".$row["ExamDuration"]."</center></td>";
						echo "<td><center>".$row["ExamMark"]."</center></td>";
						echo "<td><center>".$row["ExamTotalQuestion"]."</center></td>";
						if($user["Role"]=="Teacher"){
						if($row["ExamStatus"]=="Close")
						    echo "<td><center><form onsubmit='return false;'><input type='submit' onclick='status(".$row["ExamId"].")' value='Open' /></form></center></td></tr>";
						else if($row["ExamStatus"]=="Open")
						    echo "<td><center> <form onSubmit='return false;'><input type='submit' onclick='status(".$row["ExamId"].")' value='Close' /></form></center></td></tr>";
						}
						else
						    echo "</tr>";
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