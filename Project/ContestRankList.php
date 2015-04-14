<?php
define("SECONDS_PER_HOUR", 60*60);
include("connection.php");
   session_start();
  if(!isset($_SESSION["user"]))
         header("Location: http://localhost/myProject/munni/index.php");
else{	
		
		 

	   if(isset($_GET["ContestId"]))
	      $ContestId=$_GET["ContestId"];
}
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
			
	<hr/>
        <h3>Home</h3>
        <ul class="toggle">
           <li class="icn_tags"><a href="AcmHome.php">Home</a></li>
        </ul>
        
        <h3>Contest</h3>
        <ul class="toggle">
           
           <li class="icn_tags"><a href="<?php echo "ContestHome.php?ContestId=".$ContestId; ?>">Contest Home</a></li>
           <li class="icn_tags"><a href="<?php echo "ContestStatus.php?ContestId=".$ContestId; ?>">Contest Status</a></li>
          <li class="icn_tags"><a href="<?php echo "ContestRankList.php?ContestId=".$ContestId; ?>">Contest Rank List </a></li>
         
           
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
   					<th><center>Rank</center></th>
    				<th><center>Solver Name</center></th> 
    				<th><center>Accepted</center></th> 
    				<th><center>Wrong Answer</center></th> 
    				
				</tr> 
			</thead> 

             <?php
			$i=1;
				$value=mysql_query("select u.FirstName FirstName,u.LastName LastName,u.UserId UserId,cr.Tried Tried ,cr.Accepted Accepted  from user u,contestrank cr where u.VersityId=cr.VersityId and ContestId=".$ContestId." order by cr.Accepted desc");
				while($row=mysql_fetch_array($value)){
					
				    echo "<tr><td><center>".$i++."</center></td><td><center><h3><a href='UserDetails.php?ProfileId=".$row["UserId"]."'>".$row["FirstName"]." ".$row["LastName"]."</a></h3</center></td>";
					echo "<td><center>".$row["Accepted"]."</center></td>";
					echo "<td><center>".$row["Tried"]."</center></td>";
					
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