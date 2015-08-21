<?php
require_once('supercontroller.php');
class Agenda extends Supercontroller {
	var $nome_controller = 'agenda';
	function Agenda()
	{
		parent::Supercontroller();
		
		//autenticação
		if(!$this->session->userdata('logged_in')) {
			$msg = $this->lang->line('erro.login');
			$this->session->set_flashdata('erro', $msg);
        	redirect('login', 'refresh');
		}
		
		$this->set_modelo('evento');
	}
	
	function index()
	{
		redirect('agenda/agenda_estudio', 'refresh');
		$this->add_script_src('agenda');
		
		$data['titulo'] = $this->lang->line('menu.agenda');
		
		$evento = $this->evento;
		$data['tipos_repeticao'] = $evento->get_tipos_repeticao();
		
		$aluno = $this->aluno;
		
		$estudio = $this->estudio;
		$colecao_estudio = $estudio->search();
		$data['estudios'] = $colecao_estudio;
		
		
		
		$aluno = $this->aluno;
		$colecao_aluno = $aluno->search();
		$data['alunos'] = $colecao_aluno;
		
		$professor = $this->professor;
		$colecao_professor = $professor->search();
		$data['professores'] = $colecao_professor;
		
		$this->visao('agenda/painel', $data);
	}
	
	function novo(){
		
		$aluno = $this->aluno;
		$colecao_aluno = $aluno->search();
		$data['alunos'] = $colecao_aluno;
		
		$evento = $this->evento;
		$data['tipos_repeticao'] = $evento->get_tipos_repeticao();
		
		$data['evento'] = NULL;
		
		$estudio = $this->estudio;
		$colecao_estudio = $estudio->search();
		$data['estudios'] = $colecao_estudio;
		
		$this->load->view('agenda/form', $data);
	}
	
	function ver($id_evento){
		$data['titulo'] = $this->lang->line('menu.agenda');
		
		$evento = $this->evento;
		$evento->set_id($id_evento);
		$evento->retrieve();
		
		
		$data['evento'] = $evento;
		
		$data['tipos_repeticao'] = $evento->get_tipos_repeticao();
		
		$aluno = $this->aluno;
		$aluno->set_id($evento->get_id_aluno1());
		$aluno->retrieve();
		$data['aluno'] = $aluno;
		
		if (SIM == $evento->get_iddupla()){
			$aluno2 = $this->aluno;
			$aluno2->set_id($evento->get_id_aluno2());
			$aluno2->retrieve();
			$data['aluno2'] = $aluno2;
		}
		
		$estudio = $this->estudio;
		$estudio->set_id($evento->get_id_estudio());
		$estudio->retrieve();
		$data['estudio'] = $estudio;
		
		$professor = $this->professor;
		$professor->set_id($evento->get_id_professor());
		$professor->retrieve();
		$data['professor'] = $professor;
		
		$this->visao('agenda/viewer', $data);
	}
	
	function evento($id_evento){
		
		$evento = $this->evento;
		$evento->set_id($id_evento);
		$evento->retrieve();
		
		
		$data['evento'] = $evento;
		
		$data['tipos_repeticao'] = $evento->get_tipos_repeticao();
		
		$aluno = $this->aluno;
		$aluno->set_id($evento->get_id_aluno1());
		$aluno->retrieve();
		$data['aluno'] = $aluno;
		
		if($evento->get_iddupla() == 's'){
			$aluno2 = clone $this->aluno;
			$aluno2->set_id($evento->get_id_aluno2());
			$aluno2->retrieve();
			$data['aluno2'] = $aluno2;
		}
		
		$estudio = $this->estudio;
		$estudio->set_id($evento->get_id_estudio());
		$estudio->retrieve();
		$data['estudio'] = $estudio;
		
		$professor = $this->professor;
		$professor->set_id($evento->get_id_professor());
		$professor->retrieve();
		$data['professor'] = $professor;
		
		$this->load->view('agenda/evento_viewer', $data);
	}
	
