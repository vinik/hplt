<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|   ['hostname'] The hostname of your database server.
|   ['username'] The username used to connect to the database
|   ['password'] The password used to connect to the database
|   ['database'] The name of the database you want to connect to
|   ['dbdriver'] The database type. ie: mysql.  Currently supported:
                 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|   ['dbprefix'] You can add an optional prefix, which will be added
|                to the table name when using the  Active Record class
|   ['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|   ['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|   ['cache_on'] TRUE/FALSE - Enables/disables query caching
|   ['cachedir'] The path to the folder where cache files should be stored
|   ['char_set'] The character set used in communicating with the database
|   ['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

// $active_group = "producao";
// $active_group = "desenv";
$active_group = "openshift";
$active_record = TRUE;

$db['default']['hostname'] = "vnix.us";
$db['default']['username'] = "vnix";
$db['default']['password'] = "m4jd93y33";
$db['default']['database'] = "vnix_db";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";

$db['desenv']['hostname'] = "localhost";
$db['desenv']['username'] = "root";
$db['desenv']['password'] = "";
// $db['desenv']['database'] = "hpilates_oficial";
$db['desenv']['database'] = "hpilates2";
$db['desenv']['dbdriver'] = "mysql";
$db['desenv']['dbprefix'] = "";
$db['desenv']['pconnect'] = TRUE;
$db['desenv']['db_debug'] = TRUE;
$db['desenv']['cache_on'] = FALSE;
$db['desenv']['cachedir'] = "";
$db['desenv']['char_set'] = "utf8";
$db['desenv']['dbcollat'] = "utf8_general_ci";

$db['openshift']['hostname'] = DB_HOST;
$db['openshift']['username'] = DB_USER;
$db['openshift']['password'] = DB_PASSWORD;
$db['openshift']['database'] = DB_NAME;
$db['openshift']['dbdriver'] = "mysql";
$db['openshift']['dbprefix'] = "";
$db['openshift']['pconnect'] = TRUE;
$db['openshift']['db_debug'] = TRUE;
$db['openshift']['cache_on'] = FALSE;
$db['openshift']['cachedir'] = "";
$db['openshift']['char_set'] = "utf8";
$db['openshift']['dbcollat'] = "utf8_general_ci";


$db['producao']['hostname'] = "pwweb2.procempa.com.br";
$db['producao']['username'] = "hpilates";
$db['producao']['password'] = "bancodedados";
$db['producao']['database'] = "hpilatesbd";
$db['producao']['dbdriver'] = "mysql";
$db['producao']['dbprefix'] = "";
$db['producao']['pconnect'] = TRUE;
$db['producao']['db_debug'] = TRUE;
$db['producao']['cache_on'] = FALSE;
$db['producao']['cachedir'] = "";
$db['producao']['char_set'] = "ISO 8859-2";
$db['producao']['dbcollat'] = "latin2_general_ci";


/* End of file database.php */
/* Location: ./system/application/config/database.php */