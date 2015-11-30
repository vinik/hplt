<?php

require_once('usuario.php');

/**
 * Classe modelo Aluno
 * @author vinik
 */
class Aluno extends Usuario
{

    /**
     * Campo id
     */
    var $id;
    
    /**
     * Campo profiss�o
     * @var string
     */
    var $profissao;
    
    /**
     * Campo telefone
     */
    var $telefone;
    
    /**
     * Campo endereco
     */
    var $endereco;
    
    /**
     * Objetivo
     * @var string
     */
    var $objetivos;
    
    var $id_estudio;
    
    var $id_usuario;
    
    var $valor_aula;
    
    var $deleted;
    
    
    /**
     * Construtor do objeto
     */
    function Aluno()
    {
        parent::Usuario();

        $this->set_table_name('aluno');
        $this->set_fields('endereco,telefone,profissao,id_estudio,objetivos,id_usuario,valor_aula,deleted');
        $this->set_key('id');
    }

        
    /**
     * Getter do campo id
     * @return id
     */
    function get_id(){
        return $this->id;
    }
    
    /**
     * Setter do campo id
     * @param id
     */
    function set_id($id){
        $this->id = $id;
    }
    
    /**
     * Getter do campo telefone
     * @return telefone
     */
    function get_telefone(){
        return $this->telefone;
    }
    
    /**
     * Setter do campo telefone
     * @param telefone
     */
    function set_telefone($telefone){
        $this->telefone = $telefone;
    }
    
    /**
     * Getter do campo endereco
     * @return endereco
     */
    function get_endereco(){
        return $this->endereco;
    }
    
    /**
     * Setter do campo endereco
     * @param endereco
     */
    function set_endereco($endereco){
        $this->endereco = $endereco;
    }
    
    function get_profissao(){
        return $this->profissao;
    }
    
    function set_profissao($p){
        $this->profissao = $p;
    }
    
    function get_objetivos(){
        return $this->objetivos;
    }
    
    function set_objetivos($o){
        $this->objetivos = $o;
    }
    
    function get_id_estudio(){
        return $this->id_estudio;
    }
    
    function set_id_estudio($i){
        $this->id_estudio = $i;
    }
    
    function get_id_usuario()
    {
        return $this->id_usuario;
    }
    
    function set_id_usuario($i)
    {
        $this->id_usuario = $i;
    }
    
    function get_valor_aula()
    {
        return $this->valor_aula;
    }
    
    function set_valor_aula($v)
    {
        $this->valor_aula = $v;
    }
    
    function get_deleted()
    {
        return $this->deleted;
    }
    
    function set_deleted($d)
    {
        if ($d != NAO) {
            $d = SIM;
        }
        $this->deleted = $d;
    }
    
    function create()
    {
        $dados_usuario['username'] = $this->get_username();
        $dados_usuario['email'] = $this->get_email();
        $dados_usuario['senha'] = $this->get_senha();
        $dados_usuario['nome'] = $this->get_nome();
        $dados_usuario['data_nascimento'] = $this->get_data_nascimento();
        $dados_usuario['nivel'] = NIVEL_ALUNO;
        $dados_usuario['avatar'] = NULL;
        
        $dados_aluno['endereco'] = $this->get_endereco();
        $dados_aluno['telefone'] = $this->get_telefone();
        $dados_aluno['profissao'] = $this->get_profissao();
        $dados_aluno['id_estudio'] = $this->get_id_estudio();
        $dados_aluno['objetivos'] = $this->get_objetivos();
        $dados_aluno['valor_aula'] = $this->get_valor_aula();
        
        $dados_aluno['deleted'] = NAO;
        
        if($this->cdate){
            $stmt = '$dados_usuario[$this->date_field] = $this->get_'.$this->date_field.'();';
            eval($stmt);
        }
        
        $this->db->insert('usuario', $dados_usuario); 
        $id_usuario = $this->db->insert_id();
        $this->set_id_usuario($id_usuario);
        
        $dados_aluno['id_usuario'] = $this->get_id_usuario();
        
        $this->db->insert($this->table_name, $dados_aluno); 
        $id_aluno = $this->db->insert_id();
        $this->set_id($id_aluno);
        
        return TRUE;
    }
    