	function editar_evento($id_evento = NULL){
		$evento = $this->evento;
		
		$id_estudio = intval($this->input->post('id_estudio'));
		
		if (NULL != $id_evento) {
			$evento->set_id($id_evento);
			$evento->retrieve();
		}
		
		//$this->add_script_src('agenda');
		$data['evento'] = $evento;
		
		$data['tipos_repeticao'] = $evento->get_tipos_repeticao();
		
		$aluno = $this->aluno;
		if ($id_estudio) {
			$aluno->set_id_estudio($id_estudio);
		}
		$colecao_aluno = $aluno->search();
		$data['alunos'] = $colecao_aluno;
		
		$estudio = $this->estudio;
		$colecao_estudio = $estudio->search();
		$data['estudios'] = $colecao_estudio;
		
		$professor = $this->professor;
		$colecao_professor = $professor->search();
		$data['professores'] = $colecao_professor;
		
		$vnix_config = $this->vnix_config;
		$data['configs'] = $vnix_config->get_configs();
		
		$data['estudio'] = $estudio;
		
		$this->load->view('agenda/form', $data);
	}
	
	
	/**
	 * Processa um evento
	 */
	function processar($id = NULL){
		
		$evento = $this->evento;
		if (NULL != $id) {
			$evento->set_id($id);
			$evento->retrieve();
		}
		
		$nome_controller = $this->nome_controller;
		
		$inicio 			= $this->input->post('inicio');
		$iddiainteiro 		= $this->input->post('iddiainteiro') == SIM ? SIM : NAO;
		$hora_inicio 		= $this->input->post('hora_inicio');
		$fim 				= $this->input->post('fim');
		$hora_fim 			= $this->input->post('hora_fim');
		$id_aluno1 			= $this->input->post('id_aluno1');
		$id_aluno2 			= $this->input->post('id_aluno2');
		$id_estudio 		= $this->input->post('id_estudio');
		$id_professor 		= $this->input->post('id_professor');
		$iddupla	 		= $this->input->post('iddupla') == SIM ? SIM : NAO;
		$id_evento_pai		= NULL;
		$idrepeticao 		= NAO;
		if(NULL == $evento->get_id()) {
			$idrepeticao = $this->input->post('idrepeticao') == SIM ? SIM : NAO;
			$repeticaofim 		= $this->input->post('repeticaofim');
			$id_tiporepeticao 	= $this->input->post('id_tiporepeticao');
		} else {
			$idrepeticao = $evento->get_idrepeticao();
			$repeticaofim = $this->datas->mysql_para_normal($evento->get_repeticaofim());
			$id_tiporepeticao = $evento->get_id_tiporepeticao();
			$id_evento_pai		= $evento->get_id_evento_pai();
		}
		
		$inicio = $this->datas->normal_para_mysql($inicio);
		if('' != $fim){
			$fim = $this->datas->normal_para_mysql($fim);
		}
		if('' != $repeticaofim){
			$repeticaofim = $this->datas->normal_para_mysql($repeticaofim);
		}
		
		$data['inicio'] 			= $inicio;
		$data['iddiainteiro'] 		= $iddiainteiro;
		$data['hora_inicio'] 		= $hora_inicio;
		$data['fim'] 				= $fim;
		$data['hora_fim'] 			= $hora_fim;
		$data['id_aluno1'] 			= $id_aluno1;
		$data['id_aluno2'] 			= $id_aluno2;
		$data['id_estudio'] 		= $id_estudio;
		$data['id_professor'] 		= $id_professor;
		$data['id_tiporepeticao'] 	= $id_tiporepeticao;
		$data['repeticaofim'] 		= $repeticaofim;
		$data['iddupla'] 			= $iddupla;
		$data['idrepeticao']		= $idrepeticao;
		$data['idpago_aluno1']		= $evento->get_idpago_aluno1();
		$data['idpago_aluno2']		= NAO;
		$data['deleted']			= NAO;
		$data['id_evento_pai']		= $id_evento_pai;
		$data['id'] = $id;
		
		$data['id_pagamento_aluno1'] = NULL;
		$data['id_pagamento_aluno2'] = NULL;
		
		$msg = '';
		
		$evento->populate($data);
		if ('' == $evento->get_id_aluno2()) {
			$evento->set_id_aluno2(NULL);
		}
		if ($evento->validate()) {
			if (NULL !== $id) {
				$resultado = $evento->update();
				if ($resultado) {
					
					if (SIM == $evento->get_idrepeticao()) {
						$selected_serie = $this->input->post('selected_serie');
						
						if (count($selected_serie)) {
							foreach ($selected_serie as $id_evento_serie) {
								if ($id_evento_serie != $evento->get_id()) {
										
									$evento_serie = $evento->factory();
									$evento_serie->set_id($id_evento_serie);
									$evento_serie->retrieve();
									
									$evento_serie->set_hora_inicio($evento->get_hora_inicio());
									$evento_serie->set_hora_fim($evento->get_hora_fim());
									$evento_serie->set_id_aluno1($evento->get_id_aluno1());
									$evento_serie->set_iddupla($evento->get_iddupla());
									$evento_serie->set_id_aluno2($evento->get_id_aluno2());
									$evento_serie->set_id_professor($evento->get_id_professor());
									$evento_serie->set_id_estudio($evento->get_id_estudio());
									
									$evento_serie->update();
								}
							}
						}
					}
					
					$msg = $this->lang->line('sucesso.atualizar_objeto');
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
					redirect($nome_controller . '/agenda_estudio/' . $evento->get_id_estudio(), 'refresh');
				} else {
					$msg = $this->lang->line('erro.atualizar_objeto');
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
					redirect($nome_controller . '/agenda_estudio/' . $evento->get_id_estudio(), 'refresh');
				}
			} else {
				$resultado = $evento->create();
				$id_evento = $evento->get_id();
				$evento->set_id_evento_pai($id_evento);
				$evento->update();
				
				if ($resultado) {
					
					if ($evento->get_idrepeticao() == SIM) {
					
						//define o gap entre um evento repetido e outro
						$gap = 1;
						switch($evento->get_id_tiporepeticao()){
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
						$timestamp = $this->datas->mysql_para_timestamp($evento->get_inicio());
						if(! $this->datas->is_data_mysql_null($evento->get_repeticaofim())) {
							$timestamp_fim = $this->datas->mysql_para_timestamp($evento->get_repeticaofim());
						} else {
							$arr_data = explode('-', $evento->get_inicio());
							$timestamp_fim = mktime(0,0,0,$arr_data[1],$arr_data[2], $arr_data[0]+1);
						}
						//array_push($colecao_evento, $linha);
						for($i = 0; $timestamp < $timestamp_fim; $i = $i + $gap){
							//$evento_clone = clone $evento_clone;
							
							$data_inicio_evento = $this->datas->mysql_para_timestamp($evento->get_inicio());
							$data_fim_evento = $this->datas->mysql_para_timestamp($evento->get_fim());
							
							$gap_segundos = 60 * 60 * 24 * $gap;
							$timestamp = $data_inicio_evento + $gap_segundos;
							$timestamp_fim_evento = $data_fim_evento + $gap_segundos;
							$evento->set_id_evento_pai($id_evento);
							$evento->set_inicio($this->datas->timestamp_para_mysql($timestamp));
							$evento->set_fim($this->datas->timestamp_para_mysql($timestamp_fim_evento));
							$evento->create();
							//array_push($colecao_evento, $evento_clone);
						}
					}
					
					$msg = $this->lang->line('sucesso.criar_objeto');
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
					redirect($nome_controller . '/agenda_estudio/' . $id_estudio, 'refresh');
				} else {
					$msg = $this->lang->line('erro.criar_objeto');
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
					redirect($nome_controller .  '/agenda_estudio/' . $evento->get_id_estudio(), 'refresh');
				}
			}
		} else {
			$msg = $evento->get_erros();
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, implode(br(), $msg));
			if(NULL !== $id){
				redirect($nome_controller . '/editar/' . $id, 'refresh');
			} else {
				redirect($nome_controller . '/novo', 'refresh');
			}
		}
		
	}
	
