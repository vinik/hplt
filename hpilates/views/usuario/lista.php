<div id="divToolbarAluno" align="right">
    <a class="btn btn-primary" href="novo"> + Novo Usuário</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Username</th>
			<th>Email</th>
			<th>Nível</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(count($colecao_usuario) > 0){
			foreach($colecao_usuario as $usuario){
				?>
		<tr>
			<td><?php echo $usuario->get_id(); ?></td>
			<td><?php echo anchor('usuarios/editar/' . $usuario->get_id(), $usuario->get_nome()); ?></td>
			<td><?php echo $usuario->get_username(); ?></td>
			<td><?php echo $usuario->get_email(); ?></td>
			<td><?php echo $usuario->get_nivel_acesso(); ?></td>
			<td><?php echo anchor('usuarios/remover/'.$usuario->get_id(), 'Remover', 'class="BUTTON_REMOVE"'); ?></td>
		</tr>
				<?php
			}
		}
		?>
	</tbody>
</table>
