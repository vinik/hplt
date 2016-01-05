<?php

require_once('supercontroller.php');

class Financeiro extends Supercontroller {
    
    protected $nome_controller = 'financeiro';
    private $translateMonth = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
    
    function Financeiro() {
        parent::Supercontroller();
        
        //autenticação
        if(!$this->session->userdata('logged_in')) {
            $msg = $this->lang->line('erro.login');
            $this->session->set_flashdata('erro', $msg);
            redirect('login', 'refresh');
        }
        if ($this->session->userdata('nivel') != NIVEL_ROOT && $this->session->userdata('nivel') != NIVEL_PROFESSOR) {
            redirect('painel', 'refresh');
        }
        
        $this->set_modelo('despesa');
        
        $this->lang->load('financeiro');
        $this->load->library('financeiro_hpilates');
    }
    
    function index() {

        $data['titulo'] = $this->lang->line('menu.financeiro');
        
        $pagamento = $this->pagamento;
        $data['pagamento'] = $pagamento;
        
        $despesa = $this->despesa;
        $data['despesa'] = $despesa;
        
        $month = intval(date('m'));
        $year = intval(date('Y'));
        $data['mes'] = $month;
        $data['ano'] = $year;

        $data['descricao_data'] = $this->translateMonth[$month - 1] . ' ' . $year;
        
        $estudio = $this->estudio;
        $colecao_estudios = array();
        if ($this->session->userdata('nivel') == NIVEL_PROFESSOR) {
            $professor = $this->professor;
            $professor->set_id_usuario($this->session->userdata('id'));
            $professor->retrieve();
            $colecao_estudios = $professor->get_estudios_full();
        } else if ($this->session->userdata('nivel') == NIVEL_ROOT) {
            $colecao_estudios = $estudio->search();
        }
        $data['estudios'] = $colecao_estudios;
        
        
        $this->add_script_src('financeiro');
        
        $this->visao('financeiro/painel', $data);
    }
    
    function painel($mes, $ano){

        $mes = intval($mes);
        $ano = intval($ano);
        
        $data['titulo'] = $this->lang->line('menu.financeiro');
        
        $pagamento = $this->pagamento;
        $data['pagamento'] = $pagamento;
        
        $despesa = $this->despesa;
        $data['despesa'] = $despesa;
        
        $data['mes'] = $mes;
        $data['ano'] = $ano;

        $data['descricao_data'] = $this->translateMonth[$mes -1] . ' ' . $ano;
        
        $estudio = $this->estudio;
        $colecao_estudios = array();
        if ($this->session->userdata('nivel') == NIVEL_PROFESSOR) {
            $professor = $this->professor;
            $professor->set_id_usuario($this->session->userdata('id'));
            $professor->retrieve();
            $colecao_estudios = $professor->get_estudios_full();
        } else if ($this->session->userdata('nivel') == NIVEL_ROOT) {
            $colecao_estudios = $estudio->search();
        }
        $data['estudios'] = $colecao_estudios;
        
        
        $colecao_despesa = $despesa->busca_mes($mes, $ano);
        $data['despesas'] = $colecao_despesa;
        
        $this->add_script_src('financeiro');
        
        $this->visao('financeiro/painel', $data);
    }
    
    /**
     * Nova transa��o
     * 
     */
    function novo(){
        $data['titulo'] = $this->lang->line('financeiro.form.title');
        
        $aluno = $this->aluno;
        $colecao_alunos = $aluno->search();
        $data['alunos'] = $colecao_alunos;
        
        $pagamento = $this->pagamento;
        $data['pagamento'] = $pagamento;
        
        $data['aluno'] = $aluno;
        
        $this->add_script_src('financeiro');
        
        $this->visao('financeiro/form', $data);
    }
    
    function editar($id_pagamento)
    {
        $data['titulo'] = 'Editar pagamento';
        
        $aluno = $this->aluno;
        $colecao_alunos = $aluno->search();
        $data['alunos'] = $colecao_alunos;
        
        $pagamento = $this->pagamento;
        $pagamento->set_id($id_pagamento);
        $pagamento->retrieve();
        $data['pagamento'] = $pagamento;
        
        $aluno->set_id($pagamento->get_id_aluno());
        $aluno->retrieve();
        $data['aluno'] = $aluno;
        
        $this->add_script_src('financeiro');
        
        $this->visao('financeiro/form', $data);
    }
    
    function aulas_em_aberto($id_aluno){
        $id_aluno = intval($id_aluno);
        $aluno = $this->aluno;
        $aluno->set_id($id_aluno);
        $aluno->retrieve();
        
        $data['aluno'] = $aluno;

        // Busca valor das aulas inviduais da configuração
        $configs = $this->vnix_config;
        $valoresAula = $configs->get_valores_aula();
        $data['valor_individual'] = $valoresAula[0]->get_valor();
        $data['valor_dupla'] = $valoresAula[1]->get_valor();

        if($aluno->get_nome()){

            if ($aluno->get_valor_aula() != 0){
                $data['valor_individual'] = $aluno->get_valor_aula();
                $data['valor_dupla'] = $aluno->get_valor_aula();
            }

            $lista_eventos = array();
            
            $evento = $this->evento;
            $lista_eventos = $evento->busca_aulas_em_aberto($aluno->get_id());
            
            
            $data['lista_eventos_pagos'] = array();
            $id_pagamento = $this->input->post('id_pagamento');
            if ($id_pagamento) {
                $pagamento = $this->pagamento;
                $pagamento->set_id($id_pagamento);
                $pagamento->retrieve();
                
                $evento1 = $evento->factory();
                $evento1->set_id_aluno1($aluno->get_id());
                $evento1->set_id_pagamento_aluno1($pagamento->get_id());
                
                $lista_eventos_pagos = $evento1->search();
                
                
                if (count($lista_eventos_pagos) == 0) {
                    $evento2 = $evento->factory();
                    $evento2->set_id_aluno2($aluno->get_id());
                    $evento2->set_id_pagamento_aluno2($pagamento->get_id());
                    
                    $lista_eventos_pagos = $evento2->search();
                }
                $data['lista_eventos_pagos'] = $lista_eventos_pagos;
            }
            $data['lista_eventos'] = $lista_eventos;
        }

        $this->load->view('financeiro/aulas_em_aberto', $data);
    }
    
    function processar($id_pagamento = NULL)
    {
        $pagamento = $this->pagamento;
        if (NULL !== $id_pagamento) {
            $pagamento->set_id($id_pagamento);
            $pagamento->retrieve();
            $id_aluno = $pagamento->get_id_aluno();
            
            $eventos = $pagamento->get_eventos();
            
            foreach ($eventos as $item_evento) {
                if ($item_evento->get_id_aluno1() == $pagamento->get_id_aluno()) {
                    $item_evento->set_idpago_aluno1(NAO);
                    $item_evento->set_id_pagamento_aluno1(NULL);
                    $item_evento->update();
                } else {
                    $item_evento->set_idpago_aluno2(NAO);
                    $item_evento->set_id_pagamento_aluno2(NULL);
                    $item_evento->update();
                }
            }
            
        } else {
            $id_aluno = intval($this->input->post('id_aluno'));
        }
        
        $data_pagamento = $this->input->post('data_pagamento');
        if ('' == $data_pagamento) {
            $data_pagamento = $this->datas->hoje_mysql();
        } else {
            $data_pagamento = $this->datas->normal_para_mysql($data_pagamento);
        }
        
        if ($id_aluno) {
                
            $aluno = $this->aluno;
            $aluno->set_id($id_aluno);
            $aluno->retrieve();
            
            if ($aluno->get_nome()) {
                    
                $array_id_evento = $this->input->post('cb_evento');
                
                if (!is_array($array_id_evento)) {
                    $array_id_evento = array();
                }
                
                $total_aulas = count($array_id_evento); 
                if($total_aulas > 0){
                    
                    foreach ($array_id_evento as $id_evento) {
                        $evento = $this->evento;
                        $evento->set_id(intval($id_evento));
                        $evento->retrieve();
                        
                        if ($aluno->get_id() == $evento->get_id_aluno1()) {
                            $evento->set_idpago_aluno1(SIM);
                        } else if ($aluno->get_id() == $evento->get_id_aluno2()) {
                            $evento->set_idpago_aluno2(SIM);
                        }
                        
                        $evento->update();
                    }
                    
                    $valor = $this->input->post('valor_pago');
                    
                    $especie = intval($this->input->post('especie'));
                    
                    
                    $pagamento->set_id_aluno($aluno->get_id());
                    $pagamento->set_numero_aulas($total_aulas);
                    $pagamento->set_hora_aula($aluno->get_valor_aula());
                    $pagamento->set_desconto(0);//TODO descontos
                    $pagamento->set_data_pagamento($data_pagamento);
                    $pagamento->set_valor($valor);
                    $pagamento->set_especie($especie);
                    if (ESPECIE_CHEQUE == $especie) {
                        $pagamento->set_cheque_nome($this->input->post('cheque_nome'));
                        $pagamento->set_cheque_banco($this->input->post('cheque_banco'));
                        $pagamento->set_cheque_agencia($this->input->post('cheque_agencia'));
                        $pagamento->set_cheque_conta($this->input->post('cheque_conta'));
                        $pagamento->set_cheque_numero($this->input->post('cheque_numero'));
                    } else {
                        $pagamento->set_cheque_nome(NULL);
                        $pagamento->set_cheque_banco(NULL);
                        $pagamento->set_cheque_agencia(NULL);
                        $pagamento->set_cheque_conta(NULL);
                        $pagamento->set_cheque_numero(NULL);
                    }
                    $pagamento->set_deleted(NAO);
                    
                    if (NULL == $id_pagamento) {
                        $result = $pagamento->create();
                    } else {
                        $result = $pagamento->update();
                        
                    }
                    
                    foreach ($array_id_evento as $id_evento) {
                        $evento = $this->evento;
                        $evento->set_id(intval($id_evento));
                        $evento->retrieve();
                        
                        if ($aluno->get_id() == $evento->get_id_aluno1()) {
                            $evento->set_id_pagamento_aluno1($pagamento->get_id());
                        } else if ($aluno->get_id() == $evento->get_id_aluno2()) {
                            $evento->set_id_pagamento_aluno2($pagamento->get_id());
                        }
                        
                        $evento->update();
                    }
                    
                    if ($result) {
                        $msg = $this->lang->line('financeiro.sucesso');
                        $msg_type = MESSAGE_TYPE_SUCCESS;
                    } else {
                        $msg = $this->lang->line('financeiro.erro_processar');
                        $msg_type = MESSAGE_TYPE_ERROR;
                    }
                    
                } else {
                    $msg = $this->lang->line('financeiro.erro.nenhuma_aula');
                    $msg_type = MESSAGE_TYPE_ERROR;
                }
                
            } else {
                $msg = $this->lang->line('financeiro.erro.aluno_nao_existe');
                $msg_type = MESSAGE_TYPE_ERROR;
            }
            
        } else {
            $msg = $this->lang->line('financeiro.erro.parametros_faltando');
            $msg_type = MESSAGE_TYPE_ERROR;
        }
        $this->session->set_flashdata($msg_type, $msg);
        redirect('financeiro', 'refresh');
    }
    
    /**
     * Controller para uma nova despesa
     *
     *
     * @return void
     */
    function nova_despesa()
    {
        $data['titulo'] = $this->lang->line('financeiro.form_despesa.title');
        
        $despesa = $this->despesa;
        $data['despesa'] = $despesa;
        
        $aluno = $this->aluno;
        $colecao_alunos = $aluno->search();
        $data['alunos'] = $colecao_alunos;
        
        $estudio = $this->estudio;
        $colecao_estudios = $estudio->search();
        $data['estudios'] = $colecao_estudios;
        
        $this->add_script_src('financeiro');
        
        $this->visao('financeiro/form_despesa', $data);
    }
    
    /**
     * Processa uma despesa
     */
    function processar_despesa($id_despesa = NULL)
    {
        $data_despesa = $this->input->post('data');
        $valor = $this->input->post('valor');
        $descr = $this->input->post('descr');
        $id_estudio = $this->input->post('id_estudio');
        
        
        if ('' != $data_despesa && '' != $valor && '' != $descr && '' != $id_estudio) {
            
            $despesa = $this->despesa;
            $despesa->set_data($this->datas->normal_para_mysql($data_despesa));
            $despesa->set_descr($descr);
            $despesa->set_valor($valor);
            $despesa->set_id_estudio($id_estudio);
            $despesa->set_deleted(NAO);
            
            if (NULL !== $id_despesa) {
                $despesa->set_id($id_despesa);
                $resultado = $despesa->update();
            } else {
                $resultado = $despesa->create();
            }
            
            
            if ($resultado) {
                $msg = $this->lang->line('financeiro.despesa.sucesso');
                $this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
            } else {
                $msg = $this->lang->line('financeiro.despesa.erro');
                $this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
            }
            redirect('financeiro', 'refresh');
            
        } else {
            $msg = $this->lang->line('financeiro.despesa.erro.parametros_faltando');
            $this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
            redirect('financeiro', 'refresh');
        }
    }
    
    function editar_despesa($id_despesa)
    {
        $data['titulo'] = $this->lang->line('financeiro.form_despesa.title');
        
        $despesa = $this->despesa;
        $despesa->set_id($id_despesa);
        $despesa->retrieve();
        
        $data['despesa'] = $despesa;
        
        $aluno = $this->aluno;
        $colecao_alunos = $aluno->search();
        $data['alunos'] = $colecao_alunos;
        
        $estudio = $this->estudio;
        $colecao_estudios = $estudio->search();
        $data['estudios'] = $colecao_estudios;
        
        $this->add_script_src('financeiro');
        
        $this->visao('financeiro/form_despesa', $data);
    }
    
    function remover_despesa($id_despesa)
    {
        $despesa = $this->despesa;
        $despesa->set_id($id_despesa);
        $resultado = $despesa->delete();
        
        echo '<p class="msg msg-ok">Despesa removida, ' . anchor('financeiro', 'recarregue') . ' a p&aacute;gina para refazer o c&aacute;lculo</p>';
    }
    
    function remover_pagamento($id_pagamento) {
        $pagamento = $this->pagamento;
        $pagamento->set_id($id_pagamento);
        $pagamento->retrieve();
        
        $lista_eventos = $pagamento->get_eventos();
        if (count($lista_eventos)) {
            foreach ($lista_eventos as $item_evento) {
                if ($pagamento->get_id_aluno() == $item_evento->get_id_aluno1()) {
                    $item_evento->set_idpago_aluno1(NAO);
                    $item_evento->set_id_pagamento_aluno1(NULL);
                    $item_evento->update();
                } else {
                    $item_evento->set_idpago_aluno2(NAO);
                    $item_evento->set_id_pagamento_aluno2(NULL);
                    $item_evento->update();
                }
            }
        }
        $pagamento->delete();

        redirect(base_url() . 'financeiro/');
        echo '<p class="msg msg-ok">Pagamento removido, ' . anchor('financeiro', 'recarregue') . ' a p&aacute;gina para refazer o c&aacute;lculo</p>';
    }
    
    function lista_pagamentos($id_estudio)
    {
        $estudio = $this->estudio;
        $estudio->set_id($id_estudio);
        $estudio->retrieve();
        
        $pagamento = $this->pagamento;
        
        $mes = intval($this->input->post('mes'));
        $ano = intval($this->input->post('ano'));
        
        $pagamentos = $pagamento->busca_mes($mes, $ano, $estudio->get_id());
        $data['pagamentos'] = $pagamentos;
        
        $data['ano'] = $ano;
        $data['mes'] = $mes;
        
        $this->load->view('financeiro/lista_pagamentos', $data);
    }
        
}

/* End of file financeiro.php */
/* Location: ./system/application/controllers/financeiro.php */