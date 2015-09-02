<div id="divToolbarEstudio" align="right">
    <a class="btn btn-primary" href="novo"> + Novo Estúdio</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Endereço</th>
			<th>Telefone</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(count($colecao_estudio) > 0){
			foreach($colecao_estudio as $estudio){
				?>
		<tr>
			<td><?php echo $estudio->get_id(); ?></td>
			<td><?php echo anchor('estudios/ver/' . $estudio->get_id(), $estudio->get_nome()); ?></td>
			<td><?php echo $estudio->get_endereco(); ?></td>
			<td><?php echo $estudio->get_telefone(); ?></td>
			<td><?php echo anchor('estudios/remover/'.$estudio->get_id(), 'Remover', 'class="BUTTON_REMOVE"'); ?></td>
		</tr>
				<?php
			}
		}
		?>
	</tbody>
</table>
