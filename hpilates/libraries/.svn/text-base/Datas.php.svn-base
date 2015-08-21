<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Conversor de datas
 */


class Datas {
	
	/**
	 * Converte uma data em formato humana para formato mysql
	 * @param $data data string
	 * @return string
	 * @todo tratar localizaчуo
	 */
    function normal_para_mysql($data)
    {
    	$arr_data_mysql = explode('/', $data);
		$data_mysql = $arr_data_mysql[2] . '-' . $arr_data_mysql[1] . '-' . $arr_data_mysql[0];
    	return $data_mysql;
    }

    /**
	 * Converte uma data em formato mysql para formato humana
	 * @param $data data string
	 * @return string
	 * @todo tratar localizaчуo
	 */
    function mysql_para_normal($data)
    {
    	$arr_data_mysql = explode('-', $data);
		$data_mysql = $arr_data_mysql[2] . '/' . $arr_data_mysql[1] . '/' . $arr_data_mysql[0];
    	return $data_mysql;
    }
    
/**
	 * Converte uma timestamp em formato mysql para formato humana
	 * @param $data data string
	 * @return string
	 * @todo tratar localizaчуo
	 */
    function timestamp_para_normal($timestamp)
    {
    	$data_normal = date(FORMATO_DATA_HUMANO_BR, $timestamp);
    	return $data_normal;
    }
    
    function hoje(){
    	return date(FORMATO_DATA_HUMANO_BR);
    }
    
    function hoje_mysql(){
    	return date(FORMATO_DATA_MYSQL);
    }
    
    function hora($hora_db = FALSE){
    	if(FALSE !== $hora_db){
    		$arr_hora = explode(':', $hora_db);
    		$str_hora = $arr_hora[0] . ':' . $arr_hora[1];
    		return $str_hora;
    	} else {
    		return date(FORMATO_HORA_HUMANO);
    	}
    }
    
    /**
     * Converte uma data mysql para unix timestamp
     * @param $data_mysql
     * @param $datetime se щ um campo date ou datetime
     * @return timestamp
     */
    function mysql_para_timestamp($data_mysql, $datetime = FALSE){
    	if($datetime){
    		$arr_data_hora = explode(' ', $data_mysql);
    		
    		$arr_data = explode('-', $arr_data_hora[0]);
    		$arr_hora = explode(':', $arr_data_hora[1]);
    		return mktime($arr_hora[0], $arr_hora[1], $arr_hora[2], $arr_data[1], $arr_data[2], $arr_data[0]);
    	} else {
    		$arr_data = explode('-', $data_mysql);
    		
    		return mktime(0, 0, 0, $arr_data[1], $arr_data[2], $arr_data[0]);
    	}
    }
    
    /**
     * Converte um timestamp para formato mysql
     * @param $timestamp a ser convertido. se false converte o timestamp atual
     * @return data em formato mysql
     */
    function timestamp_para_mysql($timestamp = FALSE){
    	if(FALSE == $timestamp){
    		$timestamp = mktime();
    	}
    	return date(FORMATO_DATA_MYSQL, $timestamp);
    }
    
    /**
     * Verifica se uma data mysql щ nula
     * @param $data_mysql
     * @return unknown_type
     */
    function is_data_mysql_null($data_mysql){
    	return $data_mysql == FORMATO_DATA_MYSQL_NULL;
    }
    
/**
     * Converte uma data normal para unix timestamp
     * 
     * @param $data_mysql
     * 
     * @return timestamp
     */
    function normal_para_timestamp($data_normal){
    	
    		$arr_data = explode('/', $data_normal);
    		
    		return mktime(0, 0, 0, $arr_data[1], $arr_data[0], $arr_data[2]);
    }
    
    function proximo_mes($mes, $ano, $formato){
    	$proximo_mes = date($formato, mktime(0,0,1,($mes+1),1,$ano));
    	return $proximo_mes;
    }
    
    function mes_anterior($mes, $ano, $formato){
    	$mes_anterior = date($formato, mktime(0,0,1,($mes-1),1,$ano));
    	return $mes_anterior;
    }
    
}

?>