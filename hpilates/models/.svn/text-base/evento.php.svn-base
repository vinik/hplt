<?php

require_once('supermodel.php');

/**
 * Classe modelo Evento
 * @author vinik
 * campos
 * 
id
id_aluno1
id_aluno2
id_estudio
id_professor
inicio
fim
iddiainteiro
iddupla
idrepeticao
repeticaofim
hora_inicio
hora_fim
id_tiporepeticao
 * 
 */
class Evento extends Supermodel
{

		/**
	 * Campo id
	 */
	protected $id;
	
	/**
	 * Campo id_aluno1
	 */
	protected $id_aluno1;
	
	/**
	 * Campo id_aluno2
	 */
	protected $id_aluno2;
	
	/**
	 * Campo id_estudio
	 */
	protected $id_estudio;
	
	/**
	 * Campo id_professor
	 */
	protected $id_professor;
	
	/**
	 * Campo inicio
	 */
	protected $inicio;
	
	/**
	 * Campo fim
	 */
	protected $fim;
	
	/**
	 * Campo iddiainteiro
	 */
	protected $iddiainteiro;
	
	/**
	 * Campo iddupla
	 */
	protected $iddupla;
	
	/**
	 * Campo idrepeticao
	 */
	protected $idrepeticao;
	
	/**
	 * Campo repeticaofim
	 */
	protected $repeticaofim;
	
	/**
	 * Campo evento pai
	 */
	protected $id_evento_pai;
	
	/**
	 * Campo hora_inicio
	 */
	protected $hora_inicio;
	
	/**
	 * Campo hora_fim
	 */
	protected $hora_fim;
	
	/**
	 * Campo tipo de repeti��o
	 * @var unknown_type
	 */
	protected $id_tiporepeticao;
	
	
	protected $idpago_aluno1;
	protected $idpago_aluno2;
	protected $id_pagamento_aluno1;
	protected $id_pagamento_aluno2;
	
	
	protected $deleted;

	
	/**
	 * Construtor do objeto
	 */
	function Evento()
	{
		parent::Supermodel();

		$this->set_table_name('evento');
		$this->set_fields('id_aluno1,id_aluno2,id_estudio,id_professor,inicio,fim,iddiainteiro,iddupla,idrepeticao,repeticaofim,hora_inicio,hora_fim,id_tiporepeticao,idpago_aluno1,idpago_aluno2,deleted,id_evento_pai,id_pagamento_aluno1,id_pagamento_aluno2');
		$this->set_key('id');
	}
	
	
	/**
	 * Getter do campo id
	 * @return id
	 */
	function get_id(){
		return $this->id;
	}
	
	/**
	 * Setter do campo id
	 * @param id
	 */
	function set_id($id){
		$this->id = $id;
	}
	
	/**
	 * Getter do campo id_aluno1
	 * @return id_aluno1
	 */
	function get_id_aluno1(){
		return $this->id_aluno1;
	}
	
	/**
	 * Setter do campo id_aluno1
	 * @param id_aluno1
	 */
	function set_id_aluno1($id_aluno1){
		$this->id_aluno1 = $id_aluno1;
	}
	
	/**
	 * Getter do campo id_aluno2
	 * @return id_aluno2
	 */
	function get_id_aluno2(){
		return $this->id_aluno2;
	}
	
	/**
	 * Setter do campo id_aluno2
	 * @param id_aluno2
	 */
	function set_id_aluno2($id_aluno2){
		$this->id_aluno2 = $id_aluno2;
	}
	
	/**
	 * Getter do campo id_estudio
	 * @return id_estudio
	 */
	function get_id_estudio(){
		return $this->id_estudio;
	}
	
	/**
	 * Setter do campo id_estudio
	 * @param id_estudio
	 */
	function set_id_estudio($id_estudio){
		$this->id_estudio = $id_estudio;
	}

	/**
	 * Getter do campo id_professor
	 * @return id_professor
	 */
	function get_id_professor(){
		return $this->id_professor;
	}
	
	/**
	 * Setter do campo id_professor
	 * @param id_professor
	 */
	function set_id_professor($id_professor){
		$this->id_professor = $id_professor;
	}
	
	/**
	 * Getter do campo inicio
	 * @return inicio
	 */
	function get_inicio(){
		return $this->inicio;
	}
	
	/**
	 * Setter do campo inicio
	 * @param inicio
	 */
	function set_inicio($inicio){
		$this->inicio = $inicio;
	}
	
	/**
	 * Getter do campo fim
	 * @return fim
	 */
	function get_fim(){
		return $this->fim;
	}
	
	/**
	 * Setter do campo fim
	 * @param fim
	 */
	function set_fim($fim){
		$this->fim = $fim;
	}
	
	/**
	 * Getter do campo iddiainteiro
	 * @return iddiainteiro
	 */
	function get_iddiainteiro(){
		return $this->iddiainteiro;
	}
	
	/**
	 * Setter do campo iddiainteiro
	 * @param iddiainteiro
	 */
	function set_iddiainteiro($iddiainteiro){
		$this->iddiainteiro = $iddiainteiro == SIM ? SIM : NAO;
	}
	
