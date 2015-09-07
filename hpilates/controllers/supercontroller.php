<?php

/**
 * Classe base para todos os controllers
 * @author vinik
 *
 */
class Supercontroller extends Controller {

    /**
     * @var array
     */
    protected  $script_src = array();

    /**
     * @var array
     */
    protected  $scripts = array();

    /**
     * @var array
     */
    protected $estilos = array();

    /**
     * Modelo a ser mostrado no controller
     * @var string
     */
    protected $modelo = 'supermodel';

    protected $nome_controller = 'supercontroller';

    /**
     * Se o módulo requer autenticação
     * @var boolean
     */
    protected $autenticado = false;

    protected $campos_lista = array();

    /**
     * Construtor
     * @return void
     */
    function Supercontroller()
    {
        parent::Controller();
    }

    function get_nome_controller(){
        return $this->nome_controller;
    }

    function set_nome_controller($n){
        $this->nome_controller = $n;
    }

    function get_campos_lista(){
        return $this->campos_lista;
    }

    function set_campos_lista($c){
        $this->campos_lista = $c;
    }

    function add_script_src($script){
        array_push($this->script_src, $script);
    }

    function empty_script_src(){
        $this->script_src = array();
    }

    function add_script($nome_arquivo_scripts){
        array_push($this->scripts, $nome_arquivo_scripts);
    }

    function empty_scripts(){
        $this->scripts = array();
    }

    function get_modelo(){
        return $this->modelo;
    }

    function set_modelo($modelo){
        $this->modelo = $modelo;
    }

    function visao($nome, $dados = array()){

        $header = array(
            'script_src' => $this->script_src,
            'scripts' => $this->scripts,
            'estilos' => $this->estilos
        );

        $this->load->view('head', $header);

        $this->load->view('topo', $dados);

        $this->load->view($nome, $dados);

        $this->load->view('rodape');
    }

    function lista(){
        $nome_modelo = $this->modelo;
        $nome_controller = $this->nome_controller;
        $nome_modelo = $this->$nome_modelo;
        $colecao = $nome_modelo->search();
        $data['colecao_' . $nome_modelo] = $colecao;
        $this->visao($nome_modelo . '/lista', $data);
    }

    function novo(){
        $nome_modelo = $this->modelo;
        $data[$nome_modelo] = NULL;
        $this->visao($nome_modelo . '/form', $data);
    }

    function editar($id){
        $nome_modelo = $this->modelo;
        $nome_modelo = $this->$nome_modelo;
        $nome_modelo->set_id($id);
        $nome_modelo->retrieve();

        $data[$nome_modelo] = $nome_modelo;

        $this->visao($nome_modelo . '/form', $data);
    }

    /**
     * Processa a edição de um objeto
     */
    function processar($id = NULL){
        $nome_modelo = $this->modelo;
        $nome_modelo = $this->$nome_modelo;

        $nome_controller = $this->nome_controller;

        $campos = $nome_modelo->get_fields_arr();

        foreach($campos as $campo){
            $$campo = $this->input->post($campo);
        }

        $data[$nome_modelo->get_key()] = $id;
        foreach($campos as $campo){
            $data[$campo] = $$campo;
        }

        $msg = '';

        $nome_modelo->populate($data);
        if($nome_modelo->validate()){
            if(NULL !== $id){
                $resultado = $nome_modelo->update();
                if($resultado){
                    $msg = $this->lang->line('sucesso.atualizar_objeto');
                    $this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
                    redirect($nome_controller . '/lista', 'refresh');
                } else {
                    $msg = $this->lang->line('erro.atualizar_objeto');
                    $this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
                    redirect($nome_controller . '/editar/' . $id, 'refresh');
                }
            } else {
                $resultado = $nome_modelo->create();
                if($resultado){
                    $msg = $this->lang->line('sucesso.criar_objeto');
                    $this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
                    redirect($nome_controller . '/lista', 'refresh');
                } else {
                    $msg = $this->lang->line('erro.criar_objeto');
                    $this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
                    redirect($nome_controller . '/novo', 'refresh');
                }
            }
        } else {
            $msg = $nome_modelo->get_erros();
            $this->session->set_flashdata(MESSAGE_TYPE_ERROR, implode(br(), $msg));
            if(NULL !== $id){
                redirect($nome_controller . '/editar/' . $id, 'refresh');
            } else {
                redirect($nome_controller . '/novo', 'refresh');
            }
        }
    }

    /**
     * Remove um objeto
     * @param $id
     * @return void
     * @todo verificar se o usuário tem permissão para remover
     */
    function remover($id){
        $nome_controller = $this->nome_controller;
        $nome_modelo = $this->modelo;
        $nome_modelo = $this->$nome_modelo;
        $nome_modelo->set_id($id);
        $nome_modelo->retrieve();

        $resultado = $nome_modelo->delete();

        if($resultado){
            $msg = $this->lang->line('sucesso.remover_objeto');
            $this->session->set_flashdata(MESSAGE_TYPE_SUCCESS, $msg);
            redirect($nome_controller . '/lista', 'refresh');
        } else {
            $msg = $this->lang->line('erro.remover_objeto');
            $this->session->set_flashdata(MESSAGE_TYPE_ERROR, $msg);
            redirect($nome_controller . '/lista', 'refresh');
        }
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
