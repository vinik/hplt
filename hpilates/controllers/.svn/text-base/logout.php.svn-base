<?php

/**
 * Controller que trata a saída do sistema
 * @author vinik
 *
 */
class Logout extends Controller {

	function Logout()
	{
		parent::Controller();
	}
	
	function index()
	{
		$this->load->library('simplelogin');
		$this->simplelogin->logout();
		redirect('portal');
	}
}
