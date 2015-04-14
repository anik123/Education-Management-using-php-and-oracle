--------------------------------------------------------
--  File created - Thursday-December-27-2012   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table FINALMARK
--------------------------------------------------------

  CREATE TABLE "HR"."FINALMARK" 
   (	"FINALMARKID" NUMBER, 
	"COURSECODE" VARCHAR2(201 BYTE), 
	"VERSITYID" VARCHAR2(200 BYTE), 
	"MARK" NUMBER
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FAIL_LOG
--------------------------------------------------------

  CREATE TABLE "HR"."FAIL_LOG" 
   (	"FAILID" NUMBER, 
	"EXAMMARK" NUMBER, 
	"STDUENTID" VARCHAR2(200 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table ASSIGNTEACHER
--------------------------------------------------------

  CREATE TABLE "HR"."ASSIGNTEACHER" 
   (	"ASSIGNID" NUMBER, 
	"COURSECODE" VARCHAR2(200 BYTE), 
	"VERSITYID" VARCHAR2(200 BYTE), 
	"ASSIGNBY" VARCHAR2(200 BYTE), 
	"ASSIGNDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table EXAM
--------------------------------------------------------

  CREATE TABLE "HR"."EXAM" 
   (	"EXAMID" NUMBER, 
	"COURSECODE" VARCHAR2(200 BYTE), 
	"EXAMTYPE" VARCHAR2(200 BYTE), 
	"EXAMDATE" DATE, 
	"EXAMMARK" NUMBER, 
	"EXAMDURATION" VARCHAR2(200 BYTE), 
	"EXAMTOTALQUESTION" NUMBER, 
	"EXAMSTATUS" VARCHAR2(200 BYTE), 
	"CREATEDBY" VARCHAR2(200 BYTE), 
	"CREATEDDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table COURSEEND
--------------------------------------------------------

  CREATE TABLE "HR"."COURSEEND" 
   (	"COURSEENDID" NUMBER, 
	"COURSECODE" VARCHAR2(200 BYTE), 
	"COURSEENDBY" VARCHAR2(200 BYTE), 
	"COURSEENDDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table GRADE
--------------------------------------------------------

  CREATE TABLE "HR"."GRADE" 
   (	"GRADEID" NUMBER, 
	"GRADENAME" VARCHAR2(201 BYTE), 
	"POINT" NUMBER, 
	"HIGHMARK" NUMBER, 
	"LOWMARK" NUMBER
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table CGPA
--------------------------------------------------------

  CREATE TABLE "HR"."CGPA" 
   (	"CGPAID" NUMBER, 
	"VERSITYID" VARCHAR2(200 BYTE), 
	"CGPA" NUMBER, 
	"COURSECOMPLETED" NUMBER
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table ASSIGNSTUDENT
--------------------------------------------------------

  CREATE TABLE "HR"."ASSIGNSTUDENT" 
   (	"ASSIGNID" NUMBER, 
	"COURSECODE" VARCHAR2(200 BYTE), 
	"VERSITYID" VARCHAR2(200 BYTE), 
	"ASSIGNBY" VARCHAR2(200 BYTE), 
	"ASSIGNDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table COURSEINFO_LOG
--------------------------------------------------------

  CREATE TABLE "HR"."COURSEINFO_LOG" 
   (	"USERNAME" VARCHAR2(50 BYTE), 
	"OLD_COURSENAME" VARCHAR2(50 BYTE), 
	"NEW_COURSENAME" VARCHAR2(50 BYTE), 
	"OLD_COURSECODE" VARCHAR2(50 BYTE), 
	"NEW_COURSECODE" VARCHAR2(50 BYTE), 
	"OLD_DESCRIPTION" VARCHAR2(50 BYTE), 
	"NEW_DESCRIPTION" VARCHAR2(50 BYTE), 
	"UPDATEDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table COURSE
--------------------------------------------------------

  CREATE TABLE "HR"."COURSE" 
   (	"COURSEID" NUMBER, 
	"COURSECODE" VARCHAR2(201 BYTE), 
	"COURSENAME" VARCHAR2(201 BYTE), 
	"DESCRIPTION" VARCHAR2(2011 BYTE), 
	"MAXSTUDENT" NUMBER, 
	"COURSESTATUS" VARCHAR2(201 BYTE), 
	"CREATEDBY" VARCHAR2(201 BYTE), 
	"CREATEDDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table FILENUMBER
--------------------------------------------------------

  CREATE TABLE "HR"."FILENUMBER" 
   (	"FILEID" NUMBER, 
	"NUMBEROFFILE" NUMBER, 
	"LASTUPLOAD" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table LOG_USERUPDATE
--------------------------------------------------------

  CREATE TABLE "HR"."LOG_USERUPDATE" 
   (	"USERNAME" VARCHAR2(50 BYTE), 
	"VERSITYID" VARCHAR2(50 BYTE), 
	"PASSWORD" VARCHAR2(50 BYTE), 
	"NEWPASSWORD" VARCHAR2(20 BYTE), 
	"NEWVERSITYID" VARCHAR2(20 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table MARK
--------------------------------------------------------

  CREATE TABLE "HR"."MARK" 
   (	"EXAMID" NUMBER, 
	"VERSITYID" VARCHAR2(201 BYTE), 
	"RIGHTANSWER" NUMBER, 
	"OBTAINEDMARK" NUMBER
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table MESSAGE
--------------------------------------------------------

  CREATE TABLE "HR"."MESSAGE" 
   (	"MESSAGEID" NUMBER, 
	"FROMUSER" VARCHAR2(201 BYTE), 
	"TOUSER" VARCHAR2(201 BYTE), 
	"SUBJECT" VARCHAR2(201 BYTE), 
	"MESSAGE" VARCHAR2(2000 BYTE), 
	"FLAG" VARCHAR2(201 BYTE), 
	"CREATEDDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table NOTICE
--------------------------------------------------------

  CREATE TABLE "HR"."NOTICE" 
   (	"NOTICEID" NUMBER, 
	"DESCRIPTION" VARCHAR2(2000 BYTE), 
	"CREATEDBY" VARCHAR2(201 BYTE), 
	"CREATEDDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table QUESTION
--------------------------------------------------------

  CREATE TABLE "HR"."QUESTION" 
   (	"QUESTIONID" NUMBER, 
	"EXAMID" NUMBER, 
	"QUESTION" VARCHAR2(2000 BYTE), 
	"QUESTIONMARK" NUMBER
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table QUESTIONANSWER
--------------------------------------------------------

  CREATE TABLE "HR"."QUESTIONANSWER" 
   (	"QUESTIONID" NUMBER, 
	"ANSWER" VARCHAR2(2000 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table QUESTIONOPTION
--------------------------------------------------------

  CREATE TABLE "HR"."QUESTIONOPTION" 
   (	"QUESTIONID" NUMBER, 
	"OPTIONNAME" VARCHAR2(2000 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table UPLOAD
--------------------------------------------------------

  CREATE TABLE "HR"."UPLOAD" 
   (	"UPLOADID" NUMBER, 
	"COURSECODE" VARCHAR2(201 BYTE), 
	"UPLOADFILE" VARCHAR2(2011 BYTE), 
	"UPLOADTYPE" VARCHAR2(201 BYTE), 
	"UPLOADBY" VARCHAR2(201 BYTE), 
	"UPLOADDATE" DATE
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table USERINFO
--------------------------------------------------------

  CREATE TABLE "HR"."USERINFO" 
   (	"USERID" NUMBER, 
	"VERSITYID" VARCHAR2(201 BYTE), 
	"PASSWORD" VARCHAR2(201 BYTE), 
	"FIRSTNAME" VARCHAR2(201 BYTE), 
	"LASTNAME" VARCHAR2(201 BYTE), 
	"DOB" DATE, 
	"EMAIL" VARCHAR2(201 BYTE), 
	"PHONENO" VARCHAR2(201 BYTE), 
	"CREATEDBY" VARCHAR2(201 BYTE), 
	"CREATEDDATE" DATE, 
	"ROLE" VARCHAR2(120 BYTE), 
	"ACTIVITY" VARCHAR2(201 BYTE)
   ) PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into HR.FINALMARK
SET DEFINE OFF;
REM INSERTING into HR.FAIL_LOG
SET DEFINE OFF;
Insert into HR.FAIL_LOG (FAILID,EXAMMARK,STDUENTID) values (1,37.5,'10-153261');
REM INSERTING into HR.ASSIGNTEACHER
SET DEFINE OFF;
Insert into HR.ASSIGNTEACHER (ASSIGNID,COURSECODE,VERSITYID,ASSIGNBY,ASSIGNDATE) values (2,'CSE 101','10-15391-1','10-15791-1',to_date('19-DEC-12','DD-MON-RR'));
REM INSERTING into HR.EXAM
SET DEFINE OFF;
Insert into HR.EXAM (EXAMID,COURSECODE,EXAMTYPE,EXAMDATE,EXAMMARK,EXAMDURATION,EXAMTOTALQUESTION,EXAMSTATUS,CREATEDBY,CREATEDDATE) values (1,'CSE 101','1st Quiz',to_date('26-DEC-12','DD-MON-RR'),40,'01:25:00',5,'Open','10-15391-1',to_date('25-DEC-12','DD-MON-RR'));
REM INSERTING into HR.COURSEEND
SET DEFINE OFF;
REM INSERTING into HR.GRADE
SET DEFINE OFF;
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (3,'A-',3.5,89.99,86);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (4,'B+',3.25,85.99,82);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (6,'B-',2.75,77.99,74);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (8,'C',2.25,69.99,66);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (10,'D+',1.75,61.99,58);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (12,'D-',1.25,53.99,50);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (1,'A+',4,100,94);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (2,'A',3.75,93.99,90);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (5,'B',3,81.99,78);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (7,'C+',2.5,73.99,70);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (9,'C-',2,65.99,62);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (11,'D',1.5,57.99,54);
Insert into HR.GRADE (GRADEID,GRADENAME,POINT,HIGHMARK,LOWMARK) values (13,'F',0,49.99,0);
REM INSERTING into HR.CGPA
SET DEFINE OFF;
REM INSERTING into HR.ASSIGNSTUDENT
SET DEFINE OFF;
Insert into HR.ASSIGNSTUDENT (ASSIGNID,COURSECODE,VERSITYID,ASSIGNBY,ASSIGNDATE) values (1,'CSE 101','10-15390-1','10-15791-1',to_date('24-DEC-12','DD-MON-RR'));
Insert into HR.ASSIGNSTUDENT (ASSIGNID,COURSECODE,VERSITYID,ASSIGNBY,ASSIGNDATE) values (2,'CSE 101','10-15300-1','10-15791-1',to_date('25-DEC-12','DD-MON-RR'));
REM INSERTING into HR.COURSEINFO_LOG
SET DEFINE OFF;
REM INSERTING into HR.COURSE
SET DEFINE OFF;
Insert into HR.COURSE (COURSEID,COURSECODE,COURSENAME,DESCRIPTION,MAXSTUDENT,COURSESTATUS,CREATEDBY,CREATEDDATE) values (1,'CSE 101','Computer Fundamental',' In a general way, we can define computing to mean any goal-oriented activity requiring, benefiting from, or creating computers. Thus, computing includes designing and building hardware and software systems for a wide range of purposes; processing, structuring, and managing various kinds of information; doing scientific studies using computers; making computer systems behave intelligently; creating and using communications and entertainment media; finding and gathering information relevant to an',40,'Close','10-15791-1',to_date('19-DEC-12','DD-MON-RR'));
REM INSERTING into HR.FILENUMBER
SET DEFINE OFF;
REM INSERTING into HR.LOG_USERUPDATE
SET DEFINE OFF;
Insert into HR.LOG_USERUPDATE (USERNAME,VERSITYID,PASSWORD,NEWPASSWORD,NEWVERSITYID) values ('HR','10-15491-1','123','123','10-15491-1');
Insert into HR.LOG_USERUPDATE (USERNAME,VERSITYID,PASSWORD,NEWPASSWORD,NEWVERSITYID) values ('HR','10-15491-1','123','1234','10-15491-1');
REM INSERTING into HR.MARK
SET DEFINE OFF;
Insert into HR.MARK (EXAMID,VERSITYID,RIGHTANSWER,OBTAINEDMARK) values (1,'10-153261',4,15);
Insert into HR.MARK (EXAMID,VERSITYID,RIGHTANSWER,OBTAINEDMARK) values (1,'10-15390-1',4,32);
Insert into HR.MARK (EXAMID,VERSITYID,RIGHTANSWER,OBTAINEDMARK) values (1,'10-15300-1',3,24);
REM INSERTING into HR.MESSAGE
SET DEFINE OFF;
Insert into HR.MESSAGE (MESSAGEID,FROMUSER,TOUSER,SUBJECT,MESSAGE,FLAG,CREATEDDATE) values (4,'10-15791-1','10-15791-1','Re : abc','i am not comming','Open',to_date('25-DEC-12','DD-MON-RR'));
Insert into HR.MESSAGE (MESSAGEID,FROMUSER,TOUSER,SUBJECT,MESSAGE,FLAG,CREATEDDATE) values (1,'10-15791-1','10-15391-1','hi','hellow world        ','Close',to_date('24-DEC-12','DD-MON-RR'));
Insert into HR.MESSAGE (MESSAGEID,FROMUSER,TOUSER,SUBJECT,MESSAGE,FLAG,CREATEDDATE) values (2,'10-15791-1','10-15791-1','abc','efg','Open',to_date('24-DEC-12','DD-MON-RR'));
Insert into HR.MESSAGE (MESSAGEID,FROMUSER,TOUSER,SUBJECT,MESSAGE,FLAG,CREATEDDATE) values (5,'10-15391-1','10-15390-1','sadasd','asdasd','Close',to_date('25-DEC-12','DD-MON-RR'));
Insert into HR.MESSAGE (MESSAGEID,FROMUSER,TOUSER,SUBJECT,MESSAGE,FLAG,CREATEDDATE) values (6,'10-15390-1','10-15391-1','hi','hi','Close',to_date('25-DEC-12','DD-MON-RR'));
REM INSERTING into HR.NOTICE
SET DEFINE OFF;
Insert into HR.NOTICE (NOTICEID,DESCRIPTION,CREATEDBY,CREATEDDATE) values (2,'final day of project','10-15791-1',to_date('27-DEC-12','DD-MON-RR'));
Insert into HR.NOTICE (NOTICEID,DESCRIPTION,CREATEDBY,CREATEDDATE) values (3,'final day of project. we are gonno submit it .                        ','10-15791-1',to_date('12-DEC-27','DD-MON-RR'));
Insert into HR.NOTICE (NOTICEID,DESCRIPTION,CREATEDBY,CREATEDDATE) values (1,'Bangladesh Will Win Game in Pakistan . Bangladesh played good .','10-15791-1',to_date('24-DEC-12','DD-MON-RR'));
REM INSERTING into HR.QUESTION
SET DEFINE OFF;
Insert into HR.QUESTION (QUESTIONID,EXAMID,QUESTION,QUESTIONMARK) values (2,1,'Which of the following languages is more suited to a structured program?',2);
Insert into HR.QUESTION (QUESTIONID,EXAMID,QUESTION,QUESTIONMARK) values (3,1,'The brain of any computer system is',2);
Insert into HR.QUESTION (QUESTIONID,EXAMID,QUESTION,QUESTIONMARK) values (4,1,'The binary system uses powers of',2);
Insert into HR.QUESTION (QUESTIONID,EXAMID,QUESTION,QUESTIONMARK) values (5,1,'ASCII stands for',2);
Insert into HR.QUESTION (QUESTIONID,EXAMID,QUESTION,QUESTIONMARK) values (6,1,'The list of coded instructions is called',2);
REM INSERTING into HR.QUESTIONANSWER
SET DEFINE OFF;
Insert into HR.QUESTIONANSWER (QUESTIONID,ANSWER) values (2,'PASCAL');
Insert into HR.QUESTIONANSWER (QUESTIONID,ANSWER) values (3,'CPU');
Insert into HR.QUESTIONANSWER (QUESTIONID,ANSWER) values (4,'2');
Insert into HR.QUESTIONANSWER (QUESTIONID,ANSWER) values (5,'American standard code for information interchange');
Insert into HR.QUESTIONANSWER (QUESTIONID,ANSWER) values (6,'Computer program');
REM INSERTING into HR.QUESTIONOPTION
SET DEFINE OFF;
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (2,'C');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (2,'FORTRAN');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (2,'BASIC');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (2,'PASCAL');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (3,'ALU');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (3,'Memory');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (3,'CPU');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (3,'Control unit');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (4,'2');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (4,'10');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (4,'8');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (4,'16');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (5,'American standard code for information interchange');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (5,'All purpose scientific code for information interchange');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (5,'American security code for information interchange');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (5,'American Scientific code for information interchange');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (6,'Computer program');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (6,'Algorithm');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (6,'Flowchart');
Insert into HR.QUESTIONOPTION (QUESTIONID,OPTIONNAME) values (6,'None of the above');
REM INSERTING into HR.UPLOAD
SET DEFINE OFF;
Insert into HR.UPLOAD (UPLOADID,COURSECODE,UPLOADFILE,UPLOADTYPE,UPLOADBY,UPLOADDATE) values (2,'CSE 101','video.mp4','Video','10-15391-1',to_date('25-DEC-12','DD-MON-RR'));
Insert into HR.UPLOAD (UPLOADID,COURSECODE,UPLOADFILE,UPLOADTYPE,UPLOADBY,UPLOADDATE) values (4,'CSE 101','REVIEW.doc','File','10-15391-1',to_date('25-DEC-12','DD-MON-RR'));
Insert into HR.UPLOAD (UPLOADID,COURSECODE,UPLOADFILE,UPLOADTYPE,UPLOADBY,UPLOADDATE) values (1,'CSE 101','Bojhena Se Bojhena - Title Track_Doridro.Com.mp3','Audio','10-15391-1',to_date('25-DEC-12','DD-MON-RR'));
REM INSERTING into HR.USERINFO
SET DEFINE OFF;
Insert into HR.USERINFO (USERID,VERSITYID,PASSWORD,FIRSTNAME,LASTNAME,DOB,EMAIL,PHONENO,CREATEDBY,CREATEDDATE,ROLE,ACTIVITY) values (5,'10-15391-1','1234','Anik','Islam',to_date('26-NOV-12','DD-MON-RR'),'abhi.cse.aiub@gmail.com','01676538153','10-15391-1',to_date('26-NOV-12','DD-MON-RR'),'Teacher','active');
Insert into HR.USERINFO (USERID,VERSITYID,PASSWORD,FIRSTNAME,LASTNAME,DOB,EMAIL,PHONENO,CREATEDBY,CREATEDDATE,ROLE,ACTIVITY) values (7,'10-15390-1','123','Zubair','Rafat',to_date('26-NOV-12','DD-MON-RR'),'zubair.rafat@gmail.com','0000000000','10-15390-1',to_date('26-NOV-12','DD-MON-RR'),'user','active');
Insert into HR.USERINFO (USERID,VERSITYID,PASSWORD,FIRSTNAME,LASTNAME,DOB,EMAIL,PHONENO,CREATEDBY,CREATEDDATE,ROLE,ACTIVITY) values (11,'10-15300-1','123','Mohit','Chandra',to_date('05-DEC-11','DD-MON-RR'),'mohitkamal@yahoo.com','01530050','10-15791-1',to_date('24-DEC-12','DD-MON-RR'),'user','active');
Insert into HR.USERINFO (USERID,VERSITYID,PASSWORD,FIRSTNAME,LASTNAME,DOB,EMAIL,PHONENO,CREATEDBY,CREATEDDATE,ROLE,ACTIVITY) values (12,'10-15301-1','123','Asif','Kamal',to_date('01-MAY-12','DD-MON-RR'),'lollysium@ymail.com','111212112','10-15791-1',to_date('24-DEC-12','DD-MON-RR'),'user','active');
Insert into HR.USERINFO (USERID,VERSITYID,PASSWORD,FIRSTNAME,LASTNAME,DOB,EMAIL,PHONENO,CREATEDBY,CREATEDDATE,ROLE,ACTIVITY) values (3,'10-15491-1','1234','zamun','Islam',to_date('19-DEC-12','DD-MON-RR'),'abnishworld@ymail.com','01672026300','10-15491-1',to_date('19-DEC-12','DD-MON-RR'),'user','active');
Insert into HR.USERINFO (USERID,VERSITYID,PASSWORD,FIRSTNAME,LASTNAME,DOB,EMAIL,PHONENO,CREATEDBY,CREATEDDATE,ROLE,ACTIVITY) values (6,'10-15791-1','123','Arifa','Nisha',to_date('26-NOV-12','DD-MON-RR'),'arifa.anisha123@gmail.com','01672026301','10-15791-1',to_date('26-NOV-12','DD-MON-RR'),'Admin','active');
Insert into HR.USERINFO (USERID,VERSITYID,PASSWORD,FIRSTNAME,LASTNAME,DOB,EMAIL,PHONENO,CREATEDBY,CREATEDDATE,ROLE,ACTIVITY) values (9,'10-00000-1','123','System','Admin',to_date('26-NOV-12','DD-MON-RR'),'info@system.com','01280001500','10-00000-1',to_date('26-NOV-12','DD-MON-RR'),'Admin','active');
--------------------------------------------------------
--  DDL for Index FINALMARK_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."FINALMARK_PK" ON "HR"."FINALMARK" ("FINALMARKID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index ASSIGNTEACHER_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."ASSIGNTEACHER_PK" ON "HR"."ASSIGNTEACHER" ("ASSIGNID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index EXAM_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."EXAM_PK" ON "HR"."EXAM" ("EXAMID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index COURSEEND_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."COURSEEND_PK" ON "HR"."COURSEEND" ("COURSEENDID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index GRADE_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."GRADE_PK" ON "HR"."GRADE" ("GRADEID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index CGPA_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."CGPA_PK" ON "HR"."CGPA" ("CGPAID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index ASSIGNSTUDENT_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."ASSIGNSTUDENT_PK" ON "HR"."ASSIGNSTUDENT" ("ASSIGNID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index COURSE_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."COURSE_PK" ON "HR"."COURSE" ("COURSEID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index MESSAGE_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."MESSAGE_PK" ON "HR"."MESSAGE" ("MESSAGEID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index NOTICE_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."NOTICE_PK" ON "HR"."NOTICE" ("NOTICEID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index QUESTION_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."QUESTION_PK" ON "HR"."QUESTION" ("QUESTIONID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index UPLOAD_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."UPLOAD_PK" ON "HR"."UPLOAD" ("UPLOADID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index USERINFO_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HR"."USERINFO_PK" ON "HR"."USERINFO" ("USERID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  Constraints for Table FINALMARK
--------------------------------------------------------

  ALTER TABLE "HR"."FINALMARK" ADD CONSTRAINT "FINALMARK_PK" PRIMARY KEY ("FINALMARKID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."FINALMARK" MODIFY ("FINALMARKID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table ASSIGNTEACHER
--------------------------------------------------------

  ALTER TABLE "HR"."ASSIGNTEACHER" ADD CONSTRAINT "ASSIGNTEACHER_PK" PRIMARY KEY ("ASSIGNID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."ASSIGNTEACHER" MODIFY ("ASSIGNID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table EXAM
--------------------------------------------------------

  ALTER TABLE "HR"."EXAM" ADD CONSTRAINT "EXAM_PK" PRIMARY KEY ("EXAMID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."EXAM" MODIFY ("EXAMID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table COURSEEND
--------------------------------------------------------

  ALTER TABLE "HR"."COURSEEND" ADD CONSTRAINT "COURSEEND_PK" PRIMARY KEY ("COURSEENDID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."COURSEEND" MODIFY ("COURSEENDID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table GRADE
--------------------------------------------------------

  ALTER TABLE "HR"."GRADE" ADD CONSTRAINT "GRADE_PK" PRIMARY KEY ("GRADEID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."GRADE" MODIFY ("GRADEID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table CGPA
--------------------------------------------------------

  ALTER TABLE "HR"."CGPA" ADD CONSTRAINT "CGPA_PK" PRIMARY KEY ("CGPAID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."CGPA" MODIFY ("CGPAID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table ASSIGNSTUDENT
--------------------------------------------------------

  ALTER TABLE "HR"."ASSIGNSTUDENT" ADD CONSTRAINT "ASSIGNSTUDENT_PK" PRIMARY KEY ("ASSIGNID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."ASSIGNSTUDENT" MODIFY ("ASSIGNID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table COURSE
--------------------------------------------------------

  ALTER TABLE "HR"."COURSE" ADD CONSTRAINT "COURSE_PK" PRIMARY KEY ("COURSEID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."COURSE" MODIFY ("COURSEID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table MESSAGE
--------------------------------------------------------

  ALTER TABLE "HR"."MESSAGE" ADD CONSTRAINT "MESSAGE_PK" PRIMARY KEY ("MESSAGEID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."MESSAGE" MODIFY ("MESSAGEID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table NOTICE
--------------------------------------------------------

  ALTER TABLE "HR"."NOTICE" ADD CONSTRAINT "NOTICE_PK" PRIMARY KEY ("NOTICEID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."NOTICE" MODIFY ("NOTICEID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table QUESTION
--------------------------------------------------------

  ALTER TABLE "HR"."QUESTION" ADD CONSTRAINT "QUESTION_PK" PRIMARY KEY ("QUESTIONID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
 
  ALTER TABLE "HR"."QUESTION" MODIFY ("QUESTIONID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table QUESTIONOPTION
--------------------------------------------------------

  ALTER TABLE "HR"."QUESTIONOPTION" MODIFY ("OPTIONNAME" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table UPLOAD
--------------------------------------------------------

  ALTER TABLE "HR"."UPLOAD" MODIFY ("UPLOADID" NOT NULL ENABLE);
 
  ALTER TABLE "HR"."UPLOAD" ADD CONSTRAINT "UPLOAD_PK" PRIMARY KEY ("UPLOADID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table USERINFO
--------------------------------------------------------

  ALTER TABLE "HR"."USERINFO" MODIFY ("USERID" NOT NULL ENABLE);
 
  ALTER TABLE "HR"."USERINFO" ADD CONSTRAINT "USERINFO_PK" PRIMARY KEY ("USERID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  DDL for Trigger COURSE_UPDATE
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."COURSE_UPDATE" 
after update on course
for each row
begin
   insert into courseinfo_log values(user,:old.coursename,:new.coursename,:old.coursecode,:new.coursecode,:old.description,:new.description,to_date(sysdate,'YYYY-MM-DD') );
end;
/
ALTER TRIGGER "HR"."COURSE_UPDATE" ENABLE;
--------------------------------------------------------
--  DDL for Trigger ABC
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."ABC" 
before insert on course
for each row
declare
     ur varchar2(200);
begin
        select role into ur from userinfo where versityid=:new.Createdby;
     if ur = 'Teacher' 
         then  RAISE_APPLICATION_ERROR(-20000,'You dont have permission for insert');
     elsif ur = 'user' 
         then  RAISE_APPLICATION_ERROR(-20000,'You dont have permission for insert');
     end if;
    
end;
/
ALTER TRIGGER "HR"."ABC" ENABLE;
--------------------------------------------------------
--  DDL for Trigger BC
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."BC" 
after insert on mark
for each row
declare
      markp number;
      fullmark number; 
      a number;
begin
     select   exammark into fullmark from exam where examid= :new.examid;
     a := :new.obtainedmark;
      markp := (( a*100)/fullmark);
     if markp <= 50 
        then
            insert into fail_log values(failid.nextval,markp,:new.versityid);
     end if;
end;
/
ALTER TRIGGER "HR"."BC" ENABLE;
--------------------------------------------------------
--  DDL for Trigger UPLOAD_LOG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."UPLOAD_LOG" 
after insert on upload
declare 
   c1 number;
begin 
 select count(*) as G into c1 from upload;
 insert into filenumber values(file_id.nextval,c1,to_date(sysdate,'YYYY-MM-DD'));
end;
/
ALTER TRIGGER "HR"."UPLOAD_LOG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger USERUPDATE
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."USERUPDATE" 
after UPDATE
ON userinfo 
FOR EACH ROW 
BEGIN 
INSERT INTO log_userupdate
VALUES 
(user, 
 :old.versityid, 
 :old.password, 
 :new.password,
 :new.versityid); 
END;
/
ALTER TRIGGER "HR"."USERUPDATE" ENABLE;