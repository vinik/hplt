<?php

	$mes_anterior = $this->datas->mes_anterior($mes, $ano, 'm');
	$proximo_mes = $this->datas->proximo_mes($mes, $ano, 'm');
	$ano_anterior = $this->datas->mes_anterior($mes, $ano, 'Y');
	$proximo_ano = $this->datas->proximo_mes($mes, $ano, 'Y');

	$valor_total = 0;
	$valor_total_despesas = 0;
	
	
?>


<div id="divControleFinanceiro">
	
	<div>
		
		<span id="toolbar" class="ui-widget-header ui-corner-all" style="padding: 10px 4px;">
			<a href="<?php echo site_url('financeiro/painel/' . ($mes_anterior) . '/' . ($ano_anterior)); ?>" id="btnVoltar">Voltar</a>
			<?php echo $mes; ?> - <?php echo $ano; ?>
			<a href="<?php echo site_url('financeiro/painel/' . ($proximo_mes) . '/' . ($proximo_ano)); ?>" id="btnAvancar">Avan�ar</a>
			<?php echo anchor('financeiro', 'Hoje', 'id="btnFinanceiroHoje" class="BUTTON"'); ?>
		</span>
		
	</div>
	
</div>
<BR></BR>
<?php 
if (count($estudios)) {
	?>
	
<div id="divTabsFinanceiroEstudios">
	<ul>
		<?php 
		foreach ($estudios as $item_estudio) {
			?>
			<li><a href="#abaEstudio<?php echo $item_estudio->get_id(); ?>"><?php echo $item_estudio->get_nome(); ?></a></li>
			<?php 
		}
		?>
	</ul>
	<?php 
	foreach ($estudios as $item_estudio) {
		$valor_total_estudio = 0;
		$valor_total_despesas_estudio = 0;
		$pagamentos = $pagamento->busca_mes($mes, $ano, $item_estudio->get_id());
		$despesas = $despesa->busca_mes($mes, $ano, $item_estudio->get_id());
		?>
		<div id="abaEstudio<?php echo $item_estudio->get_id();?>" style="margin: 20px;">
		
		




			<h2>Pagamentos</h2>
			
			<div id="divToolbarPagamentos" >
						<?php
						echo anchor('financeiro/novo', $this->lang->line('financeiro.nova_transacao'), 'class="BUTTON_NEW_FULL"');
						?>
			</div>
			<BR></BR>
			
			
			<div id="divListaPagamentos<?php echo $item_estudio->get_id(); ?>" class="{id_estudio: <?php echo $item_estudio->get_id(); ?>}">
			<?php 
			if (count($pagamentos) > 0) {
				?>
				<table class="list">
					<thead>
						<tr>
							<th>Data</th>
							<th>Aluno</th>
							<th>Número de aulas</th>
							<th>Hora/aula R$</th>
							<th>Desconto %</th>
							<th>Valor</th>
							<th width="80"></th>
						</tr>
					</thead>
					<tbody>
				<?php
				$contador_aulas = 0;
				foreach ($pagamentos as $pagamento) {
					
					$contador_aulas += $pagamento->get_numero_aulas();
					$valor_total_estudio += $pagamento->get_valor();
					
					$aluno = $this->aluno;
					$aluno->set_id($pagamento->get_id_aluno());
					$aluno->retrieve();
					?>
						<tr>
							<td><?php echo $this->datas->mysql_para_normal($pagamento->get_data_pagamento()); ?></td>
							<td><?php echo $aluno->get_nome(); ?></td>
							<td><?php echo $pagamento->get_numero_aulas(); ?></td>
							<td><?php echo $pagamento->get_hora_aula(); ?></td>
							<td><?php echo $pagamento->get_desconto(); ?></td>
							<td><?php echo $pagamento->get_valor(); ?></td>
							<td>
								<?php echo anchor('financeiro/editar/' . $pagamento->get_id(), 'Editar', 'class="BUTTON_EDIT"'); ?>
								<button class="BUTTON_REMOVE"  onclick="confirmDeletePayment(<?php echo $pagamento->get_id(); ?>, <?php echo $item_estudio->get_id(); ?>);">Remover</button>
							</td>
						</tr>
					<?php 
				}
				?>
						<tr>
							<th></th>
							<th></th>
							<th><?php echo $contador_aulas; ?></th>
							<th></th>
							<th></th>
							<th><?php echo $valor_total_estudio; ?></th>
							<th></th>
						</tr>
					</tbody>
				</table>
				<?php 
			} else {
				?>
				<h3><?php echo $this->lang->line('financeiro.nenhum_pagamento');?></h3>
				<?php 
			}
			?>
			</div>
			
			<?php echo br(4); ?>

			<h2>Despesas</h2>
			
			<div id="divToolbarDespesas" >
						<?php
						echo anchor('financeiro/nova_despesa', $this->lang->line('financeiro.nova_despesa'), 'class="BUTTON_NEW_FULL"');
						?>
			</div>
			<BR></BR>
			
			<div id="divListaDespesas">
			<?php 
			if (count($despesas) > 0) {
				?>
				<table class="list">
					<thead>
						<tr>
							<th>Data</th>
							<th>Descrição</th>
							<th>Valor</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
				<?php
				foreach ($despesas as $despesa) {
					$valor_total_despesas_estudio += $despesa->get_valor();
					?>
						<tr>
							<td><?php echo $this->datas->mysql_para_normal($despesa->get_data()); ?></td>
							<td><?php echo $despesa->get_descr(); ?></td>
							<td><?php echo $despesa->get_valor(); ?></td>
							<td>
								<?php echo anchor('financeiro/editar_despesa/' . $despesa->get_id(), 'Editar', 'class="BUTTON_EDIT"'); ?>
								<button class="BUTTON_REMOVE"  onclick="confirmDeleteDespesa(<?php echo $despesa->get_id(); ?>);">Remover</button>
							</td>
						</tr>
					<?php 
				}
				?>
						<tr>
							<th></th>
							<th></th>
							<th><?php echo $valor_total_despesas_estudio; ?></th>
							<th></th>
						</tr>
					</tbody>
				</table>
				<?php 
			} else {
				?>
				<h3><?php echo $this->lang->line('financeiro.nenhuma_despesa');?></h3>
				<?php 
			}
			?>
			</div>
			
			<?php echo br(4); ?>

<h2>Saldo</h2>

<?php 

$total_do_periodo = $valor_total_estudio - $valor_total_despesas_estudio;

$valor_saldo_mes_anterior = $this->financeiro_hpilates->calcula_saldo($mes_anterior, $ano_anterior, $item_estudio->get_id());
$valor_saldo_mes = $this->financeiro_hpilates->calcula_saldo($mes, $ano, $item_estudio->get_id());

?>
<div id="divTotais">
	<table class="table-01">
		<tr>
			<th>Total arrecadado</th>
			<td><?php echo $valor_total_estudio; ?></td>
		</tr>
		<tr>
			<th>Gastos do mês</th>
			<td><?php echo $valor_total_despesas_estudio; ?></td>
		</tr>
		<tr>
			<th>Total</th>
			<td><?php echo $total_do_periodo; ?></td>
		</tr>
		<?php
		/*
		<tr>
			<th>Saldo do mês anterior</th>
			<td><?php echo $valor_saldo_mes_anterior; ?></td>
		</tr>
		<tr>
			<th>Saldo atual</th>
			<td><?php echo $valor_saldo_mes; ?></td>
		</tr>
		*/
		?>
	</table>
</div>

		</div>
		<?php 
	}
	?>
</div>
	<?php 
}
?>

<div id="divDialogConfirmRemovePayment" title="Remover pagamento?">
	<p class="msg msg-warning" style="color: black;">Este pagamento será permanentemente removido e não poderá ser recuperado. Você tem certeza?</p>
	<input type="hidden" id="hdnPaymentIdDelete"/>
	<input type="hidden" id="hdnPaymentIdEstudio"/>
	<input type="hidden" id="hdnPaymentMes" value="<?php echo $mes; ?>"/>
	<input type="hidden" id="hdnPaymentAno" value="<?php echo $ano; ?>"/>
</div>

<div id="divDialogConfirmRemoveDespesa" title="Remover despesa?">
	<p class="msg msg-warning" style="color: black;">Esta despesa será permanentemente removida e não poderá ser recuperada. Você tem certeza?</p>
	<input type="hidden" id="hdnIdDespesaDelete"/>
</div>