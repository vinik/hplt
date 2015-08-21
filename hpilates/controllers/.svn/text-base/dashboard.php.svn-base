<?php
require_once('supercontroller.php');
class Dashboard extends Supercontroller {
	var $nome_controller = 'dashboard';
	function Dashboard()
	{
		parent::Supercontroller();
		
		if(!$this->session->userdata('logged_in')) {
			$msg = $this->lang->line('erro.login');
			$this->session->set_flashdata('erro', $msg);
        	redirect('login', 'refresh');
		}
	}
	
	function index()
	{
		$data['titulo'] = $this->lang->line('menu.dashboard');
		
		$aluno = $this->aluno;
		$colecao_aluno = $aluno->search(array('order_by' => 'cdate', 'order_direction' => 'DESC', 'total' => 5));
		$data['alunos'] = $colecao_aluno;
		
		$professor = $this->professor;
		$colecao_professor = $professor->search(array('order_by' => 'p.cdate', 'order_direction' => 'DESC', 'total' => 5));
		$data['professores'] = $colecao_professor;
		
		$usuario = $this->usuario;
		$id_usuario = intval($this->session->userdata('id'));
		$usuario->set_id($id_usuario);
		$usuario->retrieve();
		$data['usuario'] = $usuario;
		
		$evento = $this->evento;
		//$aulas = $evento->busca_hoje();
		$eventos = $evento->search();
		
		$data['aulas'] = $eventos;
		
		$this->add_script_src('fullcalendar');
		
		$script_agenda = '$("#divHoje").fullCalendar({';
		$script_agenda .= 'theme: false,
		height: 450,
		monthNames: [\'Janeiro\',\'Fevereiro\',\'Mar�o\',\'Abril\',\'Maio\',\'Junho\',\'Julho\',\'Agosto\',\'Setembro\',\'Outubro\',\'Novembro\',\'Dezembro\'],
		monthNamesShort: [\'Jan\',\'Fev\',\'Mar\',\'Abr\',\'Mai\',\'Jun\',\'Jul\',\'Ago\',\'Set\',\'Out\',\'Nov\',\'Dez\'],
		dayNames: [\'Domingo\',\'Segunda\',\'Ter�a\',\'Quarta\',\'Quinta\',\'Sexta\',\'S�bado\'],
		dayNamesShort: [\'Dom\',\'Seg\',\'Ter\',\'Qua\',\'Qui\',\'Sex\',\'Sab\'],
		contentHeight: 450,
		header: {
			left: false,
			center: false,
			right: false,
		},
		columnFormat: "dddd d/M",
		defaultView: "basicDay",';
		
		$script_agenda .= 'events: [';
		if(count($eventos) > 0){
			foreach($eventos as $indice_evento => $evento_agenda){
				$nome_evento = $evento_agenda->get_nome_evento();
				
				$dtinicio = explode('-',$evento_agenda->get_inicio());
				$dtinicio[1] = intval($dtinicio[1]) - 1;
				$hrinicio = implode(', ', explode(':', $evento_agenda->get_hora_inicio()));
				$formato_inicio = implode(",", $dtinicio). ', '.$hrinicio;
				
				$dtfim = explode('-',$evento_agenda->get_fim());
				$hrfim = implode(', ', explode(':', $evento_agenda->get_hora_fim()));
				$dtfim[1] = intval($dtfim[1]) - 1;
				$formato_fim = implode(",", $dtfim). ', '.$hrfim; 
				
				$className = '"fechado"';
				if('s' == $evento_agenda->get_iddupla() && NULL == $evento_agenda->get_id_aluno2()){
					$className = '"aberto"';
				}
				$script_agenda .= "
				{
					id: " . $evento_agenda->get_id() . ",
					title: '" . utf8_encode(addslashes($nome_evento)) . "',
					start: new Date(" . $formato_inicio . "),
					end: new Date(" . $formato_fim . "),
					url: '" . site_url('agenda/ver/'.$evento_agenda->get_id()) . "',
					allDay: " . ($evento_agenda->get_iddiainteiro() == 's' ? 'true' : 'false') . ",
					className: " . $className . "
				}";
				if($indice_evento + 1 < count($eventos)){
					$script_agenda .= ",";
				}
			}
		}
		$script_agenda .= ']';
		
		$script_agenda .= '}); ';
		$this->add_script($script_agenda);
		
		$this->visao('dashboard/painel', $data);
	}
	

	
}

/* End of file dashboard.php */
/* Location: ./system/application/controllers/dashboard.php */