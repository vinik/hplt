<?php
/**
 * pagamento.php
 */

require_once 'supermodel.php';
require_once 'aluno.php';

/**
 * Classe modelo Pagamento
 * @author vinik
 * campos
 * 
CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `numero_aulas` int(11) NOT NULL,
  `hora_aula` double NOT NULL,
  `desconto` double NOT NULL,
  `data_pagamento` date NOT NULL,
  `valor` double NOT NULL,
  `especie` int(11) DEFAULT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_pagamento_aluno` (`id_aluno`),
  CONSTRAINT `fk_pagamento_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
 * 
 * 
 * 
id
id_aluno
numero_aulas
hora_aula
desconto
data_pagamento
valor
especie
cdate
 * 
 */
class Pagamento extends Supermodel
{
    
    var $id;
    var $id_aluno;
    var $numero_aulas;
    var $hora_aula;
    var $desconto;
    var $data_pagamento;
    var $valor;
    var $especie;
    
    /**
     * var string
     */
    protected $cheque_nome = NULL;
            
    /**
     * var string
     */
    protected $cheque_banco = NULL;
            
    /**
     * var string
     */
    protected $cheque_agencia = NULL;
            
    /**
     * var string
     */
    protected $cheque_conta = NULL;
    
    /**
     * var string
     */
    protected $cheque_numero = NULL;
    
    
    var $aluno = NULL;
    
    private $deleted;
    
    /**
     * Construtor do objeto
     */
    function Pagamento()
    {
        parent::Supermodel();

        $this->set_table_name('pagamentos');
        $this->set_fields('id_aluno,numero_aulas,hora_aula,desconto,data_pagamento,valor,especie,cheque_nome,cheque_banco,cheque_agencia,cheque_conta,cheque_numero');
        $this->set_key('id');
    }


    /**
     * Getter do campo id
     *
     * @return id
     */
    function get_id()
    {
        return $this->id;
    }
    
    /**
     * Setter do campo id
     *
     * @param id
     *
     * @return void
     */
    function set_id($id)
    {
        $this->id = $id;
    }
    
    /**
     * Getter do campo id_aluno
     *
     * @return id_aluno
     */
    function get_id_aluno()
    {
        return $this->id_aluno;
    }
    
