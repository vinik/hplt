<?php

require_once('supercontroller.php');

class Estudios extends Supercontroller
{

	var $nome_controller = 'estudios';

	function Estudios()
	{
		parent::Supercontroller();

		//autenticação
		if(!$this->session->userdata('logged_in')) {
			$msg = $this->lang->line('erro.login');
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
        	redirect('login', 'refresh');
		}

		$this->set_modelo('estudio');
	}

	function index()
	{
		$data['titulo'] = $this->lang->line('menu.estudios');
		$this->visao('estudio/painel', $data);
	}

	function novo(){
		$data['titulo'] = $this->lang->line('menu.estudios');
		$data['titulo_form'] = $this->lang->line('estudios.novoestudio');

		$estudio = NULL;
		$data['estudio'] = $estudio;

		$this->visao('estudio/form', $data);
	}

	function editar($id_estudio){
		$data['titulo'] = $this->lang->line('menu.estudios');
		$data['titulo_form'] = $this->lang->line('estudios.editarestudio');

		$estudio = $this->estudio;
		$estudio->set_id($id_estudio);
		$estudio->retrieve();
		$data['estudio'] = $estudio;

		$this->visao('estudio/form', $data);
	}

	function ver($id_estudio)
	{
		$data['titulo'] = $this->lang->line('menu.estudios');
		$data['titulo_form'] = $this->lang->line('estudios.verestudio');

		$estudio = $this->estudio;
		$estudio->set_id($id_estudio);
		$estudio->retrieve();
		$data['estudio'] = $estudio;

		$aluno = $this->aluno;
		$data['aluno'] = $aluno;
		$aluno->set_id_estudio($estudio->get_id());
		$colecao_aluno = $aluno->search();
		$data['alunos'] = $colecao_aluno;

		$this->add_script_src('estudios');

		$this->visao('estudio/viewer', $data);
	}

	function lista(){
		$data['titulo'] = $this->lang->line('menu.estudios');

		$estudio = $this->estudio;
		$colecao_estudio = $estudio->search();
		$data['colecao_estudio'] = $colecao_estudio;

		$this->visao('estudio/lista', $data);
	}

	function remover($id_estudio)
	{
		if ($this->session->userdata('nivel') != NIVEL_ROOT) {
			$msg = $this->lang->line('erro.permissao');
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
			redirect($this->get_nome_controller() . '/lista', 'refresh');
		} else {

			//TODO remover os eventos deste estudio

			$estudio = $this->estudio;
			$estudio->set_id($id_estudio);
			$resposta = $estudio->delete();

			if ($resposta) {
				$msg = $this->lang->line('sucesso.estudios.remover_estudio');
				$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
				redirect($this->get_nome_controller() . '/lista', 'refresh');
			} else {
				$msg = $this->lang->line('erro.estudios.remover_estudio');
				$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
				redirect($this->get_nome_controller() . '/lista', 'refresh');
			}
		}
	}

	function processar_foto($id_estudio)
	{
		$estudio = $this->estudio;
		$estudio->set_id($id_estudio);
		$estudio->retrieve();

		$config['upload_path'] = './uploads/estudios/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto_estudio')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $error);

		} else {

			$data = $this->upload->data();

			$avatar_name = $data['file_name'];

			$estudio->set_foto($avatar_name);
			$estudio->update();

			$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $data);
		}
		redirect($this->get_nome_controller() . '/ver/' . $estudio->get_id(), 'refresh');

	}

	function processar($id = NULL){
		$estudio = $this->estudio;

		if (NULL !== $id) {
			$estudio->set_id($id);
			$estudio->retrieve();
		}

		$data[$estudio->get_key()] = $id;
		$data['nome'] = $this->input->post('nome');
		$data['telefone'] = $this->input->post('telefone');
		$data['endereco'] = $this->input->post('endereco');
		$data['foto'] = $estudio->get_foto();
		$data['deleted'] = NAO;

		$msg = '';

		$estudio->populate($data);
		if($estudio->validate()){
			if(NULL !== $id){
				$resultado = $estudio->update();
				if($resultado){
					$msg = $this->lang->line('sucesso.atualizar_objeto');
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
					redirect($this->nome_controller . '/lista', 'refresh');
				} else {
					$msg = $this->lang->line('erro.atualizar_objeto');
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
					redirect($this->nome_controller . '/editar/' . $id, 'refresh');
				}
			} else {
				$resultado = $estudio->create();
				if($resultado){
					$msg = $this->lang->line('sucesso.criar_objeto');
					$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
					redirect($this->nome_controller . '/lista', 'refresh');
				} else {
					$msg = $this->lang->line('erro.criar_objeto');
					$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
					redirect($this->nome_controller . '/novo', 'refresh');
				}
			}
		} else {
			$msg = $estudio->get_erros();
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, implode(br(), $msg));
			if(NULL !== $id){
				redirect($this->nome_controller . '/editar/' . $id, 'refresh');
			} else {
				redirect($this->nome_controller . '/novo', 'refresh');
			}
		}
	}

}

/* End of file estudios.php */
/* Location: ./system/application/controllers/estudios.php */
