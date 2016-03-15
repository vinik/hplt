<?php
/**
 * Superclasse para todos os modelos
 * 
 */

/**
 * Modelo Superclasse
 * @author vinik
 */
class Supermodel extends Model
{
	/**
	 * Nome da tabela
	 * @var string
	 */
	var $table_name = '';
	
	/**
	 * Campos da tabela
	 * @var string
	 */
	var $fields = '';
	
	/**
	 * Chave primária da tabela
	 * @var string
	 */
	var $key = '';
	
	/**
	 * Flag se deve gravar a data de cria��o
	 * @var boolean
	 */
	var $cdate = true;
	
	/**
	 * Campo de data de cria��o
	 * @var string
	 */
	var $date_field = 'cdate';
	
	/**
	 * Erros em alguma opera��o
	 * @var array
	 */
	var $erros = array();
	
	/**
	 * construtor
	 */
	function Supermodel(){
		parent::Model();
	}
	
	/**
	 * getter do nome da tabela
	 * @return string nome da tabela
	 */
	function get_table_name(){
		return $this->table_name;
	}
	/**
	 * getter dos campos
	 * @return string campos
	 */
	function get_fields(){
		return $this->fields;
	}
	/**
	 * 
	 */
	function get_fields_arr(){
		$fields = $this->get_fields();
		$arr_fields_exp = explode(',', $fields);
		$arr_fields = array();
		//array_push($arr_fields, $this->get_key());
		foreach($arr_fields_exp as $field){
			array_push($arr_fields, $field);
		}
		if($this->cdate){
			array_push($arr_fields, $this->date_field);
		}
		return $arr_fields;
	}
	
	/**
	 * getter do campo chave primária
	 * @return unknown_type
	 */
	function get_key(){
		return $this->key;
	}
	
	/**
	 * Setter do nome da tabela
	 * @param $n string
	 */
	function set_table_name($n){
		$this->table_name = $n;
	}
	
	/**
	 * Setter dos campos
	 * @param $f string
	 */
	function set_fields($f){
		$this->fields = $f;
	}
	
	/**
	 * Setter da chave primária
	 * @param $k string
	 */
	function set_key($k){
		$this->key = $k;
	}
	
	function get_erros(){
		return $this->erros;
	}
	
	function set_erros($e){
		if(is_array($e)){
			$this->erros = $e;
		} else {
			$this->erros = array($e);
		}
	}
	
	function add_erro($e){
		array_push($this->erros, $e);
	}
	
	function get_cdate(){
		return $this->cdate;
	}
	
	function set_cdate($d){
		$this->cdate = $d;
	}
	
	/* crud methods */
	
	/**
	 * Cria um objeto na base
	 * @return boolean
	 */
	function create(){
	
		$table_fields = explode(',', $this->fields);
		foreach($table_fields as $table_field){
			$stmt = '$data["'.$table_field.'"] = $this->get_'.$table_field.'();';
			eval($stmt);
		}
		
		if($this->cdate){
			$stmt = '$data[$this->date_field] = $this->get_'.$this->date_field.'();';
			eval($stmt);
		}
		
		$this->db->insert($this->table_name, $data); 
		$i = $this->db->insert_id();
		$stmt = '$this->set_'.$this->key.'('.$i.');';
		eval($stmt);
		
		return true;
	}
	
	/**
	 * Atualiza um objeto na base
	 * @return boolean
	 */
	function update(){
		$table_fields = explode(',', $this->fields);
		foreach($table_fields as $table_field){
			//$stmt = "\$data['".$table_field."'] = \$this->db->escape(\$this->get_".$table_field."());";
			$stmt = "\$data['".$table_field."'] = \$this->get_".$table_field."();";
			eval($stmt);
		}
		
		$stmt = "\$this->db->where(\$this->key, \$this->get_".$this->key."());";
		eval($stmt);
		$this->db->update($this->table_name, $data);
		return true; 
	}
	
	/**
	 * Carrega um objeto da base
	 */
	function retrieve(){
	
		$this->db->select($this->fields);
		$this->db->from($this->table_name);
		
		$stmt = "\$this->db->where(\$this->key, \$this->get_".$this->key."());";
		eval($stmt);
		
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			$row = $query->result();
			
			$table_fields = explode(',', $this->fields);
			foreach($table_fields as $table_field){
				$stmt = "\$this->set_".$table_field."(\$row[0]->".$table_field.");";
				eval($stmt);
			}
		}
	}
	
	/**
	 * Remove um objeto da base
	 * @return boolean
	 */
	function delete(){
		
		$stmt = '$this->db->where(\''.$this->key.'\', $this->get_'.$this->key.'());';
		eval($stmt);
		$this->db->delete($this->table_name);
		return true;
	}
	
	/**
	 * Busca uma cole��o de objetos semelhantes a este
	 * @param $params array par�metros de ordena��o e pagina��o
	 * @return array Cole��o
	 */
	function search($params = FALSE){

		$order_by = $this->get_key();
		$order_direction = 'ASC';
		$inicial = 0;
		$total = MAXIMO_RESULTADOS_BUSCA;
		
		if($params !== FALSE){
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
		$table_fields = explode(',', $this->fields);
		$this->db->select($this->table_name . '.' . $this->key.",".$this->fields);
		foreach($table_fields as $table_field){
			$stmt = '
			if(NULL !== $this->get_'.$table_field.'()){
				$this->db->where("'.$table_field.'", $this->get_'.$table_field.'());
			}';
			eval($stmt);
		}
		$this->db->distinct($this->key);
		$this->db->order_by($order_by, $order_direction);
		
		$query = $this->db->get($this->table_name, $total, $inicial);
		if($query->num_rows() > 0){
			foreach ($query->result() as $row)
			{
				$stmt = "\$obj = new ".get_class($this)."();";
				eval($stmt);
				
				$stmt = "\$obj->set_".$this->key."(\$row->".$this->key.");";
				eval($stmt);
				
				foreach($table_fields as $table_field){
					$stmt = "\$obj->set_".$table_field."(\$row->".$table_field.");";
					eval($stmt);
				}
				array_push($objs, $obj);
			}
		}
		
		$query->free_result();
		
		return $objs;
	}
	
	/**
	 * Preenche o objeto a partir de um array
	 */
	function populate($arr){
		
		$stmt = "\$this->set_".$this->key."(\$arr['".$this->key."']);";
		eval($stmt);
		
		$table_fields = explode(',', $this->fields);
		foreach($table_fields as $table_field){
			$stmt = "\$this->set_".$table_field."(\$arr['".$table_field."']);";
			eval($stmt);
		}
	}
	
	/**
	 * Valida os campos para inser��o
	 */
	function validate(){
		//$this->erros[] = 'Fedeu';
		return TRUE;
	}
	
	function debug(){
		$campos = explode(',', $this->fields);
		
		$arr = array();
		$str = '$arr["' . $this->key . '"] = $this->get_' . $this->key . '();';
		eval($str);
		foreach($campos as $campo){
			$str = '$arr["' . $campo . '"] = $this->get_'.$campo.'();';
			eval($str);
		}
		
		echo "<PRE>";
		print_r($arr);
		echo "</PRE>";
		
	}
	
	function make_list($heading = array(),$fields = array(), $actions = array()){
		
		$make_actions = count($actions) > 0;
		
		$objs = $this->search();
		
		$data = array();
		foreach($objs as $obj){
			$line = array();
			foreach($fields as $field){
				$stmt = '$value = $obj->get_' . $field . '();';
				eval($stmt);
				array_push($line, $value);
			}
			
			if($make_actions){
				$action_buttons = '';
				foreach($actions as $action_icon){
					switch($action_icon){
						case 'edit':
							$action_buttons .= anchor('#', img('images/ico-mini-edit.png'));
							break;
						case 'remove':
							$action_buttons .= anchor('#', img('images/ico-mini-delete.png'));
							break;
						case 'view':
							$action_buttons .= anchor('#', img('images/ico-mini-show.png'));
							break;
					}
				}
				array_push($line, $action_buttons);
			}
			
			array_push($data, $line);
		}
		
		$tmpl = array (
			'table_open'	=>	'<table class="list">',
			
			'heading_row_start'   => '<tr>',
			'heading_row_end'     => '</tr>',
			'heading_cell_start'  => '<th>',
			'heading_cell_end'    => '</th>',
			
			'row_start'           => '<tr>',
			'row_end'             => '</tr>',
			'cell_start'          => '<td>',
			'cell_end'            => '</td>',
			
			'row_alt_start'       => '<tr class="bg">',
			'row_alt_end'         => '</tr>',
			'cell_alt_start'      => '<td>',
			'cell_alt_end'        => '</td>',
			
			'table_close'         => '</table>'
		);
		
		$this->table->set_template($tmpl); 
		
		$this->table->set_heading($heading);

		return $this->table->generate($data); 
		
	}
	
}
