<?php
require_once('supercontroller.php');
class Usuarios extends Supercontroller {
	var $nome_controller = 'usuarios';
	function Usuarios()
	{
		parent::Supercontroller();
		$this->set_modelo('usuario');
		
		if(!$this->session->userdata('logged_in')) {
			$msg = $this->lang->line('erro.login');
			$this->session->set_flashdata('erro', $msg);
        	redirect('login', 'refresh');
		}
		
	
		if ($this->session->userdata('nivel') != NIVEL_ROOT) {
			redirect('painel', 'refresh');
		}
	}
	
	function index()
	{
		$data['titulo'] = $this->lang->line('menu.usuarios');
		$this->visao('aluno/painel', $data);
	}
	
	function novo(){
		$data['titulo'] = $this->lang->line('menu.usuarios');
		$data['usuario'] = NULL;
		
		$this->add_script('$("#txtDataNascimento").datepicker();');
		
		$this->visao('usuario/form', $data);
	}
	
	function editar($id){
		$data['titulo'] = $this->lang->line('menu.usuarios');
		$usuario = $this->usuario;
		$usuario->set_id($id);
		$usuario->retrieve();
		$data['usuario'] = $usuario;
		
		$this->add_script('$("#txtDataNascimento").datepicker();');
		
		$this->visao('usuario/form', $data);
	}
	
	function processar($id = NULL){
		
		//recebe os dados
		$nome = $this->input->post('nome');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$senha = $this->input->post('senha');
		$data_nascimento = $this->input->post('data_nascimento');
		$nivel = $this->input->post('nivel');
		
		
		$data_nascimento = $this->datas->normal_para_mysql($data_nascimento);
		
		
		$usuario = $this->usuario;
		
		//se � atualiza��o
		if(NULL !== $id){
			$usuario->set_id($id);
			$usuario->retrieve();
			
			if (!$usuario->get_nivel()) {
				$usuario->set_nivel($nivel);
			}
		} else {//cria��o
			$usuario->set_email($email);
			$usuario->set_nivel($nivel);
		}
		$usuario->set_username($username);
		$usuario->set_nome($nome);
		$usuario->set_senha($senha);
		$usuario->set_data_nascimento($data_nascimento);
		
		
		//se � atualiza��o
		if(NULL !== $id){
			$usuario->update();
			$msg = 'Usu�rio atualizado com sucesso.';
		} else {//cria��o
			$usuario->create();
			$msg = 'Usu�rio criado com sucesso.';
		}
		
		$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
		
		redirect('usuarios/lista', 'refresh');
		
		
	}
	
	function lista(){
		$data['titulo'] = $this->lang->line('menu.usuarios');
		
		$usuario = $this->usuario;
		$colecao_usuario = $usuario->search();
		$data['colecao_usuario'] = $colecao_usuario;
		
		$this->visao('usuario/lista', $data);
	}
	
	function remover($id_usuario){
		//TODO apagar dados do aluno/professor primeiro
		die('N/A');
		
		$usuario = $this->usuario;
		$usuario->set_id($id_usuario);
		$usuario->retrieve();
		$usuario->delete();
		
		//TODO testar se deletou e mostrar mensagem apropriada
		
		$msg = $this->lang->line('usuario.delete.success');
		$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
		
		redirect('usuarios/lista', 'refresh');
		
	}
	
	function avatar($id_usuario)
	{
		$usuario = $this->usuario;
		$usuario->set_id($id_usuario);
		$usuario->retrieve();
		
		$data['usuario'] = $usuario;
		
		$this->output->set_header("Content-type: image/png");
		$this->load->view('usuario/image', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */