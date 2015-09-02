<?php
require_once('supermodel.php');
/**
 * Classe modelo usu�rio
 * @author vinik
 *
 */
class Usuario extends Supermodel
{
	/**
	 * Chave prim�ria
	 * @var int
	 */
	var $id = null;

	/**
	 * Nome de usu�rio
	 * @var string
	 */
	var $username = null;

	/**
	 * Senha do usu�rio
	 * @var string
	 */
	var $senha = null;

	/**
	 * Email do usu�rio
	 * @var string
	 */
	var $email = null;

	/**
	 * Nome do usu�rio
	 * @var string
	 */
	var $nome = null;

	/**
	 * Avatar do usu�rio
	 * @var string
	 */
	var $avatar = null;

	/**
	 * Data de nascimento
	 */
	var $data_nascimento = NULL;

	/**
	 * N�vel de acesso
	 */
	var $nivel = NULL;


	/**
	 * Construtor da classe
	 */
	function Usuario()
	{
		parent::Supermodel();

		$this->set_table_name('usuario');
		$this->set_fields('username,email,senha,nome,data_nascimento,nivel,avatar');
		$this->set_key('id');
	}


	function get_id(){
		return $this->id;
	}
	function set_id($i){
		$this->id = $i;
	}
	function get_username(){
		return $this->username;
	}
	function set_username($u){$this->username = $u;}
	function get_senha(){return $this->senha;}
	function set_senha($p){$this->senha = $p;}

	function get_email(){return $this->email;}

	function set_email($e){$this->email = $e;}

	/**
	 * getter do nome
	 * @return string
	 */
	function get_nome(){
		return $this->nome;
	}

	/**
	 * setter do nome
	 * @param $n string
	 */
	function set_nome($n){
		$this->nome = $n;
	}

	/**
	 * getter do avatar
	 * @return string
	 */
	function get_avatar(){
		return $this->avatar;
	}

	/**
	 * setter do avatar
	 * @param $a string
	 */
	function set_avatar($a){
		$this->avatar = $a;
	}

	/**
	 * getter do nivel
	 * @return int
	 */
	function get_nivel(){
		return $this->nivel;
	}

	/**
	 * setter do nivel
	 * @param $n int
	 */
	function set_nivel($n){
		$this->nivel = $n;
	}

	/**
	 * getter da data de nascimento
	 * @return date
	 */
	function get_data_nascimento(){
		return $this->data_nascimento;
	}

	/**
	 * setter da data de nascimento
	 * @param $d date
	 */
	function set_data_nascimento($d){
		$this->data_nascimento = $d;
	}



	function get_avatar_full(){
		return img(array('src' => site_url('usuario/avatar/' . $this->get_id_usuario()), 'width' => 100, 'title' => $this->get_nome()));
		/*
		if(file_exists('./uploads/'.$this->avatar)){
			$caminho = base_url().'uploads/'.$this->avatar;
			return img(array('src' => $caminho, 'width' => 100, 'title' => $this->get_nome()));

		} else {
			$avt =  img(array('src' => base_url().'img/profile_user_default.jpg', 'title' => htmlentities($this->get_nome()), 'width' => 100));
			return $avt;
		}
		*/
	}



	function get_nivel_acesso(){
		$niveis = array(
            NIVEL_ZERO => '',
			NIVEL_ALUNO => 'Aluno',
			NIVEL_PROFESSOR => 'Professor',
			NIVEL_ROOT => 'Administrador'
		);
		return $niveis[$this->nivel];
	}

/**
	 * Remove um objeto da base
	 * @return boolean
	 */
	function delete(){

		//$this->db->delete($this->table_name, array('id' => $this->get_id()));
		return TRUE;
	}

	function busca_por_periodo($data_inicio = NULL, $data_fim = NULL, $id_estudio = NULL, $params = FALSE){




		if(NULL != $data_inicio){
			$arr_inicio = explode('-', $data_inicio);
			$mes_inicio = $arr_inicio[1];
			$dia_inicio = $arr_inicio[2];
			$this->db->where('DATE_FORMAT(data_nascimento, \'%m-%d\') >=', $mes_inicio . '-' . $dia_inicio);
		}
		if(NULL != $data_fim){
			$arr_fim = explode('-', $data_fim);
			$mes_fim = $arr_fim[1];
			$dia_fim = $arr_fim[2];
			$this->db->where('DATE_FORMAT(data_nascimento, \'%m-%d\') <=', $mes_fim . '-' . $dia_fim);
		}

		if (NULL != $id_estudio) {
			$this->db->join('aluno', 'usuario.id=aluno.id_usuario');
			$this->db->where('aluno.id_estudio', $id_estudio);
		}



		$colecao =  $this->search($params);
		//die($this->db->last_query());
		return $colecao;
	}

}
