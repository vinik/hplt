<table class="list">
	<thead>
		<tr>
			<th>Data</th>
			<th>Aluno(s)</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (count($aulas)) {
			foreach ($aulas as $aula) {
				?>
				<tr>
					<td><?php echo $this->datas->mysql_para_normal($aula->get_inicio()); ?></td>
					<td><?php echo $aula->get_nome_evento(); ?></td>
				</tr>
				<?php 
			}
		}
		?>
	</tbody>
</table>
<br/>
Total de aulas no per&iacute;odo: <?php echo count($aulas); ?>