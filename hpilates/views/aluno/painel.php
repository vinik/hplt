
<div style="float: left;width:48%;">

	<div class="containerPlus resizable {buttons:'', skin: 'default'}" > 
		<div class="no">
			<div class="ne">
				<div class="n">Novos alunos</div>
			</div> 
			<div class="o">
				<div class="e">
					<div class="c"> 
						<div class="mbcontainercontent"> 
	 
							<table class="grid">
	<thead>
		<tr>
			<th width="20">#</th>
			<th width="300">Nome</th>
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
		</tr>
				<?php 
			}
		}
		?>
	</tbody>
</table>
	 						 
						</div> 
					</div>
				</div>
			</div>
			<div >
				<div class="so">
					<div class="se">
						<div class="s"></div>
					</div>
				</div> 
			</div> 
		</div> 
	</div> 

</div>

<div style="float: left;width:48%;">

	<div class="containerPlus resizable {buttons:'', skin: 'default'}" > 
		<div class="no">
			<div class="ne">
				<div class="n">Hoje</div>
			</div> 
			<div class="o">
				<div class="e">
					<div class="c"> 
						<div class="mbcontainercontent"> 
	 
							<table class="grid">
	<thead>
		<tr>
			<th width="60">#</th>
			<th width="250">Nome</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(count($colecao_evento) > 0){
			foreach($colecao_evento as $evento){
				?>
		<tr>
			<td><?php echo $this->datas->hora($evento->get_hora_inicio()); ?></td>
			<td><?php echo anchor('agenda/ver/' . $evento->get_id(), $evento->get_nome_evento()); ?></td>
		</tr>
				<?php 
			}
		}
		?>
	</tbody>
</table>
	 						 
						</div> 
					</div>
				</div>
			</div>
			<div >
				<div class="so">
					<div class="se">
						<div class="s"></div>
					</div>
				</div> 
			</div> 
		</div> 
	</div> 

</div>