<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

define('DB_NAME', getenv('OPENSHIFT_APP_NAME'));
define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASSWORD', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST') . ':' . getenv('OPENSHIFT_MYSQL_DB_PORT'));


/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',                            'rb');
define('FOPEN_READ_WRITE',                      'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',        'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',   'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',                    'ab');
define('FOPEN_READ_WRITE_CREATE',               'a+b');
define('FOPEN_WRITE_CREATE_STRICT',             'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',        'x+b');




define('MAXIMO_RESULTADOS_BUSCA',   1000);

define('SIM', 's');
define('NAO', 'n');

//message types
define('MESSAGE_TYPE_SUCCESS', 'success');
define('MESSAGE_TYPE_ERROR', 'error');
define('MESSAGE_TYPE_WARNING', 'warning');


/*
 * N�veis de acesso
 */
define('NIVEL_DEFAULT',        '0');
define('NIVEL_ROOT',        '1');
define('NIVEL_PROFESSOR',   '2');
define('NIVEL_ALUNO',       '3');

/*
 * Tipos de repeti��o
 */
define('TIPO_REPETICAO_DIARIO',     1);
define('TIPO_REPETICAO_SEMANAL',    2);
define('TIPO_REPETICAO_QUINZENAL',  3);
define('TIPO_REPETICAO_MENSAL', 4);

/*
 * Formatos de data
 */
define('FORMATO_DATA_HUMANO',       'm/d/Y');
define('FORMATO_DATA_HUMANO_BR',    'd/m/Y');
define('FORMATO_HORA_HUMANO',       'h:i');
define('FORMATO_DATA_MYSQL',        'Y-m-d');
define('FORMATO_DATAHORA_MYSQL',    'Y-m-d h:i:s');
define('FORMATO_DATA_MYSQL_NULL',   '0000-00-00');

/*
 * Valores default
 */
define('INTERVALO_SELECT_PADRAO',   15);
define('VALOR_PADRAO_AULA', 1);

/*
 * TIPOS DEFAULT
 */
define('TIPO_HORAS',    1);
define('TIPO_SELECT',   2);
define('TIPO_VALOR',    3);
define('TIPO_VALOR_DUPLA',    4);

define('CONFIG_INICIO_EXPEDIENTE',          0);
define('CONFIG_INTERVALO_CAMPO_HORAS',      1);
define('CONFIG_VALOR_PADRAO_AULA',          2);
define('CONFIG_VALOR_PADRAO_AULA_DUPLA',    3);

define('ESPECIE_DINHEIRO', 1);
define('ESPECIE_CHEQUE', 2);

/* End of file constants.php */
/* Location: ./system/application/config/constants.php */