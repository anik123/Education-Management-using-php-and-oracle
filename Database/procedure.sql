--------------------------------------------------------
--  File created - Thursday-December-27-2012   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Procedure COURSE_DELETE
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."COURSE_DELETE" 
( 
    cid in number
)
as
begin 
  delete from course where courseid=cid;
End;

/
--------------------------------------------------------
--  DDL for Procedure LOGIN_CHCEK_USER
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."LOGIN_CHCEK_USER" 
( 
    username IN varchar2,
 pass IN varchar2,
 getno OUT number
)
as

cursor c1 is select versityid  from userinfo where versityid=username and password=pass;
vid varchar2(200);
i number;
Begin

        i :=0;
      open c1;
    LOOP
    FETCH c1 INTO vid;
     
    EXIT WHEN c1%NOTFOUND;
    i:=i+1;
   
  END LOOP;
 getno :=i;    
     close c1;
End;

/
--------------------------------------------------------
--  DDL for Procedure REGI_CHCEK_USER
--------------------------------------------------------
set define off;

  CREATE OR REPLACE PROCEDURE "HR"."REGI_CHCEK_USER" 
( 
    username IN varchar2,
    getno OUT number
)
as

cursor c1 is select versityid  from userinfo where versityid=username;
vid varchar2(200);
i number;
Begin

        i :=0;
      open c1;
    LOOP
    FETCH c1 INTO vid;
     
    EXIT WHEN c1%NOTFOUND;
    i:=i+1;
   
  END LOOP;
 getno :=i;    
     close c1;
End;

/
