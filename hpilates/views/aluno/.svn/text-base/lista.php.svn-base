<div id="divToolbarAluno" >
	<?php
	echo anchor('alunos/novo', 'Novo aluno', 'class="BUTTON_NEW_FULL"');
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
		if(count($colecao_aluno) > 0){
			foreach($colecao_aluno as $aluno){
				?>
		<tr>
			<td><?php echo $aluno->get_id(); ?></td>
			<td><?php echo anchor('alunos/ver/' . $aluno->get_id(), $aluno->get_nome()); ?></td>
			<td><?php echo $aluno->get_email(); ?></td>
			<td><?php echo $aluno->get_telefone(); ?></td>
			<td><?php echo anchor('alunos/remover/'.$aluno->get_id(), 'Remover', 'class="BUTTON_REMOVE"'); ?></td>
		</tr>
				<?php 
			}
		}
		?>
	</tbody>
</table>