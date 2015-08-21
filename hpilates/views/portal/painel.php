<div style="float: left;width:48%;">

	<div class="containerPlus resizable {buttons:'', skin: 'default'}" > 
		<div class="no">
			<div class="ne">
				<div class="n"><?php echo $this->lang->line('portal.aulas'); ?></div>
			</div> 
			<div class="o">
				<div class="e">
					<div class="c"> 
						<div class="mbcontainercontent"> 
	 
							
	 						
	 						<div id="divHoje"></div>
	 						 
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
				<div class="n"><?php echo $this->lang->line('portal.alunos'); ?></div>
			</div> 
			<div class="o">
				<div class="e">
					<div class="c"> 
						<div class="mbcontainercontent"> 
	 
							<table class="list">
	<thead>
		<tr>
			<th width="20">#</th>
			<th width="300">Nome</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(count($alunos) > 0){
			foreach($alunos as $aluno){
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
				<div class="n"><?php echo $this->lang->line('portal.professores'); ?></div>
			</div> 
			<div class="o">
				<div class="e">
					<div class="c"> 
						<div class="mbcontainercontent"> 
	 
							<table class="list">
	<thead>
		<tr>
			<th width="20">#</th>
			<th width="300">Nome</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(count($professores) > 0){
			foreach($professores as $professor){
				?>
		<tr>
			<td><?php echo $professor->get_id(); ?></td>
			<td><?php echo anchor('professores/ver/' . $professor->get_id(), $professor->get_nome()); ?></td>
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




<?php 
/*


<div id="box2" class="painelBox"> 
	<div class="lightBox" style="vertical-align: middle"> </div> 
		<div class="containerPlus resizable {width:500, height:230, buttons:'', skin: 'white'}" content="agenda/novo"> 
			<div class="no"><div class="ne"><div class="n"></div></div> 
				<div class="o"><div class="e"><div class="c"> 
					<div class="mbcontainercontent"> 
 
 
					</div> 
				</div></div></div> 
				<div > 
					<div class="so"><div class="se"><div class="s"></div></div></div> 
				</div> 
			</div> 
		</div> 
</div>

<div id="box3" class="painelBox"> 
	<div class="lightBox" style="vertical-align: middle"> </div> 
		<div class="containerPlus resizable {width:50%, height:230, buttons:'', skin: 'white'}" content="agenda/novo"> 
			<div class="no"><div class="ne"><div class="n">Aulas</div></div> 
				<div class="o"><div class="e"><div class="c"> 
					<div class="mbcontainercontent"> 
 
 
					</div> 
				</div></div></div> 
				<div > 
					<div class="so"><div class="se"><div class="s"></div></div></div> 
				</div> 
			</div> 
		</div> 
</div>
*/