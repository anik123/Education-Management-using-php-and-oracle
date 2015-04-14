--------------------------------------------------------
--  File created - Thursday-December-27-2012   
--------------------------------------------------------
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
--  DDL for Trigger UPDATE_JOB_HISTORY
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HR"."UPDATE_JOB_HISTORY" 
  AFTER UPDATE OF job_id, department_id ON employees
  FOR EACH ROW
BEGIN
  add_job_history(:old.employee_id, :old.hire_date, sysdate,
                  :old.job_id, :old.department_id);
END;
/
ALTER TRIGGER "HR"."UPDATE_JOB_HISTORY" ENABLE;
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
