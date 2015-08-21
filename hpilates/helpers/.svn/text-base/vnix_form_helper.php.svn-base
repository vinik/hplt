<?php

/**
 * Helper para elementos de formulários
 */

if(! function_exists('select_horas')){
	function select_horas($name = '', $intervalo = 15, $selected = array(), $extra = ''){
		if ( ! is_array($selected))
		{
			$selected = array($selected);
		}

		// If no selected state was submitted we will attempt to set it automatically
		if (count($selected) === 0)
		{
			// If the form name appears in the $_POST array we have a winner!
			if (isset($_POST[$name]))
			{
				$selected = array($_POST[$name]);
			}
		}

		if ($extra != '') $extra = ' '.$extra;

		$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

		$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";
		
		for($horas = 0; $horas < 24; $horas ++){
			$lbl_horas = $horas < 10 ? '0' . $horas : '' . $horas;
			for($i = 0; $i < 60; $i += $intervalo){
				$val_intervalo = $lbl_horas . ':' . (($i < 10) ? '0' . $i : '' . $i);
				$lbl_intervalo = $lbl_horas . ' : ' . (($i< 10) ? '0' . $i : '' . $i);
				$sel = (in_array($val_intervalo, $selected)) ? ' selected="selected"' : '';
				$form .= '<option value="' . $val_intervalo . '" ' . $sel . '>' . $lbl_intervalo . '</option>';
			}
		}
		

		$form .= '</select>';

		return $form;
	}
}

if(! function_exists('make_field')){
	function make_field($data = array(), $tipo = 'input'){
		$field = '';
		switch ($tipo) {
			case TIPO_HORAS:
				$field .= select_horas($data['name'], INTERVALO_SELECT_PADRAO, $data['value'], $data['extras']);
				break;
			case TIPO_SELECT:
				$field .= form_dropdown($data['name'], $data['options'], $data['value']);
		}
		return $field;
	}
}