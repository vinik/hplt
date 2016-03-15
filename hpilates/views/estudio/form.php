<?php 
if(NULL != $estudio){
	$id = $estudio->get_id();
	$lbl_id = '/';
	$nome = $estudio->get_nome();
	$telefone = $estudio->get_telefone();
	$endereco = $estudio->get_endereco();
	$valor_aula = $estudio->get_valor_padrao_aula();
	$valor_dupla = $estudio->get_valor_padrao_aula_dupla();
} else {
	$id = '';
	$lbl_id = '';
	$nome = '';
	$telefone = '';
	$endereco = '';
	$valor_aula = '';
	$valor_dupla = '';
}
?>


<?php echo form_open('estudios/processar' . $lbl_id . $id); ?>

  	<fieldset>
		<legend>
			<?php echo $titulo_form; ?>
		</legend>
		
		<table>
			<tbody>
				<tr>
					<th>
						<label><?php echo $this->lang->line('estudios.form.nome') ?></label>
					</th>
					<td>
						<input type="text" size="60" name="nome" class="input-text" value="<?php echo $nome; ?>" id="txtNome"  maxlength="100" maxsize="100" />
					</td>
				</tr>
				<tr>
					<th>
						<label><?php echo $this->lang->line('estudios.form.endereco') ?></label>
					</th>
					<td>
						<input type="text" size="60" name="endereco" class="input-text" value="<?php echo $endereco; ?>" id="q10"  maxlength="100" maxsize="100" />
					</td>
				</tr>
				<tr>
					<th>
						<label><?php echo $this->lang->line('estudios.form.telefone') ?></label>
					</th>
					<td>
						<input type="text" size="60" name="telefone" class="input-text" value="<?php echo $telefone; ?>" id="q11"  maxlength="100" maxsize="100" />
					</td>
				</tr>
				<tr>
					<th>
						<label><?php echo $this->lang->line('estudios.form.valor_aula') ?></label>
					</th>
					<td>
						<input type="text" size="60" name="valor_padrao_aula" class="input-text" value="<?php echo $valor_aula; ?>" id="q12"  maxlength="100" maxsize="100" />
					</td>
				</tr>

				<tr>
					<th>
						<label><?php echo $this->lang->line('estudios.form.valor_aula_dupla') ?></label>
					</th>
					<td>
						<input type="text" size="60" name="valor_padrao_aula_dupla" class="input-text" value="<?php echo $valor_dupla; ?>" id="q13"  maxlength="100" maxsize="100" />
					</td>
				</tr>
			</tbody>
		</table>

		<input type="submit" value="Enviar" class="input-submit"/>


	</fieldset>
  
</form>
