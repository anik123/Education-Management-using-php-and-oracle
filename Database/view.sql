--------------------------------------------------------
--  File created - Thursday-December-27-2012   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for View GET_BELOW_MARK
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."GET_BELOW_MARK" ("VERSITYID", "OBTAINEDMARK", "COURSECODE", "EXAMTYPE", "EXAMDATE", "EXAMMARK", "EXAMDURATION", "CREATEDBY") AS 
  select m.VersityId VersityId,m.ObtainedMark ObtainedMark,e.CourseCode CourseCode,e.ExamType ExamType,e.ExamDate ExamDate,e.ExamMark ExamMark,e.ExamDuration ExamDuration,e.CreatedBy CreatedBy from mark m , exam e where e.ExamId=m.ExamId;
--------------------------------------------------------
--  DDL for View STUDENT_COURSELIST_VIEW
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."STUDENT_COURSELIST_VIEW" ("COURSEID", "COURSECODE", "COURSENAME", "CREATEDDATE", "COURSESTATUS", "MAXSTUDENT", "FULLNAME", "USERID", "VERSITYID") AS 
  select c.CourseId CourseId, c.CourseCode CourseCode,c.CourseName CourseName,c.CreatedDate CreatedDate,c.CourseStatus CourseStatus,c.MaxStudent MaxStudent ,u.FirstName || ' ' || u.LastName FullName,u.USERID USERID,u.VersityId VersityId   from course c,assignstudent a,userinfo u where c.CourseCode=a.CourseCode and u.VersityId=a.VersityId;
--------------------------------------------------------
--  DDL for View VIEW_NOTICE
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."VIEW_NOTICE" ("NOTICEID", "DESCRIPTION", "CREATEDDATE", "FIRSTNAME", "LASTNAME", "USERID") AS 
  select n.NoticeId NoticeId,n.Description Description,n.CreatedDate CreatedDate,u.FIRSTNAME FIRSTNAME,u.LASTNAME LASTNAME,u.UserId UserId from notice n , userinfo u where u.VersityId=n.CreatedBy;
--------------------------------------------------------
--  DDL for View TEACHER_COURSELIST_VIEW
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."TEACHER_COURSELIST_VIEW" ("COURSEID", "COURSECODE", "COURSENAME", "CREATEDDATE", "COURSESTATUS", "MAXSTUDENT", "FULLNAME", "USERID", "VERSITYID") AS 
  select c.CourseId CourseId, c.CourseCode CourseCode,c.CourseName CourseName,c.CreatedDate CreatedDate,c.CourseStatus CourseStatus,c.MaxStudent MaxStudent , u.FirstName || ' ' || u.LastName FullName,u.USERID USERID,u.VersityId VersityId  from course c,assignteacher a,userinfo u where c.CourseCode=a.CourseCode and u.VersityId=a.VersityId;
--------------------------------------------------------
--  DDL for View VIEW_STUDENT_EXAMLIST
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."VIEW_STUDENT_EXAMLIST" ("VERSITYID", "COURSECODE", "COURSENAME", "EXAMTYPE", "EXAMDATE", "EXAMID", "EXAMDURATION", "EXAMMARK", "EXAMTOTALQUESTION", "EXAMSTATUS") AS 
  select a.versityId VERSITYID,c.CourseCode CourseCode,c.CourseName CourseName,e.ExamType ExamType,e.ExamDate ExamDate,e.ExamId ExamId,e.ExamDuration ExamDuration,e.ExamMark ExamMark,e.ExamTotalQuestion ExamTotalQuestion,e.ExamStatus ExamStatus  from exam e,course c,assignstudent a where c.CourseCode=a.CourseCode and e.CourseCode=a.CourseCode;
--------------------------------------------------------
--  DDL for View VIEW_STUDENT_MARK
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."VIEW_STUDENT_MARK" ("COURSECODE", "CREATEDBY", "EXAMID", "EXAMTYPE", "EXAMDATE", "EXAMMARK", "EXAMDURATION", "RIGHTANSWER", "OBTAINEDMARK") AS 
  select e.coursecode coursecode,e.createdby createdby,e.ExamId ExamId,e.ExamType ExamType,e.ExamDate ExamDate ,e.ExamMark ExamMark,e.ExamDuration ExamDuration,ex.RightAnswer RightAnswer,ex.ObtainedMark ObtainedMark from exam e,mark ex where e.ExamId=ex.ExamId;
