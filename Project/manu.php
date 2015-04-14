CourseDetails.php?CourseId=1;
UserDetails.php?ProfileId=1;
<li class="icn_folder"><a href="InboxMessage.php">Inbox<?php $count=mysql_query("select * from message where ToUser='".$_SESSION["user"]."' and Flag='Close'");$count=mysql_num_rows($count); if($count>=1) echo " <span style='color:#FF0000;'>[ ".$count." ]</span>"; ?></a></li>

date("Y-m-d H:i:s")

CreateProblem.php
CreateCategory.php
CreateContest.php
ProblemList
contesthome
ProblemRankList.php
CreateContestProblem.php
ContestStatus.php
ProblemStatus.php
ContestRankList.php
ContestList.php
MyContestList.php
ViewBlog.php
CreateBlog.php
BlogStatus.php

CreateNotice.php
NoticeStatus.php
UpdateNotice.php

MyMarkStatus.php
HelpAdmin.php
QuesStatus.php
AssignAcm.php
UpdateCourse.php