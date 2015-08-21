<div id="divToolbarUsuario" >
				<?php
				echo anchor('usuarios/novo', 'Novo usuário', 'class="BUTTON_NEW_FULL"');
				?>
</div>

<BR></BR>

<table class="list">
	<thead>
		<tr>
			<th width="20">#</th>
			<th width="280">Nome</th>
			<th width="150">Username</th>
			<th width="150">Email</th>
			<th width="100">Nível</th>
			<th width="30"></th>
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