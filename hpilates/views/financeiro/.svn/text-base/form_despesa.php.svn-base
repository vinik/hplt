<?php
/**
 * Formulário de despesa
 */

if ($despesa->get_id()) {
	$action = 'financeiro/processar_despesa/' . $despesa->get_id();
} else {
	$action = 'financeiro/processar_despesa';
	$despesa->set_data(date(FORMATO_DATA_MYSQL));
}

$opt_estudios = array('' => '');

if (count($estudios)) {
	foreach ($estudios as $item_estudio) {
		$opt_estudios[$item_estudio->get_id()] = $item_estudio->get_nome();
	}
}

?>

<?php 
echo form_open($action, 'id="frmDespesa" ');
?>
<div >
	<fieldset>
		<legend><?php echo $this->lang->line('financeiro.form.aluno'); ?></legend>
		<table>
			<tbody>
				<tr>
					<th>
						<label for="selEstudio"><?php echo $this->lang->line('financeiro.form.despesa.estudio'); ?></label>
					</th>
					<td>
						<?php echo form_dropdown('id_estudio', $opt_estudios, $despesa->get_id_estudio(), 'id="selEstudio" class="input-text REQUIRED" title="' . $this->lang->line('financeiro.form.despesa.estudio') . '"'); ?>
					</td>
				</tr>
				<tr>
					<th>
						<label for="txtData"><?php echo $this->lang->line('financeiro.form.despesa.data'); ?></label>
					</th>
					<td>
						<input type="text" size="20" name="data" class="input-text DATEFIELD REQUIRED" value="<?php echo $this->datas->mysql_para_normal($despesa->get_data()); ?>" id="txtData"  maxlength="10" maxsize="10" title="<?php echo $this->lang->line('financeiro.form.despesa.data'); ?>"/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="txtValor"><?php echo $this->lang->line('financeiro.form.despesa.valor'); ?></label>
					</th>
					<td>
						<input type="text" size="10" name="valor" class="input-text REQUIRED" value="<?php echo $despesa->get_valor(); ?>" id="txtValor"  maxlength="10" maxsize="10" title="<?php echo $this->lang->line('financeiro.form.despesa.valor'); ?>"/>
					</td>
				</tr>
				<tr>
					<th>
						<label for="txtDescricao"><?php echo $this->lang->line('financeiro.form.despesa.descricao'); ?></label>
					</th>
					<td>
						<input type="text" size="60" name="descr" class="input-text REQUIRED" value="<?php echo $despesa->get_descr(); ?>" id="txtValor"  maxlength="255" maxsize="255" title="<?php echo $this->lang->line('financeiro.form.despesa.descricao'); ?>"/>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
		
	
</div>
	

<input type="submit" id="btnEnviar" value="Gerar despesa"/>

<?php 
echo form_close(br(2));
?>