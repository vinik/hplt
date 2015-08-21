<?php
require_once('supercontroller.php');
class Welcome extends Supercontroller {

	function Welcome()
	{
		parent::Supercontroller();	
	}
	
	function index()
	{
		$this->visao('template');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */