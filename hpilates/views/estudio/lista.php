<div id="divToolbarEstudio" >
	<?php
	echo anchor('estudios/novo', 'Novo estúdio', 'class="BUTTON_NEW_FULL"');
	?>
</div>

<BR></BR>

<table class="list">
	<thead>
		<tr>
			<th width="20">#</th>
			<th width="280">Nome</th>
			<th width="200">Endereço</th>
			<th width="200">Telefone</th>
			<th width="30"></th>
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