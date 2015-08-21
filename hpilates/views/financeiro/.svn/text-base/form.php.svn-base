<?php
/**
 * Formulários de transação
 */

	$options_especie = array(
		ESPECIE_DINHEIRO	=>	'Dinheiro',
		ESPECIE_CHEQUE		=>	'Cheque'
	);
	
	if (NULL != $pagamento->get_id()) {
		$data_pagamento = $this->datas->mysql_para_normal($pagamento->get_data_pagamento());
		$action = 'financeiro/processar/' . $pagamento->get_id();
	} else {
		$data_pagamento = $this->datas->hoje();
		$action = 'financeiro/processar';
	}
?>

<script>
	var lista_alunos = [
		<?php 
		$total_alunos = sizeof($alunos);
		if ($total_alunos > 0) {
			foreach ($alunos as $index_aluno => $item_aluno) {
			?>
		{
			id: '<?php echo $item_aluno->get_id(); ?>',
			value: '<?php echo addslashes($item_aluno->get_nome()); ?>',
			label: '<?php echo addslashes($item_aluno->get_nome()); ?>'
		}
			<?php 
				if ($index_aluno < $total_alunos ) {
					echo ',';
				}
			}
		}
		?>
	];

	<?php 
	if (NULL != $aluno->get_id()) {
		?>
		$(document).ready(function(){
			buscaAulas(<?php echo $pagamento->get_id(); ?>);
		});
		<?php 
	}
	?>

</script>


<?php 
echo form_open($action, 'id="frmTransacao" ');
?>
<div class="col-50">
	<fieldset>
		<legend><?php echo $this->lang->line('financeiro.form.aluno'); ?></legend>
		<table>
			<tbody>
				<tr>
					<th>
						<label for="txtNome"><?php echo $this->lang->line('financeiro.form.aluno.nome'); ?></label>
					</th>
					<td>
						<?php 
						if ($pagamento->get_id()) {
							?>
							<strong><?php echo $aluno->get_nome(); ?></strong>
							<input type="hidden" id="hdnIdAluno" name="id_aluno" value="<?php echo $aluno->get_id(); ?>" />
							<?php 
						} else {
							?>
							<input type="text" size="60" name="nome" class="input-text" value="<?php echo $aluno->get_nome(); ?>" id="txtNomeAluno"  maxlength="100" maxsize="100" />
							<input type="hidden" id="hdnIdAluno" name="id_aluno" value="<?php echo $aluno->get_id(); ?>" />
							<?php 
						}
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	
	<fieldset>
		<legend><?php echo $this->lang->line('financeiro.form.data_pagamento'); ?></legend>
		<table>
			<tbody>
				<tr>
					<th>
						<label for="txtNome"><?php echo $this->lang->line('financeiro.form.pagamento.data_pagamento'); ?></label>
					</th>
					<td>
						<input type="text" size="20" name="data_pagamento" class="input-text DATEFIELD" value="<?php echo $data_pagamento; ?>" id="txtDataPagamento" maxlength="10" maxsize="10" title="<?php echo $this->lang->line('financeiro.form.pagamento.data_pagamento'); ?>"/>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
		
	<fieldset>
		<legend><?php echo $this->lang->line('financeiro.form.valores');?></legend>
		<table>
			<tbody>
				<tr>
					<th>
						<label for="txtAulas"><?php echo $this->lang->line('financeiro.form.total_aulas'); ?></label>
					</th>
					<td>
						<label id="txtTotalAulas"></label>
					</td>
				</tr>
				<tr>
					<th>
						<label for="txtValorDevido"><?php echo $this->lang->line('financeiro.form.pagamento.valor_devido'); ?></label>
					</th>
					<td>
						<label id="txtValorDevido"></label>
					</td>
				</tr>
				<tr>
					<th>
						<label for="txtValorPago"><?php echo $this->lang->line('financeiro.form.pagamento.valor'); ?></label>
					</th>
					<td>
						<input type="text" size="10" name="valor_pago" class="input-text" value="<?php echo $pagamento->get_valor(); ?>" id="txtValorPago"  maxlength="10" maxsize="10" />
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	
	<fieldset>
		<legend>Espécie</legend>
		<table>
			<tbody>
				<tr>
					<th>
						<label>Pagamento feito em</label>
					</th>
					<td>
						<?php echo form_dropdown('especie', $options_especie, $pagamento->get_especie(), 'class="form-input" id="selEspecie"'); ?>
					</td>
				</tr>
				<tr class="CAMPO_CHEQUE">
					<th>
						<label>Número do cheque</label>
					</th>
					<td>
						<?php echo form_input('cheque_numero', $pagamento->get_cheque_numero(), 'class="input-text" size="60"'); ?>
					</td>
				</tr>
				<tr class="CAMPO_CHEQUE">
					<th>
						<label>Cheque em nome de</label>
					</th>
					<td>
						<?php echo form_input('cheque_nome', $pagamento->get_cheque_nome(), 'class="input-text" size="60"'); ?>
					</td>
				</tr>
				<tr class="CAMPO_CHEQUE">
					<th>
						<label>Banco (nome)</label>
					</th>
					<td>
						<?php echo form_input('cheque_banco', $pagamento->get_cheque_banco(), 'class="input-text" size="60"'); ?>
					</td>
				</tr>
				<tr class="CAMPO_CHEQUE">
					<th>
						<label>Agência</label>
					</th>
					<td>
						<?php echo form_input('cheque_agencia', $pagamento->get_cheque_agencia(), 'class="input-text"'); ?>
					</td>
				</tr>
				<tr class="CAMPO_CHEQUE">
					<th>
						<label>Conta</label>
					</th>
					<td>
						<?php echo form_input('cheque_conta', $pagamento->get_cheque_conta(), 'class="input-text"'); ?>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
</div>
	
<div class="col-50 f-right" >
	<fieldset>
		<legend><?php echo $this->lang->line('financeiro.form.aulas');?></legend>
		<div id="divAulas" style="height: 280px; overflow: auto;">
		</div>
	</fieldset>
</div>

<div class="fix"></div>
<input type="submit" id="btnEnviar" value="<?php echo $this->lang->line('financeiro.form.gerar_pagamento'); ?>"/>

<?php 
echo form_close(br(2));
?>