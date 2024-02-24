DROP FUNCTION IF EXISTS lib_mysqludf_sys_info;
DROP FUNCTION IF EXISTS sys_get;
DROP FUNCTION IF EXISTS sys_set;
DROP FUNCTION IF EXISTS sys_exec;
DROP FUNCTION IF EXISTS sys_eval;

CREATE FUNCTION lib_mysqludf_sys_info RETURNS string SONAME 'df_sys.so';
CREATE FUNCTION sys_get RETURNS string SONAME 'df_sys.so';
CREATE FUNCTION sys_set RETURNS int SONAME 'df_sys.so';
CREATE FUNCTION sys_exec RETURNS int SONAME 'df_sys.so';
CREATE FUNCTION sys_eval RETURNS string SONAME 'df_sys.so';