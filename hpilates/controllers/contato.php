<?php
class Contato extends Controller {

	function Contato()
	{
		parent::Controller();
	}
	
	function index()
	{
	}
	
	function processar(){
		$nome = $this->input->post('nome');
		$email = $this->input->post('email');
		$telefone = $this->input->post('telefone');
		$mensagem = $this->input->post('mensagem');
		
		$this->load->library('email');
		
		$this->email->from('admin@hpilates.com', 'Sistema');
		$this->email->to('mhaetinger@hotmail.com');
		$this->email->cc('vinicius.kirst@gmail.com');
		//$this->email->bcc('them@their-example.com');
		
		$this->email->subject('Contato enviado pelo site - HPilates.com');
		
		$txtEmail = 'Esta mensagem foi enviada pelo site hpilates.com dia ';
		$dataHoje = date('d/m/Y');
		$txtEmail .= $dataHoje . '
		
		';
		$txtEmail .= '
De: ' . $nome . ' (' . $email . ')
Telefone: ' . $telefone . '
Mensagem: ' . $mensagem . '';
		
		$this->email->message($txtEmail);
		
		$this->email->send();

		redirect('http://www.hpilates.com');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */