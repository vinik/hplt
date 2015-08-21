<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Simplelogin Class
 *
 * Makes authentication simple
 *
 * Simplelogin is released to the public domain
 * (use it however you want to)
 * 
 * Simplelogin expects this database setup
 * (if you are not using this setup you may
 * need to do some tweaking)
 * 

	#This is for a MySQL table
	CREATE TABLE `users` (
	`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`username` VARCHAR( 64 ) NOT NULL ,
	`password` VARCHAR( 64 ) NOT NULL ,
	UNIQUE (
	`username`
	)
	);

 * 
 */
class Financeiro_hpilates
{
	var $CI;
	

	function Financeiro_hpilates()
	{
		// get_instance does not work well in PHP 4
		// you end up with two instances
		// of the CI object and missing data
		// when you call get_instance in the constructor
		//$this->CI =& get_instance();
	}
	
	function calcula_saldo($mes, $ano, $id_estudio = FALSE){
		$this->CI =& get_instance();
		if($ano < 2010){
			return 0;
		} else {
			$saldo_mes = 0;
			$pagamento = $this->CI->pagamento;
			$despesa = $this->CI->despesa;
			
			$saldo_mes = $pagamento->total_mes($mes, $ano, $id_estudio) - $despesa->total_mes($mes, $ano, $id_estudio);
			
			$saldo_mes = $saldo_mes + $this->calcula_saldo($this->CI->datas->mes_anterior($mes, $ano, 'm'), $this->CI->datas->mes_anterior($mes, $ano, 'Y'), $id_estudio);
			return $saldo_mes;
		}
	}
	
}
?>