	function agenda_estudio($id_estudio = FALSE){
		
		$this->add_script_src('agenda');
		
		$data['titulo'] = $this->lang->line('menu.agenda');
		
		$vnix_config = $this->vnix_config;
		$data['configs'] = $vnix_config->get_configs();
		
		$estudio = $this->estudio;
		$colecao_estudio = array();
		
		if ($this->session->userdata('nivel') == NIVEL_PROFESSOR) {
			$professor = $this->professor;
			$professor->set_id_usuario($this->session->userdata('id'));
			$professor->retrieve();
			$colecao_estudio = $professor->get_estudios_full();
		} else if ($this->session->userdata('nivel') == NIVEL_ROOT) {
			$colecao_estudio = $estudio->search();
		} else if ($this->session->userdata('nivel') == NIVEL_ALUNO) {
			$aluno = $this->aluno;
			$aluno->set_id_usuario($this->session->userdata('id'));
			$aluno->retrieve(TRUE);
			$estudio->set_id($aluno->get_id_estudio());
			$estudio->retrieve();
			$colecao_estudio = array(0 => $estudio);
		}
		
		$data['estudios'] = $colecao_estudio;
		
		if(FALSE === $id_estudio){
			$id_estudio = $colecao_estudio[0]->get_id();
		}
		
		$estudio->set_id($id_estudio);
		$estudio->retrieve();
		
		$data['estudio'] = $estudio;
		
		$evento = $this->evento;
		$data['tipos_repeticao'] = $evento->get_tipos_repeticao();
		
		$evento->set_id_estudio($estudio->get_id());
		//$colecao_evento = $evento->search();
		$colecao_evento = $evento->busca_por_periodo($this->datas->hoje_mysql(),$this->datas->hoje_mysql());
		
		$data['eventos'] = $colecao_evento;
		
		$aluno = $this->aluno;
		$aluno->set_id_estudio($estudio->get_id());
		$colecao_aluno = $aluno->search();
		$data['alunos'] = $colecao_aluno;
		
		
		$professor = $this->professor;
		$colecao_professor = $professor->search();
		$data['professores'] = $colecao_professor;
		
		$this->visao('agenda/estudio', $data);
	}

