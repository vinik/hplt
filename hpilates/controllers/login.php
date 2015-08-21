<?php

class Login extends Controller {

	function Login()
	{
		parent::Controller();
		$this->load->library('simplelogin');	
	}
	
	function index()
	{
		$this->load->view('form_login');
	}
	function processar()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('senha');
		if($this->simplelogin->login($username, $password))
		{
			redirect('agenda/agenda_estudio','refresh');
		}
		else
		{
			$msg = $this->lang->line('erro_login');
			$this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
			redirect('login', 'refresh');
		}
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
