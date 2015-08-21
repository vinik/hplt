<div>
	
	<?php 
	echo form_open('configs/processar', array('id' => 'frmCfgGerais'));
	?>
	<fieldset>
		<legend><?php echo $this->lang->line('configs.gerais.title'); ?></legend>
		<table>
			<tbody>
				
				<tr>
					<th>
						<label><?php echo $this->lang->line('configs.inicio_expediente'); ?></label>
					</th>
					<td>
						<?php 
						echo select_horas('inicio_expediente', INTERVALO_SELECT_PADRAO,  $config_array[CONFIG_INICIO_EXPEDIENTE]['valor'], 'class="input-text"');
						?>
						
					</td>
				</tr>
				<tr>
					<th>
						<label><?php echo $this->lang->line('configs.intervalo_campo_horas'); ?></label>
					</th>
					<td>
						<?php 
						$opt_intervalo = array(
							'1'	=>	'1',
							'2'	=>	'2',
							'3'	=>	'3',
							'4'	=>	'4',
							'5'	=>	'5',
							'6'	=>	'6',
							'10'	=>	'10',
							'12'	=>	'12',
							'15'	=>	'15',
							'20'	=>	'20',
							'30'	=>	'30',
							'60'	=>	'60',
						);
						echo form_dropdown(
							$config_array[CONFIG_INTERVALO_CAMPO_HORAS]['nome'], $opt_intervalo, $config_array[CONFIG_INTERVALO_CAMPO_HORAS]['valor'], 'class="input-text"');
						?>
					</td>
				</tr>
				<tr>
					<th>
						<label><?php echo $this->lang->line('configs.valor_aula_padrao'); ?></label>
					</th>
					<td>
						<?php 
						echo form_input(array(
							'name'	=>	$config_array[CONFIG_VALOR_PADRAO_AULA]['nome'],
							'id'	=>	'',
							'value'	=>	$config_array[CONFIG_VALOR_PADRAO_AULA]['valor'],
							'class'	=>	'input-text',
							'size'	=>	'10',
							'maxlength'	=>	'10'
						));
						?>
					</td>
				</tr>
			</tbody>
		</table>
		
	</fieldset>
	<input type="submit" value="Enviar" class="input-submit">
	<?php 
	echo form_close();
	?>
</div>