	function busca_eventos($id_estudio = FALSE){
		
//		$year = date('Y');
//		$month = date('m');
//	
//		echo json_encode(array(
//		
//			array(
//				'id' => 111,
//				'title' => "Event1",
//				'start' => "$year-$month-10",
//				'url' => "http://yahoo.com/"
//			),
//			
//			array(
//				'id' => 222,
//				'title' => "Event2",
//				'start' => "$year-$month-20",
//				'end' => "$year-$month-22",
//				'url' => "http://yahoo.com/"
//			)
//		
//		));die();
		
		//$this->add_script_src('agenda');
		
		$timestamp_start = $this->input->post('start');
		$timestamp_stop = $this->input->post('end');
		
		$estudio = $this->estudio;
		$colecao_estudio = $estudio->search();
		
		if(FALSE === $id_estudio){
			$id_estudio = $colecao_estudio[0]->get_id();
		}
		
		$estudio->set_id($id_estudio);
		$estudio->retrieve();
		
		$data['estudio'] = $estudio;
		
		$evento = $this->evento;
		
		$evento->set_id_estudio($estudio->get_id());
		$colecao_evento = $evento->busca_por_periodo($this->datas->timestamp_para_mysql($timestamp_start),$this->datas->timestamp_para_mysql($timestamp_stop));
		
		$data['eventos'] = $colecao_evento;
		
		
		//aniversariantes
		$usuario = $this->usuario;
		$lista_aniversariantes = $usuario->busca_por_periodo($this->datas->timestamp_para_mysql($timestamp_start),$this->datas->timestamp_para_mysql($timestamp_stop), $id_estudio, array('order_by' => 'nome'));
		$data['aniversariantes'] = $lista_aniversariantes;
		
		
		$this->load->view('agenda/lista_eventos', $data);
	}
	
	
	function remover_evento($id_evento)
	{
		if ($this->session->userdata('nivel') != NIVEL_ROOT) {
			$msg = $this->lang->line('erro.permissao');
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
			redirect('painel', 'refresh');
		} else {
			
			$evento = $this->evento;
			$evento->set_id($id_evento);
			$resposta = $evento->delete();
			
			if ($resposta) {
				$msg = $this->lang->line('sucesso.agenda.remover_evento');
				$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
				redirect($this->nome_controller . '/agenda_estudio/' . $evento->get_id_estudio(), 'refresh');
			} else {
				$msg = $this->lang->line('erro.agenda.remover_evento');
				$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
				redirect($this->nome_controller . '/agenda_estudio/' . $evento->get_id_estudio(), 'refresh');
			}
		}
	}
	
	function remover_eventos(){
		$param_eventos = $this->input->post('serie');
		
		$arr_eventos = explode(',', $param_eventos);
		
		$evento = $this->evento;
		
		$resposta = TRUE;
		
		if (count($arr_eventos)) {
			foreach ($arr_eventos as $id_evento) {
				$evento->set_id($id_evento);
				$evento->retrieve();
				$resposta = $resposta && $evento->delete();
			}
		}
		
		if ($resposta) {
			$msg =  'Eventos removidos com sucesso';
			$msg = '<p class="msg msg-ok" style="color: black;"><strong>Ok!</strong> ' . $msg . '</p>';
		} else {
			$msg = 'Erro ao remover eventos';
			$msg = '<p class="msg msg-error" style="color: black;"><strong>Erro!</strong> ' . $msg . '</p>';
		}
		echo $msg;
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */