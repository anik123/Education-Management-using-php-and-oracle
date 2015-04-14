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
			$data=mysql_query("select * from user where VersityId='".$_SESSION["user"]."'");
			$data=mysql_fetch_array($data);
			echo " ".$data["FirstName"]." ".$data["LastName"]."</h2>";
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
		
		<span id="error"></span>
		<article class="module width_list_quarter">
      		<header><h3 class="tabs_involved">Blog List</h3>
		<!-- <ul class="tabs">
   			<li><a href="#tab1">Posts</a></li>
    		<li><a href="#tab2">Comments</a></li>
		</ul>-->
		</header>

		<div class="tab_container">

			<div id="tab1" class="tab_content">
           
			 <?php
			 $Bdata=mysql_query("select * from blog ");
			 while($row=mysql_fetch_array($Bdata))
			 { 
			    
			     echo "<center><fieldset style='width:90%;'><center><div style='width:90%'>
				<h1><i><u>".$row["BlogName"]."</u></i></h1><br>
				<font style='font-size:18px;color:#000;font-family:Calibri;'> ".substr($row["Description"],0,300)." ..... </font><br><h1><i><u><a href='ViewBlog.php?BlogId=".$row["BlogId"]."'>View -> </a>
				 </div></center></fieldset></u></i></h1></center>";				 
				 }
			 ?>
			</div><!-- end of #tab1 -->
		</div>
			
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>