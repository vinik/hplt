<?php 
if(NULL != $estudio){
	$id = $estudio->get_id();
	$lbl_id = '/';
	$nome = $estudio->get_nome();
	$telefone = $estudio->get_telefone();
	$endereco = $estudio->get_endereco();
	$valorAula = $estudio->get_valor_padrao_aula();
	$valorAulaDupla = $estudio->get_valor_padrao_aula_dupla();
} else {
	$id = '';
	$lbl_id = '';
	$nome = '';
	$telefone = '';
	$endereco = '';
	$valorAula = '';
	$valorAulaDupla = '';
}
?>

<div id="divToolbarEstudio">
		<?php
            echo anchor('estudios/novo', $this->lang->line('novo'), 'class="btn btn-primary" type="button"');
        ?>
        <?php
            echo anchor('estudios/editar/'.$estudio->get_id(), $this->lang->line('editar'), 'class="btn btn-primary" type="button"');
        ?>
        <?php
            echo anchor('estudios/remover/'.$estudio->get_id(), $this->lang->line('remover'), 'class="btn btn-primary" type="button"');
        ?>
        <?php
            echo anchor('agenda/agenda_estudio/'.$estudio->get_id(), $this->lang->line('agenda'), 'class="btn btn-primary" type="button"');
        ?>
</div>

<div id="divLeft" class="col-50">
	<div id="divViewerEstudio">
	
	
	  	<fieldset>
			<legend>
				<?php echo $titulo_form; ?>
			</legend>
			
			<table>
				<tbody>
					<tr>
						<th>
							<label>Nome</label>:
						</th>
						<td>
							<strong>
								<?php echo $nome; ?>
							</strong>
						</td>
					</tr>
					<tr>
						<th>
							<label >Endereço</label>:
						</th>
						<td>
							<strong id="enderecoEstudio"><?php echo $endereco; ?></strong>
						</td>
					</tr>
					<tr>
						<th>
							<label >Telefone</label>:
						</th>
						<td>
							<strong>
								<?php echo $telefone; ?>
							</strong>
						</td>
					</tr>
					<tr>
						<th>
							<label >Valor Aula Individual</label>:
						</th>
						<td>
							<strong>
								<?php echo $valorAula; ?>
							</strong>
						</td>
					</tr>
					<tr>
						<th>
							<label >Valor Aula Dupla</label>:
						</th>
						<td>
							<strong>
								<?php echo $valorAulaDupla; ?>
							</strong>
						</td>
					</tr>
				</tbody>
			</table>
	
	
	
		</fieldset>
	  
	</div>
	
	<div>
		<fieldset>
			<legend>Alunos</legend>
			
			<?php 
			if (count($alunos) > 0) {
				?>
			<table class="list">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($alunos as $item_aluno) {
						?>
						<tr>
							<td><?php echo $item_aluno->get_id(); ?></td>
							<td><?php echo anchor('alunos/ver/' . $item_aluno->get_id(), $item_aluno->get_nome()); ?></td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
				<?php 
			}
			?>
			
		</fieldset>
	</div>
	
	
	<div>
		<fieldset>
			<legend>Professores</legend>
		</fieldset>
	</div>
	
	
</div>

<div id="divRight" class="col-50 f-right">
	<div>
		<?php 
		echo form_open_multipart('estudios/processar_foto/' . $estudio->get_id(), array('id' => 'frmFotoEstudio', 'class' => ''));
		?>
			<fieldset>
				<legend>Foto</legend>
				<input type="file" name="foto_estudio" />
				<input type="submit" value="Enviar" id="btnAddFoto"/>
				<?php 
				if (NULL != $estudio->get_foto()) {
					echo br(2);
					echo img(array('src' => 'uploads/estudios/' . $estudio->get_foto(), 'width' => '360'));
				}
				?>
				
				<BR></BR>
			</fieldset>
		</form>
	</div>
	
	<div>
		<fieldset>
			<legend>Mapa</legend>
			
			<div id="divMapaEstudio" style="width: 480px; height: 320px;">
			</div>
			
		</fieldset>
	</div>
	
</div>


<div class="fix"></div>