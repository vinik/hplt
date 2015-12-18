<?php

require_once('usuario.php');

/**
 * Classe modelo Professor
 * @author vinik
 * campos
 * 
 * 
 */

require_once 'estudio.php';


class Professor extends Usuario
{

    var $id;
    var $telefone;
    var $endereco;
    var $id_usuario;
    var $deleted;
    var $username;

    function Professor()
    {
        parent::Supermodel();

        $this->set_table_name('professor');
        $this->set_fields('endereco,telefone,id_usuario,deleted');
        $this->set_key('id');
    }

    function get_id(){
        return $this->id;
    }
    function set_id($id){
        $this->id = $id;
    }
    function get_id_usuario(){
        return $this->id_usuario;
    }
    function set_id_usuario($id){
        $this->id_usuario = $id;
    }
    function get_telefone(){
        return $this->telefone;
    }
    function set_telefone($telefone){
        $this->telefone = $telefone;
    }
    function get_endereco(){
        return $this->endereco;
    }
    function set_endereco($endereco){
        $this->endereco = $endereco;
    }
    function get_username(){
        return $this->username;
    }
    function set_username($username){
        $this->username = $username;
    }
    function get_estudio(){
        return '';
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
    
    function create(){
        $dados_usuario['username'] = $this->get_username();
        $dados_usuario['email'] = $this->get_email();
        $dados_usuario['senha'] = $this->get_senha();
        $dados_usuario['nome'] = $this->get_nome();
        $dados_usuario['data_nascimento'] = $this->get_data_nascimento();
        $dados_usuario['nivel'] = NIVEL_PROFESSOR;
        $dados_usuario['avatar'] = NULL;
        
        $dados_professor['endereco'] = $this->get_endereco();
        $dados_professor['telefone'] = $this->get_telefone();
        $dados_professor['deleted'] = NAO;
        
        if($this->cdate){
            $stmt = '$dados_usuario[$this->date_field] = $this->get_'.$this->date_field.'();';
            eval($stmt);
        }
        
        $this->db->insert('usuario', $dados_usuario); 
        $id_usuario = $this->db->insert_id();
        $this->set_id_usuario($id_usuario);
        
        $dados_professor['id_usuario'] = $this->get_id_usuario();
        
        $this->db->insert($this->table_name, $dados_professor); 
        $id_professor = $this->db->insert_id();
        $this->set_id($id_professor);
        
        return TRUE;
    }
    
    function retrieve(){
        
        $this->db->select('p.id as id, u.nome as nome, u.id as id_usuario, username, email, telefone, endereco, data_nascimento, p.deleted as deleted,u.avatar as avatar, u.senha');
        $this->db->join('usuario u', 'u.id = p.id_usuario');
        $this->db->from($this->table_name.' p');
        
        if (NULL == $this->get_id()) {
            $this->db->where('u.id', $this->get_id_usuario());
        } else {
            $this->db->where('p.id', $this->get_id());
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
            $this->set_deleted(             $row[0]->deleted);
            $this->set_data_nascimento(     $this->datas->mysql_para_normal($row[0]->data_nascimento));
            $this->set_senha(             $row[0]->senha);
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
        
        $this->db->select('p.id as id,u.nome as nome,u.id as id_usuario, username, email, telefone, endereco, data_nascimento, p.deleted as deleted,u.avatar as avatar ');
        $this->db->join('usuario u', 'u.id = p.id_usuario');
        $this->db->distinct($this->key);
        $this->db->where('p.deleted', NAO);
        $this->db->order_by($order_by, $order_direction);
        
        $query = $this->db->get($this->table_name.' p', $total, $inicial);
        if($query->num_rows() > 0){
            foreach ($query->result() as $row)
            {
                $professor = new Professor();
                
                $professor->set_id($row->id);
                $professor->set_nome($row->nome);
                $professor->set_id_usuario($row->id_usuario);
                $professor->set_username($row->username);
                $professor->set_email($row->email);
                $professor->set_telefone($row->telefone);
                $professor->set_endereco($row->endereco);
                $professor->set_deleted($row->deleted);
                $professor->set_avatar($row->avatar);
                $professor->set_data_nascimento($this->datas->mysql_para_normal($row->data_nascimento));
                array_push($objs, $professor);
            }
        }
        
        $query->free_result();
        
        return $objs;
    }
    
    function update(){

        if ($this->get_senha() !== null && $this->get_senha() !== ''){
            $dados_usuario['senha'] = $this->get_senha();
        }
        if ($this->get_username() !== null && $this->get_username() !== ''){
            $dados_usuario['username'] = $this->get_username();
        }

        $dados_usuario['email'] = $this->get_email();
        $dados_usuario['nome'] = $this->get_nome();
        $dados_usuario['data_nascimento'] = $this->get_data_nascimento();
        $dados_usuario['nivel'] = $this->get_nivel();
        
        $dados_professor['endereco'] = $this->get_endereco();
        $dados_professor['telefone'] = $this->get_telefone();
        $dados_professor['deleted'] = $this->get_deleted();
        
        $this->db->where('id', $this->get_id_usuario());
        $this->db->update('usuario', $dados_usuario); 
        
        
        $this->db->where('id', $this->get_id());
        $this->db->update($this->table_name, $dados_professor); 
        
        return TRUE;
    }
    

    function delete()
    {
        $this->retrieve();
        $this->set_deleted(SIM);
        return $this->update();
    }
    
    function zerar_estudios()
    {
        $this->db->delete('professor_estudio_xref', array('id_professor' => $this->get_id()));
    }
    
    function add_estudios($arr_estudios)
    {
        if (count($arr_estudios)) {
            foreach ($arr_estudios as $id_estudio) {
                $data = array(
                    'id_professor'  => $this->get_id(),
                    'id_estudio'    => $id_estudio
                );
                $this->db->insert('professor_estudio_xref', $data);
            }
        }
    }
    
    function get_estudios()
    {
        $estudios = array();
        
        $this->db->select('id_estudio');
        $this->db->where('id_professor', $this->get_id());
        $query = $this->db->get('professor_estudio_xref');
        
        foreach ($query->result_array() as $row)
        {
            array_push($estudios, $row['id_estudio']);
        }
        
        return $estudios;
    }
    
    function get_estudios_full() {
        $estudios = array();

        $this->db->select('xref.id_estudio, e.nome');
        $this->db->from('professor_estudio_xref xref');
        $this->db->join('estudio e', 'xref.id_estudio = e.id');
        $this->db->where('xref.id_professor', $this->get_id());
        $this->db->orderBy('e.nome', 'asc');
        $query = $this->db->get();

        $lista_estudio = $query->result_array();

        if (count($lista_estudio)) {
            foreach ($lista_estudio as $item_estudio) {
                $novo_estudio = new Estudio();
                $novo_estudio->set_id($item_estudio['id_estudio']);
                $novo_estudio->retrieve();
                array_push($estudios, $novo_estudio);
            }
        }

        
        return $estudios;
    }
    
    function get_avatar_full(){
        return img(array('src' => site_url('professores/avatar/' . $this->get_id()), 'width' => 100, 'title' => $this->get_nome()));
    }
    
}