	/**
	 * Getter do campo iddupla
	 * @return iddupla
	 */
	function get_iddupla(){
		return $this->iddupla;
	}
	
	/**
	 * Setter do campo iddupla
	 * @param iddupla
	 */
	function set_iddupla($iddupla){
		$this->iddupla = $iddupla == SIM ? SIM : NAO;
	}
	
	/**
	 * Getter do campo idrepeticao
	 * @return idrepeticao
	 */
	function get_idrepeticao(){
		return $this->idrepeticao;
	}
	
	/**
	 * Setter do campo idrepeticao
	 * @param idrepeticao
	 */
	function set_idrepeticao($idrepeticao){
		$this->idrepeticao = $idrepeticao == SIM ? SIM : NAO;
	}
	
	/**
	 * Getter do campo repeticaofim
	 * @return repeticaofim
	 */
	function get_repeticaofim(){
		return $this->repeticaofim;
	}
	
	/**
	 * Setter do campo repeticaofim
	 * @param repeticaofim
	 */
	function set_repeticaofim($repeticaofim){
		$this->repeticaofim = $repeticaofim;
	}
	
	/**
	 * Getter do campo id_evento_pai
	 * @return id_evento_pai
	 */
	function get_id_evento_pai(){
		return $this->id_evento_pai;
	}
	
	/**
	 * Setter do campo id_evento_pai
	 * @param id_evento_pai
	 */
	function set_id_evento_pai($id_evento_pai){
		$this->id_evento_pai = $id_evento_pai;
	}
	
	/**
	 * Getter do campo hora_inicio
	 * @return hora_inicio
	 */
	function get_hora_inicio(){
		return $this->hora_inicio;
	}
	
	/**
	 * Setter do campo hora_inicio
	 * @param hora_inicio
	 */
	function set_hora_inicio($hora_inicio){
		$this->hora_inicio = $hora_inicio;
	}
	
	/**
	 * Getter do campo hora_fim
	 * @return hora_fim
	 */
	function get_hora_fim(){
		return $this->hora_fim;
	}
	
	/**
	 * Setter do campo hora_fim
	 * @param hora_fim
	 */
	function set_hora_fim($hora_fim){
		$this->hora_fim = $hora_fim;
	}
	
	/**
	 * Getter do campo repeticaofim
	 * @return repeticaofim
	 */
	function get_id_tiporepeticao(){
		return $this->id_tiporepeticao;
	}
	
	/**
	 * Setter do campo repeticaofim
	 * @param repeticaofim
	 */
	function set_id_tiporepeticao($tiporepeticao){
		$this->id_tiporepeticao = $tiporepeticao;
	}
	

	function get_idpago_aluno1()
	{
		return $this->idpago_aluno1;
	}
	
	function set_idpago_aluno1($p)
	{
		$this->idpago_aluno1 = $p == SIM ? SIM : NAO;
	}
	
	function get_idpago_aluno2()
	{
		return $this->idpago_aluno2;
	}
	
	function set_idpago_aluno2($p)
	{
		$this->idpago_aluno2 = $p == SIM ? SIM : NAO;
	}
	
	function get_deleted()
	{
		return $this->deleted;
	}
	
	function set_deleted($d)
	{
		if ($d != NAO) {
			$d = SIM;
		}
		$this->deleted = $d;
	}
	
	function get_id_pagamento_aluno1()
	{
		return $this->id_pagamento_aluno1;
	}
	
	function set_id_pagamento_aluno1($idp)
	{
		$this->id_pagamento_aluno1 = $idp;
	}
	
	function get_id_pagamento_aluno2()
	{
		return $this->id_pagamento_aluno2;
	}
	
	function set_id_pagamento_aluno2($idp)
	{
		$this->id_pagamento_aluno2 = $idp;
	}
	
	function get_nome_evento(){
		$aluno = new Aluno();
		$aluno->set_id($this->get_id_aluno1());
		$aluno->retrieve();
		
		$nome_evento = $aluno->get_nome();
		
		if('s' == $this->get_iddupla()){
			$aluno2= new Aluno();
			$aluno2->set_id($this->get_id_aluno2());
			$aluno2->retrieve();
			$nome_evento .= ' & ' . $aluno2->get_nome();
		}
		
		return $nome_evento;
	}
	
