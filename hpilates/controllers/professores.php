<?php
require_once('supercontroller.php');
class Professores extends Supercontroller {

	function Professores()
	{
		parent::Supercontroller();
		
		//autentica��o
		if(!$this->session->userdata('logged_in')) {
			$msg = $this->lang->line('erro.login');
			$this->session->set_flashdata('erro', $msg);
        	redirect('login', 'refresh');
		}
		
		$this->set_modelo('professor');
		$this->set_nome_controller('professores');
		
	
		if ($this->session->userdata('nivel') != NIVEL_ROOT) {
			redirect('painel', 'refresh');
		}
	}
	
	function index()
	{
		$data['titulo'] = $this->lang->line('menu.professores');
		$this->visao('professor/painel', $data);
	}
	
	function novo(){
		$data['titulo'] = $this->lang->line('menu.professores');
		$data['titulo_form'] = $this->lang->line('professores.novoprofessor');
		
		$estudio = $this->estudio;
		$estudio->set_deleted(NAO);
		$data['estudios'] = $estudio->search();

		$this->add_script_src('professores');
		
		$data['professor'] = NULL;
		
		$this->visao('professor/form', $data);
	}
	
	function editar($id){
		$data['titulo'] = $this->lang->line('menu.professores');
		
		$professor = $this->professor;
		$professor->set_id($id);
		$professor->retrieve();
		$data['professor'] = $professor;
		$data['titulo_form'] = $professor->get_nome();

		$estudio = $this->estudio;
		$estudio->set_deleted(NAO);
		$data['estudios'] = $estudio->search();
		
		$this->add_script_src('professores');
		
		$this->visao('professor/form', $data);
	}
	
	function processar($id = NULL){
		
		//recebe os dados
		$nome = $this->input->post('nome');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$senha = $this->input->post('senha');
		$data_nascimento = $this->input->post('data_nascimento');
		$arr_estudio = $this->input->post('estudio');
		$endereco = $this->input->post('endereco');
		$telefone = $this->input->post('telefone');


		$data_nascimento = $this->datas->normal_para_mysql($data_nascimento);
		$professor = $this->professor;
		
		//se � atualiza��o
		if(NULL !== $id){
			$professor->set_id($id);
			$professor->retrieve();
		} else {//cria��o
			$professor->set_username($username);
		}

		if ($senha !== null && $senha !== '') {
			$professor->set_senha($senha);
		}

		if ($username !== null && $username !== '') {
			$professor->set_username($username);
		}

		$professor->set_email($email);
		$professor->set_nivel(NIVEL_PROFESSOR);
		$professor->set_nome($nome);
		$professor->set_senha($senha);
		$professor->set_data_nascimento($data_nascimento);
		$professor->set_endereco($endereco);
		$professor->set_telefone($telefone);
		
		
		//se � atualiza��o
		if(NULL !== $id){
			$resultado = $professor->update();
			
			//estudios
			$professor->zerar_estudios();
			$professor->add_estudios($arr_estudio);
			
			if($resultado){
				$tipo = MESSAGE_TYPE_SUCCESS;
				$msg = $this->lang->line('sucesso.professores.atualizaprofessor');
			} else {
				$tipo = MESSAGE_TYPE_ERROR;
				$msg = $this->ling->line('erro.professores.atualizaprofessor');
			}
		} else {//cria��o
			$resultado = $professor->create();
			if($resultado){
				$tipo = MESSAGE_TYPE_SUCCESS;
				$msg = $this->lang->line('sucesso.professores.criaprofessor');
			} else {
				$tipo = MESSAGE_TYPE_ERROR;
				$msg = $this->ling->line('erro.professores.criaprofessor');
			}
			
			$professor->add_estudios($arr_estudio);
		}
		
		$this->session->set_flashdata($tipo, $msg);
		
		if($resultado){
			redirect($this->get_nome_controller() . '/lista', 'refresh');
		} else {
			redirect($this->get_nome_controller() . '/form/'.$id, 'refresh');
		}
	}
	

	function lista(){
		$data['titulo'] = $this->lang->line('menu.professores');
		$professor = $this->professor;
		$colecao = $professor->search();
		$data['colecao_professor'] = $colecao;
		$this->visao('professor/lista', $data);
	}
	
	function remover($id_professor)
	{
		if ($this->session->userdata('nivel') != NIVEL_ROOT) {
			$msg = $this->lang->line('erro.permissao');
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
			redirect($this->get_nome_controller() . '/lista', 'refresh');
		} else {
			
			//TODO remover os eventos deste professor

			$professor = $this->professor;
			$professor->set_id($id_professor);
			$resposta = $professor->delete();
			
			if ($resposta) {
				$msg = $this->lang->line('sucesso.professores.remover_professor');
				$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
				redirect($this->get_nome_controller() . '/lista', 'refresh');
			} else {
				$msg = $this->lang->line('erro.professores.remover_professor');
				$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
				redirect($this->get_nome_controller() . '/lista', 'refresh');
			}
		}
	}
	

	function ver($id){
		$data['titulo'] = $this->lang->line('menu.professores');
		$data['titulo_form'] = $this->lang->line('professores.infoprofessor');
		
		$professor = $this->professor;
		$professor->set_id(intval($id));
		$professor->retrieve();
		
		$data['professor'] = $professor;
		
		$evento = $this->evento;
		$evento->set_id_professor($professor->get_id());
		$colecao_eventos = $evento->search();
		$data['aulas'] = $colecao_eventos;
		
		$estudio = $this->estudio;
		$colecao_estudio = $professor->get_estudios_full();
		$data['estudios'] = $colecao_estudio;
		
		$this->add_script_src('professores');
		
		$month = date('n');
		$year = date('Y');
		$month_day = 1;
		$start = date('Y-m-d', mktime(0, 0, 1, $month, $month_day, $year));
		$end = date('Y-m-d', mktime(23, 59, 59, ($month + 1), ($month_day - 1), $year));
		
		$data['range_start'] = $start;
		$data['range_end'] = $end;
		
		
		//$this->add_script('$("#abasViewerAluno").tabs();');
		
		
		
		$this->visao('professor/viewer', $data);
	}
	
	function aulas_dadas($id_estudio, $id_professor)
	{
		$range_start = $this->input->post('range_start');
		$range_end = $this->input->post('range_end');
		$periodo_inicio = $this->datas->normal_para_mysql($range_start);
		$periodo_fim = $this->datas->normal_para_mysql($range_end);
		
		$estudio = $this->estudio;
		$estudio->set_id($id_estudio);
		$estudio->retrieve();
		
		$professor = $this->professor;
		$professor->set_id($id_professor);
		$professor->retrieve();
		
		$evento = $this->evento;
		$evento->set_id_professor($professor->get_id());
		$evento->set_id_estudio($estudio->get_id());
		
		$colecao_evento = $evento->busca_por_periodo($periodo_inicio, $periodo_fim, array('order_by' => 'inicio, hora_inicio', 'order_direction' => 'ASC'));
		$data['aulas'] = $colecao_evento;
		
		$this->load->view('professor/aulas_dadas', $data);
		
	}
	
	function processar_foto($id_professor)
	{
		
		$professor = $this->professor;
		$professor->set_id($id_professor);
		$professor->retrieve();
		
		$handle = fopen($_FILES['userfile']['tmp_name'], "rb");
		$img = fread($handle, filesize($_FILES['userfile']['tmp_name']));
		fclose($handle);
		$img = base64_encode($img);
		
		$usuario = $this->usuario;
		$usuario->set_id($professor->get_id_usuario());
		$usuario->retrieve();
		$usuario->set_avatar($img);
		$usuario->update();
		
		$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, 'Arquivo enviado');
		
		redirect($this->get_nome_controller() . '/ver/' . $professor->get_id(), 'refresh');
		
//		echo $professor->debug();
//		die();
		
		/*
		$config['upload_path'] = './temp/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite']  = TRUE;
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $error);
			
		}	
		else
		{
			
			$upload_data =  $this->upload->data();
			
			$handle = fopen($upload_data['full_path'], "rb");
			$img = fread($handle, filesize($upload_data['full_path']));
			fclose($handle);
			$img = base64_encode($img);
			
			$usuario = $this->usuario;
			$usuario->set_id($professor->get_id_usuario());
			$usuario->retrieve();
			$usuario->set_avatar($img);
			$usuario->update();
			
			unlink($upload_data['full_path']);
			
			$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $upload_data);
		}
		redirect($this->get_nome_controller() . '/ver/' . $professor->get_id(), 'refresh');
		*/
		
	}
	
	function avatar($id_professor)
	{
		$professor = $this->professor;
		$professor->set_id($id_professor);
		$professor->retrieve();
		
		$data['professor'] = $professor;
		
		$this->output->set_header("Content-type: image/png");
		$this->load->view('professor/image', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */