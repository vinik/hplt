<?php
require_once('supercontroller.php');
class Alunos extends Supercontroller
{
	
	var $nome_controller = 'alunos';
	
	function Alunos() {
		parent::Supercontroller();
		
		//autentication
		if(!$this->session->userdata('logged_in')) {
			$msg = $this->lang->line('erro.login');
			$this->session->set_flashdata('erro', $msg);
        	redirect('login', 'refresh');
		}
		
		$this->set_modelo('aluno');
	}
	
	function index() {
		$data['titulo'] = $this->lang->line('menu.alunos');
		$aluno = $this->aluno;
		$colecao_aluno = $aluno->search(array('order_by' => 'cdate', 'order_direction' => 'DESC', 'total' => 5));
		$data['colecao_aluno'] = $colecao_aluno;
		
		$evento = $this->evento;
		$evento->set_inicio($this->datas->hoje_mysql());
		$colecao_evento = $evento->search(array('order_by' => 'hora_inicio', 'order_direction' => 'ASC', 'total' => 5));
		$data['colecao_evento'] = $colecao_evento;
		
		$this->visao('aluno/painel', $data);
	}
	
	function ver($id){
		$data['titulo'] = $this->lang->line('menu.alunos');
		$data['titulo_form'] = $this->lang->line('alunos.infoaluno');
		
		$aluno = $this->aluno;
		$aluno->set_id(intval($id));
		$aluno->retrieve();
		
		$data['aluno'] = $aluno;
		
		$evento = $this->evento;
		$evento->set_id_aluno1($aluno->get_id());
		$colecao_eventos = $evento->search();
		
		$data['aulas'] = $colecao_eventos;
		
		$this->add_script_src('alunos');
		
		
		//$this->add_script('$("#abasViewerAluno").tabs();');
		
		
		
		$this->visao('aluno/viewer', $data);
	}
	
	function novo(){
		
		$data['titulo'] = $this->lang->line('menu.alunos');
		$data['titulo_form'] = $this->lang->line('alunos.novoaluno');
		
		$aluno = $this->aluno;
		$data['aluno'] = NULL;
		
		$estudio = $this->estudio;
		$colecao = $estudio->search();
		$data['colecao_estudio'] = $colecao;
		
		$evento = $this->evento;
		$evento->set_id_aluno1($aluno->get_id());
		$colecao_eventos = $evento->search();
		
		$data['aulas'] = $colecao_eventos;
		
		$this->add_script_src('alunos');
		
		$this->visao('aluno/form', $data);
	}
	
	function editar($id){
		$data['titulo'] = $this->lang->line('menu.alunos');
		$data['titulo_form'] = 'Editar aluno';
		
		$aluno = $this->aluno;
		$aluno->set_id($id);
		$aluno->retrieve();
		$data['aluno'] = $aluno;
		
		$estudio = $this->estudio;
		$colecao = $estudio->search();
		$data['colecao_estudio'] = $colecao;
		
		$evento = $this->evento;
		$evento->set_id_aluno1($aluno->get_id());
		$colecao_eventos = $evento->search();
		
		$data['aulas'] = $colecao_eventos;
		
		$this->add_script_src('alunos');
		
		$this->visao('aluno/form', $data);
	}
	