--------------------------------------------------------
--  DDL for View VIEW_TEACHER_EXAMLIST_ALL
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."VIEW_TEACHER_EXAMLIST_ALL" ("VERSITYID", "COURSECODE", "COURSENAME", "EXAMID", "EXAMTYPE", "EXAMMARK", "EXAMDURATION", "EXAMTOTALQUESTION", "EXAMDATE") AS 
  select a.VersityId VersityId , c.CourseCode CourseCode,c.CourseName CourseName,e.ExamId ExamId,e.ExamType ExamType,e.ExamMark ExamMark,e.ExamDuration ExamDuration,e.ExamTotalQuestion ExamTotalQuestion,e.ExamDate ExamDate from assignteacher a ,course c,exam e where e.CourseCode=c.CourseCode and c.CourseCode=a.CourseCode;
--------------------------------------------------------
--  DDL for View VIEW_TEACHER_EXAMLIST_P_PAST
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."VIEW_TEACHER_EXAMLIST_P_PAST" ("COURSECODE", "COURSENAME", "EXAMID", "EXAMTYPE", "EXAMMARK", "EXAMDURATION", "EXAMTOTALQUESTION", "EXAMDATE") AS 
  select c.CourseCode CourseCode,c.CourseName CourseName,e.ExamId ExamId,e.ExamType ExamType,e.ExamMark ExamMark,e.ExamDuration ExamDuration,e.ExamTotalQuestion ExamTotalQuestion,e.ExamDate ExamDate from course c,exam e where e.CourseCode=c.CourseCode ;
--------------------------------------------------------
--  DDL for View VIEW_TEACHER_MARK
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."VIEW_TEACHER_MARK" ("COURSECODE", "CREATEDBY", "VERSITYID", "FIRSTNAME", "LASTNAME", "EXAMID", "EXAMTYPE", "EXAMDATE", "EXAMMARK", "EXAMDURATION", "RIGHTANSWER", "OBTAINEDMARK") AS 
  select e.coursecode coursecode,e.createdby createdby,u.VersityId VersityId,u.FirstName FirstName,u.LastName LastName,e.ExamId ExamId,e.ExamType ExamType,e.ExamDate ExamDate ,e.ExamMark ExamMark,e.ExamDuration ExamDuration,ex.RightAnswer RightAnswer,ex.ObtainedMark ObtainedMark from exam e,mark ex,userinfo u where e.ExamId=ex.ExamId and  u.VersityId=ex.VersityId;
--------------------------------------------------------
--  DDL for View VIEW_UPLOADLIST
--------------------------------------------------------

  CREATE OR REPLACE FORCE VIEW "HR"."VIEW_UPLOADLIST" ("VERSITYID", "COURSEID", "COURSECODE", "COURSENAME", "CREATEDDATE", "COURSESTATUS", "MAXSTUDENT", "FULLNAME", "UPLOADID", "UPLOADFILE", "UPLOADTYPE", "UPLOADDATE") AS 
  select a.VersityId versityid,c.CourseId CourseId, c.CourseCode CourseCode,c.CourseName CourseName,c.CreatedDate CreatedDate,c.CourseStatus CourseStatus,c.MaxStudent MaxStudent , u.FirstName || ' ' || u.LastName FullName,up.UploadId UploadId,up.UploadFile UploadFile,up.UploadType UploadType,up.UploadDate  UploadDate  from course c,assignteacher a,userinfo u,upload up  where c.CourseCode=a.CourseCode and u.VersityId=a.VersityId and c.CourseCode=up.CourseCode ;
REM INSERTING into HR.GET_BELOW_MARK
SET DEFINE OFF;
Insert into HR.GET_BELOW_MARK (VERSITYID,OBTAINEDMARK,COURSECODE,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,CREATEDBY) values ('10-153261',15,'CSE 101','1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00','10-15391-1');
Insert into HR.GET_BELOW_MARK (VERSITYID,OBTAINEDMARK,COURSECODE,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,CREATEDBY) values ('10-15390-1',32,'CSE 101','1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00','10-15391-1');
Insert into HR.GET_BELOW_MARK (VERSITYID,OBTAINEDMARK,COURSECODE,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,CREATEDBY) values ('10-15300-1',24,'CSE 101','1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00','10-15391-1');
REM INSERTING into HR.STUDENT_COURSELIST_VIEW
SET DEFINE OFF;
Insert into HR.STUDENT_COURSELIST_VIEW (COURSEID,COURSECODE,COURSENAME,CREATEDDATE,COURSESTATUS,MAXSTUDENT,FULLNAME,USERID,VERSITYID) values (1,'CSE 101','Computer Fundamental',to_date('19-DEC-12','DD-MON-RR'),'Close',40,'Zubair Rafat',7,'10-15390-1');
Insert into HR.STUDENT_COURSELIST_VIEW (COURSEID,COURSECODE,COURSENAME,CREATEDDATE,COURSESTATUS,MAXSTUDENT,FULLNAME,USERID,VERSITYID) values (1,'CSE 101','Computer Fundamental',to_date('19-DEC-12','DD-MON-RR'),'Close',40,'Mohit Chandra',11,'10-15300-1');
REM INSERTING into HR.VIEW_NOTICE
SET DEFINE OFF;
Insert into HR.VIEW_NOTICE (NOTICEID,DESCRIPTION,CREATEDDATE,FIRSTNAME,LASTNAME,USERID) values (1,'Bangladesh Will Win Game in Pakistan . Bangladesh played good .',to_date('24-DEC-12','DD-MON-RR'),'Arifa','Nisha',6);
Insert into HR.VIEW_NOTICE (NOTICEID,DESCRIPTION,CREATEDDATE,FIRSTNAME,LASTNAME,USERID) values (3,'final day of project. we are gonno submit it .                        ',to_date('12-DEC-27','DD-MON-RR'),'Arifa','Nisha',6);
Insert into HR.VIEW_NOTICE (NOTICEID,DESCRIPTION,CREATEDDATE,FIRSTNAME,LASTNAME,USERID) values (2,'final day of project',to_date('27-DEC-12','DD-MON-RR'),'Arifa','Nisha',6);
REM INSERTING into HR.TEACHER_COURSELIST_VIEW
SET DEFINE OFF;
Insert into HR.TEACHER_COURSELIST_VIEW (COURSEID,COURSECODE,COURSENAME,CREATEDDATE,COURSESTATUS,MAXSTUDENT,FULLNAME,USERID,VERSITYID) values (1,'CSE 101','Computer Fundamental',to_date('19-DEC-12','DD-MON-RR'),'Close',40,'Anik Islam',5,'10-15391-1');
REM INSERTING into HR.VIEW_STUDENT_EXAMLIST
SET DEFINE OFF;
Insert into HR.VIEW_STUDENT_EXAMLIST (VERSITYID,COURSECODE,COURSENAME,EXAMTYPE,EXAMDATE,EXAMID,EXAMDURATION,EXAMMARK,EXAMTOTALQUESTION,EXAMSTATUS) values ('10-15390-1','CSE 101','Computer Fundamental','1st Quiz',to_date('26-DEC-12','DD-MON-RR'),1,'01:25:00',40,5,'Open');
Insert into HR.VIEW_STUDENT_EXAMLIST (VERSITYID,COURSECODE,COURSENAME,EXAMTYPE,EXAMDATE,EXAMID,EXAMDURATION,EXAMMARK,EXAMTOTALQUESTION,EXAMSTATUS) values ('10-15300-1','CSE 101','Computer Fundamental','1st Quiz',to_date('26-DEC-12','DD-MON-RR'),1,'01:25:00',40,5,'Open');
REM INSERTING into HR.VIEW_STUDENT_MARK
SET DEFINE OFF;
Insert into HR.VIEW_STUDENT_MARK (COURSECODE,CREATEDBY,EXAMID,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,RIGHTANSWER,OBTAINEDMARK) values ('CSE 101','10-15391-1',1,'1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00',4,15);
Insert into HR.VIEW_STUDENT_MARK (COURSECODE,CREATEDBY,EXAMID,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,RIGHTANSWER,OBTAINEDMARK) values ('CSE 101','10-15391-1',1,'1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00',4,32);
Insert into HR.VIEW_STUDENT_MARK (COURSECODE,CREATEDBY,EXAMID,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,RIGHTANSWER,OBTAINEDMARK) values ('CSE 101','10-15391-1',1,'1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00',3,24);
REM INSERTING into HR.VIEW_TEACHER_EXAMLIST_ALL
SET DEFINE OFF;
Insert into HR.VIEW_TEACHER_EXAMLIST_ALL (VERSITYID,COURSECODE,COURSENAME,EXAMID,EXAMTYPE,EXAMMARK,EXAMDURATION,EXAMTOTALQUESTION,EXAMDATE) values ('10-15391-1','CSE 101','Computer Fundamental',1,'1st Quiz',40,'01:25:00',5,to_date('26-DEC-12','DD-MON-RR'));
REM INSERTING into HR.VIEW_TEACHER_EXAMLIST_P_PAST
SET DEFINE OFF;
Insert into HR.VIEW_TEACHER_EXAMLIST_P_PAST (COURSECODE,COURSENAME,EXAMID,EXAMTYPE,EXAMMARK,EXAMDURATION,EXAMTOTALQUESTION,EXAMDATE) values ('CSE 101','Computer Fundamental',1,'1st Quiz',40,'01:25:00',5,to_date('26-DEC-12','DD-MON-RR'));
REM INSERTING into HR.VIEW_TEACHER_MARK
SET DEFINE OFF;
Insert into HR.VIEW_TEACHER_MARK (COURSECODE,CREATEDBY,VERSITYID,FIRSTNAME,LASTNAME,EXAMID,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,RIGHTANSWER,OBTAINEDMARK) values ('CSE 101','10-15391-1','10-15390-1','Zubair','Rafat',1,'1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00',4,32);
Insert into HR.VIEW_TEACHER_MARK (COURSECODE,CREATEDBY,VERSITYID,FIRSTNAME,LASTNAME,EXAMID,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,RIGHTANSWER,OBTAINEDMARK) values ('CSE 101','10-15391-1','10-15300-1','Mohit','Chandra',1,'1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00',3,24);
REM INSERTING into HR.VIEW_UPLOADLIST
SET DEFINE OFF;
Insert into HR.VIEW_UPLOADLIST (VERSITYID,COURSEID,COURSECODE,COURSENAME,CREATEDDATE,COURSESTATUS,MAXSTUDENT,FULLNAME,UPLOADID,UPLOADFILE,UPLOADTYPE,UPLOADDATE) values ('10-15391-1',1,'CSE 101','Computer Fundamental',to_date('19-DEC-12','DD-MON-RR'),'Close',40,'Anik Islam',2,'video.mp4','Video',to_date('25-DEC-12','DD-MON-RR'));
Insert into HR.VIEW_UPLOADLIST (VERSITYID,COURSEID,COURSECODE,COURSENAME,CREATEDDATE,COURSESTATUS,MAXSTUDENT,FULLNAME,UPLOADID,UPLOADFILE,UPLOADTYPE,UPLOADDATE) values ('10-15391-1',1,'CSE 101','Computer Fundamental',to_date('19-DEC-12','DD-MON-RR'),'Close',40,'Anik Islam',4,'REVIEW.doc','File',to_date('25-DEC-12','DD-MON-RR'));
Insert into HR.VIEW_UPLOADLIST (VERSITYID,COURSEID,COURSECODE,COURSENAME,CREATEDDATE,COURSESTATUS,MAXSTUDENT,FULLNAME,UPLOADID,UPLOADFILE,UPLOADTYPE,UPLOADDATE) values ('10-15391-1',1,'CSE 101','Computer Fundamental',to_date('19-DEC-12','DD-MON-RR'),'Close',40,'Anik Islam',1,'Bojhena Se Bojhena - Title Track_Doridro.Com.mp3','Audio',to_date('25-DEC-12','DD-MON-RR'));
