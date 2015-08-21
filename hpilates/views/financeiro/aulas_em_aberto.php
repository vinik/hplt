<?php
?>
<table class="list">

	<thead>
		<tr>
			<th width="20"></th>
			<th><strong><?php echo $this->lang->line('financeiro.aulas.data'); ?></strong></th>
			<th><strong><?php echo $this->lang->line('financeiro.aulas.dupla'); ?></strong></th>
			<th><strong><?php echo $this->lang->line('financeiro.aulas.valor'); ?></strong></th>
		</tr>
	</thead>
	
	<tbody>
	
		<?php
		$total_eventos_pagos = count($lista_eventos_pagos);
		if ($total_eventos_pagos > 0) {
			foreach ($lista_eventos_pagos as $evento_pago) {
				?>
		<tr id="trEvento<?php echo $evento_pago->get_id(); ?>" class="SELECTED">
			<td>
				<input type="checkbox" name="cb_evento[]" id="cbEvento<?php echo $evento_pago->get_id(); ?>" value="<?php echo $evento_pago->get_id(); ?>" class="cbEvento" checked="checked">
			</td>
			<td>
				<?php
				echo $this->datas->mysql_para_normal($evento_pago->get_inicio());
				?>
			</td>
			<td>
				<?php
				if ('n' == $evento_pago->get_iddupla()) {
					echo $this->lang->line('financeiro.aulas.individual');
				} else {
					echo $this->lang->line('financeiro.aulas.em_dupla');
				}
				?>
			</td>
			<td id="tdValor<?php echo $evento_pago->get_id(); ?>">
				<?php echo $aluno->get_valor_aula(); ?>
			</td>
		</tr>
				<?php
			}
		}
		?>
	
	
		<?php
		$total_eventos = count($lista_eventos); 
		if ($total_eventos > 0) {
			foreach ($lista_eventos as $evento) {
				?>
		<tr id="trEvento<?php echo $evento->get_id(); ?>">
			<td>
				<input type="checkbox" name="cb_evento[]" id="cbEvento<?php echo $evento->get_id(); ?>" value="<?php echo $evento->get_id(); ?>" class="cbEvento">
			</td>
			<td>
				<?php
				echo $this->datas->mysql_para_normal($evento->get_inicio());
				?>
			</td>
			<td>
				<?php
				if ('n' == $evento->get_iddupla()) {
					echo $this->lang->line('financeiro.aulas.individual');
				} else {
					echo $this->lang->line('financeiro.aulas.em_dupla');
				}
				?>
			</td>
			<td id="tdValor<?php echo $evento->get_id(); ?>">
				<?php echo $aluno->get_valor_aula(); ?>
			</td>
		</tr>
				<?php
			}
		}
		?>
	</tbody>
	
</table>