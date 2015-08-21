<?php 

$opcoes_aluno1 = array();
if(count($alunos) > 0){
	foreach($alunos as $aluno){
		$opcoes_aluno1[$aluno->get_id()] = $aluno->get_nome();
	}
}

$opcoes_aluno2 = array(
	'' => ' -- em aberto -- '
);
foreach($opcoes_aluno1 as $id_opcao => $opcao){
	$opcoes_aluno2[$id_opcao] = $opcao;
}

$opcoes_estudio = array();
if(count($estudios) > 0){
	foreach($estudios as $item_estudio){
		$opcoes_estudio[$item_estudio->get_id()] = $item_estudio->get_nome();
	}
}

$opcoes_tiporepeticao = $tipos_repeticao;

$opcoes_professor = array();
if(count($professores) > 0){
	foreach($professores as $professor){
		$opcoes_professor[$professor->get_id()] = $professor->get_nome();
	}
}

?>
<div id="divToolbarAgenda" >
	<ul id="toolbar" >
		<li title="Novo" >
			<a href="" id="lnkNovoEvento"><span class="ui-icon ui-icon-plus"></span></a>
		</li>
	</ul>		
</div>


<div id="divFormEvento">
	<?php
	echo form_open('agenda/processar');
	?>
		<fieldset>
			<legend>Novo evento</legend>
			<div class="col-33">
				<fieldset>
					<table>
						<tbody>
							<tr>
								<th width="30%">
									<label for="txtInicioDia"><?php echo $this->lang->line('agenda.form.inicio'); ?></label>
								</th>
								<td>
									<input type="text" size="20" name="inicio" class="input-text DATEFIELD" value="" id="txtInicioDia" maxlength="10" maxsize="10" />
								</td>
							</tr>
							<tr>
								<th width="30%">
									
								</th>
								<td>
									<input type="checkbox" name="iddiainteiro" class="input-text" value="s" id="cbIdDiaInteiro" />
									<label for="cbIdDiaInteiro"><?php echo $this->lang->line('agenda.form.diainteiro'); ?></label>
								</td>
							</tr>
							<tr class="campoFim">
								<th width="30%">
									
								</th>
								<td>
									<?php
									$hora_inicio = '08:00';
									$hora_fim = '09:00';
									echo select_horas('hora_inicio', 15, array($hora_inicio), 'id="selHoraInicio"');
									?>
								</td>
							</tr>
							<tr class="campoFim">
								<th width="30%">
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.fim'); ?></label>
								</th>
								<td>
									<input type="text" size="20" name="fim" class="input-text DATEFIELD" value="" id="txtFimDia" maxlength="10" maxsize="10" />
								</td>
							</tr>
							<tr class="campoFim">
								<th width="30%">
								</th>
								<td>
									<?php
									echo select_horas('hora_fim', 15, array($hora_fim), 'id="selHoraFim"');
									?>
								</td>
							</tr>
							
							
						</tbody>
					</table>
				</fieldset>
			</div>
			
			<div class="col-33 center">
				<fieldset>
					<table>
						<tbody>
							<tr>
								<th>
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.aluno'); ?></label>
								</th>
								<td>
									<?php
									echo form_dropdown('id_aluno1', $opcoes_aluno1);
									?>
								</td>
							</tr>
							<tr>
								<th>
								</th>
								<td>
									<input type="checkbox" name="iddupla" id="cbDupla" value="s" />
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.aulaemdupla'); ?></label>
								</td>
							</tr>
							<tr class="campoDupla">
								<th>
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.dupla'); ?></label>
								</th>
								<td>
									<?php
									echo form_dropdown('id_aluno2', $opcoes_aluno2);
									?>
								</td>
							</tr>
							<tr>
								<th>
									<label for="txtFimDia"><?php echo $this->lang->line('agenda.form.estudio'); ?></label>
								</th>
								<td>
									<?php
									echo form_dropdown('id_estudio', $opcoes_estudio);
									?>
								</td>
							</tr>
							<tr>
								<th>
									<label for="txtFimDia">Professor</label>
								</th>
								<td>
									<?php
									echo form_dropdown('id_professor', $opcoes_professor);
									?>
								</td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</div>
					
			<div class="col-33">
				<fieldset>
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
									echo form_dropdown('id_tiporepeticao', $opcoes_tiporepeticao);
									?>
								</td>
							</tr>
							<tr class="campoRepeticao">
								<th>
									<label><?php echo $this->lang->line('agenda.form.ate'); ?></label>
								</th>
								<td>
									<input type="text" size="20" name="repeticaofim" class="input-text DATEFIELD" value="" id="txtRepeteAte" maxlength="10" maxsize="10" />
								</td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</div>
			
			<div class="col-33">
				<input type="submit" class="input-submit" value="Enviar" />
			</div>
		</fieldset>
	<?php
	echo form_close();
	?>
</div>

<div id="divAbasAgenda" class="menu_agenda">
	<ul class="abas">
		<li><a href="#divInicioAgenda" class="here">Painel</a></li>
<?php
foreach($estudios as $estudio){
	?>
		<li><?php echo anchor('agenda/agenda_estudio/' . $estudio->get_id(), $estudio->get_nome()); ?></li>
	<?php 
}
?>
	</ul>
	

</div>


<div class="conteudo_agenda">
	
</div>