    /**
     * Setter do campo id_aluno
     *
     * @param id_aluno
     *
     * @return void
     */
    function set_id_aluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }
    
    /**
     * Getter do campo numero_aulas
     *
     * @return numero_aulas
     */
    function get_numero_aulas()
    {
        return $this->numero_aulas;
    }
    
    /**
     * Setter do campo numero_aulas
     *
     * @param numero_aulas
     *
     * @return void
     */
    function set_numero_aulas($numero_aulas)
    {
        $this->numero_aulas = $numero_aulas;
    }
    
    /**
     * Getter do campo hora_aula
     *
     * @return hora_aula
     */
    function get_hora_aula()
    {
        return $this->hora_aula;
    }
    
    /**
     * Setter do campo hora_aula
     *
     * @param hora_aula
     *
     * @return void
     */
    function set_hora_aula($hora_aula)
    {
        $this->hora_aula = $hora_aula;
    }
    
    /**
     * Getter do campo desconto
     *
     * @return desconto
     */
    function get_desconto()
    {
        return $this->desconto;
    }
    
    /**
     * Setter do campo desconto
     *
     * @param desconto
     *
     * @return void
     */
    function set_desconto($desconto)
    {
        $this->desconto = $desconto;
    }
    
    /**
     * Getter do campo data_pagamento
     *
     * @return data_pagamento
     */
    function get_data_pagamento()
    {
        return $this->data_pagamento;
    }
    
    /**
     * Setter do campo data_pagamento
     *
     * @param data_pagamento
     *
     * @return void
     */
    function set_data_pagamento($data_pagamento)
    {
        $this->data_pagamento = $data_pagamento;
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
     *
     * @return void
     */
    function set_valor($v)
    {
        $this->valor = $v;
    }
    
    /**
     * Getter do campo especie
     *
     * @return especie
     */
    function get_especie()
    {
        return $this->especie;
    }
    
    /**
     * Setter do campo especie
     *
     * @param especie
     *
     * @return void
     */
    function set_especie($especie)
    {
        $this->especie = $especie;
    }
    
    /**
     * cheque_nome getter
     * 
     * @return string
     */
    function get_cheque_nome()
    {
        return $this->cheque_nome;
    }
    
    /**
     * cheque_nome setter
     * 
     * @param string $cheque_nome
     * 
     * @return void
     */
    function set_cheque_nome($cheque_nome)
    {
        $this->cheque_nome = $cheque_nome;
    }
    
    /**
     * cheque_banco getter
     * 
     * @return string
     */
    function get_cheque_banco()
    {
        return $this->cheque_banco;
    }
    
    /**
     * cheque_banco setter
     * 
     * @param string $cheque_banco
     * 
     * @return void
     */
    function set_cheque_banco($cheque_banco)
    {
        $this->cheque_banco = $cheque_banco;
    }
    
    /**
     * cheque_agencia getter
     * 
     * @return string
     */
    function get_cheque_agencia()
    {
        return $this->cheque_agencia;
    }
    
    /**
     * cheque_agencia setter
     * 
     * @param string $cheque_agencia
     * 
     * @return void
     */
    function set_cheque_agencia($cheque_agencia)
    {
        $this->cheque_agencia = $cheque_agencia;
    }
    
    /**
     * cheque_conta getter
     * 
     * @return string
     */
    function get_cheque_conta()
    {
        return $this->cheque_conta;
    }
    
    /**
     * cheque_conta setter
     * 
     * @param string $cheque_conta
     * 
     * @return void
     */
    function set_cheque_conta($cheque_conta)
    {
        $this->cheque_conta = $cheque_conta;
    }
    
    /**
     * cheque_numero getter
     * 
     * @return string
     */
    function get_cheque_numero()
    {
        return $this->cheque_numero;
    }
    
    /**
     * cheque_numero setter
     * 
     * @param string $cheque_numero
     * 
     * @return void
     */
    function set_cheque_numero($cheque_numero)
    {
        $this->cheque_numero = $cheque_numero;
    }
    
    
    function get_deleted()
    {
        return $this->deleted;
    }
    
    function set_deleted($d)
    {
        $this->deleted = $d == SIM ? SIM : NAO;
    }
    
    function get_aluno()
    {
        
        if(NULL == $this->aluno){
            
            if(NULL == $this->id_aluno){
                return NULL;
            }
            
            $aluno = new Aluno();
            $aluno->set_id($this->get_id_aluno());
            $aluno->retrieve();
            $this->aluno = $aluno;
            
        }
        
        return $this->aluno;
    }
    
/**
     * Busca todas as despesas de um determinado m�s
     *
     * @param long $mes
     * @param long $ano
     * 
     * @return array
     */
    function busca_mes($mes, $ano, $id_estudio = FALSE){
        
        $colecao = array();
        
        $timestamp_inicio = mktime(0, 0, 1, $mes, 1, $ano);
        $timestamp_fim = mktime(23, 59, 59, $mes+1, 0, $ano);
        
        $data_inicio = date(FORMATO_DATA_MYSQL, $timestamp_inicio);
        $data_fim = date(FORMATO_DATA_MYSQL, $timestamp_fim);
        
        $this->db->select($this->get_table_name() . '.id,' . $this->get_fields());
        $this->db->from($this->get_table_name());
        $this->db->join('aluno', 'aluno.id = ' . $this->get_table_name() . '.id_aluno');
        if (FALSE !== $id_estudio) {
            $this->db->where('aluno.id_estudio', $id_estudio);
        }
        $this->db->where('data_pagamento >=', $data_inicio);
        $this->db->where('data_pagamento <=', $data_fim);
        
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            foreach ($query->result_array() as $row) {
                $pagamento = new Pagamento();
                $pagamento->populate($row);
                array_push($colecao,$pagamento);
            }
        }
        
        
        return $colecao;
    }
    
    function total_mes($mes, $ano, $id_estudio = FALSE){
        $total = 0;
        $colecao = $this->busca_mes($mes, $ano, $id_estudio);
        
        if (count($colecao) > 0) {
            foreach ($colecao as $pagamento) {
                $total += $pagamento->get_valor();
            }
        }
        return $total;
    }
    
    function get_eventos()
    {
        $eventos = array();
        
        $evento = $this->evento;
        $evento1 = $evento->factory();
        $evento1->set_id_aluno1($this->get_id_aluno());
        $evento1->set_idpago_aluno1(SIM);
        $evento1->set_id_pagamento_aluno1($this->get_id());
        
        $lista_eventos1 = $evento1->search();
        
        if (count($lista_eventos1)) {
            $eventos = $lista_eventos1;
        } else {
            $evento2 = $evento->factory();
            $evento2->set_id_aluno2($this->get_id_aluno());
            $evento2->set_idpago_aluno2(SIM);
            $evento2->set_id_pagamento_aluno1($this->get_id());
            
            $lista_eventos2 = $evento2->search();
            
            $eventos = $lista_eventos2;
            
        }
        
        return $eventos;
    }
    
}