	/**
	 * Busca eventos em um determinado período
	 * @param $data_inicio Data de início do período, se não informado recebe nulo
	 * @param $data_fim Date de fim do período, se não informado assume nulo
	 * @return array Coleção de eventos
	 */
	function busca_por_periodo($data_inicio = NULL, $data_fim = NULL, $params = FALSE){
		
		//hora inicial e final
		$hora_inicio = '00:00:00';
		$hora_fim = '23:59:59';
		
		if (intval($this->session->userdata('nivel')) == NIVEL_ALUNO) {
			$id_usr_aluno = intval($this->session->userdata('id'));
			$aluno = $this->aluno;
			$aluno->set_id_usuario($id_usr_aluno);
			$aluno->retrieve(TRUE);
			
			$this->db->where('(id_aluno1 = ' . $aluno->get_id() . ' OR id_aluno2 = ' . $aluno->get_id() . ')');
		}
		
		if(NULL != $data_inicio){
			$this->db->where('inicio >=', $data_inicio);
		}
		$this->db->where('hora_inicio >=', $hora_inicio);
		if(NULL != $data_fim){
			$this->db->where('fim <=', $data_fim);
		}
		
		
		$this->db->where('hora_fim <=', $hora_fim);
		
		$this->db->where('deleted', NAO);
		
		$colecao =  $this->search($params);
		/*$colecao_evento = array();
		foreach ($colecao as $chave	=>	$linha){
			//repetição
			if($linha->get_idrepeticao() == 's'){
				
				//define o gap entre um evento repetido e outro
				$gap = 1;
				switch($linha->get_id_tiporepeticao()){
					case TIPO_REPETICAO_DIARIO:
						$gap = 1;
						break;
					case TIPO_REPETICAO_SEMANAL:
						$gap = 7;
						break;
					case TIPO_REPETICAO_QUINZENAL:
						$gap = 14;
						break;
					case TIPO_REPETICAO_MENSAL:
						$gap = 30;
						break;
				}
				
				//timestamp inicio
				$timestamp = $this->datas->mysql_para_timestamp($linha->get_inicio());
				if(! $this->datas->is_data_mysql_null($linha->get_repeticaofim())) {
					$timestamp_fim = $this->datas->mysql_para_timestamp($linha->get_repeticaofim());
				} else {
					$arr_data = explode('-', $linha->get_inicio());
					$timestamp_fim = mktime(0,0,0,$arr_data[1],$arr_data[2], $arr_data[0]+1);
				}
				array_push($colecao_evento, $linha);
				$evento_clone = $linha;
				for($i = 0; $timestamp <= $timestamp_fim; $i = $i + $gap){
					$evento_clone = clone $evento_clone;
					
					$data_inicio_evento = $this->datas->mysql_para_timestamp($evento_clone->get_inicio());
					$data_fim_evento = $this->datas->mysql_para_timestamp($evento_clone->get_fim());
					
					$gap_segundos = 60 * 60 * 24 * $gap;
					$timestamp = $data_inicio_evento + $gap_segundos;
					$timestamp_fim_evento = $data_fim_evento + $gap_segundos;
					
					$evento_clone->set_inicio($this->datas->timestamp_para_mysql($timestamp));
					$evento_clone->set_fim($this->datas->timestamp_para_mysql($timestamp_fim_evento));
					array_push($colecao_evento, $evento_clone);
				}
			} else {
				array_push($colecao_evento, $linha);
			}
		}
		
		
		return $colecao_evento;
		*/
		return $colecao;
	}
	
	/**
	 * Retorna eventos na data atual
	 * @return unknown_type
	 */
	function busca_hoje(){
		$data_inicio = date('Y-m-d');
		$data_fim = date('Y-m-d');
		return $this->busca_por_periodo($data_fim, $data_fim);
	}
	
	/**
	 * Retorna uma colecao de tipos de repeti��o dispon�veis
	 * 
	 * @return array
	 */
	function get_tipos_repeticao(){
		$tipos_repeticao = array(
			TIPO_REPETICAO_SEMANAL		=>	$this->lang->line('agenda.tipoevento.semanal'),
			TIPO_REPETICAO_QUINZENAL	=>	$this->lang->line('agenda.tipoevento.quinzenal'),
			TIPO_REPETICAO_MENSAL		=>	$this->lang->line('agenda.tipoevento.mensal')
		);
		return $tipos_repeticao;
	}
	
	/**
	 * Busca as aulas em aberto de um aluno
	 *
	 * @param int $id_aluno Id do aluno
	 * 
	 * @return array
	 */
	function busca_aulas_em_aberto($id_aluno)
	{
		$lista_aulas = array();
		
		$this->db->select($this->key.",".$this->fields);
		$this->db->distinct($this->key);
		$this->db->order_by('inicio', 'asc');
		$this->db->where('deleted', NAO);
		$this->db->where("(id_aluno1='" . $id_aluno . "' AND idpago_aluno1='n') OR (id_aluno2='" . $id_aluno . "' AND idpago_aluno2='n')");
		
		$query = $this->db->get($this->table_name, MAXIMO_RESULTADOS_BUSCA, 0);
		
		
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row)
			{
				$evento = new Evento();
				$evento->populate($row);
				
				array_push($lista_aulas, $evento);
			}
		}
		
		return $lista_aulas;
	}
	

	function delete()
	{
		$this->retrieve();
		$this->set_deleted(SIM);
		return $this->update();
	}
	
	function get_serie(){
		
		if (SIM == $this->get_idrepeticao() && NULL != $this->get_id_evento_pai()) {
			$evento = new Evento();
			$evento->set_id_evento_pai($this->get_id_evento_pai());
			$evento->set_deleted(NAO);
			return $evento->search();
		} else {
			return array();
		}
	}
	
	function factory(){
		return new Evento();
	}
	
}
