<?php

//for($i= 0; $i < 2000000; $i++){
//	echo "";
//}
	$obj_array = array();
		if(count($eventos) > 0){
			foreach($eventos as $indice_evento => $evento_agenda){
				
				
				$nome_evento = addslashes($evento_agenda->get_nome_evento());
				$nome_evento = utf8_encode($nome_evento);
				//$nome_evento = json_encode($nome_evento);
				
				/*
				$dtinicio = explode('-',$evento_agenda->get_inicio());
				$dtinicio[1] = intval($dtinicio[1]) - 1;
				$hrinicio = implode(', ', explode(':', $evento_agenda->get_hora_inicio()));
				$formato_inicio = implode(",", $dtinicio). ', '.$hrinicio;
				
				$dtfim = explode('-',$evento_agenda->get_fim());
				$hrfim = implode(', ', explode(':', $evento_agenda->get_hora_fim()));
				$dtfim[1] = intval($dtfim[1]) - 1;
				$formato_fim = implode(",", $dtfim). ', '.$hrfim; 
				*/
				
				$className = 'fechado';
				if('s' == $evento_agenda->get_iddupla() && NULL == $evento_agenda->get_id_aluno2()){
					$className = 'aberto';
				}
				
				$url_evento = 'javascript: abrirEvento(' . $evento_agenda->get_id() . ');';
				if (intval($this->session->userdata('nivel')) == NIVEL_ALUNO) {
					$url_evento = 'javascript: abrirEventoViewOnly(' . $evento_agenda->get_id() . ');';
				}
				
				$obj = array(
					'id' => $evento_agenda->get_id(),
					'title' => $nome_evento,
					'start' => $evento_agenda->get_inicio() . ' ' . $evento_agenda->get_hora_inicio(),
					'end' => $evento_agenda->get_fim() . ' ' . $evento_agenda->get_hora_fim(),
					'url' => $url_evento,
					'allDay' => ($evento_agenda->get_iddiainteiro() == SIM ? TRUE : FALSE),
					'className' => $className
				);
				
				array_push($obj_array, $obj);
				
//				echo "
//				{
//					id: " . $evento_agenda->get_id() . ",
//					title: '" . $nome_evento . "',
//					start: new Date(" . $formato_inicio . "),
//					end: new Date(" . $formato_fim . "),
//					url: '" . site_url('agenda/ver/'.$evento_agenda->get_id()) . "',
//					allDay: " . ($evento_agenda->get_iddiainteiro() == 's' ? 'true' : 'false') . ",
//					className: " . $className . "
//				}";
//				if($indice_evento + 1 < count($eventos)){
//					echo ",";
//				}
				
			}
		}
		
		if(count($aniversariantes) > 0){
			foreach($aniversariantes as $indice_usuario => $item_usuario){
				
				
				$nome_evento = addslashes($item_usuario->get_nome());
				$nome_evento = utf8_encode($nome_evento);
				//$nome_evento = json_encode($nome_evento);
				
				$dtinicio = explode('-',$item_usuario->get_data_nascimento());
				$dtinicio[0] = date('Y');
				$formato_inicio = implode("-", $dtinicio);
				
				$className = 'aniversario';
				
				$url_evento = 'javascript: dialog(' . $item_usuario->get_id() . ');';
				
				$obj = array(
					'id' => $item_usuario->get_id(),
					'title' => $nome_evento,
					'start' => $formato_inicio,
					'end' => $formato_inicio,
					'url' => $url_evento,
					'allDay' => TRUE,
					'className' => $className
				);
				
				array_push($obj_array, $obj);
				
			}
		}
		
		echo json_encode($obj_array);
?>