    function retrieve($by_user = FALSE){
        
        
        $this->db->select('a.id as id,u.nome as nome,u.id as id_usuario,username,email,telefone,endereco,data_nascimento,id_estudio,objetivos,profissao,valor_aula,a.deleted as deleted,u.avatar as avatar ');
        $this->db->join('usuario u', 'u.id = a.id_usuario');
        $this->db->from($this->table_name.' a');
        if (!$by_user) {
            $this->db->where('a.id', $this->get_id());
        } else {
            $this->db->where('a.id_usuario', $this->get_id_usuario());
        }
                
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $row = $query->result();
            $this->set_id(                  $row[0]->id);
            $this->set_nome(                $row[0]->nome);
            $this->set_id_usuario(          $row[0]->id_usuario);
            $this->set_username(            $row[0]->username);
            $this->set_email(               $row[0]->email);
            $this->set_avatar(              $row[0]->avatar);
            $this->set_telefone(            $row[0]->telefone);
            $this->set_endereco(            $row[0]->endereco);
            $this->set_objetivos(           $row[0]->objetivos);
            $this->set_id_estudio(          $row[0]->id_estudio);
            $this->set_profissao(           $row[0]->profissao);
            $this->set_valor_aula(          $row[0]->valor_aula);
            $this->set_deleted(             $row[0]->deleted);
            $this->set_data_nascimento(     $this->datas->mysql_para_normal($row[0]->data_nascimento));
        }
        
        $query->free_result();
        
        return TRUE;
        
    }
    
    function search($params = false){
        $order_by = $this->get_key();
        $order_direction = 'ASC';
        $inicial = 0;
        $total = MAXIMO_RESULTADOS_BUSCA;
        
        if($params !== false){
            if(isset($params['order_by'])){
                $order_by = $params['order_by'];
            }
            if(isset($params['order_direction'])){
                $order_direction = $params['order_direction'];
            }
            if(isset($params['inicial'])){
                $inicial = $params['inicial'];
            }
            if(isset($params['total'])){
                $total = $params['total'];
            }
                
        }
        
        $objs = array();
        
        $this->db->select('a.id as id,u.nome as nome,u.id as id_usuario,username,email,a.telefone,a.endereco,data_nascimento,a.cdate,valor_aula,a.deleted as deleted,u.avatar as avatar ');
        $this->db->join('usuario u', 'u.id = a.id_usuario');
        $this->db->join('estudio e', 'e.id = a.id_estudio');
        $this->db->where('a.deleted', NAO);
        
        if (NULL != $this->get_id_estudio()) {
            $this->db->where('a.id_estudio', $this->get_id_estudio());
        }
        
        
        $this->db->distinct($this->key);
        $this->db->order_by($order_by, $order_direction);
        
        $query = $this->db->get($this->table_name.' a', $total, $inicial);
        if($query->num_rows() > 0){
            foreach ($query->result() as $row)
            {
                $aluno = new Aluno();
                
                $aluno->set_id($row->id);
                $aluno->set_nome($row->nome);
                $aluno->set_id_usuario($row->id_usuario);
                $aluno->set_username($row->username);
                $aluno->set_email($row->email);
                $aluno->set_avatar($row->avatar);
                $aluno->set_telefone($row->telefone);
                $aluno->set_endereco($row->endereco);
                $aluno->set_valor_aula($row->valor_aula);
                $aluno->set_data_nascimento($this->datas->mysql_para_normal($row->data_nascimento));
                array_push($objs, $aluno);
            }
        }
        
        $query->free_result();
        
        return $objs;
    }
    
    function update(){
        $dados_usuario['username'] = $this->get_username();
        $dados_usuario['email'] = $this->get_email();
        $dados_usuario['senha'] = $this->get_senha();
        $dados_usuario['nome'] = $this->get_nome();
        $dados_usuario['data_nascimento'] = $this->get_data_nascimento();
        $dados_usuario['nivel'] = $this->get_nivel();
        
        $dados_aluno['profissao'] = $this->get_profissao();
        $dados_aluno['endereco'] = $this->get_endereco();
        $dados_aluno['telefone'] = $this->get_telefone();
        $dados_aluno['valor_aula'] = $this->get_valor_aula();
        $dados_aluno['deleted'] = $this->get_deleted();
        
        $this->db->where('id', $this->get_id_usuario());
        $this->db->update('usuario', $dados_usuario); 
        
        
        $this->db->where('id', $this->get_id());
        $this->db->update($this->table_name, $dados_aluno); 
        
        return TRUE;
    }
    
    function delete()
    {
        $this->retrieve();
        $this->set_deleted(SIM);
        return $this->update();
    }
    
    function get_avatar_full(){
        return img(array('src' => site_url('alunos/avatar/' . $this->get_id()), 'width' => 100, 'title' => $this->get_nome()));
    }

}
