<?php

require_once('supermodel.php');

/**
 * Classe modelo VnixConfig
 * @author vinik
 * campos
 * 
 * 
CREATE TABLE  `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `tipo` int(2) DEFAULT NULL,
  `valor` text,
  `ordem` INT NOT NULL DEFAULT 0,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

 */
class Vnix_config extends Supermodel
{

    /**
     * Campo id
     */
    var $id;
    
    /**
     * Campo nome
     */
    var $nome;
    
    /**
     * Campo tipo
     */
    var $tipo;
    
    /**
     * Campo valor
     */
    var $valor;
    
    /**
     * Campo ordem
     */
    var $ordem;
    
    /**
     * Construtor do objeto
     */
    function Vnix_config()
    {
        parent::Supermodel();

        $this->set_table_name('configs');
        $this->set_fields('nome,tipo,valor,ordem');
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
     * Getter do campo nome
     * @return nome
     */
    function get_nome(){
        return $this->nome;
    }
    
    /**
     * Setter do campo nome
     * @param nome
     */
    function set_nome($nome){
        $this->nome = $nome;
    }
    
    /**
     * Getter do campo tipo
     * 
     * @return tipo
     */
    function get_tipo(){
        return $this->tipo;
    }
    
    /**
     * Setter do campo tipo
     * 
     * @param tipo
     */
    function set_tipo($tipo)
    {
        $this->tipo = $tipo;
    }
    
    /**
     * Getter do campo valor
     * 
     * @return valor
     */
    function get_valor()
    {
        return $this->valor;
    }
    
    /**
     * Setter do campo valor
     * 
     * @param valor
     */
    function set_valor($valor)
    {
        $this->valor = $valor;
    }
    
    /**
     * Getter do campo ordem
     * 
     * @return ordem
     */
    function get_ordem()
    {
        return $this->ordem;
    }
    
    /**
     * Setter do campo ordem
     * 
     * @param ordem
     */
    function set_ordem($ordem)
    {
        $this->ordem = $ordem;
    }
    
    function get_configs()
    {
        $vnix_config = new Vnix_config();
        $cfg_arr = $this->get_config_array();
        $config_size = count($cfg_arr);
        for ($i = 0; $i < $config_size; $i++) {
            $vnix_config->set_nome($cfg_arr[$i]['nome']);
            $db_cfg = $vnix_config->search();
            if(count($db_cfg) > 0){
                $cfg_arr[$i]['valor'] = $db_cfg[0]->get_valor();
            }
        }
        return $cfg_arr;
    }
    
    function get_config_array()
    {
        $cfg = array(
            
            CONFIG_INICIO_EXPEDIENTE    =>  array(
                'ordem' =>  1,
                'nome'  =>  'inicio_expediente',
                'tipo'  =>  TIPO_HORAS,
                'valor' =>  '08:00'
            ),
            
            CONFIG_INTERVALO_CAMPO_HORAS    =>  array(
                'ordem' =>  2,
                'nome'  =>  'intervalo_campo_horas',
                'tipo'  =>  TIPO_SELECT,
                'valor' =>  INTERVALO_SELECT_PADRAO
            )
        );
        
        return $cfg;
    }
    
    /*function create(){
        
        $data['nome'] = $this->get_nome();
        $data['tipo'] = $this->get_tipo();
        $data['valor'] = $this->get_valor();
        $data['ordem'] = $this->get_ordem();
    
        if($this->cdate){
            $data['cdate'] = $this->get_cdate();
            
        }
        
        $this->db->insert($this->table_name, $data); 
        $i = $this->db->insert_id();
        $stmt = '$this->set_'.$this->key.'('.$i.');';
        eval($stmt);
        
        return true;
    }*/
}