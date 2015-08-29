<div id="divToolbarAluno" align="right">
	<a class="btn btn-primary" href="novo"> + Novo Aluno</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Telefone</th>
			<th>Estúdio</th>
			<th>Ações</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(count($colecao_aluno) > 0){
			foreach($colecao_aluno as $aluno){
		?>
		<tr>
			<td><?php echo $aluno->get_id(); ?></td>
			<td><?php echo anchor('alunos/ver/' . $aluno->get_id(), $aluno->get_nome()); ?></td>
			<td><?php echo $aluno->get_email(); ?></td>
			<td><?php echo $aluno->get_telefone(); ?></td>
			<td><?php echo $aluno->get_estudio_nome(); ?></td>
			<td><?php echo anchor('alunos/remover/'.$aluno->get_id(), 'Remover', 'class="BUTTON_REMOVE"'); ?></td>
		</tr>
				<?php
			}
		}
		?>
	</tbody>
</table>
