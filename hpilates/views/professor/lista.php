<div id="divToolbarProfessor" align="right">
    <a class="btn btn-primary" href="novo"> + Novo Professor</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Telefone</th>
			<th></th>
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
