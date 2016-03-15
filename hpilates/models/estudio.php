<?php

require_once('supermodel.php');

/**
 * Classe modelo Estudio
 * @author vinik
 * campos
 * 
 * 
CREATE TABLE `estudio` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(128) NOT NULL,
  `endereco` varchar(255) default NULL,
  `telefone` varchar(32) default NULL,
  `cdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1

 */
class Estudio extends Supermodel
{

    var $id;
    var $nome;
    var $telefone;
    var $endereco;
    var $deleted;
    var $foto;

    var $valor_padrao_aula;
    var $valor_padrao_aula_dupla;
    /**
     * Construtor do objeto
     */
    function Estudio()
    {
        parent::Supermodel();

        $this->set_table_name('estudio');
        $this->set_fields('nome,endereco,telefone,deleted,foto,valor_padrao_aula,valor_padrao_aula_dupla');
        $this->set_key('id');
    }

    function get_valor_padrao_aula() {
        return $this->valor_padrao_aula;
    }
    function get_valor_padrao_aula_dupla(){
        return $this->valor_padrao_aula_dupla;
    }

    function set_valor_padrao_aula($valorAula){ 
        $this->valor_padrao_aula = $valorAula;
    }
    function set_valor_padrao_aula_dupla($valorDupla){
        $this->valor_padrao_aula_dupla = $valorDupla;
    }

    function get_id(){
        return $this->id;
    }
    function set_id($id){
        $this->id = $id;
    }
    function get_nome(){
        return $this->nome;
    }
    function set_nome($nome){
        $this->nome = $nome;
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
    function get_foto()
    {
        return $this->foto;
    }
    function set_foto($f)
    {
        $this->foto = $f;
    }


    
    function get_foto_full(){
        if(file_exists('./uploads/estudios/'.$this->foto)){
            $caminho = base_url().'uploads/estudios/'.$this->foto;
            return img(array('src' => $caminho, 'width' => 100, 'alt' => $this->get_nome(), 'title' => $this->get_nome()));
            
        } else {
            $avt =  img(base_url().'uploads/default_avatar.jpg');
            return $avt;
        }
    }
    
    function delete()
    {
        $this->retrieve();
        $this->set_deleted(SIM);
        return $this->update();
    }


    function search()
    {
        $this->db->where('deleted', NAO);
        return parent::search(array('order_by' => 'nome'));
    }

    function searchById()
    {
        $this->db->where('id', $this->get_id());
        return parent::search();
    }
    
    function get_professores()
    {
        $professores = array();
        
        $this->db->select('id_professor');
        $this->db->where('id_estudio', $this->get_id());
        $query = $this->db->get('professor_estudio_xref');
        
        foreach ($query->result_array() as $row)
        {
            array_push($professores, $row['id_professor']);
        }
        
        return $professores;
    }
    
    function factory()
    {
        return new Estudio();
    }

}