	function processar($id = NULL){

		//recebe os dados
		$nome = $this->input->post('nome');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$senha = $this->input->post('senha');

		$data_nascimento = $this->input->post('data_nascimento');
		
		$data_nascimento = $this->datas->normal_para_mysql($data_nascimento);
		
		$endereco = $this->input->post('endereco');
		$profissao = $this->input->post('profissao');
		$telefone = $this->input->post('telefone');
		$objetivos = $this->input->post('objetivos');
		$id_estudio = $this->input->post('id_estudio');
		$valor_aula = $this->input->post('valor_aula');
		
		$aluno = $this->aluno;
		
		//se é atualização
		if(NULL !== $id){
			$aluno->set_id($id);
			$aluno->retrieve();
		} else {//criação
			$aluno->set_email($email);
		}
		
		$aluno->set_nivel(NIVEL_ALUNO);
		$aluno->set_nome($nome);

		if ($senha !== null && $senha !== '') {
			$aluno->set_senha($senha);
		}

		if ($username !== null && $username !== '') {
			$aluno->set_username($username);
		}

		$aluno->set_data_nascimento($data_nascimento);
		$aluno->set_email($email);
		$aluno->set_endereco($endereco);
		$aluno->set_profissao($profissao);
		$aluno->set_telefone($telefone);
		$aluno->set_objetivos($objetivos);
		$aluno->set_id_estudio($id_estudio);
		$aluno->set_valor_aula($valor_aula);
		
		
		//se é atualização
		if(NULL !== $id){
			$resultado = $aluno->update();
			$tipo = MESSAGE_TYPE_SUCCESS;
			$msg = 'Aluno atualizado com sucesso.';
		} else {//criação
			$resultado = $aluno->create();
			if($resultado){
				$tipo = MESSAGE_TYPE_SUCCESS;
				$msg = 'Aluno criado com sucesso.';
			} else {
				$tipo = MESSAGE_TYPE_ERROR;
				$msg = 'Ocorreu um erro ao criar aluno';
			}
		}
		
		$this->session->set_flashdata($tipo, $msg);
		
		if($resultado){
			redirect('alunos/lista', 'refresh');
		} else {
			redirect('alunos/form/'.$id, 'refresh');
		}
	}
	
	function lista()
	{
		$data['titulo'] = $this->lang->line('menu.alunos');
		$aluno = $this->aluno;
		$colecao = $aluno->search();
		$data['colecao_aluno'] = $colecao;
		$this->visao('aluno/lista', $data);
	}
	
	function remover($id_aluno)
	{
		if ($this->session->userdata('nivel') != NIVEL_ROOT) {
			$msg = $this->lang->line('erro.permissao');
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
			redirect($this->get_nome_controller() . '/lista', 'refresh');
		} else {
			
			//TODO remover os eventos deste aluno
			
			//TODO remover pagamentos deste aluno
			
			$aluno = $this->aluno;
			$aluno->set_id($id_aluno);
			$resposta = $aluno->delete();
			
			if ($resposta) {
				$msg = $this->lang->line('sucesso.alunos.remover_aluno');
				$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
				redirect($this->get_nome_controller() . '/lista', 'refresh');
			} else {
				$msg = $this->lang->line('erro.alunos.remover_aluno');
				$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
				redirect($this->get_nome_controller() . '/lista', 'refresh');
			}
		}
	}
	
	function processar_foto($id_aluno)
	{
		
		$aluno = $this->aluno;
		$aluno->set_id($id_aluno);
		$aluno->retrieve();
		
		$handle = fopen($_FILES['userfile']['tmp_name'], "rb");
		$img = fread($handle, filesize($_FILES['userfile']['tmp_name']));
		fclose($handle);
		$img = base64_encode($img);
		
		$usuario = $this->usuario;
		$usuario->set_id($aluno->get_id_usuario());
		$usuario->retrieve();
		$usuario->set_avatar($img);
		$usuario->update();
		
		$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, 'Arquivo enviado');
		
		redirect($this->get_nome_controller() . '/ver/' . $aluno->get_id(), 'refresh');
		
		/*
		$aluno = $this->aluno;
		$aluno->set_id($id_aluno);
		$aluno->retrieve();
		
//		echo $aluno->debug();
//		die();

		
		$config['upload_path'] = './temp/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite']  = TRUE;
		
		if (!is_dir('./temp')) {
			mkdir('./temp/', 0775);
		}
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $error);
			
		}	
		else
		{
			$data = $this->upload->data();
			
			$avatar_name = 'alunos/' . $data['file_name'];
			
			$usuario = $this->usuario;
			$usuario->set_id($aluno->get_id_usuario());
			$usuario->retrieve();
			$usuario->set_avatar($avatar_name);
			$usuario->update();
			
			$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $data);
		}
		redirect('alunos/ver/' . $aluno->get_id(), 'refresh');
	*/
	}
	
	function avatar($id_aluno)
	{
		$aluno = $this->aluno;
		$aluno->set_id($id_aluno);
		$aluno->retrieve();
		
		$data['aluno'] = $aluno;
		
		$this->output->set_header("Content-type: image/png");
		$this->load->view('aluno/image', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */