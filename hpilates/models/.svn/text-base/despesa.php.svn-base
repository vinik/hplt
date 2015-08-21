<?php
/**
 * despesa.php
 */

require_once 'supermodel.php';

/**
 * Classe modelo Despesa
 * @author vinik
 * campos
 * 
CREATE TABLE `despesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `descr` varchar(255) NOT NULL,
  `valor` double NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
 * 
 *
id
data
descr
valor
cdate
 * 
 * 
 */
class Despesa extends Supermodel
{
	
	var $id;
	var $data;
	var $descr;
	var $valor;
	private $id_estudio;
	private $deleted;
	
	/**
	 * Construtor do objeto
	 */
	function Despesa()
	{
		parent::Supermodel();

		$this->set_table_name('despesas');
		$this->set_fields('data,descr,valor,id_estudio');
		$this->set_key('id');
	}


	/**
	 * Getter do campo id
	 *
	 * @return id
	 */
	function get_id()
	{
		return $this->id;
	}
	
	/**
	 * Setter do campo id
	 *
	 * @param id
	 *
	 * @return void
	 */
	function set_id($id)
	{
		$this->id = $id;
	}
	
	/**
	 * Getter do campo data
	 *
	 * @return data
	 */
	function get_data()
	{
		return $this->data;
	}
	
	/**
	 * Setter do campo data
	 *
	 * @param data
	 *
	 * @return void
	 */
	function set_data($data)
	{
		$this->data = $data;
	}
	
	/**
	 * Getter do campo descr
	 *
	 * @return descr
	 */
	function get_descr()
	{
		return $this->descr;
	}
	
	/**
	 * Setter do campo descr
	 *
	 * @param descr
	 *
	 * @return void
	 */
	function set_descr($descr)
	{
		$this->descr = $descr;
	}
	
	/**
	 * Getter do campo valor
	 *
	 * @return valor
	 */
	function get_valor()
	{
		return $this->valor;
	}
	
	/**
	 * Setter do campo valor
	 *
	 * @param valor
	 *
	 * @return void
	 */
	function set_valor($valor)
	{
		$this->valor = $valor;
	}
	
	/**
	 * Getter do campo id estudio
	 *
	 * @return id_estudio
	 */
	function get_id_estudio()
	{
		return $this->id_estudio;
	}
	
	/**
	 * Setter do campo id_estudio
	 *
	 * @param id_estudio
	 *
	 * @return void
	 */
	function set_id_estudio($id_estudio)
	{
		$this->id_estudio = $id_estudio;
	}
	
	function get_deleted()
	{
		return $this->deleted;
	}
	
	function set_deleted($d)
	{
		$this->deleted = $d == SIM ? SIM : NAO;
	}
	
	/**
	 * Busca todas as despesas de um determinado m�s
	 *
	 * @param long $mes
	 * @param long $ano
	 * 
	 * @return array
	 */
	function busca_mes($mes, $ano, $id_estudio = NULL){
		
		
		$timestamp_inicio = mktime(0, 0, 1, $mes, 1, $ano);
		$timestamp_fim = mktime(23, 59, 59, $mes+1, 0, $ano);
		
		$data_inicio = date(FORMATO_DATA_MYSQL, $timestamp_inicio);
		$data_fim = date(FORMATO_DATA_MYSQL, $timestamp_fim);
		$this->db->from($this->get_table_name());
		$this->db->where('data >=', $data_inicio);
		$this->db->where('data <=', $data_fim);
		
		if (NULL !== $id_estudio) {
			$this->db->where('id_estudio', $id_estudio);
		}
		
		$query = $this->db->get();
		
		$colecao = array();
		
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row)
			{
				$despesa = new Despesa();
				$despesa->populate($row);
				array_push($colecao, $despesa);
			}
		}
		
		return $colecao;
	}
	
	function total_mes($mes, $ano){
		$total = 0;
		$colecao = $this->busca_mes($mes, $ano);
		
		if (count($colecao) > 0) {
			foreach ($colecao as $despesa) {
				$total += $despesa->get_valor();
			}
		}
		return $total;
	}
}