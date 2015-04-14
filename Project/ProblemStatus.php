<?php
define("SECONDS_PER_HOUR", 60*60);
include("connection.php");
   session_start();
  if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
/*else{	
		
		 if(isset($_GET["CourseId"]))
		 {
			 $CourseId=$_GET["CourseId"];
			 }
}*/
  //     $_SESSION["user"]="10-15391-1";
	  
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Keep Solving</title>
	
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
			<h2 class="section_title">Home Page</h2>
            <div class="btn_view_site">
            <a href="LogOut.php">Log out</a>
            
            </div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
			
		<?php
		$acmdata=mysql_query("select * from assignacm where VersityId='".$_SESSION["user"]."'");
		$acmdata=mysql_fetch_array($acmdata);
		?>
		<hr/>
        <h3>Home</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="AcmHome.php">Home</a></li>
        </ul>
        <?php
		if($acmdata["Role"]=="Admin") { 
		echo "<h3>Admin Panel</h3>
        <ul class='toggle'>
           <li class='icn_tags'><a href='CreateProblem.php'>Create Problem</a></li>
           <li class='icn_tags'><a href='CreateCategory.php'>Create Category</a></li>";
		}
		   ?>
        </ul>
        <h3>Problem</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="ProblemList.php">Problem List</a></li>
           <li class="icn_tags"><a href="ProblemRankList.php">Problem RankList</a></li>
           <li class="icn_tags"><a href="ProblemStatus.php">Problem Status </a></li>
        </ul>
         <h3>Blog</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="CreateBlog.php">Create Blog</a></li>
           <li class="icn_tags"><a href="BlogStatus.php">Blog Status</a></li>
           <li class="icn_tags"><a href="MyBlogStatus.php">My Blog </a></li>
        </ul>
      <h3>Contest</h3>
        <ul class="toggle">
           
           <li class="icn_tags"><a href="CreateContest.php">Create Contest</a></li>
           <li class="icn_tags"><a href="CreateContestProblem.php">Create Contest Problem</a></li>
          <li class="icn_tags"><a href="MyContestList.php">My Contest List</a></li>
           <li class="icn_tags"><a href="ContestList.php">Contest List</a></li>
           
      </ul>
		 <h3>Switch</h3>
      <ul class="toggle">
           
           <li class="icn_tags"><a href="Home.php">Back</a></li>
         
           
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
		
		<div class="clear"></div>
		<article class="module width_3_quarter">
			<header>
            </header>
				<div class="tab_container">

			<div id="tab1" class="tab_content">
               
                <table style="width:100%"  class="tablesorter" > 
                <thead> 
				<tr> 
   					
    				<th><center>Problem Name</center></th> 
    				<th><center>Answer</center></th> 
    				<th><center>Submit By</center></th> 
    				
				</tr> 
			</thead> 

             <?php
			 
			 				
				$value=mysql_query("select cp.ProblemId ProblemId,cp.ProblemName ProblemName,cs.Answer Answer,u.FirstName FirstName,u.LastName LastName from submit cs,problem cp,user u where u.VersityId=cs.SubmitBy and cp.ProblemId=cs.ProblemId order by cs.SubmitId desc") or die(mysql_error());
				while($row=mysql_fetch_array($value)){
					
				    echo "<tr><td><center><h3><a href='ViewProblem.php?ProblemId=".$row["ProblemId"]."'>".$row["ProblemName"]."</a></h3</center></td>";
					echo "<td><center>".$row["Answer"]."</center></td>";
					echo "<td><center>".$row["FirstName"]." ".$row["LastName"]."</center></td>";
					
					echo "</tr>";
					
				}
				?>
               
                </tbody>
                </table>
             
				</div>
                </div>
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>