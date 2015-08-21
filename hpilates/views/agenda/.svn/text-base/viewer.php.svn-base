<?php 
if(NULL === $evento){
	
	$id_evento = '';
	$lbl_id = '';
	
	$inicio_dia = '';
	$fim_dia = '';
	$dia_inteiro = 'checked';
	$id_aluno1 = '';
	$id_aluno2 = '';
	$id_estudio = '';
	$dupla = 'false';
	$hora_inicio = '08:00';
	$hora_fim = '09:00';
	$tipo_repeticao = TIPO_REPETICAO_SEMANAL;
	$repeticaofim = '';
	
} else {
	
	$id_evento = $evento->get_id();
	$lbl_id = '/'.$id_evento;
	$inicio_dia = $this->datas->mysql_para_normal($evento->get_inicio());
	$fim_dia = $this->datas->mysql_para_normal($evento->get_fim());
	
	
	$dia_inteiro = '';
	if('s' == $evento->get_iddiainteiro()){
		$dia_inteiro =  'checked="checked" ';
	}
	
	$dupla = '';
	if('s' == $evento->get_iddupla()){
		$dupla = ' checked="checked" ';
	}
	
	$id_aluno1 = $evento->get_id_aluno1();
	$id_aluno2 = $evento->get_id_aluno2();
	$id_estudio = $evento->get_id_estudio();
	
	$hora_inicio = substr($evento->get_hora_inicio(), 0, 5);
	$hora_fim = substr($evento->get_hora_fim(), 0, 5);
	$tipo_repeticao = $evento->get_id_tiporepeticao();
	$repeticaofim = $evento->get_repeticaofim();
	
}



?>


<div id="divToolbarAgenda" >
	<ul id="toolbar" >
		<li title="Novo" style="float:left">
			<a href="" id="lnkNovoEvento"><span class="ui-icon ui-icon-plus"></span></a>
		</li>
		<li title="Remover">
			<a href="" id="lnkRemoverEvento"><span class="ui-icon ui-icon-trash"></span></a>
		</li>
	</ul>		
</div>


<div id="divFormEvento">
		<fieldset>
			<legend>Evento</legend>
			<div >
				<fieldset>
					<table>
						<tbody>
							<tr>
								<th width="30%">
									<label for="txtInicioDia"><?php echo $this->lang->line('agenda.form.inicio'); ?></label>
								</th>
								<td>
									<?php echo $inicio_dia; ?>
								</td>
							</tr>
							<tr>
								<th width="30%">
									
								</th>
								<td>
									<input type="checkbox" name="iddiainteiro" class="input-text" value="s" id="cbIdDiaInteiro" disabled="disabled" <?php echo $dia_inteiro; ?>/>
									<label for="cbIdDiaInteiro"><?php echo $this->lang->line('agenda.form.diainteiro'); ?></label>
								</td>
							</tr>
							<tr class="campoFim">
								<th width="30%">
									
								</th>
								<td>
									<?php
									echo $hora_inicio;
									?>
								</td>
							</tr>
							<tr class="campoFim">
								<th width="30%">
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.fim'); ?></label>
								</th>
								<td>
									<?php echo $fim_dia; ?>
								</td>
							</tr>
							<tr class="campoFim">
								<th width="30%">
								</th>
								<td>
									<?php
									echo $hora_fim;
									?>
								</td>
							</tr>
							
							
						</tbody>
					</table>
				</fieldset>
			</div>
			
			<div >
				<fieldset>
					<table>
						<tbody>
							<tr>
								<th>
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.aluno'); ?></label>
								</th>
								<td>
									<?php
									echo $aluno->get_nome();
									?>
								</td>
							</tr>
							<tr>
								<th>
								</th>
								<td>
									<input type="checkbox" name="iddupla" id="cbDupla" value="s" disabled="disabled"  <?php echo $dupla; ?>/>
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.aulaemdupla'); ?></label>
								</td>
							</tr>
							<?php 
							if('s' == $evento->get_iddupla()){
								?>
							<tr class="campoDupla">
								<th>
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.dupla'); ?></label>
								</th>
								<td>
									<?php
									echo $aluno2->get_nome();
									?>
								</td>
							</tr>
								<?php 
							}
							?>
							<tr>
								<th>
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.estudio'); ?></label>
								</th>
								<td>
									<?php
									echo $estudio->get_nome();
									?>
								</td>
							</tr>
							<tr>
								<th>
									<label for="txtFimDia">Professor</label>
								</th>
								<td>
									<?php
									echo $professor->get_nome();
									?>
								</td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</div>
			
			<?php
			if (SIM == $evento->get_idrepeticao()) {
				$serie = $evento->get_serie();
				print_r($serie);
				?>
			<div >
				<fieldset>
				<?php 
				if (count($serie)) {
					?>
					<table class="list">
						<thead>
							<tr>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach ($serie as $item_serie) {
						?>
						<tr>
							<td><?php echo $item_serie->get_nome_evento(); ?></td>
						</tr>
						<?php 
					}
					?>
						</tbody>
					</table>
					<?php 
				}
			?>
					<table>
						<tbody>
							<tr>
								<th>
								</th>
								<td>
									<input type="checkbox" name="idrepeticao" id="cbRepeticao" value="s" />
									<label for="cbRepeticao"><?php echo $this->lang->line('agenda.form.esteeventorepete'); ?></label>
								</td>
							</tr>
							<tr class="campoRepeticao">
								<th>
								</th>
								<td>
									<?php
									echo $evento->get_id_tiporepeticao();
									?>
								</td>
							</tr>
							<tr class="campoRepeticao">
								<th>
									<label><?php echo $this->lang->line('agenda.form.ate'); ?></label>
								</th>
								<td>
									<?php 
									echo $repeticaofim;
									?>
								</td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</div>
			<?php 
			} 
			?>
			
			
		</fieldset>
</div>