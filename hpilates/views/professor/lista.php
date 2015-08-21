<div id="divToolbarAluno" >
	<?php
	echo anchor('professores/novo', 'Novo professor', 'class="BUTTON_NEW_FULL"');
	?>
</div>
<BR></BR>

<table class="list">
	<thead>
		<tr>
			<th width="20">#</th>
			<th width="300">Nome</th>
			<th width="200">Email</th>
			<th width="200">Telefone</th>
			<th width="30"></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(count($colecao_professor) > 0){
			foreach($colecao_professor as $professor){
				?>
		<tr>
			<td><?php echo $professor->get_id(); ?></td>
			<td><?php echo anchor('professores/ver/' . $professor->get_id(), $professor->get_nome()); ?></td>
			<td><?php echo $professor->get_email(); ?></td>
			<td><?php echo $professor->get_telefone(); ?></td>
			<td><?php echo anchor('professores/remover/'.$professor->get_id(), 'Remover', 'class="BUTTON_REMOVE"'); ?></td>
		</tr>
				<?php 
			}
		}
		?>
	</tbody>
</table>