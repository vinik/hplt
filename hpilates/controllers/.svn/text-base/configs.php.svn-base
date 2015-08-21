<?php
require_once('supercontroller.php');
class Configs extends Supercontroller {
	var $nome_controller = 'configs';
	function Configs()
	{
		parent::Supercontroller();
		
		if(!$this->session->userdata('logged_in')) {
			$msg = $this->lang->line('erro.login');
			$this->session->set_flashdata('erro', $msg);
        	redirect('login', 'refresh');
		}
		
		if ($this->session->userdata('nivel') != NIVEL_ROOT) {
			redirect('painel', 'refresh');
		}
		
		$this->set_modelo('configs');
	}
	
	function index()
	{
		$data['titulo'] = $this->lang->line('menu.configs');
		
		$vnix_config = $this->vnix_config;
		$cfg_arr = $vnix_config->get_config_array();
		$config_size = count($cfg_arr);
		for ($i = 0; $i < $config_size; $i++) {
			$vnix_config->set_nome($cfg_arr[$i]['nome']);
			$db_cfg = $vnix_config->search();
			if(count($db_cfg) > 0){
				$cfg_arr[$i]['valor'] = $db_cfg[0]->get_valor();
			}
		}
		
		$data['config_array'] = $cfg_arr;
		
		$this->add_script_src('vnix_config');
		
		$this->visao('configs/gerais', $data);
	}
	
	function processar(){
		$vnix_config = $this->vnix_config;
		
		$cfg_arr = $vnix_config->get_config_array();
		foreach($cfg_arr as $config_item){
			$param = $this->input->post($config_item['nome']);
			
			$vnix_config->set_valor(NULL);
			$vnix_config->set_id(NULL);
				
			$vnix_config->set_nome($config_item['nome']);
			$vnix_config->set_ordem($config_item['ordem']);
			$vnix_config->set_tipo($config_item['tipo']);
			
			$colecao_config = $vnix_config->search();
			if(count($colecao_config) == 0){
				$vnix_config->set_valor($param);
				$vnix_config->create();
			} else {
				$vnix_config->set_valor($param);
				$vnix_config->set_id($colecao_config[0]->get_id());
				$vnix_config->update();
			}
			
			
		}
		$msg = $this->lang->line('configs.save.success');
		$this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
		redirect('configs', 'refresh');
	}
	
	function preferencias(){
		
		$data['titulo'] = $this->lang->line('preferencias');
		
		$this->visao('configs/preferencias', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */