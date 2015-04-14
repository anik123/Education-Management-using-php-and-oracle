--------------------------------------------------------
--  File created - Thursday-December-27-2012   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Function GET_INFO
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."GET_INFO" (
    uname IN VARCHAR2)
  RETURN varchar2
 IS
c varchar2(200);
BEGIN
   select versityid into c from userinfo where versityid=uname;
                    return c;
END;

/
--------------------------------------------------------
--  DDL for Function SET_NOTICE
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."SET_NOTICE" (
    des IN VARCHAR2,
    owner in varchar2
)
  RETURN number
IS
BEGIN
  insert into notice values(noticeid.nextval,des,owner,to_date(sysdate,'YYYY-MM-DD'));
  return 1;
END;

/
--------------------------------------------------------
--  DDL for Function UPDATE_NOTICE
--------------------------------------------------------

  CREATE OR REPLACE FUNCTION "HR"."UPDATE_NOTICE" (
    des IN VARCHAR2,
    nid in varchar2
)
  RETURN number
IS
BEGIN
  update notice set Description=des where NoticeId=nid;
  return 1;
END;